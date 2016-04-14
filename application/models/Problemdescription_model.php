<?php
	
	class Problemdescription_model extends CI_Model{
		
		public function __construct(){
			//Call the CI_Model Constructor
			parent::__construct();
		}

		public function index(){

		}

		public function get_contest_name($c_id){
			$sql = "SELECT contest_name FROM contest WHERE contest_id = ?";
			$query =$this->db->query($sql, array($c_id));
			foreach ($query->result() as $row)
			{
				return $row->contest_name;
			}
		}
		public function save_problem($contest_id){
			$data = array(
		        'contest_id' => $contest_id,
		        'problem_no' =>  $this->input->post('problem_no'),
		        'problem_name' =>  $this->input->post('problem_name'),
		        'description' =>  $this->input->post('description'),
		        'input' =>  $this->input->post('input'),
		        'output' =>  $this->input->post('output'),
		        'sample_input' =>  $this->input->post('sampleinput'),
		        'sample_output' =>  $this->input->post('sampleoutput'),
		        'time_limit' =>  $this->input->post('time_limit'),
		        'input_file_path' =>  $this->input->post('inputfile'),
		        'output_file_path' =>  $this->input->post('outputfile')
			);
			$this->db->insert('problems',  $data);
		}
	}

?>