<?php

class Frontpage extends CI_Controller {

	/**     DEPRECATED!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
		$data['msg'] = '';
		
		$this->load->view('components/cssload',$data);
		$this->load->view('components/topbar',$data);
		$this->load->view('components/sidebar',$data);
		$this->load->view('components/footer',$data);
		$this->load->view('frontpage',$data);
		$this->load->view('components/frontpagejsload',$data);
	}

	public function check_user(){
		$this->load->model('signin_model','check');
		if(password_verify($this->input->post('password'), $this->check->get_password($this->input->post('username')))) {
			echo 'Hurray!! You have access!';
			return;
		}
		
		$data['msg'] = 'Invalid Username and Password';
		$this->load->view('signin',$data);
	}

}


	
?>