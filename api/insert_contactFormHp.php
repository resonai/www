<?php
//insert_contactFormHp.php

require_once("includes/includes.php");

$form_data = json_decode(file_get_contents("php://input"));
$data = array();
$error = array();

if(empty($form_data->user_name))
{
 $error["user_name"] = "User Name is required";
}

if(empty($form_data->company_name))
{
 $error["company_name"] = "Company Name is required";
}

if(empty($form_data->email))
{
 $error["email"] = "Email is required";
}

if(empty($form_data->message))
{
 $error["message"] = "Message is required";
} 
if(!empty($error))
{
 $data["error"] = $error;
}
else
{
    try{
        $result = sendHpContactForm($form_data->user_name, $form_data->email, $form_data->company_name,  $form_data->message);
        if($result->isComplete()){
		$data["message"] = "Thank you. We will contact you soon!";
        }
        else {
            $data["error"] = "We had internal error.";
        }
    }
    catch(Exception $e) {
        $data["error"] = "We had internal error";
    }
//    var_dump($result);
    
}

header("Content-Type:application/json");
echo json_encode($data);

?>
