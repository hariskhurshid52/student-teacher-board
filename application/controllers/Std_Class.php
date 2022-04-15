<?php
	
	/**
	 * Classes_Controller.php
	 * Author: Haris
	 * Date: 2/5/2022
	 * Time: 00:02
	 */
	require_once(dirname(__FILE__) . "/Base_Controller.php");
	
	class Std_Class extends Base_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
		}
		
		public function index()
		{
			if ($this->session->has_userdata('logged_in')) {
				$data = [];
				$this->load->model('classes');
				$data['classes'] = $this->classes->get_all_classes();
				$this->load->view('teachers/common/header', $data);
				$this->load->view('teachers/classes/view_classes_list');
				$this->load->view('teachers/common/footer');
			} else {
				redirect('login', 'refresh');
			}
		}
		
		public function add_update_class_content()
		{
			if ($this->session->has_userdata('logged_in')) {
				$data = [];
				$this->load->model('classes');
				if (!empty($this->input->get('class')) && $this->input->get('class') != "new") {
					$response = $this->classes->get_class_by_id($this->input->get('class'));
					if (!empty($response)) {
						$data['class'] = $response;
					}
				}
				$this->load->view('teachers/classes/add_update_class_content', $data);
				
			} else {
				redirect('login', 'refresh');
			}
		}
		
		public function delete_class()
		{
			if ($this->session->has_userdata('logged_in')) {
				$inputs = $this->input->post();
				if (empty($inputs['class'])) {
					ajax_response(['status' => 'error', 'msg' => 'Invalid class found']);
				} else {
					$this->load->model('classes');
					
					$response = $this->classes->delete_class($inputs['class']);
					if ($response) {
						ajax_response(['status' => 'success']);
						
					}
					ajax_response(['status' => 'validation', 'msg' => 'Failed to delete class']);
				}
				
			} else {
				ajax_response(['status' => 'loginerr']);
			}
		}
		
		public function save_class()
		{
			if ($this->session->has_userdata('logged_in')) {
				$inputs = $this->input->post();
				if (empty($inputs['name'])) {
					ajax_response(['status' => 'error', 'msg' => 'Invalid class found']);
				} else {
					$this->load->model('classes');
					
					$response = $this->classes->save_class([
						'name' => $inputs['name'],
						'status' => 'active'
					]);
					if ($response) {
						ajax_response(['status' => 'success']);
						
					}
					ajax_response(['status' => 'validation', 'msg' => 'Failed to add class']);
				}
				
			} else {
				ajax_response(['status' => 'loginerr']);
			}
		}
		public function update_class()
		{
			if ($this->session->has_userdata('logged_in')) {
				$inputs = $this->input->post();
				if (empty($inputs['name'])) {
					ajax_response(['status' => 'error', 'msg' => 'Invalid class found']);
				} else {
					$this->load->model('classes');
					
					$response = $this->classes->update_student([
						'name' => $inputs['name'],
						'status' => $inputs['status']
					],$inputs['class']);
					if ($response) {
						ajax_response(['status' => 'success']);
						
					}
					ajax_response(['status' => 'validation', 'msg' => 'Failed to update class']);
				}
				
			} else {
				ajax_response(['status' => 'loginerr']);
			}
		}
		
	}
