<?php
// Include TCPDF library
require_once('pdf/tcpdf.php');
require('../database/connections/conx-customer.php');

$id = $_SESSION['user_id'];

// Capture search query and date filters
$search_query = isset($_POST['search_query']) ? $_POST['search_query'] : (isset($_GET['search_query']) ? $_GET['search_query'] : '');
$startDate = isset($_POST['start_date']) ? $_POST['start_date'] : (isset($_GET['start_date']) ? $_GET['start_date'] : '');
$endDate = isset($_POST['end_date']) ? $_POST['end_date'] : (isset($_GET['end_date']) ? $_GET['end_date'] : '');

// Define how many results you want per page
$results_per_page = 10;

// Prepare the base SQL query
// Prepare the base SQL query
$sql = "
SELECT 
    COALESCE(SUM(CASE WHEN payments.pay_status = 'paid' THEN order_grand_total END), 0) AS total_sales_amount, 
    COUNT(CASE WHEN payments.pay_status = 'paid' THEN orders.order_id END) AS total_orders,
    COALESCE(SUM(CASE WHEN payments.pay_status = 'paid' THEN order_qty END), 0) AS total_cups_sold, 
    user_addresses.uaddress_city, 
    user_addresses.uaddress_brgy 
FROM orders 
LEFT JOIN user_addresses ON user_addresses.uaddress_id = orders.uaddress_id 
LEFT JOIN payments ON payments.order_id = orders.order_id 
";

// WHERE payments.pay_status = 'paid'

// Add search query filter
if (!empty($search_query)) {
    $sql .= " AND (user_addresses.uaddress_city LIKE :search_query OR user_addresses.uaddress_brgy LIKE :search_query)";
}

// Add date filters to the SQL query
if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND orders.order_opened_at BETWEEN :start_date AND DATE_ADD(:end_date, INTERVAL 1 DAY)";
} else if (!empty($startDate)) {
    $sql .= " AND orders.order_opened_at >= :start_date";
} else if (!empty($endDate)) {
    $sql .= " AND orders.order_opened_at < DATE_ADD(:end_date, INTERVAL 1 DAY)";
}

$sql .= " GROUP BY user_addresses.uaddress_city, user_addresses.uaddress_brgy 
          ORDER BY total_sales_amount DESC 
          LIMIT :starting_limit, :results_per_page";

// Determine which page number visitor is currently on
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) {
    $current_page = 1;
}

// Determine the SQL LIMIT starting number for the results on the displaying page
$starting_limit = ($current_page - 1) * $results_per_page;

$stmt = $pdo->prepare($sql);
if (!empty($search_query)) {
    $stmt->bindValue(':search_query', '%' . $search_query . '%', PDO::PARAM_STR);
}
if (!empty($startDate) && !empty($endDate)) {
    $stmt->bindValue(':start_date', $startDate, PDO::PARAM_STR);
    $stmt->bindValue(':end_date', $endDate, PDO::PARAM_STR);
} else if (!empty($startDate)) {
    $stmt->bindValue(':start_date', $startDate, PDO::PARAM_STR);
} else if (!empty($endDate)) {
    $stmt->bindValue(':end_date', $endDate, PDO::PARAM_STR);
}
$stmt->bindValue(':starting_limit', $starting_limit, PDO::PARAM_INT);
$stmt->bindValue(':results_per_page', $results_per_page, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



// Log the action in audit trail
$sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Downloaded Geographical Sales Report")';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

// Initialize TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tea Project Tenejero Branch');
$pdf->SetTitle('Geographical Sales Report');
$pdf->SetSubject('Geographical Sales Report');
$pdf->SetKeywords('TCPDF, PDF, report, geographical');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Header
$pdf->writeHTML('<h1 class="text-center mb-4">Geographical Sales Report</h1>', true, false, true, false, '');
$pdf->writeHTML('<p class="text-center">Report generated on ' . date('M d, Y') . '</p>', true, false, true, false, '');
// Additional lines
$filteredBy = "<br>";


// Append date range if both start date and end date are not empty
if (!empty($startDate) && !empty($endDate)) {
    $filteredBy .= "Dates: {$startDate} to {$endDate}";
} else {
    $filteredBy .= "All Dates";
}

// Trim trailing space and semicolon if no filters were applied
$filteredBy = rtrim($filteredBy, "; ");

// Write "Filtered by" information
$pdf->writeHTML('<p>' . $filteredBy . '</p>', true, false, true, false, '');

// Table
$html = '<table border="1" cellspacing="0" cellpadding="5">';
$html .= '<thead>';
$html .= '<tr>
            <th>City</th>
            <th>Barangay</th>
            <th>Total Orders</th>
            <th>Total Items Sold</th>
            <th>Total Sales Amount</th>
        </tr>';
$html .= '</thead>';
$html .= '<tbody>';

// Loop through the results
foreach ($result as $row) {
    // Add data for each record
    $html .= '<tr>';
    $html .= '<td>'. $row['uaddress_city'] .'</td>';
    $html .= '<td>'. $row['uaddress_brgy'] .'</td>';
    $html .= '<td>'. $row['total_orders'] .'</td>';
    $html .= '<td>'. $row['total_cups_sold'] .'</td>';
    $html .= '<td>'. number_format($row['total_sales_amount'], 2) .'</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('geographical_sales_report_' . date('Y-m-d') . '.pdf', 'D');

// Close the database connection
$pdo = null;
?>
