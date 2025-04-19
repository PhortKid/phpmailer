<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'your app email';                     
    $mail->Password   = 'your password';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom('myemail@gmail.com', 'Mailer');//your email
    $mail->addAddress('service.lipilimatower@gmail.com', 'CLIENT');     //Add a recipient
   
 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'demo email using phpmailer';
    $mail->Body    = 'It club.co.tz';
    $mail->AltBody = 'hello';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
