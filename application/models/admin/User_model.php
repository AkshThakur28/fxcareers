<?php
class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->delete_old_notifications();
	}

	public function getStudentCountByMonth()
{
    $this->db->select("MONTH(created_at) as month, DATE_FORMAT(created_at, '%M') as month_name, COUNT(id) as student_count");
    $this->db->from("users");
    $this->db->where("YEAR(created_at)", date("Y"));
    $this->db->group_by("MONTH(created_at)");
    $this->db->order_by("MONTH(created_at)", "ASC");

    $query = $this->db->get();
    return $query->result_array();
}



	public function add_user($data)
	{
		$this->db->insert('users', $data);
		return true;
	}
	public function insert_user($data_user)
	{
		return $this->db->insert('users', $data_user);

	}
	public function get_all_users()
{
    $query = $this->db->query("
        SELECT 
            purchase.*, 
            users.username AS username, 
            users.mobile_no AS mobile_no,
            users.email AS email,
            (SELECT COUNT(*) FROM `purchase` WHERE purchase.user_id = users.id) AS course_count,
            (SELECT GROUP_CONCAT(transaction_status) 
                FROM `purchase` 
                WHERE purchase.user_id = users.id) AS transaction_statuses,
            (SELECT COALESCE(SUM(final_amount), 0) FROM `purchase` WHERE purchase.user_id = users.id) AS total_final_amount,
            (SELECT COALESCE(SUM(paid_amount), 0) FROM `purchase` WHERE purchase.user_id = users.id) AS total_paid_amount,
            (SELECT COALESCE(SUM(left_amount), 0) FROM `purchase` WHERE purchase.user_id = users.id) AS total_left_amount,
            (SELECT GROUP_CONCAT(detail.course_name) 
                FROM `purchase`
                JOIN `detail` ON detail.id = purchase.course_id
                WHERE purchase.user_id = users.id) AS purchased_courses,
            (SELECT GROUP_CONCAT(detail.course_image) 
                FROM `purchase`
                JOIN `detail` ON detail.id = purchase.course_id
                WHERE purchase.user_id = users.id) AS purchased_course_images,
            (SELECT GROUP_CONCAT(course_category.category_name) 
                FROM `purchase`
                JOIN `detail` ON detail.id = purchase.course_id
                JOIN `course_category` ON course_category.id = detail.category
                WHERE purchase.user_id = users.id) AS purchased_course_categories,
            (SELECT GROUP_CONCAT(CONCAT(payment_history.transaction_date, '|', payment_history.final_amount, '|', payment_history.paid_amount))
                FROM `payment_history`
                WHERE payment_history.user_id = users.id) AS payment_history
        FROM `purchase`
        JOIN `users` ON users.id = purchase.user_id
        WHERE users.is_admin = 2;
    ");
    return $query->result_array();
}

	public function delete_user_and_purchases($user_id)
	{
		$this->db->trans_start(); // Start the transaction

		// Delete records from the purchase table
		$this->db->where('user_id', $user_id);
		$this->db->delete('purchase');

		// Delete the user from the users table
		$this->db->where('id', $user_id);
		$this->db->delete('users');

		$this->db->trans_complete(); // Complete the transaction

		// Return transaction status
		return $this->db->trans_status();
	}





	public function user_profile()
	{
		if ($this->session->userdata('role') === '2') {
			$user_id = $this->session->userdata('admin_id');
			$query = $this->db->query("SELECT *,(SELECT role_name FROM `role` where id=is_admin) as role_name FROM `users` where id=$user_id;");

		} else {
			$query = $this->db->query("SELECT *,(SELECT role_name FROM `role` where id=is_admin) as role_name FROM `users`;");
		}
		return $result = $query->result_array();
	}

	public function get_user_by_id($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		return $result = $query->row_array();
	}

	public function get_user_by_userId($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->query("SELECT *,(SELECT role_name FROM `role` where id=is_admin) as role_name  FROM `users`;");
		return $query->row_array();
	}

	public function get_user_by_email($email)
	{
		$this->db->from('users');
		$this->db->where('email', $email);
		return $this->db->get()->row();
	}

	public function user_edit($id)
	{
		$result = $this->db->query("SELECT * FROM `users` where id=$id");
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return [];
		}
	}

	public function user_update_data($data)
	{
		$this->db->where('id', $data['id']);
		if ($this->db->update('users', $data)) {

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


	public function resolve_user_login($email, $password)
	{

		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');

		return $this->verify_password_hash($password, $hash);

	}
	public function hash_password($password)
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}


	public function verify_password_hash($password, $hash)
	{

		return password_verify($password, $hash);

	}

	public function get_user_id_from_username($email)
	{

		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email', $email);

		return $this->db->get()->row('id');

	}

	public function get_user($user_id)
	{

		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();

	}
	public function user($id)
	{

		$assign_data = $this->db->query("SELECT * FROM `users` where users.id=$id ");

		$fetch = $assign_data->num_rows();
		if ($fetch > 0) {
			return $fetch = $assign_data->result_array();
		} else {
			return false;
		}
	}
	public function update_user($user_id, $data)
	{
		$user = $this->db->get_where('users', ['id' => $user_id])->row();
		if ($user) {
			$update_data = [];
			if (isset($data['firstname'])) {
				$update_data['firstname'] = $data['firstname'];
			}

			if (isset($data['lastname'])) {
				$update_data['lastname'] = $data['lastname'];
			}

			if (isset($data['email'])) {
				$update_data['email'] = $data['email'];
			}

			if (isset($data['mobile_no'])) {
				$update_data['mobile_no'] = $data['mobile_no'];
			}

			if (isset($data['username'])) {
				$update_data['username'] = $data['username'];
			}
			$this->db->where('id', $user_id);
			$this->db->update('users', $update_data);

			return true;
		}

		return false;
	}



	public function get_all_notifications()
	{
		$query = $this->db->get('notifications');
		return $query->result_array();
	}

	public function delete_old_notifications()
	{
		$this->db->query("DELETE FROM notifications WHERE created_at < NOW() - INTERVAL 7 DAY");
	}

	public function insert_notifications($notification_data)
	{
		$this->db->insert('notifications', $notification_data);
		return true;
	}

	public function mark_notification_as_read($id)
	{
		$this->db->where('id', $id);
		$this->db->update('notifications', ['status' => 'read']);
	}


	// public function mark_all_notifications_as_read()
	// {
	// 	$this->db->where('status', 'unread');
	// 	$this->db->update('notifications', ['status' => 'read']);
	// }


}

?>