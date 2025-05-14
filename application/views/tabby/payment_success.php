<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
</head>
<body>

    <h2>Payment Successful!</h2>

    <?php if (isset($paymentData)): ?>
        <h3>Payment Details:</h3>
        <p><strong>Order Reference ID:</strong> <?= $paymentData['order']['reference_id'] ?></p>
        <p><strong>Amount Paid:</strong> <?= $paymentData['payment']['amount'] ?> AED</p>
        <p><strong>Buyer Email:</strong> <?= $paymentData['payment']['buyer']['email'] ?></p>
        <p><strong>Phone:</strong> <?= $paymentData['payment']['buyer']['phone'] ?></p>

        <h4>Payment Status:</h4>
        <p>Transaction was successful. Thank you for your payment!</p>
    <?php else: ?>
        <p>There was an issue with retrieving the payment data.</p>
    <?php endif; ?>

</body>
</html>
