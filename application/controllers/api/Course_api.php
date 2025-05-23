<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Course_api extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Authorization_Token');
        $this->load->model('admin/Auth_model', 'Auth_model');
        $this->load->model('admin/course_model', 'course_model');
        $this->load->model('admin/detail_model', 'detail_model');
        $this->load->model('admin/curriculum_model', 'curriculum_model');
        $this->load->model('admin/topic_model', 'topic_model');
    }



    public function course_get()
    {
        $headers = $this->input->request_headers();
        if (!empty($headers['Authorization'])) {
            $decodedToken = $this->authorization_token->validateToken(trim($headers['Authorization']));
            if ($decodedToken['status']) {
        $id = $this->uri->segment(4);
        $data = $this->detail_model->details($id);
        $this->response($data, REST_Controller::HTTP_OK);
    } else {
        $this->response($decodedToken, REST_Controller::HTTP_UNAUTHORIZED);
    }
} else {
    $this->response(['Authentication failed'], REST_Controller::HTTP_UNAUTHORIZED);
}
    }


    public function course_by_id_get()
    {
        $headers = $this->input->request_headers();
        if (!empty($headers['Authorization'])) {
            $decodedToken = $this->authorization_token->validateToken(trim($headers['Authorization']));
            if ($decodedToken['status']) {
        $id = $this->uri->segment(4);
        $data = $this->detail_model->detail($id);
        $this->response($data, REST_Controller::HTTP_OK);
    } else {
        $this->response($decodedToken, REST_Controller::HTTP_UNAUTHORIZED);
    }
} else {
    $this->response(['Authentication failed'], REST_Controller::HTTP_UNAUTHORIZED);
}
    }
   
    public function curriculum_get()
    {
        $headers = $this->input->request_headers();
        if (!empty($headers['Authorization'])) {
            $decodedToken = $this->authorization_token->validateToken(trim($headers['Authorization']));
            if ($decodedToken['status']) {
        $id = $this->uri->segment(4);
        $tp_id = $this->uri->segment(5);
        $data = $this->curriculum_model->curriculum($id,$tp_id);
        $this->response($data, REST_Controller::HTTP_OK);
    } else {
        $this->response($decodedToken, REST_Controller::HTTP_UNAUTHORIZED);
    }
} else {
    $this->response(['Authentication failed'], REST_Controller::HTTP_UNAUTHORIZED);
}
    }

    public function topic_get()
    {
        $headers = $this->input->request_headers();
        if (!empty($headers['Authorization'])) {
            $decodedToken = $this->authorization_token->validateToken(trim($headers['Authorization']));
            if ($decodedToken['status']) {
        $id = $this->uri->segment(4);
        $tp_id = $this->uri->segment(5);
        $data = $this->topic_model->topic($id);
        $this->response($data, REST_Controller::HTTP_OK);
    } else {
        $this->response($decodedToken, REST_Controller::HTTP_UNAUTHORIZED);
    }
} else {
    $this->response(['Authentication failed'], REST_Controller::HTTP_UNAUTHORIZED);
}
    }

    public function insert_fbad_data_post()
    {
      
        $data_fb = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'source' => $this->input->post('source'),
            'campaing' => $this->input->post('campaing'),
         
        );
        
    

        $inserted_fb = $this->db->insert('leads', $data_fb);
       
        if ($inserted_fb) {
            $this->response(['message' => 'FB Lead Data Inserted Successfully'], REST_Controller::HTTP_CREATED);
        } else {
            $this->response(['message' => 'FB Lead Data Insertion Failed'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }     
        
    }


}
?>