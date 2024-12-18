<?php 
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
                  <li><a href="service_info.php">Dịch vụ</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="tf__team_details mt_120 xs_mt_70">
    <div class="container">
        <div class="row">
            <div class="col-xl-111 col-lg-11 wow fadeInUp" data-wow-duration="1s">
                <div class="tf__team_details_text">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    Cài đặt phần mềm
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="tf__team_overview">
                                        
                                        <p>Chào mừng bạn đến với dịch vụ cài đặt phần mềm tại trang web của chúng tôi!</p>
                                        <p>
                                            Chào mừng bạn đến với dịch vụ cài đặt phần mềm tại trang web của chúng tôi!
                                            
                                            Chúng tôi hiểu rằng việc cài đặt phần mềm có thể là một nhiệm vụ khó khăn và đôi khi đầy phiền toái. Với đội ngũ chuyên gia tận tâm của chúng tôi, chúng tôi cam kết mang đến cho bạn trải nghiệm cài đặt phần mềm mượt mà và không gặp vấn đề.</p>
                                        <p>Dịch vụ của chúng tôi không chỉ giới hạn trong việc cài đặt các ứng dụng thông thường, mà còn mở rộng đến việc cấu hình và tối ưu hóa để đảm bảo hiệu suất tốt nhất cho hệ thống của bạn. Chúng tôi sẽ đảm bảo rằng mọi phần mềm được cài đặt đều hoạt động một cách mượt mà và tương thích với các yêu cầu cụ thể của bạn.</p>
                                        <p>Dù bạn là người dùng cá nhân hay doanh nghiệp, chúng tôi đều sẵn lòng hỗ trợ bạn với các giải pháp linh hoạt và chất lượng. Bạn chỉ cần tập trung vào công việc của mình, còn lại để chúng tôi lo lắng về việc cài đặt phần mềm.</p>
                                        <p>Hãy để chúng tôi giúp bạn tiết kiệm thời gian và công sức, đồng thời đảm bảo rằng phần mềm của bạn luôn chạy ổn định và hiệu quả. Cảm ơn bạn đã chọn dịch vụ của chúng tôi!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    Kiểm tra bảo dưỡng
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="tf__team_overview">
                                        
                                        <p>Chào mừng bạn đến với dịch vụ cài đặt phần mềm tại trang web của chúng tôi!</p>
                                        <p>
                                            Chào mừng bạn đến với dịch vụ cài đặt phần mềm tại trang web của chúng tôi!
                                            
                                            Chúng tôi hiểu rằng việc cài đặt phần mềm có thể là một nhiệm vụ khó khăn và đôi khi đầy phiền toái. Với đội ngũ chuyên gia tận tâm của chúng tôi, chúng tôi cam kết mang đến cho bạn trải nghiệm cài đặt phần mềm mượt mà và không gặp vấn đề.</p>
                                        <p>Dịch vụ của chúng tôi không chỉ giới hạn trong việc cài đặt các ứng dụng thông thường, mà còn mở rộng đến việc cấu hình và tối ưu hóa để đảm bảo hiệu suất tốt nhất cho hệ thống của bạn. Chúng tôi sẽ đảm bảo rằng mọi phần mềm được cài đặt đều hoạt động một cách mượt mà và tương thích với các yêu cầu cụ thể của bạn.</p>
                                        <p>Dù bạn là người dùng cá nhân hay doanh nghiệp, chúng tôi đều sẵn lòng hỗ trợ bạn với các giải pháp linh hoạt và chất lượng. Bạn chỉ cần tập trung vào công việc của mình, còn lại để chúng tôi lo lắng về việc cài đặt phần mềm.</p>
                                        <p>Hãy để chúng tôi giúp bạn tiết kiệm thời gian và công sức, đồng thời đảm bảo rằng phần mềm của bạn luôn chạy ổn định và hiệu quả. Cảm ơn bạn đã chọn dịch vụ của chúng tôi!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    Thay thế linh kiện
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="tf__team_overview">
                                        
                                        <p>Chào mừng bạn đến với dịch vụ cài đặt phần mềm tại trang web của chúng tôi!</p>
                                        <p>
                                            Chào mừng bạn đến với dịch vụ cài đặt phần mềm tại trang web của chúng tôi!
                                            
                                            Chúng tôi hiểu rằng việc cài đặt phần mềm có thể là một nhiệm vụ khó khăn và đôi khi đầy phiền toái. Với đội ngũ chuyên gia tận tâm của chúng tôi, chúng tôi cam kết mang đến cho bạn trải nghiệm cài đặt phần mềm mượt mà và không gặp vấn đề.</p>
                                        <p>Dịch vụ của chúng tôi không chỉ giới hạn trong việc cài đặt các ứng dụng thông thường, mà còn mở rộng đến việc cấu hình và tối ưu hóa để đảm bảo hiệu suất tốt nhất cho hệ thống của bạn. Chúng tôi sẽ đảm bảo rằng mọi phần mềm được cài đặt đều hoạt động một cách mượt mà và tương thích với các yêu cầu cụ thể của bạn.</p>
                                        <p>Dù bạn là người dùng cá nhân hay doanh nghiệp, chúng tôi đều sẵn lòng hỗ trợ bạn với các giải pháp linh hoạt và chất lượng. Bạn chỉ cần tập trung vào công việc của mình, còn lại để chúng tôi lo lắng về việc cài đặt phần mềm.</p>
                                        <p>Hãy để chúng tôi giúp bạn tiết kiệm thời gian và công sức, đồng thời đảm bảo rằng phần mềm của bạn luôn chạy ổn định và hiệu quả. Cảm ơn bạn đã chọn dịch vụ của chúng tôi!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    Diệt virus
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="tf__team_overview">
                                        
                                        <p>Chào mừng bạn đến với dịch vụ cài đặt phần mềm tại trang web của chúng tôi!</p>
                                        <p>
                                            Chào mừng bạn đến với dịch vụ cài đặt phần mềm tại trang web của chúng tôi!
                                            
                                            Chúng tôi hiểu rằng việc cài đặt phần mềm có thể là một nhiệm vụ khó khăn và đôi khi đầy phiền toái. Với đội ngũ chuyên gia tận tâm của chúng tôi, chúng tôi cam kết mang đến cho bạn trải nghiệm cài đặt phần mềm mượt mà và không gặp vấn đề.</p>
                                        <p>Dịch vụ của chúng tôi không chỉ giới hạn trong việc cài đặt các ứng dụng thông thường, mà còn mở rộng đến việc cấu hình và tối ưu hóa để đảm bảo hiệu suất tốt nhất cho hệ thống của bạn. Chúng tôi sẽ đảm bảo rằng mọi phần mềm được cài đặt đều hoạt động một cách mượt mà và tương thích với các yêu cầu cụ thể của bạn.</p>
                                        <p>Dù bạn là người dùng cá nhân hay doanh nghiệp, chúng tôi đều sẵn lòng hỗ trợ bạn với các giải pháp linh hoạt và chất lượng. Bạn chỉ cần tập trung vào công việc của mình, còn lại để chúng tôi lo lắng về việc cài đặt phần mềm.</p>
                                        <p>Hãy để chúng tôi giúp bạn tiết kiệm thời gian và công sức, đồng thời đảm bảo rằng phần mềm của bạn luôn chạy ổn định và hiệu quả. Cảm ơn bạn đã chọn dịch vụ của chúng tôi!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                    Trạng thái thành và phản hồi
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <div class="tf__team_Statictics">
                                        <div class="row">
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="tf__team_Statictics_counter">
                                                    <h2 class="counter">981</h2>
                                                    <p>Đơn hàng</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="tf__team_Statictics_counter">
                                                    <h2 class="counter">835</h2>
                                                    <p>Đã hoàn thành</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="tf__team_Statictics_counter">
                                                    <h2 class="counter">146</h2>
                                                    <p>Chua hoàn thành</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="tf__team_Statictics_counter lasi_child">
                                                    <h2 class="counter">100</h2>
                                                    <p>cảm thấy hài lòng</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <div class="tf__service_review_input mt_50">
                    <h3>Tạo đơn hàng</h3>
<form action="xuly_lichhen.php" method="post">
    <div class="row">
        <div class="col-xl-6">
            <input type="text" name="tenkhachhang" placeholder="Tên của bạn" required>
        </div>
        <div class="col-xl-6">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="col-xl-6">
            <input type="text" name="sodienthoai" placeholder="Số điện thoại" required>
        </div>
        <div class="col-xl-6">
            <input type="text" name="diachi" placeholder="Địa chỉ" required>
        </div>
        <div class="col-xl-6">
            <input class="reservation_input" type="date" name="ngayhen" required>
        </div>
        <div class="col-12">
            <textarea name="ghichu" rows="7" placeholder="Ghi rõ vấn đề (tình trạng máy và dịch vụ cần sử dụng)" required></textarea>
        </div>
        <div class="col-12">
            <button type="submit" name="xacnhan" class="common_btn">Đặt lịch</button>
        </div>
    </div>
</form>

                    </div>
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
