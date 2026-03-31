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
                sh 'kubectl apply -f deployment.yaml'
            }
        }
    }
}