<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./View/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./View/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./View/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="./View/login/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-43">
						Đăng nhập
					</span>
					
					<div class="message">
						<?php if (isset($count)): ?>
							<?php if ($count==0): ?>
								<p>Tên tài khoản hoặc mật khẩu không đúng!</p>
							<?php elseif ($count>0): ?>
								<?php header('location: http://localhost/milktea/'); ?>
							<?php endif ?>
						<?php endif ?>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Vui lòng nhập">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Tài khoản</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Vui lòng nhập">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Mật khẩu</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Ghi nhớ
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Quên mật khẩu?
							</a>
						</div>
					</div>
			
                    <div class="container-login100-form-btn">
                        <input class="login100-form-btn" type="submit" name='login' value="Đăng nhập">
					</div>
					<p class="message">
						Bạn chưa có tài khoản?
					</p>
					<div class="container-login100-form-btn">
						<a class="login100-form-btn" href="?action=signup">
							Đăng kí
						</a>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('./View/login/images/banner.jpeg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="./View/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="./View/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="./View/login/vendor/bootstrap/js/popper.js"></script>
	<script src="./View/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="./View/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="./View/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="./View/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="./View/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="./View/login/js/main.js"></script>

</body>
</html>