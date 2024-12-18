<?php include "menuphp/header.php" ?>
<?php
include "ketnoi.php";

if (isset($_POST["submit"])) {
    $id_khachhang = $_POST['id_khachhang'];
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];

    // Kiểm tra dữ liệu đã được nhập chưa
    if (empty($id_khachhang) || empty($hoten) || empty($ngaysinh) || empty($diachi) || empty($sodienthoai)) {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin.")</script>';
    } else {
        // Kiểm tra trùng lặp ID hoặc số điện thoại trước khi thực hiện thêm mới
        $checkDuplicateSql = "SELECT * FROM `khachhang` WHERE `id_kh` = '$id_khachhang' OR `sodienthoai` = '$sodienthoai'";
        $duplicateResult = mysqli_query($conn, $checkDuplicateSql);

        if (mysqli_num_rows($duplicateResult) > 0) {
            echo '<script>alert("ID hoặc Số điện thoại đã tồn tại. Vui lòng chọn ID hoặc Số điện thoại khác.")</script>';
        } else {
            // Nếu không trùng lặp, thực hiện thêm mới
            $sql = "INSERT INTO `khachhang`(`id_kh`, `hoten`, `ngaysinh`, `diachi`, `sodienthoai`) VALUES ('$id_khachhang','$hoten','$ngaysinh','$diachi','$sodienthoai')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '<script>alert("Dữ liệu đã được thêm thành công."); window.location.href = "khachhang.php";</script>';
            } else {
                echo "Thất bại: " . mysqli_error($conn);
            }
        }
    }
}
?>



<body>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Thêm khách hàng mới</h3>
         <p class="text-muted">Hoàn tất biểu mẫu bên dưới để thêm khách hàng mới</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" onsubmit="return validateForm()" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label class="form-label">ID Khách hàng:</label>
               <input type="text" class="form-control" name="id_khachhang" id="id_khachhangInput" placeholder="ID Khách hàng">
            </div>

            <div class="mb-3">
               <label class="form-label">Họ tên:</label>
               <input type="text" class="form-control" name="hoten" id="hotenInput" placeholder="Họ Tên">
            </div>
            <div class="mb-3">
               <label class="form-label">Ngày sinh:</label>
               <input type="date" class="form-control" name="ngaysinh" id="ngaysinhInput">
            </div>

            <div class="mb-3">
               <label class="form-label">Địa chỉ:</label>
               <input type="text" class="form-control" name="diachi" id="diachiInput" placeholder="Địa Chỉ">
            </div>

            <div class="mb-3">
               <label class="form-label">Số điện thoại:</label>
               <input type="text" class="form-control" name="sodienthoai" id="sodienthoaiInput" placeholder="Số Điện Thoại">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Lưu</button>
               <a href="khachhang.php" class="btn btn-danger">Hủy</a>
            </div>
         </form>
      </div>
   </div>

   <script>
      function validateForm() {
          var id_khachhangInput = document.getElementById('id_khachhangInput').value;
          var hotenInput = document.getElementById('hotenInput').value;
          var ngaysinhInput = document.getElementById('ngaysinhInput').value;
          var diachiInput = document.getElementById('diachiInput').value;
          var sodienthoaiInput = document.getElementById('sodienthoaiInput').value;

          // Kiểm tra xem các trường input có giá trị không
          if (id_khachhangInput.trim() === "" || hotenInput.trim() === "" || ngaysinhInput.trim() === "" || diachiInput.trim() === "" || sodienthoaiInput.trim() === "") {
              alert("Vui lòng nhập đầy đủ thông tin khách hàng.");
              return false; 
          }
          return true; 
      }
   </script>

</body>


<?php include "menuphp/footer.php"?>