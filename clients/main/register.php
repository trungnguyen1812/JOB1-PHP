<?php
    include '../../controller/khachhang.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $khachhang = new khachhang();
        $register_check = $khachhang->register($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <?php
    include '../layouts/header.php';
    ?>
    <hr>
    <div style="text-align: center;">
        <h3>ĐĂNG Ký Tài Khoản</h3>
    </div>
    <div class="formLogin">

        <div>
            <img width="250" height="180" src="../images/logoRegister.png " alt="">
        </div>
        <div>
            <form action="register.php" method="POST">
                <br>
                <div>
                    <label for="hoten">Họ và tên:</label><br>
                    <input type="text" id="hoten" name="hoten" required>
                </div>
                <div>
                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">Mật khẩu:</label><br>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <input style="color: white;" type="submit" value="Đăng Ký">
                </div>
                <br>
            </form>

        </div>
    </div>
    <hr>
    <?php
    include '../layouts/footer.php';
    ?>
</body>

</html>