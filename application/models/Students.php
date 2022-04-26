<?php
	
	/**
	 * Students.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 00:56
	 */
	class Students extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		
		public function get_last_published_all_data()
		{
			try {
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
				$this->db->where('tbl_status.name =', 'Publish');
				$this->db->where([
					'tbl_publications.cohort' => $this->session->userdata['logged_in']['cohort'],
				]);
				$this->db->order_by('added_date', 'DESC');
				$this->db->limit(1);
				$query = $this->db->get();
				
				return $query->result_array();
			} catch (Exception $ex) {
				return [];
			}
		}
		
		public function validate_login($user_name, $password)
		{
			$this->db->select('*');
			$this->db->where([
				'email' => trim($user_name),
				'password' => trim($password),
				'status' => 'active',
			]);
			$this->db->from('tbl_students');
			$this->db->limit(1);
			$query = $this->db->get();
			//$this->db->close();
			return $query->result_array();
		}
		
		public function get_student_by_id($id)
		{
			try {
				$this->db->select('*');
				$this->db->where([
					'id' => trim($id),
					'status' => 'active',
				]);
				$this->db->from('tbl_students');
				$this->db->limit(1);
				$query = $this->db->get();
				//$this->db->close();
				return $query->row();
			} catch (Exception $exception) {
				return false;
			}
		}
		
		public function delete_student($id)
		{
			try {
				$this->db->where('id', $id);
				$this->db->delete('tbl_students');
				return true;
			} catch (Exception $exception) {
				return false;
			}
		}
		
		public function get_last_updated_notepad($student_id = false)
		{
			$this->db->select('*');
			if ($student_id) {
				$this->db->where([
					'student_id' => trim($student_id),
				]);
			}
			$this->db->order_by('date_added', 'DESC');
			$this->db->from('tbl_student_notepad');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function save_notepad($data)
		{
			try {
				$this->db->insert('tbl_student_notepad', $data);
				return $this->db->insert_id();
			} catch (Exception $ex) {
				return false;
			}
		}
		
		
		public function update_notepad($data, $id)
		{
			try {
				$this->db->set($data);
				$this->db->where('id', $id);
				$this->db->update('tbl_student_notepad');
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
				$this->db->update('tbl_students');
				return true;
			} catch (Exception $ex) {
				return false;
			}
		}
		
		public function get_student_by_username($username, $student = false)
		{
			try {
				$this->db->select('*');
				$this->db->where([
					'username' => trim($username),
				]);
				if ($student) {
					$this->db->where('id !=', $student);
				}
				$this->db->from('tbl_students');
				$this->db->limit(1);
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $exception) {
				return false;
			}
		}
		
		public function get_student_by_email($email, $student = false)
		{
			try {
				$this->db->select('*');
				$this->db->where([
					'email' => trim($email),
				]);
				if ($student) {
					$this->db->where('id !=', $student);
				}
				$this->db->from('tbl_students');
				$this->db->limit(1);
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $exception) {
				return false;
			}
		}
		
		public function get_active_students()
		{
			try {
				$this->db->select('*');
				$this->db->where([
					'status' => 'active',
				]);
				$this->db->from('tbl_students');
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $exception) {
				return false;
			}
		}
		
		public function get_all_students()
		{
			try {
				$this->db->select('tbl_students.*,tbl_classes.name class_name');
				$this->db->from('tbl_students');
				$this->db->join('tbl_classes', 'tbl_classes.id = tbl_students.class_id', 'left');
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $exception) {
				return false;
			}
		}
		
		public function get_all_assigned_tasks($class,$cohort,$student)
		{
			try {
			
				$this->db->select('*');
				$this->db->from('tbl_tasks');
				$where = "class_id = $class OR cohort_id = $cohort OR student_id = $student ";
				$this->db->where($where);
				$this->db->order_by('id', 'DESC');
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $exception) {
				return false;
			}
		}
		public function get_all_completed_tasks()
		{
			try {
			
				$this->db->select('*');
				$this->db->from('tbl_completed_tasks');
				$this->db->where([
					'student_id' => $this->session->userdata['logged_in']['user_id']
				]);
				$this->db->order_by('id', 'DESC');
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $exception) {
				return false;
			}
		}
		
		
		public function save_student($data)
		{
			try {
				$this->db->insert('tbl_students', $data);
				return $this->db->insert_id();
			} catch (Exception $ex) {
				return false;
			}
		}
		
		public function update_task($data)
		{
			try {
				$this->db->insert('tbl_completed_tasks', $data);
				return $this->db->insert_id();
			} catch (Exception $ex) {
				return false;
			}
		}
		
		
		public function get_board_labels()
		{
			try{
				
				$this->db->select('*');
				$this->db->where([
					'cohort_id' => $this->session->userdata['logged_in']['cohort'],
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
		
		public function get_teacher_students_list($order)
		{
			try {
				$this->db->select('tbl_students.*,tbl_classes.name class_name,tbl_cohorts.cohort_name cohort_name');
				$this->db->from('tbl_students');
				$this->db->join('tbl_classes', 'tbl_classes.id = tbl_students.class_id', 'left');
				$this->db->join('tbl_cohorts', 'tbl_cohorts.id = tbl_students.cohort', 'left');
				$this->db->where([
					'tbl_cohorts.teacher_id'=>$this->session->userdata['logged_in']['user_id']
				]);
				$this->db->order_by('added_date', $order);
				$query = $this->db->get();
				return $query->result_array();
			} catch (Exception $exception) {
				return false;
			}
		}
	}
