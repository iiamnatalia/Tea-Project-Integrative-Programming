<?php
// Include the database connection
require ('../database/connections/conx-customer.php');

// Check if the user is logged in by verifying the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Fetch user information
    $sqlFetch = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $pdo->prepare($sqlFetch);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $user_id = 1;
    // header("Location: ../index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TeaProj. E-Sip</title>
    <link rel="icon" href="../assets/images/favicon.png" type="image/png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px; /* Default font size for the body */
        }

        h2 {
            font-size: 30px; /* Font size for headings */
        }

        .card-title {
            font-size: 18px; /* Font size for card titles */
        }

        .card-text {
            font-size: 14px; /* Font size for card content */
        }

        #bookingsChart {
            font-size: 12px; /* Font size for the chart */
        }
        
        .mt-4, .my-4 {
            margin-top: 1rem !important;
            margin-bottom: .7rem !important;
        }
        
        .shadow {
            box-shadow: none;
        }

        #wrapper #content-wrapper {
            background-color: #f8f9fc8f;
            width: 100%;
            overflow-x: hidden;
        }

        #successful-login-alerts {
            max-height: 300px;
            overflow-y: auto;
        }

        .chart-container {
            height: 500px; /* Example height, adjust as needed */
            position: relative;
        }

        /* Ensure canvas respects the max-height rule */
        #bookingsChart {
            max-height: 80%;
            width: 100%;
        }

        .sidebar .nav-item .collapse .collapse-inner .collapse-item, 
        .sidebar .nav-item .collapsing .collapse-inner .collapse-item {
            white-space: wrap;
        }

        a img {
            height: 25px;
            margin-top: -5px;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="manager-dashboard.php">
                Te<img src="../assets/images/IMG_1296.png">Proj. E-Sip
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="manager-dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Processes
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Essential Reports</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" href="manager-report-best-sellers.php">Best Sellers</a>
                        <a class="collapse-item" href="manager-report-sales-report.php">Sales Report</a>
                        <a class="collapse-item" href="manager-report-geographical-sales.php">Geographical Sales Report</a>
                        <a class="collapse-item" href="manager-report-audit-trail.php">Audit Trail</a>
                        <a class="collapse-item" href="manager-report-feedbacks.php">Feedbacks</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Order Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="manager-orders-management.php">Manage Orders</a>
                        <a class="collapse-item" href="manager-orders-canceled.php">Canceled Orders</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="manager-products-management.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Manage Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="manager-users-management.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Manage Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="manager-backup-database.php">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Backup Database</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div>
                        <span style="margin-left: 10px">Date Today: <b><?php echo date('M d, Y'); ?></b></span>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php 
                                    // $user_id = $_SESSION['user_id'];
                                    $sqlFetch = "SELECT * FROM users WHERE user_id = ?";
                                    $stmt = $pdo->prepare($sqlFetch);
                                    $stmt->execute([$user_id]);
                                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                    echo $user['user_fname'];
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="../<?php echo $user['user_pic']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="manager-account.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Account
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

<?php
// Capture search query and date filters
$search_query = isset($_POST['search_query']) ? $_POST['search_query'] : (isset($_GET['search_query']) ? $_GET['search_query'] : '');
$startDate = isset($_POST['start_date']) ? $_POST['start_date'] : (isset($_GET['start_date']) ? $_GET['start_date'] : '');
$endDate = isset($_POST['end_date']) ? $_POST['end_date'] : (isset($_GET['end_date']) ? $_GET['end_date'] : '');

// Clear filter logic
if (isset($_GET['clear']) && $_GET['clear'] == 1) {
    $search_query = '';
    $startDate = '';
    $endDate = '';
}

// Define how many results you want per page
$results_per_page = 10;

// Prepare the base SQL query
$sql = "SELECT COUNT(DISTINCT order_items.oitem_id) 
        FROM order_items 
        JOIN orders ON order_items.order_id = orders.order_id 
        JOIN payments ON orders.order_id = payments.order_id 
        WHERE payments.pay_status = 'Paid'";

// Add date filters to the SQL query
if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND orders.order_opened_at BETWEEN :start_date AND DATE_ADD(:end_date, INTERVAL 1 DAY)";
} else if (!empty($startDate)) {
    $sql .= " AND orders.order_opened_at >= :start_date";
} else if (!empty($endDate)) {
    $sql .= " AND orders.order_opened_at < DATE_ADD(:end_date, INTERVAL 1 DAY)";
}

$stmt = $pdo->prepare($sql);
if (!empty($startDate) && !empty($endDate)) {
    $stmt->bindValue(':start_date', $startDate, PDO::PARAM_STR);
    $stmt->bindValue(':end_date', $endDate, PDO::PARAM_STR);
} else if (!empty($startDate)) {
    $stmt->bindValue(':start_date', $startDate, PDO::PARAM_STR);
} else if (!empty($endDate)) {
    $stmt->bindValue(':end_date', $endDate, PDO::PARAM_STR);
}
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_NUM);
$total_results = $row[0];

// Determine the total number of pages available
$total_pages = ceil($total_results / $results_per_page);

// Determine which page number visitor is currently on
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page > $total_pages) {
    $current_page = $total_pages;
}
if ($current_page < 1) {
    $current_page = 1;
}

// Determine the SQL LIMIT starting number for the results on the displaying page
$starting_limit = ($current_page - 1) * $results_per_page;

// Prepare the SQL query to retrieve selected results from the database
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

// Add date filters to the SQL query
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
} else if (!empty($startDate)) {
    $stmt->bindValue(':start_date', $startDate, PDO::PARAM_STR);
} else if (!empty($endDate)) {
    $stmt->bindValue(':end_date', $endDate, PDO::PARAM_STR);
}
// $stmt->bindValue(':starting_limit', $starting_limit, PDO::PARAM_INT);
// $stmt->bindValue(':results_per_page', $results_per_page, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Begin Page Content -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Best Sellers Report</h2>

    <!-- Date Filter Form -->
    <form method="post" action="">
        <div class="form-row align-items-center">
            <label for="start_date">Start Date:</label>
            <div class="col-auto">
                <input style="width: 280px;" type="date" class="form-control mb-2" id="start_date" name="start_date" value="<?php echo htmlspecialchars($startDate); ?>" max="<?php echo date('Y-m-d'); ?>">
            </div>
            <label for="end_date">End Date:</label>
            <div class="col-auto">
                <input style="width: 280px;" type="date" class="form-control mb-2" id="end_date" name="end_date" value="<?php echo htmlspecialchars($endDate); ?>" max="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Filter</button>
                <button type="button" class="btn btn-secondary mb-2" onclick="window.location.href='?clear=1'">Clear Filter</button>
                <a href="manager-pdf-best-sellers.php?start_date=<?php echo $startDate ?>&end_date=<?php echo $endDate ?>&search_query=<?php echo $search_query ?>" class="btn btn-primary mb-2">Download PDF</a>
            </div>
        </div>
    </form>

    <!-- Best Sellers Table -->
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Rank</th>
                <th>Item Name</th>
                <th>Total Orders</th>
                <th>Total Cups Sold</th>
                <th>Total Sales Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php $rank = 1; foreach ($result as $item) : ?>
                <tr>
                    <td><b><?php echo $rank; ?></b></td>
                    <td><b><?php echo htmlspecialchars($item['prod_name']) . " " . htmlspecialchars($item['prod_category']) ; ?></b></td>
                    <td><b><?php echo htmlspecialchars($item['total_orders']); ?></b></td>
                    <td><b><?php echo htmlspecialchars($item['total_items_sold']); ?></b></td>
                    <td><b><?php echo "PHP " . number_format(htmlspecialchars($item['total_sales_amount']), 2); ?></b></td>
                </tr>
            <?php $rank++; endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <!-- <?php if ($total_pages > 1): ?>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($current_page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>&start_date=<?php echo $startDate; ?>&end_date=<?php echo $endDate; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>&start_date=<?php echo $startDate; ?>&end_date=<?php echo $endDate; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($current_page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>&start_date=<?php echo $startDate; ?>&end_date=<?php echo $endDate; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?> -->
</div>


                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="../sign-out-handler.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
