<?php
session_start();
$id_d = $_GET['id'];

$dbo = new PDO('mysql:host=localhost;dbname=dia_diem', 'root');
$count = $dbo->prepare("select * from diadiem dd join mota mt on dd.id = mt.id_dd where dd.id=:id_d and mt.id_dd=:id_d ");
$count->bindParam(":id_d", $id_d, PDO::PARAM_INT, 3);

if ($count->execute()) {
  $row = $count->fetch(PDO::FETCH_OBJ);
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
  <link href="images/logo.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 4.21.12, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

  <script src="jquery.min.js"></script>
  <script type="application/ld+json">
  {
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": ""
  }
</script>
  <style>
    /* Định dạng phần tử chứa bình luận */
    .comment-container {
      border: 1px solid #e0e0e0;
      background-color: #f8f8f8;
      margin-bottom: 20px;
      padding: 20px;
      border-radius: 5px;
    }

    /* Định dạng tên người dùng */
    .comment-username {
      font-weight: bold;
      font-size: 16px;
      color: #333;
    }

    /* Định dạng ngày và giờ của bình luận */
    .comment-date {
      font-size: 12px;
      color: #888;
    }

    /* Định dạng nội dung bình luận */
    .comment-text {
      margin-top: 10px;
      font-size: 14px;
      line-height: 1.5;
      color: #555;
    }

    /* Định dạng đánh giá */
    .comment-rating {
      color: #f39c12;
    }

    /* Định dạng biểu tượng ngôi sao */
    .star {
      color: #f39c12;
      font-size: 18px;
      vertical-align: middle;
    }

    /* Định dạng hình ảnh trong bình luận */
    .comment-image {
      max-width: 100%;
      height: auto;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    /* Định dạng khi chưa có bình luận nào */
    .no-comment {
      font-style: italic;
      color: #888;
    }
  </style>
  <style>
    /* Định dạng cho khung bình luận và đánh giá */
    #comment-section {
      background-color: #f0f0f0;
      padding: 20px;
      border-radius: 5px;
      margin-top: 20px;
    }

    /* Định dạng cho ngôi sao đánh giá */
    .stars {
      display: inline-block;
    }

    input.star {
      display: none;
    }

    label.star {
      float: right;
      padding: 5px;
      font-size: 20px;
      color: #444;
      transition: all .2s;
    }

    input.star:checked~label.star:before {
      content: '\f005';
      color: #FD4;
      transition: all .25s;
    }

    input.star-5:checked~label.star:before {
      color: #FE7;
      text-shadow: 0 0 20px rgba(255, 0, 0, .5);
    }

    input.star-1:checked~label.star:before {
      color: #F62;
    }

    label.star:hover {
      transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
      content: '\f006';
      font-family: FontAwesome;
    }

    /* Định dạng cho ô nhập bình luận */
    #comment {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    /* Định dạng cho nút Gửi bình luận */
    input[type="submit"] {
      background-color: #337ab7;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    /* Định dạng cho danh sách bình luận */
    #comment-list {
      margin-top: 20px;
    }

    /* Định dạng cho từng bình luận */
    .comment {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
    }

    /* Định dạng cho thông tin người dùng */
    .comment-user {
      font-weight: bold;
    }

    /* Định dạng cho ngày và giờ */
    .comment-date {
      color: #888;
    }

    /* Định dạng cho điểm đánh giá */
    .comment-rating {
      color: #FD4;
    }
  </style>

  <style>
    div.stars {
      width: 270px;
      display: inline-block;
    }

    input.star {
      display: none;
    }

    label.star {
      float: right;
      padding: 10px;
      font-size: 20px;
      color: #444;
      transition: all .2s;
    }

    input.star:checked~label.star:before {
      content: '\f005';
      color: #FD4;
      transition: all .25s;
    }

    input.star-5:checked~label.star:before {
      color: #FE7;
      text-shadow: 0 0 20px #952;
    }

    input.star-1:checked~label.star:before {
      color: #F62;
    }

    label.star:hover {
      transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
      content: '\f006';
      font-family: FontAwesome;
    }
  </style>

  <script>
    var map, directionsManager;

    function GetMap() {
      map = new Microsoft.Maps.Map('#myMap', {});

      //Load the directions module.
      Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
        //Create an instance of the directions manager.
        directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);

        //Specify where to display the route instructions.
        directionsManager.setRenderOptions({ itineraryContainer: '#directionsItinerary' });

        //Specify the where to display the input panel
        directionsManager.showInputPanel('directionsPanel');
      });
    }

    function GetDirections() {
      // Clear any previously calculated directions.
      directionsManager.clearAll();
      directionsManager.clearDisplay();

      // Create waypoints to route between.
      var start = new Microsoft.Maps.Directions.Waypoint({ address: document.getElementById('fromTbx').value });
      directionsManager.addWaypoint(start);

      var end = new Microsoft.Maps.Directions.Waypoint({ address: document.getElementById('toTbx').value });
      directionsManager.addWaypoint(end);

      // Calculate directions.
      directionsManager.calculateDirections({
        success: function (directions) {
          // Get the route summary - this includes distance and time information.
          var routeSummary = directions.summary;

          // Extract distance and time information.
          var distance = routeSummary.distance;
          var time = routeSummary.time;

          // Display distance and time in an element on the page.
          document.getElementById('distanceInfo').innerText = 'Distance: ' + distance + ' km';
          document.getElementById('timeInfo').innerText = 'Time: ' + time + ' mins';
        },
        error: function (error) {
          // Handle error scenario, if any.
          console.log('Error calculating directions: ' + error);
        }
      });
    }

  </script>

  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $('.button').on('click', function (e) {
        e.preventDefault();
        var user_id = $(this).attr('user_id'); // Get the parameter user_id from the button
        var id_dd = $(this).attr('id_dd'); // Get the parameter id_dd from the button
        var method = $(this).attr('method');  // Get the parameter method from the button
        if (method == "Like") {
          $(this).attr('method', 'Unlike') // Change the div method attribute to Unlike
          $('#' + id_dd).replaceWith('<img class="favicon" id="' + id_dd + '" src="like.png">') // Replace the image with the liked button
        } else {
          $(this).attr('method', 'Like')
          $('#' + id_dd).replaceWith('<img class="favicon" id="' + id_dd + '" src="unlike.png">')
        }
        $.ajax({
          url: 'favs.php', // Call favorite.php to update the database
          type: 'GET',
          data: { user_id: user_id, id_dd: id_dd, method: method },
          cache: false,
          success: function (data) {
          }
        });
      });
    });
  </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="placeInfo">
  <meta property="og:type" content="website">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">



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
    window.fbAsyncInit = function () {
      FB.init({
        xfbml: true,
        version: 'v18.0'
      });
    };

    (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

  <section
    class="u-border-2 u-border-black u-border-no-bottom u-border-no-left u-border-no-right u-clearfix u-section-1"
    id="sec-55b8">
    </br>
    <style>
      /* CSS cho phần trái (20%) */
      .left-panel {
        width: 20%;
        background-color: #f2f2f2;
        float: left;
        /* Đẩy phần trái sang trái */
        box-sizing: border-box;
        /* Đảm bảo độ dày của đường viền được tính vào kích thước */
        margin-right: 3%;
        /* Thêm khoảng cách bên trái của phần phải */
        margin-left: 1%;
        /* Thêm khoảng cách bên trái của phần phải */
      }

      /* CSS cho phần phải (75%) */
      .right-panel {
        width: 20;
        background-color: none;
        float: right;
        /* Đẩy phần phải sang phải */
        box-sizing: border-box;
        margin-right: 10%;
        /* Thêm khoảng cách bên trái của phần phải */
        margin-left: 3%;
        margin-top: 5%; //* Thêm khoảng cách bên trái của phần phải */
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        /* Tạo khoảng cách giữa các dòng */
      }
    </style>
    <style>
      .tour1 {
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #fff;
        padding: 20px;
        margin: 10px;
        max-width: 500px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .tour1 a {
        text-decoration: none;
      }

      .tour-info1 {
        text-align: center;
      }

      .tentour1 {
        font-size: 24px;
        color: #007BFF;
        margin: 10px 0;
      }

      .thoigian1 {
        display: flex;
        align-items: center;
        margin: 5px 0;
      }

      .thoigian1 i {
        margin-right: 10px;
      }

      .thoigian1 span {
        color: #333;
      }

      .order-button1 {
        margin-top: 10px;
      }

      input[type="number"] {
        width: 60px;
        height: 30px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
      }

      input[type="submit"]:hover {
        background-color: #0056b3;
      }
    </style>

    <style>
      .container {
        display: flex;
        justify-content: space-between;
      }

      .left-panel {
        width: 80%;
        padding: 20px;
        box-sizing: border-box;
      }

      .right {

        background-color: #f9f9f9;
        padding: 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .boxtitle {
        font-weight: bold;
        margin-bottom: 10px;
        text-align: center;
      }

      .right-panel ul {
        padding: 0;
        list-style: none;
        text-align: center;
      }

      .right-panel ul li {
        color: black;
        /* Set text color to black */
        position: relative;
        margin-bottom: 8px;
      }

      .right-panel ul li:not(:last-child)::after {
        content: "";
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        border-bottom: 1px solid #ccc;
      }
    </style>
    <div class="right-panel">

      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "dia_diem";

      // Tạo kết nối
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Kiểm tra kết nối
      if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
      }

      // Lấy ID địa điểm từ URL
      $placeId = isset($_GET['id']) ? intval($_GET['id']) : 0;

      if ($placeId > 0) {
        // Truy vấn thông tin cho địa điểm cụ thể
        $stmt = $conn->prepare("SELECT id, tentour, hinh, gia, ngaybd, ngaykt, thoigian, giamgia FROM diadiem WHERE id = ?");
        $stmt->bind_param("i", $placeId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          while ($tourRow = $result->fetch_assoc()) {
            echo '<div class="tour1">';
            echo '<form action="cart.php" method="post">';
            echo '<a href="placeInfo.php?id=' . $tourRow['id'] . '">';
            echo '</a>';
            echo '<div class="tour-info1">';
            echo '<p style="font-size: 24px; background-color: #007BFF;"><strong style="color: #f3f20a;">Đặt tour ngay tại đây!</strong></p>';
            echo '<p style="font-size: 18px; font-weight: bold; text-align: center;">' . $tourRow['tentour'] . '</p>';
            echo '<p class="thoigian1"><i class="fa fa-clock-o"></i> Thời gian: ' . $tourRow['thoigian'] . '</p>';
            echo '<p class="thoigian1"><i class="fa fa-calendar" aria-hidden="true"></i> Khởi hành: ' . $tourRow['ngaybd'] . '</p>';

            echo '<p class="thoigian1"><i class="fa fa-money"></i>Giá: ' . number_format($tourRow['gia'], 0, '.', '.') . 'VNĐ</p>';

            if ($tourRow['giamgia'] > 0) {
              echo '<p class="thoigian1"><i class="fa-solid fa-gift"></i>  Giảm giá: ' . $tourRow['giamgia'] . '%</p>';
            }

            echo '<p class="thoigian1"><i class="fa fa-user-plus"></i> Số lượng: <input type="number" name="soluong" class="quantity-input" min="0" max="100" value="1">';
            echo '<input type="hidden" name="tentour" value="' . $tourRow['tentour'] . '">';
            echo '<input type="hidden" name="gia" value="' . $tourRow['gia'] . '">';
            echo '<input type="hidden" name="giamgia" value="' . $tourRow['giamgia'] . '">';
            echo '<input type="hidden" name="hinh" value="' . $tourRow['hinh'] . '">';
            echo '<input type="hidden" name="ngaybd" value="' . $tourRow['ngaybd'] . '">';

            echo '</form>';
            echo '<input type="submit" name="addcart" value="Đặt tour">';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo "Không tìm thấy kết quả";
        }

        $stmt->close();
      } else {
        echo "ID địa điểm không hợp lệ";
      }

      mysqli_close($conn);
      ?>
      <div class="right">
        <div class="boxtitle">DANH MỤC ĐỊA ĐIỂM</div>
        <ul>
          <li><a href="angiang.php">An Giang</a></li>
          <li><a href="baclieu.php">Bạc Liêu</a></li>
          <li><a href="bentre.php">Bến Tre</a></li>
          <li><a href="camau.php">Cà Mau</a></li>
          <li><a href="cantho.php">Cần Thơ</a></li>
          <li><a href="dongthap.php">Đồng Tháp</a></li>
          <li><a href="haugiang.php">Hậu Giang</a></li>
          <li><a href="kiengiang.php">Kiên Giang</a></li>
          <li><a href="longan.php">Long An</a></li>
          <li><a href="soctrang.php">Sóc Trăng</a></li>
          <li><a href="tiengiang.php">Tiền Giang</a></li>
          <li><a href="travinh.php">Trà Vinh</a></li>
          <li><a href="vinhlong.php">Vĩnh Long</a></li>
        </ul>
      </div>

    </div>


    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-clearfix u-group u-group-1">
        <!-- Cột trái chứa thông tin chi tiết -->
        <div class="u-container-style u-group-item u-left-column">
          <div class="fr-view u-clearfix u-rich-text u-text u-text-1">
            <h5 style="text-align: left;">
               <h1 style="font-weight: bold; font-size: 26px;"><?php echo $row->title ?></h1>
            </h5>
            <p style="text-align: left;">
              <span style="line-height: 2.0;">
                <?php echo $row->cont ?>
              </span>
            </p>
          </div>
        </div>
        <div class="u-container-style u-group-item u-right-column">

        </div>
      </div>
      <div style="text-align: center;">
        <p style="font-size: 30px; font-weight: bold; text-align: center;">Gợi ý các tour gần nhất!</p>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dia_diem";

        // Tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
          die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Lấy ID địa điểm từ URL
        $placeId = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($placeId > 0) {
          $stmt = $conn->prepare("SELECT id, tentour, hinh, gia, ngaybd, ngaykt, thoigian, giamgia, kv FROM diadiem WHERE kv IN (SELECT kv FROM diadiem WHERE id = ?) AND id != ?");
          $stmt->bind_param("ii", $placeId, $placeId);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
            while ($tourRow = $result->fetch_assoc()) {
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
            echo "Không tìm thấy kết quả";
          }

          $stmt->close();
        } else {
          echo "ID địa điểm không hợp lệ";
        }

        mysqli_close($conn);
        ?>
      </div>


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
      <p style="font-size: 40px; font-weight: bold; text-align: center;  font-family: 'Times New Roman', serif;">Bình
        luận & Đánh giá</p>

        <?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dia_diem";

// Establishing a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo '<p><a href="login_page.php">Đăng nhập</a> ngay để có thể bình luận.</p>';
} else {
    // Get the username
    $username = $_SESSION["username"];

    // Query to get the user_id
    $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
    $row_fv = $result->fetch_assoc();
    $user_id = $row_fv['user_id'];

    // Query to Get the Director ID
    $result = $conn->query("SELECT * FROM diadiem WHERE id = '$id_d'");
    $row_fv = $result->fetch_assoc();
    $id_dd = $row_fv['id'];

    // Check if form is submitted and handle optional comment and rating
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        // Check if the rating is set, if not, set it to NULL
        $rating = isset($_POST["rating"]) ? $_POST["rating"] : null;

        // Check if the comment is set, if not, set it to NULL
        $comment = isset($_POST["comment"]) ? $_POST["comment"] : null;

        // Set the timezone
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_time = date("Y-m-d H:i:s");

        // Check if image is uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Read the image file into binary data
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_data = file_get_contents($image_tmp);

            // Insert comment with image into the database
            $stmt = $conn->prepare("INSERT INTO comments (user_id, id_dd, comment, image_data, rating, created_at) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iissis", $user_id, $id_dd, $comment, $image_data, $rating, $current_time);

            if ($stmt->execute()) {
                echo "";
            } else {
                echo "Lỗi: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Insert comment without image into the database
            $stmt = $conn->prepare("INSERT INTO comments (user_id, id_dd, comment, rating, created_at) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iisis", $user_id, $id_dd, $comment, $rating, $current_time);

            if ($stmt->execute()) {
                echo "";
            } else {
                echo "Lỗi: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    // Set the timezone
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    // Truy vấn cơ sở dữ liệu để lấy thông tin về bình luận và người dùng
    $sql = "SELECT comments.comment, comments.rating, MAX(comments.created_at) AS max_created_at, users.username FROM comments
            INNER JOIN users ON comments.user_id = users.user_id
            WHERE comments.id_dd = '$id_dd' AND comments.xacnhan='Hợp lí'
            GROUP BY comments.comment, comments.rating, users.username
            ORDER BY max_created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $comment_text = $row['comment'];
        $rating = $row['rating'];
        $comment_date = date("Y-m-d H:i:s", strtotime($row['max_created_at']));
    
        // Đặt lớp CSS cho các phần tử HTML trong vòng lặp
        echo "<div class='comment'>";
    
        // Check if the rating is null
        if ($rating === null) {
            echo "<p><strong class='comment-username'>$username:</strong></p>";
        } else {
            echo "<p><strong class='comment-username'>$username:</strong> Điểm đánh giá: <span class='comment-rating'>$rating <i class='fa fa-star' style='color: yellow;'></i></span></p>";
        }
    
        echo "<p class='comment-text'>$comment_text</p>";
        echo "<p class='comment-date'>$comment_date</p>";
        echo "</div>";
    }
    
    } else {
        echo "<p class='no-comment'>Chưa có bình luận nào.</p>";
    }

    // Truy vấn cơ sở dữ liệu để tính điểm đánh giá trung bình
    $sql = "SELECT AVG(rating) AS avg_rating FROM (
      SELECT DISTINCT user_id, id_dd, comment, rating, image_data, created_at
      FROM comments
      WHERE id_dd = '$id_dd'
  ) AS unique_comments";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $average_rating = number_format($row['avg_rating'], 1);

    echo "<p>Điểm đánh giá trung bình: $average_rating <i class='fa fa-star' style='color: yellow;'></i></p>";
}

// ... (your existing code for other parts of the page)

// Close the database connection
$conn->close();
?>

      <!-- Biểu mẫu để người dùng nhập bình luận, điểm đánh giá và tải lên ảnh -->
      <form action="" method="POST" enctype="multipart/form-data">
        <!-- Thêm hình ảnh ngôi sao cho việc đánh giá -->
        <label for="rating"></label>
        <!-- Đoạn mã HTML -->
        <!-- Đoạn mã HTML để hiển thị bình luận và đánh giá -->
        <div id="comment-section">
          <h2>Đánh giá tại đây!</h2>
          <!-- Biểu mẫu để người dùng nhập bình luận, điểm đánh giá và tải lên ảnh -->
          <form action="" method="POST" enctype="multipart/form-data">
            <!-- Thêm hình ảnh ngôi sao cho việc đánh giá -->
            <div class="stars">
              <form action="">
                <input class="star star-5" id="star-5" type="radio" name="rating" value="5" />
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="rating" value="4" />
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="rating" value="3" />
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="rating" value="2" />
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="rating" value="1" />
                <label class="star star-1" for="star-1"></label>
              </form>
            </div>
            <br>
            <label for="comment">Bình luận:</label><br>
            <textarea id="comment" name="comment" rows="5" cols="100" required></textarea><br><br>

            <input type="submit" name="submit" value="Gửi bình luận">
          </form>

          <!-- Danh sách bình luận -->
          <div id="comment-list">
            <?php
            // Loop qua từng bình luận và hiển thị
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $username = $row['username'];
                $comment_text = $row['comment'];
                $rating = $row['rating'];
                $comment_date = date(" H:i:s Y-m-d", strtotime($row['max_created_at']));

                echo "<div class='comment'>";
                echo "<span class='comment-user'>$username</span> - ";
                echo "$comment_text<br>";
                echo "<span class='comment-rating'>$rating <i class='fa fa-star' style='color: yellow;'></i></span><br>";
                echo "<span class='comment-date'>$comment_date</span>";
                echo "</div>";
              }
            } else {
              echo "Chưa có bình luận nào.";
            }
            ?>
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
<section
  class="u-align-center u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-dialog-section-4"
  id="sec-b7fb">
  <div
    class="u-align-center-lg u-align-center-md u-align-center-xl u-border-2 u-border-palette-2-base u-container-style u-dialog u-grey-10 u-radius-4 u-shape-round u-dialog-1">
    <div class="u-container-layout u-container-layout-1">
      <div class="u-clearfix u-custom-html u-custom-html-1">
        <style></style>

        <div style="margin-top:10px;">
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "dia_diem";

          // Tạo kết nối
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Kiểm tra kết nối
          if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
          }

          // Lấy ID địa điểm từ URL
          $placeId = isset($_GET['id']) ? intval($_GET['id']) : 0;

          if ($placeId > 0) {
            $stmt = $conn->prepare("SELECT vi_tri FROM diadiem WHERE  id = ?");
            $stmt->bind_param("i", $placeId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
              $row = $result->fetch_object();
              ?>
              <div style="margin-top:10px;">
                <?php
                if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                  echo 'Từ: <input id="fromTbx" type="text" value=""/>';
                } else {
                  echo 'Từ: <input id="fromTbx" type="text" value="' . $_SESSION['dia_chi'] . '"/>';
                }
                ?>
                </br>
                <p> Đến: <input id="toTbx" type="text" value="<?php echo $row->vi_tri; ?>" /></p>
                <input type="button" onclick="GetDirections()" value="XEM" />
              </div>
              <?php
            } else {
              echo "Không tìm thấy địa điểm với ID cung cấp.";
            }
          } else {
            echo "ID địa điểm không hợp lệ.";
          }
          ?>

        </div>
        <div id="myMap" style="position:relative;width:100%;min-width:290px;height:600px;background-color:gray"></div>


        <script>
          // Dynamic load the Bing Maps Key and Script
          // Get your own Bing Maps key at https://www.microsoft.com/maps
          (async () => {
            let script = document.createElement("script");

            script.setAttribute("src", `https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Ao_khQfnhjsgCQPM4aTv6acAI6EJQX404a-TXPaVLOFBRLBAz_Jlx3wThsuw86Vf`);
            document.body.appendChild(script);
          })();
        </script>
      </div>
    </div><button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1"><svg class="u-svg-link"
        preserveAspectRatio="xMidYMin slice" viewBox="0 0 329.26933 329" style="">
        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-ea5c"></use>
      </svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
        xml:space="preserve" class="u-svg-content" viewBox="0 0 329.26933 329" id="svg-ea5c">
        <path
          d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0">
        </path>
      </svg></button>
  </div>
</section>
<style>
  .u-dialog-section-4 {
    min-height: 826px;
  }

  .u-dialog-section-4 .u-dialog-1 {
    width: 1140px;
    min-height: 733px;
    box-shadow: 0 0 14px 0 rgba(0, 0, 0, 0.3);
    height: auto;
    margin: 39px auto 60px;
  }

  .u-dialog-section-4 .u-container-layout-1 {
    padding: 16px 30px;
  }

  .u-dialog-section-4 .u-custom-html-1 {
    height: auto;
    min-height: 696px;
    width: 1076px;
    margin: 1px 0 0;
  }

  .u-dialog-section-4 .u-icon-1 {
    width: 16px;
    height: 16px;
    left: auto;
    top: 17px;
    position: absolute;
    right: 16px;
  }

  @media (max-width: 1199px) {
    .u-dialog-section-4 .u-dialog-1 {
      width: 940px;
    }

    .u-dialog-section-4 .u-custom-html-1 {
      width: 880px;
      margin-left: 0;
      margin-right: 0;
    }
  }

  @media (max-width: 991px) {
    .u-dialog-section-4 .u-dialog-1 {
      width: 720px;
    }

    .u-dialog-section-4 .u-custom-html-1 {
      width: 660px;
    }
  }

  @media (max-width: 767px) {
    .u-dialog-section-4 .u-dialog-1 {
      width: 540px;
    }

    .u-dialog-section-4 .u-custom-html-1 {
      width: 520px;
    }
  }

  @media (max-width: 575px) {
    .u-dialog-section-4 .u-dialog-1 {
      width: 340px;
    }

    .u-dialog-section-4 .u-container-layout-1 {
      padding-left: 20px;
      padding-right: 20px;
    }

    .u-dialog-section-4 .u-custom-html-1 {
      width: 320px;
    }
  }
</style>
</body>

</html>