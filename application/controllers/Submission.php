<?php

class Submission extends CI_Controller {

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
	public function index($selected)//selected contest id
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
		

		$this->load->model('submission_model','sub');
		$data['msg'] = '';
		$data['username']= $this->session->userdata('username');
		$data['submissions']= $this->sub->get_submissions($selected);
		$data['contest_id']= $selected;
		$data['contest_name']= $this->sub->get_contest_name($data['contest_id']);
		//$this->load->view('components/cssload');
		$this->load->view('submission',$data);
		//$this->load->view('components/frontpagejsload');
		
	}

	public function rejudge($contest_id, $submission_id){
		$this->load->model('submission_model','sub');

		$this->sub->update_sub_verdict($submission_id);
		redirect('submission/index/'.$contest_id);
		return;
		$data['msg'] = '';
		$data['username']= $this->session->userdata('username');
		$data['submissions']= $this->sub->get_submissions($contest_id);
		$data['contest_id']= $contest_id;
		$data['contest_name']= $this->sub->get_contest_name($data['contest_id']);
		//$this->load->view('components/cssload');
		$this->load->view('submission',$data);
		//$this->load->view('components/frontpagejsload');
	}
}


	
?>