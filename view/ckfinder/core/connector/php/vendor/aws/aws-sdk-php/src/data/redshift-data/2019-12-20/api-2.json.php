<?php
// This file was auto-generated from sdk-root/src/data/redshift-data/2019-12-20/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2019-12-20', 'endpointPrefix' => 'redshift-data', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceFullName' => 'Redshift Data API Service', 'serviceId' => 'Redshift Data', 'signatureVersion' => 'v4', 'signingName' => 'redshift-data', 'targetPrefix' => 'RedshiftData', 'uid' => 'redshift-data-2019-12-20',], 'operations' => ['CancelStatement' => ['name' => 'CancelStatement', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'CancelStatementRequest',], 'output' => ['shape' => 'CancelStatementResponse',], 'errors' => [['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServerException',],],], 'DescribeStatement' => ['name' => 'DescribeStatement', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'DescribeStatementRequest',], 'output' => ['shape' => 'DescribeStatementResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServerException',],],], 'DescribeTable' => ['name' => 'DescribeTable', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'DescribeTableRequest',], 'output' => ['shape' => 'DescribeTableResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],], 'ExecuteStatement' => ['name' => 'ExecuteStatement', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'ExecuteStatementInput',], 'output' => ['shape' => 'ExecuteStatementOutput',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'ExecuteStatementException',], ['shape' => 'ActiveStatementsExceededException',],],], 'GetStatementResult' => ['name' => 'GetStatementResult', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'GetStatementResultRequest',], 'output' => ['shape' => 'GetStatementResultResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'ResourceNotFoundException',], ['shape' => 'InternalServerException',],],], 'ListDatabases' => ['name' => 'ListDatabases', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'ListDatabasesRequest',], 'output' => ['shape' => 'ListDatabasesResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],], 'ListSchemas' => ['name' => 'ListSchemas', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'ListSchemasRequest',], 'output' => ['shape' => 'ListSchemasResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],], 'ListStatements' => ['name' => 'ListStatements', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'ListStatementsRequest',], 'output' => ['shape' => 'ListStatementsResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],], 'ListTables' => ['name' => 'ListTables', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'ListTablesRequest',], 'output' => ['shape' => 'ListTablesResponse',], 'errors' => [['shape' => 'ValidationException',], ['shape' => 'InternalServerException',],],],], 'shapes' => ['ActiveStatementsExceededException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'String',],], 'exception' => true,], 'Blob' => ['type' => 'blob',], 'Boolean' => ['type' => 'boolean', 'box' => true,], 'BoxedBoolean' => ['type' => 'boolean', 'box' => true,], 'BoxedDouble' => ['type' => 'double', 'box' => true,], 'BoxedLong' => ['type' => 'long', 'box' => true,], 'CancelStatementRequest' => ['type' => 'structure', 'required' => ['Id',], 'members' => ['Id' => ['shape' => 'UUID',],],], 'CancelStatementResponse' => ['type' => 'structure', 'members' => ['Status' => ['shape' => 'Boolean',],],], 'ColumnList' => ['type' => 'list', 'member' => ['shape' => 'ColumnMetadata',],], 'ColumnMetadata' => ['type' => 'structure', 'members' => ['columnDefault' => ['shape' => 'String',], 'isCaseSensitive' => ['shape' => 'bool',], 'isCurrency' => ['shape' => 'bool',], 'isSigned' => ['shape' => 'bool',], 'label' => ['shape' => 'String',], 'length' => ['shape' => 'Integer',], 'name' => ['shape' => 'String',], 'nullable' => ['shape' => 'Integer',], 'precision' => ['shape' => 'Integer',], 'scale' => ['shape' => 'Integer',], 'schemaName' => ['shape' => 'String',], 'tableName' => ['shape' => 'String',], 'typeName' => ['shape' => 'String',],],], 'ColumnMetadataList' => ['type' => 'list', 'member' => ['shape' => 'ColumnMetadata',],], 'DatabaseList' => ['type' => 'list', 'member' => ['shape' => 'String',],], 'DescribeStatementRequest' => ['type' => 'structure', 'required' => ['Id',], 'members' => ['Id' => ['shape' => 'UUID',],],], 'DescribeStatementResponse' => ['type' => 'structure', 'required' => ['Id',], 'members' => ['ClusterIdentifier' => ['shape' => 'String',], 'CreatedAt' => ['shape' => 'Timestamp',], 'Database' => ['shape' => 'String',], 'DbUser' => ['shape' => 'String',], 'Duration' => ['shape' => 'Long',], 'Error' => ['shape' => 'String',], 'HasResultSet' => ['shape' => 'Boolean',], 'Id' => ['shape' => 'UUID',], 'QueryParameters' => ['shape' => 'SqlParametersList',], 'QueryString' => ['shape' => 'StatementString',], 'RedshiftPid' => ['shape' => 'Long',], 'RedshiftQueryId' => ['shape' => 'Long',], 'ResultRows' => ['shape' => 'Long',], 'ResultSize' => ['shape' => 'Long',], 'SecretArn' => ['shape' => 'SecretArn',], 'Status' => ['shape' => 'StatusString',], 'UpdatedAt' => ['shape' => 'Timestamp',],],], 'DescribeTableRequest' => ['type' => 'structure', 'required' => ['ClusterIdentifier', 'Database',], 'members' => ['ClusterIdentifier' => ['shape' => 'Location',], 'ConnectedDatabase' => ['shape' => 'String',], 'Database' => ['shape' => 'String',], 'DbUser' => ['shape' => 'String',], 'MaxResults' => ['shape' => 'PageSize',], 'NextToken' => ['shape' => 'String',], 'Schema' => ['shape' => 'String',], 'SecretArn' => ['shape' => 'SecretArn',], 'Table' => ['shape' => 'String',],],], 'DescribeTableResponse' => ['type' => 'structure', 'members' => ['ColumnList' => ['shape' => 'ColumnList',], 'NextToken' => ['shape' => 'String',], 'TableName' => ['shape' => 'String',],],], 'ExecuteStatementException' => ['type' => 'structure', 'required' => ['Message', 'StatementId',], 'members' => ['Message' => ['shape' => 'String',], 'StatementId' => ['shape' => 'String',],], 'exception' => true, 'fault' => true,], 'ExecuteStatementInput' => ['type' => 'structure', 'required' => ['ClusterIdentifier', 'Sql',], 'members' => ['ClusterIdentifier' => ['shape' => 'Location',], 'Database' => ['shape' => 'String',], 'DbUser' => ['shape' => 'String',], 'Parameters' => ['shape' => 'SqlParametersList',], 'SecretArn' => ['shape' => 'SecretArn',], 'Sql' => ['shape' => 'StatementString',], 'StatementName' => ['shape' => 'StatementNameString',], 'WithEvent' => ['shape' => 'Boolean',],],], 'ExecuteStatementOutput' => ['type' => 'structure', 'members' => ['ClusterIdentifier' => ['shape' => 'Location',], 'CreatedAt' => ['shape' => 'Timestamp',], 'Database' => ['shape' => 'String',], 'DbUser' => ['shape' => 'String',], 'Id' => ['shape' => 'UUID',], 'SecretArn' => ['shape' => 'SecretArn',],],], 'Field' => ['type' => 'structure', 'members' => ['blobValue' => ['shape' => 'Blob',], 'booleanValue' => ['shape' => 'BoxedBoolean',], 'doubleValue' => ['shape' => 'BoxedDouble',], 'isNull' => ['shape' => 'BoxedBoolean',], 'longValue' => ['shape' => 'BoxedLong',], 'stringValue' => ['shape' => 'String',],], 'union' => true,], 'FieldList' => ['type' => 'list', 'member' => ['shape' => 'Field',],], 'GetStatementResultRequest' => ['type' => 'structure', 'required' => ['Id',], 'members' => ['Id' => ['shape' => 'UUID',], 'NextToken' => ['shape' => 'String',],],], 'GetStatementResultResponse' => ['type' => 'structure', 'required' => ['Records',], 'members' => ['ColumnMetadata' => ['shape' => 'ColumnMetadataList',], 'NextToken' => ['shape' => 'String',], 'Records' => ['shape' => 'SqlRecords',], 'TotalNumRows' => ['shape' => 'Long',],],], 'Integer' => ['type' => 'integer',], 'InternalServerException' => ['type' => 'structure', 'required' => ['Message',], 'members' => ['Message' => ['shape' => 'String',],], 'exception' => true, 'fault' => true,], 'ListDatabasesRequest' => ['type' => 'structure', 'required' => ['ClusterIdentifier',], 'members' => ['ClusterIdentifier' => ['shape' => 'Location',], 'Database' => ['shape' => 'String',], 'DbUser' => ['shape' => 'String',], 'MaxResults' => ['shape' => 'PageSize',], 'NextToken' => ['shape' => 'String',], 'SecretArn' => ['shape' => 'SecretArn',],],], 'ListDatabasesResponse' => ['type' => 'structure', 'members' => ['Databases' => ['shape' => 'DatabaseList',], 'NextToken' => ['shape' => 'String',],],], 'ListSchemasRequest' => ['type' => 'structure', 'required' => ['ClusterIdentifier', 'Database',], 'members' => ['ClusterIdentifier' => ['shape' => 'Location',], 'ConnectedDatabase' => ['shape' => 'String',], 'Database' => ['shape' => 'String',], 'DbUser' => ['shape' => 'String',], 'MaxResults' => ['shape' => 'PageSize',], 'NextToken' => ['shape' => 'String',], 'SchemaPattern' => ['shape' => 'String',], 'SecretArn' => ['shape' => 'SecretArn',],],], 'ListSchemasResponse' => ['type' => 'structure', 'members' => ['NextToken' => ['shape' => 'String',], 'Schemas' => ['shape' => 'SchemaList',],],], 'ListStatementsLimit' => ['type' => 'integer', 'max' => 100, 'min' => 0,], 'ListStatementsRequest' => ['type' => 'structure', 'members' => ['MaxResults' => ['shape' => 'ListStatementsLimit',], 'NextToken' => ['shape' => 'String',], 'RoleLevel' => ['shape' => 'Boolean',], 'StatementName' => ['shape' => 'StatementNameString',], 'Status' => ['shape' => 'StatusString',],],], 'ListStatementsResponse' => ['type' => 'structure', 'required' => ['Statements',], 'members' => ['NextToken' => ['shape' => 'String',], 'Statements' => ['shape' => 'StatementList',],],], 'ListTablesRequest' => ['type' => 'structure', 'required' => ['ClusterIdentifier', 'Database',], 'members' => ['ClusterIdentifier' => ['shape' => 'Location',], 'ConnectedDatabase' => ['shape' => 'String',], 'Database' => ['shape' => 'String',], 'DbUser' => ['shape' => 'String',], 'MaxResults' => ['shape' => 'PageSize',], 'NextToken' => ['shape' => 'String',], 'SchemaPattern' => ['shape' => 'String',], 'SecretArn' => ['shape' => 'SecretArn',], 'TablePattern' => ['shape' => 'String',],],], 'ListTablesResponse' => ['type' => 'structure', 'members' => ['NextToken' => ['shape' => 'String',], 'Tables' => ['shape' => 'TableList',],],], 'Location' => ['type' => 'string',], 'Long' => ['type' => 'long',], 'PageSize' => ['type' => 'integer', 'max' => 1000, 'min' => 0,], 'ParameterName' => ['type' => 'string', 'pattern' => '^[0-9a-zA-Z_]+$',], 'ParameterValue' => ['type' => 'string', 'min' => 1,], 'ResourceNotFoundException' => ['type' => 'structure', 'required' => ['Message', 'ResourceId',], 'members' => ['Message' => ['shape' => 'String',], 'ResourceId' => ['shape' => 'String',],], 'exception' => true,], 'SchemaList' => ['type' => 'list', 'member' => ['shape' => 'String',],], 'SecretArn' => ['type' => 'string',], 'SqlParameter' => ['type' => 'structure', 'required' => ['name', 'value',], 'members' => ['name' => ['shape' => 'ParameterName',], 'value' => ['shape' => 'ParameterValue',],],], 'SqlParametersList' => ['type' => 'list', 'member' => ['shape' => 'SqlParameter',], 'min' => 1,], 'SqlRecords' => ['type' => 'list', 'member' => ['shape' => 'FieldList',],], 'StatementData' => ['type' => 'structure', 'required' => ['Id',], 'members' => ['CreatedAt' => ['shape' => 'Timestamp',], 'Id' => ['shape' => 'UUID',], 'QueryParameters' => ['shape' => 'SqlParametersList',], 'QueryString' => ['shape' => 'StatementString',], 'SecretArn' => ['shape' => 'SecretArn',], 'StatementName' => ['shape' => 'StatementNameString',], 'Status' => ['shape' => 'StatusString',], 'UpdatedAt' => ['shape' => 'Timestamp',],],], 'StatementList' => ['type' => 'list', 'member' => ['shape' => 'StatementData',],], 'StatementNameString' => ['type' => 'string', 'max' => 500, 'min' => 0,], 'StatementString' => ['type' => 'string',], 'StatusString' => ['type' => 'string', 'enum' => ['SUBMITTED', 'PICKED', 'STARTED', 'FINISHED', 'ABORTED', 'FAILED', 'ALL',],], 'String' => ['type' => 'string',], 'TableList' => ['type' => 'list', 'member' => ['shape' => 'TableMember',],], 'TableMember' => ['type' => 'structure', 'members' => ['name' => ['shape' => 'String',], 'schema' => ['shape' => 'String',], 'type' => ['shape' => 'String',],],], 'Timestamp' => ['type' => 'timestamp',], 'UUID' => ['type' => 'string',], 'ValidationException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'String',],], 'exception' => true,], 'bool' => ['type' => 'boolean',],],];
