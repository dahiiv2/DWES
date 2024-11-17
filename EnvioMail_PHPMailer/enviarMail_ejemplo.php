<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = '';                       // Set the SMTP server to send through
    $mail->Host = gethostbyname('smtp.gmail.com');            // Si hay problemas con SMTP en IPv6
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'phpdahii@gmail.com';          // SMTP username
    $mail->Password   = 'gyjf dbvm mpgc mwdb';                                     // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable implicit TLS encryption
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit SSL encryption
    $mail->Port       = 587;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //$mail->Port       = 465;                                    // TCP port to connect to; use 465 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_SMTPS`
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ]
    ];

    //Recipients
    $mail->setFrom('phpdahii@gmail.com');                                     // Set sender (email, name)
    $mail->addAddress('dwes.ieslamar@gmail.com');                                  // Add a recipient (email, name)
    //$mail->addAddress('ellen@example.com');                   // Name is optional
    $mail->addReplyTo('phpdahii@gmail.com');                                  // Set reply to (email, name)
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Asunto de prueba';                                  // Set email subject
    $mail->Body    = 'buenas';   // Set email body
    $mail->AltBody = 'tardes'; // Set alternate body in plain text for non-HTML mail clients

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}