pipeline {
    agent any

    environment {
        APP_IMAGE = "my-web-final"
        // Sử dụng biến môi trường để đường dẫn luôn đồng nhất
        TAR_FILE  = "/var/jenkins_home/${APP_IMAGE}.tar"
        CONTAINERD_SOCK = "/run/k3s/containerd/containerd.sock"
    }

    stages {
        stage('🚚 Checkout') {
            steps {
                // Tải code từ GitHub
                checkout scm
            }
        }

        stage('🏗️ Build & Package') {
            steps {
                sh """
                    echo "🔨 Đang build Docker image: ${APP_IMAGE}..."
                    docker build --no-cache -t ${APP_IMAGE}:latest .
                    
                    echo "💾 Đang đóng gói image thành file .tar..."
                    docker save ${APP_IMAGE}:latest -o ${TAR_FILE}
                    
                    echo "✅ Build và đóng gói thành công."
                """
            }
        }

        stage('🚀 Deploy to K3s') {
            steps {
                sh """
                    echo "📦 Đang import image vào K3s (containerd)..."
                    # Sử dụng biến socket và bỏ sudo như đã thống nhất
                    k3s ctr --address ${CONTAINERD_SOCK} -n k8s.io images import ${TAR_FILE}
                    
                    echo "☸️ Đang cập nhật ứng dụng trên Kubernetes..."
                    kubectl apply -f deployment.yaml
                    kubectl rollout restart deployment my-web-deployment
                """
            }
        }
    }

    post {
        always {
            echo "🧹 Đang dọn dẹp file tạm..."
            // Xóa file tar sau khi xong để tiết kiệm dung lượng ổ cứng
            sh "rm -f ${TAR_FILE} || true"
        }
        success {
            echo "🎉 CHÚC MỪNG! Pipeline đã chạy thành công rực rỡ."
        }
        failure {
            echo "❌ LỖI: Pipeline thất bại. Bạn hãy kiểm tra lại quyền truy cập socket (chmod 666) nhé."
        }
    }
}
