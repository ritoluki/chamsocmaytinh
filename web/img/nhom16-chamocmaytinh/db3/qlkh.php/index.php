<?php
include "ketnoi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> Quản lý khách hàng</title>
</head>

<body>

    <!--them-->
    <div class="container">
        <?php
        if (isset($_GET["add"])) {
            $msg = $_GET["add"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            ' . $add . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
        <a href="them.php" class="btn btn-primary mb-3"><i class="fa-solid fa-user-plus"></i>Thêm khách hàng</a>

        <table class="table table-hover text-center table-bordered">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!--load data-->
                <?php
                $sql = "SELECT * FROM `khachhang`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["id_kh"] ?></td>
                        <td><?php echo $row["hoten"] ?></td>
                        <td><?php echo $row["ngaysinh"] ?></td>
                        <td><?php echo $row["diachi"] ?></td>
                        <td><?php echo $row["sodienthoai"] ?></td>
                        <td>
                        <a href="sua.php?id=<?php echo $row["id_kh"] ?>" class="btn btn-primary mx-2">
        <i class="fa-solid fa-pen-to-square fs-5 me-1 text-dark"></i>Sửa
    </a>
    <a href="xoa.php?id=<?php echo $row["id_kh"] ?>" class="btn btn-danger">
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

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
