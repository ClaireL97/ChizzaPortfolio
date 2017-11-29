<?php
class About_me extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function about_me()
	{
		$this->load->model('UserInfo_model');
		$this->load->model('Gallery_model');
		$galleries = $this->Gallery_model->getGalleries();
		$this->load->view("templates/header", array("title"=>"About Me", "galleries"=>$galleries));
		$data['about_me'] = $this->UserInfo_model->get_about_me(1);
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$this->load->view("aboutMe", $data);

	}

	public function save_about_me()
	{	
		$this->load->model('UserInfo_model');
		$user_id = $this->session->userdata('user_id');
		$about_me = $this->input->post('about_me');

		$this->UserInfo_model->save_about_me($user_id, $about_me);

		// save synopsis thru the user_info model
		redirect('/About_me/about_me');
	}


}