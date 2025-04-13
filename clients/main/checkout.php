<?php
session_start();

include_once '../../controller/giohang.php';
include_once '../../controller/khachhang.php';

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once '../../controller/donhang.php';
    $donhang = new DonHang();
    $donhang->insert($_POST);
}

// Du lieu gio hang
$giohang = new GioHang();
$datagiohang_result = $giohang->getByIDKhachHang($_SESSION['userId']);
// Convert mysqli_result to array
$datagiohang = [];
if ($datagiohang_result && $datagiohang_result->num_rows > 0) {
    while ($row = $datagiohang_result->fetch_assoc()) {
        $datagiohang[] = $row;
    }
}

// Du lieu khach hang (Thong tin dat hang)
$khachhang = new KhachHang();
$datakhachhang = $khachhang->getByID($_SESSION['userId']);

include_once '../layouts/header.php';
?>
<style>
    .container {
        max-width: 960px;
    }

    .lh-condensed {
        line-height: 1.25;
    }
</style>
<div class="main-content pt-4" style="background: #F9F3EC;">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Đặt Hàng</h2>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Giỏ hàng</span>
                    <span class="badge badge-secondary badge-pill"><?= count($datagiohang) ?></span>
                </h4>   
                <ul class="list-group mb-3">
                    <?php 
                    $thanhtien = 0;
                    foreach ($datagiohang as $key => $value) {
                        $donGia = $value['DonGia'];
                    ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?= htmlspecialchars($value['TenSanPham']) ?></h6>
                            <small class="text-muted">Giá: <?= number_format($donGia, 0) ?> VNĐ</small>
                            <br>
                            <small class="text-muted">Số lượng: <?= $value['SoLuong'] ?></small>
                        </div>
                        <span class="text-muted">
                            <?php 
                            $thanhTienItem = $donGia * $value['SoLuong'];
                            $thanhtien += $thanhTienItem;
                            echo number_format($thanhTienItem, 0) . ' VNĐ';
                            ?>
                        </span>
                    </li>
                    <?php } ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Thành tiền (VNĐ)</span>
                        <strong><?= number_format($thanhtien, 0) ?> VNĐ</strong>
                    </li>
                </ul>
            </div>
            <!-- Thong tin nhan hang -->
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Thông tin nhận hàng</h4>
                <form class="needs-validation" action="checkout.php" method="POST">
                    <input type="hidden" name="id" value="<?= $datakhachhang['IDKhachHang'] ?>">
                    <div class="mb-3">
                        <label for="hoten" class="text-dark">Họ tên</label>
                        <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Họ tên người nhận"
                            value="<?= htmlspecialchars($datakhachhang['HoTen']) ?>" required="">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="text-dark">Địa chỉ</label>
                        <input type="text" class="form-control" id="diachi" name="diachi" value="<?= htmlspecialchars($datakhachhang['DiaChi']) ?>" placeholder="Địa chỉ" required="">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="text-dark">Số điện thoại</label>
                        <input type="text" class="form-control" id="sdt" name="sdt" value="<?= htmlspecialchars($datakhachhang['SDT']) ?>" placeholder="Số điện thoại" required="">
                    </div>
                    <input type="hidden" name="tongtien" value="<?= $thanhtien ?>">
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Đặt Hàng</button>
                </form>
            </div>
        </div>
        <hr class="mb-6">
    </div>
</div>
<?php
include_once '../layouts/footer.php';
?>