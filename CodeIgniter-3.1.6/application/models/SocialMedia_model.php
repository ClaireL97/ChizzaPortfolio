<?php
Class SocialMedia_model extends CI_model{

	public function save_social_media($SocialMediaData)
	{
		$this->db->insert('social_media', $SocialMediaData);
	}

	public function delete_social_media($id)
	{
		$this->db->delete('social_media', array('id' => $id));
	}

	public function edit_social_media($id, $name, $description, $url)
	{
		$data = array(
			'name' => $name,
			'description' => $description,
			'url' => $url,
		);
		$this->db->where('id', $id);
		$this->db->update('social_media', $data);
	}

	public function get_social_media()
	{
		$social_media = $this->db->select('*')->from('social_media')->get()->result();
		return $social_media;
	}




}