<?php
// Include TCPDF library
require_once('pdf/tcpdf.php');
require ('../database/connections/conx-customer.php');

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
$period = isset($_GET['period']) ? $_GET['period'] : '';

$id = $_SESSION['user_id'];

// Prepare the base SQL query
$sql = "
SELECT 
    ";

if ($period == 'daily') {
    $sql .= "DATE_FORMAT(orders.order_opened_at, '%Y-%m-%d')";
} elseif ($period == 'weekly') {
    $sql .= "CONCAT(YEAR(orders.order_opened_at), ' Week ', WEEK(orders.order_opened_at))";
} elseif ($period == 'monthly') {
    $sql .= "DATE_FORMAT(orders.order_opened_at, '%Y-%m')";
} elseif ($period == 'yearly') {
    $sql .= "DATE_FORMAT(orders.order_opened_at, '%Y')";
} else {
    $sql .= "orders.order_opened_at";
}

$sql .= " AS period,
    COALESCE(SUM(CASE WHEN payments.pay_status = 'paid' THEN order_grand_total END), 0) AS total_sales_amount, 
    COUNT(CASE WHEN payments.pay_status = 'paid' THEN orders.order_id END) AS total_orders,
    COALESCE(SUM(CASE WHEN payments.pay_status = 'paid' THEN order_qty END), 0) AS total_cups_sold
FROM orders 
LEFT JOIN payments ON payments.order_id = orders.order_id 
WHERE payments.pay_status = 'paid'
";

// Add date filters to the SQL query
if (!empty($start_date) && !empty($end_date)) {
    $sql .= " AND orders.order_opened_at BETWEEN :start_date AND :end_date";
} elseif (!empty($start_date)) {
    $sql .= " AND orders.order_opened_at >= :start_date";
} elseif (!empty($end_date)) {
    $sql .= " AND orders.order_opened_at <= :end_date";
}

// Add GROUP BY clause
$sql .= " GROUP BY period ORDER BY period DESC";

$stmt = $pdo->prepare($sql);
if (!empty($start_date) && !empty($end_date)) {
    $stmt->bindValue(':start_date', $start_date, PDO::PARAM_STR);
    $stmt->bindValue(':end_date', $end_date, PDO::PARAM_STR);
} elseif (!empty($start_date)) {
    $stmt->bindValue(':start_date', $start_date, PDO::PARAM_STR);
} elseif (!empty($end_date)) {
    $stmt->bindValue(':end_date', $end_date, PDO::PARAM_STR);
}

$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as an associative array

// Log the action in audit trail
$sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Downloaded Sales Report")';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

// Initialize TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tea Project Tenejero Branch');
$pdf->SetTitle('TeaProj. E-Sip Sales Report');
$pdf->SetSubject('TeaProj. E-Sip Sales Report');
$pdf->SetKeywords('TCPDF, PDF, report');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Header
$pdf->writeHTML('<h1 class="text-center mb-4">Sales Report</h1>', true, false, true, false, '');
$pdf->writeHTML('<p class="text-center">Report generated on ' . date('Y-m-d') . '</p>', true, false, true, false, '');

// Filters
$pdf->writeHTML('<p class="text-center">Period: ' . htmlspecialchars($period) . '</p>', true, false, true, false, '');
$pdf->writeHTML('<p class="text-center">Start Date: ' . htmlspecialchars($start_date) . '</p>', true, false, true, false, '');
$pdf->writeHTML('<p class="text-center">End Date: ' . htmlspecialchars($end_date) . '</p>', true, false, true, false, '');

// Table
$html = '<table border="1" cellspacing="0" cellpadding="5">';
$html .= '<thead>';
$html .= '<tr>
            <th>Period</th>
            <th>Total Orders</th>
            <th>Total Cups Sold</th>
            <th>Total Sales Amount</th>
        </tr>';
$html .= '</thead>';
$html .= '<tbody>';

// Loop through the results
foreach ($results as $row) {
    // Add data for each record
    $html .= '<tr>';
    $html .= '<td>'. htmlspecialchars($row['period']) .'</td>';
    $html .= '<td>'. htmlspecialchars($row['total_orders']) .'</td>';
    $html .= '<td>' . htmlspecialchars($row['total_cups_sold']) . '</td>';
    $html .= '<td>' . 'PHP ' . number_format(htmlspecialchars($row['total_sales_amount']), 2) . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('sales_report_' . date('Y-m-d') . '.pdf', 'D');

// Close the database connection
$conn = null;
?>
