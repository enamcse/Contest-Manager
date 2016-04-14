<?php
	
	class Clar_ask_cont_model extends CI_Model{
		
		public function __construct(){
			//Call the CI_Model Constructor
			parent::__construct();
		}

		public function index(){

		}

		public function get_new_clar($contest_id,$username){

		$data = array(
			'requester' => $username,
			'status' => 'ASKING',
			'contest_id' => $contest_id
		);
		$this->db->insert('clarification', $data);
		return $this->db->insert_id();
		//$this->db->select_max('{primary key}');
	    //$result= $this->db->get('{table}')->row_array();
	    //echo $result['{primary key}'];
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
	}

?>