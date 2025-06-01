<?php
$to_email = "sanzida546@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi,This is a test email";
$from = "sanzida308@gmail.com";
$headers = "From : $from";

if(mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";

}
else{
    echo "Email Sending failed...";
}
?>