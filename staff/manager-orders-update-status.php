<?php
// Include the database connection
require('../database/connections/conx-staff.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];
    $cancel_reason = isset($_POST['cancel_reason']) ? $_POST['cancel_reason'] : null;
    // echo "Cancel Reason" . $cancel_reason;
    $pay_mode = $_POST['pay_mode'];
    // echo "Pay_Mode: $pay_mode";
    if (isset($_POST['pay_amount'])) {
        $pay_amount = $_POST['pay_amount'];
    }


    try {
        // print_r($_POST);
        $pdo->beginTransaction();
        $order_cancelled_at = date("Y-m-d H:i:s");
        // echo $order_cancelled_at;
        // Update the cancel reason and timestamp

        $sql = "UPDATE orders SET order_status = :order_status WHERE order_id = :order_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['order_status' => $order_status, 'order_id' => $order_id]);

        // echo $pay_mode;
        // echo $order_status;
        if ($pay_mode == "Cash on Delivery") {
            if ($order_status === 'Delivered') {
                $sql = "UPDATE payments SET pay_status = 'Paid', pay_amount = :pay_amount WHERE order_id = :order_id AND pay_mode = 'Cash on Delivery'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['order_id' => $order_id, 'pay_amount' => $pay_amount]);
            }
        }

        // Update cancel reason if order is canceled
        if ($order_status === 'Canceled' && $cancel_reason) {
            // echo $order_cancelled_at;
            // echo "Pay_Mode: $pay_mode";
            if ($pay_mode == "Cash on Delivery") {
                // Update order status in orders table
                $sql = "UPDATE orders SET order_status = :order_status WHERE order_id = :order_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['order_status' => $order_status, 'order_id' => $order_id]);
                echo "Cancel Reason" . $cancel_reason;

                $sql = "UPDATE payments SET pay_status = 'Canceled' WHERE order_id = :order_id AND pay_mode = 'Cash on Delivery'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['order_id' => $order_id]);

                $sql = "UPDATE orders SET order_cancel_reason = :cancel_reason, order_cancelled_at = :order_cancelled_at WHERE order_id = :order_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'cancel_reason' => $cancel_reason,
                    'order_cancelled_at' => $order_cancelled_at,
                    'order_id' => $order_id
                ]);
            } else {
                // echo "Cancel Reason" . $cancel_reason;
                // Update order status to 'To be Refunded' in orders table
                $sql = "UPDATE orders SET order_status = 'To be Refunded' WHERE order_id = :order_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['order_id' => $order_id]);

                $sql = "UPDATE payments SET pay_status = 'To be Refunded' WHERE order_id = :order_id AND pay_mode != 'Cash on Delivery'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['order_id' => $order_id]);

                $sql = "UPDATE orders SET order_cancel_reason = :cancel_reason, order_cancelled_at = :order_cancelled_at WHERE order_id = :order_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'cancel_reason' => $cancel_reason,
                    'order_cancelled_at' => $order_cancelled_at,
                    'order_id' => $order_id
                ]);
            }
        }


        if ($order_status === 'Refunded') {
            // Check pay_mode directly in the query
            $sql = "UPDATE payments SET pay_status = 'Refunded', pay_amount = 0 WHERE order_id = :order_id AND pay_mode != 'Cash on Delivery'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['order_id' => $order_id]);
        }

        if ($order_status === 'Delivered') {
            $order_delivered_at = date("Y-m-d H:i:s");
            $sql = "UPDATE orders SET order_delivered_at = :order_delivered_at WHERE order_id = :order_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['order_delivered_at' => $order_delivered_at, 'order_id' => $order_id]);
        }



        $pdo->commit();
        // $_SESSION['error_message'] = "Successfully updated the status of Order ID: $order_id";
        // header("manager-products-management.php");

        // Set a flag to indicate a successful update
        $update_success = true;
    } catch (PDOException $e) {
        $pdo->rollBack();
        $error_message = "Error updating order status: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Order Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php if (isset($update_success) && $update_success): ?>
        <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="successModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Success</h5>
                    </div>
                    <div class="modal-body">
                        <p>Order status updated successfully!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="closeModal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Show the modal
            document.getElementById('successModal').style.display = 'block';
            document.getElementById('successModal').classList.add('show');

            // Redirect after closing the modal
            document.getElementById('closeModal').addEventListener('click', function() {
                window.location.href = 'manager-orders-management.php?status=success';
            });
        </script>
    <?php elseif (isset($error_message)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
        </div>
    <?php else: ?>
        <script>
            window.location.href = 'manager-orders-management.php';
        </script>
    <?php endif; ?>
</body>
</html>
