<?php
ob_start(); // Start output buffering

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'dia_diem');

$id = $_GET['id'];

// Lấy thông tin đơn hàng, bao gồm trường "ten" từ bảng "cart"
$sql = "SELECT bill.id, cart.idbill, cart.ten, bill.name, bill.email,cart.anh,cart.time,cart.soluong, bill.total,cart.cost,cart.khuyenmai
        FROM bill
        JOIN cart ON cart.idbill = bill.id
        WHERE bill.id = $id";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Xác nhận đơn hàng
$updateSql = "UPDATE bill SET xacnhan='Đặt hàng thành công!' WHERE id = $id";
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
    $mail->Subject = '=?UTF-8?B?' . base64_encode('XÁC NHẬN ĐƠN ĐẶT HÀNG') . '?=';

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
    <p>Đơn hàng của bạn đã được xác nhận thành công!</p>
    <p>Chúng tôi rất vui thông báo cho bạn về điều này!</p>
    <h3>Thông tin đơn hàng:</h3>
    <ul>
    <li><strong>Tour du lịch:</strong> ' . $row['ten'] . '</li>
    <li><strong>Số lượng vé:</strong> ' . $row['soluong'] .' </li>
    <li><strong>Đơn giá:</strong> ' . number_format((float) $row['cost'], 0, '.', '.') . 'VND</li>
    <li><strong>Khuyến mãi:</strong> ' . $row['khuyenmai'] . '%</li>
    <li><strong>Tổng thành tiền:</strong> ' . number_format($row['total'], 3, '.', '.') . ' VND - ' . number_format($row['total'] / 23, 2, '.', '.') . ' USD</li>
    <li><strong>Thời gian đặt tour:</strong> ' . date('d/m/Y', strtotime($row['time'])) . '</li>
     </ul>
     <p><strong>Bạn vui lòng cho tôi biết bạn có thể khởi hành khi nào bằng cách phản hồi lại email này!</strong></p>
     <p><strong>Lưu Ý: Chúng tôi sẽ liên hệ và có thể hủy tour của bạn trong vòng 3-4 ngày nếu bạn không phản hồi thông tin cho chúng tôi biết!</strong></p>
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
    header('Location: dscho.php');
} catch (Exception $e) {
    echo "Không thể gửi thư. Lỗi Mailer: {$mail->ErrorInfo}";
    // Handle the error, if needed
}
?>
