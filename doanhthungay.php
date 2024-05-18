<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doanh thu theo tháng</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>
<body>
<h5 style="text-align: center; margin-top: 0; color: #000; font-size: 20px;"><b>DOANH THU THEO NGÀY</b></h5>

    <!-- Form chọn tháng -->
    <form id="monthForm" method="POST">
        <label for="selectMonth">Chọn tháng: </label>
        <select name="selectMonth" id="selectMonth">
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

            // Mặc định hiển thị cho tháng hiện tại
            $currentYear = date('Y');
            $selectedMonth = date('n'); // Lấy tháng hiện tại (1-12)

            // Xử lý form nếu có sự kiện submit
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $selectedMonth = $_POST["selectMonth"];
            }

            for ($i = 1; $i <= 12; $i++) {
                $selected = ($i == $selectedMonth) ? 'selected' : ''; // Kiểm tra nếu là tháng hiện tại
                echo "<option value='$i' $selected>Tháng $i</option>";
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

    // Mặc định hiển thị cho tháng hiện tại
    $currentYear = date('Y');
    $selectedMonth = date('n'); // Lấy tháng hiện tại (1-12)

    // Xử lý form nếu có sự kiện submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedMonth = $_POST["selectMonth"];
    }

    // Tạo mảng dữ liệu mặc định cho tất cả các ngày trong tháng được chọn
    $daysInSelectedMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $currentYear);

    $data = array();
    for ($day = 1; $day <= $daysInSelectedMonth; $day++) {
        $data[] = array(
            'day' => $day,
            'month' => $selectedMonth,
            'year' => $currentYear,
            'total_daily' => 0
        );
    }

    // Truy vấn dữ liệu và cập nhật giá trị tổng total theo từng ngày trong tháng được chọn
    $query = "SELECT DAY(`time`) AS day, SUM(`total`) AS total_daily
              FROM `bill`
              WHERE `xacnhan` = 'Đặt hàng thành công!' AND bill.trangthai = 'Thanh toán thành công!'
              AND YEAR(`time`) = $currentYear
              AND MONTH(`time`) = $selectedMonth
              GROUP BY DAY(`time`)";

    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $dayIndex = $row['day'] - 1;
        $data[$dayIndex]['total_daily'] = $row['total_daily'];
    }

    // Đóng kết nối cơ sở dữ liệu
    $conn->close();
    ?>

    <canvas id="barChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var data = <?php echo json_encode($data); ?>;
        var days = [];
        var totals = [];

        data.forEach(function(item) {
            days.push(item.day + '/' + item.month + '/' + item.year);
            totals.push(item.total_daily);
        });

        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: days,
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
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Ngày'
                        }
                    }
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        formatter: function(value, context) {
                            return value;
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>



          


