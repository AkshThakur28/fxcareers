<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/User_model', 'User_model');
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


	public function get_user_details()
	{
		if ($this->input->is_ajax_request()) {
			$user_id = $this->input->post('user_id');

			$user = $this->User_model->get_user_by_userId($user_id);

			if ($user) {
				echo json_encode($user); 
			} else {
				echo json_encode(['error' => 'User not found']);
			}
		} else {
			show_error('No direct script access allowed.');
		}
	}


	public function getStudentDataByMonth()
	{
		$data = $this->User_model->getStudentCountByMonth();
		echo json_encode($data);
	}

	public function view_user()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role([1,4]);

			$data['all_users'] = $this->User_model->get_all_users();

			if (!$data['all_users']) {
				$data['all_users'] = [];
			}

			$this->load->view('admin/include/header');
			$this->load->view('admin/users/students', $data);
			$this->load->view('admin/include/sidebar');
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}


	public function student_view()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$data['all_users'] = $this->User_model->user_profile();
			$this->load->view('admin/include/header');
			$this->load->view('admin/users/student', $data);
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function delete_record($user_id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$this->load->model('User_model');

			if ($this->User_model->delete_user_and_purchases($user_id)) {
				$this->session->set_flashdata('success', 'User and associated purchases deleted successfully.');
			} else {
				$this->session->set_flashdata('error', 'Failed to delete user. Please try again.');
			}

			redirect('admin/users/student_view');
		} else {
			redirect('admin/auth/login');
		}
	}



	public function add_form()
	{
		$this->load->view('admin/include/header');
		$this->load->view('admin/users/user_add');
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			if ($this->input->post('submit')) {

				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/include/header');
					$this->load->view('admin/users/user_add');
					$this->load->view('admin/include/footer');
				} else {
					$data = array(
						'username' => $this->input->post('firstname') . ' ' . $this->input->post('lastname'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'is_admin' => $this->input->post('user_role'),
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					);
					$data = $this->security->xss_clean($data);
					$this->User_model->add_user($data);

					redirect('admin/users/all_users');
				}

			} else {
				$data['view'] = 'admin/users/user_add';
			}
		} else {
			redirect('admin/auth/login');
		}
	}


	public function get_notifications()
	{
		$this->db->where('status', 'unread');
		$query = $this->db->get('notifications');
		return $query->result_array();
	}


	public function user_edit($id)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$data['view_user'] = $this->User_model->user_edit($id);
			$this->load->view('admin/include/header');
			;
			$this->load->view('admin/users/user_edit', $data);
			$this->load->view('admin/include/footer');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function user_update_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			if ($this->input->post('submit')) {
				$data = array(
					'id' => $this->input->post('id'),
					'username' => $this->input->post('firstname') . ' ' . $this->input->post('lastname'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'mobile_no' => $this->input->post('mobile_no'),
					'is_admin' => $this->input->post('user_role'),
					'updated_at' => date('Y-m-d H:i:s'),
				);
				// var_dump($data);
				// exit;
				$result = $this->User_model->user_update_data($data);
				if ($result) {
					redirect('admin/users/all_users');
				}
			}
		} else {
			redirect('admin/auth/login');
		}
	}


	public function del($id = 0)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->restrict_to_role(1);

			$this->db->delete('users', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect('admin/users/all_users');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function export_csv()
	{
		$this->load->model('User_model');
		$users = $this->User_model->get_all_users();

		$filename = 'users_' . date('Ymd') . '.csv';

		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; ");

		$file = fopen('php://output', 'w');

		$header = ['SR No.', 'First Name', 'Last Name', 'Email', 'Mobile No', 'Role'];
		fputcsv($file, $header);

		$sr_no = 1;
		foreach ($users as $user) {
			$csvData = [
				$sr_no++,
				$user['firstname'],
				$user['lastname'],
				$user['email'],
				$user['mobile_no'],
				$user['role_name']
			];
			fputcsv($file, $csvData);
		}

		fclose($file);
		exit;
	}

	public function export_json()
	{
		$this->load->model('User_model');
		$users = $this->User_model->get_all_users();

		header("Content-Type: application/json");
		echo json_encode($users);
		exit;
	}


}
?>