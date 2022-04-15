<main>

    <header class="header bg-ui-general mt-5">
        <div class="header-info">
            <h1 class="header-title">
                <strong>Student's</strong> list
                <small>Here you can find details of all students</small>
            </h1>
        </div>
    </header>


    <div class="main-content">
		
		
		<?php if (count($students) > 0): ?>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Class Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php foreach ($students as $student): ?>
                            <tr class="<?= $student['status'] !== "active" ? 'inactive-student' : '' ?>">
                                <td>
                                    <a class="media media-new1" target="_blank" href="<?= !empty($student['profile_pic']) ? base_url() . '/assets/uploaded_files/students/' . $student['profile_pic'] : base_url() . '/assets/theme/assets/img/avatar/1.jpg' ?>">
                                      <span class="avatar status-success">
                                        <img src="<?= !empty($student['profile_pic']) ? base_url() . '/assets/uploaded_files/students/' . $student['profile_pic'] : base_url() . '/assets/theme/assets/img/avatar/1.jpg' ?>" alt="...">
                                      </span>
                                    </a>
                                </td>
                                <td><?= $student['name'] ?></td>
                                <td><?= $student['username'] ?></td>
                                <td><?= $student['email'] ?></td>

                                <td>
                                    <label class="switch switch-sm">
                                        <input value="<?= $student['id'] ?>" class="check-student-status"
                                               type="checkbox" <?= $student['status'] !== "active" ? '' : 'checked' ?>>
                                        <span class="switch-indicator"></span>
                                        <span class="switch-description"><?= $student['status'] !== "active" ? 'Make Active' : 'Make In Active' ?></span>
                                    </label>
                                </td>
                                <td><?= $student['class_name'] ?></td>
                                <td>
                                    <a class="dropdown-item" href="<?= base_url('edit-student/') . $student['id'] ?>"><i
                                                class="fa fa-fw fa-pencil"></i> Edit</a>
                                    <a class="dropdown-item" href="#"
                                       onclick="deleteStudent('<?= $student['id'] ?>')"><i
                                                class="fa fa-fw fa-remove"></i> Delete</a>
                                </td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
		
		
		<?php else: ?>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <p class="text-center text-danger bg-info  text-large p-3 fs-16">No students found</p>
            </div>
		<?php endif; ?>
		
		
		
		
		
		<?php if (false): ?>
			<?php foreach ($students as $student): ?>
                <div class="col-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="card card-body <?= $student['status'] !== "active" ? 'inactive-student' : '' ?>">
                        <div class="flexbox align-items-center">
                            <label class="switch switch-sm">
                                <input value="<?= $student['id'] ?>" class="check-student-status"
                                       type="checkbox" <?= $student['status'] !== "active" ? '' : 'checked' ?>>
                                <span class="switch-indicator"></span>
                                <span class="switch-description"><?= $student['status'] !== "active" ? 'Make Active' : 'Make In Active' ?></span>
                            </label>

                            <div class="dropdown">
                                <a data-toggle="dropdown" href="#" aria-expanded="false"><i
                                            class="ti-more-alt rotate-90 text-muted"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i
                                                class="fa fa-fw fa-comments"></i> <?= $student['email'] ?></a>
                                    <a class="dropdown-item" href="#"><i
                                                class="fa fa-fw fa-phone"></i> <?= !empty($student['phonenumber']) ? $student['phonenumber'] : '********' ?>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('edit-student/') . $student['id'] ?>"><i
                                                class="fa fa-fw fa-pencil"></i> Edit</a>
                                    <a class="dropdown-item" href="#"
                                       onclick="deleteStudent('<?= $student['id'] ?>')"><i
                                                class="fa fa-fw fa-remove"></i> Delete</a>

                                </div>
                            </div>
                        </div>

                        <div class="text-center pt-3">
                            <a href="#">
                                <img class="avatar avatar-xxl"
                                     src="<?= !empty($student['profile_pic']) ? base_url() . '/assets/uploaded_files/students/' . $student['profile_pic'] : base_url() . '/assets/theme/assets/img/avatar/1.jpg' ?>">
                            </a>
                            <h5 class="mt-3 mb-0"><a class="hover-primary" href="#"><?= $student['name'] ?></a></h5>
                            <span><?= !empty($student['phonenumber']) ? $student['phonenumber'] : '********' ?></span>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
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
