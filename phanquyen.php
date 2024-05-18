<?php
session_start()
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Look Deep Into The Nature, Getting back to nature, This place is special..., Nature, You Might Also Like, Our Mission, Wildlife, Africa is home to many of the world&amp;apos;s most famous fauna, Contact Us">
  <meta name="description" content="">
  
  <style>
    /* Style for labels */
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    /* Style for input fields */
    input[type="text"],
    input[type="email"],
    input[type="tel"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Style for submit button */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Style for status message */
    p.status {
        color: #FF0000;
    }
</style>


  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": ""
    }
  </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="login_page">
  <meta property="og:type" content="website">
</head>

<body class="container" data-lang="en">
<header class="u-clearfix u-header" id="sec-a4ab" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">

  </header>
<section class="u-border-2 u-border-black u-border-no-bottom u-border-no-left u-border-no-right u-clearfix u-section-1"></section>
  <section class="">
    <div class="u-clearfix u-sheet u-sheet-1">
      
      
      <div class="u-border-2 u-border-grey-75 u-container-style u-expanded-width-xs u-group u-group-1">
                    <div class="u-container-layout u-valign-middle u-container-layout-1">
                    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dia_diem";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_SESSION['user_id'];

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$query = "SELECT * FROM users WHERE user_id='" . $id . "'";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
} else {
    die("Lỗi truy vấn: " . $conn->error);
}
?>

<?php
$status = "";
if (isset($_POST['new']) && $_POST['new'] == 1) {
    $id = $_REQUEST['user_id'];
    $user_type = $_REQUEST['user_type'];

    $update = "UPDATE users SET user_type='" . $user_type . "' WHERE user_id='" . $id . "'";

    if ($conn->query($update) === TRUE) {
        $status = 'Cập nhật thành công!</br></br>
        <a href="quanlyuser.php">Quay lại trang cần chỉnh sửa</a>';
        echo '<p style="color:#FF0000;">' . $status . '</p>';
        // Chuyển hướng người dùng đến danhsachdon.php sau khi cập nhật thành công
        header("Location: quanlyuser.php");
        exit; // Đảm bảo không có mã HTML hoặc mã PHP nào được thực thi sau header
    } else {
        echo "Lỗi cập nhật: " . $conn->error;
    }
} else {
    // Hiển thị biểu mẫu để chỉnh sửa thông tin
    $id = $_REQUEST['id'];
    $query = "SELECT * from users where user_id='" . $id . "'";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
    } else {
        die("Lỗi truy vấn: " . $conn->error);
    }
?>
    <div>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <input name="user_id" type="hidden" value="<?php echo $row['user_id']; ?>" />

            <p>
    <label for="user_type">Phân quyền User</label>
</p>
<p>
    <select id="user_type" name="user_type" style="width: 80%; height: 80%;"required>
        <option value="1" <?php echo ($row['user_type'] == 1) ? 'selected' : ''; ?>>User</option>
        <option value="2" <?php echo ($row['user_type'] == 2) ? 'selected' : ''; ?>>Admin</option>
        <option value="3" <?php echo ($row['user_type'] == 3) ? 'selected' : ''; ?>>Nhân viên</option>
    </select>
</p>

            <p><input name="submit" type="submit" value="Lưu thay đổi" /></p>
        </form>
    </div>
<?php } ?>


                            </div>
                    </div>
      
  </section>




  </section>
</body>

</html>