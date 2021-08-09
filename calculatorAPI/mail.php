<?php

function send_mail($data)
{

    require_once 'phpmailer/src/Exception.php';
    require_once 'phpmailer/src/OAuth.php';
    require_once 'phpmailer/src/PHPMailer.php';
    require_once 'phpmailer/src/POP3.php';
    require_once 'phpmailer/src/SMTP.php';


// Instantiation and passing true enables exceptions
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {

        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host = 'mail.gourmet-pets.bg';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'orders@gourmet-pets.bg';                     // SMTP username
        $mail->Password = 'gourmet-pets2019';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, ssl also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom($data['from']);
        $mail->addAddress($data['email'], $data['name']);     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

        // Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $data['subject'];
        $mail->Body = $data['body'];
        $mail->AltBody = $data['body'];

        $mail->send();
//        echo 'Message has been sent';

    } catch (Exception $e) {
        echo json_encode(array(
            'error' => $mail->ErrorInfo
        ));

        die();

//        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}