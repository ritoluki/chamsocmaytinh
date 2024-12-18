<?php 
session_start();
include 'ketnoi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="Utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi"
    />
    <title>Laptop.vn - Sửa chữa máy tính</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/spacing.css" />
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
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
                <a href="mailto:laptop24h@hotmail.com"
                  ><i class="fas fa-envelope"></i> laptop24h@hotmail.com</a
                >
              </li>
              <li>
                <a href="callto:+84 123.456.789"
                  ><i class="fas fa-phone-alt"></i> +84 123.456.789
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
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fal fa-bars menu_icom"></i>
          <i class="fal fa-times menu_close"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav m-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"
                >trang chủ
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="service_info.php"
                >dịch vụ <i class="far fa-angle-down"></i
              ></a>
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
              <a class="nav-link" href="#"
                >chính sách bảo hành <i class="far fa-angle-down"></i
              ></a>
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

    <section
      class="tf__breadcrumb"
      style="background: url(images/login_avt.jpg)"
    >
      <div class="tf__breadcrumb_overlay">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="tf__breadcrumb_text">
                <h1>login</h1>
                <ul>
                  <li>
                    <a href="index.php"
                      ><i class="fas fa-home"></i> Trang chủ</a
                    >
                  </li>
                  <li><a href="#">login</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="tf__login mt_120 xs_mt_70">
      <div class="container">
          <div class="row">
              <div class="col-xl-6 col-lg-8 m-auto wow fadeInUp" data-wow-duration="1s">
                  <div class="tf__login_area">
                      <h3>Đăng nhập</h3>
                      <form action="process_login.php" method="post">
                      <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                      <?php } ?>
                          <div class="row">
                              <div class="col-xl-12">
                                  <div class="tf__login_input">
                                      <span><i class="fas fa-user"></i></span>
                                      <input type="text" name="uname" placeholder="Tài khoản hoặc email" />
                                  </div>
                              </div>
                              <div class="col-xl-12">
                                  <div class="tf__login_input">
                                      <span><i class="fas fa-lock-alt"></i></span>
                                      <input type="password" name="password" placeholder="Mật khẩu" minlength="4" />
                                  </div>
                              </div>
                              <div class="col-xl-12">
                                  <div class="tf__login_input">
                                      <div class="form-check">
                                      
                                          
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-12">
                                  <div class="tf__login_input">
                                      <button type="submit" class="common_btn">Đăng nhập</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                      <span class="or">or</span>
                      <p>
                          Không có tài khoản?
                          <a href="register.php">Tạo tài khoản mới</a>
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </section>
    <div class="tf__footer_copyright"></div>

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