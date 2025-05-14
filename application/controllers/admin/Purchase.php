<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Purchase extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Purchase_model', 'Purchase_model');
        $this->load->model('admin/User_model', 'User_model');
        $this->load->model('admin/Curriculum_model', 'Curriculum_model');
        $this->load->database();
        $this->load->helper('url');
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


    public function add_purchase()
    {
        $this->restrict_to_role([1,4]);

        $id = $this->uri->segment(4);
        $data['form'] = $this->Purchase_model->form_data($id);
        $this->load->view('admin/include/header');
        $this->load->view('admin/purchase/enroll', $data);
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/footer');
    }

    public function view_purchased_course()
    {
        $this->restrict_to_role([1, 2]);

        $uid = $this->session->userdata('admin_id');
    
        $data['purchased_courses'] = $this->Purchase_model->purchased_courses($uid);
    
        $this->load->view('admin/include/header');
        $this->load->view('admin/purchase/my-courses', $data);
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/footer');
    }

    public function course_details()
    {
        $user_id = $this->session->userdata('admin_id');
        $data['purchased_courses'] = $this->Purchase_model->purchased_courses($user_id);

        $this->load->view('admin/include/header');
        $this->load->view('admin/purchase/course-detail', $data);
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/footer');
    }

    public function ffb_data()
    {
        $data['ffb_view'] = $this->Purchase_model->ffb_data();
        $data['view'] = 'admin/purchase/ffb';
        $this->load->view('admin/layout', $data);
    }

    public function purchase_submit_data()
    {
        $data = [];
        if ($this->input->post()) {
            $data = $this->input->post();
            if ($this->Purchase_model->purchase_submit_data($data) == true) {
                redirect("admin/purchase/purchase_view");
            } ?>
        <?php
        } else {
            $data['message'] = '<div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">
                                        &times;
                                    </a>
                                    <strong>Error!</strong>
                                    Sorry Please Try Again.
                                </div>';
        }
    }
    public function purchase_view()
    {
        $this->restrict_to_role([1, 2, 4]);

        $period = $this->input->get('period') ? $this->input->get('period') : 'all';
        $data['purchase_view'] = $this->Purchase_model->purchase_view($period);

        $this->load->view('admin/include/header');
        $this->load->view('admin/purchase/all-transactions', $data);
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/footer');
    }

    public function purchase_view_edit($user_id, $course_id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $user_id = $this->uri->segment(4);
            $course_id = $this->uri->segment(5);

            $data['purchase_view'] = $this->Purchase_model->purchase_view_edit($user_id, $course_id);

            $data['selected_course_id'] = $course_id;

            $this->load->view('admin/include/header');
            $this->load->view('admin/purchase/edit_purchase_view', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }


    public function purchase_view_update_data()
    {
        if ($this->input->post('submit')) {
            // Start the transaction
            $this->db->trans_start();

            // Map POST data to purchase table fields
            $data_purchase = array(
                'id' => $this->input->post('id'),
                'course_id' => $this->input->post('course_id'),
                'basic_amount' => $this->input->post('basic_amount'),
                'dis' => $this->input->post('dis'),
                'final_amount' => $this->input->post('final_amount'),
                'paid_amount' => $this->input->post('paid_amount'),
                'left_amount' => $this->input->post('left_amount'),
                'transaction_status' => ($this->input->post('left_amount') == 0) ? 'Paid' : 'Pending',
                'payment_mode' => $this->input->post('payment_mode'),
                'created_date' => date("Y-m-d H:i:s", strtotime($this->input->post('created_date'))),
                'updated_date' => date("Y-m-d H:i:s") // Automatically set updated date
            );

            // Update the purchase table
            if (!$this->Purchase_model->purchase_view_update_data($data_purchase)) {
                log_message('error', 'Purchase update failed for ID: ' . $data_purchase['id']);
            }

            // Process user data updates
            $user_id_u1 = $this->input->post('user_id'); // User 1
            $user_id_u2 = $this->input->post('created_by'); // User 2

            $data_user_u1 = $this->prepare_user_data($this->input->post('u1_username'));
            $data_user_u2 = $this->prepare_user_data($this->input->post('u2_username'));

            // Update users table
            $this->User_model->purchase_user_update_data($data_user_u1, $user_id_u1);
            $this->User_model->purchase_user_update_data($data_user_u2, $user_id_u2);

            // Update form submission data
            $data_fs_purchase = array(
                'first_name' => $data_user_u1['firstname'],
                'last_name' => $data_user_u1['lastname']
            );

            $this->Form_model->purchase_fs_update_data($data_fs_purchase, $user_id_u1);

            // Complete the transaction
            $this->db->trans_complete();

            // Handle transaction status
            if ($this->db->trans_status() === FALSE) {
                $data['message'] = '<div class="alert alert-danger"><strong>Error!</strong> Failed to update. Please try again.</div>';
            } else {
                redirect("admin/purchase/purchase_view");
            }
        } else {
            $data['message'] = '<div class="alert alert-danger"><strong>Error!</strong> Invalid request.</div>';
        }
    }

    private function prepare_user_data($username)
    {
        $first_name = '';
        $last_name = '';
        if (!empty($username)) {
            $name_parts = explode(' ', trim($username));
            $first_name = $name_parts[0];
            $last_name = isset($name_parts[1]) ? $name_parts[1] : '';
        }

        return array(
            'username' => $username,
            'firstname' => $first_name,
            'lastname' => $last_name
        );
    }


    public function purchase_view_delete()
    {
        $id = $this->uri->segment(4);
        if ($this->Purchase_model->purchase_view_delete($id) == true) {
            redirect("admin/purchase/purchase_view");
        }
    }


    public function payment_history()
    {
        $data['payment_history'] = $this->Purchase_model->payment_history();
        $this->load->view('admin/include/header');
        $this->load->view('admin/purchase/payment_history', $data);
        $this->load->view('admin/include/footer');
    }

    public function purchase_delete($id)
    {
        $id = $this->uri->segment(4);
        if ($this->Purchase_model->purchase_delete($id) == true) {
            redirect("admin/purchase/purchase_view");
        }
    }

    public function purchase_course()
    {
        $uid = $this->uri->segment(4);
        $course_id = $this->uri->segment(5);

        if (empty($course_id) || empty($uid)) {
            show_error('Invalid request');
            return;
        }

        $data['purchase_data'] = $this->Purchase_model->get_purchase_data($uid, $course_id);
        $data['purchase_course'] = $this->Purchase_model->purchase_course($uid, $course_id);
        $this->load->view('admin/include/header');
        $this->load->view('admin/purchase/user_view', $data);
        $this->load->view('admin/include/footer');
    }

    public function purchase_update_data()
    {
        $data = [];
        if ($this->input->post()) {
            $data = $this->input->post();
            if ($this->Purchase_model->purchase_update_data($data) == true) {
                redirect("admin/language/language_view");
            } ?>
        <?php
        } else {
            $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
        }
    }


    public function purchase_api($c_id, $uid)
    {
        $c_id = $this->uri->segment(4);
        $uid = $this->uri->segment(5);
        $data['curriculum_api'] = $this->Curriculum_model->curriculum_api($c_id, $uid);
        $data['view'] = 'admin/purchase/view';
        $this->load->view('admin/layout', $data);
    }

    public function invoice_receipt($user_id)
    {

        $user_id = $this->uri->segment(4);
        $data['payment'] = $this->Purchase_model->invoice_dtl($user_id);

        // $this->load->view('admin/purchase/invoice',$data);
        $this->load->library('pdf');
        $this->pdf->load_view('admin/purchase/invoice', $data);

        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->render();
        $this->pdf->stream("invoice.pdf");
    }

    public function send_invoice($id)
    {
        $data['payment'] = $this->Purchase_model->invoice_dtl($id);

        if (!empty($data['payment'])) {
            $user_email = $data['payment'][0]->user_email;

            $this->load->library('pdf');
            $this->pdf->load_view('admin/purchase/invoice', $data);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->render();

            $pdf_content = $this->pdf->output();

            $this->load->library('email');
            $this->email->from('no_reply@fxcareers.ae', 'FxCareers');
            $this->email->to($user_email);
            $this->email->subject('Invoice Receipt');
            $this->email->message('Please find your invoice attached.');

            $this->email->attach($pdf_content, 'application/pdf', 'invoice.pdf', false);

            if ($this->email->send()) {
                echo '<script type="text/javascript">
                alert("Invoice sent successfully!");
                window.location.href = "' . base_url('admin/purchase/purchase_view') . '";
            </script>';
            } else {
                show_error($this->email->print_debugger());
            }
        } else {
            echo '<script type="text/javascript">
            alert("Failed to send invoice: No data found.");
            window.location.href = "' . base_url('admin/purchase/purchase_view') . '";
        </script>';
        }
    }



    public function get_course_price()
    {
        // Ensure the request is POST
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $courseId = $this->input->post('course_id');

            // Check if course_id is sent and valid
            if ($courseId) {
                $coursePrice = $this->Purchase_model->get_course_price_function($courseId);

                // Check if course price is available and return in JSON format
                if ($coursePrice) {
                    echo json_encode(['price' => $coursePrice]);
                } else {
                    echo json_encode(['price' => 0]); // In case no price is found
                }
            } else {
                echo json_encode(['price' => 0]); // In case courseId is missing
            }
        }
    }




    function certificate_print($cid, $uid)
    {

        $cid = $this->uri->segment(4);
        $uid = $this->uri->segment(5);

        $data['payment_history'] = $this->Purchase_model->certificate_dtl($cid, $uid);
        //   print_r($data['payment_history']);
        //   die;
        // $this->load->view('admin/purchase/certificate',$data);
        $this->load->library('pdf');
        $this->pdf->load_view('admin/purchase/certificate', $data);
        $this->pdf->setPaper('A4', 'landscape');

        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->render();
        $this->pdf->stream("certificate.pdf");
    }

    public function export_csv()
    {
        $users = $this->Purchase_model->get_all_inquiries();

        $filename = 'enquiries_' . date('Ymd') . '.csv';

        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $file = fopen('php://output', 'w');

        $header = ['SR No.', 'Name', 'Email', 'Mobile No', 'Address', 'Preferred Topic', 'Preferred Timing', 'Know about FxCareers', 'Score'];
        fputcsv($file, $header);

        $sr_no = 1;
        foreach ($users as $user) {
            $csvData = [
                $sr_no++,
                $user['first_name'] . ' ' . $user['last_name'],
                $user['email_address'],
                $user['phone_number'],
                $user['address'],
                $user['product_purchase'],
                $user['address_state'],
                $user['product_satisfaction'],
                $user['score'],
            ];
            fputcsv($file, $csvData);
        }

        fclose($file);
        exit;
    }

    public function export_json()
    {
        $users = $this->Purchase_model->get_all_inquiries();

        header("Content-Type: application/json");
        echo json_encode($users);
    }

    public function export_csv_view()
    {
        $views = $this->Purchase_model->purchase_view();

        if (empty($views)) {
            die("No data available for export.");
        }

        if (ob_get_level()) {
            ob_end_clean();
        }
        ob_start();

        $filename = 'enquiries_' . date('Ymd') . '.csv';

        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; charset=UTF-8");

        $file = fopen('php://output', 'w');

        $header = ['SR No.', 'Name', 'Course Name', 'Amount', 'Total Paid', 'Balance', 'Payment Status'];
        fputcsv($file, $header);

        $sr_no = 1;
        foreach ($views as $view) {
            $csvData = [
                $sr_no++,
                isset($view->username) ? $view->username : '',
                isset($view->course_name) ? $view->course_name : '',
                isset($view->amount) ? $view->amount : 0,
                isset($view->paid_amount) ? $view->paid_amount : 0,
                isset($view->left_amount) ? $view->left_amount : 0,
                isset($view->transaction_status) ? $view->transaction_status : 'N/A',
            ];
            fputcsv($file, $csvData);
        }

        fclose($file);

        ob_flush();
        exit;
    }


    public function export_json_view()
    {
        $views = $this->Purchase_model->purchase_view();

        header("Content-Type: application/json");
        echo json_encode($views);
    }

}
?>