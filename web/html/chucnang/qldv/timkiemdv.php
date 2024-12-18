<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM `dichvu` WHERE LOWER(`tendichvu`) LIKE LOWER('%$search%') OR LOWER(`mota`) LIKE LOWER('%$search%') OR LOWER(`gia`) LIKE LOWER('%$search%') OR LOWER(`id_dichvu`) LIKE LOWER('%$search%')";
    $result = mysqli_query($conn, $sql);
    
    // Kiểm tra số lượng kết quả trả về
    $numRows = mysqli_num_rows($result);

    if ($numRows == 0) {
        // Hiển thị thông báo khi không tìm được dữ liệu
        echo '<script>alert("Không tìm thấy dịch vụ nào phù hợp.");</script>';
    }
} else { 
    $sql = "SELECT * FROM `dichvu`";
    $result = mysqli_query($conn, $sql);
}
?>
