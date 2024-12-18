<?php include "menuphp/header.php"?>
<?php
include "ketnoi.php";

if (isset($_POST["submit"])) {
    // Lấy dữ liệu từ biểu mẫu
    $id_nv = $_POST['id_nv'];
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $diachi = $_POST['diachi'];
    $luong = $_POST['luong'];
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];

    // Bắt đầu transaction
    mysqli_begin_transaction($conn);

    try {
        // Thêm vào bảng nhanvien
        $sql_nhanvien = "INSERT INTO nhanvien (id_nv, hoten, ngaysinh, gioitinh, diachi, luong) VALUES ('$id_nv', '$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$luong')";
        $result_nhanvien = mysqli_query($conn, $sql_nhanvien);

        // Thêm vào bảng taikhoannhanvien
        $sql_taikhoan = "INSERT INTO taikhoannhanvien (idnv, taikhoan, matkhau) VALUES ('$id_nv', '$taikhoan', '$matkhau')";
        $result_taikhoan = mysqli_query($conn, $sql_taikhoan);

        // Nếu cả hai truy vấn đều thành công, commit transaction
        if ($result_nhanvien && $result_taikhoan) {
            mysqli_commit($conn);
            echo '<script>
            alert("Dữ liệu đã được thêm thành công.");
            window.location.href = "index.php";
            </script>';
        } else {
            throw new Exception("Thất bại: " . mysqli_error($conn));
        }
    } catch (Exception $e) {
        
        mysqli_rollback($conn);
        echo "Lỗi: " . $e->getMessage();
    }
}
?>



<body>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Thêm nhân viên mới</h3>
         <p class="text-muted">Hoàn tất biểu mẫu bên dưới để thêm nhân viên mới</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" onsubmit="return validateForm()" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label class="form-label">ID:</label>
               <input type="text" class="form-control" name="id_nv" id="id_nvInput" placeholder="NV001" required>
            </div>
            <div class="mb-3">
               <label class="form-label">Họ và tên:</label>
               <input type="text" class="form-control" name="hoten" id="hotenInput" placeholder="Nguyễn Văn A" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Ngày sinh:</label>
               <input type="date" class="form-control" name="ngaysinh" id="ngaysinhInput" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Giới tính:</label>
               <select class="form-control" name="gioitinh">
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                  <option value="Khác">Khác</option>
               </select>
            </div>

            <div class="mb-3">
               <label class="form-label">Địa chỉ:</label>
               <input type="text" class="form-control" name="diachi" id="diachiInput" placeholder="Hà Nội" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Lương:</label>
               <input type="text" class="form-control" name="luong" id="luongInput" placeholder="10000000" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Tài khoản:</label>
               <input type="text" class="form-control" name="taikhoan" id="taikhoanInput" placeholder="Username" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Mật khẩu:</label>
               <input type="password" class="form-control" name="matkhau" id="matkhauInput" placeholder="Password" required min="4">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Lưu</button>
               <a href="index.php" class="btn btn-danger">Hủy</a>
            </div>
         </form>
      </div>
   </div>

   <script>
      function validateForm() {
          var id_khachhangInput = document.getElementById('id_nvInput').value;
          var hotenInput = document.getElementById('hotenInput').value;
          var ngaysinhInput = document.getElementById('ngaysinhInput').value;
          var diachiInput = document.getElementById('diachiInput').value;
          var luongInput = document.getElementById('luongInput').value;
          var taikhoanInput = document.getElementById('taikhoanInput').value;
          var matkhauInput = document.getElementById('matkhauInput').value;

          // Kiểm tra xem các trường input có giá trị không
          if (id_nvInput.trim() === "" || hotenInput.trim() === "" || ngaysinhInput.trim() === "" || diachiInput.trim() === ""  || taikhoanInput.trim() === "" || matkhauInput.trim() === "") {
              alert("Vui lòng nhập đầy đủ thông tin .");
              return false; 
          }
          return true; 
      }
   </script>
</body>

<?php include "menuphp/footer.php"?>
