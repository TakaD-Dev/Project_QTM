pipeline {
    agent any
    
    environment {
        APP_IMAGE = "my-web-final"
        TAR_FILE  = "/var/jenkins_home/${APP_IMAGE}.tar"
        K3S_IMAGE_DIR = "/var/lib/rancher/k3s/agent/images"
    }
    
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        
        stage('Build & Package') {
            steps {
                sh '''
                    echo "🔨 Đang build Docker image..."
                    docker build --no-cache -t ${APP_IMAGE}:latest .
                    
                    echo "💾 Đang lưu image thành tar..."
                    docker save ${APP_IMAGE}:latest -o ${TAR_FILE}
                    
                    echo "✅ Build hoàn tất."
                '''
            }
        }
        
        stage('Deploy to k3s') {
            steps {
                sh '''
                    echo "🚀 Đang đưa image vào k3s..."
                    
                    # Tạo thư mục nếu chưa có
                    mkdir -p ${K3S_IMAGE_DIR}
                    
                    # Copy file tar vào thư mục k3s (k3s sẽ tự động import)
                    cp ${TAR_FILE} ${K3S_IMAGE_DIR}/
                    
                    echo "✅ Đã copy image tar vào ${K3S_IMAGE_DIR}"
                    echo "K3s sẽ tự import trong vài giây..."
                    
                    # Kiểm tra file đã copy chưa
                    ls -lh ${K3S_IMAGE_DIR}/ | grep ${APP_IMAGE}
                '''
            }
        }
    }
    
    post {
        always {
            sh 'rm -f ${TAR_FILE} || true'
        }
        success {
            echo "🎉 Pipeline thành công! Image đã được copy vào k3s."
            echo "Bạn có thể kiểm tra bằng lệnh trên server:"
            echo "k3s ctr -n k8s.io images ls | grep my-web-final"
        }
        failure {
            echo "❌ Pipeline thất bại."
        }
    }
}
