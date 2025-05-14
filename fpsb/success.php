<?php
require_once 'db.php';
session_start();  // Start the session

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "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";
\Stripe\Stripe::setApiKey($stripe_secret_key);

if (isset($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    try {
        // Retrieve the Checkout Session from Stripe
        $session = \Stripe\Checkout\Session::retrieve($session_id);

        // Get the metadata from the session
        $user_name = $session->metadata->user_name;
        $user_email = $session->metadata->user_email;
        $user_id = $session->metadata->user_id;
        $transaction_id = $session->payment_intent;
        $paid_amount = $session->amount_total / 100; // Stripe returns amount in cents
        $purchase_date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `workshop_payment`(`wk_id`, `tr_id`, `tr_date`, `tr_amount`) VALUES   ('$user_id', '$transaction_id', '$purchase_date','$paid_amount')";

        if (mysqli_query($connection, $sql)) {
            
           echo  $sql_update = "UPDATE `leads` SET `payment_status`='Received' WHERE id=$user_id";
            if (mysqli_query($connection, $sql_update)) {
                header("Location: thank_you.php");
                exit();
            } else {
                echo "Error updating status: " . mysqli_error($connection);
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
       
        
        // Optionally clear session data
        session_unset();  
        session_destroy();

    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'No session ID found.';
}
?>
