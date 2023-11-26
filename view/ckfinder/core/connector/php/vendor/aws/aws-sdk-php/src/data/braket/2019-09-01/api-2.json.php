<?php
// This file was auto-generated from sdk-root/src/data/braket/2019-09-01/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2019-09-01', 'endpointPrefix' => 'braket', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'Braket', 'serviceId' => 'Braket', 'signatureVersion' => 'v4', 'signingName' => 'braket', 'uid' => 'braket-2019-09-01',], 'operations' => ['CancelQuantumTask' => ['name' => 'CancelQuantumTask', 'http' => ['method' => 'PUT', 'requestUri' => '/quantum-task/{quantumTaskArn}/cancel', 'responseCode' => 200,], 'input' => ['shape' => 'CancelQuantumTaskRequest',], 'output' => ['shape' => 'CancelQuantumTaskResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'AccessDeniedException',], ['shape' => 'ConflictException',], ['shape' => 'ThrottlingException',], ['shape' => 'InternalServiceException',], ['shape' => 'ValidationException',],], 'idempotent' => true,], 'CreateQuantumTask' => ['name' => 'CreateQuantumTask', 'http' => ['method' => 'POST', 'requestUri' => '/quantum-task', 'responseCode' => 201,], 'input' => ['shape' => 'CreateQuantumTaskRequest',], 'output' => ['shape' => 'CreateQuantumTaskResponse',], 'errors' => [['shape' => 'AccessDeniedException',], ['shape' => 'ThrottlingException',], ['shape' => 'DeviceOfflineException',], ['shape' => 'InternalServiceException',], ['shape' => 'ServiceQuotaExceededException',], ['shape' => 'ValidationException',],],], 'GetDevice' => ['name' => 'GetDevice', 'http' => ['method' => 'GET', 'requestUri' => '/device/{deviceArn}', 'responseCode' => 200,], 'input' => ['shape' => 'GetDeviceRequest',], 'output' => ['shape' => 'GetDeviceResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'AccessDeniedException',], ['shape' => 'ThrottlingException',], ['shape' => 'DeviceOfflineException',], ['shape' => 'DeviceRetiredException',], ['shape' => 'InternalServiceException',], ['shape' => 'ValidationException',],],], 'GetQuantumTask' => ['name' => 'GetQuantumTask', 'http' => ['method' => 'GET', 'requestUri' => '/quantum-task/{quantumTaskArn}', 'responseCode' => 200,], 'input' => ['shape' => 'GetQuantumTaskRequest',], 'output' => ['shape' => 'GetQuantumTaskResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'AccessDeniedException',], ['shape' => 'ThrottlingException',], ['shape' => 'InternalServiceException',], ['shape' => 'ValidationException',],],], 'ListTagsForResource' => ['name' => 'ListTagsForResource', 'http' => ['method' => 'GET', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200,], 'input' => ['shape' => 'ListTagsForResourceRequest',], 'output' => ['shape' => 'ListTagsForResourceResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServiceException',], ['shape' => 'ValidationException',],],], 'SearchDevices' => ['name' => 'SearchDevices', 'http' => ['method' => 'POST', 'requestUri' => '/devices', 'responseCode' => 200,], 'input' => ['shape' => 'SearchDevicesRequest',], 'output' => ['shape' => 'SearchDevicesResponse',], 'errors' => [['shape' => 'AccessDeniedException',], ['shape' => 'ThrottlingException',], ['shape' => 'InternalServiceException',], ['shape' => 'ValidationException',],],], 'SearchQuantumTasks' => ['name' => 'SearchQuantumTasks', 'http' => ['method' => 'POST', 'requestUri' => '/quantum-tasks', 'responseCode' => 200,], 'input' => ['shape' => 'SearchQuantumTasksRequest',], 'output' => ['shape' => 'SearchQuantumTasksResponse',], 'errors' => [['shape' => 'AccessDeniedException',], ['shape' => 'ThrottlingException',], ['shape' => 'InternalServiceException',], ['shape' => 'ValidationException',],],], 'TagResource' => ['name' => 'TagResource', 'http' => ['method' => 'POST', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200,], 'input' => ['shape' => 'TagResourceRequest',], 'output' => ['shape' => 'TagResourceResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServiceException',], ['shape' => 'ValidationException',],],], 'UntagResource' => ['name' => 'UntagResource', 'http' => ['method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200,], 'input' => ['shape' => 'UntagResourceRequest',], 'output' => ['shape' => 'UntagResourceResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServiceException',], ['shape' => 'ValidationException',],], 'idempotent' => true,],], 'shapes' => ['AccessDeniedException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 403, 'senderFault' => true,], 'exception' => true,], 'CancelQuantumTaskRequest' => ['type' => 'structure', 'required' => ['clientToken', 'quantumTaskArn',], 'members' => ['clientToken' => ['shape' => 'String64', 'idempotencyToken' => true,], 'quantumTaskArn' => ['shape' => 'QuantumTaskArn', 'location' => 'uri', 'locationName' => 'quantumTaskArn',],],], 'CancelQuantumTaskResponse' => ['type' => 'structure', 'required' => ['cancellationStatus', 'quantumTaskArn',], 'members' => ['cancellationStatus' => ['shape' => 'CancellationStatus',], 'quantumTaskArn' => ['shape' => 'QuantumTaskArn',],],], 'CancellationStatus' => ['type' => 'string', 'enum' => ['CANCELLING', 'CANCELLED',],], 'ConflictException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 409, 'senderFault' => true,], 'exception' => true,], 'CreateQuantumTaskRequest' => ['type' => 'structure', 'required' => ['action', 'clientToken', 'deviceArn', 'outputS3Bucket', 'outputS3KeyPrefix', 'shots',], 'members' => ['action' => ['shape' => 'JsonValue', 'jsonvalue' => true,], 'clientToken' => ['shape' => 'String64', 'idempotencyToken' => true,], 'deviceArn' => ['shape' => 'DeviceArn',], 'deviceParameters' => ['shape' => 'CreateQuantumTaskRequestDeviceParametersString', 'jsonvalue' => true,], 'outputS3Bucket' => ['shape' => 'CreateQuantumTaskRequestOutputS3BucketString',], 'outputS3KeyPrefix' => ['shape' => 'CreateQuantumTaskRequestOutputS3KeyPrefixString',], 'shots' => ['shape' => 'CreateQuantumTaskRequestShotsLong',], 'tags' => ['shape' => 'TagsMap',],],], 'CreateQuantumTaskRequestDeviceParametersString' => ['type' => 'string', 'max' => 48000, 'min' => 1,], 'CreateQuantumTaskRequestOutputS3BucketString' => ['type' => 'string', 'max' => 63, 'min' => 3,], 'CreateQuantumTaskRequestOutputS3KeyPrefixString' => ['type' => 'string', 'max' => 1024, 'min' => 1,], 'CreateQuantumTaskRequestShotsLong' => ['type' => 'long', 'box' => true, 'min' => 0,], 'CreateQuantumTaskResponse' => ['type' => 'structure', 'required' => ['quantumTaskArn',], 'members' => ['quantumTaskArn' => ['shape' => 'QuantumTaskArn',],],], 'DeviceArn' => ['type' => 'string', 'max' => 256, 'min' => 1,], 'DeviceOfflineException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 424, 'senderFault' => true,], 'exception' => true,], 'DeviceRetiredException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 410, 'senderFault' => true,], 'exception' => true,], 'DeviceStatus' => ['type' => 'string', 'enum' => ['ONLINE', 'OFFLINE', 'RETIRED',],], 'DeviceSummary' => ['type' => 'structure', 'required' => ['deviceArn', 'deviceName', 'deviceStatus', 'deviceType', 'providerName',], 'members' => ['deviceArn' => ['shape' => 'DeviceArn',], 'deviceName' => ['shape' => 'String',], 'deviceStatus' => ['shape' => 'DeviceStatus',], 'deviceType' => ['shape' => 'DeviceType',], 'providerName' => ['shape' => 'String',],],], 'DeviceSummaryList' => ['type' => 'list', 'member' => ['shape' => 'DeviceSummary',],], 'DeviceType' => ['type' => 'string', 'enum' => ['QPU', 'SIMULATOR',],], 'GetDeviceRequest' => ['type' => 'structure', 'required' => ['deviceArn',], 'members' => ['deviceArn' => ['shape' => 'DeviceArn', 'location' => 'uri', 'locationName' => 'deviceArn',],],], 'GetDeviceResponse' => ['type' => 'structure', 'required' => ['deviceArn', 'deviceCapabilities', 'deviceName', 'deviceStatus', 'deviceType', 'providerName',], 'members' => ['deviceArn' => ['shape' => 'DeviceArn',], 'deviceCapabilities' => ['shape' => 'JsonValue', 'jsonvalue' => true,], 'deviceName' => ['shape' => 'String',], 'deviceStatus' => ['shape' => 'DeviceStatus',], 'deviceType' => ['shape' => 'DeviceType',], 'providerName' => ['shape' => 'String',],],], 'GetQuantumTaskRequest' => ['type' => 'structure', 'required' => ['quantumTaskArn',], 'members' => ['quantumTaskArn' => ['shape' => 'QuantumTaskArn', 'location' => 'uri', 'locationName' => 'quantumTaskArn',],],], 'GetQuantumTaskResponse' => ['type' => 'structure', 'required' => ['createdAt', 'deviceArn', 'deviceParameters', 'outputS3Bucket', 'outputS3Directory', 'quantumTaskArn', 'shots', 'status',], 'members' => ['createdAt' => ['shape' => 'SyntheticTimestamp_date_time',], 'deviceArn' => ['shape' => 'DeviceArn',], 'deviceParameters' => ['shape' => 'JsonValue', 'jsonvalue' => true,], 'endedAt' => ['shape' => 'SyntheticTimestamp_date_time',], 'failureReason' => ['shape' => 'String',], 'outputS3Bucket' => ['shape' => 'String',], 'outputS3Directory' => ['shape' => 'String',], 'quantumTaskArn' => ['shape' => 'QuantumTaskArn',], 'shots' => ['shape' => 'Long',], 'status' => ['shape' => 'QuantumTaskStatus',], 'tags' => ['shape' => 'TagsMap',],],], 'InternalServiceException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 500,], 'exception' => true, 'fault' => true,], 'JsonValue' => ['type' => 'string',], 'ListTagsForResourceRequest' => ['type' => 'structure', 'required' => ['resourceArn',], 'members' => ['resourceArn' => ['shape' => 'String', 'location' => 'uri', 'locationName' => 'resourceArn',],],], 'ListTagsForResourceResponse' => ['type' => 'structure', 'members' => ['tags' => ['shape' => 'TagsMap',],],], 'Long' => ['type' => 'long', 'box' => true,], 'QuantumTaskArn' => ['type' => 'string', 'max' => 256, 'min' => 1,], 'QuantumTaskStatus' => ['type' => 'string', 'enum' => ['CREATED', 'QUEUED', 'RUNNING', 'COMPLETED', 'FAILED', 'CANCELLING', 'CANCELLED',],], 'QuantumTaskSummary' => ['type' => 'structure', 'required' => ['createdAt', 'deviceArn', 'outputS3Bucket', 'outputS3Directory', 'quantumTaskArn', 'shots', 'status',], 'members' => ['createdAt' => ['shape' => 'SyntheticTimestamp_date_time',], 'deviceArn' => ['shape' => 'DeviceArn',], 'endedAt' => ['shape' => 'SyntheticTimestamp_date_time',], 'outputS3Bucket' => ['shape' => 'String',], 'outputS3Directory' => ['shape' => 'String',], 'quantumTaskArn' => ['shape' => 'QuantumTaskArn',], 'shots' => ['shape' => 'Long',], 'status' => ['shape' => 'QuantumTaskStatus',], 'tags' => ['shape' => 'TagsMap',],],], 'QuantumTaskSummaryList' => ['type' => 'list', 'member' => ['shape' => 'QuantumTaskSummary',],], 'ResourceNotFoundException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 404, 'senderFault' => true,], 'exception' => true,], 'SearchDevicesFilter' => ['type' => 'structure', 'required' => ['name', 'values',], 'members' => ['name' => ['shape' => 'SearchDevicesFilterNameString',], 'values' => ['shape' => 'SearchDevicesFilterValuesList',],],], 'SearchDevicesFilterNameString' => ['type' => 'string', 'max' => 64, 'min' => 1,], 'SearchDevicesFilterValuesList' => ['type' => 'list', 'member' => ['shape' => 'String256',], 'max' => 10, 'min' => 1,], 'SearchDevicesRequest' => ['type' => 'structure', 'required' => ['filters',], 'members' => ['filters' => ['shape' => 'SearchDevicesRequestFiltersList',], 'maxResults' => ['shape' => 'SearchDevicesRequestMaxResultsInteger',], 'nextToken' => ['shape' => 'String',],],], 'SearchDevicesRequestFiltersList' => ['type' => 'list', 'member' => ['shape' => 'SearchDevicesFilter',], 'max' => 10, 'min' => 0,], 'SearchDevicesRequestMaxResultsInteger' => ['type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1,], 'SearchDevicesResponse' => ['type' => 'structure', 'required' => ['devices',], 'members' => ['devices' => ['shape' => 'DeviceSummaryList',], 'nextToken' => ['shape' => 'String',],],], 'SearchQuantumTasksFilter' => ['type' => 'structure', 'required' => ['name', 'operator', 'values',], 'members' => ['name' => ['shape' => 'String64',], 'operator' => ['shape' => 'SearchQuantumTasksFilterOperator',], 'values' => ['shape' => 'SearchQuantumTasksFilterValuesList',],],], 'SearchQuantumTasksFilterOperator' => ['type' => 'string', 'enum' => ['LT', 'LTE', 'EQUAL', 'GT', 'GTE', 'BETWEEN',],], 'SearchQuantumTasksFilterValuesList' => ['type' => 'list', 'member' => ['shape' => 'String256',], 'max' => 10, 'min' => 1,], 'SearchQuantumTasksRequest' => ['type' => 'structure', 'required' => ['filters',], 'members' => ['filters' => ['shape' => 'SearchQuantumTasksRequestFiltersList',], 'maxResults' => ['shape' => 'SearchQuantumTasksRequestMaxResultsInteger',], 'nextToken' => ['shape' => 'String',],],], 'SearchQuantumTasksRequestFiltersList' => ['type' => 'list', 'member' => ['shape' => 'SearchQuantumTasksFilter',], 'max' => 10, 'min' => 0,], 'SearchQuantumTasksRequestMaxResultsInteger' => ['type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1,], 'SearchQuantumTasksResponse' => ['type' => 'structure', 'required' => ['quantumTasks',], 'members' => ['nextToken' => ['shape' => 'String',], 'quantumTasks' => ['shape' => 'QuantumTaskSummaryList',],],], 'ServiceQuotaExceededException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 402, 'senderFault' => true,], 'exception' => true,], 'String' => ['type' => 'string',], 'String256' => ['type' => 'string', 'max' => 256, 'min' => 1,], 'String64' => ['type' => 'string', 'max' => 64, 'min' => 1,], 'SyntheticTimestamp_date_time' => ['type' => 'timestamp', 'timestampFormat' => 'iso8601',], 'TagKeys' => ['type' => 'list', 'member' => ['shape' => 'String',],], 'TagResourceRequest' => ['type' => 'structure', 'required' => ['resourceArn', 'tags',], 'members' => ['resourceArn' => ['shape' => 'String', 'location' => 'uri', 'locationName' => 'resourceArn',], 'tags' => ['shape' => 'TagsMap',],],], 'TagResourceResponse' => ['type' => 'structure', 'members' => [],], 'TagsMap' => ['type' => 'map', 'key' => ['shape' => 'String',], 'value' => ['shape' => 'String',],], 'ThrottlingException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 429, 'senderFault' => true,], 'exception' => true,], 'UntagResourceRequest' => ['type' => 'structure', 'required' => ['resourceArn', 'tagKeys',], 'members' => ['resourceArn' => ['shape' => 'String', 'location' => 'uri', 'locationName' => 'resourceArn',], 'tagKeys' => ['shape' => 'TagKeys', 'location' => 'querystring', 'locationName' => 'tagKeys',],],], 'UntagResourceResponse' => ['type' => 'structure', 'members' => [],], 'ValidationException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 400, 'senderFault' => true,], 'exception' => true,],],];
