<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->model('admin/Profile_model', 'Profile_model');
        $this->load->helper('security');
    }

    public function view_profile() 
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $admin_id = $this->session->userdata('admin_id');
            $data['profile_view'] = $this->Profile_model->profile_view($admin_id);
            $this->load->view('admin/include/header');
            $this->load->view('admin/profile/profile', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function update_profile()
{
    if ($this->session->has_userdata('is_admin_login')) {
        if ($this->input->post()) {
            $data_users = array(
                'id' => $this->input->post('id'),
                'username' => $this->input->post('firstname') . ' ' . $this->input->post('lastname'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'mobile_no' => $this->input->post('mobile_no'),
                'is_admin' => $this->input->post('user_role'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');

            if (!empty($password) && !empty($confirm_password)) {
                if ($password === $confirm_password) {
                    $data_users['password'] = password_hash($password, PASSWORD_DEFAULT); 
                } else {
                    $this->session->set_flashdata('error', 'Passwords do not match.');
                    redirect('admin/profile');
                }
            }

            if (($this->Profile_model->update_profile($data_users))) {
                $this->session->set_flashdata('success', 'Profile updated successfully.');
                redirect('admin/profile/view_profile');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile.');
                redirect('admin/profile');
            }
        }
    } else {
        redirect('admin/auth/login');
    }
}

public function update_personal_info()
{
    if ($this->session->has_userdata('is_admin_login')) {
        if ($this->input->post()) {
            $data = array(
                'user_id' => $this->input->post('id'),
                'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'bio' => $this->input->post('bio'),
            );

            if ($this->Profile_model->update_personal_info($data)) {
                $this->session->set_flashdata('success', 'Profile updated successfully.');
                redirect('admin/profile/view_profile');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile.');
                redirect('admin/profile');
            }
        }
    } else {
        redirect('admin/auth/login');
    }
}

public function update_address_info()
{
    if ($this->session->has_userdata('is_admin_login')) {
        if ($this->input->post()) {
            $data = array(
                'user_id' => $this->input->post('id'),
                'country' => $this->input->post('country'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'pin' => $this->input->post('pin'),
                'address' => $this->input->post('address'),
            );

            if ($this->Profile_model->update_address_info($data)) {
                $this->session->set_flashdata('success', 'Profile updated successfully.');
                redirect('admin/profile/view_profile');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile.');
                redirect('admin/profile');
            }
        }
    } else {
        redirect('admin/auth/login');
    }
}

public function update_socials()
{
    if ($this->session->has_userdata('is_admin_login')) {
        if ($this->input->post()) {
            $data = array(
                'user_id' => $this->input->post('id'),
                'facebook' => $this->input->post('facebook'),
                'instagram' => $this->input->post('instagram'),
                'twitter' => $this->input->post('twitter'),
                'linkedin' => $this->input->post('linkedin'),
            );

            if ($this->Profile_model->update_socials($data)) {
                $this->session->set_flashdata('success', 'Profile updated successfully.');
                redirect('admin/profile/view_profile');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile.');
                redirect('admin/profile');
            }
        }
    } else {
        redirect('admin/auth/login');
    }
}

}
