<?php
ob_start();
session_start();

include_once '../../controller/sanpham.php';
include_once '../../controller/giohang.php';
include_once '../layouts/header.php';

$sanpham = new SanPham();
$giohang = new GioHang();

// Get product by ID
$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$chiTietSanPham = null;
$result = $sanpham->getByID($productId); // Note: getByID (case-sensitive)
if ($result && $result->num_rows > 0) {
  $chiTietSanPham = $result->fetch_assoc();
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
      header('Location: sanpham.php');
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi Tiết Sản Phẩm - <?php echo $chiTietSanPham ? htmlspecialchars($chiTietSanPham['TenSanPham']) : 'Không Tìm Thấy'; ?></title>
  <link rel="stylesheet" href="../css/detail.css">
  <style>
    .btn-cart:hover h5 {
      border-color: #b87333;
    }
    .btn-cart:hover h5 {
      color: white;
    }

  </style>
</head>

<body>
  <hr>
  <!-- Section Chi Tiết Sản Phẩm -->
  <section class="product-details">
    <div class="container">
      <?php if ($chiTietSanPham): ?>
        <div class="product-wrapper">
          <!-- Hình ảnh sản phẩm -->
          <div class="product-image">
            <img width="400" height="450" src="/<?php echo htmlspecialchars($chiTietSanPham['HinhAnh']); ?>"
              alt="<?php echo htmlspecialchars($chiTietSanPham['TenSanPham']); ?>" class="product-img">
          </div>

          <!-- Thông tin sản phẩm -->
          <div class="product-info">
            <h1 class="product-title"><?php echo htmlspecialchars($chiTietSanPham['TenSanPham']); ?></h1>
            <div class="price-container">
              <?php if ($chiTietSanPham['PercentSale'] > 0): ?>
                <!-- Sale price -->
                <p class="product-price text-primary mb-0">
                  <?= number_format($chiTietSanPham['SaleValue'], 0); ?> VND
                </p>
                <!-- Original price with strikethrough -->
                <p class="product-price text-muted">
                  <del><?= number_format($chiTietSanPham['Gia'], 0); ?> VND</del>
                </p>
              <?php else: ?>
                <!-- Only original price -->
                <p class="product-price text-primary">
                  <?= number_format($chiTietSanPham['Gia'], 0); ?> VND
                </p>
              <?php endif; ?>
            </div>

            <!-- Xếp hạng sản phẩm -->
            <div class="rating">
              <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
              <span class="rating-text">5.0</span>
            </div>

            <!-- Mô tả sản phẩm -->
            <div class="product-description">
              <h3>Mô Tả Sản Phẩm</h3>
              <p><?php echo htmlspecialchars($chiTietSanPham['MoTa']); ?></p>
            </div>

            <!-- Nút chức năng -->
            <div class="d-flex flex-wrap mt-3">
              <form method="POST" action="">
                <input type="hidden" name="model" value="giohang" />
                <input type="hidden" name="idsanpham" value="<?= $chiTietSanPham['IDSanPham'] ?>" />
                <button style="border: none; border-radius: 5px;" type="submit" class="btn-cart me-3 px-4 pt-3 pb-3 ">
                  <h5 class="text-uppercase m-0">Thêm Giỏ Hàng</h5>
                </button>
              </form>
              <a href="#" class="btn-wishlist px-4 pt-3">
                <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
              </a>
            </div>
          </div>
        </div>
      <?php else: ?>
        <div class="text-center">
          <p>Sản phẩm không tồn tại hoặc đã bị xóa.</p>
          <a href="sanpham.php" class="btn btn-primary">Quay lại danh sách sản phẩm</a>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- Sản Phẩm Hot Trend -->
  <section id="foodies" class="my-5">
    <div class="container my-5 py-5">
      <div class="section-header d-md-flex justify-content-between align-items-center">
        <h2 class="display-3 fw-normal">Sản Phẩm Hot Trend</h2>
        <div class="mb-4 mb-md-0"></div>
        <div>
          <a href="sanpham.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 mb-3">
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
        if (!empty($sanphamListHotTrend)):
          foreach ($sanphamListHotTrend as $product):
        ?>
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
                        <button class="mb-3 type=" submit">Thêm Giỏ Hàng</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="text-center">
            <p>Không có sản phẩm hot trend.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <hr>
  <?php include '../layouts/footer.php'; ?>
</body>

</html>