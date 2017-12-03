<?php
class Tag extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function manageTags()
	{
		$this->load->model('Tag_model');
		$data['tags'] = $this->Tag_model->get_tags();
		$this->load->model('Gallery_model');
		$galleries = $this->Gallery_model->getGalleries();
		$this->load->view("templates/header", array("title"=>"Manage Tags", "galleries"=>$galleries));
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$data['tagForm'] = $this->load->view("tagForm", NULL, TRUE);
		$this->load->view("manageTags", $data);
	}


	public function create_tag()
	{
		$this->load->model('Tag_model');
		$tag = $this->input->post('tag');
		$this->Tag_model->save_tag(array("name"=>$tag));

		redirect('/Tag/manageTags');
	}

	public function update_tag()
	{
		$this->load->model('Tag_model');
		$id = $this->input->post('id');
		$tag = $this->input->post('tag');
		$this->Tag_model->update_tag($id, $tag);

		redirect('/Tag/manageTags');
	}

	public function delete_tag()
	{
		$this->load->model('Tag_model');
		$id = $this->input->post('id');
		$this->Tag_model->delete_tag($id);

		redirect('/Tag/manageTags');
	}
}