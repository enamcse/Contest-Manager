<?php

class Standings extends CI_Controller {

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
		

		$this->load->model('standings_model','info');
		//$this->load->spark('csvimport/0.0.1');
		$file_name = $this->info->get_csv_file($selected);
		//echo $file_name;
		$data['info']=$this->csvimport->get_array($this->info->get_csv_file($selected));
		$data['msg'] = '';
		$data['username']= $this->session->userdata('username');
		$data['contest_id']= $selected;
		$data['contest_name']= $this->info->get_contest_name($data['contest_id']);

		//var_dump($data['info']);
		//return;
		//$this->load->view('components/cssload');
		//$this->load->view('components/standingspagecssload');
		$this->load->view('standings',$data);
		//$this->load->view('components/frontpagejsload');
		//$this->load->view('components/standingspagejsload');
		
	}

	public function do_upload($username,$contest_id,$problem_id)
    {
    		$this->load->model('problemshowing_model','problem');
			$data['msg'] = '';

			$submission_id = $this->problem->get_submission_id($username, $contest_id, $problem_id);

            $config['upload_path']          = './uploads/';
            $config['file_name']          = 'sub_'.$submission_id.'.cpp';
            $config['overwrite']          = true;
            $config['allowed_types']        = '*';
            $config['max_size']             = 2048;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    echo $this->upload->display_errors();
                    //$this->load->view('upload_form', $error);

                    $data['msg'] = '';
					$data['problem']= $this->problem->get_problem_info($problem_id);
					$data['username']= $username;
					$data['problem_id']= $problem_id;
					$data['contest_id']= $contest_id;
					$data['contest_name']= $this->problem->get_contest_name($contest_id);
					$this->load->view('components/cssload');
					$this->load->view('problemshowing',$data);
					$this->load->view('components/frontpagejsload');
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    echo 'success!';
                    foreach ($this->upload->data() as $item => $value){
                    	echo $item.':'.$value; echo '<br>';
                    }
                    //$this->load->view('upload_success', $data);

            }
    }

}


	
?>