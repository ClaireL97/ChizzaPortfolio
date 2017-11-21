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

	public function get_contact_info($user_id)
	{
		$this->db->select('phone, email, profile_pic, f_name, l_name');
		$this->db->from('user_info');
		$this->db->where('user_id', $user_id);
		$contact_info = $this->db->get();
		return $contact_info->row();

	}

	public function update_contact_info($user_id, $f_name, $l_name, $email, $phone, $profile_pic)
	{
		$data = array(
			'f_name' => $f_name,
			'l_name' => $l_name,
			'email' => $email,
			'phone' => $phone,
		);
		if (!empty($profile_pic)) {
			$data['profile_pic'] = $profile_pic;
		}
		$contact = $this->get_contact_info($user_id);
		if (file_exists($contact->profile_pic) && !empty($profile_pic))
		{
			unlink($contact->profile_pic);
		}
		$this->db->where('user_id', $user_id);
		$this->db->update('user_info', $data);


	}

}

