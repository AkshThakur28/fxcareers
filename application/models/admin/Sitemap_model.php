<?php
class Sitemap_model extends CI_Model
{
    public function sitemap_data_submit($data)
    {
        $data = [
            'page_name' => $data['page_name'],
            'page_url' => $data['page_url'],
        ];
        if ($this->db->insert('sitemap', $data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function sitemap_view()
    {
        $result = $this->db->query("SELECT * FROM `sitemap`;");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function sitemap_delete($id)
    {
        return $this->db->where('id', $id)->delete('sitemap');
    }

    public function sitemap_update_data($data)
    {
        $newdata = [
            'page_name' => $data['page_name'],
            'page_url' => $data['page_url'],
        ];
        $this->db->where('id', $data['id']);
        if ($this->db->update('sitemap', $newdata)) {
            return $newdata;
        } else {
            return false;
        }
    }

    public function sitemap_edit($id)
    {
        $result = $this->db->query("SELECT * FROM `sitemap` WHERE id=$id");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }
}
?>
