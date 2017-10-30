<?php
Class UserInfo_model extends CI_model{

	public function get_synopsis($user_id)
	{
		$this->db->select('synopsis');
		$this->db->from('user_info');
		$this->db->where('user_id', $user_id);
		$synopsis = $this->db->get();
		return $synopsis->row()->synopsis;

	}

	public function save_synopsis($user_id, $synopsis)
	{
		$data = array(
			'synopsis' => $synopsis
		);
		$this->db->where('user_id', $user_id);
		$this->db->update('user_info', $data);


	}


}

