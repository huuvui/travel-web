<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ - Danh sách liên hệ</title>
    <style>
        /* CSS cho bảng */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid #dddddd;
            text-align: center; /* Căn giữa nội dung trong ô */
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center; /* Căn giữa các cột trong hàng đầu */
        }

        /* CSS để căn giữa cột "Tên Tour" */
        td.variable-column {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <!-- Header của trang web -->
    </header>
    <main>
        <div class="container">
            <h5 style="text-align: center; margin-top: 0; color: #000; font-size: 20px;"><b>DANH SÁCH LIÊN HỆ</b></h5>
            <?php
            // Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối của bạn tại đây)
            $conn = mysqli_connect('localhost', 'root', '', 'dia_diem');

            if (!$conn) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
            }

            // Truy vấn dữ liệu liên hệ
            $sql = "SELECT id, name, phone, email, note, time FROM lienhe"; // Chọn các cột cần hiển thị

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<table>';
                echo '<tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                        <th>Phản hồi</th>

                    </tr>';
                    $stt = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <td>' . $stt-- .'</td>
                            <td class="variable-column">' . $row['name'] . '</td>
                            <td>' . $row['phone'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['note'] . '</td>
                            <td>' . date('d/m/Y H:i:s', strtotime( $row['time'] )) . '</td>
                            <td><a href="phanhoi.php?id=' . $row['id'] . '" class="xac-nhan-link">Phản hồi</a></td>
                        </tr>';
                }

                echo '</table>';
            } else {
                echo '<p>Không có dữ liệu!</p>';
            }

            // Đóng kết nối
            mysqli_close($conn);
            ?>
        </div>
    </main>
    <footer>
        <!-- Footer của trang web -->
    </footer>
    <!-- Các tệp JavaScript khác -->
</body>
</html>
