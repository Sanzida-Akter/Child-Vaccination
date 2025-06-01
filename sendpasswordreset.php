<?php
include 'connect.php';
// session_start();
?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email=$_POST["email"];
$token=bin2hex(random_bytes(16));
$token_hash=hash("sha256",$token);
$expiry=date("Y-m-d H:i:s",time()+60*30);
$sql="UPDATE guardian 
      SET reset_token_hash=?,
          reset_token_expires_at=?
      WHERE email=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("sss", $token_hash,$expiry,$email);
$stmt->execute();

   
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sanzida308@gmail.com';                     //SMTP username
    $mail->Password   = 'keof fxor azzm pxfw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sanzida308@gmail.com', 'Sender');
    $mail->addAddress($email,'Receiver');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('scene.jpeg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password';
    $mail->Body = "Click <a href='http://localhost/vaccination/newpassword.php?token=$token'>here</a> to reset your password.";

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>