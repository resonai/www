<?php
//insert_contactFormHp.php

require_once("includes/includes.php");
require_once("includes/randomstring.php");
require_once("../vendor/autoload.php");

use google\appengine\api\cloud_storage\CloudStorageTools;

//$form_data = json_decode(file_get_contents("php://input"));
$data = array();
$error = array();

if(empty($_POST["user_name"]))
{
 $error["user_name"] = "User Name is required";
}

if(empty($_POST["email"]))
{
 $error["email"] = "Email is required";
}


$file = $_FILES["filecv"];
$file_name = $file["name"];
$temp_name = $file["tmp_name"];
if(substr($temp_name, 0, 2) === "gs") {
	$my_bucket = CloudStorageTools::getDefaultGoogleStorageBucketName();

	$file_name = time() . "_" . generateRandomString(10);

	$storeAt = "gs://${my_bucket}/${file_name}";

	$options = [
		'gs' => [
			'acl' => 'public-read',
			'Content-Type' => $file['type']
		]
	];

	$ctx = stream_context_create($options);
	$saved = file_put_contents($storeAt, file_get_contents($temp_name), 0, $ctx);

	//move_uploaded_file($temp_name, $storeAt);
	$public_url = CloudStorageTools::getPublicUrl($storeAt, true);
}
else {
	$public_url = "http://example.com/file1";
}
/*
if(empty($_POST["filecv"]))
{
 $error["filecv"] = "CV Upload is required";
} 
*/
if(!empty($error))
{
 $data["error"] = $error;
}
else
{
    try{
        $result = sendJobsContactForm($_POST["user_name"], $_POST["email"], $public_url);
        if($result->isComplete()){
                $data["message"] = "Thank you. We will contact you soon!";
        }
        else {
            $data["error"] = "We had internal error.";
        }
    }
    catch(Exception $e) {
        $data["error"] = "We had internal error";
	syslog(LOG_ERROR, $e->getMessage());
	//$data["data"] = json_encode($e);
    }
//    var_dump($result);
    
}

header("Content-Type:application/json");
echo json_encode($data);

?>
