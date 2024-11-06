<?php
require "database/connections/conx-customer.php"; // Include your database connection file

$id = $_SESSION['user_id'];
    $order_id_to_reorder = $_GET['order_id'];
// Get the order ID to reorder
if (isset($_GET['order_id'])) {

    $user_id = $_SESSION['user_id'];

    // Fetch items from the order to reorder
    $sqlGetOrderItems = "SELECT * FROM order_items WHERE order_id = :order_id";
    $stmtGetOrderItems = $pdo->prepare($sqlGetOrderItems);
    $stmtGetOrderItems->execute(['order_id' => $order_id_to_reorder]);
    $orderItems = $stmtGetOrderItems->fetchAll(PDO::FETCH_ASSOC);

    // Check for an open order for the user
    $sqlCheckOrder = "SELECT * FROM orders WHERE order_id = :order_id";
    $stmtCheckOrder = $pdo->prepare($sqlCheckOrder);
    $stmtCheckOrder->execute(['order_id' => $order_id_to_reorder]);
    $reorderDetails = $stmtCheckOrder->fetch(PDO::FETCH_ASSOC);

    if ($reorderDetails) {
        // Loop through the fetched order items
        
            $orderQty = $reorderDetails['order_qty'];
            $orderSubTotal = $reorderDetails['order_sub_total'];

            // Process each item as needed
            echo "Order Quantity: " . $orderQty . "\n";
            echo "Order Subtotal: " . $orderSubTotal . "\n";
    } else {
        echo "No order found with order ID: " . $order_id_to_reorder;
    }


// Check for an open order for the user
$sqlCheckOpenOrder = "SELECT * FROM orders WHERE user_id = :user_id AND order_status = 'Open'";
$stmtCheckOpenOrder = $pdo->prepare($sqlCheckOpenOrder);
$stmtCheckOpenOrder->execute(['user_id' => $user_id]);
$openOrder = $stmtCheckOpenOrder->fetch(PDO::FETCH_ASSOC);
$open_order_id = $openOrder['order_id'];

if ($openOrder) {
    // Update existing order
    $stmt = $pdo->prepare("UPDATE `orders` SET  
                        `order_qty` = :orderQty,
                        `order_sub_total` = :orderSubTotal
                        WHERE `order_id` = :orderId");
    $stmt->bindParam(':orderQty', $orderQty);
    $stmt->bindParam(':orderSubTotal', $orderSubTotal); // Correct parameter name
    $stmt->bindParam(':orderId', $open_order_id);
    $stmt->execute();




        // Delete existing items from the open order
        $open_order_id = $openOrder['order_id'];
        $sqlDeleteItems = "DELETE FROM order_items WHERE order_id = :order_id";
        $stmtDeleteItems = $pdo->prepare($sqlDeleteItems);
        $stmtDeleteItems->execute(['order_id' => $open_order_id]);


    } else {
        // Create a new order if no open order exists
        $sqlCreateOrder = "INSERT INTO orders (user_id, order_status, order_placed_at) VALUES (:user_id, 'Open', NOW())";
        $stmtCreateOrder = $pdo->prepare($sqlCreateOrder);
        $stmtCreateOrder->execute(['user_id' => $user_id]);
        $open_order_id = $pdo->lastInsertId();

            // Update existing order
    $stmt = $pdo->prepare("UPDATE `orders` SET  
                        `order_qty` = :orderQty,
                        `order_sub_total` = :orderSubTotal
                        WHERE `order_id` = :orderId");
    $stmt->bindParam(':orderQty', $orderQty);
    $stmt->bindParam(':orderSubTotal', $orderSubTotal); // Correct parameter name
    $stmt->bindParam(':orderId', $open_order_id);
    $stmt->execute();
    }

    // Insert the reordered items into the open order
    $sqlInsertItems = "INSERT INTO order_items (order_id, prod_id, oitem_qty, oitem_total, oitem_size, oitem_sweetness)
                       VALUES (:order_id, :prod_id, :oitem_qty, :oitem_total, :oitem_size, :oitem_sweetness)";
    $stmtInsertItems = $pdo->prepare($sqlInsertItems);

    foreach ($orderItems as $item) {
        $stmtInsertItems->execute([
            'order_id' => $open_order_id,
            'prod_id' => $item['prod_id'],
            'oitem_qty' => $item['oitem_qty'],
            'oitem_total' => $item['oitem_total'],
            'oitem_size' => $item['oitem_size'],
            'oitem_sweetness' => $item['oitem_sweetness']
        ]);
    }

    $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Reordered Order #"?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id, $order_id_to_reorder]);
    // Redirect to the orders page or confirmation page
    header("Location: customer-cart.php");
    exit();
} else {
    echo "Order ID not specified.";
}
?>
