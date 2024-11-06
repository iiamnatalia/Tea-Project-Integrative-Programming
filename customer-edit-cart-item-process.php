<?php

require "database/connections/conx-customer.php";

// if (isset($_POST['cancel'])) {
//     header('Location: Cart.php');
//     exit();
// }

$id = $_SESSION['user_id'];
$itemQty = $_POST['itemQty'];
$totalAmount = $_POST['totalAmount'];
$productId = $_POST['prod_id'];
$itemSize = $_POST['size'];
$sweetness = $_POST['sweetness'];

$orderItemId = $_SESSION['oitem_id'];
$user_id = $_SESSION['user_id'];

$orderId = $_SESSION['order_id'];

try {
    $pdo->beginTransaction();



    // Update order item
    $sqlUpdateOrderItem = "UPDATE order_items 
                           SET oitem_size = :itemSize,
                                oitem_sweetness = :sweetness, 
                               oitem_qty = :itemQty, 
                               oitem_total = :totalAmount 
                           WHERE oitem_id = :orderItemId";
    $stmtUpdateOrderItem = $pdo->prepare($sqlUpdateOrderItem);
    $stmtUpdateOrderItem->execute([
        ':itemSize' => $itemSize,
        ':sweetness' => $sweetness,
        ':itemQty' => $itemQty,
        ':totalAmount' => $totalAmount,
        ':orderItemId' => $orderItemId
    ]);

    // Check for open orders
    $sqlOrders = "SELECT * FROM orders WHERE order_status = 'Open' AND user_id = :user_id";
    $stmtOrders = $pdo->prepare($sqlOrders);
    $stmtOrders->execute([':user_id' => $user_id]);
    $order = $stmtOrders->fetch(PDO::FETCH_ASSOC);

    // Check and update order totals
    $sqlCheckOpenOrder = "SELECT order_id FROM orders WHERE user_id = :id AND order_status = 'Open'";
    $stmtCheckOpenOrder = $pdo->prepare($sqlCheckOpenOrder);
    $stmtCheckOpenOrder->execute([':id' => $id]);
    
    if ($stmtCheckOpenOrder->rowCount() > 0) {
        $row = $stmtCheckOpenOrder->fetch(PDO::FETCH_ASSOC);
        $orderId = $row['order_id'];
        
        $sqlSelectOrderItem = "SELECT SUM(oitem_total) AS total, SUM(oitem_qty) AS quantity 
                               FROM order_items WHERE order_id = :orderId";
        $stmtSelectOrderItem = $pdo->prepare($sqlSelectOrderItem);
        $stmtSelectOrderItem->execute([':orderId' => $orderId]);
        $rowItemTotal = $stmtSelectOrderItem->fetch(PDO::FETCH_ASSOC);

        $totalItemsAmount = $rowItemTotal['total'];
        $totalItemsQty = $rowItemTotal['quantity'];

        $sqlUpdateOrder = "UPDATE orders 
                           SET order_qty = :totalItemsQty, 
                               order_sub_total = :totalItemsAmount 
                           WHERE order_id = :orderId AND order_status = 'Open'";
        $stmtUpdateOrder = $pdo->prepare($sqlUpdateOrder);
        $stmtUpdateOrder->execute([
            ':totalItemsQty' => $totalItemsQty,
            ':totalItemsAmount' => $totalItemsAmount,
            ':orderId' => $orderId
        ]);
        echo "hatdog ORDERS";
          
    }

    // Update or insert add-ons
    if (isset($_POST['addOn_qty']) && is_array($_POST['addOn_qty'])) {
        foreach ($_POST['addOn_qty'] as $index => $addOnQty) {
            $addOnProductId = $_POST['addOn_ids'][$index]; 

            if ($addOnQty > 0) {
                $addOnTotal = ($addOnQty * 20) * $itemQty; 
                // 5 * 20 = 100 * 2 = 200
                $addOnQty *= $itemQty;
                echo "hatdog QTY";

                $sqlCheckAddOnExistence = "SELECT * FROM order_add_ons 
                                           WHERE oitem_id = :orderItemId AND prod_id = :addOnProductId";
                $stmtCheckAddOnExistence = $pdo->prepare($sqlCheckAddOnExistence);
                $stmtCheckAddOnExistence->execute([
                    ':orderItemId' => $orderItemId,
                    ':addOnProductId' => $addOnProductId
                ]);

                if ($stmtCheckAddOnExistence->rowCount() > 0) {
                    $sqlUpdateOrderAddOn = "UPDATE order_add_ons 
                                            SET oadd_qty = :addOnQty, 
                                                oadd_total = :addOnTotal 
                                            WHERE oitem_id = :orderItemId AND prod_id = :addOnProductId";
                    $stmtUpdateOrderAddOn = $pdo->prepare($sqlUpdateOrderAddOn);
                    $stmtUpdateOrderAddOn->execute([
                        ':addOnQty' => $addOnQty,
                        ':addOnTotal' => $addOnTotal,
                        ':orderItemId' => $orderItemId,
                        ':addOnProductId' => $addOnProductId
                    ]);
                } else {
                    $sqlCreateOrderAddOn = "INSERT INTO order_add_ons (oitem_id, prod_id, oadd_qty, oadd_total) 
                                            VALUES (:orderItemId, :addOnProductId, :addOnQty, :addOnTotal)";
                    $stmtCreateOrderAddOn = $pdo->prepare($sqlCreateOrderAddOn);
                    $stmtCreateOrderAddOn->execute([
                        ':orderItemId' => $orderItemId,
                        ':addOnProductId' => $addOnProductId,
                        ':addOnQty' => $addOnQty,
                        ':addOnTotal' => $addOnTotal
                    ]);
                }
            } else if ($addOnQty == 0) {
                $sqlDeleteAddOn = "DELETE FROM order_add_ons 
                                   WHERE oitem_id = :orderItemId AND prod_id = :addOnProductId";
                $stmtDeleteAddOn = $pdo->prepare($sqlDeleteAddOn);
                $stmtDeleteAddOn->execute([
                    ':orderItemId' => $orderItemId,
                    ':addOnProductId' => $addOnProductId
                ]);
            }
        }
    }

    $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Edited Cart Item")';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    $pdo->commit();
    header("Location: customer-cart.php");
    exit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Failed: " . $e->getMessage();
}
