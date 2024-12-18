<?php
include "ketnoi.php";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT sudungdichvu.id_sudungdichvu, khachhang.hoten AS tenkhachhang, dichvu.tendichvu, sudungdichvu.ngaysudung, sudungdichvu.danhgia 
            FROM sudungdichvu
            INNER JOIN khachhang ON sudungdichvu.id_kh = khachhang.id_kh
            INNER JOIN dichvu ON sudungdichvu.id_dichvu = dichvu.id_dichvu
            WHERE LOWER(khachhang.hoten) LIKE LOWER('%$search%') OR LOWER(dichvu.tendichvu) LIKE LOWER('%$search%') OR LOWER(sudungdichvu.ngaysudung) LIKE LOWER('%$search%') OR LOWER(sudungdichvu.danhgia) LIKE LOWER('%$search%') OR LOWER(sudungdichvu.id_sudungdichvu) LIKE LOWER('%$search%')";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra số hàng trả về
    if (mysqli_num_rows($result) == 0) {
        echo "Không có dữ liệu cần tìm.";
    }
} else {
    // Truy vấn ban đầu với INNER JOIN
    $sql = "SELECT sudungdichvu.id_sudungdichvu, sudungdichvu.id_kh, sudungdichvu.id_dichvu, sudungdichvu.ngaysudung, sudungdichvu.danhgia, sudungdichvu.thanhtoan, khachhang.hoten AS tenkhachhang, dichvu.tendichvu 
        FROM sudungdichvu
        INNER JOIN khachhang ON sudungdichvu.id_kh = khachhang.id_kh
        INNER JOIN dichvu ON sudungdichvu.id_dichvu = dichvu.id_dichvu"; 

    $result = mysqli_query($conn, $sql);

    // Kiểm tra số hàng trả về
    if (mysqli_num_rows($result) == 0) {
        echo "Không có dữ liệu.";
    }
}
?>
