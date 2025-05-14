<?php
class Login_history_model extends CI_Model
{

    public function view_login_history()
    {
        $result = $this->db->query(" SELECT * FROM login_history ");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return [];
        }
    }

    public function delete_login_history($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('login_history');
    }

}