<?php
	/**
	 * view_email_content.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 15:22
	 */
?>
<style>
    .no-calender{
        background: #dd2a2a;
        color: #fff;
        padding: 5px 3px 5px 3px;
        font-weight: bold;
        letter-spacing: 1px;
    }
    .w-800px{
        min-width: 800px;
    }
    .datepicker{
        min-width: 350px !important;
    }
    .datepicker .datepicker-days .table-condensed{
        width: 100% !important;
    }
    .datepicker .datepicker-days .table-condensed tbody tr td{
        text-align: center !important;
        cursor: pointer;
    }
    .datepicker .datepicker-days .table-condensed tbody tr td.active{
        border-radius: 0%;
        color: #fff;
    }
</style>
<?php if($auth): ?>
	<div class="col-12">
		<a class="media media-new" href="#">
                  <span class="avatar status-success">
                    <img src="<?=$user_info->picture?>" alt="...">
                  </span>
			
			<div class="media-body">
				<p><strong><?=$user_info->name?></strong> </p>
				
			</div>
		</a>
		<hr>
		
		<div class="row">
			<?php if(isset($calenders_list) && count($calenders_list) > 0 ): ?>
                <div class="col-md-12">
                    <h5>Select Date</h5>
                    <div class="form-group">
                        <input id="dt-picker" type="text" class="form-control" data-provide="datepicker" value="<?=date('m/d/Y',strtotime('now'))?>" data-date-today-highlight="true">
                    </div>
                </div>
				<div class="col-md-12">
					<div class="card">
						<h5 class="card-title"><strong>Calenders List</strong></h5>
						<div class="media-list media-list-hover media-list-divided scrollable" style="height: 345px;max-height: 345px;overflow-y: scroll;">
							<?php foreach ($calenders_list as $c): ?>
								<div class="media media-single">
									<div>
										<img class="avatar" src="../assets/img/avatar/2.jpg" alt="...">
									</div>
									
									<div class="media-body">
										<h6><a href="#"><?=$c['summary']?></a> <small class="text-right"><?=$c['timeZone']?></small></h6>
										<small class="text-fader"><?=$c['description']?></small>
									</div>
									
									<div class="media-right">
										<button class="btn btn-sm btn-bold btn-round btn-outline btn-secondary w-100px" onclick="addToCalender('<?=$section?>','<?=$c['id']?>')">Add </button>
									</div>
								</div>
								
							<?php endforeach; ?>
							
							
							
						</div>
					
					</div>
				</div>
			<?php else: ?>
				<div class="col-12">
					<p class="no-calender">Sorry no calender found, Please create a new calender in your google account</p>
				</div>
			<?php endif; ?>
			
		</div>
	</div>
<?php else: ?>
<div class="form-group has-form-text">
	<a href="<?=$login_url."&section=$section"?>" class="btn btn-w-md  btn-google w-100">Google Sign in</a>
</div>
<?php endif; ?>

