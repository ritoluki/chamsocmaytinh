<?php
include "ketnoi.php";

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
              <a class="nav-link" href="#"
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

    <section class="tf__breadcrumb" style="background: url(images/login_avt.jpg);">
        <div class="tf__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tf__breadcrumb_text">
                            <h1>Chi tiết sản phẩm</h1>
                            <ul>
                                <li><a href="#"><i class="fas fa-home"></i> trang chủ</a></li>
                                <li><a href="#">chi tiết sản phẩm</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tf__services_details mt_120 xs_mt_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__services_details_text">
                        <div class="tf__services_details_img">
                            <img src="images/sp_1.jpg" alt="service" class="img-fluid w-100">
                            <a class="reservation" href="#" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop2">Thêm vào giỏ hàng</a>
                        </div>
                        <h2>Ổ Cứng SSD Samsung 1TB: Khám Phá Công Nghệ Lưu Trữ Hiện Đại</h2>

                        <p> Ổ Cứng SSD Samsung 1TB, một đỉnh cao của sự đổi mới trong lĩnh vực lưu trữ, mang lại một trải nghiệm sử dụng máy tính độc đáo. Ổ cứng thể rắn này được thiết kế với cực kỳ cẩn thận, với sự kết hợp của tốc độ, độ tin cậy và hiệu suất, mở ra một tiêu chuẩn mới cho giải pháp lưu trữ trong thời đại số.</p>
                        
                        <h3>Đặc Điểm Nổi Bật</h3>
                        <ul>
                            <li>Dung Lượng Lớn: Với dung lượng rộng lớn lên đến 1TB, SSD của chúng tôi đảm bảo bạn có không gian đủ rộng lớn để lưu trữ và truy cập dữ liệu một cách mượt mà.</li>
                            <li>Tốc Độ Truy Cập Nhanh Chóng: Trải nghiệm tốc độ truy cập và truyền dữ liệu siêu nhanh, nhờ vào công nghệ tiên tiến được tích hợp trong ổ cứng này.</li>
                            <li>Độ Bền Vững: Xây dựng với độ bền vững cao, SSD của chúng tôi mang lại sự yên tâm khi sử dụng trong mọi điều kiện.</li>
                        </ul>
                        
                        <p>Bạn sẽ không chỉ sở hữu một ổ cứng lưu trữ, mà còn là một công nghệ đồng đội, giúp tối ưu hóa hiệu suất làm việc và giải trí của bạn. Hãy đắm chìm vào thế giới số với Ổ Cứng SSD Samsung 1TB - đối tác đáng tin cậy cho mọi nhu cầu lưu trữ của bạn.</p>
                    </div>

                    <div class="tf_service_det_tag d-flex flex-wrap align-items-center">
                       
                    </div>

                   
                    <div class="tf__service_review_list mt_50">
                        <h3>03 review</h3>
                        <div class="tf__single_review">
                            <div class="review_img">
                                <img src="images/tan_review.jpg" alt="Client" class="img-fluid w-100">
                            </div>
                            <div class="review_text">
                                <h4>Tan <span>17/01/2024</span></h4>
                                <p class="review_star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>(120)</span>
                                </p>
                                <p class="description">Sản phẩm tuyệt vời</p>
                                <a href="#" class="reply">reply</a>
                            </div>
                        </div>
                        <div class="tf__single_review">
                            <div class="review_img">
                                <img src="images/tan_review.jpg" alt="Client" class="img-fluid w-100">
                            </div>
                            <div class="review_text">
                                <h4>Sy <span>17/1/2024</span></h4>
                                <p class="review_star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>(20)</span>
                                </p>
                                <p class="description">Rất tuyệt.</p>
                                <a href="#" class="reply">reply</a>
                            </div>
                        </div>
                        <div class="tf__single_review">
                            <div class="review_img">
                                <img src="images/tan_review.jpg" alt="Client" class="img-fluid w-100">
                            </div>
                            <div class="review_text">
                                <h4>a <span>11/01/2024</span></h4>
                                <p class="review_star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>(78)</span>
                                </p>
                                <p class="description">Khá tốt</p>
                                <a href="#" class="reply">reply</a>
                            </div>
                        </div>
                        <div class="tf__pagination mt_50">
                            <div class="row">
                                <div class="col-12">
                                    <nav aria-label="...">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i
                                                        class="fas fa-chevron-double-left"></i></a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">01</a>
                                            </li>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link" href="#">02</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">03</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i
                                                        class="fas fa-chevron-double-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tf__service_review_input mt_50">
                        <h3>Cảm nhận của bạn</h3>
                        <p>Hãy đánh giá về sản phẩm này :
                            <span>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </p>
                        <form>
                            <div class="row">
                                <div class="col-xl-6">
                                    <input type="text" placeholder="Tên của bạn">
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" placeholder="Địa chỉ email">
                                </div>
                                <div class="col-12">
                                    <textarea rows="7" placeholder="Đánh giá"></textarea>
                                </div>
                                <div class="col-12">
                               
                                    <button type="submit" class="common_btn">Gửi đánh giá</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tf__service_sidebar" id="sticky_sidebar">
                        <div class="tf__sidebar_search sidebar_item mb_25">
                            <h3>Tìm kiếm sản phẩm</h3>
                            <form>
                                <input type="text" placeholder="card đồ họa...">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="tf__sidebar_category sidebar_item mb_25">
                            <h3>Các dòng linh kiện </h3>
                            <ul>
                                <li><a href="#">Card đồ họa <span>(10)</span></a></li>
                                <li><a href="#">Ổ cứng <span>(04)</span></a></li>
                                <li><a href="#">Tản nhiệt  <span>(15)</span></a></li>
                                <li><a href="#">Bàn phím & chuột <span>(06)</span></a></li>
                                <li><a href="#">Màn hình <span>(21)</span></a></li>
                                <li><a href="#">Bộ nhớ RAM <span>(20)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    </section>

</section>
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
        width="600"
        height="360"
        style="border: 5"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
    <!-- <div class="tf__footer_logo_area">
      <a class="footer_logo" href="index.html">
        <img
          src="images/footer_logo.png"
          alt="Bonfax"
          class="img-fluid w-100"
        />
      </a>
      <p>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem
        accusantium enim ipsam voluptatem quia voluptas.
      </p>
      <ul class="d-flex flex-wrap">
        <li>
          <a href="#"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </li>
        <li>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
        </li>
        <li>
          <a href="#"><i class="fab fa-behance"></i></a>
        </li>
      </ul>
    </div> -->
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
