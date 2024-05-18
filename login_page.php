<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: index.php");
  exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $user_type = $diachi = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
  } else {
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement
    $sql = "SELECT user_id, username, user_type, password, dia_chi FROM users WHERE username = :username";

    if ($stmt = $pdo->prepare($sql)) {
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

      // Set parameters
      $param_username = trim($_POST["username"]);

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {
        // Check if username exists, if yes then verify password
        if ($stmt->rowCount() == 1) {
          if ($row = $stmt->fetch()) {
            $id = $row["user_id"];
            $username = $row["username"];
            $hashed_password = $row["password"];
            $user_type = $row["user_type"];
            $diachi = $row["dia_chi"];
            if (password_verify($password, $hashed_password)) {
              // Password is correct, so start a new session
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["user_id"] = $id;
              $_SESSION["username"] = $username;
              $_SESSION["user_type"] = $user_type;
              $_SESSION["dia_chi"] = $diachi;
              // Redirect user to welcome page
              header("location: index.php");
            } else {
              // Password is not valid, display a generic error message
              $login_err = "Invalid username or password.";
            }
          }
        } else {
          // Username doesn't exist, display a generic error message
          $login_err = "Invalid username or password.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      unset($stmt);
    }
  }

  // Close connection
  unset($pdo);
}
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
  <link rel="stylesheet" href="login_page.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 4.21.12, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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
     header{
    background-image: url('images/nen.jpg');
    background-size: cover;
    background-attachment: fixed;
    }
  </style>
  <style>
        
        .login-container {
            width: 350px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.85); /* Semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container h2 {
            font-family: 'Arial', sans-serif;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
        }

        .form-group .invalid-feedback {
            color: red;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            background: linear-gradient(to bottom, #ff6600, #ff9900); /* Gradient background */
            border: none;
            border-radius: 5px;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        .btn-login:hover {
            background: linear-gradient(to bottom, #ff9900, #ff6600); /* Gradient background on hover */
        }

        .text-center {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            color: #333;
        }

        .text-center a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link href="images/logo.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="trong_nuoc.css" media="screen">
  <link rel="stylesheet" href="ngoai_nuoc.css" media="screen">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 4.21.12, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": ""
    }
  </script>
  <style>
     header{
    background-image: url('images/nen.jpg');
    background-size: cover;
    background-attachment: fixed;
    }
  </style>
 <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="trong_nuoc">
    <meta property="og:type" content="website">
</head>

<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": ""
    }
  </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="trong_nuoc">
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
                    <i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 20px"></i> Đặt tour
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
                    <i class="fas fa-question-circle" style="font-size: 20px"></i> Tư vấn
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
        <img class="u-hidden-md u-hidden-sm u-hidden-xs u-image u-image-contain u-image-2" 
          data-image-width="1600" data-image-height="500">
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
        <li class="u-nav-item" style="background-color: white;"><a style="color: #000; font-size: 16px;" class="u-button-style u-nav-link" href="admin.php">Quản lý Admin</a></li>
        <li class="u-nav-item" style="background-color: white;"><a style="color: #000; font-size: 16px;" class="u-button-style u-nav-link" href="logout.php">Đăng xuất</a></li>';
} elseif ($_SESSION["user_type"] == 3) {
    echo '
        <li class="u-nav-item" style="background-color: white;"><a style="color: #000; font-size: 16px;" class="u-button-style u-nav-link" href="nhanvien.php">Quản lý chung</a></li>
        <li class="u-nav-item" style="background-color: white;"><a style="color: #000; font-size: 16px;" class="u-button-style u-nav-link" href="userInfo.php">Thông tin cá nhân</a></li>
        <li class="u-nav-item" style="background-color: white;"><a style="color: #000; font-size: 16px;" class="u-button-style u-nav-link" href="logout.php">Đăng xuất</a></li>';
} else {
    echo '

        <li class="u-nav-item" style="background-color: white;"><a style="color: #000; font-size: 16px;" class="u-button-style u-nav-link" href="userInfo.php">Thông tin cá nhân</a></li>
        <li class="u-nav-item" style="background-color: white;"><a style="color: #000; font-size: 16px;" class="u-button-style u-nav-link" href="dondathang.php">Lịch sử đặt tour</a></li>
        <li class="u-nav-item" style="background-color: white;"><a style="color: #000; font-size: 16px;" class="u-button-style u-nav-link" href="logout.php">Đăng xuất</a></li>';
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
<section class="u-border-2 u-border-black u-border-no-bottom u-border-no-left u-border-no-right u-clearfix u-section-1"></section>
  <section class="w-100 p-4 d-flex justify-content-center pb-4">

  <div class="login-container">
        <h2>Đăng nhập</h2>
        <p>Điền thông tin cần thiết để đăng nhập.</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
    <input type="text" name="username" id="username" class="<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Nhập tài khoản">
    <span class="invalid-feedback"><?php echo $username_err; ?></span>
</div>

<div class="form-group">
    <input type="password" name="password" id="password" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Nhập mật khẩu">
    <span class="invalid-feedback"><?php echo $password_err; ?></span>
</div>

            <input type="submit" class="btn-login" value="Đăng Nhập">
        </form>

        <div class="text-center">
            <p>Chưa có tài khoản? <a href="register_page.php">Đăng ký.</a></p>
        </div>
    </div>
    </section>
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-568d">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1"><p>© 2023 Bản quyền thuộc về HappyTravel.com.vn
                          </br>
                          <a href="https://vi-vn.facebook.com/"><i class="fab fa-facebook"></i> Facebook</a>
                          <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i> Instagram</a>
                          <a href="https://twitter.com/i/flow/login"><i class="fab fa-twitter"></i>Twitter</a>
                          <a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i> Pinterest</a>
            </p></p>
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