<?php
include '../../controller/khachhang.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $khachhang = new khachhang();
    $result_register = $khachhang->register($_POST);

    echo "<script>alert('" . $result_register . "')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <!-- <link rel="stylesheet" href="../css/login.css"> -->
</head>

<body>
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
                        <form action="register.php" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg" name="hoten" id="hoten"
                                    placeholder="Họ tên của bạn...." required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg" name="email" id="email"
                                    placeholder="Địa chỉ email của bạn ......" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-lg" name="password" id="password"
                                    placeholder="Repeat Password" required >
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark btn-lg rounded-1">Đăng ký ngay</button>
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
</body>

</html>