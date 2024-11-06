<?php
require "database/connections/conx-customer.php";

$id = $_SESSION['user_id'];
$itemQty = $_POST['itemQty'];
$totalAmount = $_POST['totalAmount'];
$productId = $_POST['prod_id'];
$itemSize = $_POST['size'];
$sweetness = $_POST['sweetness'];

try {
    $pdo->beginTransaction();

    // Check if there is an open order for the user
    $stmt = $pdo->prepare("SELECT `order_id`, `order_qty` FROM `orders` WHERE `user_id`=:user_id AND `order_status`='Open'");
    $stmt->bindParam(':user_id', $id);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($order) {
        $orderId = $order['order_id'];
        $orderQty = $order['order_qty'];

        if ($orderQty + $itemQty <= 50) {
            // Update existing order
            $stmt = $pdo->prepare("UPDATE `orders` SET  
                            `order_qty` = `order_qty` + :itemQty,
                            `order_sub_total` = `order_sub_total` + :totalAmount 
                            WHERE `order_id` = :orderId");
            $stmt->bindParam(':itemQty', $itemQty);
            $stmt->bindParam(':totalAmount', $totalAmount);
            $stmt->bindParam(':orderId', $orderId);
            $stmt->execute();
        } else {
            // qty exceeds limit
            $_SESSION['error_message'] = "The current number of cups in your cart is $orderQty. You cannot add $itemQty more cups to your cart. Your cart can only have 50 cups in total. Please decrease the qty.";
            header("Location: OrderForm.php");
            exit();
        }
    } else {
        // Create new order
        $stmt = $pdo->prepare("INSERT INTO `orders`(
                `user_id`, 
                `order_status`, 
                `order_qty`, 
                `order_sub_total`) 
            VALUES (:id, 'Open', :itemQty, :totalAmount)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':itemQty', $itemQty);
        $stmt->bindParam(':totalAmount', $totalAmount);
        $stmt->execute();
        $orderId = $pdo->lastInsertId();
    }

    $_SESSION['order_id'] = $orderId;

    // Insert order item
    $stmt = $pdo->prepare("INSERT INTO `order_items`(
                        `prod_id`, 
                        `order_id`, 
                        `oitem_size`, 
                        `oitem_sweetness`,
                        `oitem_qty`,
                        `oitem_total`)
                    VALUES (:productId, :orderId, :itemSize, :itemSweetness, :itemQty, :totalAmount)");
    $stmt->bindParam(':productId', $productId);
    $stmt->bindParam(':orderId', $orderId);
    $stmt->bindParam(':itemSize', $itemSize);
    $stmt->bindParam(':itemSweetness', $sweetness);
    $stmt->bindParam(':itemQty', $itemQty);
    $stmt->bindParam(':totalAmount', $totalAmount);
    $stmt->execute();
    $orderItemId = $pdo->lastInsertId();

    if (isset($_POST['addOn_qty']) && is_array($_POST['addOn_qty'])) {
        foreach ($_POST['addOn_qty'] as $index => $addOnQty) {
            if ($addOnQty > 0) {
                // Assuming each add-on costs 10 pesos
                $addOnTotal = $addOnQty * 20 * $itemQty;
                $addOnQty *= $itemQty;

                $addOnProductId = $_POST['addOn_ids'][$index];

                // Insert order add-on
                $stmt = $pdo->prepare("INSERT INTO `order_add_ons`(
                                        `oitem_id`, 
                                        `prod_id`, 
                                        `oadd_qty`, 
                                        `oadd_total`)
                                    VALUES (:orderItemId, :addOnProductId, :addOnQty, :addOnTotal)");
                $stmt->bindParam(':orderItemId', $orderItemId);
                $stmt->bindParam(':addOnProductId', $addOnProductId);
                $stmt->bindParam(':addOnQty', $addOnQty);
                $stmt->bindParam(':addOnTotal', $addOnTotal);
                $stmt->execute();
            }
        }
    }

    $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Added Item to Cart")';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    $pdo->commit();
    $_SESSION['success_message'] = "Successfully added $itemQty item(s) with a total amount of $totalAmount.";
} catch (PDOException $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    if (isset($_SESSION['success_message'])) {
        echo '<div class="modal" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add to Cart Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ' . $_SESSION['success_message'] . '
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>';
        unset($_SESSION['success_message']);
    }
    ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function(){
        $('#successModal').modal('show');

        $('#successModal').on('hidden.bs.modal', function (e) {
            window.location.href = 'customer-menu.php';
        });
    });
    </script>
</body>
</html>
