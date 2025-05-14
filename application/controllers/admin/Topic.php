<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topic extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('admin/Topic_model', 'Topic_model');
        $this->load->model('admin/Enquiry_model', 'Enquiry_model');
        $this->load->helper('security');

        date_default_timezone_set('Asia/Kolkata');
    }

    public function add_topic()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->load->view('admin/include/header');;
            $this->load->view('admin/topic/add_topic');
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }

    public function topic_submit_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $data = $this->input->post();
                if ($this->Topic_model->topic_data_submit($data)) {
                    redirect("admin/topic/topic_view");
                } else {
                    $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
                }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function topic_view()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $data['topic_view'] = $this->Topic_model->topic_view();
            $this->load->view('admin/include/header');;
            $this->load->view('admin/topic/view_topic', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }

    public function topic_edit($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $data['view_topic'] = $this->Topic_model->topic_edit($id);
            $this->load->view('admin/include/header');;
            $this->load->view('admin/topic/edit_topic', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }

    public function topic_update_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $data = $this->input->post();
                if ($this->Topic_model->topic_update_data($data)) {
                    redirect("admin/topic/topic_view");
                } else {
                    $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
                }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function topic_delete($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            if ($this->Topic_model->topic_delete($id)) {
                redirect("admin/topic/topic_view");
            }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function export_csv()
	{
        ob_clean(); 

		$follow_up = $this->Enquiry_model->follow_up_view();

        $filename = 'remark_data_' . date('Y-m-d') . '.csv';

		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: text/csv; charset=utf-8");

		$file = fopen('php://output', 'w');

		$header = ['SR No.', 'Username', 'Remark', 'Remark By', 'Remark Date'];
		fputcsv($file, $header);

		$sr_no = 1;
		foreach ($follow_up as $follow) {
            $csvData = [
                $sr_no++,
                $follow->first_name . ' ' . $follow->last_name,
                $follow->remark,
                $follow->user_id,
                $follow->remark_date,
            ];
            fputcsv($file, $csvData);
        }

		fclose($file);
		exit;
	}

    public function export_json()
	{
		$follow_up = $this->Enquiry_model->follow_up_view();

		header("Content-Type: application/json");
		echo json_encode($follow_up);
		exit;
	}
}
?>
