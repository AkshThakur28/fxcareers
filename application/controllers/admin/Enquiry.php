<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enquiry extends MY_Controller
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
        $this->load->model('admin/Enquiry_model', 'Enquiry_model');
        $this->load->helper('security');

        date_default_timezone_set('Asia/Kolkata');
    }

    protected function restrict_to_role($required_roles)
    {
        $user_role = $this->session->userdata('role');

        if (is_array($required_roles)) {
            if (!in_array($user_role, $required_roles)) {
                show_error('You do not have permission to access this page.', 403);
            }
        } else {
            if ($user_role != $required_roles) {
                show_error('You do not have permission to access this page.', 403);
            }
        }
    }


    public function view_enquiries()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            $data['enquiry_view'] = $this->Enquiry_model->enquiry_view();
            $this->load->view('admin/include/header');
            $this->load->view('admin/enquiries/enquiries', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }

    public function edit_enquiries()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            $id = $this->uri->segment(4);

            $data['edit_enquiry'] = $this->Enquiry_model->edit_enquiry($id);
            $this->load->view('admin/include/header');
            $this->load->view('admin/enquiries/edit-enquiries', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }

    public function enquiries_update_data()
    {
        if ($this->input->post('submit')) {
            $this->restrict_to_role([1, 4]);

            $id = $this->input->post('id');

            $existing_data = $this->Enquiry_model->edit_enquiry($id);
            if (!$existing_data) {
                $data['message'] = '<div class="alert alert-danger">Record not found.</div>';
                return;
            }

            $selected_topics = $this->input->post('topics');

            $data = [
                'id' => $id,
                'first_name' => $this->input->post('first_name') ?: $existing_data->first_name,
                'last_name' => $this->input->post('last_name') ?: $existing_data->last_name,
                'email_address' => $this->input->post('email_address') ?: $existing_data->email_address,
                'phone_number' => $this->input->post('phone_number') ?: $existing_data->phone_number,
                'address' => $this->input->post('address') ?: $existing_data->address,
                'product_purchase' => is_array($selected_topics) && count($selected_topics) > 0
                    ? implode(', ', $selected_topics)
                    : $existing_data->product_purchase,
            ];

            $result = $this->Enquiry_model->update_enquiry($data);
            if ($result) {
                redirect("admin/enquiry/view_enquiries");
            } else {
                $data['message'] = '<div class="alert alert-danger">Error! Please try again.</div>';
            }
        } else {
            $data['message'] = '<div class="alert alert-danger">Invalid request.</div>';
        }
    }

    public function delete_enquiries()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            $id = $this->uri->segment(4);

            if ($this->Enquiry_model->enquiry_delete($id) == true) {

                redirect("admin/enquiry/view_enquiries");
            }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function view_follow_up()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            $data['follow_up_view'] = $this->Enquiry_model->follow_up_view();
            $this->load->view('admin/include/header');
            $this->load->view('admin/enquiries/follow-up', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }

    public function followup_submit()
    {
        $data = [];
        if ($this->input->post('submit')) {
            $data = array(
                'form_id' => $this->input->post('form_id'),
                'form_userid' => $this->input->post('form_userid'),
                'user_id' => $this->input->post('user_id'),
                'remark' => $this->input->post('remark'),
                'remark_date' => $this->input->post('remark_date'),
            );
            $result = $this->Enquiry_model->follow_up($data);
            if ($result) {

                echo '<script type="text/javascript">
                            alert("Submitted Successfully!");
                        </script>';
                redirect("admin/enquiry/view_follow_up");
            } else {
                echo '<script type="text/javascript">
                            alert("Error!");
                        </script>';
                redirect("admin/enquiry/view_enquiries");
            }
        } else {
            $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
        }
    }

    public function export_csv()
    {
        ob_clean();

        $enquiries = $this->Enquiry_model->enquiry_view();

        $filename = 'enquiries_' . date('Y-m-d') . '.csv';

        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: text/csv; charset=utf-8");

        $file = fopen('php://output', 'w');

        $header = ['SR No.', 'Full Name', 'Mobile No', 'Email', 'Address'];
        fputcsv($file, $header);

        $sr_no = 1;
        foreach ($enquiries as $enquiry) {
            $csvData = [
                $sr_no++,
                $enquiry->first_name . ' ' . $enquiry->last_name,
                $enquiry->phone_number,
                $enquiry->email_address,
                $enquiry->address
            ];
            fputcsv($file, $csvData);
        }

        fclose($file);
        exit;
    }

    public function export_json()
    {
        $enquiries = $this->Enquiry_model->enquiry_view();

        header("Content-Type: application/json");
        echo json_encode($enquiries);
        exit;
    }

}