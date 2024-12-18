<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết</title>
    <!-- Link to Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h2, h4{
          text-align: center;
        }
        p{
            font-weight: bold;
        }
        
    </style>
</head>
<body>

<?php 
include "menuphp/header.php";
include "ketnoi.php";

if (isset($_GET['id'])) {
    $id_sudungdichvu = $_GET['id'];

    // Truy vấn để lấy thông tin từ bảng sudungdichvu, khachhang và dichvu
    $sql_dv_kh = "SELECT sdv.id_sudungdichvu, kh.id_kh, kh.hoten AS tenkhachhang, dv.tendichvu, sdv.ngaysudung, sdv.danhgia, sdv.thanhtoan
                FROM sudungdichvu sdv
                INNER JOIN khachhang kh ON sdv.id_kh = kh.id_kh
                INNER JOIN dichvu dv ON sdv.id_dichvu = dv.id_dichvu
                WHERE sdv.id_sudungdichvu = '$id_sudungdichvu'";
    $result_dv_kh = mysqli_query($conn, $sql_dv_kh);
    $row_dv_kh = mysqli_fetch_assoc($result_dv_kh);

    // Truy vấn để lấy thông tin từ bảng sudunglinhkien và linhkien
    $sql_linhkien = "SELECT slk.id_linhkien, lk.tenlinhkien AS tenlinhkien, llk.ten_loailinhkien AS ten_loailinhkien, slk.soluong
                    FROM sudunglinhkien slk
                    INNER JOIN linhkien lk ON slk.id_linhkien = lk.id_linhkien
                    INNER JOIN loailinhkien llk ON lk.id_loailinhkien = llk.id_loailinhkien
                    WHERE slk.id_sudungdichvu = '$id_sudungdichvu'";

    $result_linhkien = mysqli_query($conn, $sql_linhkien);
}
?>
 <a href="sddv.php" class="btn btn-primary mb-3"><i class="fa-solid fa-arrow-left"></i> Quay lại</a>
<div class="container mt-3">
    <h2 class="mb-3">Thông tin chi tiết</h2>

    <div class="mb-3">
        <h4>Thông tin khách hàng và dịch vụ:</h4>
        <p>ID Khách hàng: <?php echo $row_dv_kh['id_kh']; ?></p>
        <p>Tên khách hàng: <?php echo $row_dv_kh['tenkhachhang']; ?></p>
        <p>Dịch vụ: <?php echo $row_dv_kh['tendichvu']; ?></p>
        <p>Ngày sử dụng: <?php echo $row_dv_kh['ngaysudung']; ?></p>
        <p>Đánh giá: <?php echo $row_dv_kh['danhgia']; ?></p>
        <?php
            // Lấy thông tin thanh toán từ cột "thanhtoan" của bảng "sudungdichvu"
            $thanh_toan = $row_dv_kh['thanhtoan'] == 1 ? "Đã thanh toán" : "Chưa thanh toán";
        ?>
        <p>Thanh toán: <?php echo $thanh_toan; ?></p>
    </div>

    <div class="mb-3">

        <h4 >Thông tin sử dụng linh kiện:</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">ID Linh kiện</th>
                        <th scope="col">Tên loại linh kiện</th>
                        <th scope="col">Tên Linh kiện</th>
                        <th scope="col">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Hiển thị thông tin từ bảng sudunglinhkien
                    while ($row_linhkien = mysqli_fetch_assoc($result_linhkien)) {
                    ?>
                        <tr>
                            <td><?php echo $row_linhkien['id_linhkien']; ?></td>
                            <td><?php echo $row_linhkien['ten_loailinhkien']; ?></td>
                            <td><?php echo $row_linhkien['tenlinhkien']; ?></td>
                            <td><?php echo $row_linhkien['soluong']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?php include "menuphp/footer.php"; ?>
</body>
</html>
