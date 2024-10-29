<?php
// Hiển thị tên người dùng
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Dang nhap';
// Đặt code này trong một file helper, ví dụ: helpers.php

define('BASE_PATH', '/');

// Dinh nghia duong dan cua file
$filepath = realpath(dirname(__FILE__));
// Trong file header.php
if (isset($_SESSION['userId'])) {
  include $filepath . '/../../controller/giohang.php';
  $giohang = new GioHang();
  $giohang_user = $giohang->getByID($_SESSION['userId']);
  $giohang_soluong = $giohang_user==false ? 0 : mysqli_num_rows($giohang_user);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Waggy - Free eCommerce Pet Shop HTML Website Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<!-- <link rel="stylesheet" type="text/css" href=" </?php echo BASE_PATH; ?>clients/css/vendor.css">
<link rel="stylesheet" type="text/css" href=" </?php echo BASE_PATH; ?>clients/style.css"> -->
<link rel="stylesheet" type="text/css" href="../css/vendor.css">
<link rel="stylesheet" type="text/css" href="../style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Montserrat:wght@300;400;500&display=swap"
  rel="stylesheet">

<style>
  /* Thêm CSS cho sticky header */
  html,
  body {
    max-width: 100%;
    overflow-x: hidden;
  }

  .sticky {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    background-color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
  }

  /* Thêm padding để tránh nội dung bị che khuất khi header trở nên sticky */
  body {
    padding-top: 0;
    transition: padding-top 0.3s ease;
  }

  body.sticky-padding {
    padding-top: 160px;
    /* Điều chỉnh giá trị này tùy theo chiều cao của header */
  }
</style>
</head>

<body>
  <div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>

  <!-- Gio hang khi duoc mo -->
  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Giỏ hàng</span>
          <span class="badge bg-primary rounded-circle pt-2"><?= $giohang_soluong ?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php 
          if ($giohang_soluong==0) {
            echo '<h4>Bạn chưa có gì trong giỏ hàng :(</h4>';
          } else 
          {
            $tongtien = 0;
            foreach ($giohang_user as $key => $value) 
            {
              ?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?= $value['TenSanPham'] ?></h6>
              <small class="text-body-secondary">Giá x Số lượng : <?php echo $value['Gia'].' x '.$value['SoLuong'] ?></small>
            </div>
            <span class="text-body-secondary">
              <?php 
              $tongtien += $value['Gia']*$value['SoLuong'];
              echo $value['Gia']*$value['SoLuong'];
              ?> VNĐ
            </span>
          </li>
          <?php
            }
          } ?>
          <li class="list-group-item d-flex justify-content-between">
            <span class="fw-bold">Tổng tiền: </span>
            <strong><?= $tongtien ?> VNĐ</strong>
          </li>
        </ul>

        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
      </div>
    </div>
  </div>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch"
    aria-labelledby="Search">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

      <div class="order-md-last">
        <h4 class="text-primary text-uppercase mb-3">
          Search
        </h4>
        <div class="search-bar border rounded-2 border-dark-subtle">
          <form id="search-form" class="text-center d-flex align-items-center" action="" method="">
            <input type="text" class="form-control border-0 bg-transparent" placeholder="Search Here" />
            <iconify-icon icon="tabler:search" class="fs-4 me-3"></iconify-icon>
          </form>
        </div>
      </div>
    </div>
  </div>

  <header>
    <div class="container py-2">
      <div class="row py-4 pb-0 pb-sm-4 align-items-center ">
        <div class="col-sm-4 col-lg-3 text-center text-sm-start">
          <div class="main-logo">
            <a href="home.php">
              <img src="../images/logo.png" alt="logo" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
          <div class="search-bar border rounded-2 px-3 border-dark-subtle">
            <form id="search-form" class="text-center d-flex align-items-center" action="" method="">
              <input type="text" class="form-control border-0 bg-transparent"
                placeholder="Tìm kiếm hơn 10.000 sản phẩm" />
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
              </svg>
            </form>
          </div>
        </div>

        <div
          class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
          <div class="support-box text-end d-none d-xl-block">
            <span class="fs-6 secondary-font text-muted">Phone</span>
            <h5 class="mb-0">+980-34984089</h5>
          </div>
          <div class="support-box text-end d-none d-xl-block">
            <span class="fs-6 secondary-font text-muted">Email</span>
            <h5 class="mb-0">Teddy@gmail.com</h5>
          </div>

        </div>
      </div>
    </div>

    <div class="container-fluid">
      <hr class="m-0">
    </div>

    <div class="containe sticky-nav" id="sticky-nav">
      <nav class="main-menu d-flex navbar navbar-expand-lg ">
        <div class="d-flex d-lg-none align-items-end mt-3">
          <ul class="d-flex justify-content-end list-unstyled m-0">
            <li>
              <a href="login.php" class="mx-3">
                <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
              </a>
            </li>
            <li>
              <a href="wishlist.html" class="mx-3">
                <iconify-icon icon="mdi:heart" class="fs-4"></iconify-icon>
              </a>
            </li>

            <li>
              <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                aria-controls="offcanvasCart">
                <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                  03
                </span>
              </a>
            </li>

            <li>
              <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch"
                aria-controls="offcanvasSearch">
                <iconify-icon icon="tabler:search" class="fs-4"></iconify-icon>
                </span>
              </a>
            </li>
          </ul>

        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body justify-content-between">
            <select class="filter-categories border-0 mb-0 me-5">
              <option>Lọc theo loại</option>
              <option>Mô Hình</option>
              <option>cho bé nam</option>
              <option>Cho bé nữ</option>
            
            </select>

            <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
              <li class="nav-item">
                <a href="home.php" class="nav-link active">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" id="pages" data-bs-toggle="dropdown"
                  aria-expanded="false">Trang</a>
                <ul class="dropdown-menu" aria-labelledby="pages">
                  <li><a href="home.php" class="dropdown-item">About Us</a></li>
                  <li><a href="home.php" class="dropdown-item">Shop</a></li>
                  <li><a href="home.php" class="dropdown-item">Single Product</a></li>
                  <li><a href="home.php" class="dropdown-item">Cart</a></li>
                  <li><a href="home.php" class="dropdown-item">Wishlist</a></li>
                  <li><a href="home.php" class="dropdown-item">Checkout</a></li>
                  <li><a href="home.php" class="dropdown-item">Blog</a></li>
                  <li><a href="home.php" class="dropdown-item">Single Post</a></li>
                  <li><a href="home.php" class="dropdown-item">Contact</a></li>
                  <li><a href="home.php" class="dropdown-item">FAQs</a></li>
                  <li><a href="home.php" class="dropdown-item">Account</a></li>
                  <li><a href="home.php" class="dropdown-item">Thankyou</a></li>
                  <li><a href="home.php" class="dropdown-item">Error 404</a></li>
                  <li><a href="home.php" class="dropdown-item">Styles</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="home.php" class="nav-link">Shop</a>
              </li>
              <li class="nav-item">
                <a href="home.php" class="nav-link">Blog</a>
              </li>
              <li class="nav-item">
                <a href="home.php" class="nav-link">Contact</a>
              </li>

              <li class="nav-item">
                <a href="home.php" class="nav-link">Others</a>
              </li>
              
            </ul>

            <div class="d-none d-lg-flex align-items-end">
              <ul class="d-flex justify-content-end list-unstyled m-0">
                <li>
                  <?php
                  if (isset($_SESSION['username'])) { ?>
                    <a href="logout.php">
                      Đăng xuất
                    </a>
                  <?php } else { ?>
                    <a href="login.php" class="mx-3">
                      <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                    </a>
                  <?php } ?>
                </li>
                <li class="">
                  <a href="home.php" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                    aria-controls="offcanvasCart">
                    <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                    <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                      <?= $giohang_soluong ?>
                    </span>
                  </a>
                </li>
              </ul>

            </div>

          </div>

        </div>
      </nav>
    </div>
  </header>