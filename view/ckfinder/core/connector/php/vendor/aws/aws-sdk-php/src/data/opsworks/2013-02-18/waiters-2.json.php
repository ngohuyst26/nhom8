<?php
// This file was auto-generated from sdk-root/src/data/opsworks/2013-02-18/waiters-2.json
return ['version' => 2, 'waiters' => ['AppExists' => ['delay' => 1, 'operation' => 'DescribeApps', 'maxAttempts' => 40, 'acceptors' => [['expected' => 200, 'matcher' => 'status', 'state' => 'success',], ['matcher' => 'status', 'expected' => 400, 'state' => 'failure',],],], 'DeploymentSuccessful' => ['delay' => 15, 'operation' => 'DescribeDeployments', 'maxAttempts' => 40, 'description' => 'Wait until a deployment has completed successfully.', 'acceptors' => [['expected' => 'successful', 'matcher' => 'pathAll', 'state' => 'success', 'argument' => 'Deployments[].Status',], ['expected' => 'failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Deployments[].Status',],],], 'InstanceOnline' => ['delay' => 15, 'operation' => 'DescribeInstances', 'maxAttempts' => 40, 'description' => 'Wait until OpsWorks instance is online.', 'acceptors' => [['expected' => 'online', 'matcher' => 'pathAll', 'state' => 'success', 'argument' => 'Instances[].Status',], ['expected' => 'setup_failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'shutting_down', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'start_failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'stopped', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'stopping', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'terminating', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'terminated', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'stop_failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',],],], 'InstanceRegistered' => ['delay' => 15, 'operation' => 'DescribeInstances', 'maxAttempts' => 40, 'description' => 'Wait until OpsWorks instance is registered.', 'acceptors' => [['expected' => 'registered', 'matcher' => 'pathAll', 'state' => 'success', 'argument' => 'Instances[].Status',], ['expected' => 'setup_failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'shutting_down', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'stopped', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'stopping', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'terminating', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'terminated', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'stop_failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',],],], 'InstanceStopped' => ['delay' => 15, 'operation' => 'DescribeInstances', 'maxAttempts' => 40, 'description' => 'Wait until OpsWorks instance is stopped.', 'acceptors' => [['expected' => 'stopped', 'matcher' => 'pathAll', 'state' => 'success', 'argument' => 'Instances[].Status',], ['expected' => 'booting', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'pending', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'rebooting', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'requested', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'running_setup', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'setup_failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'start_failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'stop_failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',],],], 'InstanceTerminated' => ['delay' => 15, 'operation' => 'DescribeInstances', 'maxAttempts' => 40, 'description' => 'Wait until OpsWorks instance is terminated.', 'acceptors' => [['expected' => 'terminated', 'matcher' => 'pathAll', 'state' => 'success', 'argument' => 'Instances[].Status',], ['expected' => 'ResourceNotFoundException', 'matcher' => 'error', 'state' => 'success',], ['expected' => 'booting', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'online', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'pending', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'rebooting', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'requested', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'running_setup', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'setup_failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',], ['expected' => 'start_failed', 'matcher' => 'pathAny', 'state' => 'failure', 'argument' => 'Instances[].Status',],],],],];
