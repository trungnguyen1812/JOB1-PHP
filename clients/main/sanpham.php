<?php
ob_start();
session_start();

include_once '../../controller/sanpham.php';
include_once '../../controller/giohang.php';
include '../layouts/header.php';

$sanpham = new SanPham();
$giohang = new GioHang();

// Handle search query
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
if (!empty($search)) {
    $dssanpham = $sanpham->getBySearch($search);
} else {
    // Convert getAll result to array
    $result = $sanpham->getAll();
    $dssanpham = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dssanpham[] = $row;
        }
    }
}

// Handle add-to-cart POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['model']) && $_POST['model'] == 'giohang') {
        if (!isset($_SESSION['userId'])) {
            $_SESSION['error'] = "Đăng nhập để thực hiện mua hàng.";
            header('Location: ../main/login.php');
            exit();
        } else {
            $result = $giohang->insertPageHome($_SESSION['userId'], $_POST['idsanpham']);
            $_SESSION['cart_message'] = $result;
            header('Location: sanpham.php' . ($search ? '?search=' . urlencode($search) : ''));
            exit();
        }
    }
}
?>  
<div id="main-content">
    <!-- Display cart message if any -->
    <?php if (isset($_SESSION['cart_message'])) : ?>
        <script>
            alert('<?= addslashes($_SESSION['cart_message']) ?>');
        </script>
        <?php unset($_SESSION['cart_message']); ?>
    <?php endif; ?>

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
                                <h2 class="banner-title display-1 fw-normal">Sản phẩm tốt nhất<span
                                        class="text-primary"> cho bạn</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="foodies" class="my-5">
        <div class="container my-5 py-5">
            <div class="section-header d-md-flex justify-content-between align-items-center">
                <h2 class="display-3 fw-normal">
                    <?php if (!empty($search)) : ?>
                        Kết quả tìm kiếm cho: "<?= htmlspecialchars($search) ?>"
                    <?php else : ?>
                        Danh Sách Sản Phẩm
                    <?php endif; ?>
                </h2>
                <div class="mb-4 mb-md-0"></div>
            </div>

            <div class="isotope-container row">
                <?php if (empty($dssanpham)) : ?>
                    <div class="text-center">
                        <p>
                            <?php if (!empty($search)) : ?>
                                Không tìm thấy sản phẩm nào cho từ khóa: "<?= htmlspecialchars($search) ?>"
                            <?php else : ?>
                                Hiện tại không có sản phẩm nào.
                            <?php endif; ?>
                        </p>
                    </div>
                <?php else : ?>
                    <?php foreach ($dssanpham as $product) : ?>
                        <div class="item cat col-md-4 col-lg-3 my-4">
                            <div class="card position-relative">
                                <a href="chitietsanpham.php?id=<?= $product['IDSanPham'] ?>">
                                    <img style="width: 306px; height: 279px;" src="/<?= htmlspecialchars($product['HinhAnh']) ?>"
                                        class="img-fluid rounded-4" alt="<?= htmlspecialchars($product['TenSanPham']) ?>">
                                </a>
                                <div class="card-body p-0">
                                    <a href="chitietsanpham.php?id=<?= $product['IDSanPham'] ?>">
                                        <h3 class="card-title pt-4 m-0 d-flex justify-content-center"><?= htmlspecialchars($product['TenSanPham']) ?></h3>
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
                                            <?php if ($product['PercentSale'] > 0) : ?>
                                                <!-- Sale price -->
                                                <h3 class="secondary-font text-primary mb-0">
                                                    <?= number_format($product['SaleValue'], 0) ?> VND
                                                </h3>
                                                <!-- Original price with strikethrough -->
                                                <h5 class="secondary-font text-muted">
                                                    <del><?= number_format($product['Gia'], 0) ?> VND</del>
                                                </h5>
                                            <?php else : ?>
                                                <!-- Only original price, centered vertically -->
                                                <h3 class="secondary-font text-primary">
                                                    <?= number_format($product['Gia'], 0) ?> VND
                                                </h3>
                                                <!-- Empty spacer to maintain consistent height -->
                                                <div class="spacer" style="height: 24px;"></div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <form method="POST" action="">
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
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>
<?php include '../layouts/footer.php'; ?>