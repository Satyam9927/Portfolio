<?php
require 'PHPMailer/PHPMailerAutoload.php';

function mailer($body,$email,$subject){
$mail = new PHPMailer;



$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
$mail->Host = "smtp.satyamstuff2@gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 465; // set the SMTP port for the GMAIL server
$mail->Username = "Satyam Nagpal"; // GMAIL username
$mail->Password = "satyam9927"; // GMAIL password                                  // TCP port to connect to

$mail->AddAddress("satyamstuff2@gmail.com", "Satyam");
$mail->SetFrom("satyamstuff2@gmail.com","Satyam" );
$mail->Subject = "My Subject";
$mail->Body = "Mail contents";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;

} else {
    return 1;

}

}
