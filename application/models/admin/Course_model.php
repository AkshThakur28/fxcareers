<?php
class course_model extends CI_Model
{


    public function course_data_submit($data)
    {
        $insertData = [
            'course_name' => $data['course_name'],
            'course_image' => $data['course_image'], // Only the file name
            'author' => $data['author'],
            'mode' => $data['mode'],
            'lesson' => $data['lesson'],
            'duration' => $data['duration'],
            'category' => $data['category'],
            'language' => $data['language'],
            'base_price' => $data['base_price'],
            'seo_title' => $data['seo_title'],
            'seo_keywords' => $data['seo_keywords'],
            'seo_desc' => $data['seo_desc'],
            'long_description' => $data['long_description'], // Ensure long description is submitted
            'status' => $data['status'],
        ];
        $this->db->insert('detail', $insertData);
        return true;
    }



    public function course_view()
    {
        $query = "
    SELECT 
        d.id,
        d.course_name,
        d.course_image,
        d.author,
        d.category,
        d.mode,
        d.language,
        d.lesson,
        d.intro_video,
        d.duration,
        d.status,
        d.seo_desc,
        d.price,
        d.base_price,
        d.long_description,
        d.recommended,
        d.seo_keywords,
        d.seo_title,
        cl.language_name AS language_name,
        GROUP_CONCAT(cc.category_name ORDER BY cc.category_name SEPARATOR ', ') AS category_names
    FROM `detail` d
    LEFT JOIN `course_language` cl ON d.language = cl.id
    LEFT JOIN `course_category` cc ON FIND_IN_SET(cc.id, d.category)
    GROUP BY 
        d.id,
        d.course_name,
        d.course_image,
        d.author,
        d.category,
        d.mode,
        d.language,
        d.lesson,
        d.intro_video,
        d.duration,
        d.status,
        d.seo_desc,
        d.price,
        d.base_price,
        d.long_description,
        d.recommended,
        d.seo_keywords,
        d.seo_title,
        cl.language_name
    ";

        $result = $this->db->query($query);

        return ($result->num_rows() > 0) ? $result->result() : [];
    }


    public function course_category_fetch()
    {

        $course_category_data = $this->db->query("SELECT * FROM `course_category`");

        $fetch = $course_category_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $course_category_data->result_array();
        } else {
            return false;
        }
    }

    public function course_language_fetch()
    {

        $course_language_data = $this->db->query("SELECT * FROM `course_language`");

        $fetch = $course_language_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $course_language_data->result_array();
        } else {
            return false;
        }
    }

    public function fetch_courses()
    {

        $query = "SELECT * FROM `detail` WHERE mode = 'Online'";

        $result = $this->db->query($query);

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return [];
        }
    }

    public function course_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('detail');
    }


    public function course_update_data($data, $course_image)
    {
        $newdata = [
            'course_name' => $data['course_name'],
            'course_image' => $course_image,
            'author' => $data['author'],
            'mode' => $data['mode'],
            'lesson' => $data['lesson'],
            'duration' => $data['duration'],
            'category' => $data['category'],
            'language' => $data['language'],
            'base_price' => $data['base_price'],
            'seo_desc' => $data['seo_desc'],
            'seo_keywords' => $data['seo_keywords'],
            'seo_title' => $data['seo_title'],
            'long_description' => $data['long_description'],
            'status' => $data['status'],
        ];
        $this->db->where('id', $data['id']);
        return $this->db->update('detail', $newdata);
    }

    public function course_edit($id)
    {
        $result = $this->db->query("SELECT * FROM `detail` where id=$id");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function get_courses()
    {
        $result = $this->db->query("
        SELECT 
            detail.*, 
            course_category.category_name,
            COUNT(purchase.course_id) AS purchase_count
        FROM `detail`
        LEFT JOIN `course_category` ON detail.category = course_category.id
        LEFT JOIN `purchase` ON detail.id = purchase.course_id
        GROUP BY detail.id
        HAVING purchase_count > 0
        ORDER BY purchase_count DESC;
    ");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return [];
        }
    }

    public function course_enquiry_view()
    {
        $result = $this->db->query("SELECT * FROM `course_form_data` ORDER BY id DESC;");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function edit_course_enquiry($id)
    {
        $query = $this->db->get_where('course_form_data', ['id' => $id]);
        return $query->row();
    }

    public function update_course_enquiry($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('course_form_data', $data);
    }

    public function course_enquiry_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('course_form_data');
    }

}
