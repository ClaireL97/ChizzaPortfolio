<?php
Class Art_model extends CI_model{

	public function getGalleries()
	{
	//	// select all galleries
		foreach($galleries as $gallery) {
			$gallery_tags = $this->db->select('*')->from('gallery_tags')->where('gallery_id', $gallery->id)->get()->result();
			foreach($gallery_tags as $tag) { // flatten the array
				$gallery->tag_ids[] = $tag->tag_id;
			}
		}
		// // return $galleries;
	}

	public function getGalleryTags($id)
	{
	//	// get all of the tag_id from gallery_tags for the gallery_id=$id
	}

	public function updateGallery($title, $id, $tags)
	{
		$data = array(
			"title" => $title
		);
		// // update gallery set title=$title where id = $id
		// update tags
		$old_tags = $this->getGalleryTags($id);
		foreach($old_tags as $old_tag)
		{ // flatten array
			$old_tag_array[] = $old_tag->tag_id;
		}
		foreach($tags as $new_tag)
		{
			if (!in_array($new_tag, $old_tags)) { // new tag isn't one of the old ones - make it
				$this->db->insert('gallery_tags', array("gallery_id"=>$id, "tag_id"=>$new_tag));
			} // otherwise, new tag is one of the old tags - don't do anything
		}
		foreach ($old_tags as $old_tag) {
			if (!in_array($old_tag, $tags)) { // old tag isn't one of the new ones - delete it
				$this->db->delete('gallery_tags', array("gallery_id"=> $id, "tag_id"=>$old_tag));
			} // otherwise, old tag is one of the new tags - don't do anything
		}
	}

	public function deleteGallery($id)
	{
		$this->db->delete('gallery_tags', array('gallery_id' => $id));
		$this->db->delete('gallery', array('id' => $id));
	}

	public function createGallery($galleryData, $tags)
	{
		$this->db->insert('gallery', $galleryData);
		$gallery_id = $this->db->insert_id();
		foreach ($tags as $tag) {
			$this->db->insert('gallery_tags', array('gallery_id'=>$gallery_id, 'tag_id'=>$tag));
		}
	}

}