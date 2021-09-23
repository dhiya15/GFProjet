<?php
require 'PHPMailer/PHPMailerAutoload.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullName = strip_tags($_POST['fullname']);
    $email = strip_tags($_POST['email']);
    $subject = strip_tags($_POST['subject']);
    $message = strip_tags($_POST['message']);
	
	$mail = new PHPMailer;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port = 465;   // TCP port to connect to
	$mail->isHTML(true);   // Set email format to HTML
	$mail->Username = 'dido.dadi08@gmail.com';                 // SMTP username
	$mail->Password = 'dayaadin1998';                           // SMTP password
	$mail->setFrom($email);
	$mail->addAddress('abidmohamed93@gmail.com'); 
	$mail->Subject = $subject;
	$mail->Body    = "This message sent from : ".$email."<br>".
						"With name : ".$fullName."<br>".
						"He say : ".$message;
	//$mail->AltBody = $message;

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo "<script>alert('Your message send succefully !')</script>";
	    echo "<script>window.open('home.php','_SELF')</script>";
	}
}


