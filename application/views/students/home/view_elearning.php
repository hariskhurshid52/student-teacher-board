
<!-- Main container -->
<main>
	
	<header class="header bg-ui-general">
		<div class="header-info">
			<h1 class="header-title w-100 color-white" style="margin-top: 65px;
    background: #673ab7;
    color: #fff;
    font-size: 29px;
    padding: 10px 20px 10px 20px;opacity: 1">
				<strong class="color-white">Kinyarwanda</strong> Proficiency Program Cohort S’2022
				<small class="color-white"  style="opacity: 1">Gusoma Education - School of Kinyarwanda</small>
				<?php if (isset($last_pub)): ?>
					<small class="pull-right color-white" style=" color: #fff;;">
						<b class="color-white">Last Updated :</b> <i
							class="fa fa-clock-o"></i> <?= date('Y-m-d h:i:s A', strtotime($last_pub['last_updated'])) ?>
						<br>
						<b class="color-white">Updated By:</b> <i class="fa fa-user-circle-o"></i> <?= $last_pub['Teacher'] ?><br>
					
					</small>
				<?php endif; ?>
			
			</h1>
		
		</div>
	</header>
	
	
	<div class="main-content doc-topbar-static">
		
		<div class="row">
			<div class="col-12">
				<iframe height="800px" src="https://learning.amasomo.com/users/sign_in" frameborder="0" scrolling="no" onload="resizeIframe(this)" ></iframe>
			</div>
		
		
		</div>
	
	
	</div>

</main>
<!-- END Main container -->
