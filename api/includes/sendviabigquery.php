<?php
require_once __DIR__ . '/../../vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\BigQuery\BigQueryClient;
use google\appengine\api\app_identity\AppIdentityService;

function sendViaBigQuery($query)
{
    # Your Google Cloud Platform project ID
    //$projectId = 'burnished-data-183409';

	//Get the service account name
    $projectId = AppIdentityService::getServiceAccountName();
    	//Take the user part of the email, it is the project id
    $parts = explode("@", $projectId);
    $projectId=$parts[0];

    # Instantiates a client
    $bigquery = new BigQueryClient([
        'projectId' => $projectId
    ]);
    # [START run_query]
    
    $queryJobConfig = $bigquery->query($query)
        ->parameters([
            'date' => $bigquery->timestamp(new \DateTime('1980-01-01 12:15:00Z')),
            'message' => 'A commit message.'
        ]);
    $queryResults = $bigquery->runQuery($queryJobConfig);
    # [END run_query]
    return $queryResults;
}
