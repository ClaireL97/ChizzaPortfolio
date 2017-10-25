<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function login()
	{


		$this->load->view("templates/header", array("title"=>"Login"));
		$this->load->view("login", $data);
		$this->load->view("templates/footer");

	}

	public function logOut()
	{

	}

	public function getUser()
	{
		//$this->session->set_userdata(array("user_id"=>1)); // set
		// $user = $this->session->userdata["user"]; // get
		// $data['logged_in'] = isset($user);
		return isset($this->session->userdata["user"]); // get
	}
}
