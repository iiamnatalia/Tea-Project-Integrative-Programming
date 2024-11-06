<?php 
require ('database/connections/conx-customer.php');
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';


$order_id = $_SESSION['order_id'];
$user_id = $_SESSION['user_id'];
$payment_method = $_SESSION['paymeth'];
$order_status = "Placed"; 
$order_sub_total = $_SESSION['sub_total'];
$order_delivery_fee = $_SESSION['delivery_fee'];
$order_grand_total = $_SESSION['grand_total'];

$pay_paid_at = date("Y-m-d H:i:s");
$orderPlacedAt = date('Y-m-d H:i:s'); // Current timestamp

function generateRefNumber() {
    $characters = '0123456789';
    $refNumber = '';
    $length = 10;

    for ($i = 0; $i < $length; $i++) {
        $refNumber .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $refNumber;
}

$refNumber = generateRefNumber();

$uaddress_id = $_SESSION['uaddress_id'];

try {
    // Check for uaddress_id in the session
    if ($_SESSION['uaddress_type'] != "new") {
        echo $_SESSION['uaddress_type'];
        $uaddress_id = $_SESSION['uaddress_id'];
        echo $_SESSION['uaddress_id'];
    } else {


        // print_r($_POST);
        // Get address details from session or set default values
        $city = $_SESSION['city'];
        $brgy = $_SESSION['barangay'];
        $house_num = isset($_SESSION['house_num']) ? $_SESSION['house_num'] : '';
        $street = isset($_SESSION['street']) ? $_SESSION['street'] : '';
        $landmark = isset($_SESSION['landmark']) ? $_SESSION['landmark'] : '';

        // Insert new address into user_addresses table
        $sql = "INSERT INTO user_addresses (user_id, uaddress_name, uaddress_type, uaddress_house_num, uaddress_street, uaddress_brgy, uaddress_city, uaddress_landmark, uaddress_added_at) 
                VALUES (:user_id, :uaddress_name, :uaddress_type, :uaddress_house_num, :uaddress_street, :uaddress_brgy, :uaddress_city, :uaddress_landmark, :uaddress_added_at)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $uaddress_name = 'Delivery Address Only'; // Example address name
        $uaddress_type = 'Not Saved'; // Example address type
        $uaddress_added_at = date('Y-m-d H:i:s');

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':uaddress_name', $uaddress_name);
        $stmt->bindParam(':uaddress_type', $uaddress_type);
        $stmt->bindParam(':uaddress_house_num', $house_num);
        $stmt->bindParam(':uaddress_street', $street);
        $stmt->bindParam(':uaddress_brgy', $brgy);
        $stmt->bindParam(':uaddress_city', $city);
        $stmt->bindParam(':uaddress_landmark', $landmark);
        $stmt->bindParam(':uaddress_added_at', $uaddress_added_at);

        // Execute the statement
        $stmt->execute();

        // Get the last inserted ID
        $uaddress_id = $pdo->lastInsertId();
    }

    // Prepare the SQL statement to update orders
    $sql = "UPDATE orders 
            SET order_status = :orderStatus, 
                uaddress_id = :uaddressId, 
                order_placed_at = :orderPlacedAt,
                order_del_fee = :orderDelFee,
                order_sub_total = :orderSubTotal,
                order_grand_total = :orderGrandTotal
            WHERE order_id = :orderId AND user_id = :userId";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':orderStatus', $order_status);
    $stmt->bindParam(':uaddressId', $uaddress_id);
    $stmt->bindParam(':orderPlacedAt', $orderPlacedAt);
    $stmt->bindParam(':orderDelFee', $order_delivery_fee);
    $stmt->bindParam(':orderSubTotal', $order_sub_total);
    $stmt->bindParam(':orderGrandTotal', $order_grand_total);
    $stmt->bindParam(':orderId', $order_id);
    $stmt->bindParam(':userId', $user_id);

    // Execute the statement
    $stmt->execute();

    // Insert payment details based on the payment method
    if ($payment_method == "Cash on Delivery") {
        $sql = "INSERT INTO payments (order_id, pay_mode, pay_status) VALUES (:order_id, :pay_mode, 'Unpaid')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['order_id' => $order_id, 'pay_mode' => $payment_method]);
    } else {
        $sql = "INSERT INTO payments (order_id, pay_mode, pay_ref_num, pay_amount, pay_paid_at) 
                VALUES (:order_id, :pay_mode, :pay_ref_num, :pay_amount, :pay_paid_at)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'order_id' => $order_id,
            'pay_mode' => $payment_method,
            'pay_ref_num' => $refNumber,
            'pay_amount' => $order_grand_total,
            'pay_paid_at' => $pay_paid_at
        ]);
    }
    
    // Print JavaScript to show modal
    echo "<script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function() {
                showReceiptModal('$refNumber', '$order_grand_total', '$pay_paid_at');
            });
          </script>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Modal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="receiptModalLabel">Payment Receipt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Reference Number:</strong> <span id="refNumber"></span></p>
                    <p><strong>Amount Paid:</strong> <span id="amountPaid"></span></p>
                    <p><strong>Paid At:</strong> <span id="paidAt"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printReceipt()">Print</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showReceiptModal(refNumber, amountPaid, paidAt) {
            $('#refNumber').text(refNumber);
            $('#amountPaid').text(amountPaid);
            $('#paidAt').text(paidAt);
            $('#receiptModal').modal('show');
        }

        function printReceipt() {
            var divToPrint = document.getElementById('receiptModal').innerHTML;
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><body onload="window.print()">' + divToPrint + '</body></html>');
            newWin.document.close();
            setTimeout(function(){ newWin.close(); }, 10);
        }

        $(document).ready(function() {
            $('#receiptModal').on('hidden.bs.modal', function () {
                window.location.href = 'customer-home.php';
            });
        });
    </script>
</body>
</html>
