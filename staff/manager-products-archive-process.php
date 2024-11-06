<?php
require('../database/connections/conx-staff.php');

$pid = $_POST['pid'];

try {
    $sqlArchive = "UPDATE products SET prod_status = 'Archived' WHERE prod_id = ?";
    $stmt = $pdo->prepare($sqlArchive);
    $stmt->execute([$pid]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
