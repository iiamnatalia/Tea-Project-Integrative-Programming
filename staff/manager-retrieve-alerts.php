<?php
require('../database/connections/conx-customer.php');

try {
    // Prepare SQL query to retrieve booking information
    $query = "SELECT * FROM `orders` WHERE order_status = 'Placed' ORDER BY order_placed_at DESC";


    $statement = $pdo->prepare($query);
    // Execute the query
    $statement->execute();

    // Fetch all booking information as associative arrays
    $orders = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Close database connection
    $pdo = null;

    // Return bookings as JSON
    echo json_encode($orders);
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Database connection error: ' . $e->getMessage()));
}
?>

