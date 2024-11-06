<?php
require('../database/connections/conx-staff.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prod_id = $_POST['prod_id'];
    $prod_name = $_POST['prod_name'];
    $prod_category = $_POST['prod_category'];
    $prod_base_price = $_POST['prod_base_price'];

    $prod_img = $_FILES['prod_img']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($prod_img);

    if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $target_file)) {
        try {
            $sqlUpdateProduct = "UPDATE products SET prod_name = ?, prod_category = ?, prod_base_price = ?, prod_img = ? WHERE prod_id = ?";
            $stmt = $pdo->prepare($sqlUpdateProduct);
            $stmt->execute([$prod_name, $prod_category, $prod_base_price, $target_file, $prod_id]);
            echo "Product updated successfully";
        } catch (PDOException $e) {
            echo "Error updating product: " . $e->getMessage();
        }
    } else {
        try {
            $sqlUpdateProduct = "UPDATE products SET prod_name = ?, prod_category = ?, prod_base_price = ? WHERE prod_id = ?";
            $stmt = $pdo->prepare($sqlUpdateProduct);
            $stmt->execute([$prod_name, $prod_category, $prod_base_price, $prod_id]);
            echo "Product updated successfully";
        } catch (PDOException $e) {
            echo "Error updating product: " . $e->getMessage();
        }
    }
}
?>
