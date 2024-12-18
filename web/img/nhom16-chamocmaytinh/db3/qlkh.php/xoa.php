<?php
include "ketnoi.php";

$id = $_GET["id"];
$sql = "DELETE FROM `khachhang` WHERE id_kh = '$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Dữ liệu đã được xóa thành công");
} else {
  echo "Thất bại: " . mysqli_error($conn);
}
?>
