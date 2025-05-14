<?php

class Career_detail_model extends CI_Model
{


    public function career_details_view()
    {
        $result = $this->db->query("SELECT * FROM `career_details`;");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return [];
        }
    }

    public function career_detail_submit_data($data)
    {
        $data = [
            'job_title' => $data['job_title'],
            'location' => $data['location'],
            'salary' => $data['salary'],
            'short_desc' => $data['short_desc'],
            'description' => $data['description'],
        ];
        if ($this->db->insert('career_details', $data)) {
            return $data;
        } else {
            return false;
        }
    }


    public function blog_category_edit($id)
    {

        $result = $this->db->query("SELECT * FROM `blog_category` where id=$id");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function blog_category_update_data($data)
    {
        $newdata = [
            'category' => $data['category'],

        ];
        print_r($newdata);
        $this->db->where('id', $data['id']);
        if ($this->db->update('blog_category', $newdata)) {

            return $newdata;
        } else {
            return false;
        }
    }

    public function career_detail_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('career_details');
    }

    public function job_title_fetch(){
        $result = $this->db->query("SELECT * FROM `career_details`");
        if ($result->num_rows() > 0)
        {
            return $result->result(); 
            }
            else
            {
                return 0;
            }
    }

}
?>