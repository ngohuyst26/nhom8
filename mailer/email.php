<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/src/Exception.php';
require 'vendor/src/PHPMailer.php';
require 'vendor/src/SMTP.php';

function guimail($email, $title, $noidung)
{
    $mail = new PHPMailer(true);
    $mail->CharSet = "utf-8";
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
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
        $mail->Body = $noidung;
        $mail->AltBody = $noidung;
        $mail->send();
    } catch (Exception $e) {
        echo "Mail không gửi được. Lỗi gửi mail; {$mail->ErrorInfo}";
    }
}

function GuiEmail($emailNguoiNhan, $tieuDe, $noiDung)
{
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'huynhpc05784@fpt.edu.vn';
        $mail->Password = 'iumhxkntcpdnahjg';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Thiết lập người gửi và người nhận
        $mail->setFrom('huynhpc05784@fpt.edu.vn', 'Molla Shop');  // Thay đổi bằng địa chỉ email và tên của bạn
        $mail->addAddress($emailNguoiNhan);  // Sử dụng địa chỉ email người nhận được truyền vào hàm
        $mail->isHTML(true);

        // Đặt tiêu đề và nội dung của email
        $mail->Subject = $tieuDe;
        $mail->Body = $noiDung;

        // Gửi email
        $mail->send();
        return true;

    } catch (Exception $e) {
        echo "Lỗi khi gửi email: " . $mail->ErrorInfo;
        return false;
    }
}

?>