<!DOCTYPE html>
<html lang="en">
<head>
	<title>SISTEM INFORMASI LAYANAN PENGADAAN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="https://simpeg.kemsos.go.id/assets/ico/favicon.ico""/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/templates/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url();?>assets/templates/Login/images/kemensos.jpg');">
			<div class="wrap-login100 p-t-190 p-b-1">
				<form class="login100-form validate-form" action="<?php echo base_url() ?>login/update_password" method="post">
					<div class="login100-form-avatar">
						<img src="<?php echo base_url();?>assets/templates/Login/images/kemsos.jpg" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Masukan Password Baru
					</span>

					<div class="text-center p-t-10">
                            <?php 
                            if(isset($error)) { echo $error; };

                            ?>
                    </div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "wajib diisi">
						<input class="input100" type="password" name="password1" placeholder="masukan password baru">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "wajib diisi">
						<input class="input100" type="password" name="password2" placeholder="ulangi password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
						<input type="hidden" name="id_user" value="<?php echo $id ?>">
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url();?>assets/templates/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/templates/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/templates/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/templates/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/templates/Login/js/main.js"></script>

</body>
</html>