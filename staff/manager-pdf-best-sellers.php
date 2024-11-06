<?php
require_once('pdf/tcpdf.php');
require('../database/connections/conx-customer.php');

$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';

$sql = "SELECT 
            products.*,
            COUNT(order_items.oitem_qty) AS total_orders,
            SUM(order_items.oitem_qty) AS total_items_sold,
            SUM(order_items.oitem_qty * products.prod_base_price) AS total_sales_amount
        FROM 
            order_items
        LEFT JOIN
            orders ON order_items.order_id = orders.order_id
        LEFT JOIN
            payments ON orders.order_id = payments.order_id
        LEFT JOIN 
            products ON order_items.prod_id = products.prod_id
        WHERE 
            payments.pay_status = 'Paid'";

if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND orders.order_opened_at BETWEEN :start_date AND DATE_ADD(:end_date, INTERVAL 1 DAY)";
} else if (!empty($startDate)) {
    $sql .= " AND orders.order_opened_at >= :start_date";
} else if (!empty($endDate)) {
    $sql .= " AND orders.order_opened_at < DATE_ADD(:end_date, INTERVAL 1 DAY)";
}

$sql .= " GROUP BY order_items.prod_id
          ORDER BY total_items_sold DESC
          LIMIT 10";

$stmt = $pdo->prepare($sql);
if (!empty($startDate) && !empty($endDate)) {
    $stmt->bindValue(':start_date', $startDate, PDO::PARAM_STR);
    $stmt->bindValue(':end_date', $endDate, PDO::PARAM_STR);
}
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tea Project Tenejero Branch');
$pdf->SetTitle('Best Sellers Report');
$pdf->SetSubject('Best Sellers Report');
$pdf->SetKeywords('TCPDF, PDF, report, best sellers');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$pdf->SetFont('helvetica', '', 10);

$pdf->writeHTML('<h1 class="text-center mb-4">Best Sellers Report</h1>', true, false, true, false, '');
$pdf->writeHTML('<p class="text-center">Report generated on ' . date('M d, Y') . '</p>', true, false, true, false, '');

$html = '<table border="1" cellspacing="0" cellpadding="5">';
$html .= '<thead>';
$html .= '<tr>
            <th>Rank</th>
            <th>Item Name</th>
            <th>Total Orders</th>
            <th>Total Cups Sold</th>
            <th>Total Sales Amount</th>
        </tr>';
$html .= '</thead>';
$html .= '<tbody>';

$rank = 1;
foreach ($result as $item) {
    $html .= '<tr>';
    $html .= '<td>' . $rank . '</td>';
    $html .= '<td>' . htmlspecialchars($item['prod_name']) . ' ' . htmlspecialchars($item['prod_category']) . '</td>';
    $html .= '<td>' . htmlspecialchars($item['total_orders']) . '</td>';
    $html .= '<td>' . htmlspecialchars($item['total_items_sold']) . '</td>';
    $html .= '<td>PHP ' . number_format(htmlspecialchars($item['total_sales_amount']), 2) . '</td>';
    $html .= '</tr>';
    $rank++;
}

$html .= '</tbody>';
$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('best_sellers_report_' . date('Y-m-d') . '.pdf', 'D');

$pdo = null;
?>
