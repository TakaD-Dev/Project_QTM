pipeline {
    agent any
    
    environment {
        IMAGE_NAME = "my-web-final"
        TAR_FILE   = "/var/jenkins_home/${IMAGE_NAME}.tar"
        K3S_IMAGES_DIR = "/var/lib/rancher/k3s/agent/images"
    }
    
    stages {
        stage('Declarative: Checkout SCM') {
            steps {
                checkout scm
            }
        }
        
        stage('Build & Package') {
            steps {
                sh '''
                    echo "Building Docker image..."
                    docker build --no-cache -t ${IMAGE_NAME}:latest .
                    
                    echo "Saving image to tar file..."
                    docker save ${IMAGE_NAME}:latest -o ${TAR_FILE}
                '''
            }
        }
        
        stage('Deploy to k3s') {
            steps {
                sh '''
                    echo "Copying image tar to k3s images directory..."
                    
                    # Tạo thư mục nếu chưa có
                    mkdir -p ${K3S_IMAGES_DIR}
                    
                    # Copy file tar vào
                    cp ${TAR_FILE} ${K3S_IMAGES_DIR}/
                    
                    echo "Đã copy image vào ${K3S_IMAGES_DIR}/"
                    echo "K3s sẽ tự động import image sau vài giây."
                    
                    # Kiểm tra (có thể cần chờ một chút)
                    sleep 5
                    ls -l ${K3S_IMAGES_DIR}/
                '''
            }
        }
    }
    
    post {
        always {
            sh 'rm -f ${TAR_FILE}'   // Xóa file tar tạm
        }
        success {
            echo "✅ Pipeline thành công! Image đã được đưa vào k3s."
            echo "Bạn có thể kiểm tra bằng lệnh: k3s ctr -n k8s.io images ls | grep my-web-final"
        }
    }
}
