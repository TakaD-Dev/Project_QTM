pipeline {
    agent any
    stages {
        stage('Build & Package') {
            steps {
                // Chỉ cần build image, không cần save hay import gì cả
                sh 'docker build --no-cache -t my-web-final:latest .'
            }
        }
        stage('Deploy') {
            steps {
                // Dùng kubectl để apply file deployment đã có trong repo
                sh 'kubectl apply -f deployment.yaml'
                
                // Lệnh quan trọng nhất để website cập nhật ngay lập tức:
                sh 'kubectl rollout restart deployment <tên-deployment-trong-file-yaml>'
                
                echo "Deploy hoàn tất! Kiểm tra tại http://192.168.1.254:30001"
            }
        }
    }
}
