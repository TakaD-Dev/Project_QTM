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
                sh '''
                    echo "🚀 Đang import image vào k3s..."
                    
                    # Sử dụng socket đầy đủ của k3s + sudo
                    sudo k3s ctr --address /run/k3s/containerd/containerd.sock -n k8s.io images import ${TAR_FILE}
                    
                    echo "✅ Import image thành công!"
                    
                    # Kiểm tra image đã có trong k3s chưa
                    echo "📋 Kiểm tra image:"
                    sudo k3s ctr --address /run/k3s/containerd/containerd.sock -n k8s.io images ls | grep ${APP_IMAGE} || echo "⚠️ Chưa thấy image (có thể cần chờ vài giây)"
                '''
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
