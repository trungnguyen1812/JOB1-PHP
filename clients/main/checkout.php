<?php
session_start();

include_once '../../controller/giohang.php';
include_once '../../controller/khachhang.php';

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST') {
    include_once '../../controller/donhang.php';
    $donhang = new DonHang();
    $donhang->insert($_POST);
}

// Du lieu gio hang
$giohang = new GioHang();
$datagiohang = $giohang->getByIDKhachHang($_SESSION['userId']);

// Du lieu khach hang (Thong tin dat hang)
$khachhang = new KhachHang();
$datakhachhang = $khachhang->getByID($_SESSION['userId'])->fetch_assoc();

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
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>   
                <ul class="list-group mb-3 sticky-top">
                    <?php 
                    $thanhtien = 0;
                    foreach ($datagiohang as $key => $value) {
                    ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?= $value['TenSanPham'] ?></h6>
                            <small class="text-muted">Giá: <?= $value['Gia'] ?></small>
                            <br>
                            <small class="text-muted">Số lượng: <?= $value['SoLuong']?></small>
                        </div>
                        <span class="text-muted">
                            <?php 
                            $thanhtien +=  $value['Gia'] * $value['SoLuong'];
                            echo $value['Gia'] * $value['SoLuong'];
                            ?>
                        </span>
                    </li>
                    <?php } ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Thành tiền (VNĐ)</span>
                        <strong><?= $thanhtien ?></strong>
                    </li>
                </ul>
            </div>
            <!-- Thong tin nhan hang -->
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Thông tin nhận hàng</h4>
                <form class="needs-validation" action="checkout.php" method="POST">
                    <input type="hidden" name="id" value="<?= $datakhachhang['IDKhachHang'] ?>">
                    <div class="mb-3">
                        <label for="hoten">Họ tên</label>
                        <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Họ tên người nhận"
                            value="<?= $datakhachhang['HoTen'] ?>" required="">
                        <!-- <div class="invalid-feedback"> Valid first name is required. </div> -->
                    </div>
                    <div class="mb-3">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" id="diachi" name="diachi" value="<?= $datakhachhang['DiaChi'] ?>" placeholder="Địa chỉ" required="">
                        <!-- <div class="invalid-feedback">Vui lòng nhập địa chỉ của bạn.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="address">Số điện thoại</label>
                        <input type="text" class="form-control" id="sdtx" name="sdt" value="<?= $datakhachhang['SDT'] ?>" placeholder="Địa chỉ" required="">
                        <!-- <div class="invalid-feedback">Vui lòng nhập số điiẹn thoại.</div> -->
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Đặt Hàng</button>
                </form>
            </div>
        </div>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2019 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
</div>
<?php
include_once '../layouts/footer.php';
?>