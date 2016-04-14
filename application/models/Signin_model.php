<?php

class Signin_model extends CI_Model {

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

	public function get_password($username){
		//$this->db->select('password');
		$this->db->where('username', $username);
		$query = $this->db->get('users');

		foreach ($query->result() as $row)
		{

			//echo '<script language="javascript">';
			//echo 'alert("message '.$row->password.'successfully sent")';
			//echo '</script>';

			return $row->password;
		}
		return false;
	}

	public function get_role($username){
		$this->db->select('role');
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		foreach($query->result() as $row){
			return $row->role;
		}
		
	}
}


	
?>