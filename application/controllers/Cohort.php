<?php
	
	/**
	 * Classes_Controller.php
	 * Author: Haris
	 * Date: 2/5/2022
	 * Time: 00:02
	 */
	require_once(dirname(__FILE__) . "/Base_Controller.php");
	
	class Cohort extends Base_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
		}
		
		public function index(){
			if ($this->session->has_userdata('logged_in')) {
				$data = [];
				$this->load->model('CohortModel');
				$data['cohorts'] = $this->CohortModel->get_all_cohort();
				$this->load->view('teachers/common/header', $data);
				$this->load->view('teachers/cohort/view_cohort_list');
				$this->load->view('teachers/common/footer');
			} else {
				redirect('login', 'refresh');
			}
		}
		
		public function add_update_cohort_content()
		{
			if ($this->session->has_userdata('logged_in')) {
				$data = [];
				$this->load->model('CohortModel');
				if (!empty($this->input->get('cohort')) && $this->input->get('cohort') != "new") {
					$response = $this->CohortModel->get_cohort_by_id($this->input->get('cohort'));
					if (!empty($response)) {
						$data['cohort'] = $response;
					}
				}
				
				$this->load->view('teachers/cohort/add_update_cohort_content',$data);
				
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
		
		public function save_cohort()
		{
			if ($this->session->has_userdata('logged_in')) {
				$inputs = $this->input->post();
				if (empty($inputs['name'])) {
					ajax_response(['status' => 'error', 'msg' => 'Invalid cohort found']);
				} else {
					$this->load->model('CohortModel');
					
					$response = $this->CohortModel->save_cohort([
						'cohort_name' => $inputs['name'],
						'status' => 'active'
					]);
					if ($response) {
						ajax_response(['status' => 'success']);
						
					}
					ajax_response(['status' => 'validation', 'msg' => 'Failed to add cohort']);
				}
				
			} else {
				ajax_response(['status' => 'loginerr']);
			}
		}
		
		public function update_cohort()
		{
			if ($this->session->has_userdata('logged_in')) {
				$inputs = $this->input->post();
				if (empty($inputs['name'])) {
					ajax_response(['status' => 'error', 'msg' => 'Invalid cohort found']);
				} else {
					$this->load->model('CohortModel');
					
					$response = $this->CohortModel->update_cohort([
						'cohort_name' => $inputs['name'],
						'status' => $inputs['status']
					],$inputs['cohort']);
					if ($response) {
						ajax_response(['status' => 'success']);
						
					}
					ajax_response(['status' => 'validation', 'msg' => 'Failed to update cohort']);
				}
				
			} else {
				ajax_response(['status' => 'loginerr']);
			}
		}
	}
