pipeline {
    agent any
    stages {
        stage('Build & Package') {
            steps {
                sh 'docker build -t my-web-final:latest .'
            }
        }
        stage('Deploy') {
            steps {
                sh 'kubectl apply -f deployment.yaml'
                sh 'kubectl rollout restart deployment php-app'
            }
        }
    }
}
