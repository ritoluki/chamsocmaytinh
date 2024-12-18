<?php
session_start();
include "ketnoi.php";

if (isset($_POST['xacnhan'])) {
    $tenkhachhang = $_POST['tenkhachhang'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $ngayhen = $_POST['ngayhen'];
    $ghichu = $_POST['ghichu'];

    $sql = "INSERT INTO lichhen (tenkhachhang, sodienthoai, email, diachi, ngayhen, ghichu)
            VALUES ('$tenkhachhang', '$sodienthoai', '$email', '$diachi', '$ngayhen', '$ghichu')";

    if ($conn->query($sql) === TRUE) {
        // Thiết lập thông báo trong session
        $_SESSION['lichhen_success_message'] = "Lịch hẹn đã được đặt thành công!";

        // Đóng kết nối
        $conn->close();

        // Chuyển hướng về trang trước và hiển thị thông báo
        echo "<script>
                alert('" . $_SESSION['lichhen_success_message'] . "');
                window.history.go(-1);
              </script>";

        // Xóa thông báo khỏi session sau khi đã sử dụng
        unset($_SESSION['lichhen_success_message']);
        exit(); // Kết thúc script để ngăn chặn việc thực hiện các phần mã khác sau đó
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
