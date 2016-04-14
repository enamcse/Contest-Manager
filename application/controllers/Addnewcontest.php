<?php

class Addnewcontest extends CI_Controller {

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
		
		//echo 'Came here you know!';
		$data['msg'] = '';
		//$data['clar_id']= $this->clar->get_new_clar($selected,$this->session->userdata('username'));
		//$this->load->view('components/cssload');
		$this->load->view('addnewcontest',$data);
		//$this->load->view('components/frontpagejsload');
	}

	public function save(){
		$this->load->model('addnewcontest_model','cont');
		//echo 'hours='.$this->input->post('hours');
		//echo '<br>mins='.$this->input->post('mins');

		$dura = ((int)($this->input->post('hours'))*60+(int)($this->input->post('mins')))*60*1000;
		$this->cont->save_contest($this->input->post('contest_name'),$this->input->post('dating'), $dura);
		redirect('contestlist');
	}
}


	
?>