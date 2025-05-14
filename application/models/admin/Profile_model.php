<?php
class Profile_model extends CI_Model
{
	public function profile_view($admin_id)
	{
		$this->db->select('users.id AS users_id, users.*, profile_info.*'); 
		$this->db->from('users');
		$this->db->join('profile_info', 'profile_info.user_id = users.id', 'left'); 
		$this->db->where('users.id', $admin_id);
	
		$query = $this->db->get();
	
		if ($query->num_rows() > 0) {
			return $query->row_array(); 
		} else {
			return [];
		}
	}
	
    public function update_profile($data_users)
	{
		$this->db->where('id', $data_users['id']);
		if ($this->db->update('users', $data_users)) {

			return $data_users;
		} else {
			return false;
		}
	}

	public function update_personal_info($data)
	{
		$this->db->where('user_id', $data['user_id']);
		if ($this->db->update('profile_info', $data)) {

			return $data;
		} else {
			return false;
		}
	}

	public function update_address_info($data)
	{
		$this->db->where('user_id', $data['user_id']);
		if ($this->db->update('profile_info', $data)) {

			return $data;
		} else {
			return false;
		}
	}

	public function update_socials($data)
	{
		$this->db->where('user_id', $data['user_id']);
		if ($this->db->update('profile_info', $data)) {

			return $data;
		} else {
			return false;
		}
	}

    public function role_fetch()
	{

		$role_data = $this->db->query("SELECT * FROM `role`");

		$fetch = $role_data->num_rows();
		if ($fetch > 0) {
			return $fetch = $role_data->result_array();

		} else {
			return false;
		}
	}
}
