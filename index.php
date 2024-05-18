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
        margin: 0;
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

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": ""
    }
  </script>
  <style>
    input[type="text"] {
      padding: 10px;
      /* Thay đổi khoảng cách giữa viền ô và nội dung */
      border: 1px solid #ccc;
      /* Thay đổi viền của ô */
      border-radius: 5px;
      /* Làm mềm góc của ô */
      width: 990px;
      /* Thay đổi chiều rộng của ô */
    }

    /* CSS cho nút tìm kiếm */
    input[type="submit"] {
      padding: 9px 20px;
      /* Thay đổi khoảng cách giữa viền nút và nội dung */
      background-color: #fff;
      /* Đặt màu nền của nút thành màu xanh biển */
      color: #OOO;
      /* Đặt màu chữ trên nút thành màu trắng */
      border: 1px solid #ccc;
      /* Thay đổi viền của ô */
      border-radius: 5px;
      /* Làm mềm góc của nút */
      cursor: pointer;
      /* Biến đổi con trỏ thành một bàn tay khi di chuyển qua nút */
    }
  </style>
  <style>
    .center-button {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 10vh;
    }

    .circle-container {
      width: 50px;
      /* Điều này sẽ tạo ra một chiều rộng cụ thể */
      margin: 0 auto;
      /* Để căn giữa phần tử theo chiều ngang */
    }

    .circle {
      width: 50px;
      height: 50px;
      background-color: #3498db;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 24px;
      text-decoration: none;
    }

    .circle:hover {
      background-color: #2980b9;
    }
  </style>
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
<!-- Messenger Plugin chat Code -->
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


  <section
    class="u-border-2 u-border-black u-border-no-bottom u-border-no-left u-border-no-right u-clearfix u-section-1"
    id="sec-41fa">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div>
        <div class="row">
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'dia_diem');
          if (isset($_GET["search"]) && !empty($_GET["search"])) {
            $key = $_GET["search"];
            $sql = "SELECT * FROM diadiem WHERE id LIKE '%$key%' OR matour LIKE '%$key%' OR tentour LIKE '%$key%'
    OR hinh LIKE '%$key%' OR gia LIKE '%$key%' OR soluong LIKE '%$key%' OR daban LIKE '%$key%' ";
          } else {
            $sql = "SELECT * FROM diadiem";
          }
          $result = mysqli_query($conn, $sql);
          ?>
          <style>
  /* Additional CSS classes for individual items */
  .angiang { background-color: #33FFFF; }
  .baclieu { background-color: #33FFFF; }
  .bentre { background-color: #33FFFF; }
  .camau { background-color: #33FFFF; }
  .cantho { background-color: #33FFFF; }
  .dongthap { background-color: #33FFFF; }
  .haugiang { background-color: #33FFFF; }
  .kiengiang { background-color: #33FFFF; }
  .longan { background-color: #33FFFF; }
  .soctrang { background-color: #33FFFF; }
  .tiengiang { background-color: #33FFFF; }
  .travinh { background-color: #33FFFF; }
  .vinhlong { background-color: #33FFFF; }
  .unknown { background-color: #33FFFF; }

  /* Other CSS styles (your existing styles) */
  .grid-container {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
  }
  .grid-item {
    border: 2px solid #333;
    padding: 2px;
    text-align: center;
  }
  .grid-item a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    font-size: 16px;
  }
</style>

<style>
    .changing-background {
      animation: changeBackground 10s infinite;
    }


    @keyframes changeBackground {
      0% { background-color: #98FF98; } /* Light salmon */
      7% { background-color: #98FF98; } /* Pale green */
      14% { background-color: #98FF98; } /* Sky blue */
      21% { background-color: #98FF98; } /* Pastel pink */
      28% { background-color: #98FF98; } /* Pastel yellow */
      35% { background-color: #98FF98; } /* Pale turquoise */
      42% { background-color: #98FF98; } /* Pastel orange */
      49% { background-color: #98FF98; } /* Aquamarine */
      56% { background-color: #98FF98; } /* Lavender */
      63% { background-color: #98FF98; } /* Mint green */
      70% { background-color: #98FF98; } /* Tomato */
      77% { background-color: #98FF98; } /* Powder blue */
      84% { background-color: #98FF98; } /* Peach puff */
      91% { background-color: #98FF98; } /* Light gray */
      100% { background-color: #98FF98; } /* Light salmon */
    }
  </style>
</br>
 

  <script>
    // JavaScript to update background color
    function changeBackground() {
      const div = document.querySelector('.changing-background');
      const colors = ['#FF5733', '#33FF57', '#3366FF', '#FF33CC', '#FFFF33']; // Add more colors if needed

      let index = 0;
      setInterval(() => {
        div.style.backgroundColor = colors[index];
        index = (index + 1) % colors.length;
      }, 3000); // Change color every 3 seconds (3000 milliseconds)
    }

    changeBackground(); // Call the function to start changing the background
  </script>
  </br>
  <div class="grid-container">
    <div class="grid-item angiang">
      <a href="angiang.php">An Giang</a>
    </div>
    <div class="grid-item baclieu">
      <a href="baclieu.php">Bạc Liêu</a>
    </div>
    <div class="grid-item bentre">
      <a href="bentre.php">Bến Tre</a>
    </div>
    <div class="grid-item camau">
      <a href="camau.php">Cà Mau</a>
    </div>
    <div class="grid-item cantho">
      <a href="cantho.php">Cần Thơ</a>
    </div>
    <div class="grid-item dongthap">
      <a href="dongthap.php">Đồng Tháp</a>
    </div>
    <div class="grid-item haugiang">
      <a href="haugiang.php">Hậu Giang</a>
    </div>
    <div class="grid-item kiengiang">
      <a href="kiengiang.php">Kiên Giang</a>
    </div>
    <div class="grid-item longan">
      <a href="longan.php">Long An</a>
    </div>
    <div class="grid-item soctrang">
      <a href="soctrang.php">Sóc Trăng</a>
    </div>
    <div class="grid-item tiengiang">
      <a href="tiengiang.php">Tiền Giang</a>
    </div>
    <div class="grid-item travinh">
      <a href="travinh.php">Trà Vinh</a>
    </div>
    <div class="grid-item vinhlong">
      <a href="vinhlong.php">Vĩnh Long</a>
    </div>
    <div class="grid-item unknown">
      <a href="#">❤️❤️❤️❤️❤️</a>
    </div>
  </div>
</body>

          </br>
          <style>
  /* CSS for the search table */
  table {
    border-collapse: collapse;
    width: 100%;
  }

  table,
  th,
  td {
    border: 1px solid #ebe3e3;
  }

  th,
  td {
    padding: 5px;
    background-color: #ffffff;
  }

  label {
    font-weight: bold;
  }

  select,
  input[type="text"] {
    width: fit-content; /* Adjusting width with 12px less to accommodate padding and border */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #0056b3;
  }
</style>
<form action="search.php" method="get">
  <table>
    <tr>
      <td>
        <label for="location">Địa điểm: </label>
        <select name="kv" id="location">
          <option value="">Chọn địa điểm</option>
          <option value="An Giang">An Giang</option>
          <option value="Bạc Liêu">Bạc Liêu</option>
          <option value="Bến Tre">Bến Tre</option>
          <option value="Cà Mau">Cà Mau</option>
          <option value="Cần Thơ">Cần Thơ</option>
          <option value="Đồng Tháp">Đồng Tháp</option>
          <option value="Hậu Giang">Hậu Giang</option>
          <option value="Kiên Giang">Kiên Giang</option>
          <option value="Long An">Long An</option>
          <option value="Sóc Trăng">Sóc Trăng</option>
          <option value="Tiền Giang">Tiền Giang</option>
          <option value="Trà Vinh">Trà Vinh</option>
          <option value="Vĩnh Long">Vĩnh Long</option>
        
        </select>
      </td>
      <th>
        <td>
        <label for="price_range">Giá thấp nhất</label>
          <select name="gia_min" id="price_min">
            <option value="">Chọn giá thấp nhất</option>
            <option value="50000">50,000 VND</option>
            <option value="100000">100,000 VND</option>
            <option value="200000">200,000 VND</option>
            <option value="300000">300,000 VND</option>
            <option value="400000">400,000 VND</option>
            <option value="500000">500,000 VND</option>
            <option value="600000">600,000 VND</option>
            <option value="700000">700,000 VND</option>
            <option value="800000">800,000 VND</option>
            <option value="900000">900,000 VND</option>
            <!-- Add more predefined options -->
          </select>
        </td>
        <td>
        <label for="price_range">Giá cao nhất</label>
          <select name="gia_max" id="price_max">
            <option value="">Chọn giá cao nhất</option>
            <option value="100000">100,000 VND</option>
            <option value="200000">200,000 VND</option>
            <option value="300000">300,000 VND</option>
            <option value="400000">400,000 VND</option>
            <option value="500000">500,000 VND</option>
            <option value="600000">600,000 VND</option>
            <option value="700000">700,000 VND</option>
            <option value="800000">800,000 VND</option>
            <option value="900000">900,000 VND</option>
            <!-- Add more predefined options -->
          </select>
        </td>
        <td>
        <label for="discount">Giảm giá:</label>
        <select name="giamgia" id="discount">
          <option value="">Chọn mức giảm giá</option>
          <option value="0">Không giảm giá</option>
          <option value="5">Dưới 5%</option>
          <option value="10">Dưới 10%</option>
          <option value="20">Dưới 20%</option>
          <option value="30">Dưới 30%</option>
          <option value="50">Dưới 50%</option>
          <option value="100">Dưới 100%</option>
          <!-- Add other discount options -->
        </select>
        </td>
      </th>
      <th>
      <style>
    /* Định dạng nút tìm kiếm */
    .search-button {
        background: none; /* Nền trong suốt */
        border: none; /* Không có viền */
        cursor: pointer; /* Con trỏ khi rê chuột */
    }

    /* Thay đổi màu của icon tìm kiếm */
    .search-icon {
        color: black; /* Màu đen */
    }
</style>

<!-- Nút với biểu tượng tìm kiếm từ Font Awesome -->
<button type="submit" class="search-button">
    <i class="fas fa-search search-icon" style="font-size: 25px;"></i>
</button>

      </th>
    </tr>
  </table>
</form>


  </br>
            </div>
            <h1 style="margin-top: 0; color: #000;font-size: 20px; font-weight: bold;">CÁC TOUR ĐƯỢC YÊU THÍCH HIỆN NAY ❤️</h1>

            <div class="row">
              <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "dia_diem";

              // Tạo kết nối
              $conn = new mysqli($servername, $username, $password, $dbname);

              // Kiểm tra kết nối
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              else {
                // Nếu không có giá trị "kv" được cung cấp, hiển thị tất cả dữ liệu.
                $sql ="SELECT DISTINCT  diadiem.id, diadiem.matour, diadiem.tentour, diadiem.hinh, diadiem.gia, diadiem.ngaybd, diadiem.ngaykt, diadiem.giamgia, diadiem.thoigian, diadiem.daban
                FROM diadiem
                WHERE daban > 1
                ORDER BY daban DESC
            LIMIT 4;";
              }
              $result = mysqli_query($conn, $sql);

              echo '<div class="tour-container">';
              if ($result->num_rows > 0) {
                while ($tourRow = mysqli_fetch_assoc($result)) {
                  $giamgia = $tourRow['giamgia'];

                  echo '<div class="tour">';
                  echo '<form action="cart.php" method="post">';
                  echo '<a href="placeInfo.php?id=' . $tourRow['id'] . '">';
                  if ($giamgia > 0) {
                    echo '<div class="discount-label">';
                    echo '<span class="discount-value">' . $giamgia . '%</span>';
                    echo '</div>';
                  }
                  echo '<img src="' . $tourRow['hinh'] . '" alt="' . $tourRow['tentour'] . '">';
                  echo '</a>';
                  echo '<div class="tour-info">';
                  echo '<p class="tour-name"><a href="placeInfo.php?id=' . $tourRow['id'] . '">' . $tourRow['tentour'] . '</a></p>';
                  echo '<p class="thoigian"><i class="fa fa-clock-o"></i> Thời gian: ' . $tourRow['thoigian'] . '</p>';
                  // Hiển thị ngày khởi hành trong định dạng "dd/mm/yyyy"
                  echo '<p class="thoigian"><i class="fa fa-calendar" aria-hidden="true"></i> Khởi hành: ' . $tourRow['ngaybd'] . '</p>';

                  echo '<p class="gia"><i class="fa fa-money" aria-hidden="true"></i> Giá: <span>' . number_format($tourRow['gia'], 0, '.', '.') . '</span> VNĐ</p>';
                  echo '<input type="hidden" name="gia" value="' . $tourRow['gia'] . '">';
                  echo '<input type="hidden" name="giamgia" value="' . $tourRow['giamgia'] . '">';
                  echo '<input type="hidden" name="hinh" value="' . $tourRow['hinh'] . '">';
                  echo '<input type="hidden" name="ngaybd" value="' . $tourRow['ngaybd'] . '">';
                  echo '<input type="hidden" name="ngaykt" value="' . $tourRow['ngaykt'] . '">';
                  echo '</form>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "Không tìm thấy kết quả phù hợp!";
              }
              ?>
        </div>
      
            </br>
            <h1 style="margin-top: 0; color: #000; font-size: 20px; font-weight: bold;">CÁC TOUR MỚI NHẤT  HIỆN NAY <span style="color: yellow; font-size: 30px;">★</span></h1>

            <div class="row">
              <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "dia_diem";

              // Tạo kết nối
              $conn = new mysqli($servername, $username, $password, $dbname);

              // Kiểm tra kết nối
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              else {
                // Nếu không có giá trị "kv" được cung cấp, hiển thị tất cả dữ liệu.
                $sql = "SELECT DISTINCT diadiem.id, diadiem.matour, diadiem.tentour, diadiem.hinh, diadiem.gia, diadiem.ngaybd, diadiem.ngaykt, diadiem.giamgia, diadiem.thoigian, diadiem.daban
                FROM diadiem
                ORDER BY id DESC
                LIMIT 4;";
    }

              $result = mysqli_query($conn, $sql);

              echo '<div class="tour-container">';
              if ($result->num_rows > 0) {
                while ($tourRow = mysqli_fetch_assoc($result)) {
                  $giamgia = $tourRow['giamgia'];

                  echo '<div class="tour">';
                  echo '<form action="cart.php" method="post">';
                  echo '<a href="placeInfo.php?id=' . $tourRow['id'] . '">';
                  if ($giamgia > 0) {
                    echo '<div class="discount-label">';
                    echo '<span class="discount-value">' . $giamgia . '%</span>';
                    echo '</div>';
                  }
                  echo '<img src="' . $tourRow['hinh'] . '" alt="' . $tourRow['tentour'] . '">';
                  echo '</a>';
                  echo '<div class="tour-info">';
                  echo '<p class="tour-name"><a href="placeInfo.php?id=' . $tourRow['id'] . '">' . $tourRow['tentour'] . '</a></p>';
                  echo '<p class="thoigian"><i class="fa fa-clock-o"></i> Thời gian: ' . $tourRow['thoigian'] . '</p>';
                  echo '<p class="thoigian"><i class="fa fa-calendar" aria-hidden="true"></i> Khởi hành: ' . $tourRow['ngaybd'] . '</p>';

                  echo '<p class="gia"><i class="fa fa-money" aria-hidden="true"></i> Giá: <span>' . number_format($tourRow['gia'], 0, '.', '.') . '</span> VNĐ</p>';
                  echo '<input type="hidden" name="gia" value="' . $tourRow['gia'] . '">';
                  echo '<input type="hidden" name="giamgia" value="' . $tourRow['giamgia'] . '">';
                  echo '<input type="hidden" name="hinh" value="' . $tourRow['hinh'] . '">';
                  echo '<input type="hidden" name="ngaybd" value="' . $tourRow['ngaybd'] . '">';
                  echo '<input type="hidden" name="ngaykt" value="' . $tourRow['ngaykt'] . '">';
                  echo '</form>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "Không tìm thấy kết quả phù hợp!s";
              }
              ?>

        </div>
       

            </br>
           

            <style>
              .tour-container {
                display: flex;
                flex-wrap: wrap;
              }

              .tour {
                position: relative;
                border: 1px solid #ccc;
                width: 265px;
                height: 400px;
                margin: 10px;
                padding: 10px;
                display: inline-block;
                box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
                transition: box-shadow 0.3s ease-in-out;
                overflow: hidden;
                background-color: #fff;
              }

              .tour:hover {
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
              }

              .tour img {
                width: 100%;
                height: 200px;
              }

              .tour .tour-info {
                padding: 10px;
              }

              .tour .discount-label {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: #ff0000;
                color: white;
                padding: 5px;
                border-radius: 5px;
                font-weight: bold;
              }

              .tour .discount-value {
                font-weight: normal;
              }

              .tour .tour-name {
                text-align: left;
                font-weight: bold;
              }

              .tour p {
                margin: 5px 0;
              }

              .tour p.thoigian {
                text-align: left;
              }

              .tour p.gia {
                text-align: left;
              }

              .thoigian input[type="number"] {
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 5px 10px;
                font-size: 14px;
                width: 50px;
              }
            </style>


            <div class="row">
            <p style="font-size: 30px; font-weight: bold; text-align: center;">DANH SÁCH CÁC TOUR DU LỊCH</p>
              <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "dia_diem";

              // Tạo kết nối
              $conn = new mysqli($servername, $username, $password, $dbname);

              // Kiểm tra kết nối
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              if (isset($_GET["kv"])) {
                $kv = $_GET["kv"];
                $sql = "SELECT * FROM diadiem WHERE kv LIKE '%$kv%'";

                if (isset($_GET["gia_min"]) && $_GET["gia_min"] !== "") {
                  $gia_min = $_GET["gia_min"];
                  $sql .= " AND gia >= $gia_min";
                }

                if (isset($_GET["gia_max"]) && $_GET["gia_max"] !== "") {
                  $gia_max = $_GET["gia_max"];
                  $sql .= " AND gia <= $gia_max";
                }

                if (isset($_GET["giamgia"]) && $_GET["giamgia"] !== "") {
                  $giamgia = $_GET["giamgia"];
                  // Adjust the following SQL query according to your database structure and how you store discounts
                  $sql .= " AND giamgia > 0 AND giamgia <= $giamgia"; // For example, to find discounts greater than or equal to the selected value
              }
          } else {
              // Nếu không có giá trị "kv" được cung cấp, hiển thị tất cả dữ liệu.
              $sql = "SELECT * FROM diadiem";
          }



              $result = mysqli_query($conn, $sql);

              echo '<div class="tour-container">';
              if ($result->num_rows > 0) {
                while ($tourRow = mysqli_fetch_assoc($result)) {
                  $giamgia = $tourRow['giamgia'];

                  echo '<div class="tour">';
                  echo '<form action="cart.php" method="post">';
                  echo '<a href="placeInfo.php?id=' . $tourRow['id'] . '">';
                  if ($giamgia > 0) {
                    echo '<div class="discount-label">';
                    echo '<span class="discount-value">' . $giamgia . '%</span>';
                    echo '</div>';
                  }
                  echo '<img src="' . $tourRow['hinh'] . '" alt="' . $tourRow['tentour'] . '">';
                  echo '</a>';
                  echo '<div class="tour-info">';
                  echo '<p class="tour-name"><a href="placeInfo.php?id=' . $tourRow['id'] . '">' . $tourRow['tentour'] . '</a></p>';
                  echo '<p class="thoigian"><i class="fa fa-clock-o"></i> Thời gian: ' . $tourRow['thoigian'] . '</p>';
                  echo '<p class="thoigian"><i class="fa fa-calendar" aria-hidden="true"></i> Khởi hành: ' . $tourRow['ngaybd'] . '</p>';

                  echo '<p class="gia"><i class="fa fa-money" aria-hidden="true"></i> Giá: <span>' . number_format($tourRow['gia'], 0, '.', '.') . '</span> VNĐ</p>';
                  echo '<input type="hidden" name="gia" value="' . $tourRow['gia'] . '">';
                  echo '<input type="hidden" name="giamgia" value="' . $tourRow['giamgia'] . '">';
                  echo '<input type="hidden" name="hinh" value="' . $tourRow['hinh'] . '">';
                  echo '<input type="hidden" name="ngaybd" value="' . $tourRow['ngaybd'] . '">';
                  echo '<input type="hidden" name="ngaykt" value="' . $tourRow['ngaykt'] . '">';
                  echo '</form>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "Không tìm thấy kết quả phù hợp!";
              }
              ?>

            </div>

        </div>

      </div>

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