<?php
session_start();
include '../layouts/header.php';
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

  <section id="clothing" class="my-5 overflow-hidden">
    <div class="container pb-5">

      <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
        <h2 class="display-3 fw-normal">Sản Phẩm Hot trend</h2>
        <div>
          <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
            Mua Ngay
            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
              <use xlink:href="#arrow-right"></use>
            </svg></a>
        </div>
      </div>

      <div class="products-carousel swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div>
            <div class="card position-relative">
              <a href="single-product.html"><img style="width: 301px; height: 295px;" src="../images/sanpham1.png" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Labubu áo jean</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

                  <div class="d-flex flex-wrap mt-3">
                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                      <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                    </a>
                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                      <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                    </a>
                  </div>


                </div>

              </div>
            </div>
          </div>


        </div>
        <div class="swiper-slide">

        </div>

      </div>
    </div>
    <!-- / products-carousel -->


</div>
</section>

<section id="foodies" class="my-5">
  <div class="container my-5 py-5">

    <div class="section-header d-md-flex justify-content-between align-items-center">
      <h2 class="display-3 fw-normal">Đồ Thủ Công</h2>
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

      <div class="item cat col-md-4 col-lg-3 my-4">
        <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
        <div class="card position-relative">
          <a href="single-product.html"><img style="width: 306px; height: 279px;" src="../images/item9.jpg" class="img-fluid rounded-4" alt="image"></a>
          <div class="card-body p-0">
            <a href="single-product.html">
              <h3 class="card-title pt-4 m-0">Grey1 hoodie</h3>
            </a>

            <div class="card-text">
              <span class="rating secondary-font">
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                5.0</span>

              <h3 class="secondary-font text-primary">$18.00</h3>

              <div class="d-flex flex-wrap mt-3">
                <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                  <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                </a>
                <a href="#" class="btn-wishlist px-4 pt-3 ">
                  <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                </a>
              </div>


            </div>

          </div>
        </div>
      </div>

      <div class="item dog col-md-4 col-lg-3 my-4">
        <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
          New
        </div>
        <div class="card position-relative">
          <a href="single-product.html"><img style="width: 306px; height: 279px;" src="../images/item10.jpg" class="img-fluid rounded-4" alt="image"></a>
          <div class="card-body p-0">
            <a href="single-product.html">
              <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
            </a>

            <div class="card-text">
              <span class="rating secondary-font">
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                5.0</span>

              <h3 class="secondary-font text-primary">$18.00</h3>

              <div class="d-flex flex-wrap mt-3">
                <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                  <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                </a>
                <a href="#" class="btn-wishlist px-4 pt-3 ">
                  <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                </a>
              </div>


            </div>

          </div>
        </div>
      </div>

      <div class="item dog col-md-4 col-lg-3 my-4">
        <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
        <div class="card position-relative">
          <a href="single-product.html"><img style="width: 306px; height: 279px;" src="../images/item11.jpg" class="img-fluid rounded-4" alt="image"></a>
          <div class="card-body p-0">
            <a href="single-product.html">
              <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
            </a>

            <div class="card-text">
              <span class="rating secondary-font">
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                5.0</span>

              <h3 class="secondary-font text-primary">$18.00</h3>

              <div class="d-flex flex-wrap mt-3">
                <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                  <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                </a>
                <a href="#" class="btn-wishlist px-4 pt-3 ">
                  <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                </a>
              </div>


            </div>

          </div>
        </div>
      </div>

      <div class="item cat col-md-4 col-lg-3 my-4">
        <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
          Sold
        </div>
        <div class="card position-relative">
          <a href="single-product.html"><img style="width: 306px; height: 279px;" src="../images/item12.jpg" class="img-fluid rounded-4" alt="image"></a>
          <div class="card-body p-0">
            <a href="single-product.html">
              <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
            </a>

            <div class="card-text">
              <span class="rating secondary-font">
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                5.0</span>

              <h3 class="secondary-font text-primary">$18.00</h3>

              <div class="d-flex flex-wrap mt-3">
                <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                  <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                </a>
                <a href="#" class="btn-wishlist px-4 pt-3 ">
                  <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                </a>
              </div>


            </div>

          </div>
        </div>
      </div>

      <div class="item bird col-md-4 col-lg-3 my-4">
        <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
        <div class="card position-relative">
          <a href="single-product.html"><img style="width: 306px; height: 279px;" src="../images/item13.jpg" class="img-fluid rounded-4" alt="image"></a>
          <div class="card-body p-0">
            <a href="single-product.html">
              <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
            </a>

            <div class="card-text">
              <span class="rating secondary-font">
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                5.0</span>

              <h3 class="secondary-font text-primary">$18.00</h3>

              <div class="d-flex flex-wrap mt-3">
                <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                  <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                </a>
                <a href="#" class="btn-wishlist px-4 pt-3 ">
                  <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                </a>
              </div>


            </div>

          </div>
        </div>
      </div>

      <div class="item bird col-md-4 col-lg-3 my-4">
        <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
        <div class="card position-relative">
          <a href="single-product.html"><img style="width: 306px; height: 279px;" src="../images/item14.jpg" class="img-fluid rounded-4" alt="image"></a>
          <div class="card-body p-0">
            <a href="single-product.html">
              <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
            </a>

            <div class="card-text">
              <span class="rating secondary-font">
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                5.0</span>

              <h3 class="secondary-font text-primary">$18.00</h3>

              <div class="d-flex flex-wrap mt-3">
                <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                  <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                </a>
                <a href="#" class="btn-wishlist px-4 pt-3 ">
                  <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                </a>
              </div>


            </div>

          </div>
        </div>
      </div>

      <div class="item dog col-md-4 col-lg-3 my-4">
        <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
          Sale
        </div>
        <div class="card position-relative">
          <a href="single-product.html"><img style="width: 306px; height: 279px;" src="../images/item15.jpg" class="img-fluid rounded-4" alt="image"></a>
          <div class="card-body p-0">
            <a href="single-product.html">
              <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
            </a>

            <div class="card-text">
              <span class="rating secondary-font">
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                5.0</span>

              <h3 class="secondary-font text-primary">$18.00</h3>

              <div class="d-flex flex-wrap mt-3">
                <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                  <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                </a>
                <a href="#" class="btn-wishlist px-4 pt-3 ">
                  <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                </a>
              </div>


            </div>

          </div>
        </div>
      </div>

      <div class="item cat col-md-4 col-lg-3 my-4">
        <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
        <div class="card position-relative">
          <a href="single-product.html"><img style="width: 306px; height: 279px;" src="../images/item16.jpg" class="img-fluid rounded-4" alt="image"></a>
          <div class="card-body p-0">
            <a href="single-product.html">
              <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
            </a>

            <div class="card-text">
              <span class="rating secondary-font">
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                5.0</span>

              <h3 class="secondary-font text-primary">$18.00</h3>

              <div class="d-flex flex-wrap mt-3">
                <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                  <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                </a>
                <a href="#" class="btn-wishlist px-4 pt-3 ">
                  <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                </a>
              </div>


            </div>

          </div>
        </div>
      </div>


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

<?php
include '../../controller/khachhang.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $khachhang = new khachhang();
  $result_register = $khachhang->register($_POST);

  echo "<script>alert('" . $result_register . "')</script>";
}
?>
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

<!-- <section id="latest-blog" class="my-5">
    <div class="container py-5 my-5">
      <div class="row mt-5">
        <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
          <h2 class="display-3 fw-normal">Latest Blog Post</h2>
          <div>
            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
              Read all
              <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                <use xlink:href="#arrow-right"></use>
              </svg></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 my-4 my-md-0">
          <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
            <h3 class="secondary-font text-primary m-0">20</h3>
            <p class="secondary-font fs-6 m-0">Feb</p>

          </div>
          <div class="card position-relative">
            <a href="single-post.html"><img src="../images/blog1.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-post.html">
                <h3 class="card-title pt-4 pb-3 m-0">10 Reasons to be helpful towards any animals</h3>
              </a>

              <div class="card-text">
                <p class="blog-paragraph fs-6">At the core of our practice is the idea that cities are the incubators of
                  our greatest
                  achievements, and the best hope for a sustainable future.</p>
                <a href="single-post.html" class="blog-read">read more</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-4 my-4 my-md-0">
          <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
            <h3 class="secondary-font text-primary m-0">21</h3>
            <p class="secondary-font fs-6 m-0">Feb</p>

          </div>
          <div class="card position-relative">
            <a href="single-post.html"><img src="../images/blog2.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-post.html">
                <h3 class="card-title pt-4 pb-3 m-0">How to know your pet is hungry</h3>
              </a>

              <div class="card-text">
                <p class="blog-paragraph fs-6">At the core of our practice is the idea that cities are the incubators of
                  our greatest
                  achievements, and the best hope for a sustainable future.</p>
                <a href="single-post.html" class="blog-read">read more</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-4 my-4 my-md-0">
          <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
            <h3 class="secondary-font text-primary m-0">22</h3>
            <p class="secondary-font fs-6 m-0">Feb</p>

          </div>
          <div class="card position-relative">
            <a href="single-post.html"><img src="../images/blog3.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-post.html">
                <h3 class="card-title pt-4 pb-3 m-0">Best home for your pets</h3>
              </a>

              <div class="card-text">
                <p class="blog-paragraph fs-6">At the core of our practice is the idea that cities are the incubators of
                  our greatest
                  achievements, and the best hope for a sustainable future.</p>
                <a href="single-post.html" class="blog-read">read more</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
<!-- 
  <section id="service">
    <div class="container py-5 my-5">
      <div class="row g-md-5 pt-4">
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary" icon="la:shopping-cart"></iconify-icon>
            </div>
            <h3 class="card-title py-2 m-0">Free Delivery</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary" icon="la:user-check"></iconify-icon>
            </div>
            <h3 class="card-title py-2 m-0">100% secure payment</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary" icon="la:tag"></iconify-icon>
            </div>
            <h3 class="card-title py-2 m-0">Daily Offer</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary" icon="la:award"></iconify-icon>
            </div>
            <h3 class="card-title py-2 m-0">Quality guarantee</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="insta" class="my-5">
    <div class="row g-0 py-5">
      <div class="col instagram-item  text-center position-relative">
        <div class="icon-overlay d-flex justify-content-center position-absolute">
          <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
        </div>
        <a href="#">
          <img src="../images/insta1.jpg" alt="insta-img" class="img-fluid rounded-3">
        </a>
      </div>
      <div class="col instagram-item  text-center position-relative">
        <div class="icon-overlay d-flex justify-content-center position-absolute">
          <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
        </div>
        <a href="#">
          <img src="../images/insta2.jpg" alt="insta-img" class="img-fluid rounded-3">
        </a>
      </div>
      <div class="col instagram-item  text-center position-relative">
        <div class="icon-overlay d-flex justify-content-center position-absolute">
          <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
        </div>
        <a href="#">
          <img src="../images/insta3.jpg" alt="insta-img" class="img-fluid rounded-3">
        </a>
      </div>
      <div class="col instagram-item  text-center position-relative">
        <div class="icon-overlay d-flex justify-content-center position-absolute">
          <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
        </div>
        <a href="#">
          <img src="../images/insta4.jpg" alt="insta-img" class="img-fluid rounded-3">
        </a>
      </div>
      <div class="col instagram-item  text-center position-relative">
        <div class="icon-overlay d-flex justify-content-center position-absolute">
          <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
        </div>
        <a href="#">
          <img src="../images/insta5.jpg" alt="insta-img" class="img-fluid rounded-3">
        </a>
      </div>
      <div class="col instagram-item  text-center position-relative">
        <div class="icon-overlay d-flex justify-content-center position-absolute">
          <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
        </div>
        <a href="#">
          <img src="../images/insta6.jpg" alt="insta-img" class="img-fluid rounded-3">
        </a>
      </div>
    </div>
  </section> -->
</div>
<?php include '../layouts/footer.php'; ?>