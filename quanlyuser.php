<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dia_diem";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_id, name, username, ngaysinh, email, phone, dia_chi, created_at,user_type FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h5 style="text-align: center; margin-top: 0; color: #000; font-size: 20px;"><b>DANH SÁCH NGƯỜI DÙNG</b></h5>';
    echo '<ul class="user-list">';
    while ($row = $result->fetch_assoc()) {
        echo '<li class="user-item">';
        echo '<div class="user-details">';
        echo '<span class="user-label">ID:</span> <span class="user-value">' . $row["user_id"] . '</span><br>';
        echo '<span class="user-label">Tên tài khoản:</span> <span class="user-value">' . $row["username"] . '</span><br>';
        echo '<span class="user-label">Họ tên:</span> <span class="user-value">' . $row["name"] . '</span><br>';
        echo '<span class="user-label">Ngày sinh:</span> <span class="user-value">' . $row["ngaysinh"] . '</span><br>';
        echo '<span class="user-label">Email:</span> <span class="user-value">' . $row["email"] . '</span><br>';
        echo '<span class="user-label">Số điện thoại:</span> <span class="user-value">' . $row["phone"] . '</span><br>';
        echo '<span class="user-label">Địa chỉ:</span> <span class="user-value">' . $row["dia_chi"] . '</span><br>';
        $userTypeLabel = '';

        switch ($row["user_type"]) {
            case 1:
                $userTypeLabel = 'User';
                break;
            case 2:
                $userTypeLabel = 'Admin';
                break;
            case 3:
                $userTypeLabel = 'Nhân viên';
                break;
            default:
                $userTypeLabel = 'Unknown';
                break;
        }
        
        echo '<span class="user-label">Loại tài khoản:</span> <span class="user-value">' . $userTypeLabel . '</span><br>';
        echo '<span class="user-label">Thời gian tạo:</span> <span class="user-value">' . date('d/m/Y H:i:s', strtotime( $row["created_at"] )) . '</span><br>';
        echo '</div>';
        echo '<div class="user-actions">';
        echo '<a href="delete.php?id=' . $row["user_id"] . '" class="delete-btn" onclick="return confirm(\'Bạn có chắc chắn muốn xóa tài khoản này?\')">Xóa tài khoản</a>';
        echo '<a href="phanquyen.php?id=' . $row["user_id"] . '" class="delete-btn">Phân quyền</a>';
        echo '</div>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo "0 results";
}
?>
<style>
    .user-list {
        list-style: none;
        padding: 0;
    }
    .user-item {
        margin-bottom: 20px;
        border: 1px solid #ddd;
        padding: 10px;
    }
    .user-details {
        font-size: 16px;
        font-weight: bold;
    }
    .user-label {
        color: #777;
    }
    .user-value {
        color: #333;
    }
    .user-actions {
        margin-top: 10px;
    }
    .edit-btn, .reset-password-btn, .delete-btn {
        padding: 5px 10px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        margin-right: 10px;
    }
</style>
