<?php
	
	class Clar_show_judge_model extends CI_Model{
		
		public function __construct(){
			//Call the CI_Model Constructor
			parent::__construct();
		}

		public function index(){

		}


		public function get_contest_info($c_id){
			$sql = "SELECT start_time, duration FROM contest WHERE contest_id = ?";
			return $this->db->query($sql, array($c_id));
		}

		public function get_contest_name($c_id){
			$sql = "SELECT contest_name FROM contest WHERE contest_id = ?";
			$query =$this->db->query($sql, array($c_id));
			foreach ($query->result() as $row)
			{
				return $row->contest_name;
			}
		}

		public function get_clar($c_id){
			$sql = "SELECT * FROM clarification WHERE clarification_id = ?";
			$query =$this->db->query($sql, array($c_id));
			foreach ($query->result() as $row)
			{
				return $row;
			}
		}
	}

?>