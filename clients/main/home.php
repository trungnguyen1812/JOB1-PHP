<?php
session_start();


require_once '../../controller/sanpham.php';
require_once '../layouts/header.php';

$sanpham = new Sanpham();
$message = '';




// Kiểm tra biểu mẫu đã được gửi chưa
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

  // Xác thực dữ liệu đầu vào bao gồm họ tên, email và mật khẩu
  $hoten = trim($_POST['hoten']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // Các xác thực thông tin cơ bản
  if (empty($hoten) || empty($email) || empty($password)) {
    $message = "Vui lòng điền đầy đủ thông tin!";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "Email không hợp lệ!";
  } elseif (strlen($password) < 6) {
    $message = "Mật khẩu phải có ít nhất 6 ký tự!";
  } else {
    $khachhang = new KhachHang();
    $result_register = $khachhang->register([
      'hoten' => $hoten,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_DEFAULT) // Hash password for security
    ]);

    if ($result_register === 'Đăng ký thành công!') {
      // Lưu trữ dữ liệu người dùng trong Session
      $_SESSION['loggedin'] = true;
      $_SESSION['name'] = $hoten;
      $_SESSION['email'] = $email;

      // Chuyển hướng đến trang chủ hoặc bảng điều khiển
      header("Location: index.php");
      exit();
    } else {
      $message = $result_register;
    }
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['model']) && $_POST['model'] == 'giohang') {
    if (!isset($_SESSION['userId'])) {
      // $_SESSION['error'] = "Đăng nhập để thực hiện mua hàng.";
      // header('Location: ../main/login.php');
      // exit();
    } else {
      $result = $giohang->insertPageHome($_SESSION['userId'], $_POST['idsanpham']);
?>
      <script>
        alert('<?= $result ?>');
      </script>
<?php
    }
  }
}
?>
<div id="main-content">
  <section id="banner" style="background: #F9F3EC;">
    <div class="container">
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="../images/banner-img.png" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4">Best seller !!</div>
                <h2 class="banner-title display-1 fw-normal">Điểm đến tốt nhất <span class="text-primary">cho bạn</span></h2>
                <a href="sanpham.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Mua Ngay</a>
              </div>
            </div>
          </div>
          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="../images/banner-img3.png" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4">Best seller !!</div>
                <h2 class="banner-title display-1 fw-normal">Khám phá những ưu đãi <span class="text-primary">hấp dẫn</span></h2>
                <a href="sanpham.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  Xem ngay
                  <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                    <use xlink:href="#arrow-right"></use>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="../images/banner-img4.png" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4">Best seller !!</div>
                <h2 class="banner-title display-1 fw-normal">Sản phẩm <span class="text-primary">ưu đãi tốt nhất</span></h2>
                <a href="sanpham.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  Khám phá ngay
                  <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                    <use xlink:href="#arrow-right"></use>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination text-dark"></div>
        <!-- Nút điều hướng -->
        <div class="swiper-button-next text-dark"></div>
        <div class="swiper-button-prev text-dark"></div>
      </div>
    </div>
  </section>

  <script src="../package/swiper-bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const swiper = new Swiper(".main-swiper", {
        loop: true, // Bật vòng lặp slide
        autoplay: {
          delay: 5000, // Chuyển slide mỗi 5 giây
          disableOnInteraction: false, // Không dừng autoplay khi người dùng tương tác
        },
        speed: 2000, // Tốc độ trượt (2 giây)
        slidesPerView: 1, // Hiển thị 1 slide mỗi lần
        spaceBetween: 0,
        direction: "horizontal", // Trượt ngang
        rtl: true, // ✅ Trượt từ phải sang trái
        pagination: {
          el: ".swiper-pagination",
          clickable: true, // Cho phép click vào pagination để điều hướng
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    });
  </script>


  <section id="categories">
    <div class="container my-3 py-5">
      <div class="row my-5">

        <div class="col text-center">
          <a href="dogo.php" class="categories-item">
            <iconify-icon class="category-icon" icon="mingcute:toy-horse-line"></iconify-icon>
            <h5>Đồ Gỗ</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="dientu.php" class="categories-item">
            <iconify-icon class="category-icon" icon="material-symbols:smart-toy-outline"></iconify-icon>
            <h5>Đồ Điện</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="dothucong.php" class="categories-item">

            <iconify-icon class="category-icon" icon="svg-spinners:wind-toy"></iconify-icon>
            <h5>Đồ Thủ Công</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="ic:twotone-toys"></iconify-icon>
            <h5>Xe</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="mdi:child-toy"></iconify-icon>
            <h5>Gấu Bông</h5>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section id="foodies" class="my-5">
    <div class="container my-5 py-5">
      <div class="section-header d-md-flex justify-content-between align-items-center">
        <h2 class="display-3 fw-normal">Sản Phẩm Hot Trend</h2>
        <div class="mb-4 mb-md-0"></div>
        <div>
          <a href="../main/sanpham.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
            Mua Ngay
            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
              <use xlink:href="#arrow-right"></use>
            </svg>
          </a>
        </div>
      </div>

      <div class="isotope-container row">
        <?php
        $sanphamListHotTrend = $sanpham->showProductsByCategory(8);
        ?>

        <?php if (!empty($sanphamListHotTrend)): ?>
          <?php foreach ($sanphamListHotTrend as $product): ?>
            <div class="item cat col-md-4 col-lg-3 my-4">
              <div class="card position-relative">
                <a href="../main/chitietsanpham.php?id=<?= $product['IDSanPham'] ?>">
                  <img style="width: 306px; height: 279px;" src="/<?php echo $product['HinhAnh']; ?>"
                    class="img-fluid rounded-4" alt="<?php echo $product['TenSanPham']; ?>">
                </a>
                <div class="card-body p-0 ">
                  <a href="single-product.html">
                    <h3 class="card-title pt-4 m-0 d-flex justify-content-center"><?php echo $product['TenSanPham']; ?></h3>
                  </a>
                  <div class="card-text ">
                    <span class="rating secondary-font d-flex justify-content-center">
                      <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                      <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                      <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                      <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                      <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                      5.0
                    </span>
                    <h3 class="secondary-font text-primary d-flex justify-content-center "><?php echo number_format($product['Gia'], 0); ?> VND</h3>
                    <div class="d-flex justify-content-center">
                      <form action="home.php" method="POST">
                        <input type="hidden" name="model" value="giohang" />
                        <input type="hidden" name="idsanpham" value="<?= $product['IDSanPham'] ?>" />

                        <button class="mb-3" type="submit">Thêm Giỏ Hàng
                        </button>

                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>Không có sản phẩm hot trend.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section id="foodies" class="my-5">
    <div class="container my-5 py-5">
      <div class="section-header d-md-flex justify-content-between align-items-center">
        <h2 class="display-3 fw-normal">Gấu Bông</h2>
        <div class="mb-4 mb-md-0"></div>
        <div>
          <a href="../main/sanpham.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
            Mua Ngay
            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
              <use xlink:href="#arrow-right"></use>
            </svg>
          </a>
        </div>
      </div>

      <div class="isotope-container row">
        <?php
        $sanphamListHotTrend = $sanpham->showProductsByCategory(2);
        ?>

        <?php if (!empty($sanphamListHotTrend)): ?>
          <?php foreach ($sanphamListHotTrend as $product): ?>
            <div class="item cat col-md-4 col-lg-3 my-4">
              <div class="card position-relative">
                <a href="../main/chitietsanpham.php?id=<?= $product['IDSanPham'] ?>">
                  <img style="width: 306px; height: 279px;" src="/<?php echo $product['HinhAnh']; ?>"
                    class="img-fluid rounded-4" alt="<?php echo $product['TenSanPham']; ?>">
                </a>
                <div class="card-body p-0 ">
                  <a href="single-product.html">
                    <h3 class="card-title pt-4 m-0 d-flex justify-content-center"><?php echo $product['TenSanPham']; ?></h3>
                  </a>
                  <div class="card-text ">
                    <span class="rating secondary-font d-flex justify-content-center">
                      <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                      <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                      <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                      <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                      <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                      5.0
                    </span>
                    <h3 class="secondary-font text-primary d-flex justify-content-center "><?php echo number_format($product['Gia'], 0); ?> VND</h3>
                    <div class="d-flex justify-content-center">
                      <form action="home.php" method="POST">
                        <input type="hidden" name="model" value="giohang" />
                        <input type="hidden" name="idsanpham" value="<?= $product['IDSanPham'] ?>" />

                        <button class="mb-3" type="submit">Thêm Giỏ Hàng
                        </button>

                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>Không có sản phẩm hot trend.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>


  <section id="testimonial">
    <div class="container my-5 py-5">
      <div class="row">
        <h1 style="margin-left: 30%; color: #b87333;">Sứ mệnh của chúng tôi</h1>
        <div class="offset-md-1 col-md-10">
          <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="row ">
                  <div class="col-1">
                    <iconify-icon style="font-size: 100px;" icon="ri:double-quotes-l" class="quote-icon text-primary"></iconify-icon>
                  </div>
                  <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                    <p class="testimonial-content fs-2">Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành
                      phố là
                      nơi ươm mầm cho
                      những thành tựu vĩ đại nhất của chúng tôi, và là hy vọng tốt nhất cho một tương lai bền vững.</p>
                    <p class="text-black">- Joshima Lin</p>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="row ">
                  <div class="col-1">
                    <iconify-icon style="font-size: 100px;" icon="ri:double-quotes-l" class="quote-icon text-primary"></iconify-icon>
                  </div>
                  <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                    <p class="testimonial-content fs-2">Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành
                      phố là
                      vườn ươm của chúng tôi
                      thành tựu lớn nhất và là hy vọng tốt nhất cho một tương lai bền vững.</p>
                    <p class="text-black">- Joshima Lin</p>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="row ">
                  <div class="col-1">
                    <iconify-icon style="font-size: 100px;" icon="ri:double-quotes-l" class="quote-icon text-primary"></iconify-icon>
                  </div>
                  <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                    <p class="testimonial-content fs-2">Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành
                      phố là
                      nơi ươm mầm cho
                      những thành tựu lớn nhất của chúng tôi, và là hy vọng tốt nhất cho một tương lai bền vững.</p>
                    <p class="text-black">- Joshima Lin</p>
                  </div>
                </div>
              </div>

            </div>



          </div>
        </div>
      </div>
    </div>

  </section>





</div>
<?php include '../layouts/footer.php'; ?>