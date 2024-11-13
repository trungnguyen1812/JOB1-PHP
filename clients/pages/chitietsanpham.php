<?php
session_start();
include_once '../../controller/sanpham.php';
include_once '../layouts/header.php';
$sanpham = new Sanpham();
$sanphamUpdate = mysqli_fetch_assoc($sanpham->getById($_GET['id']));
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm - <?php echo htmlspecialchars($sanphamUpdate['TenSanPham']); ?></title>
    <link rel="stylesheet" href="../css/detail.css">
</head>

<body>
    <hr>
    <!-- Section Chi Tiết Sản Phẩm -->
    <section class="product-details">
        <div class="container">
            <div class="product-wrapper">
                
                <!-- Hình ảnh sản phẩm -->
                <div class="product-image">
                    <img width="400" height="450" src="/<?php echo htmlspecialchars($sanphamUpdate['HinhAnh']); ?>" alt="<?php echo htmlspecialchars($sanphamUpdate['TenSanPham']); ?>" class="product-img">
                </div>

                <!-- Thông tin sản phẩm -->
                <div class="product-info">
                    <h1 class="product-title"><?php echo htmlspecialchars($sanphamUpdate['TenSanPham']); ?></h1>
                    <p class="product-price"><?php echo number_format($sanphamUpdate['Gia'], 0); ?> VND</p>

                    <!-- Xếp hạng sản phẩm -->
                    <div class="rating">
                        <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                        <span class="rating-text">5.0</span>
                    </div>

                    <!-- Mô tả sản phẩm -->
                    <div class="product-description">
                        <h3>Mô Tả Sản Phẩm</h3>
                        <p>
                            <?php echo htmlspecialchars($sanphamUpdate['MoTa']); ?>
                        </p>
                       
                    </div>

                    <!-- Nút chức năng -->
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
    </section>

    <hr>
    <?php include '../layouts/footer.php'; ?>
</body>

</html>
