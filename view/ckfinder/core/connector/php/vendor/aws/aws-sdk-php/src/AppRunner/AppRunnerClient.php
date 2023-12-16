<?php

namespace Aws\AppRunner;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS App Runner** service.
 * @method \Aws\Result associateCustomDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateCustomDomainAsync(array $args = [])
 * @method \Aws\Result createAutoScalingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutoScalingConfigurationAsync(array $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @method \Aws\Result createService(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @method \Aws\Result deleteAutoScalingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutoScalingConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @method \Aws\Result deleteService(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @method \Aws\Result describeAutoScalingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutoScalingConfigurationAsync(array $args = [])
 * @method \Aws\Result describeCustomDomains(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomDomainsAsync(array $args = [])
 * @method \Aws\Result describeService(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceAsync(array $args = [])
 * @method \Aws\Result disassociateCustomDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateCustomDomainAsync(array $args = [])
 * @method \Aws\Result listAutoScalingConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutoScalingConfigurationsAsync(array $args = [])
 * @method \Aws\Result listConnections(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionsAsync(array $args = [])
 * @method \Aws\Result listOperations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listOperationsAsync(array $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result pauseService(array $args = [])
 * @method \GuzzleHttp\Promise\Promise pauseServiceAsync(array $args = [])
 * @method \Aws\Result resumeService(array $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeServiceAsync(array $args = [])
 * @method \Aws\Result startDeployment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startDeploymentAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateService(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceAsync(array $args = [])
 */
class AppRunnerClient extends AwsClient
{
}
