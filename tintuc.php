
  <style>
    /* CSS cho bảng danh sách sản phẩm */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    table th,
    table td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
    }

    table th {
      background-color: #999;

      color: white;
    }

    /* CSS cho nút và các đối tượng gần nút */
    input[type="submit"],
    input[type="button"] {
      background: linear-gradient(to bottom, #ff6600, #ff9900);
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
      margin-right: 10px;
    }

    /* CSS cho đường link */
    a {
      text-decoration: none;
      color: #007BFF;
    }

    /* CSS cho mục giỏ hàng */
    .center-parent {
      text-align: center;
    }

    .mb {
      margin-bottom: 20px;
    }
  </style>

  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    thead {
      background-color: #007BFF;
      color: #fff;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      text-align: center;
    }


    li {
      list-style: none;
      margin: 5px 0;
    }

    td:last-child {
      text-align: center;
    }

    td:nth-child(2) {
      width: 50%;
    }

    td:nth-child(3) {
      width: 10%;
    }
  </style>
 

  <section
    class="u-border-2 u-border-black u-border-no-bottom u-border-no-left u-border-no-right u-clearfix u-section-1"
    id="sec-41fa">
    <div class="u-clearfix u-sheet u-sheet-1">
      </br>
      <div>
        <div class="row">
          <?php

          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "dia_diem";
          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          else {
            $sql = "SELECT * FROM img";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

              while ($row = $result->fetch_assoc()) {
                echo '<table style="width: 100%; border-collapse: collapse;">';
                echo '<tr class="table-row">';
                echo '<td style="width: 20%;"><img src="' . $row["anh"] . '" style="width: 260px; height:125px;"></td>';
                echo '<td style="width: 50%; vertical-align: top; text-align: left;">';
                echo '<p class="tour-name"><a href="' . $row['link'] . '">   <h5 style="top: 0; color: #000; font-size: 24px;"><b>' . $row['Ten'] . '</b></h5></a></p>';
                echo '<p style="font-size: 16px; margin: 0; font-family: \'Times New Roman\', Times, serif;">' . $row["tieude"] . '</p>';
               
                echo '</td>';
                
                echo '</tr>';
              }

              echo '</tbody>
        </table>';
            } else {
              echo "Chưa có tin tức mới!";
            }
          }
          ?>
          <style>
            .table-row {
              margin-bottom: 15px;
              /* Adjust the value based on your preference */
            }
          </style>


