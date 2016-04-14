<?php

class Problemshowing_model extends CI_Model {

	public function __construct() {
            // Call the CI_Model constructor
            parent::__construct();
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->db->where('name', $name);
	}

	public function get_problem_info($problem_id){
		$this->db->where('problem_id', $problem_id);
		$query = $this->db->get('problems'); 
		$res = $query->result();

		return $res;
		/*
		foreach ($query->result() as $row)
		{
			

		}
		*/
	}

	public function get_submission_id($username, $contest_id,$problem_id){
		$this->db->where('problem_id', $problem_id);
		$problem_name ='';
		$query = $this->db->get('problems'); 

		foreach ($query->result() as $row)
		{
			$problem_name = $row->problem_name;
			break;
		}

		$data = array(
			'username' => $username,
			'problem_id' => $problem_id,
			'problem_name' => $problem_name,
			'language' => 'C++',
			'verdict' => 'IN QUEUE',
			'contest_id' => $contest_id
		);
		$this->db->insert('submission', $data);
		return $this->db->insert_id();
		//$this->db->select_max('{primary key}');
	    //$result= $this->db->get('{table}')->row_array();
	    //echo $result['{primary key}'];
	}

	public function get_contest_id($problem_id){
		$this->db->where('problem_id', $problem_id);
		$this->db->select('contest_id');
		$names = $this->db->get('problems'); 
		$names = $names->result();
		
		
		foreach ($names as $row)
		{
			return $row->contest_id;

		}
		
	}

	public function get_contest_name($contest_id){
		$this->db->where('contest_id', $contest_id);
		$this->db->select('contest_name');
		$res = $this->db->get('contest'); 
		
		
		foreach ($res->result() as $row)
		{
			return $row->contest_name;

		}
		
	}

	public function get_contest($contest_id){
		$this->db->where('contest_id', $contest_id);
		$res = $this->db->get('contest'); 
		
		foreach ($res->result() as $row)
		{
			return $row;

		}
		
	}

	public function update_file_path($sub_id, $file_path){
		$data = array(
        'code_file_path' => $file_path
		);
		$this->db->where('submission_id', $sub_id);
		$this->db->update('submission', $data);
	}
}


	
?>