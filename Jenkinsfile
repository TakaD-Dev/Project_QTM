pipeline {
    agent any
    
    stages {
        stage('1. Checkout Code') {
            steps {
                // Xóa folder cũ để kéo bản mới nhất từ GitHub
                git branch: 'main', url: 'https://github.com/TakaD-Dev/Project_QTM.git'
            }
        }
        
        stage('2. Build Image') {
            steps {
                // Build Image từ folder vừa kéo về
                sh 'docker build -t my-web-final:latest .' 
            }
        }
        
        stage('3. Deploy') {
            steps {
                // Xóa container cũ và chạy bản mới
                sh 'docker rm -f web-final-container || true'
                sh 'docker run -d --name web-final-container -p 8081:80 my-web-final:latest'
                echo '=== XONG! TRUY CAP: http://192.168.1.3:8081 ==='
            }
        }
    }
}