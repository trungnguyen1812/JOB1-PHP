<?php
include '../controller/nhanvien.php';
$nhanvien = new NhanVien();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login_check = $nhanvien->login($email, $password);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đang nhập</title>
</head>

<body>
    <div>
        <form action="login.php" method="POST">
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Nhập email đăg nhập..." />
            </div>
            <div>
                <label for="password">Mật Khẩu:</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu..." />
            </div>
            <input type="submit" value="Đăng Nhập" />
        </form>
    </div>
</body>

</html>