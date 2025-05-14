<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends MY_Controller
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
        $this->load->model('admin/Course_model', 'Course_model');
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

    public function add_course()
    {
        if ($this->session->has_userdata('is_admin_login')) {

            $this->restrict_to_role([1]);

            $this->load->view('admin/include/header');
            $this->load->view('admin/course/add-course');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function course_submit_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1]);

            $data = $this->input->post();

            if (isset($_FILES['course_image']) && $_FILES['course_image']['error'] == 0) {
                $uploadPath = './uploads/course/';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $fileName = $_FILES['course_image']['name'];
                $filePath = $uploadPath . basename($fileName);

                if (move_uploaded_file($_FILES['course_image']['tmp_name'], $filePath)) {
                    $data['course_image'] = $fileName;
                } else {
                    $data['course_image'] = null;
                }
            } else {
                $data['course_image'] = null;
            }

            if ($this->Course_model->course_data_submit($data)) {
                redirect("admin/course/view_course");
            } else {
                $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
            }
        } else {
            redirect('admin/auth/login');
        }
    }


    public function view_course()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1]);

            $data['course_view'] = $this->Course_model->course_view();
            $this->load->view('admin/include/header');
            $this->load->view('admin/course/all-courses', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function edit_course($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1]);

            $data['view_course'] = $this->Course_model->course_edit($id);
            $this->load->view('admin/include/header');
            $this->load->view('admin/course/edit-course', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function course_update_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1]);

            $data = $this->input->post();

            $required_keys = ['course_name', 'author', 'mode', 'lesson', 'duration', 'category', 'language', 'base_price', 'seo_desc', 'seo_keywords', 'seo_title', 'long_description', 'status', 'id'];
            foreach ($required_keys as $key) {
                if (!isset($data[$key])) {
                    $data[$key] = '';
                }
            }

            $course_image = isset($data['existing_course_image']) ? $data['existing_course_image'] : '';

            if (!empty($_FILES['course_image']['name'])) {
                $uploadPath = './uploads/course/';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
                $config['encrypt_name'] = false;
                $config['file_name'] = $_FILES['course_image']['name'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('course_image')) {
                    $uploadData = $this->upload->data();
                    $course_image = $uploadData['file_name'];
                } else {
                    log_message('error', $this->upload->display_errors());
                }
            }

            if ($this->Course_model->course_update_data($data, $course_image)) {
                redirect("admin/course/view_course");
            } else {
                $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
            }

        } else {
            redirect('admin/auth/login');
        }
    }

    public function delete_course($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1]);

            if ($this->Course_model->course_delete($id)) {
                redirect("admin/course/view_course");
            }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function purchased_courses()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1]);

            // $data['purchase_data'] = $this->Purchase_model->get_purchase_data($uid, $course_id);
            $data['purchase_view'] = $this->Purchase_model->purchase_view();
            $this->load->view('admin/include/header');
            $this->load->view('admin/course/purchased_courses', $data);
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function view_course_enquiry()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            $data['course_enquiry_view'] = $this->Course_model->course_enquiry_view();
            $this->load->view('admin/include/header');
            $this->load->view('admin/course/course-enquiry', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function edit_course_enquiries()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            $id = $this->uri->segment(4);

            $data['edit_course_enquiry'] = $this->Course_model->edit_course_enquiry($id);
            $this->load->view('admin/include/header');
            $this->load->view('admin/course/edit-course-enquiry', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }

    public function course_enquiries_update_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            if ($this->input->post('submit')) {
                $data = array(
                    'id' => $this->input->post('id'),
                    'course_name' => $this->input->post('course_name'),
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'mobile' => $this->input->post('mobile'),
                );

                $result = $this->Course_model->update_course_enquiry($data);
                if ($result) {
                    redirect('admin/course/view_course_enquiry');
                }
            }
        } else {
            redirect('admin/auth/login');
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

    public function delete_course_enquiry($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role([1, 4]);

            if ($this->Course_model->course_enquiry_delete($id)) {
                redirect("admin/course/view_course_enquiry");
            }
        } else {
            redirect('admin/auth/login');
        }
    }
}
?>