<?php
// Include the database connection
require('../database/connections/conx-customer.php');
print_r($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_id']) && isset($_POST['update_state'])) {
        $user_id = $_POST['user_id'];
        $action = $_POST['update_state'];

        // Determine the new status based on the action
        $new_status = ($action === 'disable') ? 'Disabled' : 'Enabled';
        print ($new_status);
        try {
            // Update the user status in the database
            $sqlUpdate = "UPDATE users SET user_state = ? WHERE user_id = ?";
            $stmt = $pdo->prepare($sqlUpdate);
            $stmt->execute([$new_status, $user_id]);

            // Redirect to the users management page with success message
            header("Location: manager-users-management.php");
        } catch (PDOException $e) {
            // Redirect to the users management page with error message
            header("Location: manager-users-management.php?status=error");
            die("Error updating user status: " . $e->getMessage());
        }
    } else {
        // Redirect to the users management page with error message
        header("Location: manager-users-management.php");
    }
}
?>
