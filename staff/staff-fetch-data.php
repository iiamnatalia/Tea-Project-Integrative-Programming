<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../database/connections/conx-customer.php';  // Ensure this file exists and sets up a PDO connection

$year = $_GET['year'] ?? date('Y');

$sql = "SELECT 
            MONTH(pay_paid_at) AS month,
            SUM(CASE WHEN YEAR(pay_paid_at) = YEAR(CURDATE()) AND MONTH(pay_paid_at) = MONTH(CURDATE()) AND pay_status = 'Paid' THEN pay_amount ELSE 0 END) AS salesMonth,
            SUM(CASE WHEN YEAR(pay_paid_at) = YEAR(CURDATE()) AND MONTH(pay_paid_at) = MONTH(CURDATE()) AND pay_status = 'Paid' THEN 1 ELSE 0 END) AS doneOrdersMonth,
            SUM(CASE WHEN YEAR(pay_paid_at) = YEAR(CURDATE()) AND pay_status = 'Paid' THEN pay_amount ELSE 0 END) AS salesYear,
            SUM(CASE WHEN YEAR(pay_paid_at) = YEAR(CURDATE()) AND pay_status = 'Paid' THEN 1 ELSE 0 END) AS doneOrdersYear,
            COUNT(CASE WHEN pay_status IN ('Refunded', 'To be Refunded', NULL) THEN 1 ELSE NULL END) AS canceledOrders,
            COUNT(CASE WHEN pay_status IN ('Paid', 'Unpaid') THEN 1 ELSE NULL END) AS orders
        FROM payments
        WHERE YEAR(pay_paid_at) = :year 
        GROUP BY MONTH(pay_paid_at)";

$stmt = $pdo->prepare($sql);
$stmt->execute(['year' => $year]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>
