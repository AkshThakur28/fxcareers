<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Website extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Auth_model', 'Auth_model');

        $this->load->model('admin/gallery_model', 'gallery_model');
        $this->load->model('admin/detail_model', 'detail_model');

        $this->load->model('admin/curriculum_model', 'curriculum_model');
        $this->load->model('admin/topic_model', 'topic_model');

        $this->load->model('admin/ebook_model', 'ebook_model');
        $this->load->model('admin/User_model', 'User_model');
        $this->load->model('admin/Mentors_model', 'Mentors_model');
        $this->load->model('admin/Form_model', 'Form_model');
        $this->load->model('admin/One_to_one_session_model', 'One_to_one_session_model');

        $this->load->model('admin/Seo_model', 'Seo_model');
        $this->load->model('admin/Blog_model', 'Blog_model');
        $this->load->model('admin/Questions_model', 'Questions_model');
        $this->load->model('admin/Career_detail_model', 'Career_detail_model');
        $this->load->model('admin/Career_model', 'Career_model');

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();

    }

    public function google_reviews()
    {
        $place_id = 'ChIJYa3N6ohDXz4RhM228l4HQyc';
        $api_key = 'AIzaSyBTKACopk-PO6srB5kmejq6ANln5HBcbAs';
        $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$place_id&fields=reviews,rating&key=$api_key";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data['reviews'] = [];
        $result = json_decode($response, true);

        if (isset($result['result']['reviews'])) {
            $data['reviews'] = $result['result']['reviews'];
        }

        $this->load->view('reviews_view', $data);
    }



    public function index()
    {
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $data['all_blogs'] = $this->Blog_model->fetch_all_blogs();
        $data['teachers'] = $this->Mentors_model->mentor_view_limit(3);
        $data['course_categories'] = $this->db->get('course_category')->result();
        $data['course_details_view'] = $this->detail_model->online_course();

        $this->load->view('frontend/include/header');
        $this->load->view('frontend/index', $data);
        $this->load->view('frontend/include/footer', $data);
    }
    public function results()
    {
        $data['db_score'] = $this->Questions_model->get_latest_score();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $data['teachers'] = $this->teacher_model->teacher();
        $data['blog_detail_view'] = $this->blog_detail();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/results', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }

    public function about()
    {
        $data['mentors'] = $this->Mentors_model->mentor_view();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $data['course_details_view'] = $this->detail_model->online_course_index();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/about', $data);
        $this->load->view('frontend/include/footer', $data);
    }
    public function one_to_one_session()
    {
        $data['one_to_one_session_view'] = $this->One_to_one_session_model->one_to_one_session_view();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/session', $data);
        $this->load->view('frontend/include/footer', $data);
    }
    public function book_slot()
    {
        if (($this->session->userdata('admin_id') != '')) {
            $data['gallery_view'] = $this->gallery_model->gallery();
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/book-slot');
            $this->load->view('frontend/include/newsletter');
            $this->load->view('frontend/include/footer', $data);
        } else {
            echo '<script type="text/javascript">
            alert("Please Register or Login your self");
            
        </script>';

            redirect(base_url('register'));
        }
    }

    public function session_submit_data()
    {
        $this->form_validation->set_rules('username', 'Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Phone', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[book_session.email]');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $data['gallery_view'] = $this->gallery_model->gallery();
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/session', $data);
            $this->load->view('frontend/include/footer', $data);
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'message' => $this->input->post('message'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),

            );

            if ($this->db->insert('book_session', $data)) {
                redirect('thank-you');
            } else {
                echo "<script>
                    alert('An error occurred. Please try again.');
                    window.location.href = '" . base_url('website/session') . "';
                </script>";
            }
        }
    }

    public function form_to()
    {
        redirect(base_url('enquiry'));
    }

    public function become_partner()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/beapartner');
        $this->load->view('frontend/include/footer', $data);
    }

    public function webinar()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/webinar');
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }
    public function holiday_festivals()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/holiday-festivals');
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }
    public function tradersfloor()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/tradersfloor');
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }
    public function slot()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/slot');
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }
    public function counsellor()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/counsellor');
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }

    public function verify_phone()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/verify_phone');
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }

    public function eye_opener()
    {
        $data['trade_idea_view'] = $this->trade_idea_model->trade_idea_view();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $data['eyeopener_view'] = $this->Eyeopener_model->eyeopener_view();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/eye-opener', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }

    public function eyeopener_lead_data()
    {
        $data = [];
        if ($this->input->post('submit')) {
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $session_mode = $this->input->post('session_mode');
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'session_mode' => $this->input->post('session_mode'),
                'mobile_no' => $this->input->post('mobile_no'),
                'eyeopener_id' => $this->input->post('eyeopener_id'),
            );
            $result = $this->Eyeopener_model->eyeopener_lead_submit($data);

            if ($result === true) {
                $this->sendWebhook($data);
                $mail_data = array(
                    'name' => $this->input->post('name'),
                );
                $message = $this->load->view('frontend/mailer/free-seminar-thank-you', $mail_data, TRUE);
                $this->load->library('email');
                $this->email->set_newline("\r\n");
                $this->email->from('no_reply@fxcareers.ae', 'FXCareers');
                $this->email->to($email);
                $this->email->subject('Registration Successful');
                $this->email->message($message);
                if ($this->email->send()) {
                    echo '<script type="text/javascript">
                        alert("Thank you for registration!");
                    </script>';
                } else {
                    show_error($this->email->print_debugger());
                }
                redirect(base_url());
            }
        } else {
            $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
        }
    }

    public function black_friday()
    {
        $data = [];

        // Check if the form is submitted
        if ($this->input->post('submit')) {
            // Prepare the data to be inserted into the database
            $data = array(
                'name' => $this->input->post('first_name') . ' ' . $this->input->post('last_name'), // Concatenate first and last name
                'email' => $this->input->post('email'),
                'source' => 'landing page',
                'campaign' => 'Black friday', // Fix typo: 'campaing' should be 'campaign'
                'mobile' => $this->input->post('mobile'),
            );

            // Insert data into the 'leads' table
            $result = $this->db->insert('leads', $data);

            // Check if the insertion was successful
            if ($result) {
                // Send webhook (if necessary, make sure 'sendWebhook' is a valid method in your controller)
                $this->sendWebhook($data);

                // Prepare email data
                $mail_data = array(
                    'name' => $data['name'],
                );

                // Load the email view (hi.php) and pass the $mail_data
                $message = $this->load->view('hi', $mail_data, TRUE);

                // Load the email library
                $this->load->library('email');
                $this->email->set_newline("\r\n");

                // Set email parameters
                $this->email->from('no_reply@fxcareers.ae', 'FXCareers');
                $this->email->to($data['email']); // Send email to the user's email
                $this->email->subject('Registration Successful');
                $this->email->message($message);

                // Send the email and check for success
                if ($this->email->send()) {
                    // Success: Display success message and redirect
                    echo '<script type="text/javascript">
                    alert("Thank you for registration!");
                    window.location.href = "' . base_url() . '";
                </script>';
                } else {
                    // Failure: Show email error message
                    show_error($this->email->print_debugger());
                }
            } else {
                // Database insertion failed, show an error message
                $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry, please try again.</div>';
            }
        } else {
            // If form wasn't submitted, show an error message
            $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry, please try again.</div>';
        }

        // Optionally, load a view here to display the form and message if necessary
        // $this->load->view('form_view', $data);
    }



    public function trade_idea()
    {
        $data['trade_idea_view'] = $this->trade_idea_model->trade_idea_view();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/trade-idea', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }
    public function trade_idea_detail()
    {
        $data['trade_idea_detail'] = $this->trade_idea_model->trade_idea_data_nm();
        $data['trade_ideas'] = $this->trade_idea_model->get_recent_trade_idea(3);
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/trade-idea-detail', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }
    public function e_books()
    {
        $data['ebook_view'] = $this->ebook_model->ebook_view();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/e-books', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }
    public function login()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/login');
        $this->load->view('frontend/include/footer', $data);
    }
    public function register()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/register', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }

    public function forgot_password()
    {

        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/forget-password', $data);
        $this->load->view('frontend/include/footer', $data);
    }

    public function verify_otp()
    {

        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/verify-otp', $data);
        $this->load->view('frontend/include/footer', $data);
    }


    public function change_password()
    {

        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/change-password', $data);
        $this->load->view('frontend/include/footer', $data);
    }
    public function gallery()
    {
        $data['event_galleries'] = $this->gallery_model->get_all_event_groups();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/gallery', $data);
        $this->load->view('frontend/include/footer');
    }

    public function contact()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/contact');
        $this->load->view('frontend/include/footer', $data);
    }

    public function contact_us_submit_data()
    {
        if ($this->input->post()) {
            $data = [
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'mobile_no' => $this->input->post('mobile_no', true),
                'location' => $this->input->post('location', true),
                'subject' => $this->input->post('subject', true),
                'message' => $this->input->post('message', true),
            ];

            if ($this->db->insert('contact', $data)) {
                $this->session->set_flashdata('js_alert', 'success');
            } else {
                $this->session->set_flashdata('js_alert', 'error');
            }

            redirect(base_url('contact'));
        }
    }

    public function blog()
    {
        $limit = 6;
        $page = $this->input->get('page');
        $offset = ($page && is_numeric($page)) ? ($page - 1) * $limit : 0;

        $total_blogs = $this->db->count_all('blog_detail');

        $this->db->select('blog_detail.*, blog_category.category AS blog_category');
        $this->db->from('blog_detail');
        $this->db->join('blog_category', 'blog_detail.blog_category = blog_category.id', 'left');
        $this->db->order_by('blog_detail.id', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $blogs = $query->result();

        $data['all_blogs'] = $blogs;
        $data['total_blogs'] = $total_blogs;
        $data['limit'] = $limit;
        $data['blog_categories'] = $this->Blog_model->blog_category_fetch();
        $data['gallery_view'] = $this->gallery_model->gallery();

        $this->load->view('frontend/include/header');
        $this->load->view('frontend/blog', $data);
        $this->load->view('frontend/include/footer');
    }

    public function fetch_paginated_blogs()
    {
        $page = $this->input->post('page');
        $category = $this->input->post('category');
        $limit = 6;
        $offset = ($page - 1) * $limit;

        if ($category && $category !== 'all') {
            $this->db->where('blog_category', $category);
        }

        $query = $this->db->get('blog_detail', $limit, $offset);
        $blogs = $query->result();

        if ($category && $category !== 'all') {
            $this->db->where('blog_category', $category);
        }
        $total_blogs = $this->db->count_all_results('blog_detail');

        echo json_encode([
            'blogs' => $blogs,
            'total_blogs' => $total_blogs,
            'per_page' => $limit
        ]);
    }
    public function blog_details()
    {
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['blog_detail'] = $this->Blog_model->blog_detail_data_nm();
        $data['blogs'] = $this->Blog_model->get_recent_blogs(2);
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/blog-details', $data);
        $this->load->view('frontend/include/footer', $data);
    }

    public function submit_blog_form_data()
    {
        $data = [
            'blog_name' => $this->input->post('blog_name', true),
            'username' => $this->input->post('firstname', true) . ' ' . $this->input->post('lastname', true),
            'firstname' => $this->input->post('firstname', true),
            'lastname' => $this->input->post('lastname', true),
            'email' => $this->input->post('email', true),
            'mobile' => $this->input->post('mobile', true),
        ];

        if ($this->Blog_model->insert_blog_form_data($data)) {
            redirect('thank-you');
        } else {
            echo "<script>alert('Something went wrong. Please try again.'); window.history.back();</script>";
        }

    }
    public function mentor()
    {
        $data['teachers'] = $this->Mentors_model->mentor_view();
        $data['coo_and_mentor'] = $this->Mentors_model->get_coo_and_mentor();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/mentors', $data);
        $this->load->view('frontend/include/footer', $data);
    }
    public function mentor_details()
    {
        $data['teacher_detail'] = $this->Mentors_model->teacher_data_nm();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/mentor-details', $data);
        $this->load->view('frontend/include/footer', $data);
    }
    public function classroom_courses()
    {
        $data['classroom_detail_view'] = $this->detail_model->offline_course();
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/classroom-courses', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }
    public function classroom_detail()
    {
        $id = $this->uri->segment(2);
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['detail_view'] = $this->detail_model->offlineBasic($id);
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/classroom-detail', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }
    public function courses()
    {
        $data['course_details_view'] = $this->detail_model->all_courses();
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $data['course_categories'] = $this->db->get('course_category')->result();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/courses', $data);
        $this->load->view('frontend/include/footer', $data);
    }

    public function allcourses()
    {
        $data['course_details_view'] = $this->detail_model->online_course();
        $data['classroom_detail_view'] = $this->detail_model->offline_course();
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/all-courses', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }

    public function online_courses_detail()
    {
        $slug = $this->uri->segment(2);
        $mode = $this->input->get('mode');
        if (empty($mode)) {
            $mode = 'online';
        }

        $data['current_mode'] = $mode;
        $data['online_course_view'] = $this->detail_model->fetch_online_courses_by_slug_and_mode($slug, $mode);
        $data['online_courses_view'] = $this->detail_model->fetch_all_online_courses();
        $data['gallery_view'] = $this->gallery_model->gallery();

        $this->load->view('frontend/include/header');
        $this->load->view('frontend/course-details', $data);
        $this->load->view('frontend/include/footer', $data);
    }

    public function submit_course_form_data()
    {
        $data = [
            'course_name' => $this->input->post('course_name', true),
            'name' => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
            'mobile' => $this->input->post('mobile', true),
        ];

        if ($this->detail_model->insert_course_form_data($data)) {
            redirect('thank-you');
        } else {
            echo "<script>alert('Something went wrong. Please try again.'); window.history.back();</script>";
        }

    }

    public function self_learning()
    {
        $data['recorded_detail_view'] = $this->detail_model->recorded_course();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/self-learning', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }
    public function recorded_detail()
    {
        $id = $this->uri->segment(2);
        $data['detail_view'] = $this->detail_model->recorded($id);
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/recorded-detail', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }

    public function webadd()
    {
        $firstname = trim($this->input->post('firstname'));
        $lastname = trim($this->input->post('lastname'));
        $mobile_no = trim($this->input->post('mobile_no'));
        $email = trim($this->input->post('email'));
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        if (empty($firstname) || empty($lastname) || empty($mobile_no) || empty($email) || empty($password) || empty($confirm_password)) {
            $this->session->set_flashdata('error', 'All fields are required.');
            redirect('register');
        }

        if ($password !== $confirm_password) {
            $this->session->set_flashdata('error', 'Passwords do not match.');
            redirect('register');
        }

        $existing = $this->db->get_where('users', ['email' => $email])->row();
        if ($existing) {
            $this->session->set_flashdata('error', 'Email already exists. Please use a different one.');
            redirect('register');
        }

        $name = $firstname . ' ' . $lastname;
        $data = array(
            'username' => $name,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'mobile_no' => $mobile_no,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'is_admin' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $notification_data = array(
            'message' => 'A new user ' . $name . ' has registered',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 'unread'
        );

        if ($this->User_model->insert_user($data) && $this->User_model->insert_notifications($notification_data)) {
            $this->sendWebhook($data);
            $this->session->set_flashdata('success', 'Registration successful. Please login.');
            redirect('login');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect('register');
        }
    }
    public function form()
    {
        $data['questions'] = $this->Questions_model->get_questions();
        $data['gallery_view'] = $this->gallery_model->gallery();
        $data['teachers'] = $this->Mentors_model->teacher();
        $data['blog_detail_view'] = $this->Blog_model->blog_detail();
        $data['course_details_view'] = $this->detail_model->online_course_index();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/enquiryform', $data);
        $this->load->view('frontend/include/footer', $data);
    }

    public function submit()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->output->set_content_type('application/json');

            $topics = "";
            $selected_topic_ids = $this->input->post('topics');

            if (!empty($selected_topic_ids)) {
                $this->db->where_in('id', $selected_topic_ids);
                $selected_topics = $this->db->get("preffered_topic")->result_array();
                $topic_names = array_column($selected_topics, 'topic_name');
                $topics = implode(',', $topic_names);
            }

            $firstname = $this->input->post('first_name');
            $lastname = $this->input->post('last_name');
            $name = $firstname . ' ' . $lastname;
            $mobile_no = $this->input->post('phone_number');
            $email = $this->input->post('email_address');
            $generated_password = $firstname . '@123';

            $data_user = array(
                'username' => $name,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'mobile_no' => $mobile_no,
                'email' => $email,
                'password' => password_hash($generated_password, PASSWORD_BCRYPT),
                'is_admin' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $existing = $this->db->get_where('users', ['email' => $email])->row();
            if ($existing) {
                echo json_encode([
                    'status' => 'error',
                    'message' => "Email $email already exists. Please use a different one."
                ]);
                return;
            }

            $this->User_model->insert_user($data_user);
            $new_user_id = $this->db->insert_id();

            $data_form = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email_address' => $this->input->post('email_address'),
                'phone_number' => $this->input->post('phone_number'),
                'address' => $this->input->post('address'),
                'product_purchase' => $topics,
                'address_state' => $this->input->post('address_state'),
                'product_satisfaction' => $this->input->post('product_satisfaction'),
                'referal_first_name' => $this->input->post('referal_first_name'),
                'referal_last_name' => $this->input->post('referal_last_name'),
                'referal_email_address' => $this->input->post('referal_email_address'),
                'referal_phone_number' => $this->input->post('referal_phone_number'),
                'product_feedback' => $this->input->post('product_feedback'),
                'user_id' => $new_user_id,
                'score' => 4
            );

            $notification_data = array(
                'message' => 'A new enquiry from ' . $name . ' has been registered',
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'unread'
            );
            $this->User_model->insert_notifications($notification_data);

            if ($this->Form_model->save_form_data($data_form)) {
                echo json_encode([
                    'status' => 'success',
                    'redirect' => site_url('thank-you'),
                    'message' => 'Form submitted successfully.'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Please fill in all required fields before submitting.'
                ]);
            }

        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid request method. Please try again.'
            ]);
        }

    }

    public function submit_trading_quiz_challenge_data()
    {
        $firstname = trim($this->input->post('firstname'));
        $lastname = trim($this->input->post('lastname'));
        $email = trim($this->input->post('email'));
        $mobile = trim($this->input->post('mobile'));
        $job_title = trim($this->input->post('job_title'));
        $quiz_time = intval($this->input->post('quiz_time'));

        $answers = $this->input->post('answers'); 
        $quiz_score = 0;

        if (empty($firstname) || empty($lastname) || empty($email) || empty($mobile) || empty($job_title)) {
            echo "<script>alert('All fields are required.'); window.history.back();</script>";
            exit;
        }

        if (is_array($answers)) {
            $question_ids = array_keys($answers);
            $this->db->where_in('id', $question_ids);
            $questions = $this->db->get('questions')->result();

            foreach ($questions as $question) {
                if (isset($answers[$question->id]) && $answers[$question->id] == $question->correct_answer) {
                    $quiz_score++;
                }
            }
        }

        $username = $firstname . ' ' . $lastname;

        $data = array(
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'mobile' => $mobile,
            'job_title' => $job_title,
            'quiz_score' => $quiz_score,
            'quiz_time' => $quiz_time,
            'created_at' => date('Y-m-d H:i:s'),
        );

        $insert = $this->db->insert('trading_quiz_challenge_data', $data);

        if ($insert) {
            echo "<script>alert('Your response has been submitted'); window.location.href='" . base_url() . "';</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.'); window.location.href='" . base_url('trading-quiz-challenge') . "';</script>";
        }
    }


    public function thank_you()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/enquiryformsuccess');
        $this->load->view('frontend/include/footer');
    }

    public function termsandconditions()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/terms-and-condition');
        $this->load->view('frontend/include/footer', $data);
    }

    public function careers()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $data['career_details_view'] = $this->Career_detail_model->career_details_view();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/careers', $data);
        $this->load->view('frontend/include/footer', $data);
    }

    public function career_submit_data()
    {
        $data = $this->input->post(NULL, TRUE);
        $upload = null;

        if ($this->input->post()) {
            $data = $this->input->post();
            $config['upload_path'] = './uploads/upload_cv/';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('upload')) {
                $uploadData = $this->upload->data();
                $upload = $uploadData['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
            }

            if ($this->Career_model->career_submit_data($data, $upload) == true) {
                ?>
                <script type="text/javascript">
                    alert("Thank you for registration. We will get back to you soon.");
                    window.location.href = "<?php echo base_url(); ?>";
                </script>
                <?php
            } else {
                ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">
                        &times;
                    </a>
                    <strong>Error!</strong> Sorry, please try again.
                </div>
                <?php
            }
        } else {
            $data['message'] = '<div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">
                                        &times;
                                    </a>
                                    <strong>Error!</strong> Sorry, please try again.
                                </div>';
        }
    }

    public function career_details()
    {
        $data['job_title_fetch'] = $this->Career_Detail_model->job_title_fetch();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/career-details', $data);
        $this->load->view('frontend/include/footer');
    }

    public function disclaimer()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/disclaimer');
        $this->load->view('frontend/include/footer', $data);
    }

    public function refundpolicy()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/refund-policy');
        $this->load->view('frontend/include/footer', $data);
    }

    public function privacypolicy()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/privacy-policy');
        $this->load->view('frontend/include/footer', $data);
    }

    public function train_a_trainer()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/train-a-trainer');
        $this->load->view('frontend/include/footer', $data);
    }

    public function demo_session()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/free-seminar', $data);
        $this->load->view('frontend/include/footer', $data);
    }
    public function trading_quiz_challenge()
    {
        $data['questions'] = $this->db->get('questions')->result();
        $data['gallery_view'] = $this->gallery_model->gallery();

        $this->load->view('frontend/include/header');
        $this->load->view('frontend/trading-quiz-challenge', $data);
        $this->load->view('frontend/include/footer', $data);
    }
    public function collaboration()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/collaboration', $data);
        $this->load->view('frontend/include/footer', $data);
    }

    public function demo_session_submit_data()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username', TRUE);
            $email = $this->input->post('email', TRUE);
            $mobile_no = $this->input->post('mobile_no', TRUE);
            $session_mode = $this->input->post('session_mode', TRUE);

            $data = [
                'username' => $username,
                'email' => $email,
                'mobile_no' => $mobile_no,
                'session_mode' => $session_mode,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $insert = $this->db->insert('demo_sessions', $data);

            if ($insert) {
                redirect('thank-you');
            } else {
                echo "<script>alert('Something went wrong. Please try again.'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Invalid Request'); window.history.back();</script>";
        }
    }

    public function ladies_special_batch()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/ladies-special-batch', $data);
        $this->load->view('frontend/include/footer', $data);
    }
    public function trade_over_coffee()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/trade-over-coffee', $data);
        $this->load->view('frontend/include/footer', $data);
    }

    public function submit_event_data()
    {
        if ($this->input->post()) {
            $event_name = $this->input->post('event_name');
            $username = $this->input->post('firstname') . ' ' . $this->input->post('lastname');
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $mobile_no = $this->input->post('mobile_no');

            if ($firstname == "" or $lastname == "" or $email == "" or $mobile_no == "" or $event_name == "") {
                $page_data['message'] = 'Please fill complete form';
            } else {

                $data = array(
                    "username" => $username,
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "email" => $email,
                    "mobile_no" => $mobile_no,
                    "event_name" => $event_name,
                );

                $result = $this->db->insert('event_data', $data);
            }
            if ($result) {
                redirect('thank-you');
            } else {
                ?>
                <script type="text/javascript">
                    alert("Please enter all required fields");
                    window.location.reload();
                </script>
                <?php
            }
        }

    }
    public function sitemap()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $data['sitemap_view'] = $this->Sitemap_model->sitemap_view();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/sitemap', $data);
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }

    public function online_class_slot()
    {
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/online-class-slot');
        $this->load->view('frontend/include/newsletter');
        $this->load->view('frontend/include/footer', $data);
    }

    public function append_insert()
    {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'address' => $this->input->post('address')
        );

        if ($this->Form_model->append_insert($data)) {
            echo "Data inserted successfully";
        } else {
            echo "Failed to insert data";
        }
    }


    public function error404()
    {
        $this->output->set_status_header('404');
        $data['gallery_view'] = $this->gallery_model->gallery();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/error_404');
        $this->load->view('frontend/include/footer', $data);
    }

    private function sendWebhook($userData)
    {
        $webhookURL = "https://connect.pabbly.com/workflow/sendwebhookdata/IjU3NjYwNTZjMDYzNDA0MzY1MjZjNTUzNjUxMzci_pc";

        $ch = curl_init($webhookURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($userData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }

    public function enquiry_submit()
    {
        // Check CSRF Token
        // $csrf_token = $this->input->post($this->security->get_csrf_token_name());
        // if ($csrf_token !== $this->security->get_csrf_hash()) {
        //     echo json_encode([
        //         'status' => 'error',
        //         'message' => 'CSRF token mismatch. Please try again.'
        //     ]);
        //     return;
        // }

        // Sanitize and prepare data
        $data = [
            'first_name' => $this->input->post('first_name', true),
            'last_name' => $this->input->post('last_name', true),
            'email' => $this->input->post('email', true),
            'mobile' => $this->input->post('mobile', true),
            'address' => $this->input->post('address', true),
            'preferred_timing' => $this->input->post('preferred_timing', true),
            'source' => $this->input->post('source', true),
            'ref_first_name' => $this->input->post('ref_first_name', true),
            'ref_last_name' => $this->input->post('ref_last_name', true),
            'ref_email' => $this->input->post('ref_email', true),
            'ref_mobile' => $this->input->post('ref_mobile', true),
            'ref_message' => $this->input->post('ref_message', true),
        ];

        // Handle topics array (if exists)
        $topics = $this->input->post('topics');
        if (!empty($topics) && is_array($topics)) {
            $data['topics'] = implode(',', $topics);  // Comma-separated values
        } else {
            $data['topics'] = null;
        }

        // Insert into 'enquiries' table
        if ($this->db->insert('enquiry_form_data', $data)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Enquiry submitted successfully.'
            ]);
            // Output JavaScript to display the alert and redirect
            echo '<script>
                    alert("Thank you for registering with us!");
                    window.location.href = "' . base_url() . '";
                    </script>';
        } else {
            // Capture detailed DB error
            $db_error = $this->db->error();
            log_message('error', 'Database insert error: ' . json_encode($db_error));

            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to insert data into the database.'
            ]);
            // Output JavaScript to display an error message and reload the page
            echo '<script>
                    alert("Something went wrong, please try again.");
                    location.reload();
                    </script>';
        }

    }



}
