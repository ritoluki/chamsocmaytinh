<?php include "menuphp/header.php" ?>
<?php
include "ketnoi.php";

if (isset($_POST["submit"])) {
    $tenlinhkien = $_POST['tenlinhkien'];
    $mota = $_POST['mota'];
    $soluong = $_POST['soluong'];
    $id_loailinhkien = $_POST['id_loailinhkien'];
    $id_linhkien = $_POST['id_linhkien'];
    $gia_linhkien = $_POST['gia_linhkien'];

    // Kiểm tra trùng lặp trước khi thực hiện thêm mới
    $checkDuplicateSql = "SELECT * FROM `linhkien` WHERE `tenlinhkien` = '$tenlinhkien'";
    $duplicateResult = mysqli_query($conn, $checkDuplicateSql);

    if (mysqli_num_rows($duplicateResult) > 0) {
        echo '<script>
                alert("Tên linh kiện đã tồn tại. Vui lòng chọn tên linh kiện khác.");
              </script>';
    } else {
        // Nếu không trùng lặp, thực hiện thêm mới
        $sql = "INSERT INTO `linhkien` (`id_linhkien`, `tenlinhkien`, `mota`, `soluong`, `id_loailinhkien`, `gia_linhkien`) VALUES ('$id_linhkien','$tenlinhkien','$mota','$soluong','$id_loailinhkien','$gia_linhkien')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            alert("Dữ liệu đã được thêm thành công.");
            window.location.href = "linhkien.php"; 
          </script>';
        } else {
            echo "Thất bại: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Thêm Linh Kiện Mới</title>
</head>

<body>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Thêm linh kiện mới</h3>
         <p class="text-muted">Hoàn tất biểu mẫu bên dưới để thêm linh kiện mới</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" onsubmit="return validateForm()" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label class="form-label">ID Linh Kiện:</label>
               <input type="text" class="form-control" name="id_linhkien" id="id_linhkienInput" placeholder="ID Linh Kiện">
            </div>
            <div class="mb-3">
               <label class="form-label">Tên linh kiện:</label>
               <input type="text" class="form-control" name="tenlinhkien" id="tenlinhkienInput" placeholder="Tên Linh Kiện">
            </div>
            <div class="mb-3">
               <label class="form-label">Mô tả:</label>
               <input type="text" class="form-control" name="mota" id="motaInput" placeholder="Mô Tả">
            </div>

            <div class="mb-3">
               <label class="form-label">Số lượng:</label>
               <input type="text" class="form-control" name="soluong" id="soluongInput" placeholder="Số Lượng">
            </div>

            <div class="mb-3">
               <label class="form-label">Loại linh kiện:</label>
               <!-- Thêm select box để chọn loại linh kiện -->
               <select class="form-select" name="id_loailinhkien" id="loailinhkienInput">
                  <?php
                  $queryLoaiLinhKien = mysqli_query($conn, "SELECT * FROM `loailinhkien`");
                  while ($loaiLinhKien = mysqli_fetch_assoc($queryLoaiLinhKien)) {
                      echo "<option value='{$loaiLinhKien['id_loailinhkien']}'>{$loaiLinhKien['ten_loailinhkien']}</option>";
                  }
                  ?>
               </select>
            </div>
               
            <div class="mb-3">
               <label class="form-label">Giá:</label>
               <input type="text" class="form-control" name="gia_linhkien" id="giaInput" placeholder="Giá">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Lưu</button>
               <a href="linhkien.php" class="btn btn-danger">Hủy</a> 
         </form>
      </div>
   </div>

   <script>
      function validateForm() {
          var id_linhkienInput = document.getElementById('id_linhkienInput').value;
          var tenlinhkienInput = document.getElementById('tenlinhkienInput').value;
          var motaInput = document.getElementById('motaInput').value;
          var soluongInput = document.getElementById('soluongInput').value;

          // Kiểm tra xem các trường input có giá trị không
          if (id_linhkienInput.trim() === "" || tenlinhkienInput.trim() === "" || motaInput.trim() === "" || soluongInput.trim() === "") {
              alert("Vui lòng nhập đầy đủ thông tin linh kiện.");
              return false; // Ngăn chặn form gửi đi nếu dữ liệu không hợp lệ
          }
          return true; // Cho phép form gửi đi nếu dữ liệu hợp lệ
      }
   </script>

</body>

</html>
<?php include "menuphp/footer.php"?>