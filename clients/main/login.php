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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<?php
include '../layouts/header.php';
?>
    <div id="main-content">
        <hr>
        <div style="text-align: center;">
            <h3>ĐĂNG NHẬP</h3>
        </div>
        <div class="formLogin">

            <div>
                <img width="250" height="180" src="../images/logoLogin.png " alt="">
            </div>
            <div>
                <form action="login.php" method="POST">
                    <br>
                    <div>
                        <label for="email">Tên Email:</label><br>
                        <input type="text" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="password">Mật khẩu:</label><br>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div>
                        <input type="submit" value="Đăng Nhập">
                    </div>
                    <br>
                </form>
                <div>
                    <div>Bạn chưa có tài khoản?</div>
                </div>
                <a style="color: white;" href="register.php">
                    <button class="btnRegister">
                        Đăng Ký Ngay
                    </button>
                </a>
            </div>
        </div>
        <hr>
</body>
<?php
include '../layouts/footer.php';
?>

</html>