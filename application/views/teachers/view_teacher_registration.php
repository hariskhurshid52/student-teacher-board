<?php
	/**
	 * view_login.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 00:23
	 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="login, signin">
	
	<title><?= (!empty($this->app_title) ? $this->app_title : 'Kugeza') . (isset($title) && !empty($title) ? " - $title" : "") ?></title>
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">
	
	<!-- Styles -->
	<link href="<?=base_url()?>/assets/theme/assets/css/core.min.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets/theme/assets/css/app.min.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets/theme/assets/css/style.min.css" rel="stylesheet">
	
	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>/assets/img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>/assets/img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>/assets/img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>/assets/img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>/assets/img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>/assets/img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>/assets/img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/<?= base_url() ?>/assets/img/faviconapple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?= base_url() ?>/assets/img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assets/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>/assets/img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?= base_url() ?>/assets/img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?= base_url() ?>/assets/img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff"
</head>

<body>

<div class="preloader">
	<div class="spinner-dots">
		<span class="dot1"></span>
		<span class="dot2"></span>
		<span class="dot3"></span>
	</div>
</div>


<div class="row min-h-fullscreen center-vh p-20 m-0">
	<div class="col-12">
		<div class="card card-shadowed px-50 py-30 w-600px mx-auto" style="max-width: 100%">
			<h5 class="text-uppercase">Create an account</h5>
			<br>
			
			<form class="form-type-material" method="post" action="<?=base_url('teacher/registration')?>">
				<div class="form-group">
					<input type="text" class="form-control" name="firstname" id="firstname" required>
					<label for="firstname">First Name</label>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="middlename" id="middlename" >
					<label for="middlename">Middle Name</label>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="lastname" id="lastname" required>
					<label for="lastname">Last Name</label>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="username" id="username" required>
					<label for="username">Username</label>
				</div>
				
				
				
				<div class="form-group">
					<input type="password" class="form-control" name="password" id="password" required>
					<label for="password">Password</label>
				</div>
				
				<div class="form-group">
					<input type="password" class="form-control" name="password-conf" id="password-conf" required>
					<label for="password-conf">Password (confirm)</label>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="phonenumber" id="phonenumber" required>
					<label for="phonenumber">Phone Number</label>
				</div>
				<div class="form-group">
					<textarea type="text" class="form-control" name="address" id="address" required></textarea>
					<label for="address">Address</label>
				</div>
				
				<div class="form-group">
					<label class="custom-control custom-checkbox">
						<input checked disabled type="checkbox" class="custom-control-input">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">I agree to all <a class="text-primary" href="#">terms</a></span>
					</label>
				</div>
				
				<br>
				<button class="btn btn-bold btn-block btn-primary" type="submit">Register</button>
			</form>
		</div>
		<p class="text-center text-muted fs-13 mt-20">Already have an account? <a class="text-primary fw-500" href="<?=base_url('login')?>">Sign in</a></p>
	</div>
	
	
</div>




<!-- Scripts -->
<script src="<?= base_url() ?>/assets/theme/assets/js/core.min.js" data-provide="sweetalert"></script>
<script src="<?=base_url()?>/assets/theme/assets/js/app.min.js"></script>
<script src="<?=base_url()?>/assets/theme/assets/js/script.min.js"></script>
<script>
	<?php if(!empty($this->session->flashdata('message'))): ?>
	    app.toast('<?=$this->session->flashdata('message')?>', {
	
	        actionColor: 'info'
	    });
	<?php endif; ?>
</script>
</body>
</html>


