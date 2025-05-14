<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Purchase_model');
        $this->load->model('admin/Course_model');
        $this->load->model('admin/Mentors_model');
        $this->load->database();
    }


    public function index()
    {
        if ($this->session->has_userdata('is_admin_login')) {

            $data['total_purchase'] = $this->Purchase_model->totalPurchase();
            $data['total_enquiries'] = $this->Purchase_model->totalEnquiry();
            $data['total_income'] = $this->Purchase_model->total_income();
            $data['total_follow_up'] = $this->Purchase_model->totalFollowUp();
            $data['top_courses'] = $this->Course_model->get_courses();
            $data['courses_purchased'] = $this->Purchase_model->purchase_view_dashboard();
            $data['all_mentors'] = $this->Mentors_model->mentor_view();
            $this->load->view('admin/include/header');
            $this->load->view('admin/dashboard/index', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

}
?>