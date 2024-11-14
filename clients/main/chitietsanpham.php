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

    <section id="foodies" class="my-5">
    <div class="container my-5 py-5">
      <div class="section-header d-md-flex justify-content-between align-items-center">
        <h2 class="display-3 fw-normal">Sản Phẩm Hot Trend</h2>
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
        $sanphamListHotTrend = $sanpham->showProductsByCategory(8);
        ?>

        <?php if (!empty($sanphamListHotTrend)): ?>
          <?php foreach ($sanphamListHotTrend as $product): ?>
            <div class="item cat col-md-4 col-lg-3 my-4">
              <div class="card position-relative">
                <a href="../pages/chitietsanpham.php?id=<?= $product['IDSanPham'] ?>">
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
    <hr>
    <?php include '../layouts/footer.php'; ?>
</body>

</html>
