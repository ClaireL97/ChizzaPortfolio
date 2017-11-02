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

	public function get_about_me($user_id)
	{
		$this->db->select('about_me');
		$this->db->from('user_info');
		$this->db->where('user_id', $user_id);
		$about_me = $this->db->get();
		return $about_me->row()->about_me;

	}

	public function save_about_me($user_id, $about_me)
	{
		$data = array(
			'about_me' => $about_me
		);
		$this->db->where('user_id', $user_id);
		$this->db->update('user_info', $data);
	}

}

