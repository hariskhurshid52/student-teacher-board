

<div class="row  center-vh p-0 m-0">
	<div class="col-md-12">
		<div class="card">
			<form class="card-body form-type-line" method="POST" enctype="multipart/form-data" action="<?=base_url('update-profile')?>">
				<div class="card">
					<div class="text-white card-body bg-img text-center py-50" style="background-image: url(<?=base_url() . '/assets/uploaded_files/students/' . $details->profile_pic ?>);">
						<a href="#">
							<img class="avatar avatar-xxl avatar-bordered" src="<?=base_url() . '/assets/uploaded_files/students/' . $details->profile_pic ?>">
						</a>
					</div>
				
				</div>
				<div class="form-group form-type-line file-group">
					<label for="Profile Pic">Profile Pic</label>
					<input type="text" class="form-control file-value file-browser" placeholder="Choose file..." readonly="">
					<input type="file" multiple="" name="profile-pic">
				</div>
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" value="<?=$details->name?>" name="name">
				
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" value="<?=$details->username?>"  readonly name="username">
				</div>
				
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" value="<?=$details->email?>"  name="email">
				</div>
				
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" value="<?=$details->password?>"  name="password">
				</div>
				<div class="form-group">
					<label for="phonenumber">Phone number</label>
					<input type="text" class="form-control" value="<?=$details->phonenumber?>"  name="phonenumber">
				
				</div>
				
				<button class="btn btn-bold btn-block btn-primary"  type="submit">Update</button>
			</form>
		</div>
	
	
	</div>
</div>

