<?php
class Gallery_model extends CI_Model
{


	public function gallery_data_submit($data, $image)
	{
		$data = [
			'image' => $image,
			'image_name' => $data['image_name'],
		];
		if ($this->db->insert('gallery', $data)) {

			return $data;
		} else {
			return false;
		}
	}

	public function gallery_view()
	{
		$this->db->select('id, image_name, GROUP_CONCAT(image) AS images');
		$this->db->group_by('image_name');
		$query = $this->db->get('gallery');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return [];
		}
	}


	public function gallery()
	{
		$result = $this->db->query(" SELECT *  FROM gallery LIMIT 6");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}

	public function get_sub_gallery_images($gallery_id)
	{
		$this->db->select('*');
		$this->db->where('gallery_id', $gallery_id);
		$query = $this->db->get('sub_gallery');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return [];
		}
	}

	public function get_all_event_groups()
{
    $this->db->group_by('image_name');
    $query = $this->db->get('gallery');
    return $query->result();
}

public function get_gallery_images_by_event($event_name)
{
    $this->db->where('image_name', $event_name);
    return $this->db->get('gallery')->result();
}

public function get_sub_gallery_by_event_id($gallery_id)
{
    $this->db->where('gallery_id', $gallery_id);
    return $this->db->get('sub_gallery')->result();
}


	public function gallery_category_fetch()
	{
		$this->db->distinct();
		$this->db->select('image_name');
		$query = $this->db->get('gallery');
		return $query->result();
	}


	public function get_image_by_id($id)
	{
		$this->db->select('image');
		$this->db->from('gallery');
		$this->db->where('id', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row(); // Return the single row with image field
		}
		return false; // No record found
	}


	public function gallery_update_data($data, $image)
	{
		$newdata = [
			'image' => $image,
			'image_name' => $data['image_name'],
		];
		$this->db->where('id', $data['id']);
		if ($this->db->update('gallery', $newdata)) {

			return $newdata;
		} else {
			return false;
		}
	}


	public function gallery_category_submit_data($data, $image)
	{
		$data = [
			'image' => $image,
			'image_name' => $data['image_name'],
		];
		if ($this->db->insert('gallery', $data)) {

			return $data;
		} else {
			return false;
		}
	}
	public function gallery_delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('gallery');
	}

	public function gallery_edit($id)
	{

		$result = $this->db->query("SELECT * FROM `gallery` where id=$id");
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}


}
