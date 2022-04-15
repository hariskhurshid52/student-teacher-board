<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	
	class Base_Controller extends CI_Controller
	{
		public $app_name;
		public $app_title;
		
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->app_name = $this->config->config['app_name'];
			$this->app_title = $this->config->config['app_title'];
			if ($this->input->get('code')) {
				$this->load->library("G_Calender", 'calender');
				$google_api = new G_Calender();
				//$calendar = new Google_Service_Calendar($this->googleplus->client());
				$google = $google_api->client;
				$auth = $google->authenticate($this->input->get('code'));
			
				if (!empty($auth['access_token'])) {
					$this->session->set_userdata('google', $auth);
					$this->session->set_userdata('from_sso', true);
				}
				else{
					$this->session->set_flashdata('message', 'Google verification failed');
				}
				
				redirect('/');
				
			}
			
		}
		
		public function logout()
		{
			$this->session->unset_userdata('logged_in');
			redirect('/');
		}
		
		public function email_content()
		{
			$data = $this->input->get();
			if (!empty($data['navigation'])) {
				unset($this->session->userdata['from_sso']);
			}
			if ($this->input->get('content') == "email") {
				$this->load->view('partial/view_email_content', $data);
			} else {
				$this->session->set_userdata('sso_section', $data['section']);
				$data['auth'] = true;
				$this->load->library("G_Calender", 'calender');
				$calender = new G_Calender();
				//$calendar = new Google_Service_Calendar($this->googleplus->client());
				$google = $calender->client;
				
				if (!empty($this->session->userdata['google']['access_token'])) {
					$google->setAccessToken($this->session->userdata['google']);
				}
				
				if ($google->isAccessTokenExpired()) {
					$data['auth'] = false;
					$url = $google->createAuthUrl();
//					$objUrl = parse_url($url);
//					$queryStr = [];
//					parse_str($objUrl['query'], $queryStr);
//					$queryStr['redirect_uri'] = base_url();
//					//viewResults($queryStr['redirect_uri']);
//					$objUrl['query'] = http_build_query($queryStr);
//
//					$data['login_url'] = "{$objUrl['scheme']}://{$objUrl['host']}{$objUrl['path']}?{$objUrl['query']}";
					$data['login_url'] =$url;
					
				} else {
					$data['user_info'] = $calender->getUser();
					$calender = $calender->calender();
					$calendarList = $calender->calendarList->listCalendarList();
					$lists = [];
					while (true) {
						foreach ($calendarList->getItems() as $calendarListEntry) {
							$lists[] = [
								'backgroundColor' => $calendarListEntry['backgroundColor'],
								'description' => $calendarListEntry['description'],
								'id' => $calendarListEntry['id'],
								'summary' => $calendarListEntry['summary'],
								'timeZone' => $calendarListEntry['timeZone'],
							];
						}
						$pageToken = $calendarList->getNextPageToken();
						if ($pageToken) {
							$optParams = array('pageToken' => $pageToken);
							$calendarList = $calender->calendarList->listCalendarList($optParams);
						} else {
							$data['calenders_list'] = $lists;
							break;
						}
					}
				}
				
				$this->load->view('partial/view_google_calender', $data);
			}
			
		}
		
		public function send_email()
		{
			try {
				$inputs = $this->input->post();
				$this->load->library('Phpmailerlib');
				$this->phpmailerlib->mail->Subject = str_replace('-', ' ', ucwords($inputs['section']));
				$this->phpmailerlib->mail->addAddress(trim($inputs['email']), 'Haris');
				$template = 'Wellcome to amasomo ';
				if ($inputs['section'] == 'weekly_tasks') {
					$template = '<div style="width: 100%">
								<h1>Kinyarwanda Weekly Tasks - ' . date('Y-m-d', strtotime('now')) . '</h1>
								<br>
								<h3>Beginner Students</h3>
								<div >' . $inputs['content']['beginner_students'] . '</div>
								<br>
								<h3>Advance Students</h3>
								<div >' . $inputs['content']['advance_students'] . '</div>
								<br>
								<h3>Announcements</h3>
								<div >' . $inputs['content']['announcements'] . '</div>
							</div>';
				} else if ($inputs['section'] == "group_activity") {
					$template = '<div style="width: 100%">
								<h1>Kinyarwanda Group Activity - ' . date('Y-m-d', strtotime('now')) . '</h1>
								<br>
								<h3>Work Title</h3>
								<div >' . $inputs['content']['work_title'] . '</div>
								<br>
								<h3>Work Description</h3>
								<div >' . $inputs['content']['work_description'] . '</div>
								<br>
							</div>';
				} else if ($inputs['section'] == "notepad") {
					$template = '<div style="width: 100%">
									<h3>My Saved Notepad - ' . date('Y-m-d', strtotime('now')) . '</h3>
									<br>
										' . $inputs['content']['notepad'] . '
								 </div>';
				}
				
				
				$this->phpmailerlib->mail->Body = $template;
				
				if ($this->phpmailerlib->mail->send()) {
					ajax_response(['status' => 'success']);
				}
				ajax_response(['status' => 'failed']);
			} catch (Exception $exception) {
				ajax_response(['status' => 'error']);
			}
			
		}
		
		public function add_to_calender()
		{
			try {
				$inputs = $this->input->post();
				$template = '';
				$date_time = date('Y-m-d', strtotime($inputs['date']));
				if ($inputs['section'] == 'weekly_tasks') {
					$title = "Kinyarwanda Weekly Tasks";
					$template = '<div style="width: 100%"> <h1>Kinyarwanda Weekly Tasks </h1> <br> <h3>Beginner Students</h3> <div>' . $inputs['content']['beginner_students'] . '</div> <br> <h3>Advance Students</h3> <div >' . $inputs['content']['advance_students'] . '</div> <br> <h3>Announcements</h3> <div >' . $inputs['content']['announcements'] . '</div> </div>';
				} else {
					$title = "Kinyarwanda Group Activity";
					$template = '<div style="width: 100%"> <h1>Kinyarwanda Group Activity </h1> <br>  <h3>Work Title</h3> <div>' . $inputs['content']['work_title'] . '</div> <br> <h3>Work Description</h3> <div >' . $inputs['content']['work_description'] . '</div> <br> </div>';
				}
				
				
				$this->load->library("G_Calender");
				$calender = new G_Calender();
				//$calendar = new Google_Service_Calendar($this->googleplus->client());
				$google = $calender->client;
				
				if (!empty($this->session->userdata['google']['access_token'])) {
					$google->setAccessToken($this->session->userdata['google']);
					if (!$google->isAccessTokenExpired()) {
						$event_data = [
							'summary' => $title,
							'description' => $template,
							'start' => [
								'dateTime' => date('Y-m-d\T00:00:00-00:00', strtotime($date_time)),
								'timeZone' => timezone_name_from_abbr("", ($inputs['timeoffset']) * 60, false),
							],
							'end' => [
								'dateTime' => date('Y-m-d\T23:59:59-00:00', strtotime($date_time)),
								'timeZone' => timezone_name_from_abbr("", ($inputs['timeoffset']) * 60, false),
							],
						];
						
						
						$event_data = $calender->getEventData($event_data);
						
						$calender = $calender->calender();
						$response = $calender->events->insert($inputs['content']['calender'], $event_data);
						
						ajax_response(['status' => 'success']);
						
					}
				}
				
			} catch (Exception $exception) {
				$error = json_decode($exception->getMessage(), true);
				
				if (isset($error['error']['code']) && $error['error']['code'] === 403) {
					ajax_response(['msg' => $error['error']['message']]);
				}
				ajax_response(['status' => 'error']);
			}
			
		}
		
		function download_file($filename)
		{
			
			$pathname = FCPATH . 'assets/uploaded_files/' . $filename;
			
			if (!file_exists($pathname)) {
				$this->load->view('errors/html/error_file404');
			} else {
				$this->load->helper('download');
				force_download($pathname, null);
			}
		}
		
		function terms_conditions()
		{
			$this->load->view('web/header');
			$this->load->view('web/terms_conditions');
			$this->load->view('web/footer');
			
		}
		
		function privacy_policy()
		{
			$this->load->view('web/header');
			$this->load->view('web/privacy_policy');
			$this->load->view('web/footer');
			
		}
		
		public function get_student_reg_form()
		{
			
			$data = [];
			if (!empty($this->session->userdata['inputs'])) {
				$data['inputs'] = $this->session->userdata['inputs'];
			}
			if (!empty($this->input->get('redirect'))) {
				$data['redirect'] = $this->input->get('redirect');
			}
			$this->load->model('classes');
			$data['classes'] = $this->classes->get_all_active_classes();
			$this->load->model('CohortModel');
			$data['cohorts']= $this->CohortModel->get_all_cohort();
			$this->load->view('teachers/view_student_registration', $data);
		}
		
		public function save_student_info()
		{
			
			$this->load->model('students');
			$inputs = $this->input->post();
			
			$this->session->set_tempdata(['inputs' => $inputs], 300);
			$message = "Failed to save information. Fill the information correctly";
			if(!empty($inputs['confirm-password']) && $inputs['confirm-password'] !== $inputs['password']){
				$message="Password donot match";
			}
			else if (!empty($inputs['username']) && !empty($inputs['email'])) {
				$response = $this->students->get_student_by_username($inputs['username']);
				if (count($response) > 0) {
					$message = "Username already exists";
				} else {
					$response = $this->students->get_student_by_email($inputs['email']);
					if (count($response) > 0) {
						$message = "Email already exists";
					} else {
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
						$ins_data = [
							'name' => $inputs['name'],
							'username' => $inputs['username'],
							'password' => $inputs['password'],
							'email' => $inputs['email'],
							'added_date' => date('Y-m-d\Th:i:s.v\Z', strtotime('now')),
							'status' => 'active',
							'class_id' => $inputs['class'],
							'phonenumber' => $inputs['phonenumber'],
							'cohort' => $inputs['cohort'],
							'profile_pic' => trim($upload_data['file_name']),
						];
						$response = $this->students->save_student($ins_data);
						if ($response) {
							unset($this->session->userdata['inputs']);
							$message = "Successfully added student";
						}
					}
					
					
				}
			}
			
			
			$this->session->set_flashdata('message', $message);
			if (!empty($inputs['redirect'])) {
				redirect($inputs['redirect'], 'refresh');
			} else {
				redirect('/', 'refresh');
			}
			
		}
		
		
	}
