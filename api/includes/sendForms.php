<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once("sendviabigquery.php");

$sender = "noreply@burnished-data-183409.appspotmail.com";

function sendMail($to, $subject, $message, $replyto) {
	global $sender;
	$headers = 'From: '.$sender."\r\n".
	'Reply-To: '.$replyto."\r\n";

	mail($to, $subject, $message, $headers);
}

function sendContactForm($name, $companyname, $email, $phone) {
	$query = 'insert into test1.cf (user_name, company_name, email, phone) values ("' . $name . '", "' . $companyname . '", "' . $email 
	. '", "' . $phone . '")'; //MUST add escape

	$result = sendViaBigQuery($query);
	//email
	$sendTo = "info@resonai.com";
	$email_subject = "Resonai-Contact Form";

	$email_message = "Name: ".($name)."\n";
	$email_message .= "Company Name: ".($companyname)."\n";
	$email_message .= "Email: ".($email)."\n";
	$email_message .= "Phone: ".($phone)."\n";
	sendMail($sendTo, $email_subject, $email_message, $email);

	return $result;
}

function sendHpContactForm($name, $email, $companyname, $message) {
	$query = 'insert into test1.cf_hp (user_name, email, company_name,  message) values ("' . $name . '", "' . $email . '", "' . 
	$companyname . '", "' . $message . '")'; //MUST add escape

	$result = sendViaBigQuery($query);

	//email

	$email_to = "info@resonai.com";
	$email_subject = "Resonai - Contact Form";
	$email_message = "Name: ".($name)."\n";
	$email_message .= "Email: ".($email)."\n";
	$email_message .= "Company Name: ".($companyname)."\n";
	$email_message .= "Message: ".($message)."\n";


	sendMail($email_to, $email_subject, $email_message, $email);

	return $result;
}

function sendPopupContactForm($name, $email, $phone, $companyname, $message) {
    $query = 'insert into test1.cf_popup (user_name, email, phone, company_name,  message) values ("' . $name . '", "' . $email . '", "' 
    . $phone . '", "' . $companyname . '", "' . $message . '")'; //MUST add escape
    
    $result = sendViaBigQuery($query);

	//email

	$email_to = "joinbeta@resonai.com";
	$email_subject = "Resonai - Contact Form";
	$email_message = "Name: ".($name)."\n";
	$email_message .= "Email: ".($email)."\n";
	$email_message .= "Phone: ".($phone)."\n";
	$email_message .= "Company Name: ".($companyname)."\n";
	$email_message .= "Message: ".($message)."\n";


	sendMail($email_to, $email_subject, $email_message, $email);

    return $result;
}

function sendPopupDemoContactForm($name, $email, $phone, $companyname, $message) {
    $query = 'insert into test1.cf_popup_demo (user_name, email, phone, company_name,  message) values ("' . $name . '", "' . $email . 
    '", "' . $phone . '", "' . $companyname . '", "' . $message . '")'; //MUST add escape
    
    $result = sendViaBigQuery($query);

	//email

	$email_to = " Dollhouse_demo@resonai.com";
	$email_subject = "Resonai - Contact Form";
	$email_message = "Name: ".($name)."\n";
	$email_message .= "Email: ".($email)."\n";
	$email_message .= "Phone: ".($phone)."\n";
	$email_message .= "Company Name: ".($companyname)."\n";
	$email_message .= "Message: ".($message)."\n";


	sendMail($email_to, $email_subject, $email_message, $email);

    return $result;
}

function sendJobsContactForm($name, $email, $fileLink) {
    $query = 'insert into test1.cf_file (user_name, email, filecv) values ("' . $name . '", "' . $email . 
    '", "' . $fileLink . '")'; //MUST add escape
    
    $result = sendViaBigQuery($query);

	//email

	$email_to = "simongold79@gmail.com";
	$email_subject = "Resonai-Contact Form";
	$email_message = "Name: ".($name)."\n";
	$email_message .= "Email: ".($email)."\n";
	$email_message .= "File: $fileLink\n";

	sendMail($email_to, $email_subject, $email_message, $email);

    return $result;
}
?>
