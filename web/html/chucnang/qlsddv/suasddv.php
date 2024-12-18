<?php include "menuphp/header.php"?>
<?php
include "ketnoi.php";

if(isset($_GET['id'])) {
    $id_sudungdichvu = $_GET['id'];

    // Truy vấn cơ sở dữ liệu để lấy thông tin của mục cần sửa từ bảng sudungdichvu
    $sql_sudungdichvu = "SELECT sd.id_sudungdichvu, kh.id_kh, dv.id_dichvu, sd.ngaysudung, sd.danhgia, sd.thanhtoan
                        FROM sudungdichvu sd
                        JOIN khachhang kh ON sd.id_kh = kh.id_kh
                        JOIN dichvu dv ON sd.id_dichvu = dv.id_dichvu
                        WHERE sd.id_sudungdichvu = '$id_sudungdichvu'";
    $result_sudungdichvu = mysqli_query($conn, $sql_sudungdichvu);
    $row_sudungdichvu = mysqli_fetch_assoc($result_sudungdichvu);

    // Truy vấn cơ sở dữ liệu để lấy thông tin của mục cần sửa từ bảng sudunglinhkien
    $sql_sudunglinhkien = "SELECT sl.id_sudunglinhkien, sl.id_linhkien, sl.soluong
                        FROM sudunglinhkien sl
                        WHERE sl.id_sudungdichvu = '$id_sudungdichvu'";
    $result_sudunglinhkien = mysqli_query($conn, $sql_sudunglinhkien);

    // Truy vấn cơ sở dữ liệu để lấy tên khách hàng cho select box
    $sql_khachhang = "SELECT * FROM khachhang";
    $result_khachhang = mysqli_query($conn, $sql_khachhang);

    // Truy vấn cơ sở dữ liệu để lấy tên dịch vụ cho select box
    $sql_dichvu = "SELECT * FROM dichvu";
    $result_dichvu = mysqli_query($conn, $sql_dichvu);

    // Truy vấn cơ sở dữ liệu để lấy tên linh kiện cho select box
    $sql_linhkien = "SELECT * FROM linhkien";
    $result_linhkien = mysqli_query($conn, $sql_linhkien);

    // Thực hiện xử lý dữ liệu gửi từ biểu mẫu
    if(isset($_POST['submit'])) {
        // Lấy dữ liệu từ biểu mẫu
        $id_kh = $_POST['id_kh'];
        $id_dichvu = $_POST['id_dichvu'];
        $ngaysudung = $_POST['ngaysudung'];
        $danhgia = $_POST['danhgia'];
        $thanhtoan = isset($_POST['thanhtoan']) ? 1 : 0;

        // Cập nhật dữ liệu vào bảng sudungdichvu
        $sql_update_sudungdichvu = "UPDATE sudungdichvu 
                                    SET id_kh='$id_kh', id_dichvu='$id_dichvu', ngaysudung='$ngaysudung', danhgia='$danhgia', thanhtoan='$thanhtoan' 
                                    WHERE id_sudungdichvu='$id_sudungdichvu'";
        mysqli_query($conn, $sql_update_sudungdichvu);

        // Xóa hết các dòng cũ trong bảng sudunglinhkien để cập nhật lại
        $sql_delete_sudunglinhkien = "DELETE FROM sudunglinhkien WHERE id_sudungdichvu='$id_sudungdichvu'";
        mysqli_query($conn, $sql_delete_sudunglinhkien);

        // Lặp qua mảng dữ liệu từ biểu mẫu để cập nhật vào bảng sudunglinhkien
        foreach ($_POST['id_linhkien'] as $key => $id_linhkien) {
            $soluong = $_POST['soluong'][$key];
            $sql_insert_sudunglinhkien = "INSERT INTO sudunglinhkien (id_sudungdichvu, id_linhkien, soluong) 
                                            VALUES ('$id_sudungdichvu', '$id_linhkien', '$soluong')";
            mysqli_query($conn, $sql_insert_sudunglinhkien);
        }
        echo '<script>alert("Dữ liệu đã được cập nhật thành công."); window.location.href = "sddv.php";</script>';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa dịch vụ</title>
    
    </head>
<body>
<div class="container">
        <div class="text-center mb-4">
            <h3>Sửa thông tin nhân viên</h3>
            <p class="text-muted">Hoàn tất biểu mẫu bên dưới để cập nhật thông tin nhân viên</p>
        </div>
    <div class="container  d-flex justify-content-center">
        
    <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
                <label for="id_kh" class="form-label">Tên khách hàng:</label>
                <select name="id_kh" class="form-control">
                    <?php while ($row_khachhang = mysqli_fetch_assoc($result_khachhang)) { ?>
                        <option value="<?php echo $row_khachhang['id_kh']; ?>" <?php if($row_sudungdichvu['id_kh'] == $row_khachhang['id_kh']) echo "selected"; ?>>
                            <?php echo $row_khachhang['hoten']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_dichvu" class="form-label">Tên dịch vụ:</label>
                <select name="id_dichvu" class="form-control">
                    <?php while ($row_dichvu = mysqli_fetch_assoc($result_dichvu)) { ?>
                        <option value="<?php echo $row_dichvu['id_dichvu']; ?>" <?php if($row_sudungdichvu['id_dichvu'] == $row_dichvu['id_dichvu']) echo "selected"; ?>>
                            <?php echo $row_dichvu['tendichvu']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="ngaysudung" class="form-label">Ngày sử dụng:</label>
                <input type="date" name="ngaysudung" class="form-control" value="<?php echo $row_sudungdichvu['ngaysudung']; ?>">
            </div>
            <div class="mb-3">
                <label for="danhgia" class="form-label">Đánh giá:</label>
                <input type="text" name="danhgia" class="form-control" value="<?php echo $row_sudungdichvu['danhgia']; ?>">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="thanhtoan" class="form-check-input" value="1" <?php if($row_sudungdichvu['thanhtoan'] == 1) echo "checked"; ?>>
                <label class="form-check-label" for="thanhtoan">Thanh toán:</label>
            </div>

            <!-- Biểu mẫu cho bảng sudunglinhkien -->
            <?php mysqli_data_seek($result_sudunglinhkien, 0); ?>
            <?php while ($row_sudunglinhkien = mysqli_fetch_assoc($result_sudunglinhkien)) { ?>
                <div class="mb-3">
                    <label for="id_linhkien[]" class="form-label">Tên linh kiện:</label>
                    <select name="id_linhkien[]" class="form-select">
                        <?php mysqli_data_seek($result_linhkien, 0); ?>
                        <?php while ($row_linhkien = mysqli_fetch_assoc($result_linhkien)) { ?>
                            <option value="<?php echo $row_linhkien['id_linhkien']; ?>" <?php if($row_sudunglinhkien['id_linhkien'] == $row_linhkien['id_linhkien']) echo "selected"; ?>>
                                <?php echo $row_linhkien['tenlinhkien']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="soluong[]" class="form-label">Số lượng:</label>
                    <input type="text" name="soluong[]" class="form-control" value="<?php echo $row_sudunglinhkien['soluong']; ?>">
                </div>
            <?php } ?>

            <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
            <a href="sddv.php" class="btn btn-danger">Hủy</a>
        </form>
    </div>

    </body>

<?php include "menuphp/footer.php"?>
