<?php
require_once 'db.php';
session_start();  // Start the session

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "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";
\Stripe\Stripe::setApiKey($stripe_secret_key);

   $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_mobile = $_POST['mobile'];
    $user_location = $_POST['location'];
    $user_source = 'landing page';
    $user_campaing = 'Forex Power Strategies Bootcamp';
    $sql = "INSERT INTO `leads`( `name`, `email`, `mobile`, `location`, `source`, `campaing`) VALUES  ('$user_name', '$user_email', $user_mobile,'$user_location','$user_source','$user_campaing')";

    if (mysqli_query($connection, $sql)) {
        
        $last_id = mysqli_insert_id($connection);
     
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    
try {
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
       $user_id=$last_id;

    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_email'] = $user_email;
    $_SESSION['user_id'] = $user_id;

    // Get the product details
    $product_name = 'Forex Power Strategies Bootcamp';
    $unit_amount = 10000; // Amount in cents (100 USD)

    // Create the Stripe Checkout session with customer details
    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "https://fxcareers.ae/fpsb/success.php?session_id={CHECKOUT_SESSION_ID}",  // Include session ID
        "cancel_url" => "https://fxcareers.ae/fpsb/",
        "locale" => "auto",
        "line_items" => [
            [
                "quantity" => 1,
                "price_data" => [
                    "currency" => "usd",
                    "unit_amount" => $unit_amount,
                    "product_data" => [
                        "name" => $product_name
                    ]
                ]
            ]
        ],
        "customer_email" => $user_email,  // Pre-fill customer email in Stripe Checkout
        "client_reference_id" => $user_id,  // Associate this checkout with your user ID
        "metadata" => [
            "user_name" => $user_name,
            "user_email" => $user_email,
            "user_id" => $user_id
        ]
    ]);

    // Redirect to Stripe Checkout
    http_response_code(303);
    header("Location: " . $checkout_session->url);

} catch (Exception $e) {
    // Display error message
    echo 'Error: ' . $e->getMessage();
}
?>
