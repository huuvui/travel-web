<?php
function taogiohang($ten,$anh,$ngaybd,$cost,$soluong,$khuyenmai,$thanhtien,$idbill){
    $conn=ketnoidb();
    $sql = "INSERT INTO cart(ten,anh,ngaybd,cost,soluong,khuyenmai,thanhtien,idbill) VALUES ('$ten','$anh','$ngaybd','$cost','$soluong','$khuyenmai','$thanhtien','$idbill')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $conn = null;
}
function taodonhang($username,$name,$dia_chi,$phone,$email,$total){
    $conn=ketnoidb();
    $sql = "INSERT INTO bill(username,name,dia_chi,phone,email,total) VALUES ('$username','$name','$dia_chi','$phone','$email','$total')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    $conn = null;
    return $last_id;
}
function ketnoidb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dia_diem";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        
    } catch(PDOException $e) {
       return $e->getMessage();
    }
    
}
function tongdonhang(){
    $tong=0;
    if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
        if(sizeof($_SESSION['giohang'])>0){
            for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                $gia = number_format((float) $_SESSION['giohang'][$i][2], 0, '.', '.');
                $tt = (float) (number_format((float) $_SESSION['giohang'][$i][2], 0, '.', '.')) *((float) $_SESSION['giohang'][$i][3])* ((float) ((100-$_SESSION['giohang'][$i][4])/100));
                $tong += (float) $tt;
            }
            
        }  
    }
    return $tong;
}
function showgiohang()
{
  if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
    if (sizeof($_SESSION['giohang']) > 0) {
      $tong = 0;
      for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        $gia = number_format((float) $_SESSION['giohang'][$i][2], 0, '.', '.');
        $tt = (float) (number_format((float) $_SESSION['giohang'][$i][2], 0, '.', '.')) *((float) $_SESSION['giohang'][$i][3])* ((float) ((100-$_SESSION['giohang'][$i][4])/100));
        $tong += (float) $tt;

        echo '<tr>
                          <td>' . ($i + 1) . '</td>
                          <td>' . $_SESSION['giohang'][$i][1] . '</td>
                          <td>' . $gia . '</td>
                          <td>' . $_SESSION['giohang'][$i][3] . '</td>
                          <td>' . $_SESSION['giohang'][$i][4] . '%</td>
                          <td>' . $_SESSION['giohang'][$i][5] . '</td>
                          <td>
                              <div>' . number_format($tt, 3, '.', '.') . '</div>
                          </td>
                          <td>
                              <a href="cart.php?delid=' . $i . '">Xóa</a>
                          </td>
                      </tr>';
      }
      echo '<tr>
                      <th colspan="11">
                          <div>Tổng đơn hàng: ' . number_format($tong, 3, '.', '.') . '</div>
                      </th>
                  </tr>';
    }
  }

}



