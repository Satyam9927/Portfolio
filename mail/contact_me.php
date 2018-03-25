<?php
// Check for empty fields
//if(empty($_POST['name'])      ||
//   empty($_POST['email'])     ||
//   empty($_POST['phone'])     ||
//   empty($_POST['message'])   ||
//   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
//   {
//   echo "No arguments Provided!";
//   return false;
//   }

date_default_timezone_set('Etc/UTC');

require 'PHPMailer/PHPMailerAutoload.php';

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'satyamstuff2@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Website Contact Form Response:  $name";
$body = "A New Response has been received.\n\nName: $name\nPhone: $phone\nEmail: $email_address\n\nMessage: $message";

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'satyamstuff2@gmail.com';                 // SMTP username
$mail->Password = 'satyam9927';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->setFrom('satyamstuff2@gmail.com', 'New Response');
$mail->addAddress('satyamstuff2@gmail.com','User');     // Add a recipient

$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body    = $body;

//$mail->AltBody = $message;
// if(!$mail->send()) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     header("Location: ../docs/confirmSubmit.html");
// }

$mail->send();
return 1;

?>
