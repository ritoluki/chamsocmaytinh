<?php
include "ketnoi.php";

// Truy vấn SQL để lấy dữ liệu doanh số
$sql = "SELECT MONTH(ngaysudung) AS thang, SUM(gia) AS doanhso FROM sudungdichvu INNER JOIN dichvu ON sudungdichvu.id_dichvu = Dichvu.id_dichvu GROUP BY MONTH(ngaysudung)";
$result = $conn->query($sql);

// Tạo mảng để lưu trữ dữ liệu cho biểu đồ
$tongDoanhThuThang = [];

// Xử lý kết quả truy vấn
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $thang = $row["thang"];
        $doanhso = $row["doanhso"];
        $tongDoanhThuThang[$thang] = $doanhso;
    }
}

// Số khách chưa thanh toán
$sqlKhachChuaThanhToan = "SELECT COUNT(DISTINCT K.MAKH) AS SoKhachChuaThanhToan
FROM tbkhachhang K
JOIN tbhoadonhang H ON K.MAKH = H.MAKH
WHERE H.TINHTRANG = 0;";
$resultKhachChuaThanhToan = mysqli_query($conn, $sqlKhachChuaThanhToan);
$rowKhachChuaThanhToan = mysqli_fetch_assoc($resultKhachChuaThanhToan);
$soKhachChuaThanhToan = $rowKhachChuaThanhToan['khachchuathanhtoan'];

// Số khách đã thanh toán
$sqlKhachDaThanhToan = "SELECT COUNT(DISTINCT K.MAKH) AS SoKhachDaThanhToan
FROM tbkhachhang K
JOIN tbhoadonhang H ON K.MAKH = H.MAKH
WHERE H.TINHTRANG = 1;
";
$resultKhachDaThanhToan = mysqli_query($conn, $sqlKhachDaThanhToan);
$rowKhachDaThanhToan = mysqli_fetch_assoc($resultKhachDaThanhToan);
$soKhachDaThanhToan = $rowKhachDaThanhToan['khachdathanhtoan'];

// Tổng doanh thu
$sqlDoanhThu = "SELECT SUM(dv.gia) AS tongdoanhthu
                FROM sudungdichvu sdv
                INNER JOIN dichvu dv ON sdv.id_dichvu = dv.id_dichvu
                WHERE sdv.thanhtoan = 1";
$resultDoanhThu = mysqli_query($conn, $sqlDoanhThu);
$rowDoanhThu = mysqli_fetch_assoc($resultDoanhThu);
$tongDoanhThu = $rowDoanhThu['tongdoanhthu'];

// Số lượng nhân viên
$sqlSoLuongNhanVien = "SELECT COUNT(*) AS soluongnhanvien FROM nhanvien";
$resultSoLuongNhanVien = mysqli_query($conn, $sqlSoLuongNhanVien);
$rowSoLuongNhanVien = mysqli_fetch_assoc($resultSoLuongNhanVien);
$soLuongNhanVien = $rowSoLuongNhanVien['soluongnhanvien'];

// Số lượng khách hàng
$sqlSoLuongKhachHang = "SELECT COUNT(*) AS soluongkhachhang FROM khachhang";
$resultSoLuongKhachHang = mysqli_query($conn, $sqlSoLuongKhachHang);
$rowSoLuongKhachHang = mysqli_fetch_assoc($resultSoLuongKhachHang);
$soLuongKhachHang = $rowSoLuongKhachHang['soluongkhachhang'];

// Số lượng linh kiện
$sqlSoLuongLinhKien = "SELECT COUNT(*) AS soluonglinhkien FROM linhkien";
$resultSoLuongLinhKien = mysqli_query($conn, $sqlSoLuongLinhKien);
$rowSoLuongLinhKien = mysqli_fetch_assoc($resultSoLuongLinhKien);
$soLuongLinhKien = $rowSoLuongLinhKien['soluonglinhkien'];

// Số lượng dịch vụ
$sqlSoLuongDichVu = "SELECT COUNT(*) AS soluongdichvu FROM dichvu";
$resultSoLuongDichVu = mysqli_query($conn, $sqlSoLuongDichVu);
$rowSoLuongDichVu = mysqli_fetch_assoc($resultSoLuongDichVu);
$soLuongDichVu = $rowSoLuongDichVu['soluongdichvu'];

// Số lượng sử dụng dịch vụ
$sqlSoLuongSudungDichVu = "SELECT COUNT(*) AS soluongsudungdichvu FROM sudungdichvu";
$resultSoLuongSudungDichVu = mysqli_query($conn, $sqlSoLuongSudungDichVu);
$rowSoLuongSudungDichVu = mysqli_fetch_assoc($resultSoLuongSudungDichVu);
$soLuongSudungDichVu = $rowSoLuongSudungDichVu['soluongsudungdichvu'];

// Số lượng lịch hẹn
$sqlSoLuongLichHen = "SELECT COUNT(*) AS soluonglichhen FROM sudungdichvu";
$resultSoLuongLichHen = mysqli_query($conn, $sqlSoLuongLichHen);
$rowSoLuongLichHen = mysqli_fetch_assoc($resultSoLuongLichHen);
$rowSoLuongLichHen = $rowSoLuongLichHen['soluonglichhen'];
// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chucnang/baocaothongke/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Biểu đồ cột</title>
</head>

<body>
    <div class="container">
        <div class="row mt-4 total-tieude"> 
            <h3> BÁO CÁO THỐNG KÊ </h3>
        </div>
        <div class="row mt-4">
            <div class="col-md-3 total-revenue">
                <h2>Tổng doanh thu</h2>
                <?php
                // Hiển thị tổng doanh thu
                echo "<p>Tổng doanh thu: $tongDoanhThu VNĐ</p>";
                ?>
            </div>
            <div class="col-md-9">
                <h4>Biểu đồ tổng doanh thu theo từng tháng</h4>
                <div style="width: 100%;">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3 total-revenue11">
                <h2>KHÁCH HÀNG ĐÃ THANH TOÁN</h2>
                <p>Số khách đã thanh toán: <?php echo $soKhachDaThanhToan; ?></p>
            </div>
            <div class="col-md-6">
                <h4>Biểu đồ số khách hàng chưa thanh toán và đã thanh toán</h4>
                <div style="width: 100%;">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
            <div class="col-md-3 total-revenue1">
                <h2>KHÁCH HÀNG CHƯA THANH TOÁN</h2>
                <p>Số khách chưa thanh toán: <?php echo $soKhachChuaThanhToan; ?></p>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-3 total-revenue">
                <h4>SỐ NHÂN VIÊN CỦA CỬA HÀNG: <?php echo $soLuongNhanVien; ?></p></h4>
            </div>
            <div class="col-md-4 offset-md-1 total-revenue">
                <h4>SỐ KHÁCH HÀNG SỬ DỤNG DỊCH VỤ: <?php echo $soLuongKhachHang; ?></p></h4>
            </div>
            <div class="col-md-3 offset-md-1 total-revenue">
                <h4>SỐ LƯỢNG DICH VỤ ĐƯỢC SỬ DỤNG: <?php echo $soLuongSudungDichVu; ?></p></h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3 total-revenue">
                <h4>TẤT CẢ LINH KIỆN TRÊN WEBSITE: <?php echo $soLuongLinhKien; ?></p></h4>
            </div>
            <div class="col-md-4 offset-md-1 total-revenue">
                <h4>TẤT CẢ DỊCH VỤ TRÊN WEBSITE: <?php echo $soLuongDichVu; ?></p></h4>
            </div>
            <div class="col-md-3 offset-md-1 total-revenue">
                <h4>SỐ LƯỢNG LỊCH HẸN TRÊN WEBSITE: <?php echo $rowSoLuongLichHen; ?></p></h4>
            </div>
        </div>

    <script>
        var tongDoanhThu = <?php echo json_encode([$tongDoanhThu]); ?>;
        var labels = <?php echo json_encode(array_keys($tongDoanhThuThang)); ?>;
        var dataThang = <?php echo json_encode(array_values($tongDoanhThuThang)); ?>;
        var soKhachChuaThanhToan = <?php echo $soKhachChuaThanhToan; ?>;
        var soKhachDaThanhToan = <?php echo $soKhachDaThanhToan; ?>;

        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Tổng doanh thu (VNĐ)',
                        data: dataThang,
                        backgroundColor: 'rgba(15, 18, 235)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                title: {
                    display: true,
                    text: 'Biểu đồ tổng doanh thu theo từng tháng',
                },
            },
        });

        var ctxPie = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Đã thanh toán','Chưa thanh toán' ],
                datasets: [{
                    data: [ soKhachDaThanhToan,soKhachChuaThanhToan],
                    backgroundColor: ['#66b3ff', '#ff9999'],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Biểu đồ số khách hàng chưa thanh toán và đã thanh toán',
                },
            },
        });
    </script>
</body>

</html>
