<?php
use google\appengine\api\app_identity\AppIdentityService;

function getProjectId() {
	$projectId = AppIdentityService::getServiceAccountName();
	//Take the user part of the email, it is the project id
	$parts = explode("@", $projectId);
	$projectId=$parts[0];
	return $projectId;
}
