<?php include "menuphp/header.php"?>
<?php
include "ketnoi.php";

$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $tendv = $_POST['tendichvu'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];

    // Kiểm tra trùng lặp trước khi thực hiện cập nhật
    $checkDuplicateSql = "SELECT * FROM `dichvu` WHERE `tendichvu` = '$tendv' AND `id_dichvu` != '$id'";
    $duplicateResult = mysqli_query($conn, $checkDuplicateSql);

    if (mysqli_num_rows($duplicateResult) > 0) {
        echo '<script>
                alert("Tên dịch vụ đã tồn tại. Vui lòng chọn tên khác.");
                
              </script>';
    } else {
        // Nếu không trùng lặp, thực hiện cập nhật
        $sql = "UPDATE `dichvu` SET `tendichvu`='$tendv', `mota`='$mota', `gia`='$gia' WHERE id_dichvu = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            alert("Dữ liệu đã được cập nhật thành công.");
            window.location.href = "qldv.php";
          </script>';
        } else {
            echo "Thất bại: " . mysqli_error($conn);
        }
    }
}

?>


    <title> Quản lý dịch vụ</title>


<body>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Chỉnh sửa thông tin dịch vụ</h3>
            <p class="text-muted">Nhấn cập nhật sau khi thay đổi thông tin</p>
        </div>

        <?php
        $sql = "SELECT * FROM `dichvu` WHERE id_dichvu = '$id' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="mb-3">
                    <label class="form-label">Tên dịch vụ:</label>
                    <input type="text" class="form-control" name="tendichvu" value="<?php echo $row['tendichvu'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả:</label>
                    <input type="text" class="form-control" name="mota" value="<?php echo $row['mota'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Giá:</label>
                    <input type="text" class="form-control" name="gia" value="<?php echo $row['gia'] ?>">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Cập nhật</button>
                    <a href="qldv.php" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
    </div>

   
</body>

<?php include "menuphp/footer.php"?>
