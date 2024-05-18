<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doanh thu theo năm</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>

<body>
<h5 style="text-align: center; margin-top: 0; color: #000; font-size: 20px;"><b>DOANH THU THEO NĂM</b></h5>

    <!-- Form chọn năm -->
    <form id="yearForm" method="POST">
        <label for="selectYear">Chọn năm: </label>
        <select name="selectYear" id="selectYear">
            <?php
            // Kết nối cơ sở dữ liệu
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dia_diem";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            // Mặc định hiển thị cho năm hiện tại
            $currentYear = date('Y');
            $selectedYear = $currentYear;

            // Xử lý form nếu có sự kiện submit
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $selectedYear = $_POST["selectYear"];
            }

            for ($year = 2020; $year <= $currentYear; $year++) {
                $selected = ($year == $selectedYear) ? 'selected' : ''; // Kiểm tra nếu là năm hiện tại
                echo "<option value='$year' $selected>$year</option>";
            }

            // Đóng kết nối cơ sở dữ liệu
            $conn->close();
            ?>
        </select>
        <input type="submit" value="Xem">
    </form>

    <?php
    // Kết nối cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dia_diem";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Mặc định hiển thị cho năm hiện tại
    $currentYear = date('Y');
    $selectedYear = $currentYear;

    // Xử lý form nếu có sự kiện submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedYear = $_POST["selectYear"];
    }

    // Tạo mảng dữ liệu mặc định cho tất cả các tháng trong năm được chọn
    $data = array();
    for ($month = 1; $month <= 12; $month++) {
        $data[] = array(
            'month' => $month,
            'year' => $selectedYear,
            'total_monthly' => 0
        );
    }

    // Truy vấn dữ liệu và cập nhật giá trị tổng total theo từng tháng trong năm được chọn
    $query = "SELECT MONTH(`time`) AS month, SUM(`total`) AS total_monthly
              FROM `bill`
              WHERE `xacnhan` = 'Đặt hàng thành công!' AND bill.trangthai = 'Thanh toán thành công!'
              AND YEAR(`time`) = $selectedYear
              GROUP BY MONTH(`time`)";

    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $monthIndex = $row['month'] - 1;
        $data[$monthIndex]['total_monthly'] = $row['total_monthly'];
    }

    // Đóng kết nối cơ sở dữ liệu
    $conn->close();
    ?>

    <canvas id="barChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var data = <?php echo json_encode($data); ?>;
        var months = [];
        var totals = [];

        data.forEach(function (item) {
            months.push(item.month + '/' + item.year);
            totals.push(item.total_monthly);
        });


        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Tổng doanh thu',
                    data: totals,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value, index, values) {
                                return (value * 1000).toLocaleString('en-US') + ' VND';
                            },
                            title: {
                                display: true,
                                text: 'Doanh thu(VND)'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Năm'
                            }
                        }
                    },
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        formatter: function (value, context) {
                            return value;
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>