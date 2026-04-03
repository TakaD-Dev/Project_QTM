FROM jenkins/jenkins:lts-jdk17

USER root
RUN apt-get update && apt-get install -y sudo && rm -rf /var/lib/apt/lists/*
RUN echo "jenkins ALL=(ALL) NOPASSWD: /usr/local/bin/k3s" >> /etc/sudoers.d/jenkins
RUN chmod 0440 /etc/sudoers.d/jenkins

USER jenkins
