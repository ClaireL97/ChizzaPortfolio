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
			// delete art_tags where art_id = $id
			$this->db->delete('art', array('id' => $id));
		}
	}

	public function update_art_data($id, $title, $caption)
	{
		$data = array(
			'title' => $title,
			'caption' => $caption
		);
		$this->db->where('id', $id);
		$this->db->update('art', $data);
	}

	public function get_arts()
	{
		$arts = $this->db->select('*')->from('art')->get()->result();
		return $arts;
	}


}

