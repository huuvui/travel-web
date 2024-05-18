<?php
session_start()
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<h5 style="text-align: center; margin-top: 0; color: #000; font-size: 20px;"><b>DOANH THU THEO THÁNG</b></h5>
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
            
            // Tạo mảng dữ liệu mặc định cho tất cả các tháng
            $data = array();
            for ($month = 1; $month <= 12; $month++) {
                $data[] = array(
                    'month' => $month,
                    'year' => date('Y'),
                    'total_monthly' => 0
                );
            }
            
            // Truy vấn dữ liệu và cập nhật giá trị tổng total theo từng tháng
            $query = "SELECT MONTH(`time`) AS month, YEAR(`time`) AS year, SUM(`total`) AS total_monthly
                      FROM `bill`
                      WHERE `xacnhan` = 'Đặt hàng thành công!' AND bill.trangthai = 'Thanh toán thành công!'
                      GROUP BY YEAR(`time`), MONTH(`time`)";
            
            $result = $conn->query($query);
            
            while ($row = $result->fetch_assoc()) {
                $monthIndex = $row['month'] - 1;
                $data[$monthIndex]['total_monthly'] = $row['total_monthly'];
            }
            
            // Đóng kết nối cơ sở dữ liệu
            $conn->close();
            ?>
            
        
                
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
        
                <canvas id="barChart" width="400" height="200"></canvas>
                <script>
                    var ctx = document.getElementById('barChart').getContext('2d');
                    var data = <?php echo json_encode($data); ?>;
                    var months = [];
                    var totals = [];
            
                    data.forEach(function(item) {
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
          
            

    </section>



   