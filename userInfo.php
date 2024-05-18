<?php
session_start()
  ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dia_diem";

$connect = new mysqli($servername, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
  die("Không kết nối :" . $connect->connect_error);

}
$username = "";
$name = "";
$phone = "";
$email = "";
$note = "";
$successMessage = ""; // Biến để lưu thông báo thành công

//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["username"])) {
    $name = $_POST['username'];
  }
  if (isset($_POST["name"])) {
    $name = $_POST['name'];
  }
  if (isset($_POST["phone"])) {
    $phone = $_POST['phone'];
  }
  if (isset($_POST["email"])) {
    $email = $_POST['email'];
  }
  if (isset($_POST["note"])) {
    $note = $_POST['note'];
  }

  //Code xử lý, insert dữ liệu vào table
  $sql = "INSERT INTO lienhe (username, name, phone, email, note)
  VALUES ('$username', '$name', '$phone', '$email', '$note')";

  if ($connect->query($sql) === TRUE) {
    $successMessage = "Dữ liệu đã được lưu thành công!";
  } else {
    echo "Lỗi: " . $sql . "<br>" . $connect->error;
  }
}
//Đóng database
$connect->close();
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
    /* Định dạng cho các nút "Chỉnh sửa", "Đổi mật khẩu" và "Xóa tài khoản" */
/* Định dạng cho tên trường */
.user-info-label {
    font-weight: bold;
    font-size: 16px; /* Điều chỉnh kích thước font theo ý muốn */
    display: inline-block;
    width: 120px;
}

/* Định dạng cho giá trị trường */
.user-info-value {
    font-size: 14px; /* Điều chỉnh kích thước font theo ý muốn */
    display: inline-block;
    margin-left: 10px; /* Khoảng cách giữa tên trường và giá trị */
}

/* Định dạng cho các nút "Chỉnh sửa", "Đổi mật khẩu" và "Xóa tài khoản" */
.user-action-btn {
    display: inline-block;
    padding: 5px 10px;
    margin-right: 5px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    font-weight: bold; /* In đậm nút */
    font-size: 14px; /* Điều chỉnh kích thước font theo ý muốn */
}

/* Định dạng cho nút khi được hover */
.user-action-btn:hover {
    background-color: #0056b3;
}
.user-info-box {
    border: 1px solid #none;
    padding: 20px;
    margin: 20px;
    display: inline-block;
    background-color: #f9f9f9;
}

.user-info-square {
    border: 1px solid #none;
    padding: 20px;
    background-color: #fff;
}

.user-info-row {
    margin: 10px 0;
}

.user-info-label {
    font-weight: bold;
    margin-right: 10px;
}

.user-info-actions {
    margin-top: 20px;
}

.user-action-btn {
    display: inline-block;
    margin-right: 10px;
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}



    </style>

  <style>
    .tour {
      border: 1px solid #ccc;
      padding: 10px;
      margin: 10px;
      width: 400px;
      display: inline-block;
    }

    .tour img {
      width: 100%;
      height: auto;
    }

    .tour p {
      margin: 5px 0;
    }

    .tour form {
      text-align: center;
    }

    .tour input[type="number"] {
      width: 50px;
      text-align: center;
    }

    .tour input[type="submit"] {
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }
  </style>
    <style>
    header {
        background-image: url('images/nen.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
    }
</style>
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
            <ul class="u-nav u-spacing-20 u-unstyled u-nav-1">
                <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base" style="color: #fff; font-size: 18px;" " href="login_page.php">Đăng nhập</a>
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
                <style>
  .greeting-text {
    color: black;
  }
</style>


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
  <style>
    #chat-icon {
    width: 62px;
    height: 62px;
    background-color: #3CB371;
    color: #fff;
    border-radius: 50%;
    text-align: center;
    line-height: 50px;
    cursor: pointer;
    position: fixed;
    bottom: 100px; /* Khoảng cách từ dưới cùng của màn hình */
    right: 26px; /* Khoảng cách từ phải cùng của màn hình */
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    /* CSS để tùy chỉnh khung chatbot */
    #chatbot-container {
      display: none;
      position: fixed;
      bottom: 90px;
      right: 20px;
      width: 400px;
      /* Chiều rộng của khung chatbot */
      height: 500px;
      /* Chiều cao của khung chatbot */
      border: 1px solid #ccc;
      z-index: 1000;
      /* Đảm bảo hiển thị trên top */
      overflow: hidden;
      /* Loại bỏ thanh cuộn */
    }


    #chatbot-iframe {
      width: 100%;
      height: 100%;
      border: none;
      margin: 0;
      /* Loại bỏ margin */
      padding: 0;
      /* Loại bỏ padding */
      box-sizing: border-box;
    }


    /* CSS để tùy chỉnh nút tắt chat */
    #close-chat {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #ff0000;
      color: #fff;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      text-align: center;
      line-height: 30px;
      cursor: pointer;
      z-index: 1001;
      /* Đảm bảo nút tắt chat hiển thị trên top */
    }
    .bigger-icon {
    font-size: 30px; /* Đổi kích thước icon */
}

  </style>
  <div id="chat-icon">
    <i class="fas fa-comment bigger-icon"></i>
</div>

  </div>

  <!-- Khung chatbot -->
  <div id="chatbot-container">
    <div id="close-chat">X</div>
    <iframe id="chatbot-iframe" src="http://localhost:5000/"></iframe>
  </div>

  <!-- JavaScript để hiển thị/ẩn khung chatbot khi bấm vào biểu tượng -->
  <script>
    const chatIcon = document.getElementById("chat-icon");
    const chatbotContainer = document.getElementById("chatbot-container");
    const closeChatButton = document.getElementById("close-chat");

    chatIcon.addEventListener("click", function () {
      chatbotContainer.style.display = "block";
    });

    closeChatButton.addEventListener("click", function () {
      chatbotContainer.style.display = "none";
    });
  </script>
   <div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "161762163689110");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v18.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>


<section class="u-border-2 u-border-black u-border-no-bottom u-border-no-left u-border-no-right u-clearfix u-section-1"></section>
<style>
  .user-info-container {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .user-info-box {
    /* Nếu bạn muốn thêm các kiểu khác cho user-info-box, bạn có thể thêm ở đây */
  }
</style>
  
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dia_diem";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_SESSION['user_id'];
$sql = "SELECT user_id, username,name, ngaysinh, email, phone, dia_chi, created_at FROM users WHERE user_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="user-info-box user-info-container ">';
        echo '<div class="user-info-square">';
        echo '<div class="user-info-row"><span class="user-info-label">Tên tài khoản:</span> ' . $row["username"] . '</div>';
        echo '<div class="user-info-row"><span class="user-info-label">Họ tên:</span> ' . $row["name"] . '</div>';
        echo '<div class="user-info-row"><span class="user-info-label">Ngày sinh:</span> ' . $row["ngaysinh"] . '</div>';
        echo '<div class="user-info-row"><span class="user-info-label">Email:</span> ' . $row["email"] . '</div>';
        echo '<div class="user-info-row"><span class="user-info-label">Số điện thoại:</span> ' . $row["phone"] . '</div>';
        echo '<div class="user-info-row"><span class="user-info-label">Địa chỉ:</span> ' . $row["dia_chi"] . '</div>';
        echo '<div class="user-info-row"><span class="user-info-label">Thời gian tạo:</span>' . date('d/m/Y H:i:s', strtotime( $row["created_at"] )) . '</div>';
        echo '<div class="user-info-actions user-info-container ">
        <a href="edit.php?id=' . $row["user_id"] . '" class="user-action-btn">Chỉnh sửa</a>
        <a href="reset_password.php?id=' . $row["user_id"] . '" class="user-action-btn">Đổi mật khẩu</a>
        <a href="delete.php?id=' . $row["user_id"] . '" class="user-action-btn">Xóa tài khoản</a>
      </div>';
        echo '</div>'; 
        echo '</div>'; // Close user-info-box
    }
} else {
    echo "0 results";
}
?>


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