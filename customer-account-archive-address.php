<?php
require ('database/connections/conx-customer.php');

if (isset($_POST['address_id'])) {
    $address_id = $_POST['address_id'];

    $sql = "UPDATE user_addresses SET uaddress_archived = 1 WHERE uaddress_id = :address_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['address_id' => $address_id]);

    header("Location: customer-account.php");
    exit();
}
?>