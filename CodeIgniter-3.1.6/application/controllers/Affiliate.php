<?php
class Affiliate extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function affiliates()
	{
		$this->load->model('Affiliate_model');
		$this->load->model('Gallery_model');
		$galleries = $this->Gallery_model->getGalleries();
		$this->load->view("templates/header", array("title"=>"Affiliates", "galleries"=>$galleries));
		$data['affiliates'] = $this->Affiliate_model->get_affiliates();
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$data['affiliateForm'] = $this->load->view("affiliateForm", $data, TRUE);
		$this->load->view("affiliates", $data);
	}

	public function add_affiliate()
	{
		$this->load->model('Affiliate_model');
		$name = $this->input->post('name');
		$url = $this->input->post('url');
		$description = $this->input->post('description');
		$this->Affiliate_model->save_affiliate(array("name"=>$name, "url"=>$url, "description"=>$description));

		redirect('/Affiliate/affiliates');
	}

	public function remove_affiliate()
	{
		$this->load->model('Affiliate_model');
		$id = $this->input->post('id');
		$this->Affiliate_model->delete_affiliate($id);

		redirect('/Affiliate/affiliates');
	}

	public function edit_affiliate()
	{
		$this->load->model('Affiliate_model');
		$id = $this->input->post('id');
		$name= $this->input->post('name');
		$description = $this->input->post('description');
		$url = $this->input->post('url');
		$this->Affiliate_model->update_affiliate_data($id, $name, $description, $url);

		redirect('/Affiliate/affiliates');
	}

}