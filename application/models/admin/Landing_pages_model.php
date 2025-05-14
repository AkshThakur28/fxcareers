<?php
class Landing_pages_model extends CI_Model
{

    public function landing_page_view()
{
    $result = $this->db->query(" SELECT * FROM leads ");

    if ($result->num_rows() > 0) {
        return $result->result();
    } else {
        return 0;
    }
}
}