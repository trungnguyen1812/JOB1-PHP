<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/clients/css/login.css">
</head>

<body>
    <hr>
    <div style="text-align: center;">
        <h3>ĐĂNG NHẬP</h3>
    </div>
    <div class="formLogin">

        <div>
            <img width="250" height="180" src="/clients/images/logoLogin.png " alt="">
        </div>
        <div>
            <form action="">
                <br>
                <div>
                    <label for="username">Tên đăng nhập:</label><br>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label for="password">Mật khẩu:</label><br>
                    <input type="password" id="password" name="password" required>
                </div>

                <div>
                    <input type="submit" value="Đăng Nhập">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <button class="btnRegister">
                        <a style="color: white;" href="?page=register">
                            Đăng Ký
                        </a>
                    </button>

                </div>
                <br>
            </form>

        </div>
    </div>
    <hr>
</body>

</html>