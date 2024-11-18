<?php
include '../../controller/khachhang.php';
$khachhang = new khachhang();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login_check = $khachhang->login($email, $password);
}
?>
<!-- Xu ly php -->
<?php
include '../layouts/header.php';
?>
<div id="main-content">
    <section id="register" style="background: url('../images/background-img.png') no-repeat;">
        <div class="container ">
            <div class="row my-5 py-5">
                <div class="offset-md-3 col-md-6 my-5 ">
                    <h2 class="display-3 fw-normal text-center">Giảm 20% <span class="text-primary">cho lần mua đầu tiên
                        </span>
                    </h2>
                    <form action="login.php" method="post">

                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" name="email" id="email"
                                placeholder="Địa chỉ email của bạn ......" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-lg" name="password" id="password"
                                placeholder="Repeat Password" required>
                        </div>
                        <div>
                            <a href="register.php">Bạn chưa có tày khoản hãy ấn <span style="color: #DEAD6F;">vào đây</span></a>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark btn-lg rounded-1">Đăng Nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include '../layouts/footer.php';
?>