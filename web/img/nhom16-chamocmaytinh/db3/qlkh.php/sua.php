<?php
include "ketnoi.php";

$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $hoten = $_POST['hoten'];
  $ngaysinh = $_POST['ngaysinh'];
  $diachi = $_POST['diachi'];
  $sodienthoai = $_POST['sodienthoai'];

  $sql = "UPDATE `Khachhang` SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `diachi`='$diachi', `sodienthoai`='$sodienthoai' WHERE id_kh = '$id'";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Dữ liệu đã được cập nhật thành công");
  } else {
    echo "Thất bại: " . mysqli_error($conn);
  }
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

  
</head>

<body>
 

  <div class="container">
    <div class="text-center mb-4">
      <h3>Chỉnh sửa thông tin khách hàng</h3>
      <p class="text-muted">Nhấn cập nhật sau khi thay đổi thông tin</p>
    </div>

    <?php
    $sql = "SELECT * FROM `khachhang` WHERE id_kh = '$id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="mb-3">
          <label class="form-label">Họ tên:</label>
          <input type="text" class="form-control" name="hoten" value="<?php echo $row['hoten'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Ngày sinh:</label>
          <input type="text" class="form-control" name="ngaysinh" value="<?php echo $row['ngaysinh'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Địa chỉ:</label>
          <input type="text" class="form-control" name="diachi" value="<?php echo $row['diachi'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Số điện thoại:</label>
          <input type="text" class="form-control" name="sodienthoai" value="<?php echo $row['sodienthoai'] ?>">
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Cập nhật</button>
          <a href="index.php" class="btn btn-danger">Hủy</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
