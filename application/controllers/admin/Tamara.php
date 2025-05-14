<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamara extends CI_Controller {

    private $api_url;
    private $api_token;
    private $public_key;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->config->load('config');

        // Set Tamara API Credentials
        $this->api_url = $this->config->item('tamara_api_url');
        $this->api_token = $this->config->item('tamara_api_token');
        $this->public_key = $this->config->item('tamara_public_key');
    }

    public function create_order()
    {
        log_message('info', 'Creating a new Tamara order');
    
        // Order Data
        $order_data = [
            "total_amount" => [
                "amount" => 400,
                "currency" => "AED"
            ],
            "shipping_amount" => [
                "amount" => 1,
                "currency" => "AED"
            ],
            "tax_amount" => [
                "amount" => 10,
                "currency" => "AED"
            ],
            "order_reference_id" => "order_123456",
            "order_number" => "A123125",
            "discount" => [
                "name" => "Voucher A",
                "amount" => [
                    "amount" => 100,
                    "currency" => "AED"
                ]
            ],
            "items" => [
                [
                    "name" => "Lego City 8601",
                    "type" => "Digital",
                    "reference_id" => "123",
                    "sku" => "SA-12436",
                    "quantity" => 1,
                    "discount_amount" => [
                        "amount" => 100,
                        "currency" => "AED"
                    ],
                    "tax_amount" => [
                        "amount" => 10,
                        "currency" => "AED"
                    ],
                    "unit_price" => [
                        "amount" => 490,
                        "currency" => "AED"
                    ],
                    "total_amount" => [
                        "amount" => 401,
                        "currency" => "AED"
                    ]
                ]
            ],
            "consumer" => [
                "email" => "customer@email.com",
                "first_name" => "Mona",
                "last_name" => "Lisa",
                "phone_number" => "566027755"
            ],
            "country_code" => "AE",
            "description" => "Order for Lego City 8601.",
            "merchant_url" => [
                "cancel" => base_url('tamara/cancel'),
                "failure" => base_url('tamara/failure'),
                "success" => base_url('tamara/success'),
                "notification" => base_url('tamara/notification')
            ],
            "payment_type" => "PAY_BY_INSTALMENTS",
            "instalments" => 3,
            "billing_address" => [
                "city" => "Riyadh",
                "country_code" => "AE",
                "first_name" => "Mona",
                "last_name" => "Lisa",
                "line1" => "3764 Al Urubah Rd",
                "line2" => "string",
                "phone_number" => "532298658",
                "region" => "As Sulimaniyah"
            ],
            "shipping_address" => [
                "city" => "Riyadh",
                "country_code" => "AE",
                "first_name" => "Mona",
                "last_name" => "Lisa",
                "line1" => "3764 Al Urubah Rd",
                "line2" => "string",
                "phone_number" => "532298658",
                "region" => "As Sulimaniyah"
            ],
            "platform" => "Web",
            "is_mobile" => false,
            "locale" => "ar_SA"
        ];
    
        log_message('info', 'Order Data: ' . print_r($order_data, true));
    
        // API URL
        $url = $this->api_url . "/checkout";
    
        // Set Headers
        $headers = [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $this->api_token,
            'X-Public-Key: ' . $this->public_key
        ];
    
        // Initialize cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($order_data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification for testing
    
        // Execute API Request
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);
        curl_close($ch);
    
        log_message('info', "Tamara API Response (HTTP Code: $http_code): " . print_r($response, true));
    
        if ($curl_error) {
            log_message('error', "Tamara API cURL Error: " . $curl_error);
        }
    
        // Decode JSON Response
        $response_data = json_decode($response, true);
    
        if (!empty($response_data['checkout_url'])) {
            log_message('info', 'Tamara Checkout URL: ' . $response_data['checkout_url']);
            redirect($response_data['checkout_url']);
        } else {
            echo "Error: Unable to create Tamara order. Check logs for details.";
        }
    }

}
