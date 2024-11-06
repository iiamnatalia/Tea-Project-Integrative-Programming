<?php 
    require ('database/connections/conx-customer.php');
  // Handle form submission
  if (isset($_POST['payment-option-confirmed'])) {

    $paymentOption = $_POST['payment'];
    
    switch ($paymentOption) {
        case 'gcash':
            header('Location: payment-gcash.php');
            break;
        case 'maya':
            header('Location: payment-paymaya.php');
            break;
        case 'card':
            header('Location: payment-card.php');
            break;
        case 'cod':
            header('Location: customer-payment-record-transaction.php');
            $_SESSION['paymeth'] = "Cash on Delivery";
            break;
        default:
            header('Location: customer-payment-page.php');
            break;
    }
    exit();
  }

    

    $order_id = $_SESSION['order_id'];

    $sql = "SELECT * FROM `orders` WHERE order_id = :order_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     // Echoing POST variables for debugging
    //     echo "City: " . $_POST['city'] . "<br>";
    //     echo "Barangay: " . $_POST['barangay'] . "<br>";
        
    //     // Setting session variables
    //     $_SESSION['city'] = $_POST['city'];
    //     $_SESSION['barangay'] = $_POST['barangay'];
    // }

if (isset($_POST['saved-address']) && !empty($_POST['saved-address'])) {
    $saved_address = json_decode($_POST['saved-address'], true); // Decode JSON to associative array
    
    if (json_last_error() === JSON_ERROR_NONE) {
        $_SESSION['address_type'] = $saved_address;
        
        // Assuming $saved_address is already defined
        $uaddress_id = $saved_address['uaddress_id'];
        $user_id = $saved_address['user_id'];
        $uaddress_name = $saved_address['uaddress_name'];
        $uaddress_type = $saved_address['uaddress_type'];
        $uaddress_house_num = $saved_address['uaddress_house_num'];
        $uaddress_street = $saved_address['uaddress_street'];
        $uaddress_brgy = $saved_address['uaddress_brgy'];
        $uaddress_city = $saved_address['uaddress_city'];
        $uaddress_landmark = $saved_address['uaddress_landmark'];
        $uaddress_added_at = $saved_address['uaddress_added_at'];

        // Save address details to the session
        $_SESSION['uaddress_id'] = $uaddress_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['uaddress_name'] = $uaddress_name;
        $_SESSION['uaddress_type'] = $uaddress_type;
        $_SESSION['uaddress_house_num'] = $uaddress_house_num;
        $_SESSION['uaddress_street'] = $uaddress_street;
        $_SESSION['uaddress_brgy'] = $uaddress_brgy;
        $_SESSION['uaddress_city'] = $uaddress_city;
        $_SESSION['uaddress_landmark'] = $uaddress_landmark;
        $_SESSION['uaddress_added_at'] = $uaddress_added_at;

        // Set delivery fee based on the city
        if ($uaddress_city == "Candaba") {
            $_SESSION['delivery_fee'] = 30;
        } else if ($uaddress_city == "San Luis") {
            $_SESSION['delivery_fee'] = 20;
        }
        // // Debug: Print individual values
        // echo "Address ID: " . $uaddress_id . "<br>";
        // echo "User ID: " . $user_id . "<br>";
        // echo "Address Name: " . $uaddress_name . "<br>";
        // echo "Address Type: " . $uaddress_type . "<br>";
        // echo "House Number: " . $uaddress_house_num . "<br>";
        // echo "Street: " . $uaddress_street . "<br>";
        // echo "Barangay: " . $uaddress_brgy . "<br>";
        // echo "City: " . $uaddress_city . "<br>";
        // echo "Landmark: " . $uaddress_landmark . "<br>";
        // echo "Added At: " . $uaddress_added_at . "<br>";
    }else {
        // echo "Saved Address: " . $_POST['saved-address'] . "<br>";
        $_SESSION['uaddress_type'] = $_POST['saved-address'];
    }
}



  // Determine the barangay value based on the selected option or text input
  if (isset($_POST['barangay'])) {
    $_SESSION['brgy'] = $_POST['barangay'];
    // echo "Barangay: " . $_SESSION['brgy'] . "<br>";
  }

  // Check for other address details
  if (isset($_POST['house_num']) && !empty($_POST['house_num'])) {
      $_SESSION['house_num'] = $_POST['house_num'];
    //   echo "House number: " . $_SESSION['house_num'] . "<br>";
  }

  if (isset($_POST['street']) && !empty($_POST['street'])) {
      $_SESSION['street'] = $_POST['street'];
    //   echo "Street: " . $_SESSION['street'] . "<br>";
  }

  if (isset($_POST['landmark']) && !empty($_POST['landmark'])) {
      $_SESSION['landmark'] = $_POST['landmark'];
    //   echo "Landmark: " . $_SESSION['landmark'] . "<br>";
  }

    // echo "Barangay: " . $_POST['city-dropdown'] . "<br>";
    // echo "City: " . $_POST['barangay-dropdown'] . "<br>";
    $_SESSION['sub_total'] = $order['order_sub_total'];

if (isset($_POST['delivery_fee'])) {
    $_SESSION['delivery_fee'] = $_POST['delivery_fee'];
    $_SESSION['grand_total'] = $order['order_sub_total'] + $_POST['delivery_fee'];

}
  

    // echo "Order ID: " . $_SESSION['order_id'] . "<br>";
    // echo "Sub Total: " . $_SESSION['sub_total'] . "<br>";
    // echo "Delivery Fee: " . $_SESSION['delivery_fee'] . "<br>";
    // echo "Grand Total: " . $_SESSION['grand_total'] . "<br>";

    // Check if the POST variables are set
    if (isset($_POST['barangay-dropdown']) && isset($_POST['city-dropdown'])) {
        // Sanitize and save the POST variables to session
        $barangay = filter_input(INPUT_POST, 'barangay-dropdown', FILTER_SANITIZE_SPECIAL_CHARS);
        $city = filter_input(INPUT_POST, 'city-dropdown', FILTER_SANITIZE_SPECIAL_CHARS);

        $_SESSION['barangay'] = $barangay;
        $_SESSION['city'] = $city;
    }


    // echo '<pre>';
    // var_dump($_SESSION);
    // echo '</pre>';

    // print_r($_POST);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Payment Options</title>
   <link rel="icon" href="assets/images/favicon.png" type="image/png">
       <link rel="stylesheet" href="css/style.css">
    <style>

        body {
            background-color: #e9ecf3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .payment-method-container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            height: 540px;
        }
        h2 {
            margin-bottom: 10px;
            color: #333;
        }
        p {
            margin-bottom: 20px;
            color: #666;
        }
        .payment-option {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: border-color 0.3s;
            height: 60px;
        }
        .payment-option:hover {
            border-color: #00b464;
        }
        .payment-option input {
            margin-left: 10px;
        }
        .payment-option label {
            flex: 1;
            display: flex;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            font-size: 1.5rem;
        }
        p {
            font-size: 1.5rem;
        }
        .payment-option img {
            padding: 10px 0;
            margin-right: 10px;
            width: 100px;
        }
        .form-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
.continue-btn, .go-back-btn {
    font-size: 15px;
    font-weight: 600;
    background: #00b464;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.2s;
    width: 100%;
}
.continue-btn:hover, .go-back-btn:hover {
    background: #165348;
}
        .go-back-btn {
            background: #dcdcdc;
            color: #333;
        }
        .go-back-btn:hover {
            background: #c0c0c0;
        }
        a {
            text-decoration: none;
        }
        h1 {
    font-size: 3rem;
    margin-bottom: 5px;
}
    </style>
</head>
<body>
    <div class="payment-method-container">
        <h1>Select payment method</h1>
        <p>Preferred method with secure transactions.</p>
        <form action="" method="post">
            <div class="payment-option">
                <label for="gcash">
                     Pay with GCash
                </label>
                <img src="assets/images/GCash_logo.svg.png">
                <input type="radio" id="gcash" name="payment" value="gcash" checked>
            </div>
             <div class="payment-option">
                <label for="cod">
                     Cash on Delivery
                </label>
                <img src="assets/images/cod.png" alt="Card">
                <input type="radio" id="cod" name="payment" value="cod">
            </div>
            <div class="form-actions">
                <button type="submit" name="payment-option-confirmed" class="continue-btn">Continue</button>
                <a class="go-back-btn" href="customer-cart.php">Go Back</a>
            </div>
        </form>
    </div>
    <script>
   function validateInput(input) {
      if (!input.checkValidity()) {
         input.classList.add('invalid-input');
      } else {
         input.classList.remove('invalid-input');
      }
   }

   function validateForm() {
      var inputs = document.querySelectorAll('.step.active input, .step.active select');
      var isValid = true;

      inputs.forEach(function(input) {
         if (!input.checkValidity()) {
            input.classList.add('invalid-input');
            isValid = false;
         } else {
            input.classList.remove('invalid-input');
         }
      });

      return isValid;
   }

   function togglePasswordVisibility() {
      var passwordInput = document.getElementById('pass');
      var confirmPasswordInput = document.getElementById('confirmPassword');
      var showPasswordCheckbox = document.getElementById('show-password');

      if (showPasswordCheckbox.checked) {
         passwordInput.type = 'text';
         confirmPasswordInput.type = 'text';
      } else {
         passwordInput.type = 'password';
         confirmPasswordInput.type = 'password';
      }
   }

   function showStep(step) {
      var steps = document.getElementsByClassName('step');
      for (var i = 0; i < steps.length; i++) {
         steps[i].classList.remove('active');
      }
      document.getElementById('step' + step).classList.add('active');

      // Remove invalid input highlighting from inputs of the previous step
      var previousStepInputs = document.querySelectorAll('.step:not(.active) input, .step:not(.active) select');
      previousStepInputs.forEach(function(input) {
         input.classList.remove('invalid-input');
      });
   }
</script>

</body>
</html>
