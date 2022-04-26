<?php
	/**
	 * view_main_panel.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 01:36
	 */
?>
<!-- Main container -->
<main>
	
	<header class="header bg-ui-general">
		<div class="header-info">
			<h1 class="header-title w-100 color-white" style="margin-top: 65px;
    background: #673ab7;
    color: #fff;
    font-size: 29px;
    padding: 10px 20px 10px 20px;opacity: 1">
				<strong class="color-white"><?= $this->lang->line('title')?>
				<small class="color-white"  style="opacity: 1"><?= $this->lang->line('sub-title')?></small>
				<?php if (isset($last_pub)): ?>
					<small class="pull-right color-white" style=" color: #fff;;">
						<b class="color-white">Last Updated :</b> <i
							class="fa fa-clock-o"></i> <?= date('Y-m-d h:i:s A', strtotime($last_pub['last_updated'])) ?>
						<br>
						<b class="color-white">Updated By:</b> <i class="fa fa-user-circle-o"></i> <?= $last_pub['Teacher'] ?><br>
						<b class="color-white">Status:</b> <i class="fa fa-server"></i> <span
							class="badge badge-primary"> <?= $last_pub['statusname'] ?></span>
					</small>
				<?php endif; ?>
			
			</h1>
		
		</div>
	</header>
	

	<div class="main-content doc-topbar-static">
		
		<div class="row">
			<div class="col-12">
				<div class="col-12">
					<iframe height="800px" src="https://books.amasomo.com/" frameborder="0" scrolling="no" onload="resizeIframe(this)" ></iframe>
				</div>
			</div>
		
		
		</div>
	
	
	</div>

</main>


