<?php
// This file was auto-generated from sdk-root/src/data/synthetics/2017-10-11/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2017-10-11', 'endpointPrefix' => 'synthetics', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Synthetics', 'serviceFullName' => 'Synthetics', 'serviceId' => 'synthetics', 'signatureVersion' => 'v4', 'signingName' => 'synthetics', 'uid' => 'synthetics-2017-10-11',], 'operations' => ['CreateCanary' => ['name' => 'CreateCanary', 'http' => ['method' => 'POST', 'requestUri' => '/canary',], 'input' => ['shape' => 'CreateCanaryRequest',], 'output' => ['shape' => 'CreateCanaryResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ValidationException',],],], 'DeleteCanary' => ['name' => 'DeleteCanary', 'http' => ['method' => 'DELETE', 'requestUri' => '/canary/{name}',], 'input' => ['shape' => 'DeleteCanaryRequest',], 'output' => ['shape' => 'DeleteCanaryResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ValidationException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'ConflictException',],],], 'DescribeCanaries' => ['name' => 'DescribeCanaries', 'http' => ['method' => 'POST', 'requestUri' => '/canaries',], 'input' => ['shape' => 'DescribeCanariesRequest',], 'output' => ['shape' => 'DescribeCanariesResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ValidationException',],],], 'DescribeCanariesLastRun' => ['name' => 'DescribeCanariesLastRun', 'http' => ['method' => 'POST', 'requestUri' => '/canaries/last-run',], 'input' => ['shape' => 'DescribeCanariesLastRunRequest',], 'output' => ['shape' => 'DescribeCanariesLastRunResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ValidationException',],],], 'DescribeRuntimeVersions' => ['name' => 'DescribeRuntimeVersions', 'http' => ['method' => 'POST', 'requestUri' => '/runtime-versions',], 'input' => ['shape' => 'DescribeRuntimeVersionsRequest',], 'output' => ['shape' => 'DescribeRuntimeVersionsResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ValidationException',],],], 'GetCanary' => ['name' => 'GetCanary', 'http' => ['method' => 'GET', 'requestUri' => '/canary/{name}',], 'input' => ['shape' => 'GetCanaryRequest',], 'output' => ['shape' => 'GetCanaryResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ValidationException',],],], 'GetCanaryRuns' => ['name' => 'GetCanaryRuns', 'http' => ['method' => 'POST', 'requestUri' => '/canary/{name}/runs',], 'input' => ['shape' => 'GetCanaryRunsRequest',], 'output' => ['shape' => 'GetCanaryRunsResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ValidationException',], ['shape' => 'ResourceNotFoundException',],],], 'ListTagsForResource' => ['name' => 'ListTagsForResource', 'http' => ['method' => 'GET', 'requestUri' => '/tags/{resourceArn}',], 'input' => ['shape' => 'ListTagsForResourceRequest',], 'output' => ['shape' => 'ListTagsForResourceResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',],],], 'StartCanary' => ['name' => 'StartCanary', 'http' => ['method' => 'POST', 'requestUri' => '/canary/{name}/start',], 'input' => ['shape' => 'StartCanaryRequest',], 'output' => ['shape' => 'StartCanaryResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ValidationException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'ConflictException',],],], 'StopCanary' => ['name' => 'StopCanary', 'http' => ['method' => 'POST', 'requestUri' => '/canary/{name}/stop',], 'input' => ['shape' => 'StopCanaryRequest',], 'output' => ['shape' => 'StopCanaryResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ValidationException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'ConflictException',],],], 'TagResource' => ['name' => 'TagResource', 'http' => ['method' => 'POST', 'requestUri' => '/tags/{resourceArn}',], 'input' => ['shape' => 'TagResourceRequest',], 'output' => ['shape' => 'TagResourceResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',],],], 'UntagResource' => ['name' => 'UntagResource', 'http' => ['method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}',], 'input' => ['shape' => 'UntagResourceRequest',], 'output' => ['shape' => 'UntagResourceResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',],],], 'UpdateCanary' => ['name' => 'UpdateCanary', 'http' => ['method' => 'PATCH', 'requestUri' => '/canary/{name}',], 'input' => ['shape' => 'UpdateCanaryRequest',], 'output' => ['shape' => 'UpdateCanaryResponse',], 'errors' => [['shape' => 'InternalServerException',], ['shape' => 'ValidationException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'ConflictException',],],],], 'shapes' => ['Blob' => ['type' => 'blob', 'max' => 10000000, 'min' => 1,], 'Canaries' => ['type' => 'list', 'member' => ['shape' => 'Canary',],], 'CanariesLastRun' => ['type' => 'list', 'member' => ['shape' => 'CanaryLastRun',],], 'Canary' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'UUID',], 'Name' => ['shape' => 'CanaryName',], 'Code' => ['shape' => 'CanaryCodeOutput',], 'ExecutionRoleArn' => ['shape' => 'RoleArn',], 'Schedule' => ['shape' => 'CanaryScheduleOutput',], 'RunConfig' => ['shape' => 'CanaryRunConfigOutput',], 'SuccessRetentionPeriodInDays' => ['shape' => 'MaxSize1024',], 'FailureRetentionPeriodInDays' => ['shape' => 'MaxSize1024',], 'Status' => ['shape' => 'CanaryStatus',], 'Timeline' => ['shape' => 'CanaryTimeline',], 'ArtifactS3Location' => ['shape' => 'String',], 'EngineArn' => ['shape' => 'FunctionArn',], 'RuntimeVersion' => ['shape' => 'String',], 'VpcConfig' => ['shape' => 'VpcConfigOutput',], 'Tags' => ['shape' => 'TagMap',],],], 'CanaryArn' => ['type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => 'arn:(aws[a-zA-Z-]*)?:synthetics:[a-z]{2}((-gov)|(-iso(b?)))?-[a-z]+-\\d{1}:\\d{12}:canary:[0-9a-z_\\-]{1,21}',], 'CanaryCodeInput' => ['type' => 'structure', 'required' => ['Handler',], 'members' => ['S3Bucket' => ['shape' => 'String',], 'S3Key' => ['shape' => 'String',], 'S3Version' => ['shape' => 'String',], 'ZipFile' => ['shape' => 'Blob',], 'Handler' => ['shape' => 'String',],],], 'CanaryCodeOutput' => ['type' => 'structure', 'members' => ['SourceLocationArn' => ['shape' => 'String',], 'Handler' => ['shape' => 'String',],],], 'CanaryLastRun' => ['type' => 'structure', 'members' => ['CanaryName' => ['shape' => 'CanaryName',], 'LastRun' => ['shape' => 'CanaryRun',],],], 'CanaryName' => ['type' => 'string', 'max' => 21, 'min' => 1, 'pattern' => '^[0-9a-z_\\-]+$',], 'CanaryRun' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'UUID',], 'Name' => ['shape' => 'CanaryName',], 'Status' => ['shape' => 'CanaryRunStatus',], 'Timeline' => ['shape' => 'CanaryRunTimeline',], 'ArtifactS3Location' => ['shape' => 'String',],],], 'CanaryRunConfigInput' => ['type' => 'structure', 'members' => ['TimeoutInSeconds' => ['shape' => 'MaxFifteenMinutesInSeconds',], 'MemoryInMB' => ['shape' => 'MaxSize3008',], 'ActiveTracing' => ['shape' => 'NullableBoolean',], 'EnvironmentVariables' => ['shape' => 'EnvironmentVariablesMap',],],], 'CanaryRunConfigOutput' => ['type' => 'structure', 'members' => ['TimeoutInSeconds' => ['shape' => 'MaxFifteenMinutesInSeconds',], 'MemoryInMB' => ['shape' => 'MaxSize3008',], 'ActiveTracing' => ['shape' => 'NullableBoolean',],],], 'CanaryRunState' => ['type' => 'string', 'enum' => ['RUNNING', 'PASSED', 'FAILED',],], 'CanaryRunStateReasonCode' => ['type' => 'string', 'enum' => ['CANARY_FAILURE', 'EXECUTION_FAILURE',],], 'CanaryRunStatus' => ['type' => 'structure', 'members' => ['State' => ['shape' => 'CanaryRunState',], 'StateReason' => ['shape' => 'String',], 'StateReasonCode' => ['shape' => 'CanaryRunStateReasonCode',],],], 'CanaryRunTimeline' => ['type' => 'structure', 'members' => ['Started' => ['shape' => 'Timestamp',], 'Completed' => ['shape' => 'Timestamp',],],], 'CanaryRuns' => ['type' => 'list', 'member' => ['shape' => 'CanaryRun',],], 'CanaryScheduleInput' => ['type' => 'structure', 'required' => ['Expression',], 'members' => ['Expression' => ['shape' => 'String',], 'DurationInSeconds' => ['shape' => 'MaxOneYearInSeconds',],],], 'CanaryScheduleOutput' => ['type' => 'structure', 'members' => ['Expression' => ['shape' => 'String',], 'DurationInSeconds' => ['shape' => 'MaxOneYearInSeconds',],],], 'CanaryState' => ['type' => 'string', 'enum' => ['CREATING', 'READY', 'STARTING', 'RUNNING', 'UPDATING', 'STOPPING', 'STOPPED', 'ERROR', 'DELETING',],], 'CanaryStateReasonCode' => ['type' => 'string', 'enum' => ['INVALID_PERMISSIONS',],], 'CanaryStatus' => ['type' => 'structure', 'members' => ['State' => ['shape' => 'CanaryState',], 'StateReason' => ['shape' => 'String',], 'StateReasonCode' => ['shape' => 'CanaryStateReasonCode',],],], 'CanaryTimeline' => ['type' => 'structure', 'members' => ['Created' => ['shape' => 'Timestamp',], 'LastModified' => ['shape' => 'Timestamp',], 'LastStarted' => ['shape' => 'Timestamp',], 'LastStopped' => ['shape' => 'Timestamp',],],], 'ConflictException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage',],], 'error' => ['httpStatusCode' => 409,], 'exception' => true,], 'CreateCanaryRequest' => ['type' => 'structure', 'required' => ['Name', 'Code', 'ArtifactS3Location', 'ExecutionRoleArn', 'Schedule', 'RuntimeVersion',], 'members' => ['Name' => ['shape' => 'CanaryName',], 'Code' => ['shape' => 'CanaryCodeInput',], 'ArtifactS3Location' => ['shape' => 'String',], 'ExecutionRoleArn' => ['shape' => 'RoleArn',], 'Schedule' => ['shape' => 'CanaryScheduleInput',], 'RunConfig' => ['shape' => 'CanaryRunConfigInput',], 'SuccessRetentionPeriodInDays' => ['shape' => 'MaxSize1024',], 'FailureRetentionPeriodInDays' => ['shape' => 'MaxSize1024',], 'RuntimeVersion' => ['shape' => 'String',], 'VpcConfig' => ['shape' => 'VpcConfigInput',], 'Tags' => ['shape' => 'TagMap',],],], 'CreateCanaryResponse' => ['type' => 'structure', 'members' => ['Canary' => ['shape' => 'Canary',],],], 'DeleteCanaryRequest' => ['type' => 'structure', 'required' => ['Name',], 'members' => ['Name' => ['shape' => 'CanaryName', 'location' => 'uri', 'locationName' => 'name',],],], 'DeleteCanaryResponse' => ['type' => 'structure', 'members' => [],], 'DescribeCanariesLastRunRequest' => ['type' => 'structure', 'members' => ['NextToken' => ['shape' => 'Token',], 'MaxResults' => ['shape' => 'MaxSize100',],],], 'DescribeCanariesLastRunResponse' => ['type' => 'structure', 'members' => ['CanariesLastRun' => ['shape' => 'CanariesLastRun',], 'NextToken' => ['shape' => 'Token',],],], 'DescribeCanariesRequest' => ['type' => 'structure', 'members' => ['NextToken' => ['shape' => 'Token',], 'MaxResults' => ['shape' => 'MaxCanaryResults',],],], 'DescribeCanariesResponse' => ['type' => 'structure', 'members' => ['Canaries' => ['shape' => 'Canaries',], 'NextToken' => ['shape' => 'Token',],],], 'DescribeRuntimeVersionsRequest' => ['type' => 'structure', 'members' => ['NextToken' => ['shape' => 'Token',], 'MaxResults' => ['shape' => 'MaxSize100',],],], 'DescribeRuntimeVersionsResponse' => ['type' => 'structure', 'members' => ['RuntimeVersions' => ['shape' => 'RuntimeVersionList',], 'NextToken' => ['shape' => 'Token',],],], 'EnvironmentVariableName' => ['type' => 'string', 'pattern' => '[a-zA-Z]([a-zA-Z0-9_])+',], 'EnvironmentVariableValue' => ['type' => 'string',], 'EnvironmentVariablesMap' => ['type' => 'map', 'key' => ['shape' => 'EnvironmentVariableName',], 'value' => ['shape' => 'EnvironmentVariableValue',],], 'ErrorMessage' => ['type' => 'string',], 'FunctionArn' => ['type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => 'arn:(aws[a-zA-Z-]*)?:lambda:[a-z]{2}((-gov)|(-iso(b?)))?-[a-z]+-\\d{1}:\\d{12}:function:[a-zA-Z0-9-_]+(:(\\$LATEST|[a-zA-Z0-9-_]+))?',], 'GetCanaryRequest' => ['type' => 'structure', 'required' => ['Name',], 'members' => ['Name' => ['shape' => 'CanaryName', 'location' => 'uri', 'locationName' => 'name',],],], 'GetCanaryResponse' => ['type' => 'structure', 'members' => ['Canary' => ['shape' => 'Canary',],],], 'GetCanaryRunsRequest' => ['type' => 'structure', 'required' => ['Name',], 'members' => ['Name' => ['shape' => 'CanaryName', 'location' => 'uri', 'locationName' => 'name',], 'NextToken' => ['shape' => 'Token',], 'MaxResults' => ['shape' => 'MaxSize100',],],], 'GetCanaryRunsResponse' => ['type' => 'structure', 'members' => ['CanaryRuns' => ['shape' => 'CanaryRuns',], 'NextToken' => ['shape' => 'Token',],],], 'InternalServerException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage',],], 'error' => ['httpStatusCode' => 500,], 'exception' => true,], 'ListTagsForResourceRequest' => ['type' => 'structure', 'required' => ['ResourceArn',], 'members' => ['ResourceArn' => ['shape' => 'CanaryArn', 'location' => 'uri', 'locationName' => 'resourceArn',],],], 'ListTagsForResourceResponse' => ['type' => 'structure', 'members' => ['Tags' => ['shape' => 'TagMap',],],], 'MaxCanaryResults' => ['type' => 'integer', 'max' => 20, 'min' => 1,], 'MaxFifteenMinutesInSeconds' => ['type' => 'integer', 'max' => 840, 'min' => 3,], 'MaxOneYearInSeconds' => ['type' => 'long', 'max' => 31622400, 'min' => 0,], 'MaxSize100' => ['type' => 'integer', 'max' => 100, 'min' => 1,], 'MaxSize1024' => ['type' => 'integer', 'max' => 1024, 'min' => 1,], 'MaxSize3008' => ['type' => 'integer', 'max' => 3008, 'min' => 960,], 'NullableBoolean' => ['type' => 'boolean',], 'ResourceNotFoundException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage',],], 'error' => ['httpStatusCode' => 404,], 'exception' => true,], 'RoleArn' => ['type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => 'arn:(aws[a-zA-Z-]*)?:iam::\\d{12}:role/?[a-zA-Z_0-9+=,.@\\-_/]+',], 'RuntimeVersion' => ['type' => 'structure', 'members' => ['VersionName' => ['shape' => 'String',], 'Description' => ['shape' => 'String',], 'ReleaseDate' => ['shape' => 'Timestamp',], 'DeprecationDate' => ['shape' => 'Timestamp',],],], 'RuntimeVersionList' => ['type' => 'list', 'member' => ['shape' => 'RuntimeVersion',],], 'SecurityGroupId' => ['type' => 'string',], 'SecurityGroupIds' => ['type' => 'list', 'member' => ['shape' => 'SecurityGroupId',], 'max' => 5, 'min' => 0,], 'StartCanaryRequest' => ['type' => 'structure', 'required' => ['Name',], 'members' => ['Name' => ['shape' => 'CanaryName', 'location' => 'uri', 'locationName' => 'name',],],], 'StartCanaryResponse' => ['type' => 'structure', 'members' => [],], 'StopCanaryRequest' => ['type' => 'structure', 'required' => ['Name',], 'members' => ['Name' => ['shape' => 'CanaryName', 'location' => 'uri', 'locationName' => 'name',],],], 'StopCanaryResponse' => ['type' => 'structure', 'members' => [],], 'String' => ['type' => 'string', 'max' => 1024, 'min' => 1,], 'SubnetId' => ['type' => 'string',], 'SubnetIds' => ['type' => 'list', 'member' => ['shape' => 'SubnetId',], 'max' => 16, 'min' => 0,], 'TagKey' => ['type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^(?!aws:)[a-zA-Z+-=._:/]+$',], 'TagKeyList' => ['type' => 'list', 'member' => ['shape' => 'TagKey',], 'max' => 50, 'min' => 1,], 'TagMap' => ['type' => 'map', 'key' => ['shape' => 'TagKey',], 'value' => ['shape' => 'TagValue',], 'max' => 50, 'min' => 1,], 'TagResourceRequest' => ['type' => 'structure', 'required' => ['ResourceArn', 'Tags',], 'members' => ['ResourceArn' => ['shape' => 'CanaryArn', 'location' => 'uri', 'locationName' => 'resourceArn',], 'Tags' => ['shape' => 'TagMap',],],], 'TagResourceResponse' => ['type' => 'structure', 'members' => [],], 'TagValue' => ['type' => 'string', 'max' => 256,], 'Timestamp' => ['type' => 'timestamp',], 'Token' => ['type' => 'string', 'max' => 252, 'min' => 4,], 'UUID' => ['type' => 'string', 'pattern' => '^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$',], 'UntagResourceRequest' => ['type' => 'structure', 'required' => ['ResourceArn', 'TagKeys',], 'members' => ['ResourceArn' => ['shape' => 'CanaryArn', 'location' => 'uri', 'locationName' => 'resourceArn',], 'TagKeys' => ['shape' => 'TagKeyList', 'location' => 'querystring', 'locationName' => 'tagKeys',],],], 'UntagResourceResponse' => ['type' => 'structure', 'members' => [],], 'UpdateCanaryRequest' => ['type' => 'structure', 'required' => ['Name',], 'members' => ['Name' => ['shape' => 'CanaryName', 'location' => 'uri', 'locationName' => 'name',], 'Code' => ['shape' => 'CanaryCodeInput',], 'ExecutionRoleArn' => ['shape' => 'RoleArn',], 'RuntimeVersion' => ['shape' => 'String',], 'Schedule' => ['shape' => 'CanaryScheduleInput',], 'RunConfig' => ['shape' => 'CanaryRunConfigInput',], 'SuccessRetentionPeriodInDays' => ['shape' => 'MaxSize1024',], 'FailureRetentionPeriodInDays' => ['shape' => 'MaxSize1024',], 'VpcConfig' => ['shape' => 'VpcConfigInput',],],], 'UpdateCanaryResponse' => ['type' => 'structure', 'members' => [],], 'ValidationException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage',],], 'error' => ['httpStatusCode' => 400,], 'exception' => true,], 'VpcConfigInput' => ['type' => 'structure', 'members' => ['SubnetIds' => ['shape' => 'SubnetIds',], 'SecurityGroupIds' => ['shape' => 'SecurityGroupIds',],],], 'VpcConfigOutput' => ['type' => 'structure', 'members' => ['VpcId' => ['shape' => 'VpcId',], 'SubnetIds' => ['shape' => 'SubnetIds',], 'SecurityGroupIds' => ['shape' => 'SecurityGroupIds',],],], 'VpcId' => ['type' => 'string',],],];
