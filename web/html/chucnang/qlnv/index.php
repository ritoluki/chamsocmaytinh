<?php include "menuphp/header.php"?>
<?php
include "ketnoi.php";

// Xử lý tìm kiếm
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM `nhanvien` WHERE LOWER(`hoten`) LIKE LOWER('%$search%') OR LOWER(`ngaysinh`) LIKE LOWER('%$search%') OR LOWER(`gioitinh`) LIKE LOWER('%$search%') OR LOWER(`diachi`) LIKE LOWER('%$search%') OR LOWER(`luong`) LIKE LOWER('%$search%')";
    $result = mysqli_query($conn, $sql);
} else {
    $sql = "SELECT * FROM `nhanvien`";
    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   

    <title>Quản lý nhân viên</title>

</head>

<body>
<div class="container">
    <div class="mb-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <form action="" method="get" class="d-flex align-items-center" onsubmit="return validateSearchForm()">
                    <input type="text" class="form-control form-control-sm me-2" name="search" id="searchInput" placeholder="Nhập từ khóa">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-search"></i></button>
                </form>
                <?php
                if (isset($_GET["add"])) {
                    $msg = $_GET["add"];
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        ' . $msg . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                ?>
                 <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/admin.php" class="btn btn-warning btn-sm rounded-pill"><i class="fa-solid fa-home"></i> Trang chủ</a> 
                <a href="themnv.php" class="btn btn-primary btn-sm"><i class="fa-solid fa-user-plus"></i>Thêm nhân viên</a>
                <a href="index.php" class="btn btn-danger btn-sm"><i class="bi bi-house-door"></i> Làm mới</a>
            </div>
        </nav>
    </div>

        <?php
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table class="table table-hover text-center table-bordered">
                <thead class="table-success">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Lương</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!--load data-->
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["id_nv"] ?></td>
                            <td><?php echo $row["hoten"] ?></td>
                            <td><?php echo $row["ngaysinh"] ?></td>
                            <td><?php echo $row["gioitinh"] ?></td>
                            <td><?php echo $row["diachi"] ?></td>
                            <td><?php echo $row["luong"] ?></td>
                            <td>
                                <a href="suanv.php?id=<?php echo $row["id_nv"] ?>" class="btn btn-primary mx-2">
                                    <i class="fa-solid fa-pen-to-square fs-5 me-1 text-dark"></i>Sửa
                                </a>
                                <a href="xoanv.php?id=<?php echo $row["id_nv"] ?>" class="btn btn-danger">
                                    <i class="fa-solid fa-trash fs-5 me-1 text-dark"></i>Xóa
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
            echo '<div class="alert alert-info" role="alert">
                    Không có kết quả tìm kiếm.
                  </div>';
        }
        ?>
    </div>

    
     <script>
        function validateSearchForm() {
            var searchInput = document.getElementById('searchInput').value;
            if (searchInput.trim() === "") {
                alert("Vui lòng nhập từ khóa tìm kiếm.");
                return false;
            }
            return true;
        }
        window.addEventListener('popstate', function (event) {
            location.reload(true);
        });
    </script>
</body>

</html>
<?php include "menuphp/footer.php"?>
