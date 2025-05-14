<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mentors extends MY_Controller
{

	function __construct()
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
		$this->load->model('admin/Mentors_model', 'Mentors_model');
		$this->load->helper('security');

		date_default_timezone_set('Asia/Kolkata');
	}

	protected function restrict_to_role($required_role)
    {
        if ($this->session->userdata('role') != $required_role) {
            show_error('You do not have permission to access this page.', 403);
        }
    }

	public function add_mentor()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$this->load->view('admin/include/header');
			$this->load->view('admin/mentor/add_mentor');
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function mentor_submit_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			if ($this->input->post()) {
				$data = $this->input->post();

				$original_name = $_FILES['mentor_image']['name'];
				$ext = pathinfo($original_name, PATHINFO_EXTENSION);
				$clean_name = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '_', pathinfo($original_name, PATHINFO_FILENAME)));
				$final_name = $clean_name . '_' . time() . '.' . $ext;

				$config['upload_path'] = 'uploads/mentors';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
				$config['file_name'] = $final_name;
				$config['overwrite'] = false;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('mentor_image')) {
					$mentor_image = $final_name;

					if ($this->Mentors_model->mentor_data_submit($data, $mentor_image)) {
						redirect("admin/mentors/view_mentor");
					} else {
						$data['message'] = '<div class="alert alert-danger">Something went wrong, please try again.</div>';
					}
				} else {
					$error = $this->upload->display_errors();
					echo $error;
				}
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function view_mentor()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$data['mentor_view'] = $this->Mentors_model->mentor_view();
			$this->load->view('admin/include/header');
			$this->load->view('admin/mentor/mentors', $data);
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}


	public function edit_mentor($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$id = $this->uri->segment(4);
			$data['view_mentor'] = $this->Mentors_model->mentor_edit($id);

			$this->load->view('admin/include/header');
			$this->load->view('admin/mentor/view-mentor', $data);
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function mentor_update_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			if ($this->input->post()) {
				$data = $this->input->post();
				$mentor_image = $this->input->post('existing_mentor_image');

				if (!empty($_FILES['mentor_image']['name'])) {
					$original_name = $_FILES['mentor_image']['name'];
					$ext = pathinfo($original_name, PATHINFO_EXTENSION);
					$clean_name = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '_', pathinfo($original_name, PATHINFO_FILENAME)));
					$final_name = $clean_name . '_' . time() . '.' . $ext;

					$config['upload_path'] = 'uploads/mentors';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
					$config['file_name'] = $final_name;
					$config['overwrite'] = false;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('mentor_image')) {
						$mentor_image = $final_name;
					} else {
						echo $this->upload->display_errors();
						return;
					}
				}

				if ($this->Mentors_model->mentor_update_data($data, $mentor_image)) {
					redirect("admin/mentors/view_mentor");
				} else {
					$data['message'] = '<div class="alert alert-danger">Update failed, please try again.</div>';
				}
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function mentor_delete($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$id = $this->uri->segment(4);

			if ($this->mentor_model->mentor_delete($id) == true) {

				redirect("mentor/view_mentor");
			}
		} else {
			redirect('admin/auth/login');
		}
	}
}
?>