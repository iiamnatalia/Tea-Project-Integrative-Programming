<?php
require('database/connections/conx-customer.php');
$order_id = $_SESSION['order_id'];

try {
    $sql = "SELECT * FROM `orders` WHERE order_id = :order_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['ordrer_amount'] = $order['order_amount'];
} catch (PDOException $e) {
    // Handle any errors
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;

