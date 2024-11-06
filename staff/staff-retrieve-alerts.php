<?php
require('database/connections/conx_staff.php');

try {
    // Prepare SQL query to retrieve booking information
    $query = "SELECT `book_id`, `user_id`, `package_id`, `hall_id`, `book_pax`, `book_date`, `book_start_time`, `book_end_time`, `book_total_amount`, `book_res_fee`, `book_total_paid`, `book_status`, `book_created_at` FROM `bookings` WHERE book_status = 'Reserved' ORDER BY `book_created_at` DESC";
    $statement = $pdo->prepare($query);
    // Execute the query
    $statement->execute();

    // Fetch all booking information as associative arrays
    $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Close database connection
    $pdo = null;

    // Return bookings as JSON
    echo json_encode($bookings);
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Database connection error: ' . $e->getMessage()));
}
?>

