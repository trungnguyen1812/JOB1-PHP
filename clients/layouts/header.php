<?php

// Hiển thị tên người dùng
include_once realpath(__DIR__ . '/../../controller/khachhang.php');
// echo "KhachHang đã được include thành công.<br>";

Session::roleCheckClient();

$khachhang = new KhachHang();
// echo "KhachHang object được tạo thành công.<br>";

$dskhachhang = $khachhang->getAll();
// var_dump($dskhachhang);

if (isset($_SESSION['userId'])) {
  $userId = $_SESSION['userId'];
  $khachHangInfo = $khachhang->getByID($userId); // Trả về mảng thông tin khách hàng

  if ($khachHangInfo) {
    // Kiểm tra và debug dữ liệu khách hàng
    // var_dump($khachHangInfo);
  } else {
    echo "Không tìm thấy thông tin khách hàng.";
  }
}



$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Dang nhap';
// Đặt code này trong một file helper, ví dụ: helpers.php

define('BASE_PATH', '/');

// Dinh nghia duong dan cua file
$filepathHeader = realpath(dirname(__FILE__));
// Trong file header.php
if (isset($_SESSION['userId'])) {
  include_once $filepathHeader . '/../../controller/giohang.php';
  $giohang = new GioHang();
  $giohang_user = $giohang->getByIDKhachHang($_SESSION['userId']);
  $giohang_soluong = $giohang_user == false ? 0 : mysqli_num_rows($giohang_user);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Teddy - Trang chủ</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <link rel="icon" href="../images/iconlogo.jpg" type="image/x-icon">



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../package/swiper-bundle.min.css">
  <!-- <link rel="stylesheet" type="text/css" href=" </?php echo BASE_PATH; ?>clients/css/vendor.css">
  <link rel="stylesheet" type="text/css" href=" </?php echo BASE_PATH; ?>clients/style.css"> -->
  <link rel="stylesheet" type="text/css" href="../css/vendor.css">
  <link rel="stylesheet" type="text/css" href="../style.css">

  <link rel="stylesheet" href="../css/hieuung.css">
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
      background-color: #b87333;
      box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
    }

    /* Thêm padding để tránh nội dung bị che khuất khi header trở nên sticky */
    body {
      padding-top: 0;
      transition: padding-top 0.3s ease;
    }

    body.sticky-padding {
      padding-top: 160px;
    }

    .item.cat.col-md-4.col-lg-3.my-4 .card {
      background-color: #F9F3EC;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }

    .item.cat.col-md-4.col-lg-3.my-4 .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .item.cat.col-md-4.col-lg-3.my-4 .card .btn-cart {
      background-color: #FFD700;
      /* Màu nền vàng */
      color: #fff;
      /* Chữ màu trắng */
      transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .item.cat.col-md-4.col-lg-3.my-4 .card .btn-cart:hover {
      background-color: #FFC300;
      /* Màu nền khi hover */
      color: #fff;
      /* Chữ vẫn màu trắng khi hover */
    }

    /* CSS hien thi gio hang */
    .tensanpham {
      width: 40%;
    }

    .giasanpham {
      width: 20%;
    }

    .soluong {
      width: 20%;
    }

    .tong {
      width: 20%;
    }

    button {
      border: solid 1px #b87333;
      border-radius: 5px;
      background-color: #fff;
      /* Màu đồng */
      color: #b87333;
      padding: 10px 20px;
      /* Màu vàng nhạt */
    }

    /* Hiệu ứng khi hover */
    button:hover {
      /* Viền vàng sáng hơn khi hover */
      background-color: #a05c2e;
      color: white !important;
      /* Màu đồng đậm hơn */
    }


    header {
      background-color: #b87333;
      color: rgb(255, 255, 255);
    }

    ::placeholder {
      color: white !important;
      opacity: 1;
      /* Giữ màu không bị mờ */
    }

    /* Dành riêng cho trình duyệt Safari & Firefox */
    ::-webkit-input-placeholder {
      color: white !important;
    }

    ::-moz-placeholder {
      color: white !important;
    }

    :-ms-input-placeholder {
      color: white !important;
    }

    ::-ms-input-placeholder {
      color: white !important;
    }

    .container {
      color: white;
    }
  </style>
</head>

<body>
  <div id="wind-container">
    <!-- Các hình ảnh lá sẽ được thêm vào đây qua JavaScript -->
  </div>


  <!-- Giỏ hàng khi được mở -->
  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart"
    style="width: 700px;">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <?php if (!isset($_SESSION['username'])) { ?>
        <!-- Chưa đăng nhập -->
        <div class="order-md-last">
          <h4 class="text-center mb-3">
            <div class="text-primary">Bạn chưa đăng nhập.</div>
            <div>
              Hãy <a class="btn btn-primary p-1" href="../main/login.php">Đăng nhập</a> để xem giỏ hàng của bạn.
            </div>
          </h4>
        </div>
      <?php } else { ?>
        <!-- Đã đăng nhập -->
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Giỏ hàng</span>
            <span id="cart-count" class="badge bg-primary rounded-circle pt-2" data-cart-count="<?php echo $giohang_soluong ?>"><?php echo $giohang_soluong ?> Sản phẩm</span>
          </h4>

          <?php if ($giohang_soluong == 0) { ?>
            <h4>Bạn chưa có gì trong giỏ hàng :(</h4>
          <?php } else { ?>
            <ul class="list-group mb-3">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="tensanpham">Tên Sản Phẩm</th>
                    <th class="text-center dongia">Đơn Giá</th>
                    <th class="text-center soluong">Số Lượng</th>
                    <th class="text-center tong">Tổng Tiền</th>
                    <th class="text-center">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $tongtien = 0;
                  foreach ($giohang_user as $value) {
                    $donGia = $value['DonGia']; // Giá đã lưu trong giỏ hàng
                    $thanhtien = $donGia * $value['SoLuong'];
                  ?>
                    <tr>
                      <td><?= htmlspecialchars($value['TenSanPham']) ?></td>
                      <td style="width: 50px;" class="text-center"><?= number_format($donGia, 0) ?></td>
                      <td class="text-center"><?= $value['SoLuong'] ?></td>
                      <td class="text-center">
                        <?php
                        $tongtien += $thanhtien;
                        echo number_format($thanhtien, 0) . ' VNĐ';
                        ?>
                      </td>
                      <td class="text-center" style="width: 10%">
                        <form action="../../controller/giohang_xoa.php" method="post">
                          <input type="hidden" name="id" value="<?= $value['IDGioHang'] ?>">
                          <input type="submit" value="Xoá" style="border: none; background-color: #a05c2e; color: white;">
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>

              </table>

              <li class="list-group-item d-flex justify-content-between">
                <span class="fw-bold">Tổng tiền:</span>
                <strong><?= number_format($tongtien, 0) ?> VNĐ</strong>
              </li>
            </ul>

            <div class="text-center">
              <a href="../main/checkout.php">
                <button class="bm-3 btn btn-success" type="submit">Checkout</button>
              </a>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>


  <div class="offcanvas offcanvas-end" style="color: white;" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch"
    aria-labelledby="Search">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

      <div class="order-md-last">
        <h4 class="text-white text-uppercase mb-3">
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
            <a href="../main/home.php">
              <img src="../images/logo.png" alt="logo" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
          <div class="search-bar border rounded-2 px-3 border-dark-subtle">
            <form id="search-form" class="text-center d-flex align-items-center" action="sanpham.php" method="GET">
              <input type="text" class="form-control border-0 bg-transparent text-white"
                name="search" placeholder="Tìm kiếm hơn 10.000 sản phẩm" />
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
              </svg>
            </form>
          </div>
        </div>

        <div
          class="col-sm-8  col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
          <div class="support-box text-end d-none d-xl-block " style="color: white;">
            <span class="fs-6 secondary-font text-white">Phone</span>
            <h5 class="mb-0 text-white">+980-34984089</h5>
          </div>
          <div class="support-box text-end d-none d-xl-block">
            <span class="fs-6 secondary-font text-white">Email</span>
            <h5 class="mb-0  text-white">Teddy@gmail.com</h5>
          </div>

        </div>
      </div>
    </div>

    <div class="container-fluid">
      <hr class="m-0">
    </div>

    <div class="containe sticky-nav" id="sticky-nav">
      <div id="wind-container">
        <!-- Các hình ảnh lá sẽ được thêm vào đây qua JavaScript -->
      </div>
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
            <div class="filter-categories border-0 mb-0 me-5">

            </div>

            <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
              <li class="nav-item">
                <a href="../main/home.php" class="nav-link active text-white">Trang chủ</a>
              </li>


              <li class="nav-item">
                <a href="../main/gaubong.php" class="nav-link text-white">Gấu Bông</a>
              </li>

              <li class="nav-item">
                <a href="../main/dientu.php" class="nav-link text-white">Điện Tử</a>
              </li>

              <li class="nav-item">
                <a href="../main/dogo.php" class="nav-link text-white">Đồ Gỗ</a>
              </li>

              <li class="nav-item">
                <a href="../main/dothucong.php" class="nav-link text-white">Đồ Thủ Công</a>
              </li>

              <li class="nav-item">
                <a href="../main/xe.php" class="nav-link text-white">Xe</a>
              </li>

              <li class="nav-item">
                <a href="../main/sanpham.php" class="nav-link text-white">Sản Phẩm</a>
              </li>

              <li class="nav-item">
                <a href="main.php" class="nav-link text-white">Blog</a>
              </li>

              <li class="nav-item">
                <a href="home.php" class="nav-link text-white">Liên hệ</a>
              </li>



            </ul>

            <div class="d-none d-lg-flex align-items-end">
              <ul class="d-flex justify-content-end list-unstyled m-0">
                <li>
                  <?php
                  if (isset($_SESSION['username'])) { ?>
                    <div class="dropdown d-inline">
                      <a class="dropdown-toggle  text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?= $_SESSION['username'] ?>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                          <a class="dropdown-item" href="../main/profile.php?id=<?= $khachHangInfo['IDKhachHang'] ?>">Tài
                            khoản</a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li>
                          <a class="dropdown-item" href="../main/lich-su-don-hang.php">Lịch sử đơn hàng</a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../main/logout.php">Đăng xuất</a></li>
                      </ul>
                    </div>
                  <?php } else { ?>
                    <a href="login.php" class="mx-3">
                      <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                    </a>
                  <?php } ?>

                </li>
                <li class="">
                  <a href="home.php" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                    aria-controls="offcanvasCart">
                    <iconify-icon icon="mdi:cart" class="fs-4 position-relative text-white "></iconify-icon>
                    <span class="position-absolute translate-middle badge rounded-circle bg-dark pt-2">
                      <?= $giohang_soluong ?? 0 ?>
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
  <script>
    // script.js

    // Hàm tạo lá và thêm hiệu ứng
    let leafCount = 0;
    const maxLeafCount = 19; // Số lượng lá tối đa

    function createLeaf() {
      if (leafCount < maxLeafCount) {
        const leaf = document.createElement("div");
        leaf.classList.add("leaf");

        // Đặt vị trí ngẫu nhiên trong header
        leaf.style.left = `${Math.random() * 100}vw`;
        leaf.style.animationDuration = `${Math.random() * 5 + 7}s`; // Thời gian di chuyển ngẫu nhiên
        leaf.style.animationDelay = `${Math.random() * 5}s`; // Độ trễ ngẫu nhiên

        document.getElementById("wind-container").appendChild(leaf);
        leafCount++; // Tăng số lượng lá

        // Tự động xóa lá khi hoàn thành animation
        leaf.addEventListener("animationend", () => {
          leaf.remove();
          leafCount--; // Giảm số lượng lá khi đã xóa
        });
      }
    }

    // Tạo lá mới sau mỗi khoảng thời gian (ví dụ 2 giây)
    setInterval(createLeaf, 2000);
  </script>