~<?php
session_start();

// Security check: Must be logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.html");
    exit;
}

/* 
 * eSewa v2 API Parameters (Testing Environment)
 */
$amount = 100;
$tax_amount = 0;
$total_amount = $amount + $tax_amount;

// We generate a unique transaction ID for each payment attempt
$transaction_uuid = uniqid('violation_'); 

// EPAYTEST is the default product code provided by eSewa for testing
$product_code = 'EPAYTEST';

// The URLs where eSewa will redirect the user after payment
$success_url = 'http://localhost/Traffic%20AI/payment_success.php';
$failure_url = 'http://localhost/Traffic%20AI/payment_failed.php';

// The test Secret Key provided by eSewa
$secret_key = '8gBm/:&EnhH.1/q';

// eSewa v2 requires a signature to verify the data hasn't been tampered with
$message = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=$product_code";
// We hash the message using HMAC SHA256 and base64 encode it
$signature = base64_encode(hash_hmac('sha256', $message, $secret_key, true));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting to eSewa...</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 100px; }
        .loader { border: 4px solid #f3f3f3; border-top: 4px solid #4CAF50; border-radius: 50%; width: 40px; height: 40px; animation: spin 2s linear infinite; margin: 20px auto; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>
    <h2>Securely redirecting you to eSewa for payment...</h2>
    <div class="loader"></div>
    <p>Please wait, do not close or refresh this page.</p>

    <!-- The form that sends data to eSewa's testing endpoint -->
    <form id="esewa_form" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
        <input type="hidden" id="amount" name="amount" value="<?php echo $amount; ?>" required>
        <input type="hidden" id="tax_amount" name="tax_amount" value="<?php echo $tax_amount; ?>" required>
        <input type="hidden" id="total_amount" name="total_amount" value="<?php echo $total_amount; ?>" required>
        <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="<?php echo $transaction_uuid; ?>" required>
        <input type="hidden" id="product_code" name="product_code" value ="<?php echo $product_code; ?>" required>
        <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
        <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
        <input type="hidden" id="success_url" name="success_url" value="<?php echo $success_url; ?>" required>
        <input type="hidden" id="failure_url" name="failure_url" value="<?php echo $failure_url; ?>" required>
        <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
        <input type="hidden" id="signature" name="signature" value="<?php echo $signature; ?>" required>
        
        <!-- Fallback button in case JavaScript is disabled -->
        <noscript>
            <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Click here if not redirected automatically</button>
        </noscript>
    </form>

    <script>
        // Automatically submit the form to eSewa when the page loads
        document.getElementById('esewa_form').submit();
    </script>
</body>
</html>
