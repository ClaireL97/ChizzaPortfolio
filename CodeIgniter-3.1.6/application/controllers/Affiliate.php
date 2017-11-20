<?php
class Affiliate extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function affiliates()
	{
		$this->load->view("templates/header", array("title"=>"Affilates"));
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$data['affiliateForm'] = $this->load->view("affiliateForm", $data, TRUE);
		$this->load->view("affiliates", $data);
	}
}