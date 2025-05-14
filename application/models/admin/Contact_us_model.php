<?php
class Contact_us_model extends CI_Model
{
    public function contact_view()
    {
        $result = $this->db->query("SELECT * FROM `contact` ORDER BY id DESC;");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function edit_contact_enquiry($id)
    {
        $query = $this->db->get_where('contact', ['id' => $id]);
        return $query->row();
    }

    public function update_contact_enquiry($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('contact', $data);
    }

    public function contact_us_delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('contact');
	}


}