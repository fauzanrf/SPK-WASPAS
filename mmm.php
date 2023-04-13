<?php
session_start();
//skrip koneksi
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Pelanggan | E-Waraong Kec. Medan Sunggal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="admin/assets/login2/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/login2/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/login2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/login2/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin/assets/login2/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/login2/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/assets/login2/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/assets/login2/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="admin/assets/login2/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form">

					<span class="login100-form-title">
						Member Login
					</span>
					 
					<?php 
					if(isset($_POST['login']))
					{
						$ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]'
						AND password='$_POST[pass]'");
						$yangcocok = $ambil->num_rows;
						if ($yangcocok==1)
						{
							$_SESSION['admin']=$ambil->fetch_assoc();
							echo "<div class='alert alert-info'>Login Berhasil</div>";
   							 echo "<meta http-equiv='refresh' content='1;url=index.php'>";
						}
						else{
							echo "<div class='alert alert-danger'>Login Gagal</div>";
   							 echo "<meta http-equiv='refresh' content='1;url=login.php'>";
						}
						

					}
				?>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="masuk">
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

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="admin/assets/login2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/login2/vendor/bootstrap/js/popper.js"></script>
	<script src="admin/assets/login2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/login2/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/assets/login2/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="admin/assets/login2/js/main.js"></script>

</body>
</html>