<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM `khachhang` WHERE LOWER(`hoten`) LIKE LOWER('%$search%') OR LOWER(`ngaysinh`) LIKE LOWER('%$search%') OR LOWER(`diachi`) LIKE LOWER('%$search%') OR LOWER(`sodienthoai`) LIKE LOWER('%$search%') OR LOWER(`id_kh`) LIKE LOWER('%$search%')";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra số lượng kết quả
    $numRows = mysqli_num_rows($result);

    if ($numRows == 0) {
        // Không có kết quả, hiển thị thông báo và thực hiện redirect
        echo '<script>alert("Không có dữ liệu cần tìm."); window.location.href = "khachhang.php";</script>';
    }
} else { 
    $sql = "SELECT * FROM `khachhang`";
    $result = mysqli_query($conn, $sql);
}
?>

