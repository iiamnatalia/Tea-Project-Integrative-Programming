<?php
require('../database/connections/conx-staff.php');

$pid = $_POST['pid'];

try {
    $sqlUnarchive = "UPDATE products SET prod_status = 'Available' WHERE prod_id = ?";
    $stmt = $pdo->prepare($sqlUnarchive);
    $stmt->execute([$pid]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
