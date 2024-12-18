<?php
include "ketnoi.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Xóa dữ liệu mà không sử dụng prepared statements
    $sql = "DELETE FROM `sudungdichvu` WHERE id_sudungdichvu = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Xóa thành công, thực hiện chuyển hướng và hiển thị thông báo
        echo '<script>
                alert("Dữ liệu đã được xóa thành công.");
                window.location.href = "sddv.php";
              </script>';
    } else {
        // Nếu xóa thất bại, hiển thị lỗi
        echo "Thất bại: " . mysqli_error($conn);
    }
} else {
    echo "Thất bại: Không tìm thấy ID để xóa";
}
?>
