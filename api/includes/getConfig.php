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
	$isDev = $app == "burnished-data-183409";
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
			"email" => $isDev ? "aryeklt+popupdemo@gmail.com" : "Dollhouse_demo@resonai.com",
			"subject" => "Resonai-Contact Form - popup demo",
			"table" => $isDev ? "test1.cf_popupdemo" : "resosite.cf_popup"
		],
		"popup" => [
			"email" =>  $isDev ? "aryeklt+beta@gmail.com" : "joinbeta@resonai.com",
			"subject" => "Resonai-Contact Form - popup beta",
			"table" => $isDev ? "test1.cf_popup" : "resosite.cf_popup"
		],
		"hp" => [
			"email" => $isDev ? "aryeklt+info@gmail.com" : "info@resonai.com",
			"subject" => "Resonai-Contact Form - homepage",
			"table" => $isDev ? "test1.cf_hp" : "resosite.cf_hp"
		],
		"contact" => [
			"email" => $isDev ? "aryeklt+info-contact@gmail.com" : "info@resonai.com",
			"subject" => "Resonai-Contact Form - contact",
			"table" => $isDev ? "test1.cf" : "resosite.cf"
		]
	];
	return $result;
}
