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
				<strong class="color-white">K<?= $this->lang->line('title')?>
				<small class="color-white"  style="opacity: 1"><?= !empty($board_labels['sub_title']) ? $board_labels['sub_title'] : '' ?></small>
				<?php if (isset($last_pub)): ?>
                    <small class="pull-right color-white" style=" color: #fff;;">
                        <b class="color-white"><?= $this->lang->line('last-updated')?> :</b> <i
                                class="fa fa-clock-o"></i> <?= date('Y-m-d h:i:s A', strtotime($last_pub['last_updated'])) ?>
                        <br>
                        <b class="color-white"><?= $this->lang->line('updated-by')?></b> <i
                                class="fa fa-user-circle-o"></i> <?= $last_pub['Teacher'] ?><br>
                        <b class="color-white"><?= $this->lang->line('status')?></b> <i class="fa fa-server"></i> <span
                                class="badge badge-primary"> <?= $last_pub['statusname'] ?></span>
                    </small>
				<?php endif; ?>

            </h1>

        </div>
    </header>

    <div class="row justify-content-around">
        <div class="col-4">
            <select id="cohort_list" class="form-control form-control-sm">
				<?php if (!isset($cohorts[$selected_cohort])): ?>
                    <option selected value="">Select Cohort from list</option>
				<?php endif; ?>
				<?php foreach ($cohorts as $cohort): ?>
                    <option <?= $selected_cohort == $cohort['id'] ? 'selected' : '' ?>
                            value="<?= $cohort['id'] ?>"><?= $cohort['cohort_name'] ?></option>
				<?php endforeach; ?>
            </select>
        </div>
        <a section="common_files" class="menu-link upload-file" href="#"
           style="border: solid 1px #bdbdbd;">
            <span class="icon fa fa-file"></span>
            <span class="title"><?= $this->lang->line('uploadfile')?> </span>
            <span class="arrow"></span>
        </a>
		
		
		<?php if (!empty($this->session->flashdata('uploaded_file'))): ?>
            <span data-toggle="tooltip" data-title="Copy this link" class="menu-link " href="#"
                  style="color: #03a9f4 !important;"><?= base_url("download-file/") . $this->session->flashdata('uploaded_file') ?>  </span>
		<?php endif; ?>

    </div>
    <div class="main-content doc-topbar-static">
		<?php if (!isset($cohorts[$selected_cohort])): ?>
            <div class="row">
                <div class="col-12">
                    <p class="p-4 text-danger font-weight-bold text-center"><?= $this->lang->line('select-cohort')?></p>
                </div>
            </div>
		<?php else: ?>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="card">
                                        <h5 class="card-title fw-400 font-weight-bold text-uppercase text-center">
                                            <div class="input-group">
                                                <input board-label="this_week_lesson" type="text"
                                                       value="<?= !empty($board_labels['this_week_lesson']) ? $board_labels['this_week_lesson'] : 'This Week Lessons' ?>"
                                                       class="form-control" placeholder="">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="this_week_lesson" type="button"><?= $this->lang->line('savelabel')?></button>
                                                </span>
                                            </div>
                                            <hr>
											
											<?php if (!empty($cache['weekly_lessons']['doc_weekly_lessons'])): ?>
                                                <small class="text-danger cursor-pointer"
                                                       onclick="deleteFile('weekly_lessons','<?= $last_pub['id'] ?>')">
                                                    <span class="icon fa fa-remove"></span>
                                                    <span class="title"><?= $cache['weekly_lessons']['doc_weekly_lessons'] ?>
                                            <span class="arrow"></span>
                                                </small>
											<?php endif; ?>
                                        </h5>
                                        <div parent-section="weekly_lessons" id="weekly_lessons" class="card-body">
                                            <div class="form-group">
                                                <input value="<?= isset($cache) && !empty($cache['weekly_lessons']['url']) ? $cache['weekly_lessons']['url'] : '' ?>"
                                                       section="weekly_lessons" component="url" class="form-control"
                                                       type="text" placeholder="Paste booking link here">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark text-uppercase font-weight-bold">
                                                    
                                                    <div class="input-group">
                                                        <input board-label="this_week_bl" type="text"
                                                               value="<?= !empty($board_labels['this_week_bl']) ? $board_labels['this_week_bl'] : 'Beginner level' ?>"
                                                               class="form-control" placeholder="">
                                                        <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="this_week_bl" type="button"><?= $this->lang->line('savelabbel')?>l</button>
                                                </span>
                                                    </div>
                                                </label>
                                                <textarea section="weekly_lessons" component="beginner_students"
                                                          class="form-control bg-text-area" rows="6"
                                                          cols="8"><?= isset($cache) && !empty($cache['weekly_lessons']['beginner_students']) ? $cache['weekly_lessons']['beginner_students'] : '' ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark text-uppercase font-weight-bold">
                                                    <div class="input-group">
                                                        <input board-label="this_week_al" type="text"
                                                               value="<?= !empty($board_labels['this_week_al']) ? $board_labels['this_week_al'] : 'Advanced level' ?>"
                                                               class="form-control" placeholder="">
                                                        <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="this_week_al" type="button"><?= $this->lang->line('savelabel')?> </button>
                                                </span>
                                                    </div>
                                                </label>
                                                <textarea section="weekly_lessons" component="advance_students"
                                                          class="form-control bg-text-area" rows="6"
                                                          cols="8"><?= isset($cache) && !empty($cache['weekly_lessons']['advance_students']) ? $cache['weekly_lessons']['advance_students'] : '' ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark text-uppercase font-weight-bold">
                                                    <div class="input-group">
                                                        <input board-label="this_week_ann" type="text"
                                                               value="<?= !empty($board_labels['this_week_ann']) ? $board_labels['this_week_ann'] : 'Announcements' ?>"
                                                               class="form-control" placeholder="">
                                                        <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="this_week_ann" type="button"><?= $this->lang->line('savelabel')?></button>
                                                </span>
                                                    </div>
                                                </label>
                                                <textarea section="weekly_lessons" component="announcements"
                                                          class="form-control bg-text-area" rows="6"
                                                          cols="8"><?= isset($cache) && !empty($cache['weekly_lessons']['announcements']) ? $cache['weekly_lessons']['announcements'] : '' ?></textarea>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="card">
                                        <h5 class="card-title fw-400 font-weight-bold text-uppercase text-center">
                                            <div class="input-group">
                                                <input board-label="weekly_tasks" type="text"
                                                       value="<?= !empty($board_labels['weekly_tasks']) ? $board_labels['weekly_tasks'] : 'Task  of  the week' ?>"
                                                       class="form-control" placeholder="">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="weekly_tasks" type="button"><?= $this->lang->line('savelabel')?> </button>
                                                </span>
                                            </div>
                                            <hr>
											
											<?php if (!empty($cache['weekly_tasks']['doc_weekly_lessons'])): ?>
                                                <small class="text-danger cursor-pointer"
                                                       onclick="deleteFile('weekly_tasks','<?= $last_pub['id'] ?>')">
                                                    <span class="icon fa fa-remove"></span>
                                                    <span class="title"><?= $cache['weekly_tasks']['doc_weekly_lessons'] ?>
                                            <span class="arrow"></span>
                                                </small>
											<?php endif; ?></h5>

                                        <div parent-section="weekly_tasks" class="card-body">
                                            <div class="form-group mb-4">
                                                <div class="d-flex  gap-items-2 gap-y mt-16 justify-content-around">
                                                    <button section="weekly_tasks" component="email"
                                                            class="btn btn-sm btn-w-lg  btn-round btn-primary w-50  sub-modal"
                                                            title="Enter Your Email" type="button"><?= $this->lang->line('sendtoemail')?>
                                                    </button>
                                                    <button section="weekly_tasks" component="calendar"
                                                            class="btn btn-sm btn-w-lg  btn-round btn-info w-50 sub-modal"
                                                            title="Connecting google" type="button"><?= $this->lang->line('sendtocalendar')?>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark text-uppercase font-weight-bold">
                                                   
                                                    <div class="input-group">
                                                        <input board-label="weekly_tasks_bl" type="text"
                                                               value="<?= !empty($board_labels['weekly_tasks_bl']) ? $board_labels['weekly_tasks_bl'] : 'Beginner  level' ?>"
                                                               class="form-control" placeholder="">
                                                        <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="weekly_tasks_bl" type="button"><?= $this->lang->line('savelabel')?></button>
                                                </span>
                                                    </div>
                                                </label>
                                                <textarea section="weekly_tasks" component="beginner_students"
                                                          class="form-control bg-text-area" rows="6"
                                                          cols="8"><?= isset($cache) && !empty($cache['weekly_tasks']['beginner_students']) ? $cache['weekly_tasks']['beginner_students'] : '' ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark text-uppercase font-weight-bold">
                                                    <div class="input-group">
                                                        <input board-label="weekly_tasks_al" type="text"
                                                               value="<?= !empty($board_labels['weekly_tasks_al']) ? $board_labels['weekly_tasks_al'] : 'Advanced level' ?>"
                                                               class="form-control" placeholder="">
                                                        <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="weekly_tasks_al" type="button"><?= $this->lang->line('savelabel')?></button>
                                                </span>
                                                    </div>
                                                </label>
                                                <textarea section="weekly_tasks" component="advance_students"
                                                          class="form-control bg-text-area" rows="6"
                                                          cols="8"><?= isset($cache) && !empty($cache['weekly_tasks']['advance_students']) ? $cache['weekly_tasks']['advance_students'] : '' ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark text-uppercase font-weight-bold">
                                                    <div class="input-group">
                                                        <input board-label="weekly_tasks_ann" type="text"
                                                               value="<?= !empty($board_labels['weekly_tasks_ann']) ? $board_labels['weekly_tasks_ann'] : 'Announcements' ?>"
                                                               class="form-control" placeholder="">
                                                        <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="weekly_tasks_ann" type="button"><?= $this->lang->line('savelabel')?></button>
                                                </span>
                                                    </div>
                                                </label>
                                                <textarea section="weekly_tasks" component="announcements"
                                                          class="form-control bg-text-area" rows="6"
                                                          cols="8"><?= isset($cache) && !empty($cache['weekly_tasks']['announcements']) ? $cache['weekly_tasks']['announcements'] : '' ?></textarea>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="card">
                                        <h5 class="card-title fw-400 font-weight-bold text-uppercase text-center">
                                          
                                                <div class="input-group">
                                                    <input board-label="group_work" type="text"
                                                           value="<?= !empty($board_labels['group_work']) ? $board_labels['group_work'] : 'Group Work & Activities' ?>"
                                                           class="form-control" placeholder="">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="group_work" type="button"><?= $this->lang->line('savelabel')?></button>
                                                </span>
                                                </div>
                                           
                                            <hr>
											
											<?php if (!empty($cache['group_work']['doc_weekly_lessons'])): ?>
                                                <small class="text-danger cursor-pointer"
                                                       onclick="deleteFile('group_work','<?= $last_pub['id'] ?>')">
                                                    <span class="icon fa fa-remove"></span>
                                                    <span class="title"><?= $cache['group_work']['doc_weekly_lessons'] ?>
                                            <span class="arrow"></span>
                                                </small>
											<?php endif; ?></h5>

                                        <div parent-section="group_work" class="card-body">
                                            <div class="form-group">
                                                <input value="<?= isset($cache) && !empty($cache['group_work']['url']) ? $cache['group_work']['url'] : '' ?>"
                                                       section="group_work" class="form-control" component="url"
                                                       type="text"
                                                       placeholder="Paste booking link here">
                                            </div>

                                            <div class="form-group">
                                                <input value="<?= isset($cache) && !empty($cache['group_work']['work_title']) ? $cache['group_work']['work_title'] : '' ?>"
                                                       section="group_work" component="work_title" class="form-control"
                                                       type="text" placeholder="Title">
                                                <textarea section="group_work" component="work_description"
                                                          class="form-control border-top-0 bg-text-area" rows="4"
                                                          cols="8"><?= isset($cache) && !empty($cache['group_work']['work_description']) ? $cache['group_work']['work_description'] : '' ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark text-uppercase font-weight-bold">
                                                    <div class="input-group">
                                                        <input board-label="group_work_tw" type="text"
                                                               value="<?= !empty($board_labels['group_work_tw']) ? $board_labels['group_work_tw'] : 'This Week Group' ?>"
                                                               class="form-control" placeholder="">
                                                        <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="group_work_tw" type="button"><?= $this->lang->line('savelabel')?></button>
                                                </span>
                                                    </div>
                                                </label>
                                                <textarea section="group_work" component="weekly_work"
                                                          class="form-control bg-text-area" rows="3"
                                                          cols="8"><?= isset($cache) && !empty($cache['group_work']['weekly_work']) ? $cache['group_work']['weekly_work'] : '' ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="card">
                                        <h5 class="card-title fw-400 font-weight-bold text-uppercase text-center">
                                            <div class="input-group">
                                                <input board-label="course_materials" type="text"
                                                       value="<?= !empty($board_labels['course_materials']) ? $board_labels['course_materials'] : 'Course  Materials' ?>"
                                                       class="form-control" placeholder="">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info board-label" board-label-for="course_materials" type="button"><?= $this->lang->line('savelabel')?></button>
                                                </span>
                                            </div>
                                            <hr>
											
											<?php if (!empty($cache['group_activity']['doc_weekly_lessons'])): ?>
                                                <small class="text-danger cursor-pointer"
                                                       onclick="deleteFile('group_activity','<?= $last_pub['id'] ?>')">
                                                    <span class="icon fa fa-remove"></span>
                                                    <span class="title"><?= $cache['group_activity']['doc_weekly_lessons'] ?>
                                            <span class="arrow"></span>
                                                </small>
											<?php endif; ?></h5>
                                        <div parent-section="group_activity" class="card-body">
                                            <div class="form-group mb-4">
                                                <div class="d-flex  gap-items-2 gap-y mt-16 justify-content-around">
                                                    <button section="group_activity" component="email"
                                                            class="btn btn-sm btn-w-lg  btn-round btn-primary w-50  sub-modal"
                                                            title="Enter Your Email" type="button"><?= $this->lang->line('sendtoemail')?>
                                                    </button>
                                                    <button section="group_activity" component="calendar"
                                                            class="btn btn-sm btn-w-lg  btn-round btn-info w-50 sub-modal"
                                                            title="Connecting google" type="button"><?= $this->lang->line('sendtocalendar')?>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input value="<?= isset($cache) && !empty($cache['group_activity']['work_title']) ? $cache['group_activity']['work_title'] : '' ?>"
                                                       section="group_activity" component="work_title"
                                                       class="form-control"
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
                        <footer class="card-footer">
                            <div class="row w-100 btn-group m-0">
                                <button class="btn btn-danger col-xs-12 col-sm-6 col-md-3 col-lg-3"
                                        onclick="clear_all_data()"><?= $this->lang->line('deletebtn')?>
                                </button>
                                <button class="btn btn-warning col-xs-12 col-sm-6 col-md-3 col-lg-3"
                                        onclick="user_action('4','Saved')"><?= $this->lang->line('save-complete-later')?>
                                </button>
                                <button class="btn btn-success col-xs-12 col-sm-6 col-md-3 col-lg-3"
                                        onclick="user_action('1','Published')"><?= $this->lang->line('save-publish')?>
                                </button>
                                <button class="btn btn-info col-xs-12 col-sm-6 col-md-3 col-lg-3"
                                        onclick="user_action('2','Saved')"><?= $this->lang->line('save-publish-later')?>Save & Publish Later
                                </button>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
		
		
		<?php endif; ?>
    </div>
</main>

<div class="modal fade" id="modal-upload-file" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" action="<?= base_url('upload-file') ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title" id="upload-file"><?= $this->lang->line('uploadfile')?></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input required type="file" class="form-control" name="documents" accept="image/jpeg">
                    <input type="hidden" class="form-control" id="section" name="section">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal"><?= $this->lang->line('close')?>Close
                    </button>
                    <button type="submit" class="btn btn-bold btn-pure btn-primary"><?= $this->lang->line('save-changes')?></button>
                </div>
            </form>
        </div>
    </div>
</div>
