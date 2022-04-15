<main>

    <div class="main-content">
        <div class="row  center-vh p-0 m-0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body form-type-line">

                        <div class="form-group">
                            <label>Select Class</label>
                            <select required class="form-control" id="class" name="class">
								<?php foreach ($classes as $class): ?>
                                    <option value="<?= $class['id'] ?>"><?= $class['name'] ?></option>
								<?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group">
							<textarea id="classwork" data-provide="summernote" data-toolbar="full" class="form-control"
                                      cols="10" rows="10" data-height="500" data-min-height="500">  </textarea>
                        </div>

                    </div>
                    <button class="btn btn-bold btn-block btn-primary" id="save" type="submit">Update</button>
                </div>
            </div>


        </div>
    </div>
    </div>


</main>
