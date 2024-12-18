<?php
$servername = "localhost: 3308";
$username = "root";
$password = "";
$dbname = "dbcsmt";

//khởi tạo kêt nối
$conn = new mysqli($servername, $username, $password, $dbname);

//kiểm tra kết nối
if ($conn->connect_error){
    die("kết nối thất bại" . $conn->connect_error);
}
?>
