<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function login()
	{

		$this->load->helper('form');
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$error_message = '';

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$data = $this->input->post();
		if ($this->form_validation->run() !== FALSE) {
			// user user_model to validate login credentials
			$logged_in = $this->User_model->validate($this->input->post('username'), $this->input->post('password'));

			if ($logged_in == true) {
				redirect('Homepage/index');
			} else {
				// reload view but with some $verification_error_message
				$error_message = "YOU FAILED";
			}

		}
		$this->load->view("templates/header", array("title"=>"Login"));
		$this->load->view("loginForm", array("error_message"=>$error_message));
		$this->load->view("templates/footer");

	}

	public function logOut()
	{
		$this->session->unset_userdata('logged_in');
	}

	public function getUser()
	{
		//$this->session->set_userdata(array("user_id"=>1)); // set
		// $user = $this->session->userdata["user"]; // get
		// $data['logged_in'] = isset($user);
		return isset($this->session->userdata["user"]); // get
	}
}
