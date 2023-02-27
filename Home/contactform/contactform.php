<?php

if(isset($_POST["send"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$content = $_POST["message"];

	$toEmail = "monirchelh05@gmail.com";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	$t = mail($toEmail, $subject, $content, $mailHeaders);
	if(isset($t)){
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	}
}
?>