<?php
ob_start();
session_start();


include_once '../../controller/sanpham.php';

include '../layouts/header.php';

$sanpham = new  Sanpham();

$dssanpham = $sanpham->getAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['model']) && $_POST['model']=='giohang') {
        if (!isset($_SESSION['userId'])) {
            // $_SESSION['error'] = "Đăng nhập để thực hiện mua hàng.";
            // header('Location: ../main/login.php');
            // exit();
        } else {
            $result = $giohang->insert($_SESSION['userId'], $_POST['idsanpham']);
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
                                <img src="../images/banner/bannerSanPham.png" class="img-fluid">
                            </div>
                            <div class="content-wrapper col-md-7 p-5 mb-5">
                                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                                <h2 class="banner-title display-1 fw-normal">Sản phẩm tốt nhất<span class="text-primary">cho bạn</span>
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
                <h2 class="display-3 fw-normal">Danh Sách Sản Phẩm</h2>
                <div class="mb-4 mb-md-0"></div>

            </div>

            <div class="isotope-container row">
                <?php
                if ($dssanpham) {
                    foreach ($dssanpham as $key => $value) {
                ?>
                        <div class="item cat col-md-4 col-lg-3 my-4">
                            <div class="card position-relative">
                                <a href="chitietsanpham.php?id=<?= $value['IDSanPham'] ?>">
                                    <img style="width: 306px; height: 279px;" src="/<?php echo $value['HinhAnh']; ?>" class="img-fluid rounded-4" alt="<?php echo $value['TenSanPham']; ?>">
                                </a>
                                <div class="card-body p-0">
                                    <a href="single-product.html">
                                        <h3 class="card-title pt-4 m-0"><?php echo $value['TenSanPham']; ?></h3>
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
                                        <h3 class="secondary-font text-primary"><?php echo number_format($value['Gia'], 0); ?> VND</h3>
                                        <div class="d-flex flex-wrap mt-3">
                                            <form action="sanpham.php" method="POST">
                                                <input type="hidden" name="model" value="giohang" />
                                                <input type="hidden" name="idsanpham" value="<?= $value['IDSanPham'] ?>" />
                                                <button type="submit" class="btn-cart me-3 px-4 pt-3 pb-3">
                                                    <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                                                </button>
                                            </form>
                                            <a href="#" class="btn-wishlist px-4 pt-3">
                                                <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>



</div>
<?php include '../layouts/footer.php'; ?>