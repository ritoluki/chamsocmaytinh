<?php include "menuphp/header.php" ?>
<?php
include "ketnoi.php";

$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $tenlinhkien = $_POST['tenlinhkien'];
    $mota = $_POST['mota'];
    $soluong = $_POST['soluong'];
    $id_loailinhkien = $_POST['id_loailinhkien'];
    $gia_linhkien = $_POST['gia'];
    // Kiểm tra trùng lặp trước khi thực hiện cập nhật
    $checkDuplicateSql = "SELECT * FROM `linhkien` WHERE `tenlinhkien` = '$tenlinhkien' AND `id_linhkien` != '$id'";
    $duplicateResult = mysqli_query($conn, $checkDuplicateSql);

    if (mysqli_num_rows($duplicateResult) > 0) {
        echo '<script>
                alert("Tên linh kiện đã tồn tại. Vui lòng chọn tên linh kiện khác.");
                </script>';
    } else {
        // Nếu không trùng lặp, thực hiện cập nhật
        $sql = "UPDATE `linhkien` SET `tenlinhkien`='$tenlinhkien', `mota`='$mota', `soluong`='$soluong', `id_loailinhkien`='$id_loailinhkien', `gia_linhkien`='$gia_linhkien' WHERE `id_linhkien`='$id'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            alert("Dữ liệu đã được cập nhật thành công.");
            window.location.href = "linhkien.php"; 
          </script>';
        } else {
            echo "Thất bại: " . mysqli_error($conn);
        }
    }
}

?>



<head>
    <!-- Các thẻ head của bạn ở đây -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Quản lý linh kiện</title>
</head>

<body>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Chỉnh sửa thông tin linh kiện</h3>
            <p class="text-muted">Nhấn cập nhật sau khi thay đổi thông tin</p>
        </div>

        <?php
        $sql = "SELECT linhkien.*, loailinhkien.ten_loailinhkien
                FROM linhkien
                INNER JOIN loailinhkien ON linhkien.id_loailinhkien = loailinhkien.id_loailinhkien
                WHERE id_linhkien = '$id' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label class="form-label">Tên linh kiện:</label>
                    <input type="text" class="form-control" name="tenlinhkien" value="<?php echo $row['tenlinhkien'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả:</label>
                    <input type="text" class="form-control" name="mota" value="<?php echo $row['mota'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Số lượng:</label>
                    <input type="text" class="form-control" name="soluong" value="<?php echo $row['soluong'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Loại linh kiện:</label>
                    <!-- Thêm select box để chọn loại linh kiện -->
                    <select class="form-select" name="id_loailinhkien">
                        <?php
                        $queryLoaiLinhKien = mysqli_query($conn, "SELECT * FROM `loailinhkien`");
                        while ($loaiLinhKien = mysqli_fetch_assoc($queryLoaiLinhKien)) {
                            $selected = ($loaiLinhKien['id_loailinhkien'] == $row['id_loailinhkien']) ? 'selected' : '';
                            echo "<option value='{$loaiLinhKien['id_loailinhkien']}' $selected>{$loaiLinhKien['ten_loailinhkien']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá:</label>
                    <input type="text" class="form-control" name="gia" value="<?php echo $row['gia_linhkien'] ?>">
                </div>        
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Cập nhật</button>
                    <a href="linhkien.php" class="btn btn-danger">Hủy</a> <!-- Đặt tên file cần chuyển hướng sau khi hủy -->
                </div>
            </form>
        </div>
    </div>

   

</body>
<script>
    function validateForm() {
        var tenlinhkien = document.forms["updateForm"]["tenlinhkien"].value;
        var mota = document.forms["updateForm"]["mota"].value;
        var soluong = document.forms["updateForm"]["soluong"].value;

        if (tenlinhkien == "" || mota == "" || soluong == "") {
            alert("Vui lòng điền đầy đủ thông tin.");
            return false;
        }


        return true;
    }
</script>

<?php include "menuphp/footer.php"?>