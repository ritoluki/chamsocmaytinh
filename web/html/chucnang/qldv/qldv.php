<?php include "menuphp/header.php"?>
<?php
include "ketnoi.php";

include "timkiemdv.php";
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Quản lý dịch vụ</title>
    <style>
        .btn-group {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <div class="container mt-3">
        <form action="" method="get" class="d-flex justify-content-between align-items-center">
            <div class="mb-3 d-flex align-items-center">
                <input type="text" class="form-control form-control-sm me-2 rounded-pill" name="search" placeholder="Nhập từ khóa">
                <button href="javascript:void(0);" type="submit" class="btn btn-primary btn-sm rounded-pill"><i class="fa-solid fa-search"></i></button>
            </div>
            <div class="mb-3 btn-group">
            <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/admin.php" class="btn btn-warning btn-sm rounded-pill"><i class="fa-solid fa-home"></i> Trang chủ</a>
                <a href="themdv.php" class="btn btn-primary btn-sm rounded-pill"><i class="fa-solid fa-user-plus"></i> Thêm dịch vụ</a>
                <button type="button" class="btn btn-success btn-sm rounded-pill" onclick="reloadPage()"><i class="fa-solid fa-sync"></i> Làm mới</button>
            </div>
        </form>

        <!-- Bảng dữ liệu -->
        <table class="table table-hover text-center table-bordered">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên dịch vụ</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["id_dichvu"] ?></td>
                        <td><?php echo $row["tendichvu"] ?></td>
                        <td><?php echo $row["mota"] ?></td>
                        <td><?php echo $row["gia"] ?></td>
                        <td>
                            <a href="suadv.php?id=<?php echo $row["id_dichvu"] ?>" class="btn btn-primary mx-2">
                                <i class="fa-solid fa-pen-to-square fs-5 me-1 text-dark"></i>Sửa
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDelete('<?php echo $row['id_dichvu']; ?>')">
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
            var r = confirm("Bạn có chắc chắn muốn xóa dịch vụ này không?");
            if (r == true) {
                window.location.href = "xoadv.php?id=" + id;
            }
        }

        function reloadPage() {
            window.location.href = window.location.href.split('?')[0];
        }
    </script>
</body>

<?php include "menuphp/footer.php"?>
