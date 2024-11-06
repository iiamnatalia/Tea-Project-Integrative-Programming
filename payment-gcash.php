
<?php
require ('database/connections/conx-customer.php');
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';


$_SESSION['paymeth'] = "GCash";
$grand_total = $_SESSION['grand_total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Payment</title>
    <link rel="stylesheet" href="css/gcash.css">
    <link href="assets/icons/gcashfav.jpg" rel="icon">
    <link href="assets/icons/gcashfav.jpg" rel="apple-touch-icon">
    <script src="https://kit.fontawesome.com/1fd0899690.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
</head>
<body>
    <div class="container">
        <div id="paymentlogo">
            <img src="assets/images/GCash_logo.svg.png">
            <h2>GCash Payment</h2>
        </div>

        <a href="customer-payment-page.php"><i class="fa-solid fa-chevron-left"></i>  Back to Payment Methods</a>
        <form action="customer-payment-record-transaction.php" method="post">
            <div class="payment-fields">
                <label for="total_amount">Amount to Pay:</label><br>
                <input type="text" id="total_amount" value="<?php echo number_format($grand_total, 2); ?>" readonly><br>
                <label for="payment_amount">Payment Amount:</label><br>
                <input type="text" id="payment_amount" name="payment_amount" value="<?php echo number_format($grand_total, 2); ?>" required min="<?php echo $grand_total; ?>" readonly>
                <span>Please note that this is non-refundable.</span>
                
            </div>
            <label for="gcash_number">GCash Number:</label><br>
            <input type="text" id="gcash_number" name="gcash_number" placeholder="09XX XXX XXXX" required><br>
            <button type="submit">Pay via GCash</button>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $('#gcash_number').mask('0000 000 0000');
        });
    </script>
</body>
</html>
