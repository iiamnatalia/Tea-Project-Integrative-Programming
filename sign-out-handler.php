<?php
require('database/connections/conx-customer.php');
    $id = $_SESSION['user_id'];
    $id = 1;

    $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Logout")';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    session_unset();
    session_destroy();

    // Redirect to login page
    header('Location: index.php');
    exit();
?>