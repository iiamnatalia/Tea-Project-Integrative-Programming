<?php 
require('../database/connections/conx-staff.php');

try {
    $sqlArchivedProducts = "SELECT * FROM products WHERE prod_status = 'Archived'";
    $stmt = $pdo->query($sqlArchivedProducts);
    $archivedProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($archivedProducts)) {
        echo "<tr><td colspan='5'>No Archived Products</td></tr>";
    } else {
        foreach ($archivedProducts as $product) {
            echo "<tr>";
            echo "<td width='250px'>" . htmlspecialchars($product['prod_name']) . "</td>";
            echo "<td>" . htmlspecialchars($product['prod_category']) . "</td>";
            echo "<td>" . htmlspecialchars($product['prod_base_price']) . "</td>";
            echo "<td width='100px'><img src='../" . htmlspecialchars($product['prod_img']) . "' style='width: 22px;'></td>";
            echo '<td>
                <a href="#" onclick="unarchiveProduct(' . htmlspecialchars($product['prod_id']) . ')"><i class="fas fa-undo" style="color: #0e3d30; font-size: 20px;"></i></a>
            </td>';
            echo "</tr>";
        }
    }
} catch (PDOException $e) {
    echo "Error fetching archived products: " . $e->getMessage();
}
?>
