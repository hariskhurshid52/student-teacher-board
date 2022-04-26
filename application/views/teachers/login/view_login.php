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


<div class="row no-gutters min-h-fullscreen bg-white">
	<div class="col-md-6 col-lg-7 col-xl-8 d-none d-md-block bg-img" style="background-image: url(<?=base_url('assets/img/login-bg.jpg')?>)" data-overlay="5">
		
		<div class="row h-100 pl-50">
			<div class="col-md-10 col-lg-8 align-self-end">
				<img src="<?=base_url('assets/img/company.png')?>" alt="...">
				<br><br><br>
				<h4 class="text-white">Kinyarwanda Proficiency Program Cohort S’2022</h4>
				<p class="text-white">Gusoma Education - School of Kinyarwanda</p>
				<br><br>
			</div>
		</div>
	
	</div>
	
	
	
	<div class="col-md-6 col-lg-5 col-xl-4 align-self-center">
		<div class="px-80 py-30">
			<h4>Login</h4>
			<p><small>Sign into your account</small></p>
			<br>
			
			<div class="form-type-material">
				<div class="form-group">
					<input value="<?=!empty(get_cookie('userinfo')) ? base64_decode(get_cookie('userinfo')):''?>" name="username" type="text" class="form-control" id="username">
					<label for="username">Username</label>
				</div>
				
				<div class="form-group">
					<input name="password" type="password" class="form-control" id="password">
					<label for="password">Password</label>
				</div>
				
				<div class="form-group flexbox">
					<label class="custom-control custom-checkbox">
						<input id="remember-me" type="checkbox" class="custom-control-input" checked>
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">Remember me</span>
					</label>
					
					
				</div>
				
				<div class="form-group">
					<button class="btn btn-bold btn-block btn-primary button-login" type="submit">Login</button>
				</div>
			</div>

            <div class="divider">Or Register Your Account</div>
            <div class="text-center">
                <a id="new-teacher"  class="btn btn-info" href="<?=base_url('teacher/registration')?>"><i class="fa fa-plus"></i> Register
                    Account
                </a>
            </div>
			
			<hr class="w-30px">
			
			
		</div>
	</div>
</div>




<!-- Scripts -->
    <script src="<?= base_url() ?>/assets/theme/assets/js/core.min.js" data-provide="sweetalert"></script>
<script src="<?=base_url()?>/assets/theme/assets/js/app.min.js"></script>
<script src="<?=base_url()?>/assets/theme/assets/js/script.min.js"></script>
<script>
	$('.button-login').click(e=>{
		if($("#username").val() == ""){
			app.toast('Please enter valid username');
		}else if($("#password").val() == ""){
			app.toast('Please enter valid password');
		}
		else{
			$(".preloader ").css('display','');
			 $.ajax({
				url: `<?=base_url('login')?>`,
				type: 'POST',
				data:{
					username:$("#username").val().trim(),
					password:$("#password").val().trim(),
					saveinfo:$("#remember-me").is(":checked")
				},
				 success: function (response) {
					 response = JSON.parse(response);
					 if (response.status == "success") {
						 window.location.href = '<?=base_url('/')?>';
					 }
					 else{
						 $(".preloader ").css('display','none');
					 	if(response.status == "validation"){
						
                            swal({
                                title: 'Validation Error',
                                text: response.msg,
                                type: 'warning',
                                showCancelButton: false,
                            })
					    }
					 	else{
                            swal({
                                title: 'Error',
                                text: "Something went wrong.Please Try again",
                                type: 'danger',
                                showCancelButton: false,
                            })
							window.location.reload();
					    }
					 }


				 }
			})
		}
	});
</script>
</body>
</html>


