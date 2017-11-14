<?php
class Tag extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function manageTags()
	{

		$this->load->view("templates/header", array("title"=>"Manage Tags"));
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$data['tagForm'] = $this->load->view("tagForm", NULL, TRUE);
		$this->load->view("manageTags", $data);


	}


	public function create_tag()
	{	
		$this->load->model('Tag_model');
		// create and display form, as you do in about_me or etc
		// on form submission:
		// $tagData = array("name"=>form['tag']);
		//call tag_model->save_tag($tagData)
	}
}