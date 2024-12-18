<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "dbcsmt";


$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}

// echo "Kết nối thành công";


?>
