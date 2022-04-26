<main>
	
	<div class="main-content">
		<div class="row  center-vh p-0 m-0">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body form-type-line">
						
						<div class="form-group">
							<label>Select Cohort</label>
							<select required class="form-control" id="cohort" name="cohort">
								<option value="0">Select Cohort</option>
								<?php foreach ($cohorts as $class): ?>
									<option value="<?= $class['id'] ?>"><?= $class['cohort_name'] ?></option>
								<?php endforeach; ?>
							</select>
						
						</div>
						<div class="form-group">
							<label>Select Class</label>
							<select required class="form-control" id="class" name="class">
								<option value="0">Select Class</option>
								<?php foreach ($classes as $class): ?>
									<option value="<?= $class['id'] ?>"><?= $class['name'] ?></option>
								<?php endforeach; ?>
							</select>
						
						</div>
						<div class="form-group">
							<label>Select Student</label>
							<select required class="form-control" id="student" name="student">
								<option value="0">Select Student</option>
								<?php foreach ($students as $student): ?>
									<option value="<?= $student['id'] ?>"><?= $student['name'] ?></option>
								<?php endforeach; ?>
							</select>
						
						</div>
						<div class="form-group">
							<label>Level Of Completion</label>
							<select required class="form-control" id="completion_level" name="completion_level">
								<option value="basic">Basic</option>
								<option value="Intermediate">Intermediate</option>
								<option value="advance">Advance</option>
							
							</select>
						
						</div>
						<div class="form-group repeater">
							<label>Tasks</label>
							<div data-repeater-list="task_list">
								<div data-repeater-item class="row">
									<div class="col-9">
										<input type="text" name="task" class="form-control" placeholder="Enter the task" value=""/>
									</div>
									<div class="col-3">
										<input data-repeater-delete type="button" class="btn btn-sm btn-danger" value="Delete"/>
									</div>
								</div>
							</div>
							<input data-repeater-create type="button" class="btn btn-sm btn-primary mt-3" value="Add More Task"/>
						</div>
					
					</div>
					<button class="btn btn-bold btn-block btn-primary" id="save" type="submit">Save</button>
				</div>
			</div>
		
		
		</div>
	</div>
	</div>


</main>
