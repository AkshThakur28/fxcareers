<?php
class Enquiry_model extends CI_Model
{
    public function enquiry_view()
    {
        $result = $this->db->query("SELECT * FROM `form_submissions` ORDER BY id DESC;");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function edit_enquiry($id)
    {
        $query = $this->db->get_where('form_submissions', ['id' => $id]);
        return $query->row();
    }

    public function update_enquiry($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('form_submissions', $data);
    }

    public function enquiry_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('form_submissions');
    }

    public function follow_up($data)
    {
        return $this->db->insert('form_remark', $data);
    }

    public function follow_up_view()
    {
        $this->db->select('fr.id, fr.form_id, fr.remark, fr.user_id, fr.remark_date, fs.first_name, fs.last_name , fr.form_userid');
        $this->db->from('form_remark as fr');
        $this->db->join('form_submissions as fs', 'fr.form_id = fs.id');
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

}