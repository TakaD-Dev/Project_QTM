pipeline {
    agent any
    stages {
        stage('Build & Package') {
            steps {
                // Bước này Jenkins làm rất tốt, sẽ ra màu XANH
                sh 'docker build -t my-web-final:latest .'
            }
        }
    }
}