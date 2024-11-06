<?php
// Include the database connection
require('../database/connections/conx-customer.php');

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

$sql = "SELECT * FROM `users`";
// Prepare the SQL statement
$stmt = $pdo->prepare($sql);
// Execute the SQL statement
$stmt->execute();
// Fetch all rows from the result set
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
       <link rel="stylesheet" href="css/snackbar.css">
    <style>
        .table td, .table th {
            padding: .75rem;
            vertical-align: middle;
            border-top: 1px solid #e3e6f0;
        }
        span.enabled-state {
            color: green;
        }
        span.disabled-state {
            color: red;
        }
        span.verified-status {
            color: white;
            background-color: #007bff;
            padding: 5px 10px;
            border-radius: 5px;
        }
        span.registered-status {
            color: white;
            background-color: #dba826;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #e3e6f0;
            padding: .2rem .75rem;
        }
        .flex {
            display: flex;
            gap: 10px;
        }
        table p {
            margin-bottom: 0;
        }
        button.btn.btn-danger.mt-2 {
            width: 200px;
            margin-top: 0rem !important;
        }

        button.btn.btn-primary {
            width: 200px;
        }

        a {
            color: #00925e;
            text-decoration: none;
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }
        a:hover {
            color: #005c3b;
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Essential Reports</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="manager-report-best-sellers.php">Best Sellers</a>
                        <a class="collapse-item" href="manager-report-sales-report.php">Sales Report</a>
                        <a class="collapse-item" href="manager-report-geographical-sales.php">Geographical Sales Report</a>
                        <a class="collapse-item" href="manager-report-audit-trail.php">Audit Trail</a>
                        <a class="collapse-item" href="manager-report-feedbacks.php">Feedbacks</a>
                    </div>
                </div>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Order Management</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" href="manager-orders-management.php">Manage Orders</a>
                        <a class="collapse-item" href="manager-orders-canceled.php">Canceled Orders</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manager-products-management.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Manage Products</span></a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
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

                <!-- Begin Page Content -->
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Manage Orders</h2>
                        </div>
                    </div>

                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs" id="orderTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="placed-tab" data-toggle="tab" href="#placed" role="tab" aria-controls="placed" aria-selected="true">Placed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Approved</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="processing-tab" data-toggle="tab" href="#processing" role="tab" aria-controls="processing" aria-selected="false">Processing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ontheway-tab" data-toggle="tab" href="#ontheway" role="tab" aria-controls="ontheway" aria-selected="false">On the Way</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="delivered-tab" data-toggle="tab" href="#delivered" role="tab" aria-controls="delivered" aria-selected="false">Delivered</a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="orderTabsContent">
                        <?php
                        $orderStatuses = ['Placed', 'Approved', 'Processing', 'On the Way', 'Delivered'];
                        foreach ($orderStatuses as $status):
                            echo '<div class="tab-pane fade';
                            if ($status == 'Placed') {
                                echo ' show active';
                            }
                            echo '" id="' . strtolower(str_replace(' ', '', $status)) . '" role="tabpanel" aria-labelledby="' . strtolower(str_replace(' ', '', $status)) . '-tab">';
                            
                            $sql = "
                                SELECT orders.*, users.*, payments.*, user_addresses.*
                                FROM orders 
                                LEFT JOIN users ON orders.user_id = users.user_id
                                LEFT JOIN user_addresses ON user_addresses.uaddress_id = orders.uaddress_id
                                LEFT JOIN payments ON orders.order_id = payments.order_id 
                                WHERE orders.order_status = ? 
                                ORDER BY orders.order_placed_at DESC
                            ";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([$status]);
                            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if (empty($orders)) {
                                echo "<div>";
                                echo "<br><p>No " . strtolower($status) . " orders found.</p>";
                                echo "</div>";
                            }
                            

                            
                            foreach ($orders as $order):
                                $collapseId = 'orderDetails' . $order['order_id']; // Unique ID for each collapsible element
                                echo "<div class='card mb-3'>";
                                echo "<div class='card-header'>";
                                echo "<div class='d-flex justify-content-between align-items-center'>";
                                echo "<span>Order #" . $order['order_id'] . "</span>";
                                echo "<span>Payment Status: " . $order['pay_status'] . "</span>";
                                echo "<span>Payment Method: " . $order['pay_mode'] . "</span>";

                                // Determine the correct order status based on payment method
                                if ($order['pay_mode'] != 'Cash on Delivery') {
                                    $order_status = 'To be Refunded';
                                } else {
                                    $order_status = 'Canceled';
                                }

                                echo "<button class='btn btn-primary btn-sm' data-toggle='collapse' data-target='#" . $collapseId . "' aria-expanded='false' aria-controls='" . $collapseId . "'>View Details</button>";
                                echo "</div>";
                                echo "</div>";
                                echo "<div id='" . $collapseId . "' class='collapse'>";
                            ?>
                                <!-- Update Order Status Form -->
                                 
                                <div class="card-body">
                                    <?php if ($order['order_status'] != 'Delivered'): ?>
                                    <form action="manager-orders-update-status.php" method="POST">
                                        <div class="form-group">
                                            <label for="order_status">Update Order Status:</label>
                                            <div class="flex">
                                                <select class="form-control" id="order_status" name="order_status">
                                                    <option value="Placed" <?php echo ($order['order_status'] == 'Placed') ? 'selected' : ''; ?>>Placed</option>
                                                    <option value="Approved" <?php echo ($order['order_status'] == 'Approved') ? 'selected' : ''; ?>>Approved</option>
                                                    <option value="Processing" <?php echo ($order['order_status'] == 'Processing') ? 'selected' : ''; ?>>Processing</option>
                                                    <option value="On the Way" <?php echo ($order['order_status'] == 'On the Way') ? 'selected' : ''; ?>>On the Way</option>
                                                    <option value="Delivered" <?php echo ($order['order_status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                                                </select>
                                                <input type="hidden" name="pay_mode" value="<?php echo $order['pay_mode']; ?>">
                                                <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                                <input type="hidden" name="pay_amount" value="<?php echo $order['order_grand_total']; ?>">
                                                
                                                <button type="submit" class="btn btn-primary">Update Status</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php endif; ?>

                                    <!-- Cancel Order Form (only if status is Placed) -->
                                    <?php if ($order['order_status'] == 'Placed'): ?>
                                        <form action="manager-orders-update-status.php" method="POST">
                                            <div class="form-group">
                                                <label for="cancel_reason">Reason for Cancellation:</label>
                                                <div class="flex">
                                                    <input type="text" class="form-control" id="cancel_reason" name="cancel_reason" placeholder="Enter the Reason for Cancellation" required></input>
                                                    <input type="hidden" name="pay_mode" value="<?php echo $order['pay_mode']; ?>">
                                                    <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                                    <input type="hidden" name="order_status" value="Canceled">
                                                    <button type="submit" class="btn btn-danger mt-2">Cancel Order</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php endif; ?>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Customer Details</th>
                                                <th>Delivery Address</th>
                                                <th>Payment Details</th>
                                                <th>Order Summary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>
                                                <?php echo $order['user_fname'] . " " . $order['user_lname']; ?>
                                                <br><b>Contact Number:</b>
                                                <?php echo $order['user_num']; ?>
                                                <br><b>Email Address:</b><br>
                                                <?php echo $order['user_email']; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $address_parts = [];

                                                if (!empty($order['uaddress_street'])) {
                                                    $address_parts[] = $order['uaddress_street'];
                                                }

                                                if (!empty($order['uaddress_brgy'])) {
                                                    $address_parts[] = $order['uaddress_brgy'];
                                                }

                                                if (!empty($order['uaddress_city'])) {
                                                    $address_parts[] = $order['uaddress_city'];
                                                }

                                                echo implode(', ', $address_parts);

                                                if (!empty($order['uaddress_landmark'])) { ?>
                                                    <br><b>Landmark:</b><br>
                                                    <?php echo $order['uaddress_landmark'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <b>Payment Mode:</b>
                                                <?php echo $order['pay_mode']; ?><br>
                                                <b>Payment Status:</b>
                                                <?php echo $order['pay_status']; ?><br>
                                                <b>Amount Paid:</b>
                                                PHP <?php echo number_format($order['pay_amount'], 2); ?><br>
                                                <b>Change:</b>
                                                PHP <?php echo number_format($order['pay_change'], 2); ?><br>
                                                <?php if ($order['pay_mode'] != 'Cash on Delivery'): ?>
                                                    <b>Reference Number:</b><br>
                                                    <?php echo $order['pay_ref_num']; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <b>Sub Total:</b>
                                                PHP <?php echo number_format($order['order_sub_total'], 2); ?><br>
                                                <b>Delivery Fee:</b>
                                                PHP <?php echo number_format($order['order_del_fee'], 2); ?><br>
                                                <b>Grand Total:</b>
                                                PHP <?php echo number_format($order['order_grand_total'], 2); ?><br>
                                            </td>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <?php
                                        $sqlCartItems = "SELECT oi.*
                                                         FROM `order_items` oi
                                                         INNER JOIN `orders` o ON oi.`order_id` = o.`order_id`
                                                         WHERE o.`order_id` = :order_id";
                                        $stmtCartItems = $pdo->prepare($sqlCartItems);
                                        $stmtCartItems->bindParam(':order_id', $order['order_id']);
                                        $stmtCartItems->execute();
                                        $cartItems = $stmtCartItems->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Size</th>
                                                <th>Sugar</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($cartItems as $cartItem): ?>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $productId = $cartItem['prod_id'];
                                                    $sqlProduct = "SELECT * FROM products WHERE prod_id = :prod_id";
                                                    $stmtProduct = $pdo->prepare($sqlProduct);
                                                    $stmtProduct->execute(['prod_id' => $productId]);
                                                    $productRow = $stmtProduct->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                    <td>
                                                        <p><b>Item: </b><?php echo $productRow['prod_category']; ?></p>
                                                        <p><b>Flavor: </b><?php echo $productRow['prod_name']; ?></p>
                                                        <?php
                                                        // Check if the current cart item has any add-ons
                                                        $orderItemId = $cartItem['oitem_id'];
                                                        $sqlAddOnsCount = "SELECT COUNT(*) as addon_count FROM `order_add_ons` WHERE `oitem_id` = :oitem_id";
                                                        $stmtAddOnsCount = $pdo->prepare($sqlAddOnsCount);
                                                        $stmtAddOnsCount->execute(['oitem_id' => $orderItemId]);
                                                        $addOnsCount = $stmtAddOnsCount->fetch(PDO::FETCH_ASSOC)['addon_count'];
                                                        echo "<div>";
                                                        if ($addOnsCount > 0) {
                                                            // Fetch add-ons for the current cart item
                                                            $sqlAddOns = "SELECT `oadd_id`, `prod_id`, `oadd_qty`, `oadd_total` FROM `order_add_ons` WHERE `oitem_id` = :oitem_id";
                                                            $stmtAddOns = $pdo->prepare($sqlAddOns);
                                                            $stmtAddOns->execute(['oitem_id' => $orderItemId]);
                                                            echo "<p><b>Add Ons:</b></p>";
                                                            // Display add-ons
                                                            while ($addOn = $stmtAddOns->fetch(PDO::FETCH_ASSOC)) {
                                                                $addOnProduct = $addOn['prod_id'];
                                                                $sqlAddOnProduct = "SELECT * FROM products WHERE prod_id = :prod_id";
                                                                $stmtAddOnProduct = $pdo->prepare($sqlAddOnProduct);
                                                                $stmtAddOnProduct->execute(['prod_id' => $addOnProduct]);
                                                                $addOnProductRow = $stmtAddOnProduct->fetch(PDO::FETCH_ASSOC);
                                                                echo "<p>{$addOnProductRow['prod_name']} x" . ($addOn['oadd_qty'] / $cartItem['oitem_qty']) . "</p>";
                                                            }
                                                        } else {
                                                            echo "<p>No add-ons</p>";
                                                        }
                                                        echo "</div>";
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <p><b><?php echo $cartItem['oitem_size']; ?></b></p>
                                                    </td>
                                                    <td>
                                                        <p><b><?php echo $cartItem['oitem_sweetness']; ?>%</b></p>
                                                    </td>
                                                    <td>
                                                        <p><b>x<?php echo $cartItem['oitem_qty']; ?></b></p>
                                                    </td>
                                                    <td>
                                                        <p><b>PHP <?php echo number_format($cartItem['oitem_total'], 2); ?></b></p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            <?php
                                echo "</div></div>";
                                endforeach;
                            ?>
                            </div>
                        <?php

                        endforeach;
                        
                        ?>
                        
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->



    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
