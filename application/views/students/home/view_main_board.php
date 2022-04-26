<?php
	/**
	 * view_main_panel.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 01:36
	 */
?>

<!-- Main container -->
<main>

    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title w-100 color-white" style="margin-top: 65px;
    background: #673ab7;
    color: #fff;
    font-size: 29px;
    padding: 10px 20px 10px 20px;opacity: 1">
                <strong class="color-white"><?= !empty($board_labels['title']) ? $board_labels['title'] : 'Kinyarwanda Proficiency Program Cohort S’2022' ?>
                <small class="color-white"  style="opacity: 1"><?= !empty($board_labels['sub_title']) ? $board_labels['sub_title'] : 'Gusoma Education - School of Kinyarwanda' ?></small>
				<?php if (isset($last_pub)): ?>
                    <small class="pull-right color-white" style=" color: #fff;;">
                        <b class="color-white">Last Updated :</b> <i
                                class="fa fa-clock-o"></i> <?= date('Y-m-d h:i:s A', strtotime($last_pub['last_updated'])) ?>
                        <br>
                        <b class="color-white">Updated By:</b> <i class="fa fa-user-circle-o"></i> <?= $last_pub['Teacher'] ?><br>
                        
                    </small>
				<?php endif; ?>

            </h1>

        </div>
    </header>


    <div class="main-content doc-topbar-static">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body bg-grey">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="card">
                                    <h5 class="card-title fw-400 font-weight-bold text-uppercase text-center board-title board-title-1">
	                                    <?= !empty($board_labels['this_week_lesson']) ? $board_labels['this_week_lesson'] : 'This Week Lessons' ?>
                                    </h5>
									<?php if (!empty($cache['weekly_lessons']['doc_weekly_lessons'])): ?>

                                        <a href="<?= base_url("download-file/") . $cache['weekly_lessons']['doc_weekly_lessons'] ?>"
                                           class="btn btn-xs mt-2 btn-primary"><i class="ti-download fs-20"></i><br>Download</a>
									<?php endif; ?>
                                    <div parent-section="weekly_lessons" id="weekly_lessons" class="card-body">
                                        <div class="form-group">
                                            <p class="url-item">
                                                <a class="nav-url" target="_blank"
                                                   href="<?= isset($cache) && !empty($cache['weekly_lessons']['url']) ? $cache['weekly_lessons']['url'] : '#' ?>">Book
                                                    your lesson</a>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark text-uppercase font-weight-bold"><?= !empty($board_labels['this_week_bl']) ? $board_labels['this_week_bl'] : 'Beginner level' ?></label>
                                            <textarea section="weekly_lessons" component="beginner_students"
                                                      class="form-control bg-text-area" rows="6"
                                                      cols="8"><?= isset($cache) && !empty($cache['weekly_lessons']['beginner_students']) ? $cache['weekly_lessons']['beginner_students'] : '' ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark text-uppercase font-weight-bold"><?= !empty($board_labels['this_week_al']) ? $board_labels['this_week_al'] : 'Advanced  Level' ?></label>
                                            <textarea section="weekly_lessons" component="advance_students"
                                                      class="form-control bg-text-area" rows="6"
                                                      cols="8"><?= isset($cache) && !empty($cache['weekly_lessons']['advance_students']) ? $cache['weekly_lessons']['advance_students'] : '' ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark text-uppercase font-weight-bold"><?= !empty($board_labels['this_week_ann']) ? $board_labels['this_week_ann'] : 'Announcements' ?></label>
                                            <textarea section="weekly_lessons" component="announcements"
                                                      class="form-control bg-text-area " rows="6"
                                                      cols="8"><?= isset($cache) && !empty($cache['weekly_lessons']['announcements']) ? $cache['weekly_lessons']['announcements'] : '' ?></textarea>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="card">
                                    <h5 class="card-title fw-400 font-weight-bold text-uppercase text-center board-title board-title-2">
                                        <?= !empty($board_labels['weekly_tasks']) ? $board_labels['weekly_tasks'] : 'Task  of  the week' ?></h5>
									
									<?php if (!empty($cache['weekly_tasks']['doc_weekly_tasks'])): ?>

                                        <a href="<?= base_url("download-file/") . $cache['weekly_tasks']['doc_weekly_tasks'] ?>"
                                           class="btn btn-xs mt-2 btn-primary"><i class="ti-download fs-20"></i><br>Download</a>
									<?php endif; ?>
                                    <div parent-section="weekly_tasks" class="card-body">
                                        <div class="form-group mb-4">
                                            <div class="d-flex  gap-items-2 gap-y mt-16 justify-content-around">
                                                <button section="weekly_tasks" component="email"
                                                        class="btn btn-sm btn-w-lg  btn-round btn-primary w-50  sub-modal"
                                                        title="Enter Your Email" type="button">Send to your email
                                                </button>
                                               <?php if(false): ?>
                                                   <button section="weekly_tasks" component="calendar"
                                                           class="btn btn-sm btn-w-lg  btn-round btn-info w-50 sub-modal"
                                                           title="Connecting google" type="button">Send to your calendar
                                                   </button>
                                               <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark text-uppercase font-weight-bold"><?= !empty($board_labels['weekly_tasks_bl']) ? $board_labels['weekly_tasks_bl'] : 'Beginner  level' ?></label>
                                            <textarea section="weekly_tasks" component="beginner_students"
                                                      id="bg-text-area" class="form-control bg-text-area" rows="6"
                                                      cols="8"><?= isset($cache) && !empty($cache['weekly_tasks']['beginner_students']) ? $cache['weekly_tasks']['beginner_students'] : '' ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark text-uppercase font-weight-bold"><?= !empty($board_labels['weekly_tasks_al']) ? $board_labels['weekly_tasks_al'] : 'Advanced level' ?></label>
                                            <textarea section="weekly_tasks" component="advance_students"
                                                      class="form-control bg-text-area" rows="6"
                                                      cols="8"><?= isset($cache) && !empty($cache['weekly_tasks']['advance_students']) ? $cache['weekly_tasks']['advance_students'] : '' ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark text-uppercase font-weight-bold"><?= !empty($board_labels['weekly_tasks_ann']) ? $board_labels['weekly_tasks_ann'] : 'Announcements' ?></label>
                                            <textarea section="weekly_tasks" component="announcements"
                                                      class="form-control bg-text-area" rows="6"
                                                      cols="8"><?= isset($cache) && !empty($cache['weekly_tasks']['announcements']) ? $cache['weekly_tasks']['announcements'] : '' ?></textarea>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="card">
                                    <h5 class="card-title fw-400 font-weight-bold text-uppercase text-center board-title board-title-3">
	                                    <?= !empty($board_labels['group_work']) ? $board_labels['group_work'] : 'Group Work & Activities' ?></h5>
									
									<?php if (!empty($cache['group_work']['doc_group_work'])): ?>

                                        <a href="<?= base_url("download-file/") . $cache['group_work']['doc_group_work'] ?>"
                                           class="btn btn-xs mt-2 btn-primary"><i class="ti-download fs-20"></i><br>Download</a>
									<?php endif; ?>
                                    <div parent-section="group_work" class="card-body">
                                        <p class="url-item">
                                            <a class="nav-url" target="_blank"
                                               href="<?= isset($cache) && !empty($cache['group_work']['url']) ? $cache['group_work']['url'] : '#' ?>">Book
                                                your group work & activities</a>
                                        </p>
                                        <div class="form-group">
                                            <input readonly
                                                   value="<?= isset($cache) && !empty($cache['group_work']['work_title']) ? $cache['group_work']['work_title'] : '' ?>"
                                                   section="group_work" component="work_title" class="form-control"
                                                   type="text" placeholder="Title">
                                            <textarea section="group_work" component="work_description" readonly
                                                      class="form-control border-top-0 bg-text-area" rows="4"
                                                      cols="8"><?= isset($cache) && !empty($cache['group_work']['work_description']) ? $cache['group_work']['work_description'] : '' ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark text-uppercase font-weight-bold"><?= !empty($board_labels['group_work_tw']) ? $board_labels['group_work_tw'] : 'This Week Group' ?></label>
                                            <textarea section="group_work" component="weekly_work"
                                                      class="form-control bg-text-area" rows="3"
                                                      cols="8"><?= isset($cache) && !empty($cache['group_work']['weekly_work']) ? $cache['group_work']['weekly_work'] : '' ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="card">
                                    <h5 class="card-title fw-400 font-weight-bold text-uppercase text-center board-title board-title-4">
	                                    <?= !empty($board_labels['course_materials']) ? $board_labels['course_materials'] : 'Course  Materials' ?></h5>
									<?php if (!empty($cache['group_activity']['doc_group_activity'])): ?>

                                        <a href="<?= base_url("download-file/") . $cache['group_activity']['doc_group_activity'] ?>"
                                           class="btn btn-xs mt-2 btn-primary"><i class="ti-download fs-20"></i><br>Download</a>
									<?php endif; ?>
                                    <div parent-section="group_activity" class="card-body">
                                        <div class="form-group mb-4">
                                            <div class="d-flex  gap-items-2 gap-y mt-16 justify-content-around">
                                                <button section="group_activity" component="email"
                                                        class="btn btn-sm btn-w-lg  btn-round btn-primary w-50  sub-modal"
                                                        title="Enter Your Email" type="button">Send to your email
                                                </button>
	                                            <?php if(false): ?>
                                                <button section="group_activity" component="calendar"
                                                        class="btn btn-sm btn-w-lg  btn-round btn-info w-50 sub-modal"
                                                        title="Connecting google" type="button">Send to your calendar
                                                </button>
	                                            <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input readonly
                                                   value="<?= isset($cache) && !empty($cache['group_activity']['work_title']) ? $cache['group_activity']['work_title'] : '' ?>"
                                                   section="group_activity" component="work_title" class="form-control"
                                                   type="text" placeholder="Title">
                                            <textarea section="group_activity" component="work_description"
                                                      class="form-control border-top-0 bg-text-area" rows="4"
                                                      cols="8"><?= isset($cache) && !empty($cache['group_activity']['work_description']) ? $cache['group_activity']['work_description'] : '' ?></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


        </div>


    </div>

</main>
<!-- END Main container -->
