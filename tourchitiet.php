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
        <h5 style="text-align: center; margin-top: 0; color: #000; font-size: 20px;"><b>DANH SÁCH CHI TIẾT TOUR</b></h5>
        <?php
            // Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối của bạn tại đây)
            $conn = mysqli_connect('localhost', 'root', '', 'dia_diem');

            if (!$conn) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
            }

            // Truy vấn dữ liệu các tour đã bán
            $sql = "SELECT *
            FROM mota ORDER BY id DESC"; // Sắp xếp theo ID giảm dần

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<table>';
                echo '<tr>
                        <th style="font-size: 20px; font-weight: bold;">STT</th>
                        <th style="font-size: 20px; font-weight: bold;">ID Địa Điểm</th>
                        <th style="font-size: 20px; font-weight: bold;">Tên Tour</th>
                        <th style="font-size: 20px; font-weight: bold;">Xóa</th>
                        <th style="font-size: 20px; font-weight: bold;">Chỉnh Sửa</th>

                    </tr>';

                    $stt = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                                <td>' . $stt-- . '</td>
                                <td>' . $row['id_dd'] . '</td>
                                <td style="font-size: 18px; font-weight: normal;">' . $row['title'] . '</td>
                                <td><a href="deletetourchitiet.php?id=' . $row['id'] . '">Xóa</a></td>
                                <td><a href="edittourchitiet.php?id=' . $row['id'] . '">Chỉnh sửa</a>
                        </td>
                           
                        </td>
                            </tr>';
                    }
    
                    echo '</table>';
                } else {
                    echo '<p>Không có dữ liệu tour đã bán.</p>';
                }
    
                // Đóng kết nối
                mysqli_close($conn);
                ?>
                    <div class="add-button">
        <a href="addtourchitiet.php">+</a>
    </div>
        </div>
        <style>
        .add-button {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
            background-color: #007FFF;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .add-button a {
            text-decoration: none;
            color: white;
            font-size: 24px;
            line-height: 1;
        }
    </style>


    </main>
    <footer>
        <!-- Footer của trang web -->
    </footer>
    <!-- Các tệp JavaScript khác -->
</body>
</html>
