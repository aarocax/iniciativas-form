<?php

session_start();


if ( !isset($_POST['token']) || ( $_POST['token'] != $_SESSION['token'] ) ) {
	die();
}


function verifyCaptcha() {
	$response = false;
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
		$token = $_POST['g-recaptcha-response'];
	  $secretKey = "---------------------------";
	  $ip = $_SERVER['REMOTE_ADDR'];
	  $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$token."&remoteip=".$ip);
	  $responseKeys = json_decode($response,true);
	  if(intval($responseKeys["success"]) === 1) {
	    $response = true;
	  }
  }
  return $response;
}



function saveInFile($email) {
	$status = false;
	$file = fopen("files/subscriptors.csv", "a+");
	if ($file != false) {
		fputcsv($file, array($email));
		fclose($file);
		$status = true;	
	} 
	return $status;
}


$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$response = "ko";

if ($email && verifyCaptcha()) {
	if (saveInFile($email)) {
		$response = "ok";
	} 
} else {
	$response = "email no válido...";
}

echo $response;

die();