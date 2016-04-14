<?php
	
	class Clarification_model extends CI_Model{
		
		public function __construct(){
			//Call the CI_Model Constructor
			parent::__construct();
		}

		public function index(){

		}

		public function get_clarifications($c_id){
			$this->db->where('contest_id', $c_id);
			$this->db->order_by('clarification_id', 'DESC');
			$query = $this->db->get('clarification');
			return $query->result();
		}

		public function get_contest_name($c_id){
			$sql = "SELECT contest_name FROM contest WHERE contest_id = ?";
			$query =$this->db->query($sql, array($c_id));
			foreach ($query->result() as $row)
			{
				return $row->contest_name;
			}
		}
		public function save_clar($clar_id, $question){
			$this->db->where('clarification_id', $clar_id);
			$data = array(
		        'question' => $question
			);
			$this->db->update('clarification',  $data);
		}

		public function save_clar_answer($clar_id, $answer){
			$this->db->where('clarification_id', $clar_id);
			$data = array(
		        'answer' => $answer
			);
			$this->db->update('clarification',  $data);
		}
	}

?>