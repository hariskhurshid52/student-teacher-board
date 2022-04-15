<main>
	
	<header class="header bg-ui-general mt-5">
		<div class="header-info">
			<h1 class="header-title">
				<strong>Student's</strong> list
				<small>Here you can find details of all active students</small>
			</h1>
		</div>
	</header>
	
	
	<div class="main-content">
		
		<div class="row">
			<?php if(count($students) > 0): ?>
		
			<?php foreach ($students as $student): ?>
					<div class="col-6 col-md-6 col-lg-4 col-xl-3">
						<div class="card card-body">
							<div class="flexbox align-items-center justify-content-end">
								<div class="dropdown">
									<a data-toggle="dropdown" href="#" aria-expanded="false"><i class="ti-more-alt rotate-90 text-muted"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#"><i class="fa fa-fw fa-comments"></i> <?=$student['email']?></a>
										<a class="dropdown-item" href="#"><i class="fa fa-fw fa-phone"></i> <?=$student['phonenumber']?></a>
										
									</div>
								</div>
							</div>
							<div class="text-center pt-3">
								<a href="#">
									<img class="avatar avatar-xxl" src="<?= !empty($student['profile_pic'] ) ? base_url() . '/assets/uploaded_files/students/' . $student['profile_pic'] : base_url() . '/assets/theme/assets/img/avatar/1.jpg' ?>">
								</a>
								<h5 class="mt-3 mb-0"><a class="hover-primary" href="#"><?=$student['name']?></a></h5>
								<span><?=$student['phonenumber']?></span>
							</div>
						</div>
					</div>
			<?php endforeach; ?>
			
			<?php else: ?>
				<div class="col-12 col-md-12 col-lg-12 col-xl-12">
					<p class="text-center text-danger bg-info  text-large p-3 fs-16">No students found</p>
				</div>
			<?php endif; ?>
			
			
		
		</div>
		
		
		
		
		
		
		
		
		<?php if(false): ?>
			<nav>
				<ul class="pagination justify-content-center">
					<li class="page-item disabled">
						<a class="page-link" href="#">
							<span class="ti-arrow-left"></span>
						</a>
					</li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">4</a></li>
					<li class="page-item"><a class="page-link" href="#">5</a></li>
					<li class="page-item">
						<a class="page-link" href="#">
							<span class="ti-arrow-right"></span>
						</a>
					</li>
				</ul>
			</nav>
		<?php endif; ?>
	
	
	</div>
	
	

</main>
