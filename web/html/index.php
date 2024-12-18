<?php
include "ketnoi.php";

// $sql = "SELECT * FROM Dichvu WHERE id_dichvu = 'DV001'";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
// $tendichvu = $row[''];
// //echo "Tên Dịch vụ: " . $row['tendichvu'] . "<br>";
// mysqli_close($conn);
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
    <section class="tf__banner">
      <div class="row banner_slider">
        <div class="col-12">
          <div
            class="tf__single_slider"
            style="background: url(images/home_avt_4.jpg)"
          >
            <div class="container">
              <div class="row">
                <div class="col-xl-6 col-md-8">
                  <div
                    class="tf__single_slider_text wow fadeInUp"
                    data-wow-duration="1s"
                  >
                    <!-- <h5>chào mững đến với laptop.vn</h5> -->
                    <!-- <h1>
                      Chuyên sửa chữa thay thế linh kiện máy tính
                      <span>Uy tín & Chất lượng</span>
                    </h1> -->
                    <!-- <p>
                      Lorem ipsum dolor sit amet consectetur adipiscing elit sed
                      do eiusmt mod tempor incididunt ut labore et dolore magna
                      aliqua.
                    </p> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div
            class="tf__single_slider"
            style="background: url(images/home_avt_1.jpg)"
          >
            <div class="container">
              <div class="row">
                <div class="col-xl-6 col-md-8">
                  <div
                    class="tf__single_slider_text wow fadeInUp"
                    data-wow-duration="1s"
                  >
                    <h5>CHÀO MỪNG ĐẾN VỚI LAPTOP.VN</h5>
                    <h1>
                      SỬA CHỮA THAY THẾ LINH KIỆN MÁY TÍNH
                      <span>UY TÍN</span>
                    </h1>
                    <p>
                      Cung cấp cho quý khách hàng trải nghiệm tuyệt vời khi sử
                      dụng sản phẩm & dịch vụ tại LAPTOP.VN
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div
            class="tf__single_slider"
            style="background: url(images/home_avt_2.jpg)"
          >
            <div class="container">
              <div class="row">
                <div class="col-xl-6 col-md-8">
                  <div
                    class="tf__single_slider_text wow fadeInUp"
                    data-wow-duration="1s"
                  >
                    <h5>CHÀO MỪNG ĐẾN VỚI LAPTOP.VN</h5>
                    <h1>
                      SỬA CHỮA THAY THẾ LINH KIỆN MÁY TÍNH
                      <span>UY TÍN</span>
                    </h1>
                    <p>
                      Cung cấp cho quý khách hàng trải nghiệm tuyệt vời khi sử
                      dụng sản phẩm & dịch vụ tại LAPTOP.VN
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="tf__futured_services mt_115 xs_mt_70">
      <div class="container">
        <div class="row">
          <div
            class="col-xl-7 col-md-10 m-auto wow fadeInUp"
            data-wow-duration="1s"
          >
            <div class="tf__section_heading mb_50 xs_mb_55">
              <h5>Dịch vụ khuyên dùng</h5>
              <h3>Dịch vụ dành cho máy tính</h3>
            </div>
          </div>
        </div>
        <div class="row futured_slider wow fadeInUp" data-wow-duration="1s">
        <?php
                // Thực hiện truy vấn để lấy tất cả các dịch vụ
                $sql = "SELECT * FROM Dichvu";
                $result = mysqli_query($conn, $sql);

                // Danh sách icon tương ứng với mỗi dịch vụ
                $icons = array(
                    'fas fa-user-shield',
                    'fas fa-restroom',
                    'fas fa-gift',
                    'fas fa-comment-dots',
                    'fas fa-restroom'
                    // Thêm icon cho các dịch vụ khác nếu cần
                );

                // Kiểm tra xem có dữ liệu hay không
                if ($result && mysqli_num_rows($result) > 0) {
                    // Lặp qua từng dòng dữ liệu
                    $iconIndex = 0;
                    $count = 0; // Biến đếm số lượng dịch vụ đã in
                    while ($row = mysqli_fetch_assoc($result)) {
                        $tenDichVu = $row['tendichvu'];
                        $motaDichVu = $row['mota'];

                        // Lấy icon tương ứng từ danh sách
                        $icon = isset($icons[$iconIndex]) ? $icons[$iconIndex] : 'default-icon';

                        // In ra cấu trúc HTML cho mỗi dịch vụ
                        echo "<div class='col-xl-3'>
                                <div class='tf__featured_service_single'>
                                    <span><i class='fas $icon'></i></span>
                                    <h3>$tenDichVu</h3>
                                    <p>$motaDichVu</p>
                                </div>
                            </div>";

                        // Tăng chỉ số icon
                        $iconIndex++;

                        // Tăng biến đếm
                        $count++;

                        // Kiểm tra nếu đã in đủ 5 dịch vụ thì thoát khỏi vòng lặp
                        if ($count >= 5) {
                            break;
                        }
                    }

                    // Giải phóng bộ nhớ sau khi sử dụng kết quả truy vấn
                    mysqli_free_result($result);
                } else {
                    // Hiển thị thông báo nếu không có dữ liệu
                    echo "Không có dữ liệu dịch vụ hoặc có lỗi truy vấn: " . mysqli_error($conn);
                }
              ?>
        </div>
      </div>
    </section>

    <section class="tf__categories mt_115 xs_mt_70">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 col-md-10 m-auto wow fadeInUp" data-wow-duration="1s">
                <div class="tf__section_heading mb_35">
                    <h5>Sản phẩm bán chạy</h5>
                    <h3>Sản phẩm dành cho máy tính</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                // Thực hiện truy vấn để lấy tất cả các linh kiện và giới hạn 6 linh kiện
                $sql = "SELECT * FROM linhkien LIMIT 8";
                $result = mysqli_query($conn, $sql);

                // Mảng chứa đường dẫn ảnh
                $anhArray = array(
                    "images/category_icon_1.png",
                    "images/category_icon_2.png",
                    "images/category_icon_3.png",
                    "images/category_icon_4.png",
                    "images/category_icon_5.png",
                    "images/category_icon_6.png",
                    "images/category_icon_7.png",
                    "images/category_icon_8.png"
                );

                // Kiểm tra xem có dữ liệu hay không
                if ($result && mysqli_num_rows($result) > 0) {
                    $i = 0; // Biến đếm để lấy đường dẫn ảnh từ mảng
                    while ($row = mysqli_fetch_assoc($result)) {
                        $tenLinhKien = $row['tenlinhkien'];
                        $moTaLinhKien = $row['mota'];
                        $anhLinhKien = $anhArray[$i];

                        // In ra cấu trúc HTML cho mỗi linh kiện
                        echo "<div class='col-xl-3 col-sm-6 col-lg-4 wow fadeInUp' data-wow-duration='1s'>
                                <div class='tf__single_categories'>
                                    <span>
                                        <img src='$anhLinhKien' alt='category' class='img-fluid w-100' />
                                    </span>
                                    <h4>$tenLinhKien</h4>
                                    <p>$moTaLinhKien</p>
                                </div>
                            </div>";

                        // Tăng biến đếm để lấy ảnh tiếp theo trong mảng
                        $i++;
                    }

                    // Giải phóng bộ nhớ sau khi sử dụng kết quả truy vấn
                    mysqli_free_result($result);
                } else {
                    // Hiển thị thông báo nếu không có dữ liệu
                    echo "Không có dữ liệu linh kiện hoặc có lỗi truy vấn: " . mysqli_error($conn);
                }
            ?>
        </div>
    </div>
</section>


    <!--=====================================
        CATEGORIES END
    =====================================-->

    <!--=====================================
        SERVICES START
    =====================================-->

    <!--=====================================
        WORK START
    =====================================-->
    <section class="tf__work mt_115 xs_mt_70">
      <div class="container">
        <div class="row">
          <div
            class="col-xl-7 col-lg-8 col-md-10 m-auto wow fadeInUp"
            data-wow-duration="1s"
          >
            <div class="tf__section_heading mb_85 xs_mb_30">
              <h5>3 bước dễ dàng</h5>
              <h3>Cách chúng tôi làm việc</h3>
            </div>
          </div>
        </div>
        <div class="tf__work_text_area">
          <div class="row">
            <div
              class="col-xl-4 col-md-4 col-lg-4 wow fadeInUp"
              data-wow-duration="1s"
            >
              <div class="tf__work_single first">
                <h4>Chọn dịch vụ / sản phẩm</h4>
                <p>
                  Khách hàng vui lòng lựa chọn dịch vụ hoặc sản phẩm trên trang
                  web của chúng tôi
                </p>
              </div>
            </div>
            <div
              class="col-xl-4 col-md-4 col-lg-4 wow fadeInUp"
              data-wow-duration="1s"
            >
              <div class="tf__work_single second">
                <h4>Tiếp nhận, xử lý</h4>
                <p>Tiếp nhận đơn hàng và xử lý theo quy trình</p>
              </div>
            </div>
            <div
              class="col-xl-4 col-md-4 col-lg-4 wow fadeInUp"
              data-wow-duration="1s"
            >
              <div class="tf__work_single third">
                <h4>Hoàn thành</h4>
                <p>Khách hàng thanh toán khi đơn hàng được hoàn thành</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=====================================
        WORK END
    =====================================-->

    
    <section class="tf__testimonial mt_115 xs_mt_70">
      <div class="container">
        <div class="row">
          <div
            class="col-xl-7 col-md-10 m-auto wow fadeInUp"
            data-wow-duration="1s"
          >
            <div class="tf__section_heading mb_35">
              <h5>Đánh giá</h5>
              <h3>Khách hàng nói gì về chúng tôi</h3>
            </div>
          </div>
        </div>
        <div class="row testi_slider wow fadeInUp" data-wow-duration="1s">
          <div class="col-xl-4">
            <div class="tf__single_testimonial">
              <div class="tf__single_testimonial_img">
                <img
                src="images/avt_dg.jpg"
                  alt="client"
                  class="img-fluid w-100"
                />
              </div>
              <div class="tf__single_testimonial_text">
                <p class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </p>
                <p class="cliect_comment">
                  Tôi đã sử dụng dịch vụ của bạn để sửa chữa laptop của mình và
                  rất hài lòng với kết quả. Nhân viên nhiệt tình, giá cả hợp lý
                  và máy tính của tôi hoạt động như lúc mới mua. Cảm ơn đội ngũ
                  của bạn rất nhiều!
                </p>
                <h3 class="title">nhat tan</h3>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="tf__single_testimonial">
              <div class="tf__single_testimonial_img">
                <img
                src="images/avt_dg.jpg"
                  alt="client"
                  class="img-fluid w-100"
                />
              </div>
              <div class="tf__single_testimonial_text">
                <p class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </p>
                <p class="cliect_comment">
                  Tôi đã mua một linh kiện máy tính từ trang web của bạn và tôi
                  rất ấn tượng với tốc độ giao hàng và chất lượng của sản phẩm.
                  Linh kiện hoàn toàn đáp ứng mong đợi của tôi, và tôi sẽ chắc
                  chắn quay lại khi cần.
                </p>
                <h3 class="title">Ẩn danh</h3>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="tf__single_testimonial">
              <div class="tf__single_testimonial_img">
                <img
                src="images/avt_dg.jpg"
                  alt="client"
                  class="img-fluid w-100"
                />
              </div>
              <div class="tf__single_testimonial_text">
                <p class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </p>
                <p class="cliect_comment">
                  Khi tôi gặp vấn đề với máy tính của mình, đội ngũ hỗ trợ khách
                  hàng của bạn đã giúp đỡ tôi một cách chuyên nghiệp và nhanh
                  chóng. Họ tận tâm với công việc của mình và giúp tôi giải
                  quyết mọi vấn đề.
                </p>
                <h3 class="title">Tan Tan</h3>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="tf__single_testimonial">
              <div class="tf__single_testimonial_img">
                <img
                  src="images/avt_dg.jpg"
                  alt="client"
                  class="img-fluid w-100"
                />
              </div>
              <div class="tf__single_testimonial_text">
                <p class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </p>
                <p class="cliect_comment">
                  Tôi đã so sánh giá cả từ nhiều trang web và thấy rằng bạn cung
                  cấp các sản phẩm và dịch vụ với giá cả cạnh tranh nhất. Đồng
                  thời, cách bạn xử lý đơn hàng và tương tác với khách hàng làm
                  tôi cảm thấy hài lòng và tin tưởng
                </p>
                <h3 class="title">Tan</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=====================================
        TESTIMONIAL END
    =====================================-->

    <!--=====================================
        FOOTER START
    =====================================-->
    <footer
      class="tf__footer mt_180 xs_mt_130"
      style="background: url(images/footer_bg.jpg)"
    >
      <div class="container">
        <div
          class="row mt_20 xs_mt_10 pb_80 xs_pb_35 md_padding justify-content-between"
        >
          <div class="col-xl-3 col-md-6 col-lg-4">
            <div class="tf__footer_map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8169397280276!2d105.739383376103!3d21.040009480612166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135096b31fa7abb%3A0xff645782804911af!2zVHLGsOG7nW5nIMSR4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgxJDDtG5nIMOB!5e0!3m2!1svi!2s!4v1705589462608!5m2!1svi!2s"
                width="550"
                height="360"
                style="border: 5"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
          <div class="col-xl-2 col-sm-6 col-md-4 col-lg-2">
            <div class="tf__footer_link">
              <h4>Dịch vụ của chúng tôi</h4>
              <ul>
                <li><a href="#">Cài đặt phần mềm</a></li>
                <li><a href="#">Kiểm tra bảo dưỡng</a></li>
                <li><a href="#">Thay thế linh kiện</a></li>
                <li><a href="#">Diệt virus</a></li>
                <li><a href="#">dịch vụ khác</a></li>
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
    <?php
    // Đóng kết nối
    mysqli_close($conn);
    ?>
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
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/65ad6f510ff6374032c314f6/1hkmnllqr';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
  </body>
</html>
