<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_history extends MY_Controller
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
        $this->load->model('admin/Login_history_model', 'Login_history_model');
        $this->load->helper('security');

        date_default_timezone_set('Asia/Kolkata');
    }

    protected function restrict_to_role($required_role)
    {
        if ($this->session->userdata('role') != $required_role) {
            show_error('You do not have permission to access this page.', 403);
        }
    }

    public function view_login_history()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role(1);

            $data['login_history_view'] = $this->Login_history_model->view_login_history();
            $this->load->view('admin/include/header');
            $this->load->view('admin/login-history/all-login-history', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function delete_login_history($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role(1);

            $id = $this->uri->segment(4);

            if ($this->Login_history_model->delete_login_history($id) == true) {
                redirect("admin/login_history/view_login_history");
            }
        } else {
            redirect('admin/auth/login');
        }
    }

}