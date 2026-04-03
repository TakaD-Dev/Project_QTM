pipeline {
    agent any
    
    environment {
        IMAGE_NAME = "my-web-final"
        TAR_FILE   = "/var/jenkins_home/${IMAGE_NAME}.tar"
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
                    docker build --no-cache -t ${IMAGE_NAME}:latest .
                    
                    echo "💾 Đang lưu image thành file tar..."
                    docker save ${IMAGE_NAME}:latest -o ${TAR_FILE}
                    
                    echo "✅ Build và save hoàn tất."
                '''
            }
        }
        
        stage('Deploy to k3s') {
            steps {
                sh '''
                    echo "🚀 Đang import image vào k3s..."
                    
                    # Dùng sudo vì bạn đã cấu hình sudoers trong Dockerfile
                    sudo k3s ctr -n k8s.io images import ${TAR_FILE}
                    
                    echo "✅ Import image thành công!"
                    
                    # Kiểm tra image đã có trong k3s chưa
                    echo "Danh sách image:"
                    sudo k3s ctr -n k8s.io images ls | grep ${IMAGE_NAME} || echo "⚠️ Không tìm thấy image trong k3s!"
                '''
            }
        }
    }
    
    post {
        always {
            sh '''
                echo "🧹 Dọn dẹp file tar..."
                rm -f ${TAR_FILE}
            '''
        }
        success {
            echo "🎉 Pipeline thành công! Image đã được import vào k3s."
        }
        failure {
            echo "❌ Pipeline thất bại. Vui lòng kiểm tra log."
        }
    }
}
