<?php
	
	/**
	 * Teacher_Controller.php
	 * Author: Haris
	 * Date: 2/5/2022
	 * Time: 00:02
	 */
	require_once(dirname(__FILE__) . "/Base_Controller.php");
	
	class Teacher extends Base_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
		}
		
		public function home($cohort=false)
		{
			if ($this->session->has_userdata('logged_in')) {
				$data = [
					'selected_cohort'=>$cohort
				];
				$this->load->model('teachers');
				if($cohort){
					$publications = $this->teachers->get_last_publication_all_data($cohort);
					
					if (isset($this->session->userdata['cache'][$cohort]) && !empty($this->session->userdata['cache'][$cohort])) {
						$data['cache'] = $this->session->userdata['cache'][$cohort];
					}
					if (count($publications) > 0) {
						$data['last_pub'] = $publications[0];
						if (!isset($data['cache'])) {
							$data['cache'] = [
								'weekly_lessons' => [
									'url' => $publications[0]['weekly_lessons_booking_url'],
									'beginner_students' => $publications[0]['weekly_lessons_beginner_students'],
									'advance_students' => $publications[0]['weekly_lessons_advance_students'],
									'announcements' => $publications[0]['weekly_lessons_announcements'],
									'doc_weekly_lessons' => $publications[0]['doc_weekly_lessons'],
								],
								'weekly_tasks' => [
									'beginner_students' => $publications[0]['weekly_tasks_beginner_students'],
									'advance_students' => $publications[0]['weekly_tasks_advance_students'],
									'announcements' => $publications[0]['weekly_tasks_announcements'],
									'doc_weekly_tasks' => $publications[0]['doc_weekly_tasks'],
								],
								'group_work' => [
									'url' => $publications[0]['group_work_booking_url'],
									'work_title' => $publications[0]['group_work_title'],
									'work_description' => $publications[0]['group_work_description'],
									'weekly_work' => $publications[0]['group_work_weekly_work'],
									'doc_group_work' => $publications[0]['doc_group_work'],
								],
								'group_activity' => [
									'work_title' => $publications[0]['activity_title'],
									'work_description' => $publications[0]['activity_description'],
									'doc_group_activity' => $publications[0]['doc_group_activity'],
								
								],
							];
						}
					}
					$this->session->set_userdata('active_cohort', $cohort);
				}
				
				$this->load->model('CohortModel');
				$response = $this->CohortModel->get_all_teacher_cohort();
				$cohorts = [];
				foreach ($response as $c){
					$cohorts[$c['id']]=$c;
				}
				$data['cohorts']=$cohorts;
				
				$labels = $this->teachers->get_board_labels($cohort);
				if(!empty($labels)){
					$data['board_labels'] = json_decode($labels->labels_string,true);
				}
				
				$this->load->view('teachers/common/header', $data);
				$this->load->view('teachers/home/view_main_panel');
				$this->load->view('teachers/common/footer');
			} else {
				redirect('login', 'refresh');
			}
		}
		
		public function add_task()
		{
			if ($this->session->has_userdata('logged_in')) {
				$data = [
				
				];
				$this->load->model('teachers');
			
				
				$this->load->model('CohortModel');
				$response = $this->CohortModel->get_all_teacher_cohort();
				$cohorts = [];
				foreach ($response as $c){
					$cohorts[$c['id']]=$c;
				}
				$data['cohorts']=$cohorts;
				
				$this->load->model('students');
				$data['students'] = $this->students->get_all_students();
				
				$this->load->model('classes');
				$data['classes'] = $this->classes->get_all_teacher_classes();
				
				$this->load->view('teachers/common/header', $data);
				$this->load->view('teachers/home/view_add_task');
				$this->load->view('teachers/common/footer');
			} else {
				redirect('login', 'refresh');
			}
		}
		
		public function upload_book()
		{
			if ($this->session->has_userdata('logged_in')) {
				$data = [];
				
				
				
				$this->load->view('teachers/common/header', $data);
				$this->load->view('teachers/home/view_upload_book');
				$this->load->view('teachers/common/footer');
			} else {
				redirect('login', 'refresh');
			}
		}
		
		public function login()
		{
			
			if ($this->session->has_userdata('logged_in')) {
				redirect('/');
			} else {
				if ($this->input->post() != NULL) {
					$inputs = $this->input->post();
					if (empty($inputs['username'])) {
						ajax_response(['status' => 'validation', 'msg' => 'Invalid username found']);
					} else if (empty($inputs['password'])) {
						ajax_response(['status' => 'validation', 'msg' => 'Invalid password found']);
					} else {
						$this->load->model('teachers');
						$response = $this->teachers->validate_login($inputs['username'], $inputs['password']);
						
						if (count($response) == 1) {
							if ($inputs['saveinfo']) {
								set_cookie('userinfo', base64_encode($inputs['username']), 259200, $_SERVER['SERVER_NAME'], '/', $this->app_title, true);
							}
							$this->session->set_userdata('logged_in', [
								'user_id' => $response[0]['id'],
								'role' => 'teacher',
								'name' => "{$response[0]['firstname']} {$response[0]['lastname']}",
							]);
							ajax_response(['status' => 'success']);
						}
						ajax_response(['status' => 'validation', 'msg' => 'Username or Password is not matching']);
						
					}
				} else {
					$this->load->view('teachers/login/view_login');
				}
			}
			
		}
		
		public function upload_work()
		{
			$inputs = $this->input->post();
			if(!empty($inputs['cohort'])){
				$inputs = $this->input->post();
				$cache_data=[$inputs['cohort']=>$inputs];
				$this->session->set_tempdata('cache', $cache_data, 300);
				if ($this->session->has_userdata('logged_in')) {
					$this->load->model('teachers');
					$status = 5;
					if (isset($inputs['useraction'])) {
						$status = $inputs['useraction'];
					}
					$publications = $this->teachers->get_last_publication($inputs['cohort']);
					
					if (count($publications) > 0) {
						$publications_id = $publications[0]['id'];
						$publications = $this->teachers->update_publication([
							'status' => $status,
							'last_updated' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
						], $publications_id);
						
						if ($publications !== false) {
							$weekly_lessons = $this->teachers->update_weekly_lessons([
								'beginner_students' => $inputs['weekly_lessons']['beginner_students'],
								'advance_students' => $inputs['weekly_lessons']['advance_students'],
								'announcements' => $inputs['weekly_lessons']['announcements'],
								'booking_url' => $inputs['weekly_lessons']['url'],
								'last_updated' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
							], $publications_id);
							
							$weekly_tasks = $this->teachers->update_weekly_tasks([
								'beginner_students' => $inputs['weekly_tasks']['beginner_students'],
								'advance_students' => $inputs['weekly_tasks']['advance_students'],
								'announcements' => $inputs['weekly_tasks']['announcements'],
								'last_updated' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
							], $publications_id);
							
							$group_work = $this->teachers->update_group_work([
								'booking_url' => $inputs['group_work']['url'],
								'title' => $inputs['group_work']['work_title'],
								'description' => $inputs['group_work']['work_description'],
								'weekly_work' => $inputs['group_work']['weekly_work'],
								'last_updated' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
							], $publications_id);
							
							$group_activity = $this->teachers->update_group_activity([
								'title' => $inputs['group_activity']['work_title'],
								'description' => $inputs['group_activity']['work_description'],
								'last_updated' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
							], $publications_id);
							
							ajax_response(['status' => 'success']);
						} else {
							ajax_response(['status' => 'error']);
						}
					} else {
						$publications = $this->teachers->save_publication([
							'published_by' => $this->session->userdata['logged_in']['user_id'],
							'status' => $status,
							'cohort' => $inputs['cohort'],
							'added_date' => date('Y-m-d\Th:i:s.v\Z', strtotime('now')),
							'last_updated' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
						]);
						
						if ($publications != false) {
							
							$weekly_lessons = $this->teachers->save_weekly_lessons([
								'publication_id' => $publications,
								'beginner_students' => $inputs['weekly_lessons']['beginner_students'],
								'advance_students' => $inputs['weekly_lessons']['advance_students'],
								'announcements' => $inputs['weekly_lessons']['announcements'],
								'booking_url' => $inputs['weekly_lessons']['url'],
								'added_by' => $this->session->userdata['logged_in']['user_id'],
								'added_date' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
							]);
							
							$weekly_tasks = $this->teachers->save_weekly_tasks([
								'publication_id' => $publications,
								'beginner_students' => $inputs['weekly_tasks']['beginner_students'],
								'advance_students' => $inputs['weekly_tasks']['advance_students'],
								'added_by' => $this->session->userdata['logged_in']['user_id'],
								'added_date' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
							]);
							
							$group_work = $this->teachers->save_group_work([
								'publication_id' => $publications,
								'booking_url' => $inputs['group_work']['url'],
								'title' => $inputs['group_work']['work_title'],
								'description' => $inputs['group_work']['work_description'],
								'weekly_work' => $inputs['group_work']['weekly_work'],
								'added_by' => $this->session->userdata['logged_in']['user_id'],
								'added_date' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
							]);
							
							$group_activity = $this->teachers->save_group_activity([
								'publication_id' => $publications,
								'title' => $inputs['group_activity']['work_title'],
								'description' => $inputs['group_activity']['work_description'],
								'added_by' => $this->session->userdata['logged_in']['user_id'],
								'added_date' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
							]);
							
							ajax_response(['status' => 'success']);
							
						}
						ajax_response(['status' => 'error']);
					}
				} else {
					ajax_response(['status' => 'login_error']);
				}
			}
			else{
				ajax_response(['status' => 'error']);
			}
			
		}
		
		public function save_task()
		{
			$inputs = $this->input->post();
			if(!empty($inputs['tasks'])){
				$this->load->model('teachers');
				foreach ($inputs['tasks'] as $task){
					$task_data=[
						'task_name'=>$task,
						'added_date'=> date('Y-m-d\Th:i:s.v\Z', strtotime('now')),
						'student_id'=>$inputs['student'],
						'cohort_id'=>$inputs['cohort'],
						'class_id'=>$inputs['class'],
						'added_by'=>$this->session->userdata['logged_in']['user_id'],
						'completion_level'=>$inputs['completion_level'],
					];
					$response = $this->teachers->save_task($task_data);
				}
				ajax_response(['status' => 'success']);
			}
			else{
				ajax_response(['status' => 'error']);
			}
			
		}
		
		public function clear_data()
		{
			
			if ($this->session->has_userdata('logged_in')) {
				$this->load->model('teachers');
				$this->session->unset_tempdata('cache');
				unset($this->session->userdata['cache']);
				$publications = $this->teachers->get_last_publication($this->session->userdata['active_cohort']);
				if (count($publications) > 0) {
					$publications_id = $publications[0]['id'];
					$publications = $this->teachers->update_publication([
						'status' => 3
					], $publications_id);
					
					if ($publications !== false) {
						ajax_response(['status' => 'success']);
					} else {
						ajax_response(['status' => 'error']);
					}
				}
				ajax_response(['status' => 'success']);
			} else {
				ajax_response(['status' => 'login_error']);
			}
		}
		
		public function upload_file()
		{
			if ($this->session->has_userdata('logged_in')) {
				$inputs = $this->input->post();
				$this->load->model('teachers');
				$publications = $this->teachers->get_last_publication($this->session->userdata['active_cohort']);
				if (count($publications) > 0) {
					$inputs = $this->input->post();
					$config['upload_path'] = FCPATH . 'assets/uploaded_files/';
					$config['allowed_types'] = '*';
					
					
					if (!dir($config['upload_path'])) {
						mkdir($config['upload_path'], 777, true);
					}
					
					
					$this->load->library('upload', $config);
					$message = 'Failed to upload document';
					if (!$this->upload->do_upload('documents')) {
						$message = $this->upload->display_errors();
						
					} else {
						$upload_data = $this->upload->data();
						$this->session->set_flashdata('uploaded_file', $upload_data['file_name']);
						
						if ($inputs['section'] == "weekly_lessons") {
							$response = $this->teachers->update_weekly_lessons([
								'document_path' => $upload_data['file_name'],
							], $publications[0]['id']);
						} else if ($inputs['section'] == "weekly_tasks") {
							$response = $this->teachers->update_weekly_tasks([
								'document_path' => $upload_data['file_name'],
							], $publications[0]['id']);
						} else if ($inputs['section'] == "group_work") {
							$response = $this->teachers->update_group_work([
								'document_path' => $upload_data['file_name'],
							], $publications[0]['id']);
						} else if ($inputs['section'] == "group_activity") {
							$response = $this->teachers->update_group_activity([
								'document_path' => $upload_data['file_name'],
							], $publications[0]['id']);
						}
						$message = 'Document Uploaded Successfully';
						
					}
				} else {
					$message = 'Cannot Upload File, Please publish some work';
				}
				
				$this->session->set_flashdata('message', $message);
			
				redirect('home/'.$this->session->userdata['active_cohort'], 'refresh');
				
			} else {
				redirect('login', 'refresh');
			}
		}
		
		public function delete_file()
		{
			if ($this->session->has_userdata('logged_in')) {
				$inputs = $this->input->post();
				$this->load->model('teachers');
				if ($inputs['section'] == "weekly_lessons") {
					$response = $this->teachers->update_weekly_lessons([
						'document_path' => '',
					], $inputs['publication']);
				} else if ($inputs['section'] == "weekly_tasks") {
					$response = $this->teachers->update_weekly_tasks([
						'document_path' => '',
					], $inputs['publication']);
				} else if ($inputs['section'] == "group_work") {
					$response = $this->teachers->update_group_work([
						'document_path' => '',
					], $inputs['publication']);
				} else if ($inputs['section'] == "group_activity") {
					$response = $this->teachers->update_group_activity([
						'document_path' => '',
					], $inputs['publication']);
				}
				if ($response) {
					ajax_response(['status' => 'success']);
				}
				ajax_response(['status' => 'error']);
			} else {
				ajax_response(['status' => 'login_error']);
			}
		}
		
		public function students()
		{
			if ($this->session->has_userdata('logged_in')) {
				$data = [];
				$this->load->model('students');
				$order="asc";
				if($this->input->get('query') == "recent"){
					$order="desc";
				}
				$data['students'] = $this->students->get_teacher_students_list($order);
				$this->load->view('teachers/common/header', $data);
				$this->load->view('teachers/view_students_grid');
				$this->load->view('teachers/common/footer');
			} else {
				redirect('/', 'refresh');
			}
		}
		
		public function upload_class_work()
		{
			if ($this->session->has_userdata('logged_in')) {
				$data = [];
				$this->load->model('classes');
				$data['classes'] = $this->classes->get_all_teacher_classes();
				$this->load->view('teachers/common/header', $data);
				$this->load->view('teachers/view_upload_class_work');
				$this->load->view('teachers/common/footer');
			} else {
				redirect('/', 'refresh');
			}
		}
		
		public function save_class_work()
		{
			$inputs = $this->input->post();
			if (empty($inputs['class'])) {
				ajax_response(['status' => 'error', 'msg' => 'Invalid class found']);
			} else {
				$this->load->model('classes');
				
				$response = $this->classes->save_class_work([
					'added_date' => date('Y-m-d\Th:i:s.v\Z', strtotime('now')),
					'class_id' => $inputs['class'],
					'content' => $inputs['data'],
				]);
				if ($response) {
					ajax_response(['status' => 'success']);
					
				}
				ajax_response(['status' => 'validation', 'msg' => 'Failed to save class work']);
			}
			
		}
		
		public function edit_student($student_id)
		{
			if ($this->session->has_userdata('logged_in')) {
				$data = [];
				$this->load->model('students');
				if($this->input->post() != NULL){
					$inputs = $this->input->post() ;
					$message = "Failed to save information";
					if (!empty($inputs['username']) && !empty($inputs['email'])) {
						$response = $this->students->get_student_by_username($inputs['username'],$student_id);
						if (count($response) > 0) {
							$message = "Username already exists";
						}else if (empty($inputs['cohort'])) {
							$message = "Please select valid cohort";
						} else {
							$response = $this->students->get_student_by_email($inputs['email'],$student_id);
							if(count($response) > 0){
								$message = "Email already exists";
							}
							else{
								$config['upload_path'] = FCPATH . 'assets/uploaded_files/students/';
								$config['allowed_types'] = 'jpge|jpg|png';
								if (!file_exists($config['upload_path'])) {
									mkdir($config['upload_path'], 777, true);
								}
								$this->load->library('upload', $config);
								$upload_data = [
									'file_name' => ''
								];
								if ($this->upload->do_upload('profile-pic')) {
									$upload_data = $this->upload->data();
									
								}
								$update_data = [
									'name' => $inputs['name'],
									'username' => $inputs['username'],
									'password' => $inputs['password'],
									'email' => $inputs['email'],
									'status' => $inputs['status'],
									'class_id' => $inputs['class'],
									'cohort' => $inputs['cohort'],
									'phonenumber' => $inputs['phonenumber'],
								];
								if(!empty($upload_data['file_name'])){
									$update_data['profile_pic'] = $upload_data['file_name'];
								}
								
								$response = $this->students->update_student($update_data, $student_id);
								if ($response) {
									$message = "Successfully added student";
								}
							}
							
							
						}
					}
					$this->session->set_flashdata('message', $message);
				}
				
				
				
				$response = $this->students->get_student_by_id($student_id);
				if ($response == false || empty($response)) {
					redirect('/');
				} else {
					$data['details'] = $response;
					$this->load->model('classes');
					$data['classes'] = $this->classes->get_all_active_classes();
					$this->load->model('CohortModel');
					$data['cohorts']= $this->CohortModel->get_all_cohort();
					$this->load->view('teachers/common/header', $data);
					$this->load->view('teachers/view_edit_student');
					$this->load->view('teachers/common/footer');
				}
				
			} else {
				redirect('/', 'refresh');
			}
		}
		
		public function task_list_content()
		{
			if ($this->session->has_userdata('logged_in')) {
				$this->load->model('teachers');
				$data = [];
				$response = $this->teachers->get_teacher_added_tasks();
				
				if (!empty($response)) {
					$data['tasks'] = $response;
					
					$this->load->view('teachers/view_task_list_content', $data);
				} else {
					echo "<p class='text-danger font-weight-bold text-center'>No task found</p>";
				}
				
			} else {
				echo "<p class='text-danger font-weight-bold text-center'>You are not authorised to update profile. Please login</p>";
			}
		}
		
		
		public function update_student_status()
		{
			$inputs = $this->input->post();
			if (empty($inputs['student'])) {
				ajax_response(['status' => 'error', 'msg' => 'Invalid student found']);
			} else {
				$this->load->model('students');
				
				$response = $this->students->update_student([
					'status' => $inputs['status'] !== "false" ? 'active' : 'inactive'
				], $inputs['student']);
				if ($response) {
					ajax_response(['status' => 'success']);
					
				}
				ajax_response(['status' => 'validation', 'msg' => 'Failed to update status']);
			}
			
		}
		
		
		public function delete_student()
		{
			$inputs = $this->input->post();
			if (empty($inputs['student'])) {
				ajax_response(['status' => 'error', 'msg' => 'Invalid student found']);
			} else {
				$this->load->model('students');
				
				$response = $this->students->delete_student($inputs['student']);
				if ($response) {
					ajax_response(['status' => 'success']);
					
				}
				ajax_response(['status' => 'validation', 'msg' => 'Failed to delete student']);
			}
			
		}
		
		public function update_board_labels()
		{
			if ($this->session->has_userdata('logged_in')) {
				$inputs=$this->input->post();
				if(!empty($inputs['field']) && !empty($inputs['value']) && !empty($inputs['cohort'])){
					
					$data=[
						$inputs['field'] =>$inputs['value']
					];
					$this->load->model('teachers');
					$response = $this->teachers->update_board_labels($data,$inputs['cohort']);
					if ($response) {
						ajax_response(['status' => 'success']);
						
					}
				}
				ajax_response(['status' => 'validation', 'msg' => 'Validation Error found']);
				
				
			} else {
				ajax_response(['status' => 'loginerr']);
			}
		}
		
		public function teacher_registration()
		{
			$data=[];
			if($this->input->post() !== NULL){
				$message = 'Failed to register account';
				$inputs = $this->input->post();
				if(empty($inputs['firstname']) || empty($inputs['lastname']) || empty($inputs['username']) || empty($inputs['password']) || empty($inputs['phonenumber']) || empty($inputs['address'])){
					$message  = "Validation Error. Fill All Fields Carefully";
				}
				else if($inputs['password'] !==$inputs['password-conf']){
					$message="Password Donot Match";
				}
				else{
					$this->load->model('teachers');
					$response = $this->teachers->get_teacher_by_username($inputs['username']);
					
					if (count($response) > 0) {
						$message = "Username already exists";
					}
					else{
						$insData=[
							'username'=>$inputs['username'],
							'password'=>$inputs['password'],
							'firstname'=>$inputs['firstname'],
							'middlename'=>$inputs['middlename'],
							'lastname'=>$inputs['lastname'],
							'address'=>$inputs['address'],
							'phonenmber'=>$inputs['phonenumber'],
							'added_date'=>date('Y-m-d\Th:i:s.v\Z', strtotime('now')),
						];
						
						
						
						
						$response = $this->teachers->register_teacher($insData);
						viewResults($response);
						if($response){
							redirect('login');
						}
						
						
					}
					$this->session->set_flashdata('message', $message);
				}
			}
			$this->load->view('teachers/view_teacher_registration');
			
		}
	}
