<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Questions extends MY_Controller
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
		$this->load->model('admin/Questions_model', 'Questions_model');
		$this->load->helper('security');

		date_default_timezone_set('Asia/Kolkata');
	}

	public function add_questions()
	{
		if ($this->session->has_userdata('is_admin_login')) {


			$this->load->view('admin/include/header');
			$this->load->view('admin/questions/add_questions');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function questions_submit_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {


			$data = [];
			if ($this->input->post()) {
				$data = $this->input->post();
				$config['upload_path'] = 'uploads/questions';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('session_image')) {
					$uploadData = $this->upload->data();
					$session_image = $uploadData['file_name'];
				} else {
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				}
				if ($this->Questions_model->questions_data_submit($data) == true) {

					redirect("admin/questions/questions_view");
				} ?> 				<?php
			} else {
				$data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
			}
		} else {
			redirect('admin/auth/login');
		}
	}



	public function questions_view()
	{
		if ($this->session->has_userdata('is_admin_login')) {

			$data['questions_view'] = $this->Questions_model->questions_view();
			$this->load->view('admin/include/header');
			$this->load->view('admin/questions/view_questions', $data);
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}


	public function questions_edit($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {

			$id = $this->uri->segment(4);

			$data['view_questions'] = $this->Questions_model->questions_edit($id);
			$this->load->view('admin/include/header');
			$this->load->view('admin/questions/edit_questions', $data);
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function questions_update_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {

			$data = [];
			if ($this->input->post()) {
				$data = $this->input->post();
				if ($this->Questions_model->questions_update_data($data) == true) {

					redirect("questions/view_questions");
				} ?>
			<?php
			} else {
				$data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
			}
		} else {
			redirect('admin/auth/login');
		}
	}
	public function questions_delete($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {

			$id = $this->uri->segment(4);

			if ($this->Questions_model->questions_delete($id) == true) {

				redirect("questions/view_questions");
			}
		} else {
			redirect('admin/auth/login');
		}
	}
	public function index()
	{
		$this->load->model('Questions_model');
		$category = 'blog_category';
		$data['questions'] = $this->Questions_model->get_recent_questions($category);
		$this->load->view('blog_view', $data);
	}
}
?>