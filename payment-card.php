<?php 
require ('database/connections/conx-customer.php');
$_SESSION['paymeth'] = "Card";
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
    <title>Card Payment</title>
    <link rel="stylesheet" href="css/gcash.css">
    <link rel="stylesheet" href="css/card.css">
    <link href="../assets/icons/cardfav.png" rel="icon">
    <link href="../assets/icons/cardfav.png" rel="apple-touch-icon">
    <script src="https://kit.fontawesome.com/1fd0899690.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>
<body>
    <div class="container">
        <h2>Card Payment</h2>
        <a class="back-link" href="customer-payment-page.php"><i class="fa-solid fa-chevron-left"></i>  Back to Payment Methods</a>
        <form action="customer-payment-record-transaction.php" method="post">
            <div class="payment-fields">
                <label for="total_amount">Amount to Pay:</label>
                <input type="text" id="total_amount" value="<?php echo $grand_total; ?>" readonly>
                <label for="payment_amount">Payment Amount:</label>
                <input type="number" id="payment_amount" name="payment_amount" value="<?php echo $grand_total; ?>" required min="<?php echo $grand_total; ?>" readonly>
                <span>Please note that this is non-refundable.</span>
            </div>
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" required placeholder="0000 0000 0000 0000">

            <label for="expiry_date">Expiry Date:</label>
            <input type="text" id="expiry_date" name="expiry_date" required placeholder="MM/YY">

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required placeholder="000">

            <button type="submit">Pay via Card</button>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $('#card_number').mask('0000 0000 0000 0000');
            $('#expiry_date').mask('00/00');
            $('#cvv').mask('000');
        });
    </script>
</body>
</html>
