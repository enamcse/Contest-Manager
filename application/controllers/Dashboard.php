<?php

class Dashboard extends CI_Controller {

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
	public function index($selected)
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
		
		
		$this->load->model('dashboard_model','contest');
		$data['msg'] = '';
		$data['problems']= $this->contest->get_problemset($selected);
		$data['timings']= $this->contest->get_contest_info($selected);
		$data['contest_name'] = $this->contest->get_contest_name($selected);
		$data['contest_id'] = $selected;
		//$this->load->view('components/cssload');
		$this->load->view('dashboard',$data);
		//$this->load->view('components/frontpagejsload');
		
		
	}

	public function start_judge($contest_id){
		chdir('C:\\Users\\enam\\Desktop\\');
		exec('java -jar ContestManagerBackend.jar 1558754710128 1000000000');
		redirect('dashboard/index/'.$contest_id);
	}


	public function delete($contest_id, $problem_id){
		$this->load->model('dashboard_model','problem');
		$this->problem->delete_problem($problem_id);
		redirect('dashboard/index/'.$contest_id);
	}
}


	
?>