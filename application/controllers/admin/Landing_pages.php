<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_pages extends MY_Controller
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
		$this->load->model('admin/Landing_pages_model', 'Landing_pages_model');
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


    public function view_landing_pages()
			{
				if ($this->session->has_userdata('is_admin_login')) {
					$this->restrict_to_role([1,4]);

					$data['landing_page_view'] = $this->Landing_pages_model->landing_page_view();
					$this->load->view('admin/include/header');
					$this->load->view('admin/landing-pages/all-landing-pages', $data);
                    $this->load->view('admin/include/sidebar');
					$this->load->view('admin/include/footer');
				} else {
					redirect('admin/auth/login');
				}
			}
}