<?php
	
	/**
	 * Teachers.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 00:56
	 */
	class Teachers extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		public function validate_login($user_name, $password)
		{
			$this->db->select('*');
			$this->db->where([
				'username' => trim($user_name),
				'password' => trim($password),
			]);
			$this->db->from('tbl_teachers');
			$this->db->limit(1);
			$query = $this->db->get();
			//$this->db->close();
			return $query->result_array();
		}
		public function get_teacher_by_username($user_name)
		{
			$this->db->select('*');
			$this->db->where([
				'username' => trim($user_name),
				
			]);
			$this->db->from('tbl_teachers');
			$this->db->limit(1);
			$query = $this->db->get();
			//$this->db->close();
			return $query->result_array();
		}
		public function get_last_publication($cohort)
		{
			try{
				$this->db->select('tbl_publications.*,tbl_status.name statusname,CONCAT(tbl_teachers.firstname,tbl_teachers.lastname) Teacher');
				$this->db->from('tbl_publications');
				$this->db->join('tbl_status', 'tbl_status.id = tbl_publications.status');
				$this->db->join('tbl_teachers', 'tbl_teachers.id = tbl_publications.published_by');
				$this->db->where([
					'tbl_publications.published_by' => $this->session->userdata['logged_in']['user_id'],
					'tbl_publications.cohort' => $cohort,
				]);
				$this->db->where('tbl_status.name !=', 'Deleted');
				$this->db->order_by('added_date', 'DESC');
				$this->db->limit(1);
				$query = $this->db->get();
				return $query->result_array();
			}
			catch (Exception $ex){
				return  [];
			}
		}
		public function get_last_publication_all_data($cohort)
		{
			try{
				$this->db->select('tbl_publications.*,tbl_status.name statusname,CONCAT(tbl_teachers.firstname,tbl_teachers.lastname) Teacher
				,tbl_group_activities.title activity_title,tbl_group_activities.description activity_description,tbl_group_activities.document_path doc_group_activity
				,tbl_group_work.title group_work_title,tbl_group_work.description group_work_description,tbl_group_work.booking_url group_work_booking_url,tbl_group_work.weekly_work group_work_weekly_work,tbl_group_work.document_path doc_group_work
				,tbl_weekly_tasks.beginner_students weekly_tasks_beginner_students,tbl_weekly_tasks.advance_students weekly_tasks_advance_students,tbl_weekly_tasks.announcements weekly_tasks_announcements,tbl_weekly_tasks.document_path doc_weekly_tasks
				,tbl_weekly_lessons.beginner_students weekly_lessons_beginner_students, tbl_weekly_lessons.advance_students weekly_lessons_advance_students, tbl_weekly_lessons.announcements weekly_lessons_announcements, tbl_weekly_lessons.booking_url weekly_lessons_booking_url,tbl_weekly_lessons.document_path doc_weekly_lessons
				');
				$this->db->from('tbl_publications');
				$this->db->join('tbl_status', 'tbl_status.id = tbl_publications.status', 'left');
				$this->db->join('tbl_teachers', 'tbl_teachers.id = tbl_publications.published_by', 'left');
				$this->db->join('tbl_group_activities', 'tbl_group_activities.publication_id = tbl_publications.id', 'left');
				$this->db->join('tbl_group_work', 'tbl_group_work.publication_id = tbl_publications.id', 'left');
				$this->db->join('tbl_weekly_lessons', 'tbl_weekly_lessons.publication_id = tbl_publications.id', 'left');
				$this->db->join('tbl_weekly_tasks', 'tbl_weekly_tasks.publication_id = tbl_publications.id', 'left');
				$this->db->where([
					'tbl_publications.published_by' => $this->session->userdata['logged_in']['user_id'],
					'tbl_publications.cohort' => $cohort,
				]);
				$this->db->where('tbl_status.name !=', 'Deleted');
				$this->db->order_by('added_date', 'DESC');
				$this->db->limit(1);
				$query = $this->db->get();
				return $query->result_array();
			}
			catch (Exception $ex){
				return  [];
			}
		}
		public function save_publication($data)
		{
			try{
				$this->db->insert('tbl_publications', $data);
				return  $this->db->insert_id();
			}
			catch (Exception $ex){
				return  false;
			}
		}
		public function save_weekly_lessons($data)
		{
			try{
				$this->db->insert('tbl_weekly_lessons', $data);
				
				return  $this->db->insert_id();
			}
			catch (Exception $ex){
				return  false;
			}
		}
		public function save_weekly_tasks($data)
		{
			try{
				$this->db->insert('tbl_weekly_tasks', $data);
				return  $this->db->insert_id();
			}
			catch (Exception $ex){
				return  false;
			}
		}
		public function save_group_activity($data)
		{
			try{
				$this->db->insert('tbl_group_activities', $data);
				return  $this->db->insert_id();
			}
			catch (Exception $ex){
				return  false;
			}
		}
		public function save_group_work($data)
		{
			try{
				$this->db->insert('tbl_group_work', $data);
				return  $this->db->insert_id();
			}
			catch (Exception $ex){
				return  false;
			}
		}
		
		
		public function update_publication($data,$id)
		{
			try{
				$this->db->set($data);
				$this->db->where('id', $id);
				$this->db->update('tbl_publications');
				return true;
			}
			catch (Exception $ex){
				return false;
			}
		}
		public function update_weekly_lessons($data,$pub_id)
		{
			try{
				$this->db->set($data);
				$this->db->where('publication_id', $pub_id);
				$this->db->update('tbl_weekly_lessons');
				return true;
			}
			catch (Exception $ex){
				return false;
			}
		}
		public function update_weekly_tasks($data,$pub_id)
		{
			try{
				$this->db->set($data);
				$this->db->where('publication_id', $pub_id);
				$this->db->update('tbl_weekly_tasks');
				return true;
			}
			catch (Exception $ex){
				return false;
			}
		}
		public function update_group_activity($data,$pub_id)
		{
			try{
				$this->db->set($data);
				$this->db->where('publication_id', $pub_id);
				$this->db->update('tbl_group_activities');
				return true;
			}
			catch (Exception $ex){
				return false;
			}
		}
		public function update_group_work($data,$pub_id)
		{
			try{
				$this->db->set($data);
				$this->db->where('publication_id', $pub_id);
				$this->db->update('tbl_group_work');
				return true;
			}
			catch (Exception $ex){
				return false;
			}
		}
		
		
		public function save_task($data)
		{
			try{
				$this->db->insert('tbl_tasks', $data);
				return  $this->db->insert_id();
			}
			catch (Exception $ex){
				return  false;
			}
		}
		public function register_teacher($data)
		{
			try{
				$this->db->insert('tbl_teachers', $data);
				return  true;
			}
			catch (Exception $ex){
				return  false;
			}
		}
		
		public function update_board_labels($data,$cohort)
		{
			try{
				
				$this->db->select('*');
				$this->db->where([
					'cohort_id' => trim($cohort),
				]);
				$this->db->from('tbl_board_labels');
				$this->db->limit(1);
				$query = $this->db->get();
				//$this->db->close();
				$result= $query->row();
				if(!empty($result)){
					$labels = json_decode($result->labels_string,true);
					foreach ($data as $k => $v){
						$labels[$k] = $v;
					}
					
					$this->db->set([
						'labels_string'=>json_encode($labels),
					]);
					$this->db->where('id', $result->id);
					$this->db->update('tbl_board_labels');
					
				}
				else{
					$ins_data= [
						'labels_string'=>json_encode($data),
						'cohort_id'=>$cohort,
					];
					$this->db->insert('tbl_board_labels', $ins_data);
				}
				return true;
			}
			catch (Exception $ex){
				return false;
			}
		}
		
		public function get_board_labels($cohort)
		{
			try{
				
				$this->db->select('*');
				$this->db->where([
					'cohort_id' => trim($cohort),
				]);
				$this->db->from('tbl_board_labels');
				$this->db->limit(1);
				$query = $this->db->get();
				//$this->db->close();
				return $query->row();
				
				e;
			}
			catch (Exception $ex){
				return [];
			}
		}
		
		public function get_teacher_added_tasks()
		{
			try {
				$this->db->select('tbl_tasks.*,tbl_students.name student_name,tbl_cohorts.cohort_name cohort_name,tbl_classes.name class_name');
				$this->db->where([
					'tbl_tasks.teacher_id' => $this->session->userdata['logged_in']['user_id'],
				]);
				$this->db->join('tbl_students', 'tbl_students.id = tbl_tasks.student_id','LEFT');
				$this->db->join('tbl_cohorts', 'tbl_cohorts.id = tbl_tasks.cohort_id','LEFT');
				$this->db->join('tbl_classes', 'tbl_classes.id = tbl_tasks.class_id','LEFT');
				$this->db->order_by('id', 'desc');
				$this->db->from('tbl_tasks');
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $ex) {
				return [];
			}
		}
	}
