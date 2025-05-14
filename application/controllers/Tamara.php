<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamara extends CI_Controller
{

	private $api_url;
	private $api_token;
	private $public_key;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'form']);
		$this->load->library('session');
		$this->config->load('config');
		$this->load->database();

		// Set Tamara API Credentials
		$this->api_url = $this->config->item('tamara_api_url');
		$this->api_token = $this->config->item('tamara_api_token');
		$this->public_key = $this->config->item('tamara_public_key');
	}

	public function create_order()
	{
		log_message('info', 'Initiating Tamara payment process');
		
		    // Dumping config values for debugging
    var_dump($this->api_url);
    var_dump($this->api_token);
    var_dump($this->public_key);

		$user_id = 64; // Replace with dynamic user ID
		$course_id = 324; // Replace with dynamic course ID
		$original_amount = 2999.00; // Base price before tax/discount
		$currency = 'AED';
		$installments = 1;

		if (empty($user_id) || empty($course_id)) {
			log_message('error', 'Missing required parameters: user_id or course_id');
			show_error('Invalid request. Required parameters missing.', 400);
			return;
		}

		$order_reference_id = "order_" . rand(10000, 999999);

		// Amount breakdown
		$discount_amount = 100.00;
		$tax_amount = 10.00;
		$shipping_amount = 1.00;

		$item_total = $original_amount + $tax_amount;
		$net_amount = $item_total + $shipping_amount - $discount_amount;
		$installment_amount = round($net_amount / $installments, 2);

		$order_data = [
			"auto_capture" => true,
			"total_amount" => [
				"amount" => $net_amount,
				"currency" => $currency
			],
			"shipping_amount" => [
				"amount" => $shipping_amount,
				"currency" => $currency
			],
			"tax_amount" => [
				"amount" => $tax_amount,
				"currency" => $currency
			],
			"order_reference_id" => $order_reference_id,
			"order_number" => "#" . uniqid(),
			"discount" => [
				"name" => "Voucher A",
				"amount" => [
					"amount" => $discount_amount,
					"currency" => $currency
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
						"amount" => $discount_amount,
						"currency" => $currency
					],
					"tax_amount" => [
						"amount" => $tax_amount,
						"currency" => $currency
					],
					"unit_price" => [
						"amount" => $original_amount,
						"currency" => $currency
					],
					"total_amount" => [
						"amount" => $item_total,
						"currency" => $currency
					]
				]
			],
			"consumer" => [
				"email" => "customer@email.com",
				"first_name" => "Mona",
				"last_name" => "Lisa",
				"phone_number" => "+971544337866"
			],
			"country_code" => "AE",
			"description" => "Order for Lego City 8601.",
			"merchant_url" => [
				"cancel" => base_url('tamara/cancel'),
				"failure" => base_url('tamara/failure'),
				"success" => base_url('tamara/success'),
				"notification" => base_url('tamara/notification/')
			],
			"payment_type" => "PAY_BY_INSTALMENTS",
			"instalments" => $installments,
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
			"locale" => "AE"
		];

		$headers = [
			'Content-Type: application/json',
			'Authorization: Bearer ' . $this->api_token,
			'X-Public-Key: ' . $this->public_key,
			'Accept: application/json'
		];

		log_message('info', 'Sending API Request to Tamara...');
		$ch = curl_init($this->api_url . "/checkout");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($order_data));
		curl_setopt($ch, CURLOPT_VERBOSE, true); // For curl debug (logs in web server output)

		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		log_message('info', "Tamara API Response (HTTP $http_code): $response");

		if ($http_code !== 200) {
			log_message('error', "Tamara API Error: HTTP Code $http_code - Response: $response");
			show_error("Error: Unable to create Tamara order. Tamara responded: $response", $http_code);
			return;
		}

		$response_data = json_decode($response, true);
		if (!isset($response_data['checkout_url'], $response_data['order_id'])) {
			log_message('error', 'Tamara API returned an invalid response: ' . json_encode($response_data));
			show_error("Invalid response from Tamara API.", 500);
			return;
		}

		$tamara_order_id = $response_data['order_id'];
		log_message('info', "Tamara Order Created Successfully: $tamara_order_id");

		$existing_order = $this->db
			->where('tamara_order_id', $tamara_order_id)
			->where('user_id', $user_id)
			->where('course_id', $course_id)
			->get('purchase')
			->row();

		$this->db->trans_start();

		if (!$existing_order) {
			$purchase_data = [
				'user_id' => $user_id,
				'course_id' => $course_id,
				'transaction_status' => 'Pending',
				'transaction_id' => $order_reference_id,
				'tamara_order_id' => $tamara_order_id,
				'amount' => 0.00,
				'purchase_date' => date('Y-m-d'),
				'payment_mode' => 'Tamara',
				'final_amount' => $original_amount,
				'installments_total' => $installments,
				'installments_paid' => 0,
				'installments_pending' => $installments,
				'basic_amount' => $original_amount,
				'paid_amount' => 0.00,
				'created_date' => date('Y-m-d H:i:s')
			];

			if (!$this->db->insert('purchase', $purchase_data)) {
				log_message('error', 'Database Error: Failed to insert purchase data.');
				show_error('Database Error: Failed to insert purchase data.', 500);
				return;
			}

			log_message('info', "Order Inserted Successfully in `purchase` Table");
		}

		for ($i = 1; $i <= $installments; $i++) {
			$due_date = date('Y-m-d', strtotime("+" . ($i * 30) . " days"));

			$existing_installment = $this->db
				->where('tamara_order_id', $tamara_order_id)
				->where('installment_no', $i)
				->get('installments')
				->row();

			if (!$existing_installment) {
				$installments_data = [
					'tamara_order_id' => $tamara_order_id,
					'installment_no' => $i,
					'amount' => $installment_amount,
					'status' => 'Pending',
					'due_date' => $due_date
				];
				$this->db->insert('installments', $installments_data);
			}
		}

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			echo json_encode(['status' => 'error', 'message' => 'Failed to create order']);
		} else {
			echo json_encode(['status' => 'success', 'message' => 'Order created successfully']);
		}

		// Authorize (if needed)
		$this->authorize_order($tamara_order_id);

		// Redirect user
		redirect($response_data['checkout_url']);
	}


	private function authorize_order($tamara_order_id)
	{
		if (empty($tamara_order_id)) {
			log_message('error', "Tamara Authorization failed: order_id is empty.");
			return false;
		}

		$url = rtrim($this->api_url, '/') . "/orders/{$tamara_order_id}/authorise";
		log_message('info', "Sending Tamara Authorization Request to URL: $url");

		$headers = [
			'Accept: application/json',
			'Authorization: Bearer ' . $this->api_token
		];

		$ch = curl_init($url);
		curl_setopt_array($ch, [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER     => $headers,
			CURLOPT_CUSTOMREQUEST  => 'POST',
			CURLOPT_POSTFIELDS     => "", // No body
			CURLOPT_TIMEOUT        => 30,
		]);

		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$error = curl_error($ch);
		curl_close($ch);

		log_message('info', "Tamara Order Authorization Response: HTTP Code: $http_code, Response: $response");

		if ($error) {
			log_message('error', "Tamara Authorization cURL Error: $error");
			return false;
		}

		if ($http_code === 200) {
			$response_data = json_decode($response, true);

			if (json_last_error() !== JSON_ERROR_NONE) {
				log_message('error', "Tamara API JSON decode error: " . json_last_error_msg());
				return false;
			}

			if (isset($response_data['order_id'], $response_data['status'])) {
				$capture_id = $response_data['capture_id'] ?? null;
				log_message('info', "Order ID: {$response_data['order_id']} successfully authorized. Status: {$response_data['status']}. Capture ID: {$capture_id}");

				return [
					'status' => $response_data['status'],
					'capture_id' => $capture_id,
					'auto_captured' => $response_data['auto_captured'] ?? false
				];
			} else {
				log_message('error', "Tamara API responded with missing fields: " . json_encode($response_data));
				return false;
			}
		} else {
			log_message('error', "Tamara Authorization Failed for Order ID: $tamara_order_id, HTTP Code: $http_code, Response: $response");
			return false;
		}
	}


	private function capture_order($tamara_order_id, $amount, $currency = "AED")
    {
        $url = "{$this->api_url}/payments/capture";
    
        // Capture data array to send to Tamara API
        $capture_data = [
            "order_id" => $tamara_order_id,
            "total_amount" => [
                "amount" => $amount,
                "currency" => $currency
            ],
            "shipping_info" => [
                "shipped_at" => date('c'),
                "shipping_company" => "DHL",
                "tracking_number" => "100",
                "tracking_url" => "https://shipping.com/tracking?id=123456"
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
                        "currency" => $currency
                    ],
                    "tax_amount" => [
                        "amount" => 10,
                        "currency" => $currency
                    ],
                    "unit_price" => [
                        "amount" => $amount,
                        "currency" => $currency
                    ],
                    "total_amount" => [
                        "amount" => 100,
                        "currency" => $currency
                    ]
                ]
            ],
            "discount_amount" => [
                "amount" => 0,
                "currency" => $currency
            ],
            "shipping_amount" => [
                "amount" => 0,
                "currency" => $currency
            ],
            "tax_amount" => [
                "amount" => 100,
                "currency" => $currency
            ]
        ];
    
        // Set headers for the request
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->api_token
        ];
    
        // Initialize cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($capture_data));
    
        // Execute cURL and capture response
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
    
        log_message('info', "Tamara Order Capture Response: $response");
    
        // Check if capture was successful (HTTP 200 OK)
        if ($http_code === 200) {
            $response_data = json_decode($response, true);
            
            if (isset($response_data['capture_id'])) {
                log_message('info', "Order ID: $tamara_order_id successfully captured. Capture ID: {$response_data['capture_id']}");
                return $response_data; // Return response if capture was successful
            } else {
                log_message('error', "Capture successful but capture_id missing in response.");
                return ['status' => 'error', 'message' => 'Capture successful but missing capture_id.'];
            }
        } else {
            log_message('error', "Tamara Capture Failed for Order ID: $tamara_order_id, HTTP Code: $http_code, Response: $response, CURL Error: $error");
            return [
                'status' => 'error',
                'message' => "Tamara Capture Failed, HTTP Code: $http_code, CURL Error: $error",
                'response' => $response
            ];
        }
    }


	public function process_order($tamara_order_id, $amount, $currency = "AED")
	{
		$authorization = $this->authorize_order($tamara_order_id);

		if ($authorization !== false) {

			if ($authorization['auto_captured'] && !empty($authorization['capture_id'])) {
				log_message('info', "Order auto-captured during authorization. Capture ID: {$authorization['capture_id']}");
				return [
					'status' => 'success',
					'capture_id' => $authorization['capture_id'],
					'message' => 'Order auto-authorized and auto-captured successfully.'
				];
			} else {
				$capture_response = $this->capture_order($tamara_order_id, $amount, $currency);

				if ($capture_response && !empty($capture_response['capture_id'])) {
					log_message('info', "Order manually captured. Capture ID: {$capture_response['capture_id']}");
					return [
						'status' => 'success',
						'capture_id' => $capture_response['capture_id'],
						'message' => 'Order authorized and captured successfully.'
					];
				} else {
					log_message('error', "Manual capture failed for Order ID: $tamara_order_id.");
					return [
						'status' => 'error',
						'message' => 'Order authorized but capture failed.'
					];
				}
			}
		} else {
			log_message('error', "Order authorization failed for Order ID: $tamara_order_id.");
			return [
				'status' => 'error',
				'message' => 'Order authorization failed.'
			];
		}
	}



	public function notification()
    {
        // Load raw payload
        $raw_payload = file_get_contents('php://input');
        $data = json_decode($raw_payload, true);
        
        // Log raw payload for debugging
        log_message('info', 'Tamara Webhook Received: ' . json_encode($data));
        
        // Load Tamara webhook notification key and token from config or environment
        $tamara_notification_key = 'b01d453f-3fce-4346-b4a0-ad84bd31c923';  // Set your notification key here
        $tamara_webhook_token = '0a0889017d4189be77b7ee87baf86d3d';         // Set your webhook token here
        
        // Get the X-Tamara-Webhook-Signature header (Tamara signature)
        $received_signature = $_SERVER['HTTP_X_TAMARA_WEBHOOK_SIGNATURE'] ?? '';
        
        // Compute the expected signature using HMAC with SHA-256
        $expected_signature = hash_hmac('sha256', $raw_payload, $tamara_webhook_token);
        
        // Securely compare the received and expected signatures
        if (!hash_equals($expected_signature, $received_signature)) {
            log_message('error', 'Tamara webhook signature mismatch');
            http_response_code(401);  // Unauthorized response
            echo json_encode(['status' => 'error', 'message' => 'Invalid signature']);
            return;
        }
        
        // Validate required fields in the payload
        if (empty($data['order_reference_id']) || empty($data['payment_status'])) {
            log_message('error', 'Invalid webhook payload received');
            echo json_encode(['status' => 'error', 'message' => 'Invalid webhook data']);
            return;
        }
        
        // Extract necessary data from the payload
        $transaction_id = $data['order_reference_id'];
        $payment_status = strtolower($data['payment_status']);
        
        // Handle the payment status
        if ($payment_status === 'approved') {
            log_message('info', "Processing payment update for transaction: $transaction_id");
            
            // TODO: Add your order fulfillment or update logic here
            // Example: Update your database or notify the user
            
            echo json_encode(['status' => 'success', 'message' => 'Payment approved']);
        } else {
            log_message('info', "Payment not approved for transaction: $transaction_id");
            
            // Optionally handle 'declined', 'cancelled', etc.
            
            echo json_encode(['status' => 'success', 'message' => 'Payment not approved']);
        }
    }
    


	public function success()
	{
		log_message('info', 'Payment success callback received: ' . json_encode($_GET));

		$payment_status = $this->input->get('paymentStatus', true);
		$order_id = $this->input->get('orderId', true);

		if (empty($payment_status) || empty($order_id)) {
			log_message('error', 'Missing payment parameters in success callback');
			show_error("Invalid payment response. Required parameters missing.", 400);
			return;
		}

		// Check if the order exists in DB
		$query = $this->db->get_where('purchase', ['tamara_order_id' => $order_id]);

		if ($query->num_rows() == 0) {
			log_message('error', "Order ID: $order_id not found in the database");
			show_error("Order not found.", 404);
			return;
		}

		if ($payment_status === "approved") {
			log_message('info', "Updating database for successful payment, order ID: $order_id");

			// Update `transaction_status` in the `purchase` table
			$this->db->where('tamara_order_id', $order_id);
			$this->db->update('purchase', ['transaction_status' => 'Approved']);

			// Fetch the first pending installment
			$this->db->where('tamara_order_id', $order_id);
			$this->db->where('status', 'Pending');
			$this->db->order_by('installment_no', 'ASC');
			$this->db->limit(1);
			$query = $this->db->get('installments');

			if ($query->num_rows() > 0) {
				$installment = $query->row_array();

				// Mark installment as paid
				$this->db->where('id', $installment['id']);
				$this->db->update('installments', [
					'status' => 'Paid',
					'paid_date' => date('Y-m-d H:i:s')
				]);

				// Update Purchase Table
				$this->db->where('tamara_order_id', $order_id);
				$purchase = $this->db->get('purchase')->row_array();

				if ($purchase) {
					$paid_amount = $purchase['paid_amount'] + $installment['amount'];
					$amount = $purchase['amount'] + $installment['amount'];
					$left_amount = max($purchase['final_amount'] - $installment['amount'], 0);
					$installments_paid = $purchase['installments_paid'] + 1;
					$installments_pending = max($purchase['installments_pending'] - 1, 0);

					$update_purchase_data = [
						'paid_amount' => $paid_amount,
						'amount' => $amount,
						'left_amount' => $left_amount,
						'installments_paid' => $installments_paid,
						'installments_pending' => $installments_pending
					];

					$this->db->where('tamara_order_id', $order_id);
					$this->db->update('purchase', $update_purchase_data);
				}
			}

			// Verify if update was successful
			if ($this->db->affected_rows() > 0) {
				log_message('info', "Transaction status updated to 'Approved' for order ID: $order_id");
			} else {
				log_message('error', "Database update failed for order ID: $order_id");
			}

			$tamara_order_id = $order_id;
			if ($this->authorize_order($tamara_order_id)) {
				$this->capture_order($tamara_order_id, $amount);
			} else {
				log_message('error', "Skipping capture: Authorization failed for order ID: $tamara_order_id");
			}


			// Redirect to the thank-you page
			redirect('admin/purchase/purchase_view');
		} else {
			log_message('error', "Payment failed for order ID: $order_id");

			// Update `transaction_status` in the `purchase` table
			$this->db->where('tamara_order_id', $order_id);
			$this->db->update('purchase', ['transaction_status' => 'Failed']);

			redirect(base_url('tamara/failure'));
		}
	}

	public function failure()
	{
		log_message('info', 'Payment failed');
		echo 'Payment Failed';
	}

	public function cancel()
	{
		log_message('info', 'Payment cancel callback received: ' . json_encode($_GET));

		// Fetch order details based on the order ID
		$order_id = $this->input->get('orderId', true); // Order ID passed via query parameter

		// Validate that the order ID is present
		if (empty($order_id)) {
			log_message('error', 'Missing order ID in cancel callback');
			show_error('Order ID is missing', 400);
			return;
		}

		// Check if the order exists in the database
		$this->db->where('tamara_order_id', $order_id);
		$query = $this->db->get('purchase');

		if ($query->num_rows() == 0) {
			log_message('error', "Order ID: $order_id not found in the database");
			show_error("Order not found.", 404);
			return;
		}

		// Update transaction status in the purchase table to 'Cancelled'
		log_message('info', "Updating database for cancelled payment, order ID: $order_id");
		$this->db->where('tamara_order_id', $order_id);
		$this->db->update('purchase', ['transaction_status' => 'Cancelled']);

		// Optionally, update the installments if you need to revert any pending payments
		$this->db->where('tamara_order_id', $order_id);
		$this->db->where('status', 'Pending');
		$installments_query = $this->db->get('installments');

		if ($installments_query->num_rows() > 0) {
			// For each pending installment, revert or mark as 'Cancelled'
			foreach ($installments_query->result_array() as $installment) {
				$this->db->where('id', $installment['id']);
				$this->db->update('installments', [
					'status' => 'Cancelled',
					'cancelled_date' => date('Y-m-d H:i:s')
				]);
			}
		}

		// Check if the update was successful
		if ($this->db->affected_rows() > 0) {
			log_message('info', "Transaction status updated to 'Cancelled' for order ID: $order_id");
		} else {
			log_message('error', "Database update failed for order ID: $order_id");
		}

		// Redirect to the failure page (or another page as needed)
		echo 'Payment Cancelled';
	}
}
