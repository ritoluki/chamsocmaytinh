<?php include "menuphp/header.php"?>
<?php
include "ketnoi.php";

if (isset($_GET["id"])) {
    $id_nv = $_GET["id"];
    $sql_nhanvien = "SELECT * FROM `nhanvien` WHERE `id_nv` = '$id_nv'";
    $result_nhanvien = mysqli_query($conn, $sql_nhanvien);
    $row_nhanvien = mysqli_fetch_assoc($result_nhanvien);

    $sql_taikhoan = "SELECT * FROM `taikhoannhanvien` WHERE `idnv` = '$id_nv'";
    $result_taikhoan = mysqli_query($conn, $sql_taikhoan);
    $row_taikhoan = mysqli_fetch_assoc($result_taikhoan);

    if (!$row_nhanvien) {
        echo "Không tìm thấy nhân viên";
        exit;
    }
} else {
    echo "Không có ID nhân viên được cung cấp";
    exit;
}

if (isset($_POST["submit"])) {
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $diachi = $_POST['diachi'];
    $luong = $_POST['luong'];

    // Cập nhật thông tin nhân viên
    $sql_update_nhanvien = "UPDATE `nhanvien` SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `gioitinh`='$gioitinh', `diachi`='$diachi', `luong`='$luong' WHERE `id_nv`='$id_nv'";
    $result_update_nhanvien = mysqli_query($conn, $sql_update_nhanvien);

    // Cập nhật thông tin tài khoản nhân viên
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];

    $sql_update_taikhoan = "UPDATE `taikhoannhanvien` SET `taikhoan`='$taikhoan', `matkhau`='$matkhau' WHERE `idnv`='$id_nv'";
    $result_update_taikhoan = mysqli_query($conn, $sql_update_taikhoan);

    if ($result_update_nhanvien && $result_update_taikhoan) {
        echo '<script>
        alert("Dữ liệu đã được thêm thành công.");
        window.location.href = "index.php";
        </script>';
        exit;
    } else {
        $error_message = "Thất bại: " . mysqli_error($conn);
    }
}
?>


    <title>Sửa nhân viên</title>


<body>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Sửa thông tin nhân viên</h3>
            <p class="text-muted">Hoàn tất biểu mẫu bên dưới để cập nhật thông tin nhân viên</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <!-- Thông tin nhân viên -->
                <div class="mb-3">
                    <label class="form-label">Họ và tên:</label>
                    <input type="text" class="form-control" name="hoten" value="<?php echo $row_nhanvien['hoten']; ?>">
                </div>

                
                <div class="mb-3">
                    <label class="form-label">Ngày sinh:</label>
                    <input type="date" class="form-control" name="ngaysinh" value="<?php echo $row_nhanvien['ngaysinh']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Giới tính:</label>
                    <select class="form-control" name="gioitinh">
                        <option value="Nam" <?php echo ($row_nhanvien['gioitinh'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                        <option value="Nữ" <?php echo ($row_nhanvien['gioitinh'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                        <option value="Khác" <?php echo ($row_nhanvien['gioitinh'] == 'Khác') ? 'selected' : ''; ?>>Khác</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" name="diachi" value="<?php echo $row_nhanvien['diachi']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Lương:</label>
                    <input type="text" class="form-control" name="luong" value="<?php echo $row_nhanvien['luong']; ?>">
                </div>

                <!-- Thông tin tài khoản -->
                <div class="mb-3">
                    <label class="form-label">Tài khoản:</label>
                    <input type="text" class="form-control" name="taikhoan" value="<?php echo $row_taikhoan['taikhoan']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu:</label>
                    <input type="text" class="form-control" name="matkhau" value="<?php echo $row_taikhoan['matkhau']; ?>">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Lưu</button>
                    <a href="index.php" class="btn btn-danger">Hủy</a>
                </div>

                <?php
                if (isset($error_message)) {
                    echo '<div class="alert alert-danger mt-3" role="alert">' . $error_message . '</div>';
                }
                ?>
            </form>
        </div>
    </div>

    
</body>

<?php include "menuphp/footer.php"?>
