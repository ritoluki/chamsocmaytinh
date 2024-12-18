
<?php
include "ketnoi.php";

?>



<head>
    
    
    <style>
        .btn-group {
            margin-right: 10px;
        }
    </style>
</head>
<?php include "menuphp/header.php" ?>
<body>
    <?php include "timkiemlk.php"?>
    <div class="container mt-3">
        <form action="" method="get" class="d-flex justify-content-between align-items-center" onsubmit="return validateSearchForm()">
            <div class="mb-3 d-flex align-items-center">
                <input type="text" class="form-control form-control-sm me-2 rounded-pill" name="search" id="searchInput" placeholder="Nhập từ khóa">
                <button type="submit" class="btn btn-primary btn-sm rounded-pill"><i class="fa-solid fa-search"></i></button>
            </div>
            <div class="mb-3 btn-group">
            <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/admin.php" class="btn btn-warning btn-sm rounded-pill"><i class="fa-solid fa-home"></i> Trang chủ</a> 
                <a href="themlk.php" class="btn btn-primary btn-sm rounded-pill"><i class="fa-solid fa-user-plus"></i> Thêm linh kiện</a>
                <a href="loailinhkien.php" class="btn btn-info btn-sm rounded-pill"><i class="fa-solid fa-cog"></i> Loại linh kiện</a>
                <button type="button" class="btn btn-success btn-sm rounded-pill" onclick="reloadPage()"><i class="fa-solid fa-sync"></i> Làm mới</button>
            </div>
        </form>

        <!-- Bảng dữ liệu -->
        <table class="table table-hover text-center table-bordered">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên linh kiện</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Loại linh kiện</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["id_linhkien"] ?></td>
                        <td><?php echo $row["tenlinhkien"] ?></td>
                        <td><?php echo $row["mota"] ?></td>
                        <td><?php echo $row["soluong"] ?></td>
                        <td><?php echo $row["ten_loailinhkien"] ?></td> <!-- Hiển thị tên loại linh kiện -->
                        <td><?php echo $row["gia_linhkien"] ?></td>
                        <td>
                            <a href="sualk.php?id=<?php echo $row["id_linhkien"] ?>" class="btn btn-primary mx-2">
                                <i class="fa-solid fa-pen-to-square fs-5 me-1 text-dark"></i>Sửa
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDelete('<?php echo $row['id_linhkien']; ?>')">
                                <i class="fa-solid fa-trash fs-5 me-1 text-dark"></i>Xóa
                            </a>
                            <a href="chitietlk.php?id=<?php echo $row["id_linhkien"] ?>" class="btn btn-info mx-2">
        <i class="fa-solid fa-info-circle fs-5 me-1 text-dark"></i>Chi tiết
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
            var r = confirm("Bạn có chắc chắn muốn xóa linh kiện này không?");
            if (r == true) {
                window.location.href = "xoalk.php?id=" + id;
            }
        }

        function reloadPage() {
            window.location.href = window.location.href.split('?')[0];
        }
    </script>
</body>

<?php include "menuphp/footer.php"?>
