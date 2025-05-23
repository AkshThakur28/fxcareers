<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Curriculum extends MY_Controller
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
        $this->load->model('admin/Curriculum_model', 'Curriculum_model');
        $this->load->helper('security');

        date_default_timezone_set('Asia/Kolkata');
    }

    public function add_curriculum()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->load->view('admin/include/header');
            $this->load->view('admin/curriculum/add_curriculum');
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function curriculum_submit_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $data = $this->input->post();
                if ($this->Curriculum_model->curriculum_data_submit($data)) {
                    redirect("admin/curriculum/curriculum_view");
                } else {
                    $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
                }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function curriculum_view()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $data['curriculum_view'] = $this->Curriculum_model->curriculum_view();
            $this->load->view('admin/include/header');
            $this->load->view('admin/curriculum/view_curriculum', $data);
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function curriculum_edit($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $data['view_curriculum'] = $this->Curriculum_model->curriculum_edit($id);
            $this->load->view('admin/include/header');
            $this->load->view('admin/curriculum/edit_curriculum', $data);
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function curriculum_update_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $data = $this->input->post();
                if ($this->Curriculum_model->curriculum_update_data($data)) {
                    redirect("admin/curriculum/curriculum_view");
                } else {
                    $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
                }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function curriculum_delete($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            if ($this->Curriculum_model->curriculum_delete($id)) {
                redirect("admin/curriculum/curriculum_view");
            }
        } else {
            redirect('admin/auth/login');
        }
    }
    public function fetch_topic()
    {
        
        if ($this->input->post('course_id')) {
            echo $this->Curriculum_model->fetch_topic($this->input->post('course_id'));
        }
    }
    
}
?>
