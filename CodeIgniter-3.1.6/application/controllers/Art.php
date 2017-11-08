<?php
class Art extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function manage_art()
	{
		// displays view to add new art
		// more to be added later
		$this->load->model('Art_model');
		$this->load->view("templates/header", array("title"=>"Upload Art"));
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$data['artUpload_form'] = $this->load->view("artUpload_form", NULL, TRUE);
		$this->load->view("manageArt", $data);
	}

	public function upload_art()
	{ 
		$this->load->model('Art_model');
		$user_id = $this->session->userdata('user_id');
		$config['upload_path'] = '/var/www/chizza_portfolio/CodeIgniter-3.1.6/uploads/';
		$config['allowed_types'] = "*";
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image'))
		{
			$file_data = array('upload_data' => $this->upload->data());
			$title = $this->input->post('title');
			$caption = $this->input->post('caption');
			$artUpload_data = array (
				'user_id' => $user_id,
				'file' => $file_data['upload_data']['full_path'],
				'title' => $title,
				'caption' => $caption,
				);
			$this->Art_model->save_upload($artUpload);

		} else {
			$err = $this->upload->display_errors();
		}

	}


}