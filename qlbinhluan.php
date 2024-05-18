<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Travel - Danh sách các tour đã bán</title>
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
        <h5 style="text-align: center; margin-top: 0; color: #000; font-size: 20px;"><b>DANH SÁCH CÁC BÌNH LUẬN</b></h5>
            <?php
            // Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối của bạn tại đây)
            $conn = mysqli_connect('localhost', 'root', '', 'dia_diem');

            if (!$conn) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
            }

            // Truy vấn dữ liệu các tour đã bán
            $sql = "SELECT comments.id, comments.user_id, comments.id_dd, comments.comment, comments.created_at, users.email, users.username,diadiem.tentour
                    FROM comments
                    INNER JOIN users ON comments.user_id = users.user_id
                    INNER JOIN diadiem ON comments.id_dd = diadiem.id
                    WHERE comments.user_id = users.user_id
                    ORDER BY comments.id DESC"; // Sắp xếp theo ID giảm dần

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<table>';
                echo '<tr>
                        <th>STT</th>
                        <th>Tên Tài Khoản</th>
                        <th>Vị Trí Bình Luận</th>
                        <th>Nội Dung</th>
                        <th>Thời Gian</th>
                        <th>Hủy Bình Luận</th>
                    </tr>';
                    $stt = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <td>' . $stt-- . '</td>
                            <td>' . $row['username'] . '</td>
                            <td>' . $row['tentour'] . '</td>
                            <td style="color: red;">'.$row['comment'].'</td>
                            <td>' . date('d/m/Y H:i:s', strtotime( $row['created_at'] )) . '</td>
                            <td><a href="huycomment.php?id=' . $row['id'] . '">Hủy</a>
                       
                    </td>
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
