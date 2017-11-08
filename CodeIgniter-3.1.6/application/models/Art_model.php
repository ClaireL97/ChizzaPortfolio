<?php
Class Art_model extends CI_model{

	public function save_upload($artUpload)
	{
		$this->db->where('user_id', $artUpload['user_id']);
		$this->db->update('art', $artUpload);
	}

}

