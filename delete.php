<?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "dia_diem";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                } 
                $id=$_REQUEST['id'];
                $query = "DELETE FROM users WHERE user_id=$id"; 
                $result = mysqli_query($conn,$query) or die ( mysqli_error()); 
                ob_start();
                header("location: thongbao.php");
                exit();
