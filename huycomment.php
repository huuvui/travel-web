<?php
ob_start(); // Start output buffering

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'dia_diem');

$id = $_GET['id'];

// Lấy thông tin đơn hàng, bao gồm trường "ten" từ bảng "cart"
$sql = "SELECT comments.id, comments.user_id, comments.id_dd, comments.comment, comments.created_at, users.email, users.username, comments.xacnhan, users.name
FROM comments
INNER JOIN users ON comments.user_id = users.user_id
WHERE comments.user_id = users.user_id
ORDER BY comments.id DESC"; // Sắp xếp theo ID giảm dần

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$query = "DELETE FROM comments WHERE comments.id=$id"; 
mysqli_query($conn, $query);


// Gửi email thông báo
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
    $mail->Subject = '=?UTF-8?B?' . base64_encode('THÔNG BÁO HỦY BÌNH LUẬN') . '?=';

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
    <p>Chúng tôi vừa xóa bình luận của bạn trên hệ thống vì vi phạm tiêu chuẩn cộng đồng!</p>
    <p>Chúng tôi rất tiếc thông báo cho bạn về điều này!</p>
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
    header('Location: qlbinhluan.php');
} catch (Exception $e) {
    echo "Không thể gửi thư. Lỗi Mailer: {$mail->ErrorInfo}";
    // Handle the error, if needed
}
?>
