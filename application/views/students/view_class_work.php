<main>
	
	<div class="main-content mt-5">
		<div class="row  center-vh p-0 m-0">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body form-type-line">
						<div class="form-group">
							<textarea id="classwork" data-provide="summernote"  data-toolbar="slim" class="form-control"
							          cols="10" rows="10" data-height="500"
							          data-min-height="500"> <?= !empty($class_work->content) ? $class_work->content : '' ?> </textarea>
						</div>
					
					</div>
				</div>
			</div>
		
		
		</div>
	</div>
</main>
