<?php
	
	/**
	 * Classes.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 00:56
	 */
	class Classes extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		
		public function get_all_active_classes()
		{
			try {
				$this->db->select('*');
				$this->db->where([
					'status' => 'active',
				]);
				$this->db->order_by('id', 'ASC');
				$this->db->from('tbl_classes');
				
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $ex) {
				return [];
			}
		}
		
		public function get_my_class_work()
		{
			try {
				$this->db->select('*');
				$this->db->where([
					'class_id' =>$this->session->userdata['logged_in']['class_id'],
				]);
				$this->db->order_by('id', 'desc');
				$this->db->from('tbl_class_work');
				$this->db->limit(1);
				$query = $this->db->get();
				return $query->row();
			} catch (Exception $ex) {
				return [];
			}
		}
		
		public function get_class_by_id($id)
		{
			try {
				$this->db->select('*');
				$this->db->where([
					'id' => $id,
				]);
				$this->db->order_by('id', 'ASC');
				$this->db->from('tbl_classes');
				$query = $this->db->get();
				return $query->row();
			} catch (Exception $ex) {
				return [];
			}
		}
		
		public function get_all_classes()
		{
			try {
				$this->db->select('*');
				
				$this->db->order_by('id', 'ASC');
				$this->db->from('tbl_classes');
				
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $ex) {
				return [];
			}
		}
		
		public function get_all_teacher_classes()
		{
			try {
				$this->db->select('*');
				$this->db->where([
					'teacher_id' => $this->session->userdata['logged_in']['user_id'],
				]);
				$this->db->order_by('id', 'ASC');
				$this->db->from('tbl_classes');
				
				$query = $this->db->get();
			
				return $query->result_array();
			} catch (Exception $ex) {
				return [];
			}
		}
		
		public function delete_class($id)
		{
			try {
				$this->db->where('id', $id);
				$this->db->delete('tbl_classes');
				return true;
			} catch (Exception $exception) {
				return false;
			}
		}
		public function save_class($data)
		{
			try {
				$this->db->insert('tbl_classes', $data);
				return $this->db->insert_id();
			} catch (Exception $ex) {
				return false;
			}
		}
		public function save_class_work($data)
		{
			try {
				$this->db->insert('tbl_class_work', $data);
				return true;
			} catch (Exception $ex) {
				return false;
			}
		}
		public function update_student($data, $id)
		{
			try {
				$this->db->set($data);
				$this->db->where('id', $id);
				$this->db->update('tbl_classes');
				return true;
			} catch (Exception $ex) {
				return false;
			}
		}
	}
