pipeline {
    agent any
    
    environment {
        APP_IMAGE = "my-web-final"
        TAR_FILE  = "/var/jenkins_home/${APP_IMAGE}.tar"
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
                    echo "🔨 Đang build Docker image cho ứng dụng..."
                    docker build --no-cache -t ${APP_IMAGE}:latest .
                    
                    echo "💾 Đang lưu image thành file tar..."
                    docker save ${APP_IMAGE}:latest -o ${TAR_FILE}
                    
                    echo "✅ Build hoàn tất."
                '''
            }
        }
        
        stage('Deploy to k3s') {
    steps {
        echo '🚀 Đang import image vào k3s...'
        // Bỏ sudo đi vì Jenkins đã có quyền qua chmod 666
        sh 'k3s ctr --address /run/k3s/containerd/containerd.sock -n k8s.io images import /var/jenkins_home/my-web-final.tar'
        
        echo '☸️ Đang cập nhật ứng dụng trên Kubernetes...'
        sh 'kubectl apply -f deployment.yaml'
        sh 'kubectl rollout restart deployment my-web-deployment'
    }
}
    }
    
    post {
        always {
            sh 'rm -f ${TAR_FILE} || true'
        }
        success {
            echo "🎉 Pipeline HOÀN THÀNH! Image my-web-final đã được import vào k3s."
        }
        failure {
            echo "❌ Pipeline thất bại. Kiểm tra log phía trên."
        }
    }
}
