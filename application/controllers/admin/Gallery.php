<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends MY_Controller
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
        $this->load->model('admin/Gallery_model', 'Gallery_model');
        $this->load->helper('security');

        date_default_timezone_set('Asia/Kolkata');
    }

    protected function restrict_to_role($required_role)
    {
        if ($this->session->userdata('role') != $required_role) {
            show_error('You do not have permission to access this page.', 403);
        }
    }

    public function add_gallery()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role(1);

            $this->load->view('admin/include/header');
            $this->load->view('admin/gallery/add-gallery');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function gallery_submit_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role(1);

            $data = $this->input->post();
            $uploadPath = './uploads/gallery/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['encrypt_name'] = FALSE;
            $config['file_name'] = $_FILES['image']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];

                if ($this->Gallery_model->gallery_data_submit($data, $image)) {
                    redirect("admin/gallery/view_gallery");
                } else {
                    $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
                }
            } else {
                $error = ['error' => $this->upload->display_errors()];
                print_r($error);
            }
        } else {
            redirect('admin/auth/login');
        }
    }


    public function view_gallery()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role(1);

            $data['gallery_view'] = $this->Gallery_model->gallery_view();
            $this->load->view('admin/include/header');
            $this->load->view('admin/gallery/gallery', $data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/auth/login');
        }
    }



    public function gallery_edit($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role(1);

            $data['view_gallery'] = $this->Gallery_model->gallery_edit($id);
            $this->load->view('admin/include/header');
            $this->load->view('admin/gallery/edit_gallery', $data);
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function gallery_update_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role(1);

            $data = $this->input->post();
            $config['upload_path'] = 'uploads/gallery';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
                if ($this->Gallery_model->gallery_update_data($data, $image)) {
                    redirect("admin/gallery/gallery_view");
                } else {
                    $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
                }
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function add_gallery_category()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role(1);

            $this->load->view('admin/include/header');
            $this->load->view('admin/gallery/add-gallery-category');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/include/footer');

        } else {
            redirect('admin/auth/login');
        }
    }

    public function gallery_category_submit_data()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role(1);

            $data = $this->input->post();
            $uploadPath = './uploads/gallery/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['encrypt_name'] = FALSE;
            $config['file_name'] = $_FILES['image']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];

                if ($this->Gallery_model->gallery_category_submit_data($data, $image)) {
                    redirect("admin/gallery/view_gallery");
                } else {
                    $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
                }
            } else {
                $error = ['error' => $this->upload->display_errors()];
                print_r($error);
            }
        } else {
            redirect('admin/auth/login');
        }
    }

    public function delete_gallery($id)
    {
        if ($this->session->has_userdata('is_admin_login')) {
            $this->restrict_to_role(1);

            $image = $this->Gallery_model->get_image_by_id($id);

            if ($image) {
                $file_path = FCPATH . 'uploads/gallery/' . $image->image;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }

                if ($this->Gallery_model->gallery_delete($id)) {
                    redirect("admin/gallery/view_gallery");
                } else {
                    echo "Error: Unable to delete the record.";
                }
            } else {
                echo "Error: Image not found.";
            }
        } else {
            redirect('admin/auth/login');
        }
    }

}
?>