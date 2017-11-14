<?php
Class Tag_model extends CI_model{

	public function save_tag($tagData)
	{
		$this->db->insert('tag', $tagData);
	}

	public function delete_tag($id)
	{

	}

	public function update_tag($id, $name)
	{
		
	}

}

