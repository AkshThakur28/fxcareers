<?php

class Purchase_model extends CI_Model
{

    public function purchase_submit_data($data)
    {
        $ud = $this->session->userdata('admin_id');
        $course_id = $data['course_id'];
        $user_id = $data['user_id'];
        $transaction_date = date('Y-m-d H:i:s');
        $transaction_status = $data['paid_amount'] >= $data['final_amount'] ? 'Paid' : 'Pending';

        // Insert the current installment data into the 'payment_history' table
        $payment_history_data = [
            'user_id' => $user_id,
            'course_id' => $course_id,
            'basic_amount' => $data['basic_amount'],
            // 'amount' => $data['amount'],
            'final_amount' => $data['final_amount'],
            'transaction_id' => $data['transaction_id'],
            'transaction_status' => $transaction_status,
            'paid_amount' => $data['paid_amount'], // Amount paid in this installment
            'transaction_date' => $transaction_date,
            'payment_mode' => $data['payment_mode'],
            'created_by' => $ud,
        ];

        // Insert into 'payment_history' table
        $this->db->insert('payment_history', $payment_history_data);

        // Get the total paid amount so far for this course and user from 'payment_history'
        $this->db->select_sum('paid_amount');
        $this->db->where('course_id', $course_id);
        $this->db->where('user_id', $user_id);
        $total_paid_result = $this->db->get('payment_history')->row();
        $total_paid = $total_paid_result->paid_amount;

        // Check if there is an existing purchase record for this course and user
        $this->db->select('amount, final_amount');
        $this->db->where('course_id', $course_id);
        $this->db->where('user_id', $user_id);
        $purchase = $this->db->get('purchase')->row();

        if (!$purchase) {
            // No record exists for this course, insert a new record
            $left_amount = $data['final_amount'] - $total_paid;
            $transaction_status = $total_paid >= $data['final_amount'] ? 'Paid' : 'Pending';

            $insert_purchase_data = [
                'user_id' => $user_id,
                'course_id' => $course_id,
                'basic_amount' => $data['basic_amount'],
                'gst_amount' => $data['gst_amount'],
                'dis' => $data['dis'],
                'transaction_id' => $data['transaction_id'],
                // 'amount' => $data['amount'], // Use provided amount
                'final_amount' => $data['final_amount'], // Include final amount
                'paid_amount' => $total_paid, // Update the total paid amount
                'left_amount' => $left_amount, // Set left amount
                'transaction_status' => $transaction_status, // Determine payment status
                'purchase_date' => $transaction_date,
                'created_by' => $ud,
                'created_date' => date('Y-m-d H:i:s')
            ];

            // Insert into 'purchase' table
            return $this->db->insert('purchase', $insert_purchase_data);
        } else {
            // Update the existing 'purchase' table with new installment details
            // $total_amount_due = $purchase->amount;
            $final_amount = $purchase->final_amount;

            // Calculate left amount and ensure it's 0.00 if the amount is fully paid
            $left_amount = max(0, $final_amount - $total_paid);
            $transaction_status = $total_paid >= $final_amount ? 'Paid' : 'Pending';

            $update_purchase_data = [
                'paid_amount' => $total_paid, // Update the total paid amount
                'left_amount' => $left_amount, // Update the remaining amount
                'transaction_status' => $transaction_status, // Determine payment status
                'updated_date' => date('Y-m-d H:i:s')
            ];

            $this->db->where('course_id', $course_id);
            $this->db->where('user_id', $user_id);
            return $this->db->update('purchase', $update_purchase_data);
        }
    }

    public function purchase_view($period = 'all')
    {
        $role = $this->session->userdata('role');
        $user_id = $this->session->userdata('admin_id');

        $base_query = "
        SELECT 
            purchase.*, 
            detail.course_name, 
            detail.price AS course_price, 
            detail.course_image, 
            u1.username AS u1_username, 
            u2.username AS u2_username, 
            course_status.course_status_name AS course_user_status, 
            purchase.created_date AS created_at
        FROM 
            `purchase`
        LEFT JOIN 
            `detail` ON detail.id = purchase.course_id
        LEFT JOIN 
            `users` u1 ON u1.id = purchase.user_id
        LEFT JOIN 
            `users` u2 ON u2.id = purchase.created_by
        LEFT JOIN 
            `course_status` ON course_status.id = purchase.user_course_status
    ";

        $where_clause = [];
        if (in_array($role, ['2', '3'])) {
            $where_clause[] = "purchase.user_id = $user_id";
        }

        if ($period == 'weekly') {
            $startDate = date('Y-m-d', strtotime('last Sunday'));
            $endDate = date('Y-m-d');
            $where_clause[] = "DATE(purchase.purchase_date) BETWEEN '$startDate' AND '$endDate'";
        } elseif ($period == 'monthly') {
            $startDate = date('Y-m-01');
            $endDate = date('Y-m-t');
            $where_clause[] = "DATE(purchase.purchase_date) BETWEEN '$startDate' AND '$endDate'";
        } elseif ($period == 'yearly') {
            $startDate = date('Y-01-01');
            $endDate = date('Y-12-31');
            $where_clause[] = "DATE(purchase.purchase_date) BETWEEN '$startDate' AND '$endDate'";
        }

        if (!empty($where_clause)) {
            $base_query .= " WHERE " . implode(' AND ', $where_clause);
        }

        $base_query .= "
        GROUP BY 
            purchase.course_id, 
            purchase.user_id
        ORDER BY 
            purchase.id DESC, 
            purchase.purchase_date ASC;
    ";

        $result = $this->db->query($base_query);

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return [];
        }
    }

    public function purchase_view_dashboard()
{
    $base_query = "
    SELECT 
        purchase.*, 
        detail.course_name, 
        detail.price AS course_price, 
        detail.course_image, 
        u1.username AS u1_username, 
        u2.username AS u2_username, 
        course_status.course_status_name AS course_user_status, 
        purchase.created_date AS created_at
    FROM 
        `purchase`
    LEFT JOIN 
        `detail` ON detail.id = purchase.course_id
    LEFT JOIN 
        `users` u1 ON u1.id = purchase.user_id
    LEFT JOIN 
        `users` u2 ON u2.id = purchase.created_by
    LEFT JOIN 
        `course_status` ON course_status.id = purchase.user_course_status
    GROUP BY 
        purchase.course_id, 
        purchase.user_id
    ORDER BY 
        purchase.id ASC, 
        purchase.purchase_date ASC
    LIMIT 5;";

    $result = $this->db->query($base_query);

    if ($result->num_rows() > 0) {
        return $result->result();
    } else {
        return [];
    }
}


    public function purchase_view_edit($user_id, $course_id)
    {
        $this->db->select('
        purchase.*, 
        detail.course_name, 
        detail.price AS course_price, 
        detail.course_image, 
        u1.username AS u1_username, 
        u2.username AS u2_username, 
        course_status.course_status_name AS course_user_status, 
        purchase.created_date AS created_at
    ');
        $this->db->from('purchase');
        $this->db->join('detail', 'detail.id = purchase.course_id', 'left');
        $this->db->join('users u1', 'u1.id = purchase.user_id', 'left');
        $this->db->join('users u2', 'u2.id = purchase.created_by', 'left');
        $this->db->join('course_status', 'course_status.id = purchase.user_course_status', 'left');
        $this->db->where('purchase.user_id', $user_id);
        $this->db->where('purchase.course_id', $course_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }

    public function purchase_view_update_data($data_purchase)
    {
        $this->db->where('id', $data_purchase['id']);
        if ($this->db->update('purchase', $data_purchase)) {
            return true;
        } else {
            log_message('error', 'Purchase update failed. Query: ' . $this->db->last_query());
            return false;
        }
    }


    public function purchase_view_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('purchase');
    }

    public function purchase_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('purchase');
    }

    public function purchase_update_data($data, $course_image)
    {
        $newdata = [
            'user_id' => $data['user_id'],
            'course_image' => $course_image,
            'course_id' => $data['course_id'],
            'purchase_date' => $data['purchase_date'],
            'transaction_id' => $data['transaction_id'],
            'amount' => $data['amount'],
            'transaction_status' => $data['transaction_status'],
        ];
        $this->db->where('id', $data['id']);
        if ($this->db->update('purchase', $newdata)) {
            return $newdata;
        } else {
            return false;
        }
    }

    public function followup($id)
    {
        $result = $this->db->query("SELECT * FROM `form_remark` where form_id=$id");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function form_data($id)
    {
        $result = $this->db->query("SELECT * FROM `form_submissions` where user_id=$id");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function each_user_payment($id)
    {
        $result = $this->db->query("SELECT * FROM `purchase` where id=$id");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function ffb_data()
    {
        $result = $this->db->query("SELECT * FROM `ffb_data`");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function purchase_course($uid, $course_id)
    {
        $result = $this->db->query("SELECT * FROM `payment_history` where user_id = $uid and course_id=$course_id");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function purchase_detail($id)
    {
        $result = $this->db->query("SELECT * FROM `purchase`  WHERE id=$id");
        if ($result->num_rows() > 0) {
            $result->result();
        } else {
            return 0;
        }
    }

    public function purchased($data, $course_image)
    {
        $data =
            [
                'user_id' => $data['user_id'],
                'course_image' => $course_image,
                'course_id' => $data['course_id'],
                'purchase_date' => $data['purchase_date'],
                'transaction_id' => $data['transaction_id'],
                'amount' => $data['amount'],
                'transaction_status' => $data['transaction_status'],
            ];
        if ($this->db->insert('purchase', $data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function user_course_data_buy($user_id)
    {
        $result = $this->db->query("SELECT * FROM `purchase`  WHERE user_id=$user_id and transaction_status='Approved' ");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }
    public function user_course_data_done($user_id)
    {
        $result = $this->db->query("SELECT * FROM `purchase`  WHERE user_id=$user_id and transaction_status='Approved' and user_course_status='Done' ");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }
    public function payment_history()
    {
        if ($this->session->userdata('role') === '2') {

            $id = $this->session->userdata('admin_id');
            $result = $this->db->query("SELECT purchase.*,(SELECT users.username FROM `users` WHERE users.id=purchase.user_id)as user_name,(SELECT detail.course_name FROM `detail` WHERE detail.id=purchase.course_id)as course_name,(SELECT detail.course_image FROM `detail` WHERE detail.id=purchase.course_id)as course_image,(SELECT course_status.course_status_name FROM `course_status` WHERE course_status.id=purchase.user_course_status)as course_user_status FROM `purchase` where purchase.user_id=$id ORDER BY `purchase`.`id` DESC, `purchase`.`purchase_date` DESC;");

        } else {
            $result = $this->db->query("SELECT purchase.*,(SELECT users.username FROM `users` WHERE users.id=purchase.user_id)as user_name,(SELECT detail.course_name FROM `detail` WHERE detail.id=purchase.course_id)as course_name,(SELECT detail.course_image FROM `detail` WHERE detail.id=purchase.course_id)as course_image,(SELECT course_status.course_status_name FROM `course_status` WHERE course_status.id=purchase.user_course_status)as course_user_status FROM `purchase` ORDER BY `purchase`.`id` DESC, `purchase`.`purchase_date` DESC;");
        }
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function purchase_id($uid)
    {
        // $result = $this->db->query("SELECT a.*, b.`id`,b. `course_name`, b.`course_image`, b.`course_author`, b.`c_category`, b.`course_mode`,b. `course_lessons`,b. `course_duration`,b. `course_status`, b.`course_description`, b.`course_price`, b.`long_description` FROM `purchase` a , detail b WHERE a.course_id=b.id and a.user_id=$uid ;");
        $result = $this->db->query("SELECT *,(SELECT users.username FROM `users` WHERE users.id=purchase.user_id)as user_id,(SELECT detail.course_name FROM `detail` WHERE detail.id=purchase.course_id) as course_id,(SELECT detail.course_image FROM `detail` WHERE detail.id=purchase.course_id)as course_image FROM `purchase` WHERE user_id=$uid ORDER BY `purchase`.`id` DESC, `purchase`.`purchase_date` DESC;");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function purchase_api($c_id, $uid)
    {
        $result = $this->db->query("SELECT *,(SELECT users.username FROM `users` WHERE users.id=purchase.user_id)as user_id,(SELECT detail.course_name FROM `detail` WHERE detail.id=purchase.course_id) as course_id,(SELECT detail.course_mode FROM `detail` WHERE detail.id=purchase.course_id) as course_mode,(SELECT detail.course_image FROM `detail` WHERE detail.id=purchase.course_id)as course_image FROM `purchase` WHERE course_id=$c_id and user_id=$uid ORDER BY `purchase`.`id` DESC, `purchase`.`purchase_date` DESC;");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function invoice_receipt($id)
    {
        $result = $this->db->query("SELECT * FROM `purchase`  WHERE id=$id");
        if ($result->num_rows() > 0) {
            $result->result();
        } else {
            return 0;
        }
    }


    public function get_course_price_function($courseId)
    {
        $this->db->select('price');
        $this->db->where('id', $courseId);
        $query = $this->db->get('detail');  // Ensure 'detail' is the correct table name

        // Check if the query returned a result
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->price;
        } else {
            return 0;  // Return 0 if no price is found for the course
        }
    }

    // public function invoice_dtl($id)
    // {
    //     $result = $this->db->query("SELECT purchase.*, purchase.user_id as in_id, form_submissions.*, detail.* FROM purchase 
    //                             JOIN form_submissions ON form_submissions.user_id = purchase.user_id 
    //                             JOIN detail ON detail.id = purchase.course_id 
    //                             WHERE purchase.id = $id;");

    //     if ($result->num_rows() > 0) {
    //         return $result->result();
    //     } else {
    //         return [];
    //     }
    // }

    public function invoice_dtl($user_id)
    {
        $result = $this->db->query("
            SELECT 
                purchase.*, 
                form_submissions.*, 
                detail.*,
                form_submissions.email_address AS user_email,
                COALESCE(purchase.user_id, form_submissions.user_id) AS in_id
            FROM purchase
            LEFT JOIN form_submissions ON form_submissions.user_id = purchase.user_id
            LEFT JOIN detail ON detail.id = purchase.course_id
            WHERE purchase.user_id = $user_id OR form_submissions.user_id = $user_id;
        ");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return [];
        }
    }

    public function CoursePurchased($uid, $c_id)
    {
        $this->db->where('user_id', $uid);
        $this->db->where('course_id', $c_id);
        $query = $this->db->get('purchase');
        return $query->num_rows() > 0;
    }

    public function get_course($course_id, $uid)
    {
        // Fetch course data from the database based on course_id
        $this->db->where('id', $course_id);
        $query = $this->db->get('detail');
        $course_data = $query->row_array(); // Get course data as an array

        // Check if the course is purchased by the user
        $course_data['purchased'] = $this->CoursePurchased($uid, $course_id);
        return $course_data;

    }

    public function user_course_data($uid, $c_id)
    {
        $result = $this->db->query("SELECT * FROM `purchase`  WHERE user_id=$uid and 'course_id'=$c_id ");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function certificate_dtl($cid, $uid)
    {

        $result = $this->db->query("SELECT *
            FROM certificate_details
            INNER JOIN form_submissions
            ON certificate_details.user_id = form_submissions.user_id
            INNER JOIN detail
            ON certificate_details.course_id = detail.id  
            WHERE certificate_details.user_id=$uid and certificate_details.course_id=$cid");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function get_purchase_data($user_id, $course_id)
    {
        $this->db->select('paid_amount, left_amount');
        $this->db->from('purchase');
        $this->db->where('user_id', $user_id);
        $this->db->where('course_id', $course_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function purchasedCourses($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('purchase');
    }

    public function completedCourses($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('user_course_status', '3');
        return $this->db->count_all_results('purchase');
    }

    public function earnedCertificates($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('user_course_status', '3');
        return $this->db->count_all_results('purchase');
    }

    public function coursesInProgress($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('user_course_status !=', '3');
        return $this->db->count_all_results('purchase');
    }

    public function totalPurchase()
    {
        return $this->db->count_all('purchase');
    }

    public function currentWeekPurchase()
    {
        $startOfWeek = date('Y-m-d', strtotime('monday this week'));
        $endOfWeek = date('Y-m-d', strtotime('sunday this week'));

        $this->db->where('created_date >=', $startOfWeek . ' 00:00:00');
        $this->db->where('created_date <=', $endOfWeek . ' 23:59:59');

        return $this->db->count_all_results('purchase');
    }

    public function purchased_courses($user_id)
{
    $this->db->select('
        purchase.*, 
        detail.*, 
        course_category.category_name, 
        course_language.language_name
    '); // Selecting fields from all relevant tables
    $this->db->from('purchase');
    $this->db->join('detail', 'purchase.course_id = detail.id'); // Joining detail table
    $this->db->join('course_category', 'detail.category = course_category.id'); // Joining category table
    $this->db->join('course_language', 'detail.language = course_language.id'); // Joining language table
    $this->db->where('purchase.user_id', $user_id);
    
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array(); // Return all matching rows as an array
    } else {
        return []; // Return an empty array if no records found
    }
}

    public function currentMonthPurchase()
    {
        $this->db->where('MONTH(created_date)', date('m'));
        $this->db->where('YEAR(created_date)', date('Y'));
        return $this->db->count_all_results('purchase');
    }

    public function currentYearPurchase()
    {
        $this->db->where('YEAR(created_date)', date('Y'));
        return $this->db->count_all_results('purchase');
    }

    public function customDatePurchase($from_date, $to_date)
    {
        $from_date = date('Y-m-d 00:00:00', strtotime($from_date));
        $to_date = date('Y-m-d 23:59:59', strtotime($to_date));

        $this->db->where('created_date >=', $from_date);
        $this->db->where('created_date <=', $to_date);

        return $this->db->count_all_results('purchase');
    }

    public function totalEnquiry()
    {
        return $this->db->count_all('form_submissions');
    }

    public function totalFollowUp()
    {
        return $this->db->count_all('form_remark');
    }

    public function totalPaidLeads()
    {
        $this->db->where('payment_status', 'Received');
        return $this->db->count_all_results('leads');
    }


    public function currentMonthEnquiry()
    {
        $this->db->where('MONTH(created_at)', date('m'));
        $this->db->where('YEAR(created_at)', date('Y'));
        return $this->db->count_all_results('form_submissions');
    }

    // public function customDateEnquiry($from_date, $to_date)
    // {
    //     $from_date = date('Y-m-d 00:00:00', strtotime($from_date));
    //     $to_date = date('Y-m-d 23:59:59', strtotime($to_date));

    //     $this->db->where('created_at >=', $from_date);
    //     $this->db->where('created_at <=', $to_date);

    //     return $this->db->count_all_results('form_submissions');
    // }

    public function total_income()
    {
        $this->db->select_sum('final_amount');
        $query = $this->db->get('purchase');
        return $query->row()->final_amount;
    }

    public function get_all_inquiries()
    {
        $query = $this->db->get('form_submissions');
        return $query->result_array();
    }

}
?>