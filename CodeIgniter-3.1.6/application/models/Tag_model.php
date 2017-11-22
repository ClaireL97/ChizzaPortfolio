<?php
Class Tag_model extends CI_model{

	public function save_tag($tagData)
	{
		$this->db->insert('tag', $tagData);
	}

	public function delete_tag($id)
	{
		$this->db->delete('tag', array('id' => $id));
		$this->db->delete('art_tag', array('tag_id' => $id));
		$this->db->delete('gallery_tags', array('tag_id' => $id));
	}

	public function update_tag($id, $name)
	{
		$data = array(
			'name' => $name
		);
		$this->db->where('id', $id);
		$this->db->update('tag', $data);
	}

	public function get_tags()
	{
		$tags = $this->db->select('*')->from('tag')->get()->result();
		return $tags;
	}

}

