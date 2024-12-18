<?php
include "ketnoi.php";



include "timkiemkh.php";

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Quản lý khách hàng</title>
    <style>
        .btn-group {
            margin-right: 10px;
        }
    </style>
</head>
<?php include "menuphp/header.php"?>
<body>

    <div class="container mt-3">
        <form action="" method="get" class="d-flex justify-content-between align-items-center" onsubmit="return validateSearchForm()">
            <div class="mb-3 d-flex align-items-center">
                <input type="text" class="form-control form-control-sm me-2 rounded-pill" name="search" id="searchInput" placeholder="Nhập từ khóa">
                <button type="submit" class="btn btn-primary btn-sm rounded-pill"><i class="fa-solid fa-search"></i></button>
            </div>
            <div class="mb-3 btn-group">
            <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/admin.php" class="btn btn-warning btn-sm rounded-pill"><i class="fa-solid fa-home"></i> Trang chủ</a>
                <a href="themkh.php" class="btn btn-primary btn-sm rounded-pill"><i class="fa-solid fa-user-plus"></i> Thêm khách hàng</a>
                <button type="button" class="btn btn-success btn-sm rounded-pill" onclick="reloadPage()"><i class="fa-solid fa-sync"></i> Làm mới</button>
            </div>
        </form>

        <!-- Bảng dữ liệu -->
        <table class="table table-hover text-center table-bordered">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <!--load data-->
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["id_kh"] ?></td>
                        <td><?php echo $row["hoten"] ?></td>
                        <td><?php echo $row["ngaysinh"] ?></td>
                        <td><?php echo $row["diachi"] ?></td>
                        <td><?php echo $row["sodienthoai"] ?></td>
                        <td>
                            <a href="suakh.php?id=<?php echo $row["id_kh"] ?>" class="btn btn-primary mx-2">
                                <i class="fa-solid fa-pen-to-square fs-5 me-1 text-dark"></i>Sửa
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDelete('<?php echo $row['id_kh']; ?>')">
                                <i class="fa-solid fa-trash fs-5 me-1 text-dark"></i>Xóa
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
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

        function confirmDelete(id) {
            var r = confirm("Bạn có chắc chắn muốn xóa khách hàng này không?");
            if (r == true) {
                window.location.href = "xoakh.php?id=" + id;
            }
        }

        function reloadPage() {
            window.location.href = window.location.href.split('?')[0];
        }
    </script>
</body>
<?php include "menuphp/footer.php"?>

</html>
