<?php
class Affilate extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function affilates()
	{
		$this->load->view("templates/header", array("title"=>"Affilates"));
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$this->load->view("affilates", $data);
	}
}