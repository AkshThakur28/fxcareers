<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabby Payment Integration</title>
</head>
<body>

<h2>Tabby Payment Form</h2>

<!-- Payment Form -->
<form action="<?= site_url('TabbyPayment/create_checkout') ?>" method="post">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
value="<?php echo $this->security->get_csrf_hash(); ?>">
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="card.success@tabby.ai" required>
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="+971500000001" required>
    </div>
    <div>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" value="150.00" required>
    </div>
    <div>
        <button type="submit">Pay Now</button>
    </div>
</form>

</body>
</html>
