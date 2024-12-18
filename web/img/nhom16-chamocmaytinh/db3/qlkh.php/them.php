<?php
include "ketnoi.php";

if (isset($_POST["submit"])) {
   $id_kh = $_POST['id_kh'];
   $hoten = $_POST['hoten'];
   $ngaysinh = $_POST['ngaysinh'];
   $diachi = $_POST['diachi'];
   $sodienthoai = $_POST['sodienthoai'];

   $sql = "INSERT INTO `khachhang`(`id_kh`, `hoten`, `ngaysinh`, `diachi`, `sodienthoai`) VALUES ('$id_kh','$hoten','$ngaysinh','$diachi','$sodienthoai')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=Thêm khách hàng thành công");
   } else {
      echo "Thất bại: " . mysqli_error($conn);
   }
}

?>

<!DOCTYPE html>
<html lang="vi">

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
         <h3>Thêm khách hàng mới</h3>
         <p class="text-muted">Hoàn tất biểu mẫu bên dưới để thêm khách hàng mới</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
         <div class="mb-3">
               <label class="form-label">ID:</label>
               <input type="text" class="form-control" name="id_kh" placeholder="KH001">
            </div> 
            <div class="mb-3">
               <label class="form-label">Họ và tên:</label>
               <input type="text" class="form-control" name="hoten" placeholder="Nguyễn Văn A">
            </div>

            <div class="mb-3">
               <label class="form-label">Ngày sinh:</label>
               <input type="date" class="form-control" name="ngaysinh">
            </div>

            <div class="mb-3">
               <label class="form-label">Địa chỉ:</label>
               <input type="text" class="form-control" name="diachi" placeholder="Hà Nội">
            </div>

            <div class="mb-3">
               <label class="form-label">Số điện thoại:</label>
               <input type="text" class="form-control" name="sodienthoai" placeholder="0987654321">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Lưu</button>
               <a href="index.php" class="btn btn-danger">Hủy</a>
            </div>
         </form>
      </div>
   </div>

   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
