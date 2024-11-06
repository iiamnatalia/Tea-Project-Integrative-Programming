<?php
// Include TCPDF library
require_once('pdf/tcpdf.php');
require('../database/connections/conx-customer.php');



// Capture search query and date filters from URL parameters
$search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';

$id = $_SESSION['user_id'];

// Prepare the SQL query to retrieve filtered audit trail data
$sql = "
    SELECT 
        audit_trail.audit_id, 
        audit_trail.user_id, 
        audit_trail.audit_action, 
        audit_trail.audit_dated_at,
        users.user_fname,
        users.user_lname,
        users.user_email
    FROM 
        audit_trail
    LEFT JOIN
        users
    ON
        audit_trail.user_id = users.user_id
    WHERE 
        (users.user_fname LIKE :search_query 
         OR users.user_lname LIKE :search_query 
         OR audit_trail.audit_action LIKE :search_query 
         OR audit_trail.audit_dated_at LIKE :search_query)";

// Add date filters to the SQL query
if (!empty($startDate) && !empty($endDate)) {
    // Increment the end date by 1 day to include it in the filter
    $endDatePlusOne = date('Y-m-d', strtotime($endDate . ' +1 day'));
    $sql .= " AND audit_trail.audit_dated_at BETWEEN :start_date AND :end_date";
}

$sql .= " ORDER BY audit_trail.audit_dated_at DESC";

$stmt = $pdo->prepare($sql);
$search_param = '%' . $search_query . '%';
$stmt->bindValue(':search_query', $search_param, PDO::PARAM_STR);
if (!empty($startDate) && !empty($endDate)) {
    $stmt->bindValue(':start_date', $startDate, PDO::PARAM_STR);
    $stmt->bindValue(':end_date', $endDatePlusOne, PDO::PARAM_STR);
}
$stmt->execute();
$auditTrail = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as an associative array

// Log the action in audit trail
$sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Downloaded Audit Trail Report")';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

// Initialize TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Company Name');
$pdf->SetTitle('Audit Trail Report');
$pdf->SetSubject('Audit Trail Report');
$pdf->SetKeywords('TCPDF, PDF, report, audit trail');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Header
$pdf->writeHTML('<h1 class="text-center mb-4">Audit Trail Report</h1>', true, false, true, false, '');
$pdf->writeHTML('<p class="text-center">Report generated on ' . date('M d, Y') . '</p>', true, false, true, false, '');
// Additional lines
$filteredBy = "<br>";

// Append search query if not empty
if (!empty($search_query)) {
    $filteredBy .= "Filter: {$search_query}";
} else {
    $filteredBy .= "Filter: None";
}

// Append date range if both start date and end date are not empty
if (!empty($startDate) && !empty($endDate)) {
    $filteredBy .= "<br>Dates: {$startDate} to {$endDate}";
} else {
    $filteredBy .= "<br>Dates: None";
}

// Trim trailing space and semicolon if no filters were applied
$filteredBy = rtrim($filteredBy, "; ");

// Write "Filtered by" information
$pdf->writeHTML('<p>' . $filteredBy . '</p>', true, false, true, false, '');

// Table
$html = '<table border="1" cellspacing="0" cellpadding="5">';
$html .= '<thead>';
$html .= '<tr>
            <th>Audit ID</th>
            <th>User</th>
            <th>Action</th>
            <th>Timestamp</th>
        </tr>';
$html .= '</thead>';
$html .= '<tbody>';

// Loop through the results
foreach ($auditTrail as $row) {
    // Add data for each record
    $html .= '<tr>';
    $html .= '<td>'. $row['audit_id'] .'</td>';
    $html .= '<td>'. $row['user_fname'] . ' ' . $row['user_lname'] . '<br>' . $row['user_email'] . '</td>';
    $html .= '<td>' . $row['audit_action'] . '</td>';
    $html .= '<td>' . $row['audit_dated_at'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('audit_trail_' . date('Y-m-d') . '.pdf', 'D');

// Close the database connection
$pdo = null;
?>
