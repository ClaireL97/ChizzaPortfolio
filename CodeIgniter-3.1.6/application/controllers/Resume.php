<?php
class Resume extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function resume()
	{
		$this->load->model('UserInfo_model');
		$this->load->model('Gallery_model');
		$galleries = $this->Gallery_model->getGalleries();
		$this->load->view("templates/header", array("title"=>"About Me", "galleries"=>$galleries));
		$data['resume'] = $this->UserInfo_model->get_resume(1);
		$data['footer'] = $this->load->view("templates/footer", NULL, TRUE);
		$this->load->view("resume", $data);

	}

	public function save_resume()
	{	
		$this->load->model('UserInfo_model');
		$user_id = $this->session->userdata('user_id');
		$old_resume = $this->UserInfo_model->get_resume($user_id);
		if (file_exists($old_resume)) {
			unlink($old_resume);
			// deletes the old resume before uploading the new one
		}

		$config['upload_path'] = UPLOAD_PATH;
		$config['allowed_types'] = "*";
		$config['file_name'] = 'resume.pdf';
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('resume'))
		{
			$file_data = array('upload_data' => $this->upload->data());
			$resume = $file_data['upload_data']['full_path'];
			$this->UserInfo_model->save_resume($user_id, $resume);
		}
		// save resume thru the user_info model
		redirect('/Resume/resume');
	}


}