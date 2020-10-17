<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail=new PHPMailer(true);
$mail->CharSet='UTF-8';
$mail->IsHTML(true);

$mail->addAddress("blagovestny.roman@gmail.com");
$mail->setFrom($_POST['email']);
$mail->Subject="Letter from my portfolio site";
$mail->Body=$_POST['textarea'];
if(!$mail->send())
{
    $message="Failed to send email";
}
else{
    $message="Mail sent";
}
$response=['message'=>$message];
header('Content-type:application/json');
echo json_encode($response);

?>