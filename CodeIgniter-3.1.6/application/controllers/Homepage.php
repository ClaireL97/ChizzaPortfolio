<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
			$this->load->view("templates/header", array("title"=>"Home"));
			$this->load->view("homePage");
			$this->load->view("templates/footer");
	}
}
