node('master') {
  // env.JAVA_HOME = tool 'jdk8'

  env.PATH = "${env.JENKINS_HOME}/bin:${env.PATH}"
  dir('civiReconciler') {
    checkout scm
    stage('Get Ansible Roles') {
      sh('#!/bin/sh -e\n' + 'rm -rf ansible/roles')
      sh('#!/bin/sh -e\n' + 'ansible-galaxy install -r ansible/requirements.yml -p ansible/roles/ -f')
      sh('#!/bin/sh -e\n' + 'rm -f ../civiReconciler.zip');
      sh('#!/bin/sh -e\n' + 'rm -f ../civiReconciler*.rpm');
      sh('#!/bin/sh -e\n' + 'rm -f ../civireconciler*.deb');
    }
    stage('Provision civiReconciler Service') {
      docker.withServer('tcp://172.17.0.1:4243', 'jerkins-client-certs-signed-by-docker-ca') {
        sh('#!/bin/sh -e\n' + "ansible-playbook -i ansible/roles/inventory/${env.DEPLOY_ENV.toLowerCase()}/hosts -c local --vault-password-file=${env.DEPLOY_KEY} ansible/playbook.yml --extra-vars 'target_hosts=localhost group_hosts=${env.DEPLOY_HOST} java_home=${env.JAVA_HOME} deploy_env=${env.DEPLOY_ENV} package_revision=${env.BUILD_NUMBER} workspace=${env.WORKSPACE} bintray_api_key=${env.BINTRAY_API_KEY} gather_facts=yes' -t provision")
      }
    }
    stage('Deploy civiReconciler Service') {
      docker.withServer('tcp://172.17.0.1:4243', 'jerkins-client-certs-signed-by-docker-ca') {
        sh('#!/bin/sh -e\n' + "ansible-playbook -i ansible/roles/inventory/${env.DEPLOY_ENV.toLowerCase()}/hosts --user=root --vault-password-file=${env.DEPLOY_KEY} ansible/playbook.yml --extra-vars 'target_hosts=${env.DEPLOY_HOST} java_home=${env.JAVA_HOME} deploy_env=${env.DEPLOY_ENV} vault_password_file=${env.DEPLOY_KEY} package_revision=${env.BUILD_NUMBER} workspace=${env.WORKSPACE} bintray_api_key=${env.BINTRAY_API_KEY} gather_facts=no' -b -t deploy -vvvv")
      }
    }
  }
  stage('Archive RPM artifact') {
    archiveArtifacts artifacts: 'civiReconciler*.rpm'
    archiveArtifacts artifacts: 'civireconciler*.deb'
  } 
}

