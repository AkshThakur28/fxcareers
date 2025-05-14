<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends MY_Controller
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
		$this->load->model('admin/Slider_model', 'Slider_model');
		$this->load->helper('security');

		date_default_timezone_set('Asia/Kolkata');
	}
	protected function restrict_to_role($required_role)
	{
		if ($this->session->userdata('role') != $required_role) {
			show_error('You do not have permission to access this page.', 403);
		}
	}

	public function add_slider()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$this->load->view('admin/include/header');
			$this->load->view('admin/slider/add-app-slider');
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function slider_submit_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			if ($this->input->post()) {
				$data = $this->input->post();
				$slider_image = '';

				$config['upload_path'] = 'uploads/slider';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
				$config['encrypt_name'] = FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('slider_image')) {
					$uploadData = $this->upload->data();
					$slider_image = $uploadData['file_name']; 
				} else {
					$error = $this->upload->display_errors();
					$data['message'] = '<div class="alert alert-danger">' . $error . '</div>';
				}

				if ($this->Slider_model->slider_data_submit($data, $slider_image)) {
					redirect("admin/slider/view_slider");
				} else {
					$data['message'] = '<div class="alert alert-danger">Error! Please try again.</div>';
				}
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function view_slider()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$data['slider_view'] = $this->Slider_model->slider_view();
			$this->load->view('admin/include/header');
			$this->load->view('admin/slider/app-slider', $data);
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}


	public function edit_slider($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$id = $this->uri->segment(4);

			$data['view_slider'] = $this->Slider_model->slider_edit($id);
			$this->load->view('admin/include/header');
			$this->load->view('admin/slider/edit-app-slider', $data);
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function slider_update_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$data = $this->input->post();
			$id = $data['id'];

			$slider = $this->db->get_where('slider', ['id' => $id])->row();
			$slider_image = $slider ? $slider->slider_image : '';

			if (!empty($_FILES['slider_image']['name'])) {
				$config['upload_path'] = 'uploads/slider';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
				$config['encrypt_name'] = FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('slider_image')) {
					$uploadData = $this->upload->data();
					$slider_image = $uploadData['file_name'];
				} else {
					$error = $this->upload->display_errors();
					$data['message'] = '<div class="alert alert-danger">' . $error . '</div>';
					return;
				}
			}

			if ($this->Slider_model->slider_update_data($data, $slider_image)) {
				redirect("admin/slider/view_slider");
			} else {
				$data['message'] = '<div class="alert alert-danger">Error! Please try again.</div>';
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function delete_slider($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$id = $this->uri->segment(4);

			if ($this->Slider_model->slider_delete($id) == true) {

				redirect("admin/slider/view_slider");
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function index()
	{
		$this->load->model('Slider_model');
		$category = 'blog_category';
		$data['blogs'] = $this->Slider_model->get_recent_blogs($category);
		$this->load->view('blog_view', $data);
	}
}
?>