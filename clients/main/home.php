<?php
session_start();

include_once '../../controller/sanpham.php';

include_once '../layouts/header.php';

$sanpham = new  Sanpham();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include_once '../../controller/khachhang.php';
  $khachhang = new KhachHang();
  $result_register = $khachhang->register($_POST);
  echo "<script>alert('" . $result_register . "')</script>";
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
                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                <h2 class="banner-title display-1 fw-normal">Điểm đến tốt nhất <span class="text-primary">cho bạn</span>
                </h2>
                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  Mua Ngay
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
                <img src="../images/banner-img3.png" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                <h2 class="banner-title display-1 fw-normal">Điểm đến tốt nhất <span class="text-primary">cho bạn</span>
                </h2>
                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  Mua Ngay
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
                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                <h2 class="banner-title display-1 fw-normal">Điểm đến tốt nhất <span class="text-primary">cho bạn</span>
                </h2>
                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  Mua Ngay
                  <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                    <use xlink:href="#arrow-right"></use>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    // Swiper configuration với hiệu ứng slide từ phải sang trái
    const swiper = new Swiper('.main-swiper', {
      loop: true, // Để vòng lặp banner
      effect: 'slide', // Sử dụng hiệu ứng slide
      autoplay: {
        delay: 5000, // Thời gian chuyển slide (5 giây)
        disableOnInteraction: false, // Để autoplay tiếp tục khi người dùng tương tác
      },
      speed: 2000, // Tốc độ chuyển cảnh (2000ms = 2 giây)
      slidesPerView: 1, // Hiển thị một slide tại một thời điểm
      spaceBetween: 0, // Khoảng cách giữa các slide
      pagination: {
        el: '.swiper-pagination',
        clickable: true, // Cho phép click vào các phân trang
      },
      direction: 'horizontal', // Chuyển cảnh theo chiều ngang (mặc định là từ trái sang phải)
    });
  </script>


  <section id="categories">
    <div class="container my-3 py-5">
      <div class="row my-5">

        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="mingcute:toy-horse-line"></iconify-icon>
            <h5>Đồ Gỗ</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <iconify-icon class="category-icon" icon="material-symbols:smart-toy-outline"></iconify-icon>
            <h5>Đồ Điện</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">

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
          <div class="mb-4 mb-md-0">
          </div>
          <div>
            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
              Mua Ngay
              <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                <use xlink:href="#arrow-right"></use>
              </svg></a>
          </div>
        </div>

        <div class="isotope-container row">
          <?php 
          $sanphamList = $sanpham->showProductsByCategory(8);
          ?>
        </div>
      </div>
    </section>

    <section id="foodies" class="my-5">
      <div class="container my-5 py-5">
        <div class="section-header d-md-flex justify-content-between align-items-center">
          <h2 class="display-3 fw-normal">Gấu Bông</h2>
          <div class="mb-4 mb-md-0">
          </div>
          <div>
            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
              Mua Ngay
              <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                <use xlink:href="#arrow-right"></use>
              </svg></a>
          </div>
        </div>

        <div class="isotope-container row">
          <?php 
          $sanphamList = $sanpham->showProductsByCategory(2);
          var_dump($sanphamList);

          ?>
        </div>
      </div>
    </section>

<section id="banner-2" class="my-3" style="background: #F9F3EC;">
  <div class="container">
    <div class="row flex-row-reverse banner-content align-items-center">
      <div class="img-wrapper col-12 col-md-6">
        <img src="../images/banner-img2.png" class="img-fluid">
      </div>
      <div class="content-wrapper col-12 offset-md-1 col-md-5 p-5">
        <div class="secondary-font text-primary text-uppercase mb-3 fs-4">Upto 40% off</div>
        <h2 class="banner-title display-1 fw-normal">Thanh Lý !!!
        </h2>
        <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
          Mua Ngay
          <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
            <use xlink:href="#arrow-right"></use>
          </svg></a>
      </div>

    </div>
  </div>
</section>

<section id="testimonial">
  <div class="container my-5 py-5">
    <div class="row">
      <div class="offset-md-1 col-md-10">
        <div class="swiper testimonial-swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row ">
                <div class="col-2">
                  <iconify-icon icon="ri:double-quotes-l" class="quote-icon text-primary"></iconify-icon>
                </div>
                <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                  <p class="testimonial-content fs-2">Cốt lõi trong hoạt động của chúng tôi là ý tưởng rằng các thành phố là
                    nơi ươm mầm cho
                    những thành tựu vĩ đại nhất của chúng tôi, và là hy vọng tốt nhất cho một tương lai bền vững.</p>
                  <p class="text-black">- Joshima Lin</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="row ">
                <div class="col-2">
                  <iconify-icon icon="ri:double-quotes-l" class="quote-icon text-primary"></iconify-icon>
                </div>
                <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                  <p class="testimonial-content fs-2">At the core of our practice is the idea that cities are the
                    incubators of our
                    greatest achievements, and the best hope for a sustainable future.</p>
                  <p class="text-black">- Joshima Lin</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="row ">
                <div class="col-2">
                  <iconify-icon icon="ri:double-quotes-l" class="quote-icon text-primary"></iconify-icon>
                </div>
                <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                  <p class="testimonial-content fs-2">At the core of our practice is the idea that cities are the
                    incubators of our
                    greatest achievements, and the best hope for a sustainable future.</p>
                  <p class="text-black">- Joshima Lin</p>
                </div>
              </div>
            </div>

          </div>

          <div class="swiper-pagination"></div>

        </div>
      </div>
    </div>
  </div>

</section>


<section id="register" style="background: url('../images/background-img.png') no-repeat;">
  <div class="container ">
    <div class="row my-5 py-5">
      <div class="offset-md-3 col-md-6 my-5 ">
        <h2 class="display-3 fw-normal text-center">Giảm 20% <span class="text-primary">cho lần mua đầu tiên
          </span>
        </h2>
        <form action="register.php" method="post">
          <div class="mb-3">
            <input type="text" class="form-control form-control-lg" name="hoten" id="hoten"
              placeholder="Họ tên của bạn...." required>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control form-control-lg" name="email" id="email"
              placeholder="Địa chỉ email của bạn ......" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control form-control-lg" name="password" id="password"
              placeholder="Repeat Password" required>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-dark btn-lg rounded-1">Đăng ký ngay</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

</div>
<?php include '../layouts/footer.php'; ?>