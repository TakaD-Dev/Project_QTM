pipeline {
    agent any
    stages {
        stage('Build & Package') {
            steps {
                sh 'docker build --no-cache -t my-web-final:latest .'
                sh 'docker save my-web-final:latest -o /var/jenkins_home/my-web-final.tar'
            }
        }
stage('Deploy') {
    steps {
        // BƯỚC QUAN TRỌNG: Nạp image mới vào K3s
        // Chúng ta dùng sudo để Jenkins có quyền gọi lệnh k3s trên máy Ubuntu
        sh 'sudo k3s ctr images import /var/jenkins_home/my-web-final.tar'
        
        // Cập nhật cấu hình
        sh 'kubectl apply -f deployment.yaml --validate=false'
        
        // Ép K3s chạy Pod mới với Image vừa nạp
        sh 'kubectl rollout restart deployment/php-app'
    }
}
    }
}
