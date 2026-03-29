pipeline {
    agent any
    stages {
        stage('1. Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/TakaD-Dev/Project_QTM.git'
            }
        }
stage('2. Build Image') {
    steps {
        // Thêm --no-cache để ép Docker build lại từ đầu với Dockerfile mới
        sh 'docker build --no-cache -t my-web-final:latest .' 
    }
}
        stage('3. Deploy') {
            steps {
                sh 'docker rm -f web-final-container || true'
                sh 'docker run -d --name web-final-container -p 8081:80 my-web-final:latest'
                echo '=== XONG! TRUY CAP: http://192.168.1.3:8081 ==='
            }
        }
    }
}