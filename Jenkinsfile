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
                sh 'kubectl apply -f deployment.yaml'
                sh 'kubectl rollout restart deployment/php-app'
            }
        }
    }
}
