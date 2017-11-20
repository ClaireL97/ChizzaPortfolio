<?php
Class Affiliate_model extends CI_model{

	public function save_affiliate($affiliateData)
	{
		$this->db->insert('affiliation', $affiliateData);
	}

	public function delete_affiliate($id)
	{
		$this->db->delete('affiliation', array('id' => $id));
	}

	public function update_affiliate_data($id, $name, $url, $description)
	{
		$data = array(
			'name' => $name,
			'url' => $url
			'description' => $description
		);
		$this->db->where('id', $id);
		$this->db->update('affiliation', $data);
	}

	public function get_affiliates()
	{
		$affiliates = $this->db->select('*')->from('affiliation')->get()->result();
		return $affiliates;
	}




}