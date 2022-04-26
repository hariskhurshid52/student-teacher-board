<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	
	/*
	| -------------------------------------------------------------------------
	| URI ROUTING
	| -------------------------------------------------------------------------
	| This file lets you re-map URI requests to specific controller functions.
	|
	| Typically there is a one-to-one relationship between a URL string
	| and its corresponding controller class/method. The segments in a
	| URL normally follow this pattern:
	|
	|	example.com/class/method/id/
	|
	| In some instances, however, you may want to remap this relationship
	| so that a different class/function is called than the one
	| corresponding to the URL.
	|
	| Please see the user guide for complete details:
	|
	|	https://codeigniter.com/user_guide/general/routing.html
	|
	| -------------------------------------------------------------------------
	| RESERVED ROUTES
	| -------------------------------------------------------------------------
	|
	| There are three reserved routes:
	|
	|	$route['default_controller'] = 'welcome';
	|
	| This route indicates which controller class should be loaded if the
	| URI contains no data. In the above example, the "welcome" class
	| would be loaded.
	|
	|	$route['404_override'] = 'errors/page_missing';
	|
	| This route will tell the Router which controller/method to use if those
	| provided in the URL cannot be matched to a valid route.
	|
	|	$route['translate_uri_dashes'] = FALSE;
	|
	| This is not exactly a route, but allows you to automatically route
	| controller and method names that contain dashes. '-' isn't a valid
	| class or method name character, so it requires translation.
	| When you set this option to TRUE, it will replace ALL dashes in the
	| controller and method URI segments.
	|
	| Examples:	my-controller/index	-> my_controller/index
	|		my-controller/my-method	-> my_controller/my_method
	*/
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;
	if ($_SERVER['SERVER_NAME'] == "teacher.amasomo.com") {
		$route['default_controller'] = 'teacher/home';
		$route['home'] = 'teacher/home';
		$route['home/(:any)'] = 'teacher/home/$1';
		$route['login'] = 'teacher/login';
		
		$route['upload-work'] = 'teacher/upload_work';
		$route['clear-board'] = 'teacher/clear_data';
		$route['upload-book'] = 'teacher/upload_book';
		$route['update-board-label'] = 'teacher/update_board_labels';
	
		$route['save-student'] = 'teacher/save_student';
		$route['upload-file'] = 'teacher/upload_file';
		$route['delete-file'] = 'teacher/delete_file';
		$route['students'] = 'teacher/students';
		$route['update-status'] = 'teacher/update_student_status';
		$route['delete-student'] = 'teacher/delete_student';
		$route['edit-student/(:any)'] = 'teacher/edit_student/$1';
		$route['upload-class-work'] = 'teacher/upload_class_work';
		$route['upload-class-work/(:any)'] = 'teacher/upload_class_work/$1';
		$route['save-class-work'] = 'teacher/save_class_work';
		
		$route['classes'] = 'Std_Class';
		$route['add-update-class-content'] = 'Std_Class/add_update_class_content';
		$route['delete-class'] = 'Std_Class/delete_class';
		$route['save-class'] = 'Std_Class/save_class';
	
		$route['update-class'] = 'Std_Class/update_class';
		
		
		$route['add-update-cohort-content'] = 'Cohort/add_update_cohort_content';
		$route['save-cohort'] = 'Cohort/save_cohort';
		$route['update-cohort'] = 'Cohort/update_cohort';
		
		$route['add-tasks'] = 'teacher/add_task';
		$route['save-task'] = 'teacher/save_task';
		
		$route['teacher/registration'] = 'teacher/teacher_registration';
		$route['task-list-content'] = 'teacher/task_list_content';
		
		
		
		
	} else if($_SERVER['SERVER_NAME'] == "student.amasomo.com" || $_SERVER['SERVER_NAME'] == "www.amasomo.com" || $_SERVER['SERVER_NAME'] == "amasomo.com") {
		$route['default_controller'] = 'student/board';
		$route['default_controller'] = 'student/board';
		$route['login'] = 'student/login';
		$route['save-notepad'] = 'student/save_notepad';
		$route['update-profile-content'] = 'student/update_profile_content';
		$route['update-profile'] = 'student/update_profile';
		$route['students'] = 'student/students';
		$route['validate-email'] = 'student/validate_email';
		$route['update-password'] = 'student/update_password';
		$route['library'] = 'student/library';
		
		$route['class-work'] = 'student/my_class_work';
		$route['tasks'] = 'student/tasks';
		$route['update-tasks'] = 'student/update_tasks';
		
	}
	$route['student-reg-content'] = 'Base_Controller/get_student_reg_form';
	$route['register-student'] = 'Base_Controller/save_student_info';
	$route['email-content'] = 'Base_Controller/email_content';
	$route['send-email'] = 'Base_Controller/send_email';
	$route['add-to-calender'] = 'Base_Controller/add_to_calender';
	$route['download-file/(:any)'] = 'Base_Controller/download_file/$1';
	$route['terms-conditions'] = 'Base_Controller/terms_conditions';
	$route['privacy'] = 'Base_Controller/privacy_policy';
	$route['logout'] = 'Base_Controller/logout';
	$route['e-learning'] = 'Base_Controller/e_learning';
