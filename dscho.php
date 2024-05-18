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
        <h5 style="text-align: center; margin-top: 0; color: #000; font-size: 20px;"><b>DANH SÁCH TOUR CHỜ CẬP NHẬT</b></h5>
            <?php
            // Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối của bạn tại đây)
            $conn = mysqli_connect('localhost', 'root', '', 'dia_diem');

            if (!$conn) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
            }

            // Truy vấn dữ liệu các tour đã bán
            $sql = "SELECT bill.id AS idbill, cart.id ,bill.username, bill.name AS customer_name, cart.ten AS tour_name, cart.soluong AS quantity, cart.cost AS unit_price, bill.dia_chi AS customer_address, bill.phone AS customer_phone, bill.email AS customer_email, bill.total AS total_price, bill.time AS order_time, cart.ngaybd
                    FROM bill
                    INNER JOIN cart ON bill.id = cart.idbill
                    WHERE bill.xacnhan = 'Đặt hàng thành công!' AND bill.trangthai != 'Thanh toán thành công!'
                    ORDER BY bill.id DESC"; // Sắp xếp theo ID giảm dần

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<table>';
                echo '<tr>
                        <th>STT</th>
                        <th>ID Đơn Hàng</th>
                        <th>Tên Tài Khoản</th>
                        <th>Tên Khách Hàng</th>
                        <th class="variable-column">Tên Tour</th>
                        <th>Ngày Khởi Hành</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Tổng Thanh Toán</th>
                        <th>SĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Thời Gian Đặt Hàng</th>
                        <th>Cập Nhật Ngày Khởi Hành</th>
                        <th>Xác Nhận Ngày Khởi Hành</th>
                        <th>Hủy Tour</th>
                    </tr>';
                    $stt = mysqli_num_rows($result);

                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo '<tr>
                            <td>' . $stt--. '</td>
                            <td>' . $row['idbill'] . '</td>
                            <td>' . $row['username'] . '</td>
                            <td class="variable-column">' . $row['customer_name'] . '</td>
                            <td class="variable-column">' . $row['tour_name'] . '</td>
                            <td>' . (strtotime($row['ngaybd']) ? date('d/m/Y', strtotime($row['ngaybd'])) : $row['ngaybd']) . '</td>
                            <td>' . $row['quantity'] . '</td>
                            <td>' . number_format($row['unit_price'], 0, '.', ',') . ' VNĐ</td>
                            <td>' . number_format($row['total_price'], 3, ',', ',') . ' VNĐ</td>
                            <td>' . $row['customer_phone'] . '</td>
                            <td>' . $row['customer_address'] . '</td>
                            <td>' . date('d/m/Y H:i:s', strtotime($row['order_time'])) . '</td>
                            <td><a href="capnhat.php?id=' . $row['idbill'] . '">Cập nhật</a>
                            <td><a href="xacnhanngay.php?id=' . $row['idbill'] . '">Gửi</a>
                            <td><a href="huyxacnhantour.php?id=' . $row['idbill'] . '">Hủy</a>
                       
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
