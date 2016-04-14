<?php
	
	class Addnewcontest_model extends CI_Model{
		
		public function __construct(){
			//Call the CI_Model Constructor
			parent::__construct();
		}

		public function index(){

		}

		public function save_contest($contest_name, $start_time, $dur){
			//echo '<br>'.$contest_name.'<br>';
			//echo $dur.'<br>';
			//echo $start_time.'<br>';
			$timestamp = strtotime($start_time);
			$date1 = date("Y-m-d H:i:s", $timestamp);
			//var_dump($date1);
			$data = array(
		        'contest_name' => $contest_name,
		        'start_time' => $date1,
		        'duration' => (int)$dur
			);
			$this->db->insert('contest',  $data);
		}
	}

?>