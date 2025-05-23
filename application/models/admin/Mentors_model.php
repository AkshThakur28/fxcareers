<?php
class Mentors_model extends CI_Model
{

    public function teacher_data_submit($data, $teacher_image)
    {
        $data = [

            'teacher_name' => $data['teacher_name'],
            'teacher_image' => $teacher_image,
            'teacher_email' => $data['teacher_email'],
            'designation' => $data['designation'],
            'teacher_mobile' => $data['teacher_mobile'],
            'teacher_address' => $data['teacher_address'],
            'teacher_introduction' => $data['teacher_introduction'],
            'teacher_education' => $data['teacher_education'],
            'skype' => $data['skype'],
            'facebook' => $data['facebook'],
            'instagram' => $data['instagram'],
            'twitter' => $data['twitter'],
        ];
        if ($this->db->insert('teacher', $data)) {

            return $data;
        } else {
            return false;
        }
    }

    public function mentor_view()
    {
        $result = $this->db->query(" SELECT * FROM teacher ");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function get_coo_and_mentor()
    {
        $this->db->where_in('designation', ['COO and Chief Mentor']);
        $query = $this->db->get('teacher');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    public function mentor_view_limit($limit = 3)
	{
		$this->db->select('*');
		$this->db->from('teacher');
		$this->db->limit($limit);

		$query = $this->db->get();

		return $query->result();
	}
    public function teacher()
    {
        $result = $this->db->query(" SELECT * FROM teacher LIMIT 4");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }


    public function teacher_data_nm()
    {
        $uid = $this->uri->segment(2);
        $result = $this->db->query("SELECT * FROM `teacher` WHERE REPLACE(LOWER(teacher_name), ' ', '-')='$uid'");

        if ($result->num_rows() > 0) {
            return $result->result(); // Return the fetched data
        } else {
            return 0;
        }
    }



    public function teacher_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('teacher');
    }


    public function mentor_update_data($data, $teacher_image)
    {
        // Prepare the updated data array
        $newdata = [
            'teacher_name' => $data['teacher_name'],
            'teacher_email' => $data['teacher_email'],
            'designation' => $data['designation'],
            'teacher_mobile' => $data['teacher_mobile'],
            'teacher_address' => $data['teacher_address'],
            'teacher_introduction' => $data['teacher_introduction'],
            'teacher_education' => $data['teacher_education'],
            'skype' => $data['skype'],
            'facebook' => $data['facebook'],
            'instagram' => $data['instagram'],
            'twitter' => $data['twitter'],
        ];

        // Only update the image if a new image is uploaded
        if (!empty($teacher_image)) {
            $newdata['teacher_image'] = $teacher_image;
        }

        // Update the database
        $this->db->where('id', $data['id']);
        return $this->db->update('teacher', $newdata);
    }


    public function mentor_edit($id)
    {

        $result = $this->db->query("SELECT * FROM `teacher` where id=$id");
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return [];
        }
    }
}
?>