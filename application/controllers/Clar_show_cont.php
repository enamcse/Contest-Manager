<?php

class Clar_show_cont extends CI_Controller {

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
	public function index($contest_id, $clar_id)
	{
		$this->load->model('signin_model','check');
		$verified = false;

		if($this->session->userdata('username')!=null){
			//echo $this->session->userdata('username');
			$verified = true;
		}
		else if($this->input->post('username')!=null){
			$tempu = $this->check->get_role($this->input->post('username'));
			$newdata = array(
		        'username'  => $this->input->post('username'),
		        'role' => $tempu
			);
			
			if(password_verify($this->input->post('password'), $this->check->get_password($this->input->post('username')))){
				//echo 'success!';
				$this->session->set_userdata($newdata);	
				$verified = true;
			}
		}



		if(!$verified){
			$data['msg'] = 'Log in correct Username and Password!';
			$this->load->view('signin',$data);
			return;
		}
		
		
		$this->load->model('clar_show_cont_model','clar');
		$data['msg'] = '';
		$data['clarification']= $this->clar->get_clar($clar_id);
		$data['clar_id']= $clar_id;
		$data['contest_name'] = $this->clar->get_contest_name($contest_id);
		$data['contest_id'] = $contest_id;
		//$this->load->view('components/cssload');
		$this->load->view('clar_show_cont',$data);
		//$this->load->view('components/frontpagejsload');
		
		
	}
}


	
?>