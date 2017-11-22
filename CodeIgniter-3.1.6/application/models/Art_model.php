<?php
Class Art_model extends CI_model{

	public function save_upload($artUpload, $tags)
	{
		$this->db->insert('art', $artUpload);
		$art_id = $this->db->insert_id();
		foreach ($tags as $tag) {
			$this->db->insert('art_tag', array('art_id'=>$art_id, 'tag_id'=>$tag));
		}
	}

	public function delete_art($id)
	{
		$data = $this->db->select('*')->from('art')->where('id', $id)->get()->row();
		$delete = unlink($data->file);
		if ($delete == true) {
			$this->db->delete('art_tag', array('art_id' => $id));
			$this->db->delete('art', array('id' => $id));
		}
	}

	public function getArtTags($art_id)
	{
	//	// return all tags from art_tag where art_id = $art_id
	}

	public function update_art_data($id, $title, $caption, $tags)
	{
		$data = array(
			'title' => $title,
			'caption' => $caption
		);
		$this->db->where('id', $id);
		$this->db->update('art', $data);
		// update tags
		$old_tags = $this->getArtTags($id);
		$old_tag_array = array();
		foreach($old_tags as $old_tag)
		{ // flatten array
			$old_tag_array[] = $old_tag->tag_id;
		}
		foreach($tags as $new_tag)
		{
			if (!in_array($new_tag, $old_tags)) { // new tag isn't one of the old ones - make it
				$this->db->insert('art_tag', array("art_id"=>$id, "tag_id"=>$new_tag));
			} // otherwise, new tag is one of the old tags - don't do anything
		}
		foreach ($old_tags as $old_tag) {
			if (!in_array($old_tag, $tags)) { // old tag isn't one of the new ones - delete it
				$this->db->delete('art_tag', array("art_id"=>$id, "tag_id"=>$old_tag));
			} // otherwise, old tag is one of the new tags - don't do anything
		}
	}

	public function get_arts()
	{
		$arts = $this->db->select('*')->from('art')->get()->result();
		foreach($arts as $art) {
			$art_tags = $this->db->select('*')->from('art_tag')->where('art_id', $art->id)->get()->result();
			foreach($art_tags as $tag) { // flatten the array
				$art->tag_ids[] = $tag->tag_id;
			}
		}
		return $arts;
	}


}

