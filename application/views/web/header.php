<?php
	/**
	 * header.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 01:36
	 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description"
	      content="Responsive admin dashboard and web application ui kit. A bar container to put most important action of your app inside the topbar, so they would be more accessable.">
	<meta name="keywords" content="">
	
	<title><?= (!empty($this->app_title) ? $this->app_title : 'Kugeza') . (isset($title) && !empty($title) ? " - $title" : "") ?></title>
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">
	
	<!-- Styles -->
	<link href="<?= base_url() ?>/assets/theme/assets/css/core.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>/assets/theme/assets/css/app.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>/assets/theme/assets/css/style.min.css" rel="stylesheet">
	
	<!-- Favicons -->
	<link rel="apple-touch-icon" href="<?= base_url() ?>/assets/theme/assets/img/apple-touch-icon.png">
	<link rel="icon" href="<?= base_url() ?>/assets/theme/assets/img/favicon.png">
	
	<?php if ($this->router->class == 'student'): ?>
		<?php if ($this->router->method === 'board'): ?>
			<link rel="stylesheet" href="<?= base_url() ?>/assets/css/simplemde.min.css"/>
			<style>
                .CodeMirror, .CodeMirror-scroll {
                    min-height: 200px;
                    pointer-events: none;
                    font-size: 16px;
                    font-weight: 300 !important;
                }

                .editor-toolbar {
                    font-size: 10px;
                }

                .CodeMirror.cm-s-paper.CodeMirror-wrap {
                    pointer-events: none
                    border: solid 1px #a1a1a1;;
                }

                .bg-text-area {
                    height: 400px;
                }

                .board-title {
                    font-weight: bold !important;
                    color: #fff8f8;
                    font-size: 20px;
                }

                .board-title-1 {
                    background-color: #ff9595;
                }

                .board-title-2 {
                    background-color: #e10b0b;
                }

                .board-title-3 {
                    background-color: #607d8b;
                }

                .board-title-4 {
                    background-color: #009106;
                }

                .url-item {
                    padding: 12px 5px 10px 5px;
                    border: solid 1px #ececec;
                    border-radius: 1px;
                    text-align: center;
                    background: #ff0787;
                    color: #fff !important;
                }

                .url-item a {
                    color: #fff !important;
                    font-size: 14px;
                }
			</style>
		<?php endif; ?>
	<?php endif; ?>
</head>

<body>
<!-- Preloader -->
<div class="preloader">
	<div class="spinner-dots">
		<span class="dot1"></span>
		<span class="dot2"></span>
		<span class="dot3"></span>
	</div>
</div>
<!-- Topbar -->
<header class="topbar topbar-expand-lg" id="app-topbar">
	<div class="topbar-left">
		<span class="topbar-btn topbar-menu-toggler"><i>&#9776;</i></span>
		<span class="topbar-brand"><img src="<?= base_url('assets/img/cohort.png') ?>" style="margin-top: 35px;"></span>
		
		<div class="topbar-divider d-none d-xl-block"></div>
	</div>

</header>


