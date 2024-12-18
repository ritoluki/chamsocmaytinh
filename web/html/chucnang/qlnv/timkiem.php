<?php
include "ketnoi.php";

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Kết quả tìm kiếm</title>
</head>

<body>

    <div class="container">
        <div class="mb-3">
            <a href="index.php" class="btn btn-secondary mt-2"><i class="fa-solid fa-arrow-left"></i> Quay lại</a>
        </div>

        <h2>Kết quả tìm kiếm cho "<?php echo $search; ?>"</h2>

        <table class="table table-hover text-center table-bordered">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Lương</th>
                    <th scope="col">Action</th>
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
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
