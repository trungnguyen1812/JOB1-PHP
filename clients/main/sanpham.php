<?php
ob_start();
session_start();

include_once '../../controller/sanpham.php';
include '../layouts/header.php';

$sanpham = new Sanpham();
$dssanpham = $sanpham->getAll();

//action post san pham len gio hang 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['model']) && $_POST['model'] == 'giohang') {
        if (!isset($_SESSION['userId'])) {
            // $_SESSION['error'] = "Đăng nhập để thực hiện mua hàng.";
            // header('Location: ../main/login.php');
            // exit();
        } else {
            $result = $giohang->insertPageHome($_SESSION['userId'], $_POST['idsanpham']);
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

    <script>
        function addToCart(idsp) {
            const idkh = <?php echo isset($_SESSION['userId']) ? json_encode($_SESSION['userId']) : 'null'; ?>;

            if (!idkh) {
                alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
                window.location.href = '../main/login.php';
                return;
            }

            fetch('/controller/add_to_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        idkh: idkh,
                        idsp: idsp
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Add to cart response:', data);
                    if (data.status === 'success') {
                        alert(data.message);
                        updateCartUI(idkh);
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra: ' + error.message);
                });
        }

        function updateCartUI(idkh) {
            fetch('/controller/get_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        idkh: idkh
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to fetch cart');
                    }
                    return response.json();
                })
                .then(cart => {
                    console.log('Cart data:', cart);
                    if (cart.status !== 'success') {
                        console.error('Cart error:', cart.message);
                        return;
                    }

                    // Đảm bảo cart.items là mảng
                    if (!Array.isArray(cart.items)) {
                        console.error('cart.items is not an array:', cart.items);
                        cart.items = [];
                        cart.totalItems = 0;
                        cart.totalAmount = 0;
                    }

                    // Cập nhật giỏ hàng trong header
                    const cartContainer = document.querySelector('.order-md-last');
                    if (!cartContainer) {
                        console.error('Cart container (.order-md-last) not found in DOM');
                        return;
                    }

                    let html = `
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Giỏ hàng</span>
                <span class="badge bg-primary rounded-circle pt-2">${cart.totalItems} Sản phẩm</span>
            </h4>
        `;
                    if (cart.totalItems === 0) {
                        html += '<h4>Bạn chưa có gì trong giỏ hàng :(</h4>';
                    } else {
                        html += `
                <ul class="list-group mb-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="tensanpham">Tên Sản Phẩm</th>
                                <th class="text-center dongia">Đơn Giá</th>
                                <th class="text-center soluong">Số Lượng</th>
                                <th class="text-center tong">Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
            `;
                        cart.items.forEach(item => {
                            html += `
                    <tr>
                        <td>${item.TenSanPham}</td>
                        <td class="text-center">${item.Gia.toLocaleString('vi-VN')}</td>
                        <td class="text-center">${item.SoLuong}</td>
                        <td class="text-center">${(item.Gia * item.SoLuong).toLocaleString('vi-VN')} VNĐ</td>
                        <td class="text-center" style="width: 10%">
                            <form action="/controller/giohang_xoa.php" method="post">
                                <input type="hidden" name="id" value="${item.IDGioHang}">
                                <input type="submit" value="Xoá" style="border: none;background-color: #a05c2e;color: white;">
                            </form>
                        </td>
                    </tr>
                `;
                        });
                        html += `
                        </tbody>
                    </table>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="fw-bold">Tổng tiền: </span>
                        <strong>${cart.totalAmount.toLocaleString('vi-VN')} VNĐ</strong>
                    </li>
                </ul>
                <div class="text-center">
                    <a href="../main/checkout.php">
                        <button class="bm-3" type="submit">Checkout</button>
                    </a>
                </div>
            `;
                    }
                    cartContainer.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error updating cart:', error);
                });
        }
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
                    foreach ($dssanpham as $key => $product) {
                ?>
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
                                                <!-- Sale price -->
                                                <h3 class="secondary-font text-primary mb-0">
                                                    <?php echo number_format($product['SaleValue'], 0); ?>VND
                                                </h3>
                                                <!-- Original price with strikethrough -->
                                                <h5 class="secondary-font text-muted">
                                                    <del><?php echo number_format($product['Gia'], 0); ?>VND</del>
                                                </h5>
                                            <?php else: ?>
                                                <!-- Only original price, centered vertically -->
                                                <h3 class="secondary-font text-primary">
                                                    <?php echo number_format($product['Gia'], 0); ?>VND
                                                </h3>
                                                <!-- Empty spacer to maintain consistent height -->
                                                <div class="spacer" style="height: 24px;"></div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <form class="add-to-cart-form" data-product-id="<?= $product['IDSanPham'] ?>">
                                                <input type="hidden" name="model" value="giohang" />
                                                <input type="hidden" name="idsanpham" value="<?= $product['IDSanPham'] ?>" />
                                                <button class="mb-3" type="submit">Thêm Giỏ Hàng</button>
                                            </form>
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