<?php include "menuphp/header.php"?>
<?php
include "ketnoi.php";
include "timkiemsddv.php";


?>

<body>
    <div class="container mt-3">
        
        <form action="" method="get" class="d-flex justify-content-between align-items-center" onsubmit="return validateSearchForm()">
            <div class="mb-3 d-flex align-items-center">
                <input type="text" class="form-control form-control-sm me-2 rounded-pill" name="search" id="searchInput" placeholder="Nhập từ khóa">
                <button type="submit" class="btn btn-primary btn-sm rounded-pill"><i class="fa-solid fa-search"></i></button>
                
            </div>
            <div class="mb-3 btn-group">
                <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/admin.php" class="btn btn-warning btn-sm rounded-pill"><i class="fa-solid fa-home"></i> Trang chủ</a>
                
                <button type="button" class="btn btn-success btn-sm rounded-pill" onclick="reloadPage()"><i class="fa-solid fa-sync"></i> Làm mới</button>
            </div>
        </form>

        <!-- Your table goes here -->
        <table class="table table-hover text-center table-bordered">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên Khách hàng</th>
                    <th scope="col">Tên Dịch vụ</th>
                    <th scope="col">Ngày sử dụng</th>
                    <th scope="col">Đánh giá</th>
                    <th scope="col">Thanh toán</th> <!-- Added column -->
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["id_sudungdichvu"] ?></td>
                        <td><?php echo $row["tenkhachhang"] ?></td>
                        <td><?php echo $row["tendichvu"] ?></td>
                        <td><?php echo $row["ngaysudung"] ?></td>
                        <td><?php echo $row["danhgia"] ?></td>
                        <td>
    <?php 
        if ($row["thanhtoan"] == 1) {
            echo "Đã thanh toán";
        } else {
            echo "Chưa thanh toán";
        }
    ?>
</td>
 <!-- Added column -->
                        <td>
                            <a href="thongtinct.php?id=<?php echo $row["id_sudungdichvu"] ?>" class="btn btn-primary mx-2">
                                <i class="fa-solid fa-pen-to-square fs-5 me-1 text-dark"></i>Chi tiết
                            </a>
                            <a href="suasddv.php?id=<?php echo $row["id_sudungdichvu"] ?>" class="btn btn-warning mx-2">
        <i class="fa-solid fa-edit fs-5 me-1 text-dark"></i>Sửa
    </a>
                            <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDelete('<?php echo $row['id_sudungdichvu']; ?>')">
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

    <!-- Your JavaScript code goes here -->
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
                window.location.href = "xoasddv.php?id=" + id;
            }
        }

        function reloadPage() {
            window.location.href = window.location.href.split('?')[0];                                                                                                   
        }
    </script>
</body>

<?php include "menuphp/footer.php"?>
