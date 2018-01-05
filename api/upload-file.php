<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once("../vendor/autoload.php");
use google\appengine\api\cloud_storage\CloudStorageTools;

$options = [];
$upload_url = CloudStorageTools::createUploadUrl('/api/insert_contactFormJobs.php', $options);

echo $upload_url;
