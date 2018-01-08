<?php
use google\appengine\api\app_identity\AppIdentityService;
use google\appengine\api\cloud_storage\CloudStorageTools;

function getProjectId() {
	$projectId = AppIdentityService::getServiceAccountName();
	//Take the user part of the email, it is the project id
	$parts = explode("@", $projectId);
	$projectId=$parts[0];
	return $projectId;
}

function getAppName(){
	return AppIdentityService::getApplicationId();
}

function getConfig() {
	$result = [];
	$app = getAppName();
	$isDev = $app != "burnished-data-183409";
	$result["projectId"] = getProjectId();
	$result["bucketName"] = CloudStorageTools::getDefaultGoogleStorageBucketName();
	$result["emailSender"] = "noreply@" . getAppName() . ".appspotmail.com";

	$result["forms"] = [
		"jobs" => [
			"email" => "einathazout@gmail.com",
			"subject" => "Resonai-Contact Form",
			"table" => $isDev ? "test1.cf_file" : "resosite.cf_file"
		],
		"popupdemo" => [
			"email" => "Dollhouse_demo@resonai.com",
			"subject" => "Resonai-Contact Form",
			"table" => "resosite.cf_popup"
		],
		"popup" => [
			"email" =>  "joinbeta@resonai.com",
			"subject" => "Resonai-Contact Form",
			"table" => "resosite.cf_popup"
		],
		"hp" => [
			"email" =>  "info@resonai.com",
			"subject" => "Resonai-Contact Form",
			"table" => "resosite.cf_hp"
		],
		"contact" => [
			"email" =>  "info@resonai.com",
			"subject" => "Resonai-Contact Form",
			"table" => "resosite.cf"
		]
	];
	return $result;
}
