<?php
session_start(); // Bắt đầu session
include "ketnoi.php";

if (isset($_POST['add_to_cart'])) {
  $productId = $_POST['product_id']; // Chú ý: Điều này cần được gửi từ form của bạn
  $productName = $_POST['product_name'];
  $productPrice = $_POST['product_price'];
  $productImage = $_POST['product_image'];

  $anhLinhKienArray = array(
    "sp_8.jpg",
    "sp_2.jpg",
    "sp_4.jpg",
    "sp_5.jpg",
    "sp_6.jpg",
    "sp_7.jpg"
  );

  // Tạo thông tin sản phẩm
  $productInfo = array(
    'id' => $productId,
    'name' => $productName,
    'price' => $productPrice,
    'image' => $anhLinhKienArray[$index],
    // Thêm các thông tin khác nếu cần
  );

  // Thêm sản phẩm vào giỏ hàng (mảng session)
  $_SESSION['sanpham'][] = $productInfo;

  // Thiết lập thông báo
  $_SESSION['added_to_cart_message'] = "Sản phẩm $productName đã được thêm vào giỏ hàng!";
}


if (isset($_GET['act']) && $_GET['act'] == 'cart' && isset($_GET['xuli']) && $_GET['xuli'] == 'delete' && isset($_GET['id'])) {
  $productIdToDelete = $_GET['id'];

  // Tìm vị trí của sản phẩm trong giỏ hàng và xóa nó
  foreach ($_SESSION['sanpham'] as $key => $product) {
    if ($product['id'] == $productIdToDelete) {
      unset($_SESSION['sanpham'][$key]);
      break;
    }
  }

  // Hiển thị thông báo hoặc chuyển hướng về trang giỏ hàng
  echo "Sản phẩm đã được xóa khỏi giỏ hàng!";
  // Hoặc chuyển hướng về trang giỏ hàng
  // header('Location: ?act=cart');
  // exit();
}
// Tính tổng giá trị giỏ hàng
$count = 0;
if (!empty($_SESSION['sanpham'])) {
  foreach ($_SESSION['sanpham'] as $value) {
    $count += $value['price'];
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
                  echo "<li><a href='service_info.php'>$tenDichVu</a></li>";
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
            <a class="nav-link" href="product.php">sản phẩm </a>
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
              <h1>Giỏ hàng</h1>
              <ul>
                <li>
                  <a href="index.php"><i class="fas fa-home"></i> Trang chủ</a>
                </li>
                <li><a href="cart.php">Giỏ hàng</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- pages-title-start -->

  <section class="pages cart-page section-padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive padding60">
            <?php if (!empty($_SESSION['sanpham'])): ?>
              <table class="wishlist-table text-center" id="dxd">
                <thead>
                  <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($_SESSION['sanpham'] as $key => $value): ?>
                    <tr>
                      <td class="td-img text-left b">

                        <!-- Thêm nút xóa sản phẩm -->
                        <div class="product-info">
                          <a href="?act=cart&xuli=delete&id=<?php echo $value['id']; ?>" class="remove-product"
                            title="Xóa sản phẩm"><i class='mdi mdi-close'></i></a>
                          <div class="items-dsc">
                            <h5>
                              <?= $value['name'] ?>
                            </h5>
                          </div>
                        </div>
                      </td>
                      <td>
                        <?= number_format($value['price']) ?> VNĐ
                      </td>
                      <td>
                        <!-- Form để cập nhật số lượng sản phẩm -->
                        <form action="?act=cart&xuli=update&id=<?= $value['id'] ?>" method="POST">
                          <div class="plus-minus">
                            <button class="dec qtybutton" type="submit" name="decrease">-</button>
                            <b class="plus-minus-box">
                              <?= isset($value['quantity']) ? $value['quantity'] : 1 ?>
                            </b>
                            <button class="inc qtybutton" type="submit" name="increase">+</button>
                          </div>
                        </form>
                      </td>
                      <td>
                        <strong>
                          <?= isset($value['quantity']) ? number_format($value['price'] * $value['quantity']) : $value['price'] ?> VNĐ
                        </strong>
                      </td>
                      <td>
                        <!-- Thêm nút xóa sản phẩm -->
                        <a href="?act=cart&xuli=delete&id=<?= $value['id']; ?>"
                          class="btn btn-danger btn-sm remove-product-btn">Xóa</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else: ?>
              <p>Giỏ hàng của bạn trống rỗng.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row margin-top">
        <div class="col-sm-6">
          <div class="single-cart-form padding60">
            <div class="log-title">
              <h3><strong>Chi tiết thanh toán</strong></h3>
            </div>
            <div class="cart-form-text pay-details table-responsive">
              <table>
                <tbody>
                  <tr>
                    <th>Tổng Giỏ Hàng</th>
                    <td>
                      <?= number_format($count) ?> VNĐ
                    </td>
                  </tr>
                  <tr>
                    <th>Giảm giá</th>
                    <td>0%</td>
                  </tr>
                  <tr>
                    <th>Vận Chuyển</th>
                    <td>15,000 VNĐ</td>
                  </tr>
                  <tr>
                    <th>VAT</th>
                    <td>0 VNĐ</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th class="tfoot-padd">Tổng tiền</th>
                    <td class="tfoot-padd">
                      <?= number_format($count + 15000) ?> VNĐ
                    </td>
                  </tr>
                </tfoot>
              </table>
              <div class="submit-text coupon">
                <form action="xuly_dathang.php" method="post">
                  <button type="submit" name="dathang">Đặt hàng</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- cart content section end -->
  <footer>
    <div class="tf__footer_copyright">
    </div>
  </footer>

  <div class="tf__scroll_btn">
    <span><i class="fas fa-arrow-alt-up"></i></span>
  </div>

  <!--jquery library js-->
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