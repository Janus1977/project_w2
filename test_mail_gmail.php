<?php
	ini_set('date.timezone', 'Europe/Paris');
	
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		$docRoot = $_SERVER['DOCUMENT_ROOT'];
	} else {
		$docRoot = $_SERVER['DOCUMENT_ROOT'].'/';
	}
	//test avec Common
	require_once $docRoot.'Common/config/config.php';
	require_once _PHPMAILER_LOAD_;
	
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; //25 ou 465
	$mail->Username = _GMAIL_USR_;
	$mail->Password = _GMAIL_PWD_;
	$mail->From = 'cbarrau77@gmail.com';
// 	$mail->SetFrom('cbarrau77@gmail.com', 'moi');
	$mail->Subject = 'Test envoie phpMailer';
	$mail->Body = 'Test envoie phpMailer';
	$mail->AddAddress('cbarrau77@gmail.com');
	if(!$mail->Send()) {
		echo 'Mail error: '.$mail->ErrorInfo;
	} else {
		echo 'Message sent!';
	}