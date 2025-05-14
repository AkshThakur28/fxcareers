<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_us extends MY_Controller
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
        $this->load->model('admin/Contact_us_model', 'Contact_us_model');
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


    public function view_contact_us()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            $data['view_contact_details'] = $this->Contact_us_model->contact_view();
            $this->load->view('admin/include/header');
            $this->load->view('admin/contact-us/view-contact-us', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }

    public function edit_contact_enquiries()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            $id = $this->uri->segment(4);

            $data['edit_contact_enquiry'] = $this->Contact_us_model->edit_contact_enquiry($id);
            $this->load->view('admin/include/header');
            $this->load->view('admin/contact-us/edit-contact-enquiry', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }

    public function contact_enquiries_update_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            if ($this->input->post('submit')) {
                $data = array(
                    'id' => $this->input->post('id'),
                    'username' => $this->input->post('username'),
                    'mobile_no' => $this->input->post('mobile_no'),
                    'email' => $this->input->post('email'),
                    'message' => $this->input->post('message'),
                    'subject' => $this->input->post('subject'),
                    'location' => $this->input->post('location'),
                );

                $result = $this->Contact_us_model->update_contact_enquiry($data);
                if ($result) {
                    redirect('admin/contact_us/view_contact_us');
                }
            }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function delete_contact_us($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            $id = $this->uri->segment(4);

            if ($this->Contact_us_model->contact_us_delete($id) == true) {

                redirect("admin/contact_us/view_contact_us");
            }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function get_contact_by_id($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            $id = $this->uri->segment(4);

            if ($this->Contact_us_model->fetch_contact_by_id($id) == true) {

                redirect("admin/contact_us/view_contact_us");
            }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function export_csv()
    {
        ob_clean();

        $contacts = $this->Contact_us_model->contact_view();

        $filename = 'contact_us_data_' . date('Y-m-d') . '.csv';

        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: text/csv; charset=utf-8");

        $file = fopen('php://output', 'w');

        $header = ['SR No.', 'Username', 'Mobile No', 'Email', 'Message', 'Subject', 'Location'];
        fputcsv($file, $header);

        $sr_no = 1;
        foreach ($contacts as $contact) {
            $csvData = [
                $sr_no++,
                $contact->username,
                $contact->mobile_no,
                $contact->email,
                $contact->message,
                $contact->subject,
                $contact->location,
            ];
            fputcsv($file, $csvData);
        }

        fclose($file);
        exit;
    }

    public function export_json()
    {
        $contacts = $this->Contact_us_model->contact_view();

        header("Content-Type: application/json");
        echo json_encode($contacts);
        exit;
    }

}