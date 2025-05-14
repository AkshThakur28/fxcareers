<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ebook extends MY_Controller
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
		$this->load->model('admin/Ebook_model', 'Ebook_model');
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

	public function add_ebook()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 2]);

			$this->load->view('admin/include/header');
			$this->load->view('admin/ebook/add-ebook');
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function ebook_submit_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 2]);

			$data = $this->input->post();

			$this->load->library('upload');

			$ebook_image = '';
			$imagePath = './uploads/ebook_image/';
			if (!is_dir($imagePath)) {
				mkdir($imagePath, 0777, true);
			}

			$config['upload_path'] = $imagePath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
			$config['encrypt_name'] = FALSE;
			$config['file_name'] = $_FILES['ebook_image']['name'];

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('ebook_image')) {
				$uploadData = $this->upload->data();
				$ebook_image = $uploadData['file_name'];
			} else {
				echo $this->upload->display_errors();
				return;
			}

			$ebook_pdf = '';
			$pdfPath = './uploads/ebook_pdf/';
			if (!is_dir($pdfPath)) {
				mkdir($pdfPath, 0777, true);
			}

			$config['upload_path'] = $pdfPath;
			$config['allowed_types'] = 'pdf';
			$config['encrypt_name'] = FALSE;
			$config['file_name'] = $_FILES['ebook_pdf']['name'];

			$this->upload->initialize($config);

			if ($this->upload->do_upload('ebook_pdf')) {
				$uploadData = $this->upload->data();
				$ebook_pdf = $uploadData['file_name'];
			} else {
				echo $this->upload->display_errors();
				return;
			}

			if ($this->Ebook_model->ebook_data_submit($data, $ebook_image, $ebook_pdf)) {
				redirect("admin/ebook/view_ebook");
			} else {
				$data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function view_ebook()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 2]);

			$data['ebook_view'] = $this->Ebook_model->ebook_view();
			$this->load->view('admin/include/header');
			$this->load->view('admin/ebook/ebooks', $data);
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function edit_ebook($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 2]);

			$data['view_ebook'] = $this->Ebook_model->ebook_edit($id);
			$this->load->view('admin/include/header');
			$this->load->view('admin/ebook/edit-ebook', $data);
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function ebook_update_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 2]);

			$data = $this->input->post();
			$id = $data['id'];

			$this->load->library('upload');

			$ebook = $this->db->get_where('ebook', ['id' => $id])->row();
			$ebook_image = $ebook->ebook_image;
			$ebook_pdf = $ebook->ebook_pdf;

			if (!empty($_FILES['ebook_image']['name'])) {
				$imagePath = './uploads/ebook_image/';
				if (!is_dir($imagePath)) {
					mkdir($imagePath, 0777, true);
				}

				$config['upload_path'] = $imagePath;
				$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
				$config['encrypt_name'] = FALSE;
				$config['file_name'] = $_FILES['ebook_image']['name'];

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('ebook_image')) {
					$uploadData = $this->upload->data();
					$ebook_image = $uploadData['file_name'];
				} else {
					echo $this->upload->display_errors();
					return;
				}
			}

			if (!empty($_FILES['ebook_pdf']['name'])) {
				$pdfPath = './uploads/ebook_pdf/';
				if (!is_dir($pdfPath)) {
					mkdir($pdfPath, 0777, true);
				}

				$config['upload_path'] = $pdfPath;
				$config['allowed_types'] = 'pdf';
				$config['encrypt_name'] = FALSE;
				$config['file_name'] = $_FILES['ebook_pdf']['name'];

				$this->upload->initialize($config);

				if ($this->upload->do_upload('ebook_pdf')) {
					$uploadData = $this->upload->data();
					$ebook_pdf = $uploadData['file_name'];
				} else {
					echo $this->upload->display_errors();
					return;
				}
			}

			if ($this->Ebook_model->ebook_update_data($data, $ebook_image, $ebook_pdf)) {
				redirect("admin/ebook/view_ebook");
			} else {
				$data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function ebook_delete($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 2]);

			if ($this->Ebook_model->ebook_delete($id)) {
				redirect("admin/ebook/view_ebook");
			}
		} else {
			redirect('admin/auth/login');
		}
	}

}
?>