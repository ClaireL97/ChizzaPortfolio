<?php
class Art extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function manage_art()
	{
		if (!isset($_SESSION['logged_in'])) redirect('/Homepage/index');
		$this->load->model('Art_model');
		$this->load->model('Tag_model');
		$data['tags'] = $this->Tag_model->get_tags();
		$data['arts'] = $this->Art_model->get_arts();
		$this->load->view("templates/header", array("title"=>"Upload Art"));
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$data['artUpload_form'] = $this->load->view("artUpload_form", $data, TRUE);
		$this->load->view("manageArt", $data);
	}

	public function upload_art()
	{
		$this->load->model('Art_model');
		$user_id = $this->session->userdata('user_id');
		$config['upload_path'] = '/var/www/chizza_portfolio/CodeIgniter-3.1.6/application/uploads/';
		$config['allowed_types'] = "*";
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image'))
		{
			$file_data = array('upload_data' => $this->upload->data());
			$title = $this->input->post('title');
			$caption = $this->input->post('caption');
			$tags = (array) $this->input->post('tags');
			$artUpload_data = array (
				'user_id' => $user_id,
				'file' => $file_data['upload_data']['full_path'],
				'title' => $title,
				'caption' => $caption,
				);
			$this->Art_model->save_upload($artUpload_data, $tags);
			redirect('/Art/manage_art');

		} else {
			$err = $this->upload->display_errors();
		}

	}

	public function update_art_data()
	{
		$this->load->model('Art_model');
		$id = $this->input->post('id');
		$title= $this->input->post('title');
		$caption = $this->input->post('caption');
		$this->Art_model->update_art_data($id, $title, $caption);

		redirect('/Art/manage_art');
	}

	public function delete_art()
	{
		$this->load->model('Art_model');
		$id = $this->input->post('id');
		$this->Art_model->delete_art($id);

		redirect('/Art/manage_art');
	}


}