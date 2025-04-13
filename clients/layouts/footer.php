<footer id="footer" class=" bg-dark">
  <div class="container py-5 ">
    <div class="row">
      <div class="col-md-3">
        <div class="footer-menu">
          <img width="160" height="50" src="../images/logo.png" alt="logo">
          <p class="blog-paragraph fs-6 mt-3">Đăng ký nhận bản tin của chúng tôi để nhận thông tin cập nhật về các ưu đãi lớn của chúng tôi.</p>
          <div class="social-links">
            <ul class="d-flex list-unstyled gap-2">
              <li class="social">
                <a href="#">
                  <iconify-icon class="social-icon" icon="ri:facebook-fill"></iconify-icon>
                </a>
              </li>
              <li class="social">
                <a href="#">
                  <iconify-icon class="social-icon" icon="ri:twitter-fill"></iconify-icon>
                </a>
              </li>
              <li class="social">
                <a href="#">
                  <iconify-icon class="social-icon" icon="ri:pinterest-fill"></iconify-icon>
                </a>
              </li>
              <li class="social">
                <a href="#">
                  <iconify-icon class="social-icon" icon="ri:instagram-fill"></iconify-icon>
                </a>
              </li>
              <li class="social">
                <a href="#">
                  <iconify-icon class="social-icon" icon="ri:youtube-fill"></iconify-icon>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="footer-menu">
          <h3 class="text-white">Liên kết nhanh</h3>
          <ul class="menu-list list-unstyled">
            <li class="menu-item">
              <a href="#" class="nav-link">Trang chủ</a>
            </li>

            <li class="menu-item">
              <a href="#" class="nav-link">Dịch vụ</a>
            </li>
            <li class="menu-item">
              <a href="#" class="nav-link">Liên hệ</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="footer-menu">
          <h3 class="text-white">Trung tâm trợ giúp</h5>
            <ul class="menu-list list-unstyled">

              <li class="menu-item">
                <a href="#" class="nav-link">Trả lại & Hoàn tiền</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">Đặt Hàng</a>
              </li>
              <li class="menu-item">
                <a href="#" class="nav-link">Thông tin giao hàng</a>
              </li>
            </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div>
          <h3 class="text-white">Bản tin của chúng tôi!</h3>
          <p class="blog-paragraph fs-6">Đăng ký nhận bản tin của chúng tôi để nhận thông tin cập nhật về các ưu đãi lớn của chúng tôi.</p>
          <div class="search-bar border rounded-pill border-dark-subtle px-2">
            <form class="text-center d-flex align-items-center" action="" method="">
              <input type="text" class="form-control border-0 bg-transparent" placeholder="Nhập email của bạn tại đây" />
              <iconify-icon class="send-icon" icon="tabler:location-filled"></iconify-icon>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</footer>



<script src="../js/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"></script>
<script src="../package/swiper-bundle.min.js"></script>
<script src="../js/plugins.js"></script>
<script src="../js/script.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="../js/addSanPham.js"></script>
<script>
  window.onscroll = function() {
    stickyNav()
  };

  var navbar = document.getElementById("sticky-nav");
  var sticky = navbar.offsetTop;

  function stickyNav() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }
</script>
</body>

</html>