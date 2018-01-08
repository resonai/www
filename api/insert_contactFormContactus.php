<?php
//insert_contactFormContactus.php

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

if(empty($form_data->phone))
{
 $error["phone"] = "Phone Number is required";
}

if(!empty($error))
{
 $data["error"] = $error;
}
else
{
    try{
        $result = sendContactForm($form_data->user_name, $form_data->company_name, $form_data->email, $form_data->phone);
        if($result){
                $data["message"] = "Thank you. We will contact you soon!";
        }
        else {
            $data["error"] = "We had internal error.";
        }
    }
    catch(Exception $e) {
        $data["error"] = "We had internal error.";
    }
//    var_dump($result);
    
}

header("Content-Type:application/json");
echo json_encode($data);

?>
