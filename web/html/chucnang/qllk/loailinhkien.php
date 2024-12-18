<?php include "menuphp/header.php"?>
<?php
include "ketnoi.php";

// Xử lý chức năng thêm
if (isset($_POST["submitThem"])) {
    $idLoaiLinhKien = $_POST['id_loailinhkien'];
    $tenLoaiLinhKien = $_POST['ten_loailinhkien'];

    $sqlThem = "INSERT INTO `loailinhkien` (`id_loailinhkien`, `ten_loailinhkien`) VALUES ('$idLoaiLinhKien', '$tenLoaiLinhKien')";
    $resultThem = mysqli_query($conn, $sqlThem);

    if ($resultThem) {
        echo '<script>
                alert("Dữ liệu đã được thêm thành công.");
                window.location.href = "loailinhkien.php";
              </script>';
    } else {
        echo "Thất bại: " . mysqli_error($conn);
    }
}

// Xử lý chức năng sửa
if (isset($_POST["submitSua"])) {
    $idLoaiLinhKienSua = $_POST['id_loailinhkien_sua'];
    $tenLoaiLinhKienSua = $_POST['ten_loailinhkien_sua'];

    $sqlSua = "UPDATE `loailinhkien` SET `ten_loailinhkien`='$tenLoaiLinhKienSua' WHERE `id_loailinhkien`='$idLoaiLinhKienSua'";
    $resultSua = mysqli_query($conn, $sqlSua);

    if ($resultSua) {
        echo '<script>
                alert("Dữ liệu đã được cập nhật thành công.");
                window.location.href = "loailinhkien.php";
              </script>';
    } else {
        echo "Thất bại: " . mysqli_error($conn);
    }
}

// Xử lý chức năng xóa
if (isset($_GET["idXoa"])) {
    $idLoaiLinhKienXoa = $_GET["idXoa"];

    $sqlXoa = "DELETE FROM `loailinhkien` WHERE `id_loailinhkien`='$idLoaiLinhKienXoa'";
    $resultXoa = mysqli_query($conn, $sqlXoa);

    if ($resultXoa) {
        echo '<script>
                alert("Dữ liệu đã được xóa thành công.");
                window.location.href = "loailinhkien.php";
              </script>';
    } else {
        echo "Thất bại: " . mysqli_error($conn);
    }
}

// Lấy danh sách loại linh kiện
$sqlDanhSach = "SELECT * FROM `loailinhkien`";
$resultDanhSach = mysqli_query($conn, $sqlDanhSach);
?>


    <style>
        .btn-group {
            margin-right: 10px;
        }
    </style>


<body>

    <div class="container mt-3">
        <h3 class="mb-4">Quản lý loại linh kiện</h3>

        <!-- Form thêm loại linh kiện -->
        <form action="" method="post" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text">ID</span>
                        <input type="text" class="form-control" name="id_loailinhkien" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text">Tên loại linh kiện</span>
                        <input type="text" class="form-control" name="ten_loailinhkien" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success" name="submitThem"><i class="fa-solid fa-plus"></i> Thêm</button>
                    <a href="linhkien.php" class="btn btn-secondary btn-sm rounded-pill"><i class="fa-solid fa-list"></i> Danh sách linh kiện</a>
                </div>
            </div>
        </form>

        <!-- Bảng dữ liệu -->
        <table class="table table-hover text-center table-bordered">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên loại linh kiện</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Hiển thị danh sách loại linh kiện -->
                <?php while ($row = mysqli_fetch_assoc($resultDanhSach)) { ?>
                    <tr>
                        <td><?php echo $row["id_loailinhkien"] ?></td>
                        <td><?php echo $row["ten_loailinhkien"] ?></td>
                        <td>
                            <a href="loailinhkien.php?idXoa=<?php echo $row['id_loailinhkien']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa loại linh kiện này không?');">
                                <i class="fa-solid fa-trash fs-5 me-1 text-dark"></i>Xóa
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    
</body>

</html>
<?php include "menuphp/footer.php"?>