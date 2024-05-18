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
          // Connect to the database
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "dia_diem";
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check the connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Get the user ID from the session
          $id = $_SESSION['user_id'];

          // Query to retrieve user information
          $query = "SELECT * FROM users WHERE user_id='" . $id . "'";
          $result = mysqli_query($conn, $query) or die(mysqli_error());
          $row = mysqli_fetch_assoc($result);
          ?>
          <?php
          $status = "";
          if (isset($_POST['new']) && $_POST['new'] == 1) {
            // Get values from the form
            $id = $_REQUEST['id'];
            $matour = $_REQUEST['matour'];
            $tentour = $_REQUEST['tentour'];
            $hinh = $_REQUEST['hinh'];
            $gia = $_REQUEST['gia'];
            $thoigian = $_REQUEST['thoigian'];
            $ngaybd = $_REQUEST['ngaybd'];
            $kv = $_REQUEST['kv'];

            // Update query
            $update = "UPDATE diadiem SET 
              matour='" . $matour . "', 
              tentour='" . $tentour . "', 
              hinh='" . $hinh . "', 
              gia='" . $gia . "', 
              thoigian='" . $thoigian . "', 
              ngaybd='" . $ngaybd . "',
              kv='" . $kv . "' 
              WHERE id='" . $id . "'";

            // Execute the update query
            mysqli_query($conn, $update) or die(mysqli_error());

            // Display success message
            $status = "Cập nhật thành công!</br></br>
            <a href='tour.php'>Quay lại trang cần chỉnh sửa</a>";
            echo '<p style="color:#FF0000;">' . $status . '</p>';

            // Redirect to tour.php after successful update
            header("Location: tour.php");
            exit(); // Ensure that no further code is executed after the redirection
          } else {
            // Display the form to edit tour information
            $id = $_REQUEST['id'];
            $query = "SELECT * FROM diadiem WHERE id='" . $id . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error());
            $row = mysqli_fetch_assoc($result);
          ?>
            <div>
              <!-- Tour Information Editing Form -->
              <form name="form" method="post" action="">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />

                <!-- Input fields for editing tour information -->
                <p><label for="matour">Mã tour:</label></p>
                <p><input type="text" id="matour" name="matour" placeholder="Nhập mã tour" required value="<?php echo $row['matour']; ?>" /></p>

                <p><label for="tentour">Tên tour:</label></p>
                <p><input type="text" id="tentour" name="tentour" placeholder="Nhập tên tour" required value="<?php echo $row['tentour']; ?>" /></p>

                <p><label for="hinh">Hình:</label></p>
                <p><input type="text" id="hinh" name="hinh" placeholder="Nhập hình" required value="<?php echo $row['hinh']; ?>" /></p>

                <p><label for="gia">Giá:</label></p>
                <p><input type="text" id="gia" name="gia" placeholder="Nhập giá" required value="<?php echo $row['gia']; ?>" /></p>

                <p><label for="thoigian">Thời gian:</label></p>
                <p><input type="text" id="thoigian" name="thoigian" placeholder="Nhập thời gian" required value="<?php echo $row['thoigian']; ?>" /></p>

                <p><label for="ngaybd">Ngày khởi hành</label></p>
                <p><input type="text" id="ngaybd" name="ngaybd" placeholder="Nhập ngày khởi hành" required value="<?php echo $row['ngaybd']; ?>" /></p>

                <p><label for="vi_tri">Mã khu vực:</label></p>
                <p><input type="text" id="kv" name="kv" placeholder="Nhập khu vực" required value="<?php echo $row['kv']; ?>" /></p>

                <!-- Submit button -->
                <p><input name="submit" type="submit" value="Lưu thay đổi" /></p>
              </form>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
</body>

</html>