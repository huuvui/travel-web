<?php
require_once "config.php";
$username = $password = $confirm_password = $name = $ngaysinh = $email = $phone = $gioi_tinh  = $dia_chi = "";
$username_err = $password_err = $confirm_password_err = $name_err = $email_err = $ngaysinh_err  = $phone_err = $gioi_tinh_err  = $dia_chi_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
    $username_err = "Username can only contain letters, numbers, and underscores.";
  } else {
    $sql = "SELECT user_id FROM users WHERE username = :username";

    if ($stmt = $pdo->prepare($sql)) {
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $param_username = trim($_POST["username"]);
      if ($stmt->execute()) {
        if ($stmt->rowCount() == 1) {
          $username_err = "Tài khoản này đã tồn tại.";
        } else {
          $username = trim($_POST["username"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
      unset($stmt);
    }
  }
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Mật khẩu phải nhiều hơn 6 ký tự.";
  } else {
    $password = trim($_POST["password"]);
  }
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Hãy nhập lại mật khẩu.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Mật khẩu không khớp.";
    }
  }
  if (empty(trim($_POST["dia_chi"]))) {
    $dia_chi_err = "Điền Địa chỉ của bạn.";
  } elseif (strlen(trim($_POST["dia_chi"])) < 10) {
    $dia_chi_err = "Địa chỉ phải trên 10 kí tự.";
  } else {
    $dia_chi = trim($_POST["dia_chi"]);
  }
  if (empty(trim($_POST["email"]))) {
    $email_err = "Điền địa chỉ email của bạn.";
  } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
    $email_err = "Địa chỉ email không hợp lệ.";
  } else {
    $email = trim($_POST["email"]);
  }
  if (empty(trim($_POST["phone"]))) {
    $phone_err = "Nhập số điện thoại của bạn.";
  } elseif (!preg_match('/^[0-9]{10,}$/', trim($_POST["phone"]))) {
    $phone_err = "Số điện thoại không hợp lệ.";
  } else {
    $phone = trim($_POST["phone"]);
  }
  if (empty(trim($_POST["name"]))) {
    $name_err = "Nhập họ và tên của bạn.";
  } else {
    $name = trim($_POST["name"]);
  }
  if (empty(trim($_POST["ngaysinh"]))) {
    $ngaysinh_err = "Nhập ngày sinh của bạn.";
  } else {
    $ngaysinh = trim($_POST["ngaysinh"]);
  }
  if (empty($_POST["gioi_tinh"])) {
    $gioi_tinh_err = "Chọn giới tính của bạn.";
  } else {
    $gioi_tinh = $_POST["gioi_tinh"];
  }
      
  if (empty($username_err) && empty($password_err) && empty($name_err) && empty($ngaysinh_err) && empty($email_err) && empty($phone_err) && empty($gioi_tinh_err)&& empty($confirm_password_err && empty($dia_chi_err))) {

    $sql = "INSERT INTO users (username, password,name, ngaysinh ,gioi_tinh, email, phone ,dia_chi) VALUES (:username, :password, :name, :ngaysinh, :gioi_tinh, :email, :phone, :dia_chi)";

    if ($stmt = $pdo->prepare($sql)) {
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
      $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
      $stmt->bindParam(":ngaysinh", $param_ngaysinh, PDO::PARAM_STR);
      $stmt->bindParam(":gioi_tinh", $param_gioi_tinh, PDO::PARAM_STR);
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
      $stmt->bindParam(":dia_chi", $param_dia_chi, PDO::PARAM_STR);
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT);
      $param_dia_chi = $dia_chi;
      $param_name = $name;
      $param_ngaysinh = $ngaysinh;
      $param_gioi_tinh = $gioi_tinh;
      $param_email = $email;
      $param_phone = $phone;
      if ($stmt->execute()) {
        header("location: login_page.php");
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
      unset($stmt);
    }
  }
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
            <svg class="u-svg-content" version="1.1" id="svg-67fb" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
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
<div class="container">
<h5 style="text-align: center; margin-top: 0; color: #000; font-size: 30px;">VUI LÒNG ĐIỀN ĐẦY ĐỦ THÔNG TIN CÁ NHÂN TẠI ĐÂY!</h5>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-outline mb-4">
        <label>Tài khoản</label>
        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
        <span class="invalid-feedback"><?php echo $username_err; ?></span>
      </div>
      <div class="form-outline mb-4">
        <label>Mật khẩu</label>
        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
        <span class="invalid-feedback"><?php echo $password_err; ?></span>
      </div>
      <div class="form-outline mb-4">
        <label>Nhập lại mật khẩu</label>
        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
      </div>
      <div class="form-outline mb-4">
        <label>Họ và tên</label>
        <input type="name" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
        <span class="invalid-feedback"><?php echo $name_err; ?></span>
      </div>
      <div class="form-outline mb-4">
        <label>Ngày sinh</label>
        <input type="ngaysinh" name="ngaysinh" class="form-control <?php echo (!empty($ngaysinh_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ngaysinh; ?>">
        <span class="invalid-feedback"><?php echo $ngaysinh_err; ?></span>
      </div>
      <div class="form-outline mb-4">
        <label>Email</label>
        <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
        <span class="invalid-feedback"><?php echo $email_err; ?></span>
      </div>
      <div class="form-outline mb-4">
        <label>Số điện thoại</label>
        <input type="phone" name="phone" class="form-control <?php echo (!empty($param_phone)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
        <span class="invalid-feedback"><?php echo $phone_err; ?></span>
      </div>
     <div class="form-outline mb-4">
    <label>Giới tính</label>
    <select name="gioi_tinh" class="form-control <?php echo (!empty($gioi_tinh_err)) ? 'is-invalid' : ''; ?>">
        <option value="" disabled selected>Chọn giới tính</option>
        <option value="nam" <?php if ($gioi_tinh === 'nam') echo 'selected'; ?>>Nam</option>
        <option value="nu" <?php if ($gioi_tinh === 'nu') echo 'selected'; ?>>Nữ</option>
        <option value="khac" <?php if ($gioi_tinh === 'khac') echo 'selected'; ?>>Khác</option>
    </select>
    <span class="invalid-feedback"><?php echo $gioi_tinh_err; ?></span>
</div>

      <div class="form-outline mb-4">
        <label>Địa chỉ</label>
        <input type="dia_chi" name="dia_chi" class="form-control <?php echo (!empty($dia_chi_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dia_chi; ?>">
        <span class="invalid-feedback"><?php echo $dia_chi_err; ?></span>
      </div>
      <div class="form-outline mb-4 text-center">
    <input type="submit" class="btn btn-primary" value="Đăng ký">
    <input type="reset" class="btn btn-secondary ml-2" value="Xóa">
    <p>Đã có tài khoản? <a href="login_page.php">Đăng nhập tại đây</a>.</p>
</div>

      
    </form>
</div>
  </section>

<style>
  /* Style for form container */
form {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
   
}

/* Style for form labels */
form label {
    display: block;
    margin-bottom: 6px;
}

/* Style for form inputs */
form input[type="text"],
form input[type="password"],
form input[type="email"],
form input[type="name"],
form input[type="ngaysinh"],
form input[type="phone"],
form input[type="dia_chi"],
form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Style for invalid inputs */
form .is-invalid {
    border-color: #dc3545;
}

/* Style for invalid feedback */
form .invalid-feedback {
    display: block;
    color: #dc3545;
    margin-top: 4px;
    font-size: 12px;
}

/* Style for buttons */
form input[type="submit"],
form input[type="reset"] {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form input[type="submit"] {
    background-color: #007bff;
    color: #fff;
}

form input[type="reset"] {
    background-color: #6c757d;
    color: #fff;
}

form input[type="submit"]:hover,
form input[type="reset"]:hover {
    filter: brightness(90%);
}

/* Style for the link */
form p a {
    text-decoration: none;
    color: #007bff;
}

  </style>

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