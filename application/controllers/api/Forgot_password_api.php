<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Forgot_password_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Authorization_Token');
        $this->load->model('admin/Auth_model', 'Auth_model');
        $this->load->model('admin/course_model', 'course_model');
        $this->load->model('admin/detail_model', 'detail_model');
        $this->load->model('admin/curriculum_model', 'curriculum_model');
        $this->load->model('admin/topic_model', 'topic_model');
        $this->load->library('email'); 
    }

    public function forgot_password_post()
    {
        $email = $this->input->post('email');
        // $this->session->set_userdata('email', $email);
        // $token = 'abc123';

        if (!empty($email)) {
            $user = $this->Auth_model->get_user_by_email($email);

            if ($user) {
                $otp = rand(100000, 999999);
                $otp_expiration = time() + (5 * 60);  //  5 minutes
                $created_at = time();

                $data = array(
                    'email' => $email,
                    'otp' => $otp,
                    'otp_expiration' => $otp_expiration,
                    // 'token' => $token,
                    'created_at' => $created_at
                );
                $this->Auth_model->save_otp_data($data);

                // $this->session->set_userdata('otp', $otp);
                // $this->session->set_userdata('otp_expiration', $otp_expiration);
                if ($this->send_otp_email($email, $otp)) {
                    $this->response(['status' => true, 'message' => 'OTP sent to email'], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['status' => false, 'message' => 'Failed to send OTP'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
            } else {
                $this->response(['status' => false, 'message' => 'Email not found'], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(['status' => false, 'message' => 'Email is required'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function verify_otp_post()
    {
        $entered_otp = $this->input->post('entered_otp');
        $email = $this->input->post('email');

        if (empty($entered_otp) || empty($email)) {
            $this->response(['status' => false, 'message' => 'OTP is required'], REST_Controller::HTTP_BAD_REQUEST);
            return; 
        }

        $user_data = $this->Auth_model->get_otp_data($email, $entered_otp);

        if ($user_data) {
            $otp = $user_data['otp']; 
            $otp_expiration = $user_data['otp_expiration']; 

            if (time() > $otp_expiration) {
                $this->response(['status' => false, 'message' => 'OTP has expired'], REST_Controller::HTTP_UNAUTHORIZED);
                return; 
            }

            if ($otp == $entered_otp) {
                $this->response(['status' => true, 'message' => 'OTP verified successfully'], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => false, 'message' => 'Invalid OTP'], REST_Controller::HTTP_UNAUTHORIZED);
            }
        } else {
            $this->response(['status' => false, 'message' => 'No matching OTP found for the provided email'], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function confirm_password_post()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_pwd');

        if (!empty($password) && !empty($confirm_password)) {
            if ($this->validate_password_confirmation($password, $confirm_password)) {

                $data = array(
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
                );
                $this->Auth_model->update_password($email, $data);

                $this->response(['status' => true, 'message' => 'Password updated successfully'], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => false, 'message' => 'Password and confirm password do not match'], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response(['status' => false, 'message' => 'Password is required'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    private function validate_password_confirmation($password, $confirm_password)
    {
        return $password === $confirm_password;
    }

    private function send_otp_email($email, $otp)
    {
        $this->email->from('no_reply@fxcareers.com', 'FXCareer');
        $this->email->to($email);

        $this->email->subject('Your OTP for Password Reset');
        $message = '<p>Dear User,</p>';
        $message .= '<p>Your OTP for resetting your password is: <strong>' . $otp . '</strong></p>';
        $message .= '<p>Please use this OTP to reset your password.</p>';
        $message .= '<br><p>Regards,<br>FXCareer</p>';

        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            log_message('error', $this->email->print_debugger());
            return false;
        }
    }
}
