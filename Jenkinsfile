pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                sh 'docker build -t my-web-final:latest .'
            }
        }
        stage('Deploy') {
            steps {
                // Thêm đường dẫn đầy đủ của kubectl (thường là /usr/local/bin/kubectl)
                sh '/usr/local/bin/kubectl apply -f deployment.yaml'
                sh '/usr/local/bin/kubectl rollout restart deployment php-app'
            }
        }
    }
}