<?php
require ('database/connections/conx-customer.php');
date_default_timezone_set('Asia/Singapore');

$order_id = $_SESSION['order_id'];
$user_id = $_SESSION['user_id'];
$payment_method = $_SESSION['paymeth'];
$order_status = "Placed"; 
$order_sub_total = $_SESSION['sub_total'];
$order_delivery_fee = $_SESSION['delivery_fee'];
$order_grand_total = $_SESSION['grand_total'];

$pay_paid_at = date("Y-m-d H:i:s");
$orderPlacedAt = date('Y-m-d H:i:s'); // Current timestamp



if (isset($_SESSION['uaddress_id'])) {
    $uaddress_id = $_SESSION['uaddress_id'];
}

try {
    // Check for uaddress_id in the session
    if ($_SESSION['uaddress_type'] != "new") {
        $uaddress_id = $_SESSION['uaddress_id'];
    } else {
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
        $sql = "INSERT INTO payments (order_id, pay_mode, pay_ref_num, pay_amount, pay_paid_at) 
                VALUES (:order_id, :pay_mode, :pay_ref_num, :pay_amount, :pay_paid_at)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'order_id' => $order_id,
            'pay_mode' => "E-Wallet",
            'pay_ref_num' => $refNumber,
            'pay_amount' => $order_grand_total,
            'pay_paid_at' => $pay_paid_at
        ]);

    
    $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Checked Out Order #" ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $order_id]);

    header("Location: customer-home.php");

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}