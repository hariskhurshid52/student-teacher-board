

<div class="row  center-vh p-0 m-0">
    <div class="col-md-12" style="margin-top: 50px">
        <div class="card">
            <h2 style="background: #9a9999;
    text-align: center;
    color: #fff;
    padding: 10px;
    margin-top: 36px;
    text-transform: uppercase;">Student Registration</h2>
            <form class="card-body form-type-line" method="POST" enctype="multipart/form-data" action="<?=base_url('register-student')?>">
             
                <div class="form-group form-type-line file-group ">
                    <label for="Profile Pic">Profile Pic</label>
                    <input type="text" class="form-control file-value file-browser" placeholder="Choose file..." readonly="">
                    <input required type="file" multiple="" name="profile-pic">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input required type="text" class="form-control" value="<?=$inputs['name']?>" name="name">
                    
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input required type="text" class="form-control" value="<?=$inputs['username']?>"  name="username">
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input required type="email" class="form-control" value="<?=$inputs['email']?>"  name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input required type="password" class="form-control" value="<?=$inputs['password']?>"  name="password">
                </div>
               
              
                <div class="form-group">
                    <label for="password">Repeat Your Password</label>
                    <input required type="password" class="form-control" value="" id="confirm-password"  name="confirm-password">
                </div>
	          
                <div class="form-group">
                    <label for="phonenumber">Phone number</label>
                    <input required type="text" class="form-control" value="<?=$inputs['phonenumber']?>"  name="phonenumber">
                   
                </div>
                <div class="form-group">
                    <label>Select Your Class</label>
                    <select required class="form-control" name="class">
                        <?php foreach ($classes as $class): ?>
                            <option <?=$inputs['class'] ==$class['id'] ? 'selected':'' ?>  value="<?=$class['id']?>" ><?=$class['name']?></option>
                        <?php endforeach; ?>
                    </select>
                   
                </div>
                <div class="form-group">
                    <label>Select  Cohort</label>
                    <select required class="form-control" name="cohort">
			            <?php foreach ($cohorts as $cohort): ?>
                            <option  value="<?=$cohort['id']?>" ><?=$cohort['cohort_name']?></option>
			            <?php endforeach; ?>
                    </select>

                </div>
                    <?php if(isset($redirect) && !empty($redirect)): ?>
                        <input type="hidden" value="<?=$redirect?>" name="redirect">
                    <?php endif; ?>
                <button class="btn btn-bold btn-block btn-primary"  type="submit">Register</button>
            </form>
        </div>


    </div>
</div>

