<?php
// This file was auto-generated from sdk-root/src/data/servicecatalog-appregistry/2020-06-24/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2020-06-24', 'endpointPrefix' => 'servicecatalog-appregistry', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'AppRegistry', 'serviceFullName' => 'AWS Service Catalog App Registry', 'serviceId' => 'Service Catalog AppRegistry', 'signatureVersion' => 'v4', 'signingName' => 'servicecatalog', 'uid' => 'AWS242AppRegistry-2020-06-24',], 'operations' => ['AssociateAttributeGroup' => ['name' => 'AssociateAttributeGroup', 'http' => ['method' => 'PUT', 'requestUri' => '/applications/{application}/attribute-groups/{attributeGroup}',], 'input' => ['shape' => 'AssociateAttributeGroupRequest',], 'output' => ['shape' => 'AssociateAttributeGroupResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceQuotaExceededException',],],], 'AssociateResource' => ['name' => 'AssociateResource', 'http' => ['method' => 'PUT', 'requestUri' => '/applications/{application}/resources/{resourceType}/{resource}',], 'input' => ['shape' => 'AssociateResourceRequest',], 'output' => ['shape' => 'AssociateResourceResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServerException',], ['shape' => 'ServiceQuotaExceededException',], ['shape' => 'ConflictException',],],], 'CreateApplication' => ['name' => 'CreateApplication', 'http' => ['method' => 'POST', 'requestUri' => '/applications', 'responseCode' => 201,], 'input' => ['shape' => 'CreateApplicationRequest',], 'output' => ['shape' => 'CreateApplicationResponse',], 'errors' => [['shape' => 'ServiceQuotaExceededException',], ['shape' => 'ConflictException',], ['shape' => 'InternalServerException',],],], 'CreateAttributeGroup' => ['name' => 'CreateAttributeGroup', 'http' => ['method' => 'POST', 'requestUri' => '/attribute-groups', 'responseCode' => 201,], 'input' => ['shape' => 'CreateAttributeGroupRequest',], 'output' => ['shape' => 'CreateAttributeGroupResponse',], 'errors' => [['shape' => 'ServiceQuotaExceededException',], ['shape' => 'ConflictException',], ['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],], 'DeleteApplication' => ['name' => 'DeleteApplication', 'http' => ['method' => 'DELETE', 'requestUri' => '/applications/{application}',], 'input' => ['shape' => 'DeleteApplicationRequest',], 'output' => ['shape' => 'DeleteApplicationResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],], 'DeleteAttributeGroup' => ['name' => 'DeleteAttributeGroup', 'http' => ['method' => 'DELETE', 'requestUri' => '/attribute-groups/{attributeGroup}',], 'input' => ['shape' => 'DeleteAttributeGroupRequest',], 'output' => ['shape' => 'DeleteAttributeGroupResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],], 'DisassociateAttributeGroup' => ['name' => 'DisassociateAttributeGroup', 'http' => ['method' => 'DELETE', 'requestUri' => '/applications/{application}/attribute-groups/{attributeGroup}',], 'input' => ['shape' => 'DisassociateAttributeGroupRequest',], 'output' => ['shape' => 'DisassociateAttributeGroupResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],], 'DisassociateResource' => ['name' => 'DisassociateResource', 'http' => ['method' => 'DELETE', 'requestUri' => '/applications/{application}/resources/{resourceType}/{resource}',], 'input' => ['shape' => 'DisassociateResourceRequest',], 'output' => ['shape' => 'DisassociateResourceResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServerException',],],], 'GetApplication' => ['name' => 'GetApplication', 'http' => ['method' => 'GET', 'requestUri' => '/applications/{application}',], 'input' => ['shape' => 'GetApplicationRequest',], 'output' => ['shape' => 'GetApplicationResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],], 'GetAttributeGroup' => ['name' => 'GetAttributeGroup', 'http' => ['method' => 'GET', 'requestUri' => '/attribute-groups/{attributeGroup}',], 'input' => ['shape' => 'GetAttributeGroupRequest',], 'output' => ['shape' => 'GetAttributeGroupResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],], 'ListApplications' => ['name' => 'ListApplications', 'http' => ['method' => 'GET', 'requestUri' => '/applications',], 'input' => ['shape' => 'ListApplicationsRequest',], 'output' => ['shape' => 'ListApplicationsResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],], 'idempotent' => true,], 'ListAssociatedAttributeGroups' => ['name' => 'ListAssociatedAttributeGroups', 'http' => ['method' => 'GET', 'requestUri' => '/applications/{application}/attribute-groups',], 'input' => ['shape' => 'ListAssociatedAttributeGroupsRequest',], 'output' => ['shape' => 'ListAssociatedAttributeGroupsResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],], 'idempotent' => true,], 'ListAssociatedResources' => ['name' => 'ListAssociatedResources', 'http' => ['method' => 'GET', 'requestUri' => '/applications/{application}/resources',], 'input' => ['shape' => 'ListAssociatedResourcesRequest',], 'output' => ['shape' => 'ListAssociatedResourcesResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],], 'idempotent' => true,], 'ListAttributeGroups' => ['name' => 'ListAttributeGroups', 'http' => ['method' => 'GET', 'requestUri' => '/attribute-groups',], 'input' => ['shape' => 'ListAttributeGroupsRequest',], 'output' => ['shape' => 'ListAttributeGroupsResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],], 'idempotent' => true,], 'ListTagsForResource' => ['name' => 'ListTagsForResource', 'http' => ['method' => 'GET', 'requestUri' => '/tags/{resourceArn}',], 'input' => ['shape' => 'ListTagsForResourceRequest',], 'output' => ['shape' => 'ListTagsForResourceResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServerException',],],], 'SyncResource' => ['name' => 'SyncResource', 'http' => ['method' => 'POST', 'requestUri' => '/sync/{resourceType}/{resource}',], 'input' => ['shape' => 'SyncResourceRequest',], 'output' => ['shape' => 'SyncResourceResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServerException',], ['shape' => 'ConflictException',],],], 'TagResource' => ['name' => 'TagResource', 'http' => ['method' => 'POST', 'requestUri' => '/tags/{resourceArn}',], 'input' => ['shape' => 'TagResourceRequest',], 'output' => ['shape' => 'TagResourceResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServerException',],],], 'UntagResource' => ['name' => 'UntagResource', 'http' => ['method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}',], 'input' => ['shape' => 'UntagResourceRequest',], 'output' => ['shape' => 'UntagResourceResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServerException',],],], 'UpdateApplication' => ['name' => 'UpdateApplication', 'http' => ['method' => 'PATCH', 'requestUri' => '/applications/{application}',], 'input' => ['shape' => 'UpdateApplicationRequest',], 'output' => ['shape' => 'UpdateApplicationResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'ConflictException',], ['shape' => 'InternalServerException',],],], 'UpdateAttributeGroup' => ['name' => 'UpdateAttributeGroup', 'http' => ['method' => 'PATCH', 'requestUri' => '/attribute-groups/{attributeGroup}',], 'input' => ['shape' => 'UpdateAttributeGroupRequest',], 'output' => ['shape' => 'UpdateAttributeGroupResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'ValidationException',], ['shape' => 'ConflictException',], ['shape' => 'InternalServerException',],],],], 'shapes' => ['Application' => ['type' => 'structure', 'members' => ['id' => ['shape' => 'ApplicationId',], 'arn' => ['shape' => 'ApplicationArn',], 'name' => ['shape' => 'Name',], 'description' => ['shape' => 'Description',], 'creationTime' => ['shape' => 'Timestamp',], 'lastUpdateTime' => ['shape' => 'Timestamp',], 'tags' => ['shape' => 'Tags',],],], 'ApplicationArn' => ['type' => 'string', 'pattern' => 'arn:aws[-a-z]*:servicecatalog:[a-z]{2}(-gov)?-[a-z]+-\\d:\\d{12}:/applications/[a-z0-9]+',], 'ApplicationId' => ['type' => 'string', 'pattern' => '[a-z0-9]{12}',], 'ApplicationSpecifier' => ['type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '\\w+',], 'ApplicationSummaries' => ['type' => 'list', 'member' => ['shape' => 'ApplicationSummary',],], 'ApplicationSummary' => ['type' => 'structure', 'members' => ['id' => ['shape' => 'ApplicationId',], 'arn' => ['shape' => 'ApplicationArn',], 'name' => ['shape' => 'Name',], 'description' => ['shape' => 'Description',], 'creationTime' => ['shape' => 'Timestamp',], 'lastUpdateTime' => ['shape' => 'Timestamp',],],], 'Arn' => ['type' => 'string', 'max' => 1600, 'min' => 1, 'pattern' => 'arn:(aws[a-zA-Z0-9-]*):([a-zA-Z0-9\\-])+:([a-z]{2}(-gov)?-[a-z]+-\\d{1})?:(\\d{12})?:(.*)',], 'AssociateAttributeGroupRequest' => ['type' => 'structure', 'required' => ['application', 'attributeGroup',], 'members' => ['application' => ['shape' => 'ApplicationSpecifier', 'location' => 'uri', 'locationName' => 'application',], 'attributeGroup' => ['shape' => 'AttributeGroupSpecifier', 'location' => 'uri', 'locationName' => 'attributeGroup',],],], 'AssociateAttributeGroupResponse' => ['type' => 'structure', 'members' => ['applicationArn' => ['shape' => 'ApplicationArn',], 'attributeGroupArn' => ['shape' => 'AttributeGroupArn',],],], 'AssociateResourceRequest' => ['type' => 'structure', 'required' => ['application', 'resourceType', 'resource',], 'members' => ['application' => ['shape' => 'ApplicationSpecifier', 'location' => 'uri', 'locationName' => 'application',], 'resourceType' => ['shape' => 'ResourceType', 'location' => 'uri', 'locationName' => 'resourceType',], 'resource' => ['shape' => 'ResourceSpecifier', 'location' => 'uri', 'locationName' => 'resource',],],], 'AssociateResourceResponse' => ['type' => 'structure', 'members' => ['applicationArn' => ['shape' => 'ApplicationArn',], 'resourceArn' => ['shape' => 'Arn',],],], 'AssociationCount' => ['type' => 'integer', 'min' => 0,], 'AttributeGroup' => ['type' => 'structure', 'members' => ['id' => ['shape' => 'AttributeGroupId',], 'arn' => ['shape' => 'AttributeGroupArn',], 'name' => ['shape' => 'Name',], 'description' => ['shape' => 'Description',], 'creationTime' => ['shape' => 'Timestamp',], 'lastUpdateTime' => ['shape' => 'Timestamp',], 'tags' => ['shape' => 'Tags',],],], 'AttributeGroupArn' => ['type' => 'string', 'pattern' => 'arn:aws[-a-z]*:servicecatalog:[a-z]{2}(-gov)?-[a-z]+-\\d:\\d{12}:/attribute-groups/[a-z0-9]+',], 'AttributeGroupId' => ['type' => 'string', 'max' => 100, 'min' => 1, 'pattern' => '[a-z0-9]{12}',], 'AttributeGroupIds' => ['type' => 'list', 'member' => ['shape' => 'AttributeGroupId',],], 'AttributeGroupSpecifier' => ['type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '\\w+',], 'AttributeGroupSummaries' => ['type' => 'list', 'member' => ['shape' => 'AttributeGroupSummary',],], 'AttributeGroupSummary' => ['type' => 'structure', 'members' => ['id' => ['shape' => 'AttributeGroupId',], 'arn' => ['shape' => 'AttributeGroupArn',], 'name' => ['shape' => 'Name',], 'description' => ['shape' => 'Description',], 'creationTime' => ['shape' => 'Timestamp',], 'lastUpdateTime' => ['shape' => 'Timestamp',],],], 'Attributes' => ['type' => 'string', 'max' => 8000, 'min' => 1, 'pattern' => '[\\u0009\\u000A\\u000D\\u0020-\\u00FF]+',], 'ClientToken' => ['type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '[a-zA-Z0-9][a-zA-Z0-9_-]*',], 'ConflictException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 409,], 'exception' => true,], 'CreateApplicationRequest' => ['type' => 'structure', 'required' => ['name', 'clientToken',], 'members' => ['name' => ['shape' => 'Name',], 'description' => ['shape' => 'Description',], 'tags' => ['shape' => 'Tags',], 'clientToken' => ['shape' => 'ClientToken', 'idempotencyToken' => true,],],], 'CreateApplicationResponse' => ['type' => 'structure', 'members' => ['application' => ['shape' => 'Application',],],], 'CreateAttributeGroupRequest' => ['type' => 'structure', 'required' => ['name', 'attributes', 'clientToken',], 'members' => ['name' => ['shape' => 'Name',], 'description' => ['shape' => 'Description',], 'attributes' => ['shape' => 'Attributes',], 'tags' => ['shape' => 'Tags',], 'clientToken' => ['shape' => 'ClientToken', 'idempotencyToken' => true,],],], 'CreateAttributeGroupResponse' => ['type' => 'structure', 'members' => ['attributeGroup' => ['shape' => 'AttributeGroup',],],], 'DeleteApplicationRequest' => ['type' => 'structure', 'required' => ['application',], 'members' => ['application' => ['shape' => 'ApplicationSpecifier', 'location' => 'uri', 'locationName' => 'application',],],], 'DeleteApplicationResponse' => ['type' => 'structure', 'members' => ['application' => ['shape' => 'ApplicationSummary',],],], 'DeleteAttributeGroupRequest' => ['type' => 'structure', 'required' => ['attributeGroup',], 'members' => ['attributeGroup' => ['shape' => 'AttributeGroupSpecifier', 'location' => 'uri', 'locationName' => 'attributeGroup',],],], 'DeleteAttributeGroupResponse' => ['type' => 'structure', 'members' => ['attributeGroup' => ['shape' => 'AttributeGroupSummary',],],], 'Description' => ['type' => 'string', 'max' => 1024,], 'DisassociateAttributeGroupRequest' => ['type' => 'structure', 'required' => ['application', 'attributeGroup',], 'members' => ['application' => ['shape' => 'ApplicationSpecifier', 'location' => 'uri', 'locationName' => 'application',], 'attributeGroup' => ['shape' => 'AttributeGroupSpecifier', 'location' => 'uri', 'locationName' => 'attributeGroup',],],], 'DisassociateAttributeGroupResponse' => ['type' => 'structure', 'members' => ['applicationArn' => ['shape' => 'ApplicationArn',], 'attributeGroupArn' => ['shape' => 'AttributeGroupArn',],],], 'DisassociateResourceRequest' => ['type' => 'structure', 'required' => ['application', 'resourceType', 'resource',], 'members' => ['application' => ['shape' => 'ApplicationSpecifier', 'location' => 'uri', 'locationName' => 'application',], 'resourceType' => ['shape' => 'ResourceType', 'location' => 'uri', 'locationName' => 'resourceType',], 'resource' => ['shape' => 'ResourceSpecifier', 'location' => 'uri', 'locationName' => 'resource',],],], 'DisassociateResourceResponse' => ['type' => 'structure', 'members' => ['applicationArn' => ['shape' => 'ApplicationArn',], 'resourceArn' => ['shape' => 'Arn',],],], 'GetApplicationRequest' => ['type' => 'structure', 'required' => ['application',], 'members' => ['application' => ['shape' => 'ApplicationSpecifier', 'location' => 'uri', 'locationName' => 'application',],],], 'GetApplicationResponse' => ['type' => 'structure', 'members' => ['id' => ['shape' => 'ApplicationId',], 'arn' => ['shape' => 'ApplicationArn',], 'name' => ['shape' => 'Name',], 'description' => ['shape' => 'Description',], 'creationTime' => ['shape' => 'Timestamp',], 'lastUpdateTime' => ['shape' => 'Timestamp',], 'associatedResourceCount' => ['shape' => 'AssociationCount',], 'tags' => ['shape' => 'Tags',],],], 'GetAttributeGroupRequest' => ['type' => 'structure', 'required' => ['attributeGroup',], 'members' => ['attributeGroup' => ['shape' => 'AttributeGroupSpecifier', 'location' => 'uri', 'locationName' => 'attributeGroup',],],], 'GetAttributeGroupResponse' => ['type' => 'structure', 'members' => ['id' => ['shape' => 'AttributeGroupId',], 'arn' => ['shape' => 'AttributeGroupArn',], 'name' => ['shape' => 'Name',], 'description' => ['shape' => 'Description',], 'attributes' => ['shape' => 'Attributes',], 'creationTime' => ['shape' => 'Timestamp',], 'lastUpdateTime' => ['shape' => 'Timestamp',], 'tags' => ['shape' => 'Tags',],],], 'InternalServerException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 500,], 'exception' => true, 'fault' => true,], 'ListApplicationsRequest' => ['type' => 'structure', 'members' => ['nextToken' => ['shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken',], 'maxResults' => ['shape' => 'MaxResults', 'box' => true, 'location' => 'querystring', 'locationName' => 'maxResults',],],], 'ListApplicationsResponse' => ['type' => 'structure', 'members' => ['applications' => ['shape' => 'ApplicationSummaries',], 'nextToken' => ['shape' => 'NextToken',],],], 'ListAssociatedAttributeGroupsRequest' => ['type' => 'structure', 'required' => ['application',], 'members' => ['application' => ['shape' => 'ApplicationSpecifier', 'location' => 'uri', 'locationName' => 'application',], 'nextToken' => ['shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken',], 'maxResults' => ['shape' => 'MaxResults', 'box' => true, 'location' => 'querystring', 'locationName' => 'maxResults',],],], 'ListAssociatedAttributeGroupsResponse' => ['type' => 'structure', 'members' => ['attributeGroups' => ['shape' => 'AttributeGroupIds',], 'nextToken' => ['shape' => 'NextToken',],],], 'ListAssociatedResourcesRequest' => ['type' => 'structure', 'required' => ['application',], 'members' => ['application' => ['shape' => 'ApplicationSpecifier', 'location' => 'uri', 'locationName' => 'application',], 'nextToken' => ['shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken',], 'maxResults' => ['shape' => 'MaxResults', 'box' => true, 'location' => 'querystring', 'locationName' => 'maxResults',],],], 'ListAssociatedResourcesResponse' => ['type' => 'structure', 'members' => ['resources' => ['shape' => 'Resources',], 'nextToken' => ['shape' => 'NextToken',],],], 'ListAttributeGroupsRequest' => ['type' => 'structure', 'members' => ['nextToken' => ['shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken',], 'maxResults' => ['shape' => 'MaxResults', 'box' => true, 'location' => 'querystring', 'locationName' => 'maxResults',],],], 'ListAttributeGroupsResponse' => ['type' => 'structure', 'members' => ['attributeGroups' => ['shape' => 'AttributeGroupSummaries',], 'nextToken' => ['shape' => 'NextToken',],],], 'ListTagsForResourceRequest' => ['type' => 'structure', 'required' => ['resourceArn',], 'members' => ['resourceArn' => ['shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn',],],], 'ListTagsForResourceResponse' => ['type' => 'structure', 'members' => ['tags' => ['shape' => 'Tags',],],], 'MaxResults' => ['type' => 'integer', 'max' => 25, 'min' => 1,], 'Name' => ['type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '\\w+',], 'NextToken' => ['type' => 'string', 'max' => 2024, 'min' => 1, 'pattern' => '[A-Za-z0-9+/=]+',], 'ResourceInfo' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'ResourceSpecifier',], 'arn' => ['shape' => 'StackArn',],],], 'ResourceNotFoundException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 404,], 'exception' => true,], 'ResourceSpecifier' => ['type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '\\S+',], 'ResourceType' => ['type' => 'string', 'enum' => ['CFN_STACK',],], 'Resources' => ['type' => 'list', 'member' => ['shape' => 'ResourceInfo',],], 'ServiceQuotaExceededException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 402,], 'exception' => true,], 'StackArn' => ['type' => 'string', 'pattern' => 'arn:aws[-a-z]*:cloudformation:[a-z]{2}(-gov)?-[a-z]+-\\d:\\d{12}:stack/[a-zA-Z][-A-Za-z0-9]{0,127}/[0-9a-f]{8}(-[0-9a-f]{4}){3}-[0-9a-f]{12}',], 'String' => ['type' => 'string',], 'SyncAction' => ['type' => 'string', 'enum' => ['START_SYNC', 'NO_ACTION',],], 'SyncResourceRequest' => ['type' => 'structure', 'required' => ['resourceType', 'resource',], 'members' => ['resourceType' => ['shape' => 'ResourceType', 'location' => 'uri', 'locationName' => 'resourceType',], 'resource' => ['shape' => 'ResourceSpecifier', 'location' => 'uri', 'locationName' => 'resource',],],], 'SyncResourceResponse' => ['type' => 'structure', 'members' => ['applicationArn' => ['shape' => 'ApplicationArn',], 'resourceArn' => ['shape' => 'Arn',], 'actionTaken' => ['shape' => 'SyncAction',],],], 'TagKey' => ['type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '(?!aws:)[a-zA-Z+-=._:/]+',], 'TagKeys' => ['type' => 'list', 'member' => ['shape' => 'TagKey',], 'max' => 50, 'min' => 0,], 'TagResourceRequest' => ['type' => 'structure', 'required' => ['resourceArn', 'tags',], 'members' => ['resourceArn' => ['shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn',], 'tags' => ['shape' => 'Tags',],],], 'TagResourceResponse' => ['type' => 'structure', 'members' => [],], 'TagValue' => ['type' => 'string', 'max' => 256, 'pattern' => '[\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*',], 'Tags' => ['type' => 'map', 'key' => ['shape' => 'TagKey',], 'value' => ['shape' => 'TagValue',], 'max' => 50, 'min' => 0,], 'Timestamp' => ['type' => 'timestamp', 'timestampFormat' => 'iso8601',], 'UntagResourceRequest' => ['type' => 'structure', 'required' => ['resourceArn', 'tagKeys',], 'members' => ['resourceArn' => ['shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn',], 'tagKeys' => ['shape' => 'TagKeys', 'location' => 'querystring', 'locationName' => 'tagKeys',],],], 'UntagResourceResponse' => ['type' => 'structure', 'members' => [],], 'UpdateApplicationRequest' => ['type' => 'structure', 'required' => ['application',], 'members' => ['application' => ['shape' => 'ApplicationSpecifier', 'location' => 'uri', 'locationName' => 'application',], 'name' => ['shape' => 'Name',], 'description' => ['shape' => 'Description',],],], 'UpdateApplicationResponse' => ['type' => 'structure', 'members' => ['application' => ['shape' => 'Application',],],], 'UpdateAttributeGroupRequest' => ['type' => 'structure', 'required' => ['attributeGroup',], 'members' => ['attributeGroup' => ['shape' => 'AttributeGroupSpecifier', 'location' => 'uri', 'locationName' => 'attributeGroup',], 'name' => ['shape' => 'Name',], 'description' => ['shape' => 'Description',], 'attributes' => ['shape' => 'Attributes',],],], 'UpdateAttributeGroupResponse' => ['type' => 'structure', 'members' => ['attributeGroup' => ['shape' => 'AttributeGroup',],],], 'ValidationException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'String',],], 'error' => ['httpStatusCode' => 400,], 'exception' => true,],],];
