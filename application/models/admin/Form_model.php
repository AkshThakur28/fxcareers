<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // public function save_form_data($data) {
    //     return $this->db->insert('form_submissions', $data);
    // }
    public function save_form_data($data)
    {
        // $data['score'] = $score; // Add score to data array
        return $this->db->insert('form_submissions', $data);
    }

    public function get_questions()
    {
        // Example method to fetch questions from database
        $query = $this->db->get('questions'); // Replace 'questions' with your actual table name
        return $query->result();
    }

    public function get_score($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('results');
        return $query->row();
    }


    public function preffered_time_fetch()
    {
        $preffered_time_data = $this->db->query("SELECT * FROM `preffered_time`");

        if ($preffered_time_data->num_rows() > 0) {
            return $preffered_time_data->result_array();
        } else {
            return false;
        }
    }

    public function get_preffered_topic()
    {
        $preffered_time_data = $this->db->query("SELECT * FROM `preffered_topic`");

        if ($preffered_time_data->num_rows() > 0) {
            return $preffered_time_data->result_array();
        } else {
            return false;
        }
    }

    public function preffered_topic_fetch()
    {
        $topics = "";
        $preffered_topic_fetch_data = $this->db->get("preffered_topic")->result_array();
        foreach ($preffered_topic_fetch_data as $topic_data) {
            if ($this->input->post($topic_data['id'])) {
                if ($topics == "") {
                    $topics = $topic_data['topic_name'];
                } else {
                    $topics = $topics . ',' . $topic_data['topic_name'];
                }
            }
        }
    }

    public function append_insert($data)
    {
        return $this->db->insert('append_form_data', $data);
    }

    public function insert_dubai_forex_workshop_cms_prime_data($data)
    {
        return $this->db->insert('leads', $data);
    }

    public function form_view($period = 'all')
    {
        $query = "SELECT * FROM `form_submissions`";

        if ($period == 'monthly') {
            $startDate = date('Y-m-01');
            $endDate = date('Y-m-t');
            $query .= " WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
        } elseif ($period == 'weekly') {
            $startDate = date('Y-m-d', strtotime('monday this week'));
            $endDate = date('Y-m-d', strtotime('sunday this week'));
            $query .= " WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
        }

        $query .= " ORDER BY created_at DESC";

        $result = $this->db->query($query);

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return [];
        }
    }


    public function form_submission_edit($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('form_submissions');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function form_remark_update_data($data_fs)
    {
        $this->db->where('id', $data_fs['id']);
        if ($this->db->update('form_submissions', $data_fs)) {
            return true;
        } else {
            return false;
        }
    }
    public function purchase_fs_update_data($data_fs_purchase, $user_id)
    {
        $this->db->where('user_id', $user_id);
        if ($this->db->update('form_submissions', $data_fs_purchase)) {
            return true;
        } else {
            log_message('error', 'Form submission update failed. Query: ' . $this->db->last_query());
            return false;
        }
    }

    public function form_submission_update_data($data)
    {
        $this->db->where('id', $data['id']);
        if ($this->db->update('form_submissions', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function form_submission_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('form_submissions');
    }

}
