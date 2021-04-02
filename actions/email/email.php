<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use FruityThings\Http\FileUpload;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// Load config
require_once '../../config.php';

try {
    // Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '4ff91ed94c0dcc';                       // SMTP username
    $mail->Password   = '45cd3fc18f5f2b';                       // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 2525;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    // Recipients
    $mail->setFrom($request->input("email"), $request->input("name")); // Set from email and name using form data
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');            // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       // Optional name

    //$mail->addAttachment('images/small_rose.jpg', 'attachment.jpg');
    $file = new FileUpload("attachment");
    $mail->addAttachment($file->get());


    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $request->input("subject");
    $mail->Body    = $request->input("message");
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//    $mail->send();    // Commented out which for some reason fixed duplicated emails from being sent.
//    echo 'Message has been sent';

    require "include/flash.php";

    if ($mail->send()) {
        $request->session()->set("flash_message", "Your message was sent successfully!");
        $request->session()->set("flash_message_class", "alert-info");

        $request->session()->forget("flash_data");
        $request->session()->forget("flash_errors");

        $request->redirect("/views/contact.php");
    }

} catch (Exception $e) {
    $request->session()->set("flash_message", "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    $request->session()->set("flash_message_class", "alert-warning");

    $request->session()->set("flash_data", $request->all());
    $request->session()->set("flash_errors", $request->errors());

    $request->redirect("/views/contact.php");
}
