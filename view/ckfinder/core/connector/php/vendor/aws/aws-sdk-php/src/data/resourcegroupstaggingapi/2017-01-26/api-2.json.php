<?php
// This file was auto-generated from sdk-root/src/data/resourcegroupstaggingapi/2017-01-26/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2017-01-26', 'endpointPrefix' => 'tagging', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceFullName' => 'AWS Resource Groups Tagging API', 'serviceId' => 'Resource Groups Tagging API', 'signatureVersion' => 'v4', 'targetPrefix' => 'ResourceGroupsTaggingAPI_20170126', 'uid' => 'resourcegroupstaggingapi-2017-01-26',], 'operations' => ['DescribeReportCreation' => ['name' => 'DescribeReportCreation', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'DescribeReportCreationInput',], 'output' => ['shape' => 'DescribeReportCreationOutput',], 'errors' => [['shape' => 'ConstraintViolationException',], ['shape' => 'InternalServiceException',], ['shape' => 'InvalidParameterException',], ['shape' => 'ThrottledException',],],], 'GetComplianceSummary' => ['name' => 'GetComplianceSummary', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetComplianceSummaryInput',], 'output' => ['shape' => 'GetComplianceSummaryOutput',], 'errors' => [['shape' => 'ConstraintViolationException',], ['shape' => 'InternalServiceException',], ['shape' => 'InvalidParameterException',], ['shape' => 'ThrottledException',],],], 'GetResources' => ['name' => 'GetResources', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetResourcesInput',], 'output' => ['shape' => 'GetResourcesOutput',], 'errors' => [['shape' => 'InvalidParameterException',], ['shape' => 'ThrottledException',], ['shape' => 'InternalServiceException',], ['shape' => 'PaginationTokenExpiredException',],],], 'GetTagKeys' => ['name' => 'GetTagKeys', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetTagKeysInput',], 'output' => ['shape' => 'GetTagKeysOutput',], 'errors' => [['shape' => 'InvalidParameterException',], ['shape' => 'ThrottledException',], ['shape' => 'InternalServiceException',], ['shape' => 'PaginationTokenExpiredException',],],], 'GetTagValues' => ['name' => 'GetTagValues', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetTagValuesInput',], 'output' => ['shape' => 'GetTagValuesOutput',], 'errors' => [['shape' => 'InvalidParameterException',], ['shape' => 'ThrottledException',], ['shape' => 'InternalServiceException',], ['shape' => 'PaginationTokenExpiredException',],],], 'StartReportCreation' => ['name' => 'StartReportCreation', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'StartReportCreationInput',], 'output' => ['shape' => 'StartReportCreationOutput',], 'errors' => [['shape' => 'ConcurrentModificationException',], ['shape' => 'ConstraintViolationException',], ['shape' => 'InternalServiceException',], ['shape' => 'InvalidParameterException',], ['shape' => 'ThrottledException',],],], 'TagResources' => ['name' => 'TagResources', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'TagResourcesInput',], 'output' => ['shape' => 'TagResourcesOutput',], 'errors' => [['shape' => 'InvalidParameterException',], ['shape' => 'ThrottledException',], ['shape' => 'InternalServiceException',],],], 'UntagResources' => ['name' => 'UntagResources', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'UntagResourcesInput',], 'output' => ['shape' => 'UntagResourcesOutput',], 'errors' => [['shape' => 'InvalidParameterException',], ['shape' => 'ThrottledException',], ['shape' => 'InternalServiceException',],],],], 'shapes' => ['AmazonResourceType' => ['type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '[\\s\\S]*',], 'ComplianceDetails' => ['type' => 'structure', 'members' => ['NoncompliantKeys' => ['shape' => 'TagKeyList',], 'KeysWithNoncompliantValues' => ['shape' => 'TagKeyList',], 'ComplianceStatus' => ['shape' => 'ComplianceStatus',],],], 'ComplianceStatus' => ['type' => 'boolean',], 'ConcurrentModificationException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ExceptionMessage',],], 'exception' => true,], 'ConstraintViolationException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ExceptionMessage',],], 'exception' => true,], 'DescribeReportCreationInput' => ['type' => 'structure', 'members' => [],], 'DescribeReportCreationOutput' => ['type' => 'structure', 'members' => ['Status' => ['shape' => 'Status',], 'S3Location' => ['shape' => 'S3Location',], 'ErrorMessage' => ['shape' => 'ErrorMessage',],],], 'ErrorCode' => ['type' => 'string', 'enum' => ['InternalServiceException', 'InvalidParameterException',],], 'ErrorMessage' => ['type' => 'string',], 'ExceptionMessage' => ['type' => 'string', 'max' => 2048, 'min' => 0,], 'ExcludeCompliantResources' => ['type' => 'boolean',], 'FailedResourcesMap' => ['type' => 'map', 'key' => ['shape' => 'ResourceARN',], 'value' => ['shape' => 'FailureInfo',],], 'FailureInfo' => ['type' => 'structure', 'members' => ['StatusCode' => ['shape' => 'StatusCode',], 'ErrorCode' => ['shape' => 'ErrorCode',], 'ErrorMessage' => ['shape' => 'ErrorMessage',],],], 'GetComplianceSummaryInput' => ['type' => 'structure', 'members' => ['TargetIdFilters' => ['shape' => 'TargetIdFilterList',], 'RegionFilters' => ['shape' => 'RegionFilterList',], 'ResourceTypeFilters' => ['shape' => 'ResourceTypeFilterList',], 'TagKeyFilters' => ['shape' => 'TagKeyFilterList',], 'GroupBy' => ['shape' => 'GroupBy',], 'MaxResults' => ['shape' => 'MaxResultsGetComplianceSummary',], 'PaginationToken' => ['shape' => 'PaginationToken',],],], 'GetComplianceSummaryOutput' => ['type' => 'structure', 'members' => ['SummaryList' => ['shape' => 'SummaryList',], 'PaginationToken' => ['shape' => 'PaginationToken',],],], 'GetResourcesInput' => ['type' => 'structure', 'members' => ['PaginationToken' => ['shape' => 'PaginationToken',], 'TagFilters' => ['shape' => 'TagFilterList',], 'ResourcesPerPage' => ['shape' => 'ResourcesPerPage',], 'TagsPerPage' => ['shape' => 'TagsPerPage',], 'ResourceTypeFilters' => ['shape' => 'ResourceTypeFilterList',], 'IncludeComplianceDetails' => ['shape' => 'IncludeComplianceDetails',], 'ExcludeCompliantResources' => ['shape' => 'ExcludeCompliantResources',], 'ResourceARNList' => ['shape' => 'ResourceARNListForGet',],],], 'GetResourcesOutput' => ['type' => 'structure', 'members' => ['PaginationToken' => ['shape' => 'PaginationToken',], 'ResourceTagMappingList' => ['shape' => 'ResourceTagMappingList',],],], 'GetTagKeysInput' => ['type' => 'structure', 'members' => ['PaginationToken' => ['shape' => 'PaginationToken',],],], 'GetTagKeysOutput' => ['type' => 'structure', 'members' => ['PaginationToken' => ['shape' => 'PaginationToken',], 'TagKeys' => ['shape' => 'TagKeyList',],],], 'GetTagValuesInput' => ['type' => 'structure', 'required' => ['Key',], 'members' => ['PaginationToken' => ['shape' => 'PaginationToken',], 'Key' => ['shape' => 'TagKey',],],], 'GetTagValuesOutput' => ['type' => 'structure', 'members' => ['PaginationToken' => ['shape' => 'PaginationToken',], 'TagValues' => ['shape' => 'TagValuesOutputList',],],], 'GroupBy' => ['type' => 'list', 'member' => ['shape' => 'GroupByAttribute',],], 'GroupByAttribute' => ['type' => 'string', 'enum' => ['TARGET_ID', 'REGION', 'RESOURCE_TYPE',],], 'IncludeComplianceDetails' => ['type' => 'boolean',], 'InternalServiceException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ExceptionMessage',],], 'exception' => true, 'fault' => true,], 'InvalidParameterException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ExceptionMessage',],], 'exception' => true,], 'LastUpdated' => ['type' => 'string',], 'MaxResultsGetComplianceSummary' => ['type' => 'integer', 'max' => 1000, 'min' => 1,], 'NonCompliantResources' => ['type' => 'long',], 'PaginationToken' => ['type' => 'string', 'max' => 2048, 'min' => 0, 'pattern' => '[\\s\\S]*',], 'PaginationTokenExpiredException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ExceptionMessage',],], 'exception' => true,], 'Region' => ['type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '[\\s\\S]*',], 'RegionFilterList' => ['type' => 'list', 'member' => ['shape' => 'Region',], 'max' => 100, 'min' => 1,], 'ResourceARN' => ['type' => 'string', 'max' => 1011, 'min' => 1, 'pattern' => '[\\s\\S]*',], 'ResourceARNListForGet' => ['type' => 'list', 'member' => ['shape' => 'ResourceARN',], 'max' => 100, 'min' => 1,], 'ResourceARNListForTagUntag' => ['type' => 'list', 'member' => ['shape' => 'ResourceARN',], 'max' => 20, 'min' => 1,], 'ResourceTagMapping' => ['type' => 'structure', 'members' => ['ResourceARN' => ['shape' => 'ResourceARN',], 'Tags' => ['shape' => 'TagList',], 'ComplianceDetails' => ['shape' => 'ComplianceDetails',],],], 'ResourceTagMappingList' => ['type' => 'list', 'member' => ['shape' => 'ResourceTagMapping',],], 'ResourceTypeFilterList' => ['type' => 'list', 'member' => ['shape' => 'AmazonResourceType',],], 'ResourcesPerPage' => ['type' => 'integer',], 'S3Bucket' => ['type' => 'string', 'max' => 63, 'min' => 3, 'pattern' => '[a-z0-9.-]*',], 'S3Location' => ['type' => 'string',], 'StartReportCreationInput' => ['type' => 'structure', 'required' => ['S3Bucket',], 'members' => ['S3Bucket' => ['shape' => 'S3Bucket',],],], 'StartReportCreationOutput' => ['type' => 'structure', 'members' => [],], 'Status' => ['type' => 'string',], 'StatusCode' => ['type' => 'integer',], 'Summary' => ['type' => 'structure', 'members' => ['LastUpdated' => ['shape' => 'LastUpdated',], 'TargetId' => ['shape' => 'TargetId',], 'TargetIdType' => ['shape' => 'TargetIdType',], 'Region' => ['shape' => 'Region',], 'ResourceType' => ['shape' => 'AmazonResourceType',], 'NonCompliantResources' => ['shape' => 'NonCompliantResources',],],], 'SummaryList' => ['type' => 'list', 'member' => ['shape' => 'Summary',],], 'Tag' => ['type' => 'structure', 'required' => ['Key', 'Value',], 'members' => ['Key' => ['shape' => 'TagKey',], 'Value' => ['shape' => 'TagValue',],],], 'TagFilter' => ['type' => 'structure', 'members' => ['Key' => ['shape' => 'TagKey',], 'Values' => ['shape' => 'TagValueList',],],], 'TagFilterList' => ['type' => 'list', 'member' => ['shape' => 'TagFilter',], 'max' => 50, 'min' => 0,], 'TagKey' => ['type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '[\\s\\S]*',], 'TagKeyFilterList' => ['type' => 'list', 'member' => ['shape' => 'TagKey',], 'max' => 50, 'min' => 1,], 'TagKeyList' => ['type' => 'list', 'member' => ['shape' => 'TagKey',],], 'TagKeyListForUntag' => ['type' => 'list', 'member' => ['shape' => 'TagKey',], 'max' => 50, 'min' => 1,], 'TagList' => ['type' => 'list', 'member' => ['shape' => 'Tag',],], 'TagMap' => ['type' => 'map', 'key' => ['shape' => 'TagKey',], 'value' => ['shape' => 'TagValue',], 'max' => 50, 'min' => 1,], 'TagResourcesInput' => ['type' => 'structure', 'required' => ['ResourceARNList', 'Tags',], 'members' => ['ResourceARNList' => ['shape' => 'ResourceARNListForTagUntag',], 'Tags' => ['shape' => 'TagMap',],],], 'TagResourcesOutput' => ['type' => 'structure', 'members' => ['FailedResourcesMap' => ['shape' => 'FailedResourcesMap',],],], 'TagValue' => ['type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '[\\s\\S]*',], 'TagValueList' => ['type' => 'list', 'member' => ['shape' => 'TagValue',], 'max' => 20, 'min' => 0,], 'TagValuesOutputList' => ['type' => 'list', 'member' => ['shape' => 'TagValue',],], 'TagsPerPage' => ['type' => 'integer',], 'TargetId' => ['type' => 'string', 'max' => 68, 'min' => 6, 'pattern' => '[a-zA-Z0-9-]*',], 'TargetIdFilterList' => ['type' => 'list', 'member' => ['shape' => 'TargetId',], 'max' => 100, 'min' => 1,], 'TargetIdType' => ['type' => 'string', 'enum' => ['ACCOUNT', 'OU', 'ROOT',],], 'ThrottledException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ExceptionMessage',],], 'exception' => true,], 'UntagResourcesInput' => ['type' => 'structure', 'required' => ['ResourceARNList', 'TagKeys',], 'members' => ['ResourceARNList' => ['shape' => 'ResourceARNListForTagUntag',], 'TagKeys' => ['shape' => 'TagKeyListForUntag',],],], 'UntagResourcesOutput' => ['type' => 'structure', 'members' => ['FailedResourcesMap' => ['shape' => 'FailedResourcesMap',],],],],];
