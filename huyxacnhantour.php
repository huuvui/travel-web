<?php
ob_start(); // Start output buffering

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'dia_diem');

$id = $_GET['id'];

// Lấy thông tin đơn hàng
$sql = "SELECT bill.id, cart.idbill, cart.ten, bill.name, bill.email,cart.anh,cart.time,cart.soluong, bill.total,cart.cost,cart.khuyenmai
        FROM bill
        JOIN cart ON cart.idbill = bill.id
        WHERE bill.id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Xác nhận đơn hàng
$updateSql = "UPDATE bill SET xacnhan='Đặt hàng không thành công!' WHERE id = $id";
mysqli_query($conn, $updateSql);

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
    $mail->Subject = '=?UTF-8?B?' . base64_encode('ĐƠN ĐẶT HÀNG BỊ HỦY') . '?=';

    // Customize your email body here
    $confirmationMessage = '<html>
    <p>Xin chào ' . $row['name'] . ',</p>
    <p>Chúng tôi rất tiếc thông báo rằng đơn hàng của bạn đã bị hủy do bạn không xác nhận thông tin ngày khởi hành!</p>
    <p>Chúng tôi đã cố gắng liên hệ với bạn rất nhiều lần nhưng không thể!</p>
    <p> Chúng tôi sẽ gửi lại số tiền thanh toán cho bạn sau khi bạn xác nhận hủy đơn và liên hệ với chúng tôi.</p>
    <p>Xin lỗi vì sự bất tiện này. Nếu bạn có bất kỳ câu hỏi hoặc cần hỗ trợ, vui lòng liên hệ chúng tôi theo thông tin sau:</p>
    <p><strong>Thông tin liên hệ:</strong></p>
    <ul>
        <li><strong>Bạn có thể phản hồi trực tiếp lại email này hoặc số điện thoại bên dưới.</strong></li>
        <li><strong>Điện thoại:</strong> 123-456-7890</li>
    </ul>
    <p>Xin chân thành cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
    
    <p>Trân trọng,</p>
    <p>HappyTour Team</p>
</html>';


    $mail->Body = $confirmationMessage;
    $mail->AltBody = 'Đây là nội dung văn bản thuần túy cho các máy chủ email không hỗ trợ HTML';

    $mail->send();
    echo 'Thư đã được gửi';

    ob_end_clean(); // Clean (discard) the buffered output

    // Add a 3-second delay
    sleep(3);

    // Chuyển hướng sau khi xác nhận
    header('Location: dscho.php');
} catch (Exception $e) {
    echo "Không thể gửi thư. Lỗi Mailer: {$mail->ErrorInfo}";
    // Handle the error, if needed
}
?>
