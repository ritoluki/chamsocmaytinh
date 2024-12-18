<?php include "menuphp/header.php"?>
<?php
include "ketnoi.php";

$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];

    // Kiểm tra dữ liệu đã được nhập chưa
    if (empty($hoten) || empty($ngaysinh) || empty($diachi) || empty($sodienthoai)) {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin.")</script>';
    } else {
        // Nếu dữ liệu đã được nhập đầy đủ, thực hiện cập nhật
        $sql = "UPDATE `khachhang` SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `diachi`='$diachi', `sodienthoai`='$sodienthoai' WHERE id_kh = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>alert("Dữ liệu đã được cập nhật thành công."); window.location.href = "khachhang.php";</script>';
        } else {
            echo "Thất bại: " . mysqli_error($conn);
        }
    }
}

?>





    <div class="container">
        <div class="text-center mb-4">
            <h3>Chỉnh sửa thông tin khách hàng</h3>
            <p class="text-muted">Nhấn cập nhật sau khi thay đổi thông tin</p>
        </div>

        <?php
        $sql = "SELECT * FROM `khachhang` WHERE id_kh = '$id' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="mb-3">
                    <label class="form-label">Họ tên:</label>
                    <input type="text" class="form-control" name="hoten" value="<?php echo $row['hoten'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ngày sinh:</label>
                    <input type="date" class="form-control" name="ngaysinh" value="<?php echo $row['ngaysinh'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" name="diachi" value="<?php echo $row['diachi'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Số điện thoại:</label>
                    <input type="text" class="form-control" name="sodienthoai" value="<?php echo $row['sodienthoai'] ?>">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Cập nhật</button>
                    <a href="khachhang.php" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
    </div>

   




<?php include "menuphp/footer.php"?>
