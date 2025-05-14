<?php
class Questions_model extends CI_Model
{


	public function questions_data_submit($data)
	{
		$data = [
			'question' => $data['question'],
			'answer1' => $data['answer1'],
			'answer2' => $data['answer2'],
			'answer3' => $data['answer3'],
			'answer4' => $data['answer4'],
			'correct_answer' => $data['correct_answer'],
		];
		if ($this->db->insert('questions', $data)) {

			return $data;
		} else {
			return false;
		}
	}

	public function questions_view()
	{
		$result = $this->db->query("SELECT * FROM `questions` ORDER BY RAND() LIMIT 5");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}
	// public function questions() {
//     $result = $this->db->query("SELECT * FROM `questions` ORDER BY RAND() LIMIT 5");
//     if ($result->num_rows() > 0) {
//         return $result->result();
//     } else {
//         return 0;
//     }
// }

	public function questions_data_nm()
	{
		$uid = $this->uri->segment(2);
		$result = $this->db->query("SELECT * FROM `questions` WHERE REPLACE(LOWER(slug), ' ', '-')='$uid'");

		if ($result->num_rows() > 0) {
			return $result->result(); // Return the fetched data
		} else {
			return 0;
		}
	}



	public function questions_delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('questions');
	}


	public function questions_update_data($data)
	{
		$newdata = [
			'question' => $data['question'],
			'answer1' => $data['answer1'],
			'answer2' => $data['answe2'],
			'answer3' => $data['answer3'],
			'answer4' => $data['answer4'],
			'correct_answer' => $data['correct_answer'],
		];
		$this->db->where('id', $data['id']);
		if ($this->db->update('questions', $newdata)) {

			return $newdata;
		} else {
			return false;
		}
	}


	public function questions_edit($id)
	{

		$result = $this->db->query("SELECT * FROM `questions` where id=$id");
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}
	// public function get_correct_answers() {
	// 	$result = $this->db->query("SELECT id, correct_answer FROM questions");
	// 	if ($result->num_rows() > 0) {
	// 		return $result->result_array();
	// 	} else {
	// 		return false;
	// 	}
	// }

	public function get_questions($limit = 5)
	{
		$this->db->order_by('RAND()');
		$this->db->limit($limit);
		$query = $this->db->get('questions');
		return $query->result();
	}
	public function get_correct_answers()
	{
		// Fetch only correct answers from the questions table
		$query = $this->db->get('answers');
		return $query->result();
	}

	public function insert_user_data($data)
	{
		// Insert user data (including score) into a database table
		return $this->db->insert('form_submissions', $data);
	}

	public function answer_view($qid)
	{
		$result = $this->db->query("SELECT * FROM `questions` where id=$qid");

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}

	public function save_result($user_id, $score)
	{
		$data = array(
			'user_id' => $user_id,
			'score' => $score
		);
		$this->db->insert('results', $data);
	}

	//     public function get_latest_score() {
	//     // $this->db->where('user_id', $user_id);
	//     $this->db->order_by('id', 'DESC');
	//     $this->db->limit(1);
	//     $query = $this->db->get('form_submissions');
	//     return $query->row();
	// }

	public function get_latest_score()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('form_submissions');
		return $query->row();
	}

}
