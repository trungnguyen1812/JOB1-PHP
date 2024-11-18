<?php
session_start();

include_once '../../controller/sanpham.php';

include_once '../layouts/header.php';

$sanpham = new  Sanpham();

$dssanpham = $sanpham->getAll();

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
                <h2 class="display-3 fw-normal">Gấu Bông</h2>
                <div class="mb-4 mb-md-0"></div>
                <div>
                    <a href="../pages/sanpham.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
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
                                    <img style="width: 306px; height: 279px;" src="/<?php echo $product['HinhAnh']; ?>" class="img-fluid rounded-4" alt="<?php echo $product['TenSanPham']; ?>">
                                </a>
                                <div class="card-body p-0">
                                    <a href="single-product.html">
                                        <h3 class="card-title pt-4 m-0"><?php echo $product['TenSanPham']; ?></h3>
                                    </a>
                                    <div class="card-text">
                                        <span class="rating secondary-font">
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                            5.0
                                        </span>
                                        <h3 class="secondary-font text-primary"><?php echo number_format($product['Gia'], 0); ?> VND</h3>
                                        <div class="d-flex flex-wrap mt-3">
                                            <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                                <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                                            </a>
                                            <a href="#" class="btn-wishlist px-4 pt-3">
                                                <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                            </a>
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