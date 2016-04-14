<?php

class Signup_model extends CI_Model {

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

	public function is_user_name_taken(){
		$this->load->database();
		$username = $this->input->post('username');
		$this->db->where('username', $username);
		$query = $this->db->count_all('users');
		return $query > 0;
	}

	public function create_new_user($username,$first_name,$last_name,$email,$password){
		$data = array(
	        'username' => $username,
	        'first_name' => $first_name,
	        'last_name' => $last_name,
	        'email' => $email,
	        'password' => $password,
	        'role' => 'Contestant'
		);

		$this->db->insert('users', $data);
	}
}


	
?>