<main>
	<div class="main-content">
		<div class="row  center-vh p-0 m-0">
			<div class="col-md-12">
				<div class="card">
					<div class="media-list media-list-hover media-list-divided scrollable" style="height: 345px;overflow-y: scroll">
					<?php foreach ($tasks as $task): ?>
						<div class="media media-single">
							<div class="media-body">
								<h6><a href="#"><?=$task['task_name']?></a></h6>
								<small class="text-fader"><?=date('Y-m-d h:i:s',strtotime($task['added_date']))?></small>
							</div>
							
							<div class="media-right">
								<?php if( !empty($task['student_name'])): ?>
									<span class="btn btn-sm btn-bold btn-round  btn-success  w-100p"><?=$task['student_name']?></span>
								<?php endif; ?>
								<?php if( !empty($task['cohort_name'])): ?>
									<bu class="btn btn-sm btn-bold btn-round  btn-info w-100p"><?=$task['cohort_name']?></bu>
								<?php endif; ?>
								<?php if( !empty($task['class_name'])): ?>
									<span class="btn btn-sm btn-bold btn-round  btn-primary w-100p"><?=$task['class_name']?></span>
								<?php endif; ?>
							</div>
						</div>
					
					<?php endforeach; ?>
						
						
					</div>
					
				</div>
			</div>
		
		
		</div>
	</div>
	</div>


</main>
