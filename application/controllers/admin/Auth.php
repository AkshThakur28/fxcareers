<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Auth_model', 'Auth_model');
        $this->load->model('admin/User_model', 'User_model');
        $this->load->library('session');
        // $this->load->library('firebase');
    }

    // Phone verification
    public function verify_phone()
    {
        $phone = $this->input->post('phone');

        try {
            $auth = $this->firebase->getAuth();
            // Send OTP for phone verification (uses ReCaptcha on the frontend)
            $phoneAuth = $auth->sendPhoneVerificationCode($phone);

            echo "OTP sent to {$phone}. Please check your SMS.";
        } catch (\Kreait\Firebase\Exception\Auth\AuthError $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function index()
    {

        if ($this->session->has_userdata('is_admin_login')) {
            redirect('admin/dashboard');

        } else {
            redirect(base_url('login'));
        }
    }

    public function login()
    {

        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                redirect(base_url('login'));
            } else {

                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );

                $result = $this->Auth_model->login($data);

                if ($result == TRUE) {

                    $admin_data = array(

                        'admin_id' => $result['id'],

                        'username' => $result['username'],

                        'name' => $result['firstname'] . '&nbsp;' . $result['lastname'],

                        'role' => $result['is_admin'],

                        'role_name' => $result['role_name'],

                        'refer_code' => $result['refer_code'],

                        'is_admin_login' => TRUE

                    );
                    $this->session->set_userdata($admin_data);
                    redirect(base_url('admin/dashboard'), 'refresh');

                } else {
                    $this->session->set_flashdata('msg', 'Invalid Email or Password!');
                    redirect(base_url('login'), $data);
                }
            }
        } else {
            redirect(base_url('login'));
        }
    }


    public function forgot_password()
    {

        if ($this->input->post('submit')) {
            $email = $this->input->post('email');
            $this->session->set_userdata('email', $email);

            $user = $this->User_model->get_user_by_email($email);
            if ($user) {
                $otp = random_int(100000, 999999);

                $this->session->set_userdata('otp', $otp);
                $this->session->set_userdata('otp_expiration', time() + 600);

                $message = 'Your OTP for password reset is: ' . $otp . '. This OTP is valid for 10 minutes.';

                $this->load->library('email');

                $this->email->from('no_reply@fxcareers.ae', 'FXCareer');
                $this->email->to($email);
                $this->email->subject('Password Reset OTP');
                $this->email->message($message);

                if ($this->email->send()) {
                    $this->session->set_flashdata('info', 'An OTP has been sent to ' . $email . '. Please enter it below.');
                    redirect(base_url('verify-otp'));
                } else {
                    echo $this->email->print_debugger();
                    exit;
                }
            } else {
                $this->session->set_flashdata('msg', 'Email not found!');
            }

            redirect(base_url('forgot-password'));
        } else {
            redirect(base_url('forgot-password'));
        }
    }

    public function verify_otp()
    {
        if ($this->input->post('submit')) {
            $entered_otp = $this->input->post('otp');
            $stored_otp = $this->session->userdata('otp');
            $otp_expiration = $this->session->userdata('otp_expiration');

            if (time() > $otp_expiration) {
                $this->session->set_flashdata('msg', 'OTP has expired! Please request a new one.');
                redirect(base_url('forgot-password'));
            }

            if ($entered_otp == $stored_otp) {
                $this->session->set_flashdata('info', 'OTP verified successfully! You can now reset your password.');

                redirect(base_url('change-password'));
            } else {
                $this->session->set_flashdata('msg', 'Invalid OTP! Please try again.');
                redirect(base_url('verify-otp'));
            }
        } else {
            redirect(base_url('verify-otp'));
        }
    }

    public function update_password()
    {

        $email = $this->session->userdata('email');

        if (!$email) {
            $this->session->set_flashdata('msg', 'Session expired! Please try the forgot password process again.');
            redirect(base_url('forgot_password'));
        }

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg', 'Password and Confirm Password do not match!');
                redirect(base_url('update-password'));
            } else {
                $data = array(
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
                );
                $this->Auth_model->update_password($email, $data);

                $this->session->unset_userdata('reset_email');
                $this->session->unset_userdata('otp');
                $this->session->unset_userdata('otp_expiration');

                $this->session->set_flashdata('msz', 'Password has been reset successfully!');
                redirect(base_url('login'));
            }
        } else {
            redirect(base_url('forgot-password'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'), 'refresh');
    }

    public function process_login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->resolve_user_login($email, $password);

            if ($user) {
                $user_data = array(
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($user_data);

                redirect('admin/dashboard');
            } else {
                $data['msg'] = 'Invalid email or password';
                redirect('login');
            }
        }
    }
}
?>