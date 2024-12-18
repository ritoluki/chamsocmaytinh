<?php include "menuphp/header.php"?>
<?php
include "ketnoi.php";

if (isset($_POST["submit"])) {
    $id_dv = $_POST['id_dichvu'];
    $tendv = $_POST['tendichvu'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];

    // Kiểm tra xem id_dichvu đã tồn tại chưa
    $check_id_sql = "SELECT * FROM `dichvu` WHERE id_dichvu = '$id_dv'";
    $check_id_result = mysqli_query($conn, $check_id_sql);

    // Kiểm tra xem tendichvu đã tồn tại chưa
    $check_tendv_sql = "SELECT * FROM `dichvu` WHERE tendichvu = '$tendv'";
    $check_tendv_result = mysqli_query($conn, $check_tendv_sql);

    // Nếu id_dichvu hoặc tendichvu đã tồn tại, hiển thị thông báo
    if (mysqli_num_rows($check_id_result) > 0) {
        echo '<script>
        alert("ID đã tồn tại. Vui lòng nhập mã ID khác.");
        </script>';
    } elseif (mysqli_num_rows($check_tendv_result) > 0) {
        echo '<script>
        alert("Tên dịch vụ đã tồn tại. Vui lòng nhập tên dịch vụ khác.");
        </script>';
    } else {
        // Nếu không có trùng lặp và dữ liệu đã được nhập đầy đủ, thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO `dichvu`(`id_dichvu`, `tendichvu`, `mota`, `gia`) VALUES ('$id_dv','$tendv','$mota','$gia')";
   
        $result = mysqli_query($conn, $sql);
   
        if ($result) {
            echo '<script>
            alert("Dữ liệu đã được thêm thành công.");
            window.location.href = "qldv.php";
            </script>';
        } else {
            echo "Thất bại: " . mysqli_error($conn);
        }
    }
}
?>


    <title>Thêm Dịch Vụ Mới</title>


<body>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Thêm dịch vụ mới</h3>
         <p class="text-muted">Hoàn tất biểu mẫu bên dưới để thêm dịch vụ mới</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" onsubmit="return validateForm()" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label class="form-label">ID:</label>
               <input type="text" class="form-control" name="id_dichvu" id="idInput" placeholder="DV001">
            </div>
            <div class="mb-3">
               <label class="form-label">Tên dịch vụ:</label>
               <input type="text" class="form-control" name="tendichvu" id="tendvInput" placeholder="Tên Dịch Vụ">
            </div>

            <div class="mb-3">
               <label class="form-label">Mô tả:</label>
               <input type="text" class="form-control" name="mota" id="motaInput" placeholder="Mô tả dịch vụ">
            </div>

            <div class="mb-3">
               <label class="form-label">Giá:</label>
               <input type="text" class="form-control" name="gia" id="giaInput" placeholder="Giá dịch vụ">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Lưu</button>
               <a href="qldv.php" class="btn btn-danger">Hủy</a>
            </div>
         </form>
      </div>
   </div>

   
   <script>
    function validateForm() {
        var idInput = document.getElementById('idInput').value;
        var tendvInput = document.getElementById('tendvInput').value;
        var motaInput = document.getElementById('motaInput').value;
        var giaInput = document.getElementById('giaInput').value;

        // Kiểm tra xem các trường input có giá trị không
        if (idInput.trim() === "" || tendvInput.trim() === "" || motaInput.trim() === "" || giaInput.trim() === "") {
            alert("Vui lòng nhập đầy đủ thông tin dịch vụ.");
            return false; // Ngăn chặn form gửi đi nếu dữ liệu không hợp lệ
        }
        return true; // Cho phép form gửi đi nếu dữ liệu hợp lệ
    }
</script>

</body>


<?php include "menuphp/footer.php"?>
