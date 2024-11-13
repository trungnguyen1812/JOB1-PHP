<?php if (!empty($sanphamList)): ?>
    <?php foreach ($sanphamList as $product): ?>
        <div class="item cat col-md-4 col-lg-3 my-4">
            <div class="card position-relative">
                <a href="single-product.html">
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
                        <h3 class="secondary-font text-primary"><?php echo number_format($product['Gia'], 2); ?> VND</h3>
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
    <p>Không có sản phẩm nào trong danh mục này.</p>
<?php endif; ?>
