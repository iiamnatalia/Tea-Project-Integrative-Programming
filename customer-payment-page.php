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
    }else {
        $_SESSION['uaddress_type'] = $_POST['saved-address'];
    }
}

  if (isset($_POST['barangay'])) {
    $_SESSION['brgy'] = $_POST['barangay'];
  }

  // Check for other address details
  if (isset($_POST['house_num']) && !empty($_POST['house_num'])) {
      $_SESSION['house_num'] = $_POST['house_num'];
  }

  if (isset($_POST['street']) && !empty($_POST['street'])) {
      $_SESSION['street'] = $_POST['street'];
  }

  if (isset($_POST['landmark']) && !empty($_POST['landmark'])) {
      $_SESSION['landmark'] = $_POST['landmark'];
  }

    $_SESSION['sub_total'] = $order['order_sub_total'];

if (isset($_POST['delivery_fee'])) {
    $_SESSION['delivery_fee'] = $_POST['delivery_fee'];
    $_SESSION['grand_total'] = $order['order_sub_total'] + $_POST['delivery_fee'];

}

    // Check if the POST variables are set
    if (isset($_POST['barangay-dropdown']) && isset($_POST['city-dropdown'])) {
        // Sanitize and save the POST variables to session
        $barangay = filter_input(INPUT_POST, 'barangay-dropdown', FILTER_SANITIZE_SPECIAL_CHARS);
        $city = filter_input(INPUT_POST, 'city-dropdown', FILTER_SANITIZE_SPECIAL_CHARS);

        $_SESSION['barangay'] = $barangay;
        $_SESSION['city'] = $city;
    }

    // Assuming you have a user_id stored in the session (you need to implement session handling)
    $user_id = $_SESSION['user_id']; // Replace this with your actual session handling

    // Retrieve cart items from the order_items table for the logged-in user
    $sqlCartItems = "SELECT oi.*, p.*
                    FROM `order_items` AS oi
                    INNER JOIN `orders` AS o ON oi.`order_id` = o.`order_id`
                    LEFT JOIN `products` AS p ON oi.`prod_id` = p.`prod_id`
                    WHERE o.`order_status` = 'Open' AND o.`user_id` = :user_id";

    $stmtCartItems = $pdo->prepare($sqlCartItems);
    $stmtCartItems->execute(['user_id' => $user_id]);

    function generateRefNumber() {
        $characters = '0123456789';
        $refNumber = '';
        $length = 10;
    
        for ($i = 0; $i < $length; $i++) {
            $refNumber .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $refNumber;
    }
    
    $refNumber = generateRefNumber();

    require_once('vendor/autoload.php');

    $client = new \GuzzleHttp\Client();

    $line_items = array();
    foreach ($stmtCartItems as $order) {
        // Set the order item ID for add-ons query
        $orderItemId = $order['oitem_id'];
        // Create the line item with necessary details
        $line_items[] = array(
            "currency" => "PHP",
            "amount" => $order['oitem_total']/$order['oitem_qty'] * 100,
            "name" => $order['prod_name'] . "(" . $order['prod_category'] . ")",
            "quantity" => $order['oitem_qty']
        );
    }
    

    
//     echo "<pre>";
// print_r($line_items);
// echo "</pre>";
// exit;
    $response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
      'body' => json_encode([
          'data' => [
              'attributes' => [
                  'send_email_receipt' => true,
                  'show_description' => false,
                  'show_line_items' => true,
                  'line_items' => $line_items, // Assume $line_items is already an array
                  'payment_method_types' => ["gcash","paymaya","card","qrph","brankas_bdo","brankas_landbank","brankas_metrobank"],
                  'reference_number' => $refNumber,
                  'cancel_url' => 'http://localhost/tea_project/customer-cart.php',
                  'success_url' => 'http://localhost/tea_project/customer-payment-record-transaction.php',
                  'success_redirect_url' => 'http://localhost/tea_project/customer-payment-record-transaction.php',
              ]
          ]
      ]),
      'headers' => [
        'Content-Type' => 'application/json',
        'accept' => 'application/json',
        'authorization' => 'Basic c2tfdGVzdF92SkVlRWh6NExpUzJiRjk3d0piOGpqaUs6',
      ],
    ]);
    
    $res = $response->getBody();
    $payment_json = json_decode($res, true);
    
    header("Location: " . $payment_json['data']['attributes']['checkout_url']);

// Close the connection
$pdo = null;
?>