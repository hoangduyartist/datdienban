<?php
include "../app/packages/mail/class.phpmailer.php"; 
include "../app/packages/mail/class.smtp.php";
// Function send email
function sendEmail ($subject, $mailFrom, $sendTo, $phone, $body) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = get_bien("email_transport",'none');
    $mail->Password = get_bien("pass_transport",'none');
    $to = get_bien("email","none");
    $name = $sendTo;
    $mail->From = $mailFrom;
    $mail->FromName = get_bien('name');
    $mail->AddAddress($to,$name);
    $mail->AddReplyTo($mailFrom,"Customer");
    $mail->WordWrap = 50; // set word wrap
    $mail->IsHTML(true); // send as HTML
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = "Mail sent by PHP Mailer"; //Text Body
    //$mail->SMTPDebug = 2;
    if($mail->Send()){}
}

?>