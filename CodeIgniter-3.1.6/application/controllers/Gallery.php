<?php
class Gallery extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function gallery()
	{
		$this->load->model('Gallery_model');
		$this->load->model('Art_model');
		$id = $this->uri->segment(3, 1);
		$pageNum = $this->uri->segment(4, 1);
		$data = $this->Gallery_model->getGalleryArt($id, $pageNum);
		$galleries = $this->Gallery_model->getGalleries();
		foreach($galleries as $gallery) {
			if ($gallery->id == $id) {
				$data['gallery'] = $gallery;
				break;
			}
		}
		$data['pageNum'] = $pageNum;
		$this->load->view("templates/header", array("title"=>"Gallery", "galleries"=>$galleries));
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$this->load->view("gallery", $data);

	}

	public function manageGalleries()
	{
		if (!isset($_SESSION['logged_in'])) redirect('/Homepage/index');
		$this->load->model('Gallery_model');
		$this->load->model('Tag_model');
		$data['galleries'] = $this->Gallery_model->getGalleries();
		$data['tags'] = $this->Tag_model->get_tags();
		$this->load->view("templates/header", array("title"=>"Manage Galleries", "galleries" => $data['galleries']));
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$data['galleryForm'] = $this->load->view("galleryForm", $data, TRUE);
		$this->load->view("manageGalleries", $data);
	}

	public function updateGallery()
	{
		$this->load->model('Gallery_model');
		$id = $this->input->post('id');
		$title= $this->input->post('title');
		$tags = (array) $this->input->post('tags');
		$this->Gallery_model->updateGallery($id, $title, $tags);

		redirect('/Gallery/manageGalleries');
	}

	public function createGallery()
	{
		$this->load->model('Gallery_model');
		$title = $this->input->post('title');
		$tags = (array) $this->input->post('tags');
		$this->Gallery_model->createGallery(array('title'=>$title), $tags);
			redirect('/Gallery/manageGalleries');
	}

	public function deleteGallery()
	{
		$this->load->model('Gallery_model');
		$id = $this->input->post('id');
		$this->Gallery_model->deleteGallery($id);

		redirect('/Gallery/manageGalleries');
	}
}