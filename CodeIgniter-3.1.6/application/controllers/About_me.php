<?php
class About_me extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function about_me()
	{
		$this->load->view("templates/header", array("title"=>"About Me"));
		$this->load->view("aboutMe");
		$this->load->view("templates/footer");
	}


}