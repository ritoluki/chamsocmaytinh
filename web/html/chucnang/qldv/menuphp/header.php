<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: http://localhost/nhom-16-chamsocmaytinh/web/html/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="menuphp/style1.css">
    <title>Quản lý dịch vụ</title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/admin.php">Laptop.vn</a>
                </div>
                <!-- Sidebar Nav -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Thông tin
                    </li>
                    <li class="sidebar-item">
                        <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/admin.php" class="sidebar-link ">
                            <i class="fa-sharp fa-solid fa-chart-line"></i>
                            Thống kê báo cáo
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Công cụ 
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi"
                            aria-expanded="false" aria-controls="multi">
                            <i class="fa-solid fa-list pe-2"></i>
                            Công cụ quản lý
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/chucnang/qlnv/index.php" class="sidebar-link ">
                                    <i class="fa-solid fa-user-tie"></i>
                                    Quản lý nhân viên
                                </a>
                            </li>
                        </ul>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/chucnang/qlkh/khachhang.php" class="sidebar-link ">
                                    <i class="fa-solid fa-users"></i>
                                    Quản lý khách hàng
                                </a>
                            </li>
                        </ul>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/chucnang/qllk/linhkien.php" class="sidebar-link ">
                                    <i class="fa-solid fa-microchip"></i>
                                    Quản lý sản phẩm
                                </a>
                            </li>
                        </ul>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/chucnang/qldv/qldv.php" class="sidebar-link ">
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                    Quản lý dịch vụ
                                </a>
                            </li>
                        </ul>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="http://localhost/nhom-16-chamsocmaytinh/web/html/chucnang/qlsddv/sddv.php" class="sidebar-link ">
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                    Quản lý sử dụng dịch vụ
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                            aria-expanded="false" aria-controls="pages">
                            <i class="fa-regular fa-file-lines pe-2"></i>
                            Trang Web
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Sản Phẩm</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Bài đăng</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Đánh giá</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- main content-->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <!--button dong sidebar-->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Links on the left -->
                <ul class="navbar-nav me-3">
                    <li class="nav-item">
                        <a href="qldv.php" class="nav-link click-printname">Quản lý dịch vụ </a>
                    </li>
                </ul>
                <!-- User dropdown on the right -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user"></i> Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">Thông tin</a>
                            <a class="dropdown-item" href="http://localhost/nhom-16-chamsocmaytinh/web/html/logout.php">Đăng xuất</a>
                        </div>
                    </li>
                </ul>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                

                    <div class="mb-3">