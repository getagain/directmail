<?php
require 'PHPMailerAutoload.php';
 
$var21=$_POST['files-upload-name'];
$var22=$_POST['contact-email'];
$var23=$_POST['contact-message'];

$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'directmailrobot68@gmail.com';                   // SMTP username
$mail->Password = '1401@directmail';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('directmailrobot68@gmail.com', 'Attach.ML');     //Set who the message is to be sent from
$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
$mail->addAddress($var22, '');  // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->addAttachment($var21);         // Add attachments
//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'Attachment Delivered';
$mail->Body    = 'Please find your attachment!'</br></br>.'Message: '.$var23;
$mail->AltBody = 'Thank you';
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
 
echo 'Message has been sent';