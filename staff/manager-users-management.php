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

$sql = "SELECT * FROM `users` WHERE user_type != 3";
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
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Processes
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Order Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="manager-orders-management.php">Manage Orders</a>
                        <a class="collapse-item" href="manager-orders-declined.php">Declined Orders</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manager-products-management.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Manage Products</span></a>
            </li>
            <li class="nav-item active">
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
                            <h2>Manage Users</h2>
                        </div>
                        <div class="col-md-6 text-right">

                        </div>
                    </div>
                    <!-- Additional Information -->
                    <?php
                    $id = 1;

                    try {
                        $sql = "SELECT * FROM users WHERE user_id = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$id]);
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        die("Error fetching user data: " . $e->getMessage());
                    }

                    try {
                        $sqlDisplayProducts = "SELECT * FROM products";
                        $stmtProducts = $pdo->query($sqlDisplayProducts);
                        $products = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        die("Error fetching products data: " . $e->getMessage());
                    }
                    try {
                        $sqlDisplayProducts = "SELECT * FROM products WHERE prod_status = 'Available'";
                        $stmtProducts = $pdo->query($sqlDisplayProducts);
                        $products = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        die("Error fetching products data: " . $e->getMessage());
                    }
                    ?>

                    <!-- User Management Table -->
                    <section>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
                                        <th>User</th>
                                        <th>Created At</th>
                                        <th>Verified At</th>
                                        <th>Status</th>
                                        <th>State</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        
                                            
                                        
                                        <tr>
                                            
                                            <td><?php echo $user['user_id']; ?></td>
                                            <td>
                                                <?php 
                                                    if ($user['user_pic'] != NULL) { ?>
                                                        <img style="height: 50px; border-radius: 50px" src="../<?php echo $user['user_pic']; ?>"></td>
                                                    <?php }
                                                ?>

                                            <td>
                                              <b><?php echo $user['user_fname'] . " " . $user['user_lname']; ?></b><br>
                                              <?php echo $user['user_email']; ?>
                                            </td>
                                            <td><?php echo $user['user_created_at']; ?></td>
                                            <td><?php echo $user['user_verified_at']; ?></td>
                                            <td>
                                                <?php
                                                if ($user['user_status'] == 'Verified') {
                                                    echo '<span class="verified-status">Verified</span>';
                                                } else {
                                                    echo '<span class="registered-status">Registered</span>';
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                if ($user['user_state'] == 'Enabled') {
                                                    echo '<span class="enabled-state">Enabled</span>';
                                                } else {
                                                    echo '<span class="disabled-state">Disabled</span>';
                                                }
                                                ?>
                                            </td>

                                            <td><?php echo $user['user_updated_at']; ?></td>
                                            <td>
                                                <form id="userStatusForm-<?php echo $user['user_id']; ?>" action="manager-users-update-status.php" method="post">
                                                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                                    <input type="hidden" name="update_state" value="<?php echo $user['user_state'] != 'Disabled' ? 'disable' : 'enable'; ?>">
                                                    <button type="button" class="btn btn-<?php echo $user['user_state'] != 'Disabled' ? 'danger' : 'success'; ?>" data-toggle="modal" data-target="#updateUserStatusModal-<?php echo $user['user_id']; ?>" data-user-id="<?php echo $user['user_id']; ?>" data-user-status="<?php echo $user['user_state']; ?>">
                                                        <?php echo $user['user_state'] != 'Disabled' ? 'Disable' : 'Enable'; ?>
                                                    </button>
                                                </form>

                                                <!-- Modal -->
                                                <div class="modal fade" id="updateUserStatusModal-<?php echo $user['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateUserStatusModalLabel-<?php echo $user['user_id']; ?>" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="updateUserStatusModalLabel-<?php echo $user['user_id']; ?>">Update User Status</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to update the state of this user?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary" id="modal-confirm-button-<?php echo $user['user_id']; ?>">Confirm</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $('#updateUserStatusModal-<?php echo $user['user_id']; ?>').on('show.bs.modal', function (event) {
                                                        var button = $(event.relatedTarget); // Button that triggered the modal
                                                        var userStatus = button.data('user-status'); // Extract info from data-* attributes
                                                        var modal = $(this);

                                                        modal.find('#modal-action-text-<?php echo $user['user_id']; ?>').text(userStatus !== 'Disabled' ? 'disable' : 'enable');
                                                    });

                                                    $('#modal-confirm-button-<?php echo $user['user_id']; ?>').on('click', function () {
                                                        $('#userStatusForm-<?php echo $user['user_id']; ?>').submit();
                                                    });
                                                </script>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>



                    <script>
                        var formToSubmit;
                        $('#updateUserStatusModal').on('show.bs.modal', function (event) {
                            var button = $(event.relatedTarget); // Button that triggered the modal
                            var userStatus = button.data('user-status'); // Extract info from data-* attributes
                            var modal = $(this);
                            formToSubmit = button.closest('form');

                            modal.find('#modal-action-text').text(userStatus !== 'Disabled' ? 'disable' : 'enable');
                        });

                        $('#modal-confirm-button').on('click', function () {
                            formToSubmit.submit();
                        });
                    </script>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="js/script.js"></script>
                </div>
            </div>
        </div>
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
