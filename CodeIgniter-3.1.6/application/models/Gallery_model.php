<?php
Class Gallery_model extends CI_model{

	public function getGalleries()
	{
		$galleries = $this->db->select('*')->from('gallery')->get()->result();
		foreach($galleries as $gallery) {
			$gallery_tags = $this->db->select('*')->from('gallery_tags')
			->join('tag', 'tag.id = gallery_tags.tag_id')->where('gallery_id', $gallery->id)->get()->result();
			$gallery->tag_ids = array();
			$gallery->tag_names = array();
			foreach($gallery_tags as $tag) { // flatten the array
				$gallery->tag_ids[] = $tag->tag_id;
				$gallery->tag_names[] = $tag->name;
			}
		}
		return $galleries;
	}

	public function getGalleryArt($gallery_id, $pageNumber)
	{
		$limit = 9;
		$sql = "select art.* from art left join art_tag on art.id = art_tag.art_id left join gallery_tags on gallery_tags.tag_id = art_tag.tag_id where gallery_tags.gallery_id = $gallery_id and art_tag.tag_id = gallery_tags.tag_id group by art.id limit $limit offset " . ($pageNumber-1)*$limit ;
		$data = $this->db->query($sql)->result();
		$count = "select count(distinct art.id) as total from art left join art_tag on art.id = art_tag.art_id left join gallery_tags on gallery_tags.tag_id = art_tag.tag_id where gallery_tags.gallery_id = $gallery_id and art_tag.tag_id = gallery_tags.tag_id";
		$totalById = $this->db->query($count)->result();
		$total = 0;
		foreach ($totalById as $totalArt) {
			$total += $totalArt->total;
		}
		// $this->db->select('*')->from('art');
		// $this->db->join('art_tag','art.id = art_tag.tag_id');
		// $this->db->join('gallery_tags','gallery_tags.tag_id = art_tag.tag_id');
		// $this->db->join('gallery', 'gallery.id = gallery_tags.gallery_id');
		// $this->db->where('gallery_tags.gallery_id = ' . $gallery_id);
		// $this->db->limit($limit, (($pageNumber-1) * $limit));
		return array("arts"=>$data, "total"=>$total);
	}

	public function getGalleryTags($gallery_id)
	{
		return $this->db->select('*')->from('gallery_tags')->where('gallery_id', $gallery_id)->get()->result();
	}

	public function updateGallery($id, $title, $tags)
	{
		$data = array(
			"title" => $title
		);
		$this->db->where('id', $id);
		$this->db->update('gallery', $data);
		// update tags
		$old_tags = $this->getGalleryTags($id);
		foreach($old_tags as $old_tag)
		{ // flatten array
			$old_tag_array[] = $old_tag->tag_id;
		}
		foreach($tags as $new_tag)
		{
			if (!in_array($new_tag, $old_tag_array)) { // new tag isn't one of the old ones - make it
				$this->db->insert('gallery_tags', array("gallery_id"=>$id, "tag_id"=>$new_tag));
			} // otherwise, new tag is one of the old tags - don't do anything
		}
		foreach ($old_tag_array as $old_tag) {
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