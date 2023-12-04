<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/src/Exception.php';
require 'vendor/src/PHPMailer.php';
require 'vendor/src/SMTP.php';

function guimail($email,$title,$noidung){
    $mail = new PHPMailer(true);
    $mail-> CharSet = "utf-8";
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure ='ssl';
        $mail->Port = 465;
        $mail->Username = 'khang12a3lqd@gmail.com';
        $mail->Password = 'fjtzevmwfzquxbmj';

        //Recipients
        $mail->setFrom('khang12a3lqd@gmail.com', 'admin');     //Add a recipient
        $mail->addAddress($email);               //Name is optional
        $mail->addReplyTo('khang12a3lqd@gmail.com', 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body    = $noidung;
        $mail->AltBody = $noidung;
        $mail->send();
        header('Location: ?action=check');
    } catch (Exception $e) {
        echo "Mail không gửi được. Lỗi gửi mail; {$mail->ErrorInfo}";
    }
}

?>