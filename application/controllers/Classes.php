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
		
		public function index(){
			if ($this->session->has_userdata('logged_in')) {
				$data = [];
				$this->load->model('classes');
				$data['classes'] = $this->classes->get_all_teacher_classes();
				$this->load->view('teachers/common/header', $data);
				$this->load->view('teachers/classes/view_classes_list');
				$this->load->view('teachers/common/footer');
			} else {
				redirect('login', 'refresh');
			}
		}
		
	}
