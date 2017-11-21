<?php
class Contact extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function contact()
	{
		$this->load->model('UserInfo_model');
		$this->load->model('SocialMedia_model');
		$this->load->view("templates/header", array("title"=>"Contact Info"));
		$data['contact_info'] = $this->UserInfo_model->get_contact_info(1);
		$data['social_media'] = $this->SocialMedia_model->get_social_media();
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$data['contactForm'] = $this->load->view("contactForm", $data, TRUE);
		$data['socialmediaForm'] = $this->load->view("socialmediaForm", $data, TRUE);
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

	public function add_social_media()
	{
		$this->load->model('SocialMedia_model');
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$url = $this->input->post('url');
		$this->SocialMedia_model->save_social_media(array("name"=>$name, "url"=>$url, "description"=>$description));

		redirect('/Contact/contact');;
	}

	public function remove_social_media()
	{
		$this->load->model('SocialMedia_model');
		$id = $this->input->post('id');
		$this->SocialMedia_model->delete_social_media($id);

		redirect('/Contact/contact');;
	}

	public function edit_social_media()
	{
		$this->load->model('SocialMedia_model');
		$id = $this->input->post('id');
		$name= $this->input->post('name');
		$description = $this->input->post('description');
		$url = $this->input->post('url');
		$this->SocialMedia_model->edit_social_media($id, $name, $description, $url);

		redirect('/Contact/contact');;
	}


}