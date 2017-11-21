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
		$data['contact_info'] = $this->UserInfo_model->get_contact_info(1);
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$data['contactForm'] = $this->load->view("contactForm", $data, TRUE);
		$this->load->view("contact", $data);
	}


	public function update_contact_info()
	{
		
		$this->load->model('UserInfo_model');
		$user_id = $this->session->userdata('user_id');
		$config['upload_path'] = '/var/www/chizza_portfolio/CodeIgniter-3.1.6/application/uploads/';
		$config['allowed_types'] = "*";
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('profile_pic'))
		{
			$file_data = array('upload_data' => $this->upload->data());
		}
		else
		{
			$file_data = array(); // empty array for ease-of-processing
		}

		$f_name= $this->input->post('f_name');
		$l_name = $this->input->post('l_name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$profile_pic = $file_data['upload_data']['full_path'];
		$this->UserInfo_model->update_contact_info($user_id, $f_name, $l_name, $email, $phone, $profile_pic);

		redirect('/Contact/contact');
	}

}