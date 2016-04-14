<?php

class Signup extends CI_Controller {

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
		$this->load->view('signup');
	}


	public function create_user(){
		$config = array(
	        array(
	                'field' => 'username',
	                'label' => 'Username',
	                'rules' => 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]',
	                'errors' => array(
	                        'required' => 'Username must be in between length 5 to 12',
	                        'is_unique' => 'Sorry! This username has already been taken!',
	                ),
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'trim|required|min_length[3]',
	                'errors' => array(
	                        'required' => 'You must provide a strong password more than length 2.',
	                ),
	        ),
	        array(
	                'field' => 'first_name',
	                'label' => 'First Name',
	                'rules' => 'required',
	                'errors' => array(
	                        'required' => 'First Name should not be empty.',
	                ),
	        ),
	        array(
	                'field' => 'last_name',
	                'label' => 'Last Name',
	                'rules' => 'required',
	                'errors' => array(
	                        'required' => 'Last Name should not be empty.',
	                ),
	        ),
	        array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|valid_email',
	                'errors' => array(
	                        'required' => 'E-mail must be valid.',
	                        'valid_email' => 'E-mail address must be a valid one.',
	                ),
	        )
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('signup');

                return;
        }

		
		$this->load->model('signup_model', 'new_user');
		$this->new_user->create_new_user($this->input->post('username'), $this->input->post('first_name'), $this->input->post('last_name'),
			$this->input->post('email'),password_hash($this->input->post('password'), PASSWORD_DEFAULT));
		$data['msg'] = '';
		$this->load->view('signin',$data);
	}
}


	
?>