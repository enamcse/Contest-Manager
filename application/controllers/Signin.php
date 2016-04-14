<?php

class Signin extends CI_Controller {

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
		if($this->session->userdata('username')!=null){
			//echo $this->session->userdata('username');
			$this->load->model('contestlist_model','contest');
			$data['msg'] = '';
			$data['contests']= $this->contest->get_contestlist();
			//$this->load->view('components/cssload');
			$this->load->view('contestlist',$data);
			return;
		}


		$data['msg'] = '';
		$this->load->view('signin',$data);
	}

	public function check_user(){
		$this->load->model('signin_model','check');
		if(password_verify($this->input->post('password'), $this->check->get_password($this->input->post('username')))) {
			$tempu = $this->check->get_role($this->input->post('username'));
			$role = $tempu->role;
			$newdata = array(
		        'username'  => $this->input->post('username'),
		        'role' => $role
			);
			$this->session->set_userdata($newdata);
			$this->load->view('contestlist',$data);
			return;
		}
		
		$data['msg'] = 'Invalid Username and Password';
		$this->load->view('signin',$data);
	}

	public function signout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		$data['msg'] = '';
		$this->load->view('signin',$data);
	}


}


	
?>