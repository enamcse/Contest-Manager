<?php
	class Submission_model extends CI_Model{
		public function __construct(){
			//Call the CI_Model Constructor
			parent::__construct();
		}

		public function index(){

		}

		public function get_submissions($contest_id){
			$sql = "SELECT * FROM submission WHERE contest_id = ? ORDER BY submission_id DESC";
			$query = $this->db->query($sql, array($contest_id));
			return $query->result();

		}


		public function get_submission($sub_id){
			$sql = "SELECT * FROM submission WHERE submission_id = ?";
			$query = $this->db->query($sql, array($sub_id));
			foreach ($query->result() as $row)
			{
				return $row;
			}

		}

		public function get_contest_name($contest_id){
			$this->db->where_in('contest_id', $contest_id);
			$this->db->select('contest_name');
			$res = $this->db->get('contest'); 
			
			
			foreach ($res->result() as $row)
			{
				return $row->contest_name;

			}
		}
		public function update_sub_verdict($sub_id){
			$data = array(
	        'verdict' => 'IN QUEUE'
			);
			$this->db->where('submission_id', $sub_id);
			$this->db->update('submission', $data);
		}

	}
?>