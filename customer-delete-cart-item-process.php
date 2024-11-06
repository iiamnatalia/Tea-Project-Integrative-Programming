<?php
require 'database/connections/conx-customer.php';
$id = $_SESSION['user_id'];

if (isset($_POST['oitem_id'])) {
    $oitem_id = $_POST['oitem_id'];

    try {
        // Step 1: Retrieve order_id associated with oitem_id
        $sqlGetOrderId = "SELECT * FROM `order_items` WHERE `oitem_id` = :oitem_id";
        $stmtGetOrderId = $pdo->prepare($sqlGetOrderId);
        $stmtGetOrderId->bindParam(':oitem_id', $oitem_id, PDO::PARAM_INT);
        $stmtGetOrderId->execute();
        $row = $stmtGetOrderId->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            throw new Exception("Order item not found");
        }

        $order_id = $row['order_id'];

        // Step 2: Sum the quantity to be deleted and the total from order_items table
        $sqlSumAddOns = "SELECT SUM(`oitem_qty`) AS total_qty, SUM(`oitem_total`) AS total_amount FROM `order_items` WHERE `oitem_id` = :oitem_id";
        $stmtSumAddOns = $pdo->prepare($sqlSumAddOns);
        $stmtSumAddOns->bindParam(':oitem_id', $oitem_id, PDO::PARAM_INT);
        $stmtSumAddOns->execute();
        $addOnRow = $stmtSumAddOns->fetch(PDO::FETCH_ASSOC);

        if (!$addOnRow) {
            throw new Exception("Sum query failed");
        }

        $totalQtyToDelete = $addOnRow['total_qty'];
        $totalAmountToDelete = $addOnRow['total_amount'];

        // Step 3: Update order_qty and order_sub_total in the order table
        $sqlUpdateOrder = "UPDATE `orders` SET `order_qty` = `order_qty` - :totalQtyToDelete, `order_sub_total` = `order_sub_total` - :totalAmountToDelete WHERE `order_id` = :order_id";
        $stmtUpdateOrder = $pdo->prepare($sqlUpdateOrder);
        $stmtUpdateOrder->bindParam(':totalQtyToDelete', $totalQtyToDelete, PDO::PARAM_INT);
        $stmtUpdateOrder->bindParam(':totalAmountToDelete', $totalAmountToDelete, PDO::PARAM_STR);
        $stmtUpdateOrder->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmtUpdateOrder->execute();

        // Step 4: Delete corresponding rows from order_add_ons table
        $sqlDeleteAddOns = "DELETE FROM `order_add_ons` WHERE `oitem_id` = :oitem_id";
        $stmtDeleteAddOns = $pdo->prepare($sqlDeleteAddOns);
        $stmtDeleteAddOns->bindParam(':oitem_id', $oitem_id, PDO::PARAM_INT);
        $stmtDeleteAddOns->execute();

        // Step 5: Delete the row from order_items table
        $sqlDeleteOrderItem = "DELETE FROM `order_items` WHERE `oitem_id` = :oitem_id";
        $stmtDeleteOrderItem = $pdo->prepare($sqlDeleteOrderItem);
        $stmtDeleteOrderItem->bindParam(':oitem_id', $oitem_id, PDO::PARAM_INT);
        $stmtDeleteOrderItem->execute();

        $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Deleted an Item from Cart")';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        // Redirect to the cart page or any other appropriate page after successful deletion
        header("Location: customer-cart.php");
        exit();
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    // Handle the case where oitem_id is not set in the URL
    echo "Invalid request!";
}
?>
