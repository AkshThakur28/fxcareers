<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends MY_Controller
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
		$this->load->model('admin/Blog_model', 'Blog_model');
		$this->load->helper('security');

		date_default_timezone_set('Asia/Kolkata');
	}

	protected function restrict_to_role($allowed_roles)
	{
		$user_role = $this->session->userdata('role');

		if (is_array($allowed_roles)) {
			if (!in_array($user_role, $allowed_roles)) {
				show_error('You do not have permission to access this page.', 403);
			}
		} else {
			if ($user_role != $allowed_roles) {
				show_error('You do not have permission to access this page.', 403);
			}
		}
	}
	public function blog_submit_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 3]);

			if ($this->input->post()) {
				$data = $this->input->post();

				$config['upload_path'] = 'uploads/blogs/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
				$config['encrypt_name'] = FALSE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$blog_image = '';
				if (!empty($_FILES['blog_image']['name'])) {
					$_FILES['blog_image']['name'] = str_replace(' ', '_', $_FILES['blog_image']['name']);

					if ($this->upload->do_upload('blog_image')) {
						$uploadData = $this->upload->data();
						$blog_image = $uploadData['file_name'];
					} else {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
					}
				}

				if ($this->Blog_model->blog_data_submit($data, $blog_image)) {
					redirect("admin/blog/view_blog");
				} else {
					$data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
				}
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function view_blog()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 2, 3]);

			$data['blog_view'] = $this->Blog_model->blog_view();
			$this->load->view('admin/include/header');
			$this->load->view('admin/blogs/blog', $data);
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');

		} else {
			redirect('admin/auth/login');
		}
	}

	public function add_blog()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 3]);

			$this->load->view('admin/include/header');
			$this->load->view('admin/blogs/add-new-blog');
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');

		} else {
			redirect('admin/auth/login');
		}
	}


	public function edit_blog($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {

			$this->restrict_to_role([1, 3]);
			$id = $this->uri->segment(4);

			$data['view_blog'] = $this->Blog_model->blog_edit($id);
			$this->load->view('admin/include/header');
			$this->load->view('admin/blogs/edit-blog', $data);
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');

		} else {
			redirect('admin/auth/login');
		}
	}
	public function blog_update_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 3]);

			if ($this->input->post()) {
				$data = $this->input->post();

				$config['upload_path'] = 'uploads/blogs/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
				$config['encrypt_name'] = FALSE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$blog_image = $this->input->post('existing_image');

				if (!empty($_FILES['blog_image']['name'])) {
					$_FILES['blog_image']['name'] = str_replace(' ', '_', $_FILES['blog_image']['name']);

					if ($this->upload->do_upload('blog_image')) {
						$uploadData = $this->upload->data();
						$blog_image = $uploadData['file_name'];
					} else {
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
					}
				}

				if ($this->Blog_model->blog_update_data($data, $blog_image)) {
					redirect("admin/blog/view_blog");
				} else {
					$data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Update failed. Please try again.</div>';
				}
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function delete_blog($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 3]);

			$id = $this->uri->segment(4);

			if ($this->Blog_model->blog_delete($id) == true) {

				redirect("admin/blog/view_blog");
			}
		} else {
			redirect('admin/auth/login');
		}
	}

}