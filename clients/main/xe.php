<?php
session_start();

require_once '../../controller/sanpham.php';
require_once '../../controller/giohang.php'; // Include Giohang controller
require_once '../../controller/khachhang.php'; // Include KhachHang controller
require_once '../layouts/header.php';

$sanpham = new Sanpham();
$giohang = new Giohang();
$khachhang = new KhachHang();
$dssanpham = $sanpham->getAll();
$message = ''; // For error/success messages

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle cart addition
    if (isset($_POST['model']) && $_POST['model'] == 'giohang') {
        if (!isset($_SESSION['userId'])) {
            // User not logged in, redirect to login
            $message = "Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!";
?>
            <script>
                alert('<?php echo $message; ?>');
                window.location.href = '../main/login.php';
            </script>
        <?php
            exit();
        } else {
            // Add to cart
            $result = $giohang->insertPageHome($_SESSION['userId'], $_POST['idsanpham']);
        ?>
            <script>
                alert('<?php echo $result; ?>');
                window.location.href = 'dothucong.php'; // Reload page to update cart
            </script>
<?php
            exit();
        }
    }

    // Handle registration
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        $hoten = trim($_POST['hoten'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Validate input
        if (empty($hoten) || empty($email) || empty($password)) {
            $message = "Vui lòng điền đầy đủ thông tin!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Email không hợp lệ!";
        } elseif (strlen($password) < 6) {
            $message = "Mật khẩu phải có ít nhất 6 ký tự!";
        } else {
            $result_register = $khachhang->register([
                'hoten' => $hoten,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            if ($result_register === 'Đăng ký thành công!') {
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $hoten;
                $_SESSION['email'] = $email;
                header("Location: home.php"); // Redirect to homepage
                exit();
            } else {
                $message = $result_register;
            }
        }
    }
}
?>
<div id="main-content">
    <!-- Display message if any -->
    <?php if (!empty($message)): ?>
        <div class="alert alert-warning"><?php echo $message; ?></div>
    <?php endif; ?>
    <section id="banner" style="background: #F9F3EC;">
        <div class="container">
            <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide py-5">
                        <div class="row banner-content align-items-center">
                            <div class="img-wrapper col-md-5">
                                <img width="700" height="750" src="../images/banner/Xe.png" class="img-fluid">
                            </div>
                            <div class="content-wrapper col-md-7 p-5 mb-5">
                                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                                <h2 class="banner-title display-1 fw-normal"> Xe Đồ Chơi<span class="text-primary">Công Nghệ</span>
                                </h2>
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


    <section id="foodies" class="my-5">
        <div class="container my-5 py-5">
            <div class="section-header d-md-flex justify-content-between align-items-center">
                <h2 class="display-3 fw-normal">Xe</h2>
                <div class="mb-4 mb-md-0"></div>
                <div>
                    <a href="xe.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                        Mua Ngay
                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="isotope-container row">
                <?php
                $sanphamListHotTrend = $sanpham->showProductsByCategory(11);
                ?>

                <?php if (!empty($sanphamListHotTrend)): ?>
                    <?php foreach ($sanphamListHotTrend as $product): ?>
                        <div class="item cat col-md-4 col-lg-3 my-4">
                            <div class="card position-relative">
                                <a href="chitietsanpham.php?id=<?= $product['IDSanPham'] ?>">
                                    <img style="width: 306px; height: 279px;" src="/<?php echo $product['HinhAnh']; ?>"
                                        class="img-fluid rounded-4" alt="<?php echo $product['TenSanPham']; ?>">
                                </a>
                                <div class="card-body p-0">
                                    <a href="single-product.html">
                                        <h3 class="card-title pt-4 m-0 d-flex justify-content-center"><?php echo $product['TenSanPham']; ?></h3>
                                    </a>
                                    <div class="card-text">
                                        <span class="rating secondary-font d-flex justify-content-center">
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            5.0
                                        </span>

                                        <div class="price-container d-flex flex-column align-items-center justify-content-center" style="height: 80px;">
                                            <?php if ($product['PercentSale'] > 0): ?>
                                                <h3 class="secondary-font text-primary mb-0">
                                                    <?php echo number_format($product['SaleValue'], 0); ?>VND
                                                </h3>
                                                <h5 class="secondary-font text-muted">
                                                    <del><?php echo number_format($product['Gia'], 0); ?>VND</del>
                                                </h5>
                                            <?php else: ?>
                                                <h3 class="secondary-font text-primary">
                                                    <?php echo number_format($product['Gia'], 0); ?>VND
                                                </h3>
                                                <div class="spacer" style="height: 24px;"></div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <form action="dothucong.php" method="POST">
                                                <input type="hidden" name="model" value="giohang" />
                                                <input type="hidden" name="idsanpham" value="<?= $product['IDSanPham'] ?>" />
                                                <button class="mb-3" type="submit">Thêm Giỏ Hàng</button>
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



</div>
<?php include '../layouts/footer.php'; ?>