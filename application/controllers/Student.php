<?php
	
	/**
	 * Student.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 13:59
	 */
	require_once(dirname(__FILE__) . "/Base_Controller.php");
	
	class Student extends Base_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
		}
		
		public function board()
		{
			$data = [];
			$this->load->model('students');
			$publications = $this->students->get_last_published_all_data();
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
			
			if ($this->session->has_userdata('logged_in')) {
				$note_pad_details = $this->students->get_last_updated_notepad($this->session->userdata['logged_in']['user_id']);
				if (count($note_pad_details) > 0) {
					$data['note_pad'] = $note_pad_details[0];
					$this->session->set_userdata('updated_notepad', $data['note_pad']['id']);
				}
			}else{
				redirect('https://student.amasomo.com/login');
			}
			
			$this->load->view('students/common/header', $data);
			$this->load->view('students/home/view_main_board');
			$this->load->view('students/common/footer');
			
		}
		
		public function students()
		{
			$data = [];
			$this->load->model('students');
			$data['students'] = $this->students->get_active_students();
			
			
			$this->load->view('students/common/header', $data);
			$this->load->view('students/view_students_grid');
			$this->load->view('students/common/footer');
			
		}
		
		public function my_class_work()
		{
			$data = [];
			$this->load->model('classes');
			$data['class_work'] = $this->classes->get_my_class_work();
			$this->load->view('students/common/header', $data);
			$this->load->view('students/view_class_work');
			$this->load->view('students/common/footer');
			
		}
		
		public function save_notepad()
		{
			
			if ($this->session->has_userdata('logged_in')) {
				
				$this->load->model('students');
				if (empty($this->session->userdata['updated_notepad'])) {
					$notepad_data = [
						'student_id' => $this->session->userdata['logged_in']['user_id'],
						'text' => $this->input->post('note_pad'),
						'date_added' => date('Y-m-d\Th:i:s.v\Z', strtotime('now'))
					];
					$response = $this->students->save_notepad($notepad_data);
				} else {
					$notepad_data = [
						'date_updated' => date('Y-m-d\Th:i:s.v\Z', strtotime('now')),
						'text' => $this->input->post('note_pad'),
					];
					$response = $this->students->update_notepad($notepad_data, $this->session->userdata['updated_notepad']);
				}
				if ($response) {
					ajax_response(['status' => 'success',]);
				} else {
					ajax_response(['status' => 'error']);
				}
				
			} else {
				ajax_response(['status' => 'error']);
			}
		}
		
		public function login()
		{
			
			if ($this->session->has_userdata('logged_in')) {
				redirect('/');
			} else
				{
				if ($this->input->post() != NULL) {
					$inputs = $this->input->post();
					if (empty($inputs['username'])) {
						ajax_response(['status' => 'validation', 'msg' => 'Invalid username found']);
					} else if (empty($inputs['password'])) {
						ajax_response(['status' => 'validation', 'msg' => 'Invalid password found']);
					} else {
						$this->load->model('students');
						$response = $this->students->validate_login($inputs['username'], $inputs['password']);
						
						if (count($response) == 1) {
							$this->session->set_userdata('logged_in', [
								'user_id' => $response[0]['id'],
								'name' => "{$response[0]['name']}",
								'email' => "{$response[0]['email']}",
								'profile_pic' => "{$response[0]['profile_pic']}",
								'class_id' => "{$response[0]['class_id']}",
								'cohort' => "{$response[0]['cohort']}",
							]);
							ajax_response(['status' => 'success']);
						}
						ajax_response(['status' => 'validation', 'msg' => 'Username or Password is not matching']);
						
					}
				} else {
					$this->load->view('students/login/view_login');
				}
			}
			
		}
		
		public function validate_email()
		{
			$inputs = $this->input->post();
			if (empty($inputs['email'])) {
				ajax_response(['status' => 'validation', 'msg' => 'Invalid email found']);
			}  else {
				$this->load->model('students');
				$response = $this->students->get_student_by_email($inputs['email']);
				
				if (count($response) == 1) {
					
					$new_pass=substr(str_shuffle("RSde".strtotime('now')), 1, 10);
					$response = $this->students->update_student([
						'password'=>$new_pass
					], $response[0]['id']);
					if ($response) {
						ajax_response(['status' => 'success','password'=>$new_pass]);
						
					}
					ajax_response(['status' => 'validation', 'msg' => 'Failed to update password']);
					
				}
				ajax_response(['status' => 'validation', 'msg' => 'Email not found']);
			}
			
		}
		
		public function update_profile_content()
		{
			if ($this->session->has_userdata('logged_in')) {
				$this->load->model('students');
				$data = [];
				$response = $this->students->get_student_by_id($this->session->userdata['logged_in']['user_id']);
				
				if (!empty($response)) {
					$data['details'] = $response;
					$this->load->view('students/view_profile_update', $data);
				} else {
					echo "<p class='text-danger font-weight-bold text-center'>You are not authorised to update profile. Please login</p>";
				}
				
			} else {
				echo "<p class='text-danger font-weight-bold text-center'>You are not authorised to update profile. Please login</p>";
			}
		}
		
		public function update_profile()
		{
			
			if ($this->session->has_userdata('logged_in')) {
				
				$this->load->model('students');
				$inputs = $this->input->post();
				$message = "Failed to update data";
				$update_data = [
					'name' => $inputs['name'],
					'password' => $inputs['password'],
					'email' => $inputs['email'],
					'phonenumber' => $inputs['phonenumber'],
				
				];
				
				$config['upload_path'] = FCPATH . 'assets/uploaded_files/students/';
				$config['allowed_types'] = 'jpge|jpg|png';
				if (!file_exists($config['upload_path'])) {
					mkdir($config['upload_path'], 777, true);
				}
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('profile-pic')) {
					$upload_data = $this->upload->data();
					$update_data['profile_pic'] = $upload_data['file_name'];
					
				}
				
				
				$response = $this->students->update_student($update_data, $this->session->userdata['logged_in']['user_id']);
				if ($response) {
					if (!empty($update_data['file_name'])) {
						$this->session->userdata['logged_in']['profile_pic'] = $update_data['profile_pic'];
					}
					$message = "Successfully updated student";
				}
				$this->session->set_flashdata('message', $message);
				redirect('/', 'refresh');
			} else {
				redirect('/');
			}
			
		}
		
		public function library()
		{
			$data = [];
			
			
			$this->load->view('students/common/header', $data);
			$this->load->view('students/home/view_library');
			$this->load->view('students/common/footer');
			
		}
	}
