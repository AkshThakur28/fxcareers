<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabbyPayment extends CI_Controller {

    public function index() {
        // Load the index view
        $this->load->view('tabby/index');
    }

    public function create_checkout($id) {
        // Load URL helper for base_url()
        $this->load->helper('url');

        // Check if user is logged in
        $user_id = $this->session->userdata('id'); // Replace 'user_id' with your session key

        // Load required models
        $this->load->model('admin/User_model', 'User_model'); // Replace 'YourModel' with your actual model name
        $this->load->model('admin/Detail_model', 'detail_model');
        
        // Get user details
        $user = $this->User_model->get_user_by_id($id);
        $email = $this->session->userdata('email');
        $mobile = $this->session->userdata('mobile');

        // Get course details
        $course = $this->detail_model->course_detail_view($id);
        if (!$course) {
            show_error('Course not found');
        }
        $course = $course[0]; // Assuming a single course is returned

        // Tabby API integration
        $apiUrl = 'https://api.tabby.ai/api/v2/checkout';
        $apiKey = 'sk_test_019242fe-ea40-9fe3-abc2-14e9bb13e12a'; // Replace with your Tabby API Key

        // Prepare the data payload
        $postData = [
            "payment" => [
                "amount" => $course->price,
                "currency" => "AED",
                "description" => "Course: " . $course->course_name, // Adjust as needed
                "buyer" => [
                    "email" => $email,
                    "phone" => $mobile
                ],
            ],
            "order" => [
                "reference_id" => "order_" . uniqid(),
                "items" => [
                    [
                        "title" => $course->course_name,
                        "quantity" => 1,
                        "unit_price" => $course->price
                    ]
                ]
            ],
            "merchant_code" => "FutureFin",
            "merchant_urls" => [
                "success" => base_url('TabbyPayment/success'),
                "cancel"  => base_url('TabbyPayment/cancel'),
                "failure" => base_url('TabbyPayment/failure')
            ]
        ];

        // Convert payload to JSON
        $jsonData = json_encode($postData);

        // Initialize cURL
        $ch = curl_init($apiUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ]);

        // Execute cURL request
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close cURL session
        curl_close($ch);

        // Handle the response
        if ($httpCode === 200) {
            $responseData = json_decode($response, true);
            if (isset($responseData['configuration']['available_products']['installments'][0]['web_url'])) {
                redirect($responseData['configuration']['available_products']['installments'][0]['web_url']);
            } else {
                echo "Failed to retrieve the Tabby checkout URL.";
            }
        } else {
            echo "Error occurred. HTTP Status Code: $httpCode";
            echo "<br>Response: " . $response; 
            echo $jsonData;
        }
    }

    public function success() {
        $paymentData = $this->session->flashdata('payment_data');
        $data['paymentData'] = $paymentData;
        $this->load->view('tabby/payment_success', $data);
    }

    public function cancel() {
        // Payment canceled logic
        $this->load->view('tabby/payment_cancel');
    }

    public function failure() {
        // Payment failed logic
        $this->load->view('tabby/payment_failure');
    }
}
