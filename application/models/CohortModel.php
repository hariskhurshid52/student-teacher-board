<?php
	
	/**
	 * CohorlModel.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 00:56
	 */
	class CohortModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		public function get_all_cohort()
		{
			try {
				$this->db->select('*');
				
				$this->db->order_by('id', 'ASC');
				$this->db->from('tbl_cohorts');
				
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $ex) {
				return [];
			}
		}
		public function get_cohort_by_id($id)
		{
			try {
				$this->db->select('*');
				$this->db->where([
					'id' => $id,
				]);
				$this->db->order_by('id', 'ASC');
				$this->db->from('tbl_cohorts');
				$query = $this->db->get();
				return $query->row();
			} catch (Exception $ex) {
				return [];
			}
		}
		public function save_cohort($data)
		{
			try {
				$this->db->insert('tbl_cohorts', $data);
				return $this->db->insert_id();
			} catch (Exception $ex) {
				return false;
			}
		}
		
		
		public function update_cohort($data, $id)
		{
			try {
				$this->db->set($data);
				$this->db->where('id', $id);
				$this->db->update('tbl_cohorts');
				return true;
			} catch (Exception $ex) {
				return false;
			}
		}
	}
