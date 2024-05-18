<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nhvui284@gmail.com';
    $mail->Password = 'bkycffflzsniepjt';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('nhvui284@gmail.com', 'HappyTour');
    $mail->addAddress('minhcao310@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = '=?UTF-8?B?' . base64_encode('XÁC NHẬN ĐƠN ĐẶT HÀNG') . '?=';
    $mail->Body = 'Bạn đã đặt hàng thành công!';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
