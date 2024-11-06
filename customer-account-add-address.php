<?php 
  require('database/connections/conx-customer.php');


$user_id = $_SESSION['user_id'];
$region = $_POST['region_text'];
$province = $_POST['province_text'];
$city = $_POST['city_text'];
$barangay = $_POST['barangay_text'];
$address_name = $_POST['address_name'];
$house_num = $_POST['house_num'];
$street = $_POST['street'];
$landmark = $_POST['landmark'];


// Validate required fields
if (empty($region) || empty($province) || empty($city) || empty($barangay) || empty($address_name) || empty($street)) {
    die('Please fill in all required fields.');
}

// Insert the new address into the database
$sql = "INSERT INTO user_addresses (user_id, uaddress_name, uaddress_type, uaddress_house_num, uaddress_street, uaddress_brgy, uaddress_province, uaddress_region, uaddress_city, uaddress_landmark, uaddress_added_at) 
        VALUES (:user_id, :address_name, 'Saved', :house_num, :street, :barangay, :province, :region, :city, :landmark, NOW())";
$stmt = $pdo->prepare($sql);
$params = [
    'user_id' => $user_id,
    'address_name' => $address_name,
    'house_num' => $house_num,
    'street' => $street,
    'barangay' => $barangay,
    'city' => $city,
    'province' => $province,
    'region' => $region,
    'landmark' => $landmark
];

if ($stmt->execute($params)) {
    echo "Address added successfully.";
    header("Location: customer-account.php"); // Redirect to account page
    exit();
} else {
    echo "Error adding address.";
}
?>
