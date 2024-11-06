<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TeaProj. E-Sip - Cart</title>
   <link rel="icon" href="assets/images/favicon.png" type="image/png">

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/orderform.css">
   <link rel="stylesheet" href="css/customer-cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJf1g9xYTX9Sz4/sb7rP4HmcZwhuPr8P0B1V7+" crossorigin="anonymous">
    <style>
        table {
            max-width: 100%;
            min-width: 100%;
            font-size: 15px;
            border-collapse: collapse;
            border-spacing: 1em;
        }
        .dropdown {
    margin-bottom: 0px;
}
.sh_btn {
    width: 100%;
    padding: 1rem;
    margin-top: 5px;
    margin-bottom: 1rem;
    font-size: 1.5rem;
    border: var(--border);
    background-color: #0e3d30;
    color: white;
    border-radius: 5px;
}

div#checkout-container {
    width: 100%;
}

.error-message {
    font-size: 1.3rem;
    color: #fff;
    background-color: #dc3545;
    padding: 10px 20px;
    border-radius: 5px;
    text-align: center;
    margin: 0 auto;
    width: 100%;
}

.products .cart-total {
    padding: 2rem 0rem 0rem;
    margin-top: 0rem;
    margin-bottom: 0rem;
    gap: 1.5rem;
    align-items: center;
}
        @media screen and (max-width: 1480px) {
            .cart-summary {
                width: 100%;
            }
            .cart-flex {
                display: flex;
                flex-wrap: wrap;
                gap: 30px;
                width: 100%;
                justify-content: center;
            }

            .cart-items {
                height: 100%;
                overflow-y: auto;
                width: 100%;
            }

        }
        
        p {
    margin-top: 0;
    margin-bottom: 0rem !important;
}

.summary-item {
    font-size: 16px;
    margin-bottom: 0px;
}

.summary-breakdown {
    margin-bottom: 0px;
}

.summary-total {
    font-size: 16px;
    font-weight: bold;
}

div#delivery-not-possible {
    width: 100%;
}

.error-message {
    font-size: 1.3rem !important;
}

input[type="text"]:disabled, select:disabled {
cursor: not-allowed;
}
    </style>

</head>
<body>

<?php 
    include "components/header.php"; 
?>

<?php 
    date_default_timezone_set('Asia/Manila'); // Set the timezone to Philippines

    $currentHour = date('H');
    $currentMinute = date('i');

    if ($currentHour >= 10 && $currentHour < 23) {
        $placeOrderAllowed = true;
    } else if ($currentHour == 23 && $currentMinute <= 0) {
        $placeOrderAllowed = true;
    } else {
        $placeOrderAllowed = true;
        // $closedMessage = "Sorry, you can't place an order right now because the shop is currently closed.<br><br>Our business hours are from 10:00 am to 11:00 pm.<br> However, you can add items to your cart and place it later. Thanks!";
    }

    // Assuming you have a user_id stored in the session (you need to implement session handling)
    $user_id = $_SESSION['user_id']; // Replace this with your actual session handling

    // Retrieve cart items from the order_items table for the logged-in user
    $sqlCartItems = "SELECT oi.*
                    FROM `order_items` oi
                    INNER JOIN `orders` o ON oi.`order_id` = o.`order_id`
                    WHERE o.`order_status` = 'Open' AND o.`user_id` = :user_id";

    $stmtCartItems = $pdo->prepare($sqlCartItems);
    $stmtCartItems->execute(['user_id' => $user_id]);

    // Fetch all the cart items
    $cartItems = $stmtCartItems->fetchAll(PDO::FETCH_ASSOC);


    // Retrieve existing addresses for the user
    $sqlAddresses = "SELECT * FROM user_addresses WHERE user_id = :user_id AND uaddress_type = 'Saved' AND uaddress_archived = 0";
    $stmtAddresses = $pdo->prepare($sqlAddresses);
    $stmtAddresses->execute(['user_id' => $user_id]);
    $addresses = $stmtAddresses->fetchAll(PDO::FETCH_ASSOC);


    // Calculate the total price of items in the cart
    $cartTotal = 0;
    $cartQty = 0;
?>

<section class="products">
    <h1 class="title">My Cart</h1> 
    <div class="cart-flex">
        <div class="cart-items">
            <div class="cart-div">
                <?php $orderItemNumber = 1; ?>
                <table>
                    <thead>
                        <tr>
                            <th id="prod-details-one" colspan="2">Product Details</th>
                            <th>Size</th>
                            <th>Sugar</th>
                            <th>Qty</th>
                            <th>Total</th>
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
                            <td class="td-img">
                                <img class="prod-img" src="<?php echo $productRow['prod_img']; ?>">

                            </td>
                            <!-- <td>
                                <p><b>#<?php echo $orderItemNumber; ?></b></p>
                            </td> -->
                            <td>
                                <p  class="prod-name"><b><?php echo $productRow['prod_name']; ?> (<?php echo $productRow['prod_category']; ?>)</b></p>

                                
                                <?php
                                    // Check if the current cart item has any add-ons
                                    $orderItemId = $cartItem['oitem_id'];
                                    $sqlAddOnsCount = "SELECT COUNT(*) as addon_count FROM `order_add_ons` WHERE `oitem_id` = :oitem_id";
                                    $stmtAddOnsCount = $pdo->prepare($sqlAddOnsCount);
                                    $stmtAddOnsCount->execute(['oitem_id' => $orderItemId]);
                                    $addOnsCount = $stmtAddOnsCount->fetch(PDO::FETCH_ASSOC)['addon_count'];
                                    echo "<div>";
                                    if ($addOnsCount > 0) {
                                    echo "                                <p><b>Add Ons:</b></p>";
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
                            </td>
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
                            <td>
                                <div class="tb-btns">
                                    <form action="customer-edit-cart-item-form.php" method="post">
                                        <input type="hidden" name="oitem_id" value="<?php echo $cartItem['oitem_id']; ?>">
                                        <button class="e-btn" data-order-item-id="<?php echo $cartItem['oitem_id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </form>
                                    <form action="customer-delete-cart-item-process.php" method="post">
                                        <input type="hidden" name="oitem_id" value="<?php echo $cartItem['oitem_id']; ?>">
                                        <button class="d-btn" data-order-item-id="<?php echo $cartItem['oitem_id']; ?>"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            $cartTotal += $cartItem['oitem_total']; 
                            $cartQty += $cartItem['oitem_qty'];?>
                            <?php $orderItemNumber++; ?>
                            <tr class="spacer"></tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <div class="cart-summary">
      <div class="cart-total">
        <h3 class="summary-title">Order Summary</h3>
        <div class="summary-breakdown">
            <div class="summary-item">Total: PHP <span id="subtotal"><?php echo number_format($cartTotal, 2); ?></span></div>
            <!-- <div class="summary-item">Delivery Fee: PHP <span id="delivery-fee">0.00</span></div> -->
            <!-- <div class="summary-item">Discount: PHP 0.00</div> -->
            <!-- <div class="summary-total">Grand Total: PHP <span id="total"><?php echo number_format($cartTotal, 2); ?></span></div> -->
        </div>
        <form action="customer-payment-page.php" method="post">
                    <!-- Add this hidden input field for the delivery fee -->
        <input type="hidden" name="delivery_fee" id="delivery_fee_input" value="0">
    <!-- Add this hidden input field for the total amount -->
    <input type="hidden" name="total_amount" id="total_amount_input" value="<?php echo $cartTotal; ?>">
          <div class="address-details">
            <h3>Delivery Address</h3>
              <div class="dropdown">
                  <select id="saved-address" name="saved-address" <?php if ($cartTotal == 0) { echo "disabled";} ?> onchange="toggleAddressInput()">
                      <option selected disabled value="">What's Your Delivery Address</option>
                      <?php foreach ($addresses as $address): ?>
                          <option value="<?php echo htmlspecialchars(json_encode($address)); ?>">
                              <?php echo $address['uaddress_name']; ?>
                          </option>
                      <?php endforeach; ?>
                      <option value="new">New Delivery Address</option>
                  </select>
              </div>
              
              <div>
                  <div class="dropdown">
                      <select <?php if ($cartTotal == 0) { echo "disabled";} ?> id="city-dropdown" name="city-dropdown" onchange="updateBarangays()" title="Please select a city first.">
                          <option selected disabled value="">Select City</option>
                          <option value="Candaba">Candaba</option>
                          <option value="San Luis">San Luis</option>
                          <!-- <option value="baliwag">Baliwag</option> Example additional city -->
                      </select>
                      <input type="text" id="city-text" name="city" style="display:none;">
                  </div>
                  <div class="dropdown">
                      <select  <?php if ($cartTotal == 0) { echo "disabled";} ?> id="barangay-dropdown" name="barangay-dropdown" onchange="updateDeliveryFee()">
                          <option selected disabled value="">Select Barangay</option>
                      </select>
                      <input type="text" id="barangay-text" name="barangay" style="display:none;">
                  </div>
                  <input <?php if ($cartTotal == 0) { echo "disabled";} ?> type="text" name="house_num" required placeholder="House Number" oninput="markAsNewAddress()">
                  <input  <?php if ($cartTotal == 0) { echo "disabled";} ?> type="text" name="street" required placeholder="Street" oninput="markAsNewAddress()">
                  <input <?php if ($cartTotal == 0) { echo "disabled";} ?> type="text" name="landmark" required placeholder="Landmark/Other Address Information" oninput="markAsNewAddress()">
                  
              </div>
          </div>


        <div id="delivery-not-possible" style="display: none;">
            <h3 class="error-message">Delivery in that area is not possible.</h3>
        </div>
        <?php 
            if ($cartTotal > 0) {
            echo '<div id="checkout-container">
            <button type="submit" class="sh_btn" id="checkout-btn">Proceed to Checkout</button>
        </div>';
            }
        ?>

        </form>
    </div>
    <?php
        if ($placeOrderAllowed) {
            if ($cartTotal <= 0) {
                echo '<div class="checkout-btn">
                        <h3 class="error-message">Sorry, you cannot place an empty order.<br><br> Please add items to your cart first, then place your order. Thanks!</h3>
                    </div>';
            }
        } else {
            echo '<div class="checkout-btn">
                    <h3 class="error-message">' . $closedMessage . '</h3>
                </div>';
        }
    ?>
</div>
</section>
<?php include "Components/footer.php"; ?>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>
    function updateBarangays() {
        var city = document.getElementById('city-dropdown').value;
        var barangayDropdown = document.getElementById('barangay-dropdown');
        barangayDropdown.innerHTML = '<option selected disabled value="">Select Barangay</option>';

        var options = [];
        if (city === 'Candaba') {
            options = ['Tenejero', 'Talang', 'Barit', 'Dalayap', 'Mangga'];
        } else if (city === 'San Luis') {
            options = ['San Jose', 'Musni', 'San Roque', 'Sto. Nino'];
        }

        options.forEach(function(option) {
            var opt = document.createElement('option');
            opt.value = option;
            opt.innerHTML = option;
            barangayDropdown.appendChild(opt);
        });

        updateDeliveryFeeFromDropdown();
    }

    function markAsNewAddress() {
        document.getElementById('saved-address').value = 'new';
        updateDeliveryFeeFromDropdown();
    }

    // Event listeners
    document.getElementById('saved-address').addEventListener('change', toggleAddressInput);
    document.getElementById('city-dropdown').addEventListener('change', updateBarangays);

    document.querySelectorAll('input[name="house_num"], input[name="street"], input[name="landmark"]')
        .forEach(el => el.addEventListener('input', function() {
            markAsNewAddress();
            updateDeliveryFeeFromDropdown();
        }));

    function updateDeliveryFeeFromText() {
        var cityText = document.getElementById('city-text').value;
        var deliveryFee = 0;

        if (cityText === 'Candaba') {
            deliveryFee = 30;
        } else if (cityText === 'San Luis') {
            deliveryFee = 20;
        }

        updateTotalAndUI(deliveryFee, cityText);
    }

    function updateDeliveryFeeFromDropdown() {
        var cityDropdown = document.getElementById('city-dropdown');
        var city = cityDropdown.value;
        var deliveryFee = 0;

        if (city === 'Candaba') {
            deliveryFee = 30;
        } else if (city === 'San Luis') {
            deliveryFee = 20;
        }

        updateTotalAndUI(deliveryFee, city);
    }

    function updateTotalAndUI(deliveryFee, city) {
        var deliveryFeeElement = document.getElementById('delivery-fee');
        deliveryFeeElement.innerText = deliveryFee.toFixed(2);

        // Update the hidden input field for delivery fee
        var deliveryFeeInput = document.getElementById('delivery_fee_input');
        deliveryFeeInput.value = deliveryFee.toFixed(2);

        var subtotal = parseFloat(document.getElementById('subtotal').innerText);
        var total = subtotal + deliveryFee;
        
        var totalElement = document.getElementById('total');
        totalElement.innerText = total.toFixed(2);

        // Update the hidden input field for total amount
        var totalAmountInput = document.getElementById('total_amount_input');
        totalAmountInput.value = total.toFixed(2);

        var deliveryNotPossible = document.getElementById('delivery-not-possible');
        var checkoutContainer = document.getElementById('checkout-container');
        if (city && city !== 'Candaba' && city !== 'San Luis') {
            deliveryNotPossible.style.display = 'block';
            checkoutContainer.style.display = 'none';
        } else {
            deliveryNotPossible.style.display = 'none';
            checkoutContainer.style.display = 'block';
        }
    }

    function toggleAddressInput() {
    var savedAddress = document.getElementById('saved-address').value;
    if (savedAddress && savedAddress !== 'new') {
        var address = JSON.parse(savedAddress);

        // Reset and hide dropdowns
        document.getElementById('city-dropdown').value = '';
        document.getElementById('barangay-dropdown').innerHTML = '<option value="">Select Barangay</option>';
        document.getElementById('city-dropdown').style.display = 'none';
        document.getElementById('barangay-dropdown').style.display = 'none';

        // Make the elements visible
        document.getElementById('city-text').style.display = 'block';
        document.getElementById('barangay-text').style.display = 'block';

        // Make the elements readonly
        document.getElementById('city-text').readOnly = true;
        document.getElementById('barangay-text').readOnly = true;
        document.getElementById('city-text').value = address.uaddress_city;
        document.getElementById('barangay-text').value = address.uaddress_brgy;

        // Set other address fields
        document.getElementsByName('house_num')[0].value = address.uaddress_house_num ?? '';
        document.getElementsByName('street')[0].value = address.uaddress_street;
        document.getElementsByName('landmark')[0].value = address.uaddress_landmark ?? '';

        updateDeliveryFeeFromText();
    } else {
        // Show dropdowns and hide text inputs
        document.getElementById('city-dropdown').style.display = 'block';
        document.getElementById('barangay-dropdown').style.display = 'block';
                // Make the dropdowns required
        document.getElementById('city-dropdown').required = true;
        document.getElementById('barangay-dropdown').required = true;
        document.getElementById('city-text').style.display = 'none';
        document.getElementById('barangay-text').style.display = 'none';

        // Reset all fields
        document.getElementById('city-dropdown').value = '';
        document.getElementById('barangay-dropdown').innerHTML = '<option value="">Select Barangay</option>';
        document.getElementsByName('house_num')[0].value = '';
        document.getElementsByName('street')[0].value = '';
        document.getElementsByName('landmark')[0].value = '';

        updateDeliveryFeeFromDropdown();
    }
}

    // In markAsNewAddress()
    function markAsNewAddress() {
        document.getElementById('saved-address').value = 'new';
        updateDeliveryFee();
    }

// After selecting a city in the dropdown
        document.getElementById('city-dropdown').addEventListener('change', function() {
            updateBarangays();
            updateDeliveryFee();
        });

   function toggleCheckoutButton() {
       var city = document.getElementById('city-dropdown').value;
       var checkoutButton = document.getElementById('checkout-container');
       var deliveryNotPossible = document.getElementById('delivery-not-possible');
       var city = document.getElementById('city-text').value;
       var savedAddress = document.getElementById('saved-address').value;

        if (city === 'Candaba' || city === 'San Luis' || city === '') {
            checkoutButton.style.display = 'block';
            deliveryNotPossible.style.display = 'none';

        } else if (savedAddress === '' || savedAddress === 'new' ) {
            checkoutButton.style.display = 'block';
            deliveryNotPossible.style.display = 'none';
        }else {
            checkoutButton.style.display = 'none';
            deliveryNotPossible.style.display = 'block';
        }
   }

   document.addEventListener('DOMContentLoaded', function () {
       var editButtons = document.querySelectorAll('.e-btn');
       var deleteButtons = document.querySelectorAll('.d-btn');

       editButtons.forEach(function (button) {
           button.addEventListener('click', function () {
               var orderItemId = button.getAttribute('data-order-item-id');
               window.location.href = 'EditOrderItem.php?oitem_id=' + orderItemId;
           });
       });
       
   });
</script>


</body>
</html>
