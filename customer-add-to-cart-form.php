<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Coffee Corner - Home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/orderform.css">
   <style>
    select, input[type="number"] {
        font-size: 1.5rem !important;
        border: 1px solid #22222259;
        margin-bottom: 5px;
    }

    .box {
        border: 1px solid #22222259;
    }

    input, button {
        border: 1px solid #22222259;
    }

    button {
        border-radius: 5px !important;
        font-size: 1.5rem !important;
    }
button.add_btn {
    background-color: #0e3d30;
    color: white;
}

@media screen and (max-width: 501px) {
    input[type="number"] {
        width: 100%;
    }
    .addon-item {
    width: 100%;
}
.addons-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 5px;
}
h3 {
        margin-bottom: 1rem;
    font-weight: 500;
    line-height: 1.2;
}
}
.box p {
    font-size: 1.3rem;
    color: var(--brown);
    text-align: center;
    margin-bottom: 0;
}
    
.box {
  border: 1px solid #22222259;
  background: white;
}
   </style>
</head>
<body>
  <?php

  include "components/header.php";

  $prod_id = $_POST['prod_id'];
  $_SESSION['totalItemAmount'] = 0;

  // Retrieve product details based on the product ID
  $sqlProduct = "SELECT * FROM products WHERE prod_id = :prod_id AND prod_status != 'Archived'";
  $stmt = $pdo->prepare($sqlProduct);
  $stmt->bindParam(':prod_id', $prod_id);
  $stmt->execute();
  $productRow = $stmt->fetch(PDO::FETCH_ASSOC);

  // Retrieve add-ons based on the product category
  $sqlAddOns = "SELECT * FROM products WHERE prod_category = 'Add-Ons' AND prod_status != 'Archived'";
  $stmtAddOns = $pdo->query($sqlAddOns);
  $addOns = $stmtAddOns->fetchAll(PDO::FETCH_ASSOC);

  ?>
  
<section class="order_form">

<h1 class="title">ORDER FORM</h1>


<div class="box-container">
    <div class="box">
        <img src="<?php echo $productRow['prod_img']; ?>" alt="<?php echo $productRow['prod_name']; ?>" style="max-width: 100%;
    max-height: 100px;
    object-fit: cover;">
        <h3><?php echo $productRow['prod_name']; ?></h3>
        <form action="customer-add-to-cart-process.php" method="post">
            <input type="hidden" name="prod_id" value="<?php echo $productRow['prod_id']; ?>">
            <input type="hidden" name="totalAmount" id="totalAmount" value="">
            <h3><label for="size">Size:</label></h3>
            <select name="size" id="size" onchange="calculateTotal()">
                <option value="Regular">Regular</option>
                <option value="Large">Large (Add PHP 10)</option>
            </select>
            <h3><label for="itemQty">Item Quantity:</label></h3>
            <input class="qty" type="number" name="itemQty" id="itemQty" value="1" min="1" max="100" oninput="calculateTotal()">
            <h3><label for="add_ons">Add-ons:</label></h3>
            <div class="addons-grid">
                <?php foreach ($addOns as $addOn): ?>
                    <div class="addon-item">
                        <p><?php echo $addOn['prod_name']; ?> (PHP <?php echo number_format($addOn['prod_base_price'], 2); ?>)</p>
                        <input type="number" name="addOn_qty[]" value="0" min="0" max="10" oninput="calculateTotal()">
                        <input type="hidden" name="addOn_ids[]" value="<?php echo $addOn['prod_id']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <div>
              <h3><label for="sweetness">Sweetness:</label></h3>
              <div>
              <div class="range">
                <input type="range" id="sweetness" name="sweetness" min="0" max="100" step="25" value="0">
                <span id="sweetnessValue">0%</span>
              </div>
              </div>
            </div>
            <div class="current-total">
                <h3 id="total-display" name="totalItemAmount"></h3>
            </div>
            <button type="submit" class="add_btn">Add to Cart</button>
        </form>
    </div>
</div>
</section>

<script>
// Initial call to calculateTotal when the page loads
document.addEventListener('DOMContentLoaded', function() {
    calculateTotal();
});

const sweetnessSlider = document.getElementById('sweetness');
const sweetnessValue = document.getElementById('sweetnessValue');

sweetnessSlider.addEventListener('input', function() {
    sweetnessValue.textContent = this.value + '%';
});


function calculateTotal() {
    var sizeSelect = document.getElementById('size');
    var total = 0;
    // Get product price based on selected size
    if (sizeSelect.value === 'Regular') {
        total += parseFloat(<?php echo $productRow['prod_base_price']; ?>);
    } else if (sizeSelect.value === 'Large') {
        total += parseFloat(<?php echo $productRow['prod_base_price']; ?>) + 10;
    }
    // Add price for each add-on quantity
    var addonQuantities = document.getElementsByName('addOn_qty[]');
    addonQuantities.forEach(function (quantityInput) {
        var quantity = parseInt(quantityInput.value) || 0;
        total += quantity * 20; // Assuming each add-on costs 20 pesos
    });
    var addonIds = document.getElementsByName('addOn_ids[]');
    var selectedAddOns = [];
    addonQuantities.forEach(function (quantityInput, index) {
        var quantity = parseInt(quantityInput.value) || 0;
        if (quantity > 0) {
            selectedAddOns.push(addonIds[index].value);
        }
    });
    total *= parseInt(document.getElementById('itemQty').value) || 1;
    // Update the total display
    document.getElementById('total-display').innerText = 'Current Total: PHP ' + total.toFixed(2);
    document.getElementById('totalAmount').value = total.toFixed(2);
}
</script>



<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>
var swiper = new Swiper(".home-slider", {
   loop:true,
   grabCursor:true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});
</script>
<?php 
      include "components/footer.php";
?>
</body>
</html>



