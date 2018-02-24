<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once("sendviabigquery.php");

function sendMail($to, $subject, $message, $replyto) {
	$sender = getConfig()["emailSender"];
	$headers = 'From: '.$sender."\r\n".
	'Reply-To: '.$replyto."\r\n";

	return mail($to, $subject, $message, $headers);
}

function sendContactForm($name, $companyname, $email, $phone, $message) {
	$conf = getConfig()["forms"]["contact"];
	$query = 'insert into ' . $conf["table"] . ' (user_name, company_name, email, phone, message) values ("' . $name . '", 
    "' . $companyname . '", "' . $email . '", "' . $phone . '", , "' . $message . '")'; //MUST add escape

	$result = sendViaBigQuery($query);
	//email
	$sendTo = $conf["email"];
	$email_subject = $conf["subject"];

	$email_message = "Name: ".($name)."\n";
	$email_message .= "Company Name: ".($companyname)."\n";
	$email_message .= "Email: ".($email)."\n";
	$email_message .= "Phone: ".($phone)."\n";
    $email_message .= "Message: ".($message)."\n";

	$mailResult = sendMail($sendTo, $email_subject, $email_message, $email);
	return $mailResult && $result->isComplete();
}

function sendHpContactForm($name, $email, $companyname, $message) {
	$conf = getConfig()["forms"]["hp"];
	$query = 'insert into ' . $conf["table"] . ' (user_name, email, company_name,  message) values ("' . $name . '", "' . $email . '", 
    "' . $companyname . '", "' . $message . '")'; //MUST add escape

	$result = sendViaBigQuery($query);

	//email

	$email_to = $conf["email"];
	$email_subject = $conf["subject"];
	$email_message = "Name: ".($name)."\n";
	$email_message .= "Email: ".($email)."\n";
	$email_message .= "Company Name: ".($companyname)."\n";
	$email_message .= "Message: ".($message)."\n";


	$mailResult = sendMail($email_to, $email_subject, $email_message, $email);
	return $mailResult && $result->isComplete();
}

function sendPopupContactForm($name, $email, $phone, $companyname, $message) {
	$conf = getConfig()["forms"]["popup"];
    $query = 'insert into ' . $conf["table"] . ' (user_name, email, phone, company_name,  message) values ("' . $name . '", 
    "' . $email . '", "' . $phone . '", "' . $companyname . '", "' . $message . '")'; //MUST add escape
    
    $result = sendViaBigQuery($query);

	//email

	$email_to = $conf["email"];
	$email_subject = $conf["subject"];
	$email_message = "Name: ".($name)."\n";
	$email_message .= "Email: ".($email)."\n";
	$email_message .= "Phone: ".($phone)."\n";
	$email_message .= "Company Name: ".($companyname)."\n";
	$email_message .= "Message: ".($message)."\n";


	$mailResult = sendMail($email_to, $email_subject, $email_message, $email);
	return $mailResult && $result->isComplete();
}

function sendPopupDemoContactForm($name, $email, $phone, $companyname, $message) {
	$conf = getConfig()["forms"]["popupdemo"];

    $query = 'insert into ' . $conf["table"] . ' (user_name, email, phone, company_name,  message) values ("' . $name . '", 
    "' . $email . '", "' . $phone . '", "' . $companyname . '", "' . $message . '")'; //MUST add escape
    
    $result = sendViaBigQuery($query);

	//email

	$email_to = $conf["email"];
	$email_subject = $conf["subject"];
	$email_message = "Name: ".($name)."\n";
	$email_message .= "Email: ".($email)."\n";
	$email_message .= "Phone: ".($phone)."\n";
	$email_message .= "Company Name: ".($companyname)."\n";
	$email_message .= "Message: ".($message)."\n";


	$mailResult = sendMail($email_to, $email_subject, $email_message, $email);
	return $mailResult && $result->isComplete();
}

function sendJobsContactForm($name, $email, $fileLink) {
	$conf = getConfig()["forms"]["jobs"];
	$tblname = $conf["table"];
	$query = 'insert into ' . $tblname . ' (user_name, email, filecv) values ("' . $name . '", 
	"' . $email . '", "' . $fileLink . '")'; //MUST add escape
    
	$result = sendViaBigQuery($query);

	//email

	$email_to = getConfig()["forms"]["jobs"]["email"];
	$email_subject = getConfig()["forms"]["jobs"]["subject"];
	$email_message = "Name: ".($name)."\n";
	$email_message .= "Email: ".($email)."\n";
	$email_message .= "File: $fileLink\n";

	$mailResult = sendMail($email_to, $email_subject, $email_message, $email);

	return $mailResult && $result->isComplete();
}
?>
