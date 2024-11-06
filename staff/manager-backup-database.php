<?php
require('../database/connections/conx-staff.php');
session_start();

$id = $_SESSION['user_id'];

$sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Backed Up Database")';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

// Define the directory where the backup file will be stored
$backup_directory = '../database/backups/';

date_default_timezone_set('Asia/Singapore');

// Get today's date for naming the backup file
$backup_date = date("Y-m-d");

// Get current time
$current_time = date("H-i-s");

// Name for the backup file with timestamp
$backup_file = $backup_directory . "tea_proj_backup_" . $backup_date . "_" . $current_time . ".sql";

// Open the backup file in write mode
$file_handle = fopen($backup_file, 'w');

// Get all table names in the database
$tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

// Loop through each table and export its structure and data
foreach ($tables as $table) {
    // Export table structure
    $structure = $pdo->query("SHOW CREATE TABLE $table")->fetch(PDO::FETCH_ASSOC);
    fwrite($file_handle, "-- Table structure for table $table\n");
    fwrite($file_handle, $structure['Create Table'] . ";\n\n");

    // Export table data
    $rows = $pdo->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
    if ($rows) {
        fwrite($file_handle, "-- Data dump for table $table\n");
        foreach ($rows as $row) {
            $row_values = array_map([$pdo, 'quote'], $row);
            $row_values_string = implode(', ', $row_values);
            fwrite($file_handle, "INSERT INTO $table VALUES ($row_values_string);\n");
        }
        fwrite($file_handle, "\n");
    }
}

// Close the backup file
fclose($file_handle);

// Close the database connection
$pdo = null;

// Echo the HTML to trigger the Bootstrap modal
echo '<script type="text/javascript">
    alert("Database has been successfully backed up.");
    window.location.href = "manager-dashboard.php";
</script>';
?>
