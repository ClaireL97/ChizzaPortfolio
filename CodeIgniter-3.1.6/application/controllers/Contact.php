<?php
class Contact extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function contact()
	{
		$this->load->model('UserInfo_model');
		$this->load->view("templates/header", array("title"=>"Contact Info"));
		$data['contactInfo'] = $this->UserInfo_model->get_contact_info(1);
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$data['contactForm'] = $this->load->view("contactForm", $data, TRUE);
		$this->load->view("contact", $data);
	}


	public function update_contact_info()
	{
		$this->load->model('UserInfo_model');
		$id = $this->input->post('id');
		$name= $this->input->post('name');
		$description = $this->input->post('description');
		$url = $this->input->post('url');
		$this->UserInfo_model->update_contact_info($id, $name, $description, $url);

		redirect('/Affiliate/affiliates');
	}

}