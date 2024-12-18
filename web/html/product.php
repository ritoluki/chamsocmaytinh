<?php
session_start(); // Bắt đầu session
include "ketnoi.php";

// Kiểm tra nút "Thêm vào giỏ hàng" được nhấn hay không
if (isset($_POST['add_to_cart'])) {
  $productId = $_POST['product_id']; // Chú ý: Điều này cần được gửi từ form của bạn
  $productName = $_POST['product_name'];
  $productPrice = $_POST['product_price'];
  $productImage = $_POST['product_image'];

  // $productPrice = 500000;
  // Tạo thông tin sản phẩm
  $productInfo = array(
    'id' => $productId,
    'name' => $productName,
    'price' => $productPrice,
    'image' => $anhLinhKienArray[$index], // Sửa để lấy đúng ảnh từ mảng
    // Thêm các thông tin khác nếu cần
    
  );
  if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id']; // Chú ý: Điều này cần được gửi từ form của bạn
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productImage = $_POST['product_image'];

    
  // Thêm sản phẩm vào giỏ hàng (mảng session)
  $_SESSION['sanpham'][] = $productInfo;

  // Thiết lập thông báo
  $_SESSION['added_to_cart_message'] = "Sản phẩm $productName đã được thêm vào giỏ hàng!";

  // Chuyển hướng về trang sản phẩm (hoặc trang giỏ hàng nếu bạn có)
  header("Location: product.php");
  exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="Utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
  <title>Laptop.vn - Sửa chữa máy tính</title>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/spacing.css" />
  <link rel="stylesheet" href="css/slick.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/responsive.css" />

  <script>
    // Kiểm tra xem đã có thông báo từ PHP hay chưa
    var addedToCartMessage = "<?php echo isset($_SESSION['added_to_cart_message']) ? $_SESSION['added_to_cart_message'] : '' ?>";

    // Nếu có thông báo, hiển thị nó bằng JavaScript và sau đó xóa đi
    if (addedToCartMessage !== '') {
      alert(addedToCartMessage);
      <?php unset($_SESSION['added_to_cart_message']); ?>
    }
  </script>
</head>

<body>
  <section class="tf__topbar">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-9">
          <ul class="tf__topbar_left d-flex flex-wrap">
            <li>
              <p><i class="fas fa-map-marker-alt"></i> Hoai Duc, Ha Noi</p>
            </li>
            <li>
              <a href="mailto:laptop24h@hotmail.com"><i class="fas fa-envelope"></i> laptop24h@hotmail.com</a>
            </li>
            <li>
              <a href="callto:+84 123.456.789"><i class="fas fa-phone-alt"></i> +84 123.456.789
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <nav class="navbar navbar-expand-lg main_menu">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <h3>Laptop.vn</h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fal fa-bars menu_icom"></i>
        <i class="fal fa-times menu_close"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">trang chủ
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">dịch vụ <i class="far fa-angle-down"></i></a>
            <ul class="tf__droap_menu">
              <?php
              $sql = "SELECT * FROM Dichvu";
              $result = mysqli_query($conn, $sql);

              // Kiểm tra xem có dữ liệu hay không
              if ($result) {
                // Lặp qua từng dòng dữ liệu
                while ($row = mysqli_fetch_assoc($result)) {
                  $idDichVu = $row['id_dichvu'];
                  $tenDichVu = $row['tendichvu'];

                  // In ra thẻ <li> với tên dịch vụ và đường dẫn tương ứng
                  echo "<li><a href='service_info.php?id=$idDichVu'>$tenDichVu</a></li>";
                }

                // Giải phóng bộ nhớ sau khi sử dụng kết quả truy vấn
                mysqli_free_result($result);
              } else {
                // In thông báo lỗi nếu có
                echo "Lỗi truy vấn dịch vụ: " . mysqli_error($conn);
              }
              ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">sản phẩm </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">chính sách bảo hành <i class="far fa-angle-down"></i></a>
            <ul class="tf__droap_menu">
              <li><a href="#">bảo hành sản phẩm</a></li>
              <li><a href="#">bảo hành dịch vụ</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">đăng nhập</a>
          </li>
        </ul>
        <ul class="menu_right d-flex flex-wrap">
          <li>
            <a href="#" class="menu_search"><i class="far fa-search"></i></a>
            <div class="tf__search_form">
              <form>
                <span class="close_search"><i class="far fa-times"></i></span>
                <input type="text" placeholder="Tìm kiếm..." />
                <button type="submit">OK</button>
              </form>
            </div>
          </li>
          <li>
            <a href="cart.php"><i class="far fa-shopping-cart"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="tf__breadcrumb" style="background: url(images/login_avt.jpg)">
    <div class="tf__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="tf__breadcrumb_text">
              <h1>Sản phẩm</h1>
              <ul>
                <li>
                  <a href="index.html"><i class="fas fa-home"></i> Trang chủ</a>
                </li>
                <li><a href="#">Sản phẩm</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="tf__services mt_115 xs_mt_70" style="background: url(images/background_shapes.jpg)">
    <div class="container">
      <div class="row">
        <div class="col-xl-7 col-lg-8 col-md-10 wow fadeInUp" data-wow-duration="1s">
          <div class="tf__section_heading tf__heading_left mb_35">
            <h5>Sản phẩm của chúng tôi</h5>
            <h3>Thiết bị, linh kiện cho máy tính</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
        // Phần hiển thị linh kiện
        $sql = "SELECT * FROM linhkien LIMIT 6";
        $result = mysqli_query($conn, $sql);

        $anhLinhKienArray = array(
          "sp_8.jpg",
          "sp_2.jpg",
          "sp_4.jpg",
          "sp_5.jpg",
          "sp_6.jpg",
          "sp_7.jpg"
        );

        if ($result && mysqli_num_rows($result) > 0) {
          $index = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $tenLinhKien = $row['tenlinhkien'];
            $moTaLinhKien = $row['mota'];
            $gia = $row['gia_linhkien'];
            $anhLinhKien = $anhLinhKienArray[$index];

            echo "<div class='col-lg-6 wow fadeInUp' data-wow-duration='1s'>";
            echo "<div class='tf__services_item'>";
            echo "<div class='tf__services_img'>";
            echo "<img src='images/$anhLinhKien' alt='services' class='img-fluid w-100' />";
            echo "<a href='#'><i class='fas fa-heart'></i></a>";
            echo "</div>";
            echo "<div class='tf__services_text'>";
            echo "<a class='title' href='mota.php'>$tenLinhKien</a>";
            echo "<p>$moTaLinhKien</p>";
            echo '<ul>';
            echo '<li><i class="fas fa-play"></i>Số lượng: ' .$row['soluong'].  '</li>';
            echo '<li><i class="fas fa-money-bill"></i>Giá: ' . $row['gia_linhkien']. "$".'</li>';
            echo '</ul>';
            echo "<div class='tf__services_btn_area'>";
            echo "<form action='product.php' method='post'>";
            echo "<input type='hidden' name='product_id' value='$index'>";
            echo "<input type='hidden' name='product_name' value='$tenLinhKien'>";
            echo "<input type='hidden' name='product_image' value='$anhLinhKien'>";
            echo "<input type='hidden' name='product_price' value='$gia'>";
            echo "<button type='submit' name='add_to_cart' class='read_btn'>Thêm vào giỏ hàng</button>";
            echo "</form>";
            echo "<p>";
            echo "<i class='fas fa-star'></i>";
            echo "<i class='fas fa-star'></i>";
            echo "<i class='fas fa-star'></i>";
            echo "<i class='fas fa-star'></i>";
            echo "<i class='fas fa-star'></i>";
            echo "<span>240</span>";
            echo "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            $index++;
          }

          mysqli_free_result($result);
        } else {
          echo "Không có dữ liệu linh kiện hoặc có lỗi truy vấn: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
        ?>
      </div>

  </section>
  <section>
    <div class="row">
      <a href="service_info.php"
        style="font-size: 20px; display: block; text-align: center; padding: 5px; background: var(--colorPrimary); color: var(--colorWhite) !important; text-transform: capitalize; font-weight: 500; border-radius: 5px; position: relative; transition: all linear 0.3s; -webkit-transition: all linear 0.3s; -moz-transition: all linear 0.3s; -ms-transition: all linear 0.3s; -o-transition: all linear 0.3s; -webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; -o-border-radius: 5px; text-decoration: none;">
        All Services
      </a>

    </div>
  </section>
  <footer class="tf__footer mt_180 xs_mt_130" style="background: url(images/footer_bg.jpg)">
    <div class="container">
      <div class="row mt_20 xs_mt_10 pb_80 xs_pb_35 md_padding justify-content-between">
        <div class="col-xl-3 col-md-6 col-lg-4">
          <div class="tf__footer_map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8169397280276!2d105.739383376103!3d21.040009480612166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135096b31fa7abb%3A0xff645782804911af!2zVHLGsOG7nW5nIMSR4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgxJDDtG5nIMOB!5e0!3m2!1svi!2s!4v1705589462608!5m2!1svi!2s"
              width="600" height="360" style="border: 5" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <div class="col-xl-2 col-sm-6 col-md-4 col-lg-2">
          <div class="tf__footer_link">
            <h4>Dịch vụ của chúng tôi</h4>
            <ul>
              <li><a href="#">Facials</a></li>
              <li><a href="#">Waxing</a></li>
              <li><a href="#">Message</a></li>
              <li><a href="#">Mineral Baths</a></li>
              <li><a href="#">Body Treatments</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 col-lg-4 order-lg-4">
          <div class="tf__footer_link">
            <h4>Thông tin liên hệ</h4>
            <p><i class="fas fa-phone-alt"></i> +84 123.456.789</p>
            <p><i class="fas fa-envelope"></i>laptop24h@hotmail.com</p>
            <p><i class="fas fa-map-marker-alt"></i> Hau Ai, Hoai Duc</p>
          </div>
        </div>
      </div>
    </div>
    <hr />
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="tf__footer_copyright">
            <p>
              Copyright © <a href="index.html">laptop.vn</a> 2023. All Rights
              Reserved
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="js/jquery-3.6.0.min.js"></script>
  <!--bootstrap js-->
  <script src="js/bootstrap.bundle.min.js"></script>
  <!--font-awesome js-->
  <script src="js/Font-Awesome.js"></script>
  <!--venobox js-->
  <script src="js/venobox.min.js"></script>
  <!--slick slider js-->
  <script src="js/slick.min.js"></script>
  <!--cursor pointer js-->
  <script src="js/pointer.js"></script>
  <!--isotop js-->
  <script src="js/isotope.pkgd.min.js"></script>
  <!--counter js-->
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.countup.min.js"></script>
  <!--barfiller js-->
  <script src="js/animated_barfiller.js"></script>
  <!--nice select js-->
  <script src="js/jquery.nice-select.min.js"></script>
  <!--stucky sidebar js-->
  <script src="js/sticky_sidebar.js"></script>
  <!--simply countdown js-->
  <script src="js/simplyCountdown.js"></script>
  <!--wow js-->
  <script src="js/wow.min.js"></script>

  <!--main/custom js-->
  <script src="js/main.js"></script>
</body>

</html>