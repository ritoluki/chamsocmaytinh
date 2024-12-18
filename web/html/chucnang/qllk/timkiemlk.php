<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    
$sql = "SELECT linhkien.id_linhkien, linhkien.tenlinhkien, linhkien.mota, linhkien.soluong, loailinhkien.ten_loailinhkien
    FROM linhkien
    LEFT JOIN loailinhkien ON linhkien.id_loailinhkien = loailinhkien.id_loailinhkien
    WHERE LOWER(linhkien.tenlinhkien) LIKE LOWER('%$search%') 
        OR LOWER(linhkien.mota) LIKE LOWER('%$search%') 
        OR LOWER(linhkien.soluong) LIKE LOWER('%$search%') 
        OR LOWER(loailinhkien.ten_loailinhkien) LIKE LOWER('%$search%') 
        OR LOWER(linhkien.id_linhkien) LIKE LOWER('%$search%')";


    $result = mysqli_query($conn, $sql);

    // Kiểm tra số lượng kết quả
    $numRows = mysqli_num_rows($result);

    if ($numRows == 0) {
        // Không có kết quả, hiển thị thông báo và thực hiện reload trang
        echo '<script>alert("Không có dữ liệu cần tìm."); window.location.href = "linhkien.php";</script>';
    }
} else { 
    $sql = "SELECT linhkien.id_linhkien, linhkien.tenlinhkien, linhkien.mota, linhkien.soluong, linhkien.gia_linhkien, loailinhkien.ten_loailinhkien
            FROM linhkien
            INNER JOIN loailinhkien ON linhkien.id_loailinhkien = loailinhkien.id_loailinhkien";
    $result = mysqli_query($conn, $sql);
}
?>
