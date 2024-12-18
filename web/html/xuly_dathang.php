<?php
session_start();
include "ketnoi.php";

if (isset($_POST['dathang'])) {
    // Thiết lập thông báo trong session
    $_SESSION['added_to_cart_message'] = "Đơn hàng đã được đặt thành công!";

    // Đóng kết nối
    $conn->close();
    
    // Chuyển hướng về trang trước và hiển thị nút "OK"
    echo "<script>
            alert('" . $_SESSION['added_to_cart_message'] . "');
            window.history.go(-1);
          </script>";
    
    // Xóa thông báo khỏi session sau khi đã sử dụng
    unset($_SESSION['added_to_cart_message']);
    exit(); // Kết thúc script để ngăn chặn việc thực hiện các phần mã khác sau đó
}
?>
