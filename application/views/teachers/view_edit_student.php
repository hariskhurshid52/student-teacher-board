

<main>
	
	<header class="header bg-img" style="background-image: url(<?= !empty($details->profile_pic) ? base_url() . '/assets/uploaded_files/students/' . $details->profile_pic : base_url() . '/assets/theme/assets/img/avatar/1.jpg' ?>)">
		<div class="header-info h-400px mb-0">
			<div class="media align-items-end">
				<img class="avatar avatar-xl avatar-bordered" src="<?= !empty($details->profile_pic) ? base_url() . '/assets/uploaded_files/students/' . $details->profile_pic : base_url() . '/assets/theme/assets/img/avatar/1.jpg' ?>" alt="...">
				<div class="media-body">
					<p class="text-white opacity-90"><strong><?=$details->name?></strong></p>
				</div>
			</div>
		</div>
		
		<div class="header-action bg-white">
			<nav class="nav">
				<a class="nav-link active" href="#">General Info</a>
			</nav>
		</div>
	</header>
	
	
	
	
	<div class="main-content">
        <div class="row  center-vh p-0 m-0">
            <div class="col-md-12">
                <div class="card">
                    <form class="card-body form-type-line" method="POST" enctype="multipart/form-data" action="<?=base_url('edit-student/').$details->id?>">
                       
                        <div class="form-group form-type-line file-group">
                            <label for="Profile Pic">Profile Pic</label>
                            <input type="text" class="form-control file-value file-browser" placeholder="Choose file..." readonly="">
                            <input  type="file"  name="profile-pic">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input required type="text" class="form-control" value="<?=$details->name?>" name="name">

                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input required type="text" class="form-control" value="<?=$details->username?>"  readonly name="username">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input required type="email" class="form-control" value="<?=$details->email?>"  name="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input required type="text" class="form-control" value="<?=$details->password?>"  name="password">
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Phone number</label>
                            <input type="text" class="form-control" value="<?=$details->phonenumber?>"  name="phonenumber">

                        </div>
                        <div class="form-group">
                            <label>Select  Class</label>
                            <select required class="form-control" name="class">
			                    <?php foreach ($classes as $class): ?>
                                    <option <?=$details->class_id == $class['id'] ? 'selected':'' ?>  value="<?=$class['id']?>" ><?=$class['name']?></option>
			                    <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Select  Cohort</label>
                            <select required class="form-control" name="cohort">
			                    <?php foreach ($cohorts as $cohort): ?>
                                    <option <?=$details->cohort == $cohort['id'] ? 'selected':'' ?>  value="<?=$cohort['id']?>" ><?=$cohort['cohort_name']?></option>
			                    <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select required class="form-control" name="status">
			                    <?php foreach (['active'=>'Active','inactive'=>'In Active'] as $k=>$v): ?>
                                    <option <?=$details->status == $k ? 'selected':'' ?>  value="<?=$k?>" ><?=$v?></option>
			                    <?php endforeach; ?>
                            </select>

                        </div>
                        <button class="btn btn-bold btn-block btn-primary"  type="submit">Update</button>
                    </form>
                </div>


            </div>
        </div>
	</div>
	
	
	

</main>
