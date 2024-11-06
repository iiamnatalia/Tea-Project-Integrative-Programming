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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="staff-dashboard.php">
                Te<img src="../assets/images/IMG_1296.png">Proj. E-Sip
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../staff-dashboard.php">
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
                        <a class="collapse-item" href="staff-report-best-sellers.php">Best Sellers</a>
                        <a class="collapse-item" href="staff-report-revenue-report.php">Revenue Report</a>
                        <a class="collapse-item" href="staff-report-geographical-sales.php">Geographical Sales Report</a>
                        <a class="collapse-item" href="staff-report-audit-trail.php">Audit Trail</a>
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
                        <a class="collapse-item" href="staff-orders-management.php">Manage Orders</a>
                        <a class="collapse-item" href="staff-orders-declined.php">Declined Orders</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="staff-products-management.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Manage Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="staff-users-management.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Manage Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="staff-backup-database.php">
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
                                <a class="dropdown-item" href="staff-account.php">
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
                            <h2>Dashboard</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <select id="yearSelect" class="form-control">
                                <?php
                                $currentYear = date('Y');
                                for ($i = 2018; $i <= 2040; $i++) {
                                    if ($i == $currentYear) {
                                        echo "<option value='$i' selected>$i</option>";
                                    } else {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Bookings this Month</h5>
                                    <p class="card-text" id="bookingsThisMonth"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Bookings this Year</h5>
                                    <p class="card-text" id="bookingsThisYear"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Non-refundable Deposits</h5>
                                    <p class="card-text" id="deposits"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart -->
                    <canvas id="bookingsChart" width="500" height="160"></canvas>
                </div>

                <script>
                    $(document).ready(function() {
                        Chart.defaults.global.defaultFontFamily = 'Poppins';

                        function fetchData(year) {
                            $.ajax({
                                url: 'staff-fetch-data.php',
                                type: 'GET',
                                data: { year: year },
                                dataType: 'json',
                                success: function(data) {
                                    console.log("Data received: ", data); // Debugging: Log received data
                                    var months = [];
                                    var bookings = [];
                                    var cancelledBookings = [];
                                    var doneBookings = []; // New array for done bookings data
                                    var reservedBookings = [];
                                    var totalBookingsThisMonth = 0;
                                    var totalBookingsThisYear = 0;
                                    var totalCancelledThisMonth = 0;
                                    var totalCancelledThisYear = 0;
                                    var totalDoneThisMonth = 0; // Initialize total count of done bookings for the current month
                                    var totalDoneThisYear = 0; // Initialize total count of done bookings for the current year
                                    var totalReservedThisMonth = 0;
                                    var totalReservedThisYear = 0;
                                    var totalAmountThisMonth = 0;
                                    var totalAmountThisYear = 0;
                                    for (var i = 1; i <= 12; i++) {
                                        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                                            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                        months.push(monthNames[i - 1]); // Subtract 1 from i to match array index
                                        var monthData = data.find(d => d.month == i);
                                        var bookingsCount = monthData ? monthData.bookings : 0;
                                        var cancelledCount = monthData ? monthData.cancelled : 0;
                                        var doneCount = monthData ? monthData.done : 0; // Get count of done bookings
                                        var amountThisMonth = monthData ? monthData.total_amount : 0;
                                        var reservedCount = monthData ? monthData.reserved : 0;
                                        bookings.push(bookingsCount);
                                        cancelledBookings.push(cancelledCount);
                                        doneBookings.push(doneCount); // Push count of done bookings to array
                                        reservedBookings.push(reservedCount); // Push count of done bookings to array
                                        totalBookingsThisYear += bookingsCount;
                                        totalCancelledThisYear += cancelledCount;
                                        totalReservedThisYear += reservedCount;
                                        totalDoneThisYear += doneCount; // Accumulate total count of done bookings for the year
                                        totalAmountThisYear += amountThisMonth;
                                        if (new Date().getMonth() + 1 === i) {
                                            totalBookingsThisMonth += bookingsCount;
                                            totalCancelledThisMonth += cancelledCount;
                                            totalDoneThisMonth += doneCount; // Accumulate total count of done bookings for the month
                                            totalAmountThisMonth += amountThisMonth;
                                            totalReservedThisMonth += reservedCount;
                                        }
                                    }

                                    renderChart(months, reservedBookings, cancelledBookings, doneBookings); // Pass done bookings data to renderChart function
                                    // Update additional information
                                    $('#bookingsThisMonth').text(totalBookingsThisMonth + " Bookings");
                                    $('#cancelledThisMonth').text(totalCancelledThisMonth + " Cancelled");
                                    $('#doneThisMonth').text(totalDoneThisMonth + " Done"); // Update total done bookings for the current month
                                    $('#bookingsThisYear').text(totalBookingsThisYear + " Bookings");
                                    $('#cancelledThisYear').text(totalCancelledThisYear + " Cancelled");
                                    $('#doneThisYear').text(totalDoneThisYear + " Done"); // Update total done bookings for the year
                                    $('#deposits').text("PHP " + totalAmountThisYear.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                                    $('#totalRevenueThisMonth').text("PHP " + totalAmountThisMonth.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

                                },
                                error: function(xhr, status, error) {
                                    console.error("AJAX Error: ", status, error); // Debugging: Log any AJAX errors
                                }
                            });
                        }

                        function fetchUserData() {
                            $.ajax({
                                url: 'staff-fetch-users-data.php',
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    $('#registeredUsers').text(data.registered);
                                    $('#verifiedUsers').text(data.verified);
                                },
                                error: function(error) {
                                    console.error('Error fetching user data:', error);
                                }
                            });
                        }
                        
                        // Call the function to fetch data on page load
                        fetchUserData();

                        function renderChart(months, reservedBookings, cancelledBookings, doneBookings) {
                            var ctx = document.getElementById('bookingsChart').getContext('2d');
                            if (window.myChart) {
                                window.myChart.destroy();
                            }
                            window.myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: months,
                                    datasets: [{
                                        label: 'Reserved Bookings',
                                        data: reservedBookings,
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 2
                                    }, {
                                        label: 'Done Bookings', // Add label for done bookings
                                        data: doneBookings,
                                        backgroundColor: 'rgba(0, 229, 5, 0.2)',
                                        borderColor: 'rgba(0, 229, 5, 1)',
                                        borderWidth: 2
                                    }, {
                                        label: 'Cancelled Bookings',
                                        data: cancelledBookings,
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true,
                                                callback: function(value) {
                                                    if (Number.isInteger(value)) {
                                                        return value;
                                                    }
                                                },
                                                fontSize: 14
                                            }
                                        }],
                                        xAxes: [{
                                            ticks: {
                                                fontSize: 15
                                            }
                                        }]
                                    }
                                }
                            });
                        }

                        $('#yearSelect').change(function() {
                            var selectedYear = $(this).val();
                            fetchData(selectedYear);
                        });

                        fetchData($('#yearSelect').val());
                    });
                </script>

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Users</h2>
                        </div>
                    </div>
                    <?php 
                        // SQL query
                        $sqlUsers = "SELECT 
                                        (SELECT COUNT(*) FROM users WHERE user_status = 'Registered') AS total_registered_users,
                                        (SELECT COUNT(*) FROM users WHERE user_status = 'Verified') AS total_verified_users,
                                        (SELECT COUNT(*) FROM users WHERE user_status = 'Disabled') AS total_disabled_users,
                                        (SELECT COUNT(*) FROM users) AS total_users";

                        // Prepare and execute the query
                        $stmt = $pdo->query($sqlUsers);

                        // Fetch the result
                        $result = $stmt->fetch();

                        // Store results in variables
                        $totalRegisteredUsers = $result['total_registered_users'];
                        $totalVerifiedUsers = $result['total_verified_users'];
                        $totalDisabledUsers = $result['total_disabled_users'];
                        $totalUsers = $result['total_users'];
                    ?>

                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">All Users</h5>
                                    <p class="card-text" id="registeredUsers"><?php echo htmlspecialchars($totalRegisteredUsers); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Verified Users</h5>
                                    <p class="card-text" id="verifiedUsers"><?php echo htmlspecialchars($totalVerifiedUsers); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Disabled Users</h5>
                                    <p class="card-text" id="disabledUsers"><?php echo htmlspecialchars($totalDisabledUsers); ?></p>
                                </div>
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
