<?php
ob_start(); // Start output buffering

// Kết nối đến cơ sở dữ liệu
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'dia_diem');

$id = $_GET['id'];

// Lấy thông tin đơn hàng
$sql = "SELECT * FROM lienhe WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

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

    // Thay thế 'YOUR_RECIPIENT_EMAIL' bằng địa chỉ email của người mua hàng từ cơ sở dữ liệu
    $recipientEmail = $row['email'];
    $mail->addAddress($recipientEmail);

    $mail->isHTML(true);
    $mail->Subject = '=?UTF-8?B?' . base64_encode('Hỗ Trợ Khách Hàng') . '?=';

    // Customize your email body here
    $confirmationMessage = '<html>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid white; /* Đổi màu viền thành trắng */
        }
    </style>
    <p>Xin chào ' . $row['name'] . ',</p>
    <p>Chúng tôi đã nhận được liên hệ từ bạn để có thể giải đáp thắc mắc bạn vui lòng phản hồi lại email!</p>
     <p>Trân trọng,</p>
    <p>Cảm ơn bạn đã chọn HappyTour!</p>
</html>';
    $mail->Body = $confirmationMessage;
    $mail->AltBody = 'Đây là nội dung văn bản thuần túy cho các máy chủ email không hỗ trợ HTML';

    $mail->send();
    echo 'Thư đã được gửi';

    ob_end_clean(); // Clean (discard) the buffered output

    // Add a 3-second delay
    sleep(3);

    // Chuyển hướng sau khi xác nhận
    header('Location: xemlienhe.php');
} catch (Exception $e) {
    echo "Không thể gửi thư. Lỗi Mailer: {$mail->ErrorInfo}";
    // Handle the error, if needed
}
?>
