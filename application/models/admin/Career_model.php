<?php

class Career_model extends CI_Model
{
    

    public function career_view()
{
    $query = "
        SELECT c.*, cd.job_title 
        FROM `career` c
        LEFT JOIN `career_details` cd ON c.profile = cd.id;
    ";

    $result = $this->db->query($query);

    if ($result->num_rows() > 0) {
        return $result->result();
    } else {
        return [];
    }
}

    public function career_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('career');
    }

    public function career_submit_data($data,$upload)
    {
        $data = [
            'name'=>$data['name'],
            'email'=>$data['email'],
            'mobile'=>$data['mobile'],
            'profile'=>$data['profile'],
            'experience'=>$data['experience'],
            'current_salary'=>$data['current_salary'],
            'expected_salary'=>$data['expected_salary'],
            'upload'=>$upload,
        ];
        if ($this->db->insert('career', $data)) 
        {
            return $data; 
        } 
        else
        { 
            return false; 
        }
    }

}
?>