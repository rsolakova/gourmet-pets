<?php

require 'mail.php';

$email = $_POST['email'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mail_body_owner = "Email: $email <br>
                Name: $name<br>
                Subject: $subject <br>
                $message";
    
send_mail(array(
    'from' => $email,
    'email' => 'info@gourmet-pets.bg',
    'name' => $name,
    'subject' => $subject,
    'body' => $mail_body_owner,
));

send_mail(array(
    'from' => 'info@gourmet-pets.bg',
    'email' => 'rsolakova@yahoo.com',
    'name' => $name,
    'subject' => $subject,
    'body' => $mail_body_owner,
));

// send_mail(array(
//     'from' => 'info@gourmet-pets.bg',
//     'email' => 'yasen.dokov@gmail.com',
//     'name' => $name,
//     'subject' => $subject,
//     'body' => $mail_body_owner,
// ));

?>