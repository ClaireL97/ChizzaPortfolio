<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
			$this->load->helper('form');

			$this->load->view("templates/header", array("title"=>"Home"));
			$data['synopsis'] = ''; // user_info->getSynopsis();
			$data['synopsisForm'] = $this->load->view("synopsisForm", $data, TRUE);
			$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
			$this->load->view("homePage", $data);
	}

	public function save_synopsis()
	{
		// save synopsis thru the user_info model
		redirect('/Homepage/index');
	}
}
