<?php
// This file was auto-generated from sdk-root/src/data/compute-optimizer/2019-11-01/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2019-11-01', 'endpointPrefix' => 'compute-optimizer', 'jsonVersion' => '1.0', 'protocol' => 'json', 'serviceFullName' => 'AWS Compute Optimizer', 'serviceId' => 'Compute Optimizer', 'signatureVersion' => 'v4', 'signingName' => 'compute-optimizer', 'targetPrefix' => 'ComputeOptimizerService', 'uid' => 'compute-optimizer-2019-11-01',], 'operations' => ['DescribeRecommendationExportJobs' => ['name' => 'DescribeRecommendationExportJobs', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'DescribeRecommendationExportJobsRequest',], 'output' => ['shape' => 'DescribeRecommendationExportJobsResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',],],], 'ExportAutoScalingGroupRecommendations' => ['name' => 'ExportAutoScalingGroupRecommendations', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'ExportAutoScalingGroupRecommendationsRequest',], 'output' => ['shape' => 'ExportAutoScalingGroupRecommendationsResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',], ['shape' => 'LimitExceededException',],],], 'ExportEBSVolumeRecommendations' => ['name' => 'ExportEBSVolumeRecommendations', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'ExportEBSVolumeRecommendationsRequest',], 'output' => ['shape' => 'ExportEBSVolumeRecommendationsResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',], ['shape' => 'LimitExceededException',],],], 'ExportEC2InstanceRecommendations' => ['name' => 'ExportEC2InstanceRecommendations', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'ExportEC2InstanceRecommendationsRequest',], 'output' => ['shape' => 'ExportEC2InstanceRecommendationsResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',], ['shape' => 'LimitExceededException',],],], 'ExportLambdaFunctionRecommendations' => ['name' => 'ExportLambdaFunctionRecommendations', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'ExportLambdaFunctionRecommendationsRequest',], 'output' => ['shape' => 'ExportLambdaFunctionRecommendationsResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',], ['shape' => 'LimitExceededException',],],], 'GetAutoScalingGroupRecommendations' => ['name' => 'GetAutoScalingGroupRecommendations', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetAutoScalingGroupRecommendationsRequest',], 'output' => ['shape' => 'GetAutoScalingGroupRecommendationsResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',],],], 'GetEBSVolumeRecommendations' => ['name' => 'GetEBSVolumeRecommendations', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetEBSVolumeRecommendationsRequest',], 'output' => ['shape' => 'GetEBSVolumeRecommendationsResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',],],], 'GetEC2InstanceRecommendations' => ['name' => 'GetEC2InstanceRecommendations', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetEC2InstanceRecommendationsRequest',], 'output' => ['shape' => 'GetEC2InstanceRecommendationsResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',],],], 'GetEC2RecommendationProjectedMetrics' => ['name' => 'GetEC2RecommendationProjectedMetrics', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetEC2RecommendationProjectedMetricsRequest',], 'output' => ['shape' => 'GetEC2RecommendationProjectedMetricsResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',],],], 'GetEnrollmentStatus' => ['name' => 'GetEnrollmentStatus', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetEnrollmentStatusRequest',], 'output' => ['shape' => 'GetEnrollmentStatusResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',],],], 'GetLambdaFunctionRecommendations' => ['name' => 'GetLambdaFunctionRecommendations', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetLambdaFunctionRecommendationsRequest',], 'output' => ['shape' => 'GetLambdaFunctionRecommendationsResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',], ['shape' => 'LimitExceededException',],],], 'GetRecommendationSummaries' => ['name' => 'GetRecommendationSummaries', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetRecommendationSummariesRequest',], 'output' => ['shape' => 'GetRecommendationSummariesResponse',], 'errors' => [['shape' => 'OptInRequiredException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',],],], 'UpdateEnrollmentStatus' => ['name' => 'UpdateEnrollmentStatus', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'UpdateEnrollmentStatusRequest',], 'output' => ['shape' => 'UpdateEnrollmentStatusResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ServiceUnavailableException',], ['shape' => 'AccessDeniedException',], ['shape' => 'InvalidParameterValueException',], ['shape' => 'MissingAuthenticationToken',], ['shape' => 'ThrottlingException',],],],], 'shapes' => ['AccessDeniedException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage',],], 'exception' => true, 'synthetic' => true,], 'AccountId' => ['type' => 'string',], 'AccountIds' => ['type' => 'list', 'member' => ['shape' => 'AccountId',],], 'AutoScalingGroupArn' => ['type' => 'string',], 'AutoScalingGroupArns' => ['type' => 'list', 'member' => ['shape' => 'AutoScalingGroupArn',],], 'AutoScalingGroupConfiguration' => ['type' => 'structure', 'members' => ['desiredCapacity' => ['shape' => 'DesiredCapacity',], 'minSize' => ['shape' => 'MinSize',], 'maxSize' => ['shape' => 'MaxSize',], 'instanceType' => ['shape' => 'InstanceType',],],], 'AutoScalingGroupName' => ['type' => 'string',], 'AutoScalingGroupRecommendation' => ['type' => 'structure', 'members' => ['accountId' => ['shape' => 'AccountId',], 'autoScalingGroupArn' => ['shape' => 'AutoScalingGroupArn',], 'autoScalingGroupName' => ['shape' => 'AutoScalingGroupName',], 'finding' => ['shape' => 'Finding',], 'utilizationMetrics' => ['shape' => 'UtilizationMetrics',], 'lookBackPeriodInDays' => ['shape' => 'LookBackPeriodInDays',], 'currentConfiguration' => ['shape' => 'AutoScalingGroupConfiguration',], 'recommendationOptions' => ['shape' => 'AutoScalingGroupRecommendationOptions',], 'lastRefreshTimestamp' => ['shape' => 'LastRefreshTimestamp',],],], 'AutoScalingGroupRecommendationOption' => ['type' => 'structure', 'members' => ['configuration' => ['shape' => 'AutoScalingGroupConfiguration',], 'projectedUtilizationMetrics' => ['shape' => 'ProjectedUtilizationMetrics',], 'performanceRisk' => ['shape' => 'PerformanceRisk',], 'rank' => ['shape' => 'Rank',],],], 'AutoScalingGroupRecommendationOptions' => ['type' => 'list', 'member' => ['shape' => 'AutoScalingGroupRecommendationOption',],], 'AutoScalingGroupRecommendations' => ['type' => 'list', 'member' => ['shape' => 'AutoScalingGroupRecommendation',],], 'Code' => ['type' => 'string',], 'CreationTimestamp' => ['type' => 'timestamp',], 'CurrentInstanceType' => ['type' => 'string',], 'DescribeRecommendationExportJobsRequest' => ['type' => 'structure', 'members' => ['jobIds' => ['shape' => 'JobIds',], 'filters' => ['shape' => 'JobFilters',], 'nextToken' => ['shape' => 'NextToken',], 'maxResults' => ['shape' => 'MaxResults',],],], 'DescribeRecommendationExportJobsResponse' => ['type' => 'structure', 'members' => ['recommendationExportJobs' => ['shape' => 'RecommendationExportJobs',], 'nextToken' => ['shape' => 'NextToken',],],], 'DesiredCapacity' => ['type' => 'integer',], 'DestinationBucket' => ['type' => 'string',], 'DestinationKey' => ['type' => 'string',], 'DestinationKeyPrefix' => ['type' => 'string',], 'EBSFilter' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'EBSFilterName',], 'values' => ['shape' => 'FilterValues',],],], 'EBSFilterName' => ['type' => 'string', 'enum' => ['Finding',],], 'EBSFilters' => ['type' => 'list', 'member' => ['shape' => 'EBSFilter',],], 'EBSFinding' => ['type' => 'string', 'enum' => ['Optimized', 'NotOptimized',],], 'EBSMetricName' => ['type' => 'string', 'enum' => ['VolumeReadOpsPerSecond', 'VolumeWriteOpsPerSecond', 'VolumeReadBytesPerSecond', 'VolumeWriteBytesPerSecond',],], 'EBSUtilizationMetric' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'EBSMetricName',], 'statistic' => ['shape' => 'MetricStatistic',], 'value' => ['shape' => 'MetricValue',],],], 'EBSUtilizationMetrics' => ['type' => 'list', 'member' => ['shape' => 'EBSUtilizationMetric',],], 'ErrorMessage' => ['type' => 'string',], 'ExportAutoScalingGroupRecommendationsRequest' => ['type' => 'structure', 'required' => ['s3DestinationConfig',], 'members' => ['accountIds' => ['shape' => 'AccountIds',], 'filters' => ['shape' => 'Filters',], 'fieldsToExport' => ['shape' => 'ExportableAutoScalingGroupFields',], 's3DestinationConfig' => ['shape' => 'S3DestinationConfig',], 'fileFormat' => ['shape' => 'FileFormat',], 'includeMemberAccounts' => ['shape' => 'IncludeMemberAccounts',],],], 'ExportAutoScalingGroupRecommendationsResponse' => ['type' => 'structure', 'members' => ['jobId' => ['shape' => 'JobId',], 's3Destination' => ['shape' => 'S3Destination',],],], 'ExportDestination' => ['type' => 'structure', 'members' => ['s3' => ['shape' => 'S3Destination',],],], 'ExportEBSVolumeRecommendationsRequest' => ['type' => 'structure', 'required' => ['s3DestinationConfig',], 'members' => ['accountIds' => ['shape' => 'AccountIds',], 'filters' => ['shape' => 'EBSFilters',], 'fieldsToExport' => ['shape' => 'ExportableVolumeFields',], 's3DestinationConfig' => ['shape' => 'S3DestinationConfig',], 'fileFormat' => ['shape' => 'FileFormat',], 'includeMemberAccounts' => ['shape' => 'IncludeMemberAccounts',],],], 'ExportEBSVolumeRecommendationsResponse' => ['type' => 'structure', 'members' => ['jobId' => ['shape' => 'JobId',], 's3Destination' => ['shape' => 'S3Destination',],],], 'ExportEC2InstanceRecommendationsRequest' => ['type' => 'structure', 'required' => ['s3DestinationConfig',], 'members' => ['accountIds' => ['shape' => 'AccountIds',], 'filters' => ['shape' => 'Filters',], 'fieldsToExport' => ['shape' => 'ExportableInstanceFields',], 's3DestinationConfig' => ['shape' => 'S3DestinationConfig',], 'fileFormat' => ['shape' => 'FileFormat',], 'includeMemberAccounts' => ['shape' => 'IncludeMemberAccounts',],],], 'ExportEC2InstanceRecommendationsResponse' => ['type' => 'structure', 'members' => ['jobId' => ['shape' => 'JobId',], 's3Destination' => ['shape' => 'S3Destination',],],], 'ExportLambdaFunctionRecommendationsRequest' => ['type' => 'structure', 'required' => ['s3DestinationConfig',], 'members' => ['accountIds' => ['shape' => 'AccountIds',], 'filters' => ['shape' => 'LambdaFunctionRecommendationFilters',], 'fieldsToExport' => ['shape' => 'ExportableLambdaFunctionFields',], 's3DestinationConfig' => ['shape' => 'S3DestinationConfig',], 'fileFormat' => ['shape' => 'FileFormat',], 'includeMemberAccounts' => ['shape' => 'IncludeMemberAccounts',],],], 'ExportLambdaFunctionRecommendationsResponse' => ['type' => 'structure', 'members' => ['jobId' => ['shape' => 'JobId',], 's3Destination' => ['shape' => 'S3Destination',],],], 'ExportableAutoScalingGroupField' => ['type' => 'string', 'enum' => ['AccountId', 'AutoScalingGroupArn', 'AutoScalingGroupName', 'Finding', 'UtilizationMetricsCpuMaximum', 'UtilizationMetricsMemoryMaximum', 'UtilizationMetricsEbsReadOpsPerSecondMaximum', 'UtilizationMetricsEbsWriteOpsPerSecondMaximum', 'UtilizationMetricsEbsReadBytesPerSecondMaximum', 'UtilizationMetricsEbsWriteBytesPerSecondMaximum', 'UtilizationMetricsDiskReadOpsPerSecondMaximum', 'UtilizationMetricsDiskWriteOpsPerSecondMaximum', 'UtilizationMetricsDiskReadBytesPerSecondMaximum', 'UtilizationMetricsDiskWriteBytesPerSecondMaximum', 'UtilizationMetricsNetworkInBytesPerSecondMaximum', 'UtilizationMetricsNetworkOutBytesPerSecondMaximum', 'UtilizationMetricsNetworkPacketsInPerSecondMaximum', 'UtilizationMetricsNetworkPacketsOutPerSecondMaximum', 'LookbackPeriodInDays', 'CurrentConfigurationInstanceType', 'CurrentConfigurationDesiredCapacity', 'CurrentConfigurationMinSize', 'CurrentConfigurationMaxSize', 'CurrentOnDemandPrice', 'CurrentStandardOneYearNoUpfrontReservedPrice', 'CurrentStandardThreeYearNoUpfrontReservedPrice', 'CurrentVCpus', 'CurrentMemory', 'CurrentStorage', 'CurrentNetwork', 'RecommendationOptionsConfigurationInstanceType', 'RecommendationOptionsConfigurationDesiredCapacity', 'RecommendationOptionsConfigurationMinSize', 'RecommendationOptionsConfigurationMaxSize', 'RecommendationOptionsProjectedUtilizationMetricsCpuMaximum', 'RecommendationOptionsProjectedUtilizationMetricsMemoryMaximum', 'RecommendationOptionsPerformanceRisk', 'RecommendationOptionsOnDemandPrice', 'RecommendationOptionsStandardOneYearNoUpfrontReservedPrice', 'RecommendationOptionsStandardThreeYearNoUpfrontReservedPrice', 'RecommendationOptionsVcpus', 'RecommendationOptionsMemory', 'RecommendationOptionsStorage', 'RecommendationOptionsNetwork', 'LastRefreshTimestamp',],], 'ExportableAutoScalingGroupFields' => ['type' => 'list', 'member' => ['shape' => 'ExportableAutoScalingGroupField',],], 'ExportableInstanceField' => ['type' => 'string', 'enum' => ['AccountId', 'InstanceArn', 'InstanceName', 'Finding', 'FindingReasonCodes', 'LookbackPeriodInDays', 'CurrentInstanceType', 'UtilizationMetricsCpuMaximum', 'UtilizationMetricsMemoryMaximum', 'UtilizationMetricsEbsReadOpsPerSecondMaximum', 'UtilizationMetricsEbsWriteOpsPerSecondMaximum', 'UtilizationMetricsEbsReadBytesPerSecondMaximum', 'UtilizationMetricsEbsWriteBytesPerSecondMaximum', 'UtilizationMetricsDiskReadOpsPerSecondMaximum', 'UtilizationMetricsDiskWriteOpsPerSecondMaximum', 'UtilizationMetricsDiskReadBytesPerSecondMaximum', 'UtilizationMetricsDiskWriteBytesPerSecondMaximum', 'UtilizationMetricsNetworkInBytesPerSecondMaximum', 'UtilizationMetricsNetworkOutBytesPerSecondMaximum', 'UtilizationMetricsNetworkPacketsInPerSecondMaximum', 'UtilizationMetricsNetworkPacketsOutPerSecondMaximum', 'CurrentOnDemandPrice', 'CurrentStandardOneYearNoUpfrontReservedPrice', 'CurrentStandardThreeYearNoUpfrontReservedPrice', 'CurrentVCpus', 'CurrentMemory', 'CurrentStorage', 'CurrentNetwork', 'RecommendationOptionsInstanceType', 'RecommendationOptionsProjectedUtilizationMetricsCpuMaximum', 'RecommendationOptionsProjectedUtilizationMetricsMemoryMaximum', 'RecommendationOptionsPlatformDifferences', 'RecommendationOptionsPerformanceRisk', 'RecommendationOptionsVcpus', 'RecommendationOptionsMemory', 'RecommendationOptionsStorage', 'RecommendationOptionsNetwork', 'RecommendationOptionsOnDemandPrice', 'RecommendationOptionsStandardOneYearNoUpfrontReservedPrice', 'RecommendationOptionsStandardThreeYearNoUpfrontReservedPrice', 'RecommendationsSourcesRecommendationSourceArn', 'RecommendationsSourcesRecommendationSourceType', 'LastRefreshTimestamp',],], 'ExportableInstanceFields' => ['type' => 'list', 'member' => ['shape' => 'ExportableInstanceField',],], 'ExportableLambdaFunctionField' => ['type' => 'string', 'enum' => ['AccountId', 'FunctionArn', 'FunctionVersion', 'Finding', 'FindingReasonCodes', 'NumberOfInvocations', 'UtilizationMetricsDurationMaximum', 'UtilizationMetricsDurationAverage', 'UtilizationMetricsMemoryMaximum', 'UtilizationMetricsMemoryAverage', 'LookbackPeriodInDays', 'CurrentConfigurationMemorySize', 'CurrentConfigurationTimeout', 'CurrentCostTotal', 'CurrentCostAverage', 'RecommendationOptionsConfigurationMemorySize', 'RecommendationOptionsCostLow', 'RecommendationOptionsCostHigh', 'RecommendationOptionsProjectedUtilizationMetricsDurationLowerBound', 'RecommendationOptionsProjectedUtilizationMetricsDurationUpperBound', 'RecommendationOptionsProjectedUtilizationMetricsDurationExpected', 'LastRefreshTimestamp',],], 'ExportableLambdaFunctionFields' => ['type' => 'list', 'member' => ['shape' => 'ExportableLambdaFunctionField',],], 'ExportableVolumeField' => ['type' => 'string', 'enum' => ['AccountId', 'VolumeArn', 'Finding', 'UtilizationMetricsVolumeReadOpsPerSecondMaximum', 'UtilizationMetricsVolumeWriteOpsPerSecondMaximum', 'UtilizationMetricsVolumeReadBytesPerSecondMaximum', 'UtilizationMetricsVolumeWriteBytesPerSecondMaximum', 'LookbackPeriodInDays', 'CurrentConfigurationVolumeType', 'CurrentConfigurationVolumeBaselineIOPS', 'CurrentConfigurationVolumeBaselineThroughput', 'CurrentConfigurationVolumeBurstIOPS', 'CurrentConfigurationVolumeBurstThroughput', 'CurrentConfigurationVolumeSize', 'CurrentMonthlyPrice', 'RecommendationOptionsConfigurationVolumeType', 'RecommendationOptionsConfigurationVolumeBaselineIOPS', 'RecommendationOptionsConfigurationVolumeBaselineThroughput', 'RecommendationOptionsConfigurationVolumeBurstIOPS', 'RecommendationOptionsConfigurationVolumeBurstThroughput', 'RecommendationOptionsConfigurationVolumeSize', 'RecommendationOptionsMonthlyPrice', 'RecommendationOptionsPerformanceRisk', 'LastRefreshTimestamp',],], 'ExportableVolumeFields' => ['type' => 'list', 'member' => ['shape' => 'ExportableVolumeField',],], 'FailureReason' => ['type' => 'string',], 'FileFormat' => ['type' => 'string', 'enum' => ['Csv',],], 'Filter' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'FilterName',], 'values' => ['shape' => 'FilterValues',],],], 'FilterName' => ['type' => 'string', 'enum' => ['Finding', 'FindingReasonCodes', 'RecommendationSourceType',],], 'FilterValue' => ['type' => 'string',], 'FilterValues' => ['type' => 'list', 'member' => ['shape' => 'FilterValue',],], 'Filters' => ['type' => 'list', 'member' => ['shape' => 'Filter',],], 'Finding' => ['type' => 'string', 'enum' => ['Underprovisioned', 'Overprovisioned', 'Optimized', 'NotOptimized',],], 'FindingReasonCode' => ['type' => 'string', 'enum' => ['MemoryOverprovisioned', 'MemoryUnderprovisioned',],], 'FunctionArn' => ['type' => 'string',], 'FunctionArns' => ['type' => 'list', 'member' => ['shape' => 'FunctionArn',],], 'FunctionVersion' => ['type' => 'string',], 'GetAutoScalingGroupRecommendationsRequest' => ['type' => 'structure', 'members' => ['accountIds' => ['shape' => 'AccountIds',], 'autoScalingGroupArns' => ['shape' => 'AutoScalingGroupArns',], 'nextToken' => ['shape' => 'NextToken',], 'maxResults' => ['shape' => 'MaxResults',], 'filters' => ['shape' => 'Filters',],],], 'GetAutoScalingGroupRecommendationsResponse' => ['type' => 'structure', 'members' => ['nextToken' => ['shape' => 'NextToken',], 'autoScalingGroupRecommendations' => ['shape' => 'AutoScalingGroupRecommendations',], 'errors' => ['shape' => 'GetRecommendationErrors',],],], 'GetEBSVolumeRecommendationsRequest' => ['type' => 'structure', 'members' => ['volumeArns' => ['shape' => 'VolumeArns',], 'nextToken' => ['shape' => 'NextToken',], 'maxResults' => ['shape' => 'MaxResults',], 'filters' => ['shape' => 'EBSFilters',], 'accountIds' => ['shape' => 'AccountIds',],],], 'GetEBSVolumeRecommendationsResponse' => ['type' => 'structure', 'members' => ['nextToken' => ['shape' => 'NextToken',], 'volumeRecommendations' => ['shape' => 'VolumeRecommendations',], 'errors' => ['shape' => 'GetRecommendationErrors',],],], 'GetEC2InstanceRecommendationsRequest' => ['type' => 'structure', 'members' => ['instanceArns' => ['shape' => 'InstanceArns',], 'nextToken' => ['shape' => 'NextToken',], 'maxResults' => ['shape' => 'MaxResults',], 'filters' => ['shape' => 'Filters',], 'accountIds' => ['shape' => 'AccountIds',],],], 'GetEC2InstanceRecommendationsResponse' => ['type' => 'structure', 'members' => ['nextToken' => ['shape' => 'NextToken',], 'instanceRecommendations' => ['shape' => 'InstanceRecommendations',], 'errors' => ['shape' => 'GetRecommendationErrors',],],], 'GetEC2RecommendationProjectedMetricsRequest' => ['type' => 'structure', 'required' => ['instanceArn', 'stat', 'period', 'startTime', 'endTime',], 'members' => ['instanceArn' => ['shape' => 'InstanceArn',], 'stat' => ['shape' => 'MetricStatistic',], 'period' => ['shape' => 'Period',], 'startTime' => ['shape' => 'Timestamp',], 'endTime' => ['shape' => 'Timestamp',],],], 'GetEC2RecommendationProjectedMetricsResponse' => ['type' => 'structure', 'members' => ['recommendedOptionProjectedMetrics' => ['shape' => 'RecommendedOptionProjectedMetrics',],],], 'GetEnrollmentStatusRequest' => ['type' => 'structure', 'members' => [],], 'GetEnrollmentStatusResponse' => ['type' => 'structure', 'members' => ['status' => ['shape' => 'Status',], 'statusReason' => ['shape' => 'StatusReason',], 'memberAccountsEnrolled' => ['shape' => 'MemberAccountsEnrolled',],],], 'GetLambdaFunctionRecommendationsRequest' => ['type' => 'structure', 'members' => ['functionArns' => ['shape' => 'FunctionArns',], 'accountIds' => ['shape' => 'AccountIds',], 'filters' => ['shape' => 'LambdaFunctionRecommendationFilters',], 'nextToken' => ['shape' => 'NextToken',], 'maxResults' => ['shape' => 'MaxResults',],],], 'GetLambdaFunctionRecommendationsResponse' => ['type' => 'structure', 'members' => ['nextToken' => ['shape' => 'NextToken',], 'lambdaFunctionRecommendations' => ['shape' => 'LambdaFunctionRecommendations',],],], 'GetRecommendationError' => ['type' => 'structure', 'members' => ['identifier' => ['shape' => 'Identifier',], 'code' => ['shape' => 'Code',], 'message' => ['shape' => 'Message',],],], 'GetRecommendationErrors' => ['type' => 'list', 'member' => ['shape' => 'GetRecommendationError',],], 'GetRecommendationSummariesRequest' => ['type' => 'structure', 'members' => ['accountIds' => ['shape' => 'AccountIds',], 'nextToken' => ['shape' => 'NextToken',], 'maxResults' => ['shape' => 'MaxResults',],],], 'GetRecommendationSummariesResponse' => ['type' => 'structure', 'members' => ['nextToken' => ['shape' => 'NextToken',], 'recommendationSummaries' => ['shape' => 'RecommendationSummaries',],],], 'Identifier' => ['type' => 'string',], 'IncludeMemberAccounts' => ['type' => 'boolean',], 'InstanceArn' => ['type' => 'string',], 'InstanceArns' => ['type' => 'list', 'member' => ['shape' => 'InstanceArn',],], 'InstanceName' => ['type' => 'string',], 'InstanceRecommendation' => ['type' => 'structure', 'members' => ['instanceArn' => ['shape' => 'InstanceArn',], 'accountId' => ['shape' => 'AccountId',], 'instanceName' => ['shape' => 'InstanceName',], 'currentInstanceType' => ['shape' => 'CurrentInstanceType',], 'finding' => ['shape' => 'Finding',], 'findingReasonCodes' => ['shape' => 'InstanceRecommendationFindingReasonCodes',], 'utilizationMetrics' => ['shape' => 'UtilizationMetrics',], 'lookBackPeriodInDays' => ['shape' => 'LookBackPeriodInDays',], 'recommendationOptions' => ['shape' => 'RecommendationOptions',], 'recommendationSources' => ['shape' => 'RecommendationSources',], 'lastRefreshTimestamp' => ['shape' => 'LastRefreshTimestamp',],],], 'InstanceRecommendationFindingReasonCode' => ['type' => 'string', 'enum' => ['CPUOverprovisioned', 'CPUUnderprovisioned', 'MemoryOverprovisioned', 'MemoryUnderprovisioned', 'EBSThroughputOverprovisioned', 'EBSThroughputUnderprovisioned', 'EBSIOPSOverprovisioned', 'EBSIOPSUnderprovisioned', 'NetworkBandwidthOverprovisioned', 'NetworkBandwidthUnderprovisioned', 'NetworkPPSOverprovisioned', 'NetworkPPSUnderprovisioned', 'DiskIOPSOverprovisioned', 'DiskIOPSUnderprovisioned', 'DiskThroughputOverprovisioned', 'DiskThroughputUnderprovisioned',],], 'InstanceRecommendationFindingReasonCodes' => ['type' => 'list', 'member' => ['shape' => 'InstanceRecommendationFindingReasonCode',],], 'InstanceRecommendationOption' => ['type' => 'structure', 'members' => ['instanceType' => ['shape' => 'InstanceType',], 'projectedUtilizationMetrics' => ['shape' => 'ProjectedUtilizationMetrics',], 'platformDifferences' => ['shape' => 'PlatformDifferences',], 'performanceRisk' => ['shape' => 'PerformanceRisk',], 'rank' => ['shape' => 'Rank',],],], 'InstanceRecommendations' => ['type' => 'list', 'member' => ['shape' => 'InstanceRecommendation',],], 'InstanceType' => ['type' => 'string',], 'InternalServerException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage',],], 'exception' => true, 'fault' => true,], 'InvalidParameterValueException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage',],], 'exception' => true, 'synthetic' => true,], 'JobFilter' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'JobFilterName',], 'values' => ['shape' => 'FilterValues',],],], 'JobFilterName' => ['type' => 'string', 'enum' => ['ResourceType', 'JobStatus',],], 'JobFilters' => ['type' => 'list', 'member' => ['shape' => 'JobFilter',],], 'JobId' => ['type' => 'string',], 'JobIds' => ['type' => 'list', 'member' => ['shape' => 'JobId',],], 'JobStatus' => ['type' => 'string', 'enum' => ['Queued', 'InProgress', 'Complete', 'Failed',],], 'LambdaFunctionMemoryMetricName' => ['type' => 'string', 'enum' => ['Duration',],], 'LambdaFunctionMemoryMetricStatistic' => ['type' => 'string', 'enum' => ['LowerBound', 'UpperBound', 'Expected',],], 'LambdaFunctionMemoryProjectedMetric' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'LambdaFunctionMemoryMetricName',], 'statistic' => ['shape' => 'LambdaFunctionMemoryMetricStatistic',], 'value' => ['shape' => 'MetricValue',],],], 'LambdaFunctionMemoryProjectedMetrics' => ['type' => 'list', 'member' => ['shape' => 'LambdaFunctionMemoryProjectedMetric',],], 'LambdaFunctionMemoryRecommendationOption' => ['type' => 'structure', 'members' => ['rank' => ['shape' => 'Rank',], 'memorySize' => ['shape' => 'MemorySize',], 'projectedUtilizationMetrics' => ['shape' => 'LambdaFunctionMemoryProjectedMetrics',],],], 'LambdaFunctionMemoryRecommendationOptions' => ['type' => 'list', 'member' => ['shape' => 'LambdaFunctionMemoryRecommendationOption',],], 'LambdaFunctionMetricName' => ['type' => 'string', 'enum' => ['Duration', 'Memory',],], 'LambdaFunctionMetricStatistic' => ['type' => 'string', 'enum' => ['Maximum', 'Average',],], 'LambdaFunctionRecommendation' => ['type' => 'structure', 'members' => ['functionArn' => ['shape' => 'FunctionArn',], 'functionVersion' => ['shape' => 'FunctionVersion',], 'accountId' => ['shape' => 'AccountId',], 'currentMemorySize' => ['shape' => 'MemorySize',], 'numberOfInvocations' => ['shape' => 'NumberOfInvocations',], 'utilizationMetrics' => ['shape' => 'LambdaFunctionUtilizationMetrics',], 'lookbackPeriodInDays' => ['shape' => 'LookBackPeriodInDays',], 'lastRefreshTimestamp' => ['shape' => 'LastRefreshTimestamp',], 'finding' => ['shape' => 'LambdaFunctionRecommendationFinding',], 'findingReasonCodes' => ['shape' => 'LambdaFunctionRecommendationFindingReasonCodes',], 'memorySizeRecommendationOptions' => ['shape' => 'LambdaFunctionMemoryRecommendationOptions',],],], 'LambdaFunctionRecommendationFilter' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'LambdaFunctionRecommendationFilterName',], 'values' => ['shape' => 'FilterValues',],],], 'LambdaFunctionRecommendationFilterName' => ['type' => 'string', 'enum' => ['Finding', 'FindingReasonCode',],], 'LambdaFunctionRecommendationFilters' => ['type' => 'list', 'member' => ['shape' => 'LambdaFunctionRecommendationFilter',],], 'LambdaFunctionRecommendationFinding' => ['type' => 'string', 'enum' => ['Optimized', 'NotOptimized', 'Unavailable',],], 'LambdaFunctionRecommendationFindingReasonCode' => ['type' => 'string', 'enum' => ['MemoryOverprovisioned', 'MemoryUnderprovisioned', 'InsufficientData', 'Inconclusive',],], 'LambdaFunctionRecommendationFindingReasonCodes' => ['type' => 'list', 'member' => ['shape' => 'LambdaFunctionRecommendationFindingReasonCode',],], 'LambdaFunctionRecommendations' => ['type' => 'list', 'member' => ['shape' => 'LambdaFunctionRecommendation',],], 'LambdaFunctionUtilizationMetric' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'LambdaFunctionMetricName',], 'statistic' => ['shape' => 'LambdaFunctionMetricStatistic',], 'value' => ['shape' => 'MetricValue',],],], 'LambdaFunctionUtilizationMetrics' => ['type' => 'list', 'member' => ['shape' => 'LambdaFunctionUtilizationMetric',],], 'LastRefreshTimestamp' => ['type' => 'timestamp',], 'LastUpdatedTimestamp' => ['type' => 'timestamp',], 'LimitExceededException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage',],], 'exception' => true, 'synthetic' => true,], 'LookBackPeriodInDays' => ['type' => 'double',], 'MaxResults' => ['type' => 'integer', 'box' => true,], 'MaxSize' => ['type' => 'integer',], 'MemberAccountsEnrolled' => ['type' => 'boolean',], 'MemorySize' => ['type' => 'integer',], 'Message' => ['type' => 'string',], 'MetadataKey' => ['type' => 'string',], 'MetricName' => ['type' => 'string', 'enum' => ['Cpu', 'Memory', 'EBS_READ_OPS_PER_SECOND', 'EBS_WRITE_OPS_PER_SECOND', 'EBS_READ_BYTES_PER_SECOND', 'EBS_WRITE_BYTES_PER_SECOND', 'DISK_READ_OPS_PER_SECOND', 'DISK_WRITE_OPS_PER_SECOND', 'DISK_READ_BYTES_PER_SECOND', 'DISK_WRITE_BYTES_PER_SECOND', 'NETWORK_IN_BYTES_PER_SECOND', 'NETWORK_OUT_BYTES_PER_SECOND', 'NETWORK_PACKETS_IN_PER_SECOND', 'NETWORK_PACKETS_OUT_PER_SECOND',],], 'MetricStatistic' => ['type' => 'string', 'enum' => ['Maximum', 'Average',],], 'MetricValue' => ['type' => 'double',], 'MetricValues' => ['type' => 'list', 'member' => ['shape' => 'MetricValue',],], 'MinSize' => ['type' => 'integer',], 'MissingAuthenticationToken' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage',],], 'exception' => true, 'synthetic' => true,], 'NextToken' => ['type' => 'string',], 'NumberOfInvocations' => ['type' => 'long',], 'OptInRequiredException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage',],], 'exception' => true, 'synthetic' => true,], 'PerformanceRisk' => ['type' => 'double', 'max' => 5, 'min' => 0,], 'Period' => ['type' => 'integer',], 'PlatformDifference' => ['type' => 'string', 'enum' => ['Hypervisor', 'NetworkInterface', 'StorageInterface', 'InstanceStoreAvailability', 'VirtualizationType',],], 'PlatformDifferences' => ['type' => 'list', 'member' => ['shape' => 'PlatformDifference',],], 'ProjectedMetric' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'MetricName',], 'timestamps' => ['shape' => 'Timestamps',], 'values' => ['shape' => 'MetricValues',],],], 'ProjectedMetrics' => ['type' => 'list', 'member' => ['shape' => 'ProjectedMetric',],], 'ProjectedUtilizationMetrics' => ['type' => 'list', 'member' => ['shape' => 'UtilizationMetric',],], 'Rank' => ['type' => 'integer',], 'ReasonCodeSummaries' => ['type' => 'list', 'member' => ['shape' => 'ReasonCodeSummary',],], 'ReasonCodeSummary' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'FindingReasonCode',], 'value' => ['shape' => 'SummaryValue',],],], 'RecommendationExportJob' => ['type' => 'structure', 'members' => ['jobId' => ['shape' => 'JobId',], 'destination' => ['shape' => 'ExportDestination',], 'resourceType' => ['shape' => 'ResourceType',], 'status' => ['shape' => 'JobStatus',], 'creationTimestamp' => ['shape' => 'CreationTimestamp',], 'lastUpdatedTimestamp' => ['shape' => 'LastUpdatedTimestamp',], 'failureReason' => ['shape' => 'FailureReason',],],], 'RecommendationExportJobs' => ['type' => 'list', 'member' => ['shape' => 'RecommendationExportJob',],], 'RecommendationOptions' => ['type' => 'list', 'member' => ['shape' => 'InstanceRecommendationOption',],], 'RecommendationSource' => ['type' => 'structure', 'members' => ['recommendationSourceArn' => ['shape' => 'RecommendationSourceArn',], 'recommendationSourceType' => ['shape' => 'RecommendationSourceType',],],], 'RecommendationSourceArn' => ['type' => 'string',], 'RecommendationSourceType' => ['type' => 'string', 'enum' => ['Ec2Instance', 'AutoScalingGroup', 'EbsVolume', 'LambdaFunction',],], 'RecommendationSources' => ['type' => 'list', 'member' => ['shape' => 'RecommendationSource',],], 'RecommendationSummaries' => ['type' => 'list', 'member' => ['shape' => 'RecommendationSummary',],], 'RecommendationSummary' => ['type' => 'structure', 'members' => ['summaries' => ['shape' => 'Summaries',], 'recommendationResourceType' => ['shape' => 'RecommendationSourceType',], 'accountId' => ['shape' => 'AccountId',],],], 'RecommendedInstanceType' => ['type' => 'string',], 'RecommendedOptionProjectedMetric' => ['type' => 'structure', 'members' => ['recommendedInstanceType' => ['shape' => 'RecommendedInstanceType',], 'rank' => ['shape' => 'Rank',], 'projectedMetrics' => ['shape' => 'ProjectedMetrics',],],], 'RecommendedOptionProjectedMetrics' => ['type' => 'list', 'member' => ['shape' => 'RecommendedOptionProjectedMetric',],], 'ResourceNotFoundException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage',],], 'exception' => true, 'synthetic' => true,], 'ResourceType' => ['type' => 'string', 'enum' => ['Ec2Instance', 'AutoScalingGroup', 'EbsVolume', 'LambdaFunction',],], 'S3Destination' => ['type' => 'structure', 'members' => ['bucket' => ['shape' => 'DestinationBucket',], 'key' => ['shape' => 'DestinationKey',], 'metadataKey' => ['shape' => 'MetadataKey',],],], 'S3DestinationConfig' => ['type' => 'structure', 'members' => ['bucket' => ['shape' => 'DestinationBucket',], 'keyPrefix' => ['shape' => 'DestinationKeyPrefix',],],], 'ServiceUnavailableException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage',],], 'exception' => true, 'fault' => true,], 'Status' => ['type' => 'string', 'enum' => ['Active', 'Inactive', 'Pending', 'Failed',],], 'StatusReason' => ['type' => 'string',], 'Summaries' => ['type' => 'list', 'member' => ['shape' => 'Summary',],], 'Summary' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'Finding',], 'value' => ['shape' => 'SummaryValue',], 'reasonCodeSummaries' => ['shape' => 'ReasonCodeSummaries',],],], 'SummaryValue' => ['type' => 'double',], 'ThrottlingException' => ['type' => 'structure', 'required' => ['message',], 'members' => ['message' => ['shape' => 'ErrorMessage',],], 'exception' => true, 'synthetic' => true,], 'Timestamp' => ['type' => 'timestamp',], 'Timestamps' => ['type' => 'list', 'member' => ['shape' => 'Timestamp',],], 'UpdateEnrollmentStatusRequest' => ['type' => 'structure', 'required' => ['status',], 'members' => ['status' => ['shape' => 'Status',], 'includeMemberAccounts' => ['shape' => 'IncludeMemberAccounts',],],], 'UpdateEnrollmentStatusResponse' => ['type' => 'structure', 'members' => ['status' => ['shape' => 'Status',], 'statusReason' => ['shape' => 'StatusReason',],],], 'UtilizationMetric' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'MetricName',], 'statistic' => ['shape' => 'MetricStatistic',], 'value' => ['shape' => 'MetricValue',],],], 'UtilizationMetrics' => ['type' => 'list', 'member' => ['shape' => 'UtilizationMetric',],], 'VolumeArn' => ['type' => 'string',], 'VolumeArns' => ['type' => 'list', 'member' => ['shape' => 'VolumeArn',],], 'VolumeBaselineIOPS' => ['type' => 'integer',], 'VolumeBaselineThroughput' => ['type' => 'integer',], 'VolumeBurstIOPS' => ['type' => 'integer',], 'VolumeBurstThroughput' => ['type' => 'integer',], 'VolumeConfiguration' => ['type' => 'structure', 'members' => ['volumeType' => ['shape' => 'VolumeType',], 'volumeSize' => ['shape' => 'VolumeSize',], 'volumeBaselineIOPS' => ['shape' => 'VolumeBaselineIOPS',], 'volumeBurstIOPS' => ['shape' => 'VolumeBurstIOPS',], 'volumeBaselineThroughput' => ['shape' => 'VolumeBaselineThroughput',], 'volumeBurstThroughput' => ['shape' => 'VolumeBurstThroughput',],],], 'VolumeRecommendation' => ['type' => 'structure', 'members' => ['volumeArn' => ['shape' => 'VolumeArn',], 'accountId' => ['shape' => 'AccountId',], 'currentConfiguration' => ['shape' => 'VolumeConfiguration',], 'finding' => ['shape' => 'EBSFinding',], 'utilizationMetrics' => ['shape' => 'EBSUtilizationMetrics',], 'lookBackPeriodInDays' => ['shape' => 'LookBackPeriodInDays',], 'volumeRecommendationOptions' => ['shape' => 'VolumeRecommendationOptions',], 'lastRefreshTimestamp' => ['shape' => 'LastRefreshTimestamp',],],], 'VolumeRecommendationOption' => ['type' => 'structure', 'members' => ['configuration' => ['shape' => 'VolumeConfiguration',], 'performanceRisk' => ['shape' => 'PerformanceRisk',], 'rank' => ['shape' => 'Rank',],],], 'VolumeRecommendationOptions' => ['type' => 'list', 'member' => ['shape' => 'VolumeRecommendationOption',],], 'VolumeRecommendations' => ['type' => 'list', 'member' => ['shape' => 'VolumeRecommendation',],], 'VolumeSize' => ['type' => 'integer',], 'VolumeType' => ['type' => 'string',],],];
