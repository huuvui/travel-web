<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"
    </head>
    <body>
    <?php
                    $conn =mysqli_connect('localhost', 'root', '','dia_diem');
                    $id = $_GET['id'];
                    $sql = "DELETE FROM diadiem WHERE id = $id"; 
                    mysqli_query($conn, $sql);
                    header('Location: tour.php')
    ?>
    </body>
</html>