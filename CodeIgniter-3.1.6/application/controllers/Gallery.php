<?php
class Gallery extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function gallery()
	{
		// based on the id or name of gallery passed in
		// get the gallery id
		// find all the tag_ids from gallery_tags for the gallery_id
		// find all the art via art_tags using the tag_ids from above
		// thus: this 1 function controls all galleries by finding the tags each gallery has and matching it against the art tags
		$this->load->model('Gallery_model');
		$this->load->view("templates/header", array("title"=>"Gallery"));
		// $data['about_me'] = $this->UserInfo_model->get_about_me(1);
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$this->load->view("Gallery", $data);

	}

	public function manageGalleries()
	{
		// similar to all other manages
		// display all galleries and their gallery-tags
	}

	public function editGallery()
	{

	}

	public function createGallery()
	{

	}

	public function deleteGallery()
	{

	}

	// TODO fill this out with manage (display), create/delete and edit
	// a gallery can have a tag applied to it, which will show art with the same tag

}