<?php 
    require ('database/connections/conx-customer.php');

$_SESSION['paymeth'] = "Paymaya";
$grand_total = $_SESSION['grand_total'];

echo "<br><br>Delivery Fee: " . $_SESSION['delivery_fee'] . "<br>";
echo "Subtotal: " . $_SESSION['sub_total'] . "<br>";
echo "Grand Total: " . $_SESSION['grand_total'] . "<br>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayMaya Payment</title>
    <link rel="stylesheet" href="css/maya.css">
    <link href="assets/icons/mayafav.png" rel="icon">
    <link href="assets/icons/mayafav.png" rel="apple-touch-icon">
    <script src="https://kit.fontawesome.com/1fd0899690.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div id="paymentlogo">
            <img src="assets/images/Maya_Maya-Lauded-Globally-as-PHs-Best-Digital-Bank_photo.png">
            <h2>Paymaya Payment</h2>
        </div>
        <a href="customer-payment-page.php"><i class="fa-solid fa-chevron-left"></i>  Back to Payment Methods</a>
        <form action="customer-payment-record-transaction.php" method="post">
            <div class="payment-fields">
                <label for="total_amount">Amount to Pay:</label>
                <input type="text" id="total_amount" value="<?php echo $grand_total; ?>" readonly>
                <label for="payment_amount">Payment Amount:</label>
                <input type="number" id="payment_amount" name="payment_amount" value="<?php echo $grand_total; ?>" required min="<?php echo $grand_total; ?>" readonly>
                <!-- Minimum payment amount set to the total reservation fee -->
                <span>Please note that this is non-refundable.</span>
            </div>
            <label for="paymaya_number">PayMaya Number:</label>
            <input type="text" id="paymaya_number" name="paymaya_number" placeholder="09XX XXX XXXX" required>
            <button type="submit">Pay via PayMaya</button>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $('#paymaya_number').mask('0000 000 0000');
        });
    </script>
</body>
</html>
