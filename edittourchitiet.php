<?php
session_start();
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="...">
    <meta name="description" content="">

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #478ac9;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #306492;
    }

    p.error {
        color: #FF0000;
        margin-bottom: 16px;
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
    <section
        class="u-border-2 u-border-black u-border-no-bottom u-border-no-left u-border-no-right u-clearfix u-section-1">
    </section>

    <section>
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

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Ensure that the user has the permission to edit
$allowedUserTypes = ['admin', 'editor']; // Define user types that can edit
$queryCheckPermission = "SELECT user_type FROM users WHERE user_id = $userId";
$resultPermission = $conn->query($queryCheckPermission);

if ($resultPermission->num_rows == 2) {
    $rowPermission = $resultPermission->fetch_assoc();
    if (!in_array($rowPermission['user_type'], $allowedUserTypes)) {
        // Redirect to unauthorized page or show an error message
        echo "You do not have permission to edit.";
        exit();
    }
}

$status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $cont = $_POST['cont'];
    $id_dd = $_POST['id_dd']; // New line to capture id_dd

    // Use prepared statements to prevent SQL injection
    $updateQuery = $conn->prepare("UPDATE mota SET title=?, cont=?, id_dd=? WHERE id=?");
    $updateQuery->bind_param("ssii", $title, $cont, $id_dd, $id);
    $updateQuery->execute();
    $updateQuery->close();

    // Display success message
    $status = "Cập nhật thành công!</br></br><a href=''></a>";
    echo '<p style="color:#FF0000;">' . $status . '</p>';

    // Redirect to tourchitiet page
    header("Location: tourchitiet.php");
    exit();
}

// Display the form to edit mota information
$id = $_GET['id'];
$query = "SELECT * FROM mota WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<div>
    <!-- Mota Information Editing Form -->
    <form name="form" method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
        <!-- New input field for id_dd -->
        <p><label for="id_dd">ID DD:</label></p>
        <p><input type="text" id="id_dd" name="id_dd" value="<?php echo $row['id_dd']; ?>" /></p>

        <!-- Input fields for editing mota information -->
        <p><label for="title">Tiêu đề:</label></p>
        <p><textarea id="title" name="title" placeholder="Enter content" required rows="2" cols="160%"><?php echo $row['title']; ?></textarea></p>

        <p><label for="cont">Nội dung:</label></p>
        <p><textarea id="cont" name="cont" placeholder="Enter content" required rows="30" cols="160%"><?php echo $row['cont']; ?></textarea></p>

        <p><input name="submit" type="submit" value="Lưu thay đổi!" /></p>
    </form>
</div>
</div>

            </div>
        </div>
    </section>
</body>

</html>