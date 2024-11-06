<?php
require "database/connections/conx-customer.php"; // Include your database connection file

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    if (isset($_POST['fb_message'])) {
        $fb_message = $_POST['fb_message'];
    }else {
        $fb_message = "None";
    }

    if (isset($_POST['rate'])) {
        $fb_stars = $_POST['rate'];
    }else {
        $fb_stars = 1;
    }


    $sql = "INSERT INTO feedbacks (user_id, order_id, fb_message, fb_stars) VALUES (:user_id, :order_id, :fb_message, :fb_stars)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id, 'order_id' => $order_id, 'fb_message' => $fb_message, 'fb_stars' => $fb_stars]);

    $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Submitted a Feedback for Order ID #" ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $order_id]);

    header('Location: customer-orders.php'); // Redirect back to the orders page
}
?>
