<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seo extends MY_Controller
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
		$this->load->model('admin/Seo_model', 'Seo_model');
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

	public function add_seo()
	{
		$this->restrict_to_role([1, 3]);

		$this->load->view('admin/include/header');
		$this->load->view('admin/seo/add-seo-details');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/include/footer');
	}

	public function seo_submit_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 3]);

			$data = [];
			if ($this->input->post()) {
				$data = $this->input->post();

				if ($this->Seo_model->seo_data_submit($data) == true) {

					redirect("admin/seo/view_seo");
				} ?> 				<?php
			} else {
				$data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
			}
		} else {
			redirect('admin/auth/login');
		}
	}
	public function view_seo()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 3]);

			$data['seo_view'] = $this->Seo_model->seo_view();
			$this->load->view('admin/include/header');
			$this->load->view('admin/seo/all-seo-details', $data);
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}


	public function edit_seo($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 3]);

			$id = $this->uri->segment(4);

			$result = $this->Seo_model->seo_edit($id);

			if ($result) {
				$data['view_seo'] = $result;
				$this->load->view('admin/include/header');
				$this->load->view('admin/seo/edit-seo-details', $data);
				$this->load->view('admin/include/sidebar');
				$this->load->view('admin/include/footer');
			} else {
				$this->session->set_flashdata('error', 'No SEO details found for the given ID.');
				redirect('admin/seo/view_seo');
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function seo_update_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 3]);

			$data = [];
			if ($this->input->post()) {
				$data = $this->input->post();


				if ($this->Seo_model->seo_update_data($data) == true) {

					redirect("admin/seo/view_seo");
				} ?>
			<?php
			} else {
				$data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
			}
		} else {
			redirect('admin/auth/login');
		}
	}
	public function delete_seo($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1, 3]);

			$id = $this->uri->segment(4);

			if ($this->Seo_model->seo_delete($id) == true) {

				redirect("admin/seo/view_seo");
			}
		} else {
			redirect('admin/auth/login');
		}
	}


}
?>