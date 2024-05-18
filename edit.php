<?php
session_start()
  ?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Happy Travel</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link href="images/logo.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 4.21.12, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">


  <style>
    header {
      background-image: url('images/nen.jpg');
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
    }
  </style>
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

<body class="u-body u-xl-mode" data-lang="en">
  <header class="u-clearfix u-header" id="sec-a4ab" data-animation-name="" data-animation-duration="0"
    data-animation-delay="0" data-animation-direction="">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-clearfix u-group-elements u-group-elements-1">
        <div class="u-clearfix u-group-elements u-group-elements-2">
          <img class="u-hidden-md u-hidden-sm u-hidden-xs u-image u-image-1">
          <nav class="u-dropdown-icon u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="MD">
            <div class="menu-collapse"
              style="font-size: 1rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 500;">
              <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-decoration u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="#">
                <svg class="u-svg-link" viewBox="0 0 24 24">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-e04e"></use>
                </svg>
                <svg class="u-svg-content" version="1.1" id="svg-e04e" viewBox="0 0 16 16" x="0px" y="0px"
                  xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <rect y="1" width="16" height="2"></rect>
                    <rect y="7" width="16" height="2"></rect>
                    <rect y="13" width="16" height="2"></rect>
                  </g>
                </svg>
              </a>
            </div>
            <div class="u-custom-menu u-nav-container">
              <ul class="u-nav u-spacing-26 u-unstyled u-nav-1">
                </br>

                <li class="u-nav-item">
                  <a class="u-active-palette-1-light-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white u-white"
                    href="index.php" style="font-family: 'Arial', sans-serif; font-size: 20px;">
                    <i class="fas fa-home" style="font-size: 20px" ;></i> Trang chủ
                  </a>

                </li>
                <li class="u-nav-item">
                  <a class="u-active-palette-1-light-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white u-white"
                    href="diadiem.php" style="font-family: 'Arial', sans-serif; font-size: 20px;">
                    <i class="fa fa-newspaper-o" aria-hidden="true" style="font-size: 20px"></i>Giới thiệu
                  </a>
                </li>
                <li class="u-nav-item">
                  <a class="u-active-palette-1-light-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white u-white"
                    href="cart.php" style="font-family: 'Arial', sans-serif; font-size: 20px;">
                    <i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 20px"></i> Booking
                  </a>
                </li>
                <li class="u-nav-item">
                  <a class="u-active-palette-1-light-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white u-white"
                    href="contact.php" style="font-family: 'Arial', sans-serif; font-size: 20px;">
                    <i class="fas fa-question-circle" style="font-size: 20px"></i> Hỗ trợ
                  </a>
                </li>
                <li class="u-nav-item">
                  <a class="u-active-palette-1-light-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white u-white"
                    href="ai.php" style="font-family: 'Arial', sans-serif; font-size: 20px;">
                    <i class="fas fa-question-circle" style="font-size: 20px"></i> Tư vấn AI
                  </a>
                </li>
              </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
              <div
                class="u-black u-container-style u-expanded-width u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                <div class="u-inner-container-layout u-sidenav-overflow">
                  <div class="u-expanded u-menu-close"></div>
                  <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="home.php">Trang chủ</a>
                    </li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link">Địa Điểm</a>
                    </li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="dat_tour.php"> Đặt tour</a>
                    </li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.php">Hỗ trợ</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
          </nav>
        </div>
        <img class="u-hidden-md u-hidden-sm u-hidden-xs u-image u-image-contain u-image-2" data-image-width="1600"
          data-image-height="500">
      </div>
      <nav class="u-hidden-xs u-menu u-menu-dropdown u-offcanvas u-menu-2" data-responsive-from="XS">
        <div class="menu-collapse">
          <a class="u-button-style u-nav-link" href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-83c8"></use>
            </svg>
            <svg class="u-svg-content" version="1.1" id="svg-83c8" viewBox="0 0 16 16" x="0px" y="0px"
              xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
              <g>
                <rect y="1" width="16" height="2"></rect>
                <rect y="7" width="16" height="2"></rect>
                <rect y="13" width="16" height="2"></rect>
              </g>
            </svg>
          </a>
        </div>
        <style>
          .greeting-container {
            text-align: center;
            margin: 20px 0;
          }

          .greeting-text {
            margin: 0;
            font-size: 14px;
            /* Adjust the font size for the greeting text */
          }

          .avatar-image {
            display: block;
            margin: 10px auto;
            border-radius: 50%;
            width: 80px;
            /* Adjust the width of the avatar image */
            height: 80px;
            /* Adjust the height of the avatar image */
            overflow: hidden;
            border: 2px solid #ccc;
            /* Change the border color (e.g., #ccc) */
          }
        </style>

        <?php
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
          echo '
        <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-20 u-unstyled u-nav-1">
                <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" style="margin-top: 20px;" href="login_page.php">Đăng nhập</a>
                </li>
            </ul>
        </div>';
        } else {
          // Bước 2: Truy vấn cơ sở dữ liệu để lấy đường dẫn đến ảnh đại diện của người dùng
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "dia_diem";

          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
          }

          $user_id = $_SESSION["user_id"]; // Thay thế bằng user_id của người dùng đang đăng nhập
          $sql = "SELECT anh FROM users WHERE user_id = ?";

          $stmt = $conn->prepare($sql);
          $stmt->bind_param("i", $user_id);
          $stmt->execute();
          $stmt->bind_result($avatarUrl);
          $stmt->fetch();
          $stmt->close();
          ?>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-1 u-unstyled u-nav-1">
              <li class="u-nav-item">
                <div class="greeting-container">
                  <p
                    class="u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base greeting-text">
                    Xin chào,
                    <?php echo htmlspecialchars($_SESSION["username"]); ?>
                  </p>
                  <!-- Kiểm tra và hiển thị ảnh đại diện -->
                  <?php
                  if (!empty($avatarUrl)) {
                    echo '<img src="' . $avatarUrl . '" alt="Ảnh đại diện của bạn" class="avatar-image">';
                  } else {
                    echo '<p>Không có ảnh đại diện</p>';
                  }
                  ?>
                </div>
                <div class="u-nav-popup">
                  <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-8 u-nav-2">
                    <?php
                    if ($_SESSION["user_type"] == 2) {
                      echo '
                            
                                <li class="u-nav-item"><a style="color: #fff;" class="u-button-style u-nav-link" href="admin.php">Quản lý Admin</a></li>
                                <li class="u-nav-item"><a style="color: #fff;" class="u-button-style u-nav-link" href="logout.php">Đăng xuất</a></li>';
                    } elseif ($_SESSION["user_type"] == 3) {
                      echo '
                               <li class="u-nav-item"><a style="color: #fff;" class="u-button-style u-nav-link" href="nhanvien.php">Quản lý Admin</a></li>
                                <li class="u-nav-item"><a style="color: #fff;" class="u-button-style u-nav-link" href="userInfo.php">Thông tin cá nhân</a></li>
                                <li class="u-nav-item"><a style="color: #fff;" class="u-button-style u-nav-link" href="logout.php">Đăng xuất</a></li>';
                    } else {
                      echo '
                                <li class="u-nav-item"><a style="color: #fff;" class="u-button-style u-nav-link" href="userInfo.php">Thông tin cá nhân</a></li>
                                <li class="u-nav-item"><a  style="color: #fff;" class="u-button-style u-nav-link" href="dondathang.php">Lịch sử đặt tour</a></li>
                                <li class="u-nav-item"><a style="color: #fff;" class="u-button-style u-nav-link" href="logout.php">Đăng xuất</a></li>';
                    }
                    ?>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
          <?php
        }
        ?>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">

            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
      </nav>
      <nav class="u-hidden-xs u-menu u-menu-one-level u-offcanvas u-menu-3" data-responsive-from="XS">
        <div class="menu-collapse">
          <a class="u-button-style u-nav-link" href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-67fb"></use>
            </svg>
            <svg class="u-svg-content" version="1.1" id="svg-67fb" viewBox="0 0 16 16" x="0px" y="0px"
              xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
              <g>
                <rect y="1" width="16" height="2"></rect>
                <rect y="7" width="16" height="2"></rect>
                <rect y="13" width="16" height="2"></rect>
              </g>
            </svg>
          </a>
        </div>
        <div class="u-custom-menu u-nav-container">

          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
    </div>
  </header>
  <section
    class="u-border-2 u-border-black u-border-no-bottom u-border-no-left u-border-no-right u-clearfix u-section-1">
  </section>
  <section class="">
    <div class="u-clearfix u-sheet u-sheet-1">
    <script>
// Sử dụng JavaScript để chuyển hướng sau một khoảng thời gian
setTimeout(function() {
    window.location.href = document.getElementById('redirectLink').href;
}, 0000); // 3000 milliseconds (3 seconds) - bạn có thể điều chỉnh thời gian chuyển hướng theo ý muốn
</script>

      <div>
        <div class="u-container-layout u-valign-middle u-container-layout-1">
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "dia_diem";
          $conn = new mysqli($servername, $username, $password, $dbname);
          $id = $_SESSION['user_id'];
          $query = "SELECT * from users where user_id='" . $id . "'";
          $result = mysqli_query($conn, $query) or die(mysqli_error());
          $row = mysqli_fetch_assoc($result);
          ?>

          <?php
          $status = "";
          if (isset($_POST['new']) && $_POST['new'] == 1) {
            $id = $_REQUEST['user_id'];
            $username = $_REQUEST['username'];
            $name = $_REQUEST['name'];
            $ngaysinh = $_REQUEST['ngaysinh'];
            $dia_chi = $_REQUEST['dia_chi'];
            $email = $_REQUEST['email'];
            $phone = $_REQUEST['phone'];

            $update = "UPDATE users SET 
            username='" . $username . "', 
            name='" . $name . "', 
            ngaysinh='" . $ngaysinh . "', 
            dia_chi='" . $dia_chi . "', 
            email='" . $email . "', 
            phone='" . $phone . "' 
            WHERE user_id='" . $id . "'";

            mysqli_query($conn, $update) or die(mysqli_error());
            $status = "<a id='redirectLink' href='userInfo.php'></a>";
            echo '<p style="color:#FF0000;">' . $status . '</p>';
          } else {
            ?>
            <div>
              <form name="form" method="post" action="">
                <input type="hidden" name="new" value="1" />
                <input name="user_id" type="hidden" value="<?php echo $row['user_id']; ?>" />
                <p><label for="name">Tên tài khoản:</label></p>
                <p><input type="text" id="username" name="username" placeholder="Nhập tên tài khoản" required
                    value="<?php echo $row['username']; ?>" /></p>

                <p><label for="name">Họ và tên:</label></p>
                <p><input type="text" id="name" name="name" placeholder="Nhập họ và tên" required
                    value="<?php echo $row['name']; ?>" /></p>

                <p><label for="ngaysinh">Ngày sinh:</label></p>
                <p><input type="text" id="ngaysinh" name="ngaysinh" placeholder="Nhập ngày sinh" required
                    value="<?php echo $row['ngaysinh']; ?>" /></p>

                <p><label for="dia_chi">Địa chỉ:</label></p>
                <p><input type="text" id="dia_chi" name="dia_chi" placeholder="Nhập địa chỉ cần chỉnh sửa" required
                    value="<?php echo $row['dia_chi']; ?>" /></p>

                <p><label for="email">Email:</label></p>
                <p><input type="email" id="email" name="email" placeholder="Nhập địa chỉ email" required
                    value="<?php echo $row['email']; ?>" /></p>

                <p><label for="phone">Số điện thoại:</label></p>
                <p><input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required
                    value="<?php echo $row['phone']; ?>" /></p>

                <p style="text-align: center;">
                  <input name="submit" type="submit" value="Lưu thay đổi" />
                </p>
              </form>
            <?php } ?>
          </div>
        </div>
  </section>
  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-568d">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1">
      <p>© 2023 Bản quyền thuộc về HappyTravel.com.vn
        </br>
        <a href="https://vi-vn.facebook.com/"><i class="fab fa-facebook"></i> Facebook</a>
        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i> Instagram</a>
        <a href="https://twitter.com/i/flow/login"><i class="fab fa-twitter"></i>Twitter</a>
        <a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i> Pinterest</a>
      </p>
      </p>
    </div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/html5-template" target="_blank">
    </a>
    <p class="u-text">

    </p>

  </section>
</body>

</html>