
<?php
$completio_levels=[
        '1'=>'Basic',
        '2'=>'Intermediate',
        '3'=>'Advance',
];
?>
<main>
	
	<header class="header bg-ui-general mt-5">
		<div class="header-info">
			<h1 class="header-title">
				<strong>Tasks's</strong> list
				<small>Here you can find details of all assigned tasks</small>
			</h1>
		</div>
	</header>
	
	
	<div class="main-content">
		
		<div class="row">
			<div class="col-md-12">
				<div class="card card-bordered">
					<h4 class="card-title"><strong>Todo list</strong></h4>
					
					<div class="media-list media-list-hover" data-provide="selectall">
						
						<header class="media media-single media-list-header">
							
							<div class="lookup lookup-sm flex-grow-1">
								<input type="text" placeholder="Search..." data-provide="media-search">
							</div>
						</header>
						
						<?php if(count($tasks) > 0): ?>
							<div class="media-list-body scrollable" data-provide="sortable" data-sortable-handle=".sortable-dot" style="height:344px">
								<?php foreach ($tasks as $task): ?>
									<div class="row">
                                        <div class="col-9">
                                            <div class="media media-single bl-3 <?=isset($completed_tasks[$task['id']]) ? '':''?>">
                                                <span class="sortable-dot"></span>
                                                <label class="custom-control custom-control-lg custom-checkbox flex-grow-1">
                                                    <input name="task_list" value="<?=$task['id']?>" <?=isset($completed_tasks[$task['id']]) ? 'checked disabled':''?> type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description strike-on-check fs-3" style="font-size: 14px;font-weight: 400;"><?=$task['task_name']?></span>
                                                </label>


                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="flexbox flex-justified">
                                                <div style="display: flex;flex-direction: column;text-align: center;">
                                                    <span class="badge badge-warning">Completion Level</span>
                                                    <span><?=strtoupper($completio_levels[$task['completion_level']])?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="flexbox flex-justified">
                                                <div style="display: flex;flex-direction: column;text-align: center;">
                                                    <span class="badge badge-primary">Created On</span>
                                                    <span><?=date('Y-m-d',strtotime($task['added_date']))?></span>
                                                </div>
                                                <?php if(isset($completed_tasks[$task['id']])): ?>
                                                    <div style="display: flex;flex-direction: column;text-align: center;">
                                                        <span class="badge badge-success">Completed On</span>
                                                        <span><?=date('Y-m-d',strtotime($completed_tasks[$task['id']]['completed_date']))?></span>
                                                    </div>
                                                <?php endif; ?>
                                                
                                            </div>
                                        </div>
                                    </div>
								<?php endforeach; ?>
							</div>
						<?php else: ?>
							<p class="text-danger font-weight-bold p-4 text-center">No Tasks Found</p>
						<?php endif; ?>
					
					</div>
					<?php if(count($tasks) > 0): ?>
					<div class="publisher bt-1 border-light">
						<button class="btn btn-sm btn-secondary" id="update_tasks" href="#">Mark Complete Selected Tasks</button>
					</div>
					<?php endif; ?>
				</div>
			</div>
		
		
		</div>
	
	</div>



</main>
