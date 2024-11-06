<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TeaProj. E-Sip - Orders</title>
   <link rel="icon" href="assets/images/favicon.png" type="image/png">

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/orderform.css">
   <link rel="stylesheet" href="css/customer-cart.css">
      <link rel="stylesheet" href="css/customer-orders.css">


</head>
<body>

<?php 
    include "components/header.php"; 
    date_default_timezone_set('Asia/Manila'); // Set the timezone to Philippines

    $currentHour = date('H');
    $currentMinute = date('i');

    if ($currentHour >= 10 && $currentHour < 23) {
        $placeOrderAllowed = true;
    } else if ($currentHour == 23 && $currentMinute <= 0) {
        $placeOrderAllowed = true;
    } else {
        $placeOrderAllowed = true;
    }
    $user_id = $_SESSION['user_id']; 

    $sqlAddresses = "SELECT * FROM user_addresses WHERE user_id = :user_id AND uaddress_type = 'Saved'";
    $stmtAddresses = $pdo->prepare($sqlAddresses);
    $stmtAddresses->execute(['user_id' => $user_id]);
    $addresses = $stmtAddresses->fetchAll(PDO::FETCH_ASSOC);

    // Calculate the total price of items in the cart
    $cartTotal = 0;
    $cartQty = 0;
?>

<section class="products">
    <h1 class="title">My Orders</h1> 
    <div class="cart-flex">
        <div class="cart-items">
            <div class="cart-div">
              <?php
                  $sql = "SELECT * FROM `orders` WHERE user_id = :user_id AND order_status != 'Open' ORDER BY order_placed_at DESC";
                  $stmt = $pdo->prepare($sql);
                  $stmt->bindParam(':user_id', $user_id);
                  $stmt->execute();
                  $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);


                if (count($orders) == 0) {
                    echo "<h2>No Orders Found</h2>";
                }
                  foreach ($orders as $order):

                      $order_id = $order['order_id'];

                      $statuses = ["Placed", "Approved", "Processing", "On the Way", "Delivered"];
                      $current_status = array_search($order['order_status'], $statuses);
              ?>
              <div class="order-history">
                <div class="tabs">
                    <div class="tab active">
                        <?php echo "<h2>Order #" . $order['order_id'] . " (" . $order['order_status'] . ")</h2>"; ?>
                        <?php echo "<h2>GrandTotal: PHP " . $order['order_grand_total'] . ".00</h2>"; ?>
                        <?php if ($order['order_status'] == 'Canceled'): ?>
                            <div class="canceled-bar">Order Canceled</div>
                            <?php echo "<p>Reason: " . $order['order_cancel_reason'] . "</p>"; ?>
                            <?php echo "<p>Cancelled at: " . $order['order_cancelled_at'] . "</p>"; ?>
                        <?php elseif ($order['order_status'] == 'To be Refunded'): ?>
                            <div class="to-be-refunded-bar">To be Refunded</div>
                            <?php echo "<p>Reason: " . $order['order_cancel_reason'] . "</p>"; ?>
                            <?php echo "<p>Cancelled at: " . $order['order_cancelled_at'] . "</p>"; ?>
                        <?php elseif ($order['order_status'] == 'Refunded'): ?>
                            <div class="refunded-bar">Order Canceled and Refunded</div>
                            <?php echo "<p>Reason: " . $order['order_cancel_reason'] . "</p>"; ?>
                            <?php echo "<p>Cancelled at: " . $order['order_cancelled_at'] . "</p>"; ?>
                        <?php else: ?>
                            <div class="status-bar">
                                <?php foreach ($statuses as $index => $status): ?>
                                    <div class="status-step <?php if ($index <= $current_status) echo 'active'; ?>">
                                        <div class="circle">&#10003;</div>
                                        <p><?php echo $status; ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <button class="reorder-button" onclick="reorder(<?php echo $order['order_id']; ?>)">Reorder</button>
                        <button class="reorder-button" onclick="openFeedbackModal(<?php echo $order['order_id']; ?>)">Feedback</button>
                    </div>
                </div>
                <table>
                    <?php
                      // Prepare and execute statement for each order
                      $sqlCartItems = "SELECT oi.*
                                      FROM `order_items` oi
                                      INNER JOIN `orders` o ON oi.`order_id` = o.`order_id`
                                      WHERE o.`order_id` = :order_id";
                      $stmtCartItems = $pdo->prepare($sqlCartItems);
                      $stmtCartItems->bindParam(':order_id', $order_id);
                      $stmtCartItems->execute();

                      // Process retrieved cart items for the current order (if needed)
                      $cartItems = $stmtCartItems->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Flavor</th>
                            <!-- <th>Add-Ons</th> -->
                            <th>Size</th>
                            <th>Sugar</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <!-- <th style="max-width: 20%;">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="spacer"></tr>
                        <?php foreach ($cartItems as $cartItem): ?>
                        <tr class="tr-border">
                            <?php
                                $productId = $cartItem['prod_id'];
                                $sqlProduct = "SELECT * FROM products WHERE prod_id = :prod_id";
                                $stmtProduct = $pdo->prepare($sqlProduct);
                                $stmtProduct->execute(['prod_id' => $productId]);
                                $productRow = $stmtProduct->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <td>
                                <p><b><?php echo $productRow['prod_category']; ?></b></p>
                            </td>
                            <td>
                                <!-- <img src="<?php echo $productRow['prod_img']; ?>"></img> -->
                                <p><b><?php echo $productRow['prod_name']; ?></b></p>
                                <!-- <b> -->
                                <p><b>Add Ons:</b></p>
                                <?php
                                    // Check if the current cart item has any add-ons
                                    $orderItemId = $cartItem['oitem_id'];
                                    $sqlAddOnsCount = "SELECT COUNT(*) as addon_count FROM `order_add_ons` WHERE `oitem_id` = :oitem_id";
                                    $stmtAddOnsCount = $pdo->prepare($sqlAddOnsCount);
                                    $stmtAddOnsCount->execute(['oitem_id' => $orderItemId]);
                                    $addOnsCount = $stmtAddOnsCount->fetch(PDO::FETCH_ASSOC)['addon_count'];
                                    echo "<div>";
                                    if ($addOnsCount > 0) {
                                        // Fetch add-ons for the current cart item
                                        $sqlAddOns = "SELECT `oadd_id`, `prod_id`, `oadd_qty`, `oadd_total` FROM `order_add_ons` WHERE `oitem_id` = :oitem_id";
                                        $stmtAddOns = $pdo->prepare($sqlAddOns);
                                        $stmtAddOns->execute(['oitem_id' => $orderItemId]);

                                        // Display add-ons
                                        while ($addOn = $stmtAddOns->fetch(PDO::FETCH_ASSOC)) {
                                            $addOnProduct = $addOn['prod_id'];
                                            $sqlAddOnProduct = "SELECT * FROM products WHERE prod_id = :prod_id";
                                            $stmtAddOnProduct = $pdo->prepare($sqlAddOnProduct);
                                            $stmtAddOnProduct->execute(['prod_id' => $addOnProduct]);
                                            $addOnProductRow = $stmtAddOnProduct->fetch(PDO::FETCH_ASSOC);
                                            echo "<p>{$addOnProductRow['prod_name']} x" . ($addOn['oadd_qty'] / $cartItem['oitem_qty']) . "</p>";
                                        }
                                    } else {
                                        echo "<p>No add-ons</p>";
                                    }
                                    echo "</div>";
                                ?>
                                <!-- </b> -->
                            </td>
                            <!-- <td>
                            </td> -->
                            <td>
                                <p><b><?php echo $cartItem['oitem_size']; ?></b></p>
                            </td>
                            <td>
                                <p><b><?php echo $cartItem['oitem_sweetness']; ?>%</b></p>
                            </td>
                            <td>
                                <p><b>x<?php echo $cartItem['oitem_qty']; ?></b></p>
                            </td>
                            <td>
                                <p><b>PHP <?php echo $cartItem['oitem_total']; ?></b></p>
                            </td>

                        </tr>
                        <?php 
                            $cartTotal += $cartItem['oitem_total']; 
                            $cartQty += $cartItem['oitem_qty'];?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
</div>
</section>
<!-- Feedback Modal -->
<div id="feedbackModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeFeedbackModal()">&times;</span>
        <h2>Feedback</h2>
        <form action="customer-orders-submit-feedback.php" method="POST">
            <input type="hidden" name="order_id" id="feedbackOrderId">
            <textarea name="fb_message" id="fb_message" cols="30" rows="5" placeholder="Enter your feedback" required></textarea>
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <button class="btn rate" type="submit">Submit Feedback</button>
        </form>
    </div>
</div>

<?php include "components/footer.php"; ?>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>
    function reorder(orderId) {
        window.location.href = 'customer-orders-reorder.php?order_id=' + orderId;
    }

    function openFeedbackModal(orderId) {
        document.getElementById('feedbackOrderId').value = orderId;
        document.getElementById('feedbackModal').style.display = 'block';
    }

    function closeFeedbackModal() {
        document.getElementById('feedbackModal').style.display = 'none';
    }
</script>
</body>
</html>
