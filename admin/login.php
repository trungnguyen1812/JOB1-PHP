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
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/admin/assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/admin/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/admin/assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="/clients/images/banner-img.png" alt="IMG">
				</div>

				<form  action="login.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text"id="email" name="email" type="text" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="password" name="password" placeholder="Mật khẩu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="/admin/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/admin/assets/vendor/bootstrap/js/popper.js"></script>
	<script src="/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/admin/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="/admin/assets/js/main.js"></script>

</body>
</html>