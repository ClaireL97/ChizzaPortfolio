<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
			$this->load->model('UserInfo_model');
			$this->load->model('Gallery_model');
			$galleries = $this->Gallery_model->getGalleries();
			$this->load->view("templates/header", array("title"=>"Home", "galleries"=>$galleries));
			$data['synopsis'] = $this->UserInfo_model->get_synopsis(1);

			if ($this->session->userdata('logged_in')) {
				$data['synopsisForm'] = $this->load->view("synopsisForm", $data, TRUE);
			}

			$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
			$this->load->view("homePage", $data);
	}

	public function save_synopsis()
	{	
		$this->load->model('UserInfo_model');
		$user_id = $this->session->userdata('user_id');
		$synopsis = $this->input->post('synopsis');

		$this->UserInfo_model->save_synopsis($user_id, $synopsis);

		// save synopsis thru the user_info model
		redirect('/Homepage/index');
	}
}
