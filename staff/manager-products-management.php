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
        th, td {
            text-align: center;
        }
        i.fa-solid.fa-pen-to-square {
            color: #008052;
        }
        i.fa-solid.fa-box-archive {
            color: #e74a3b;
        }
        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 500px;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: .3rem;
            outline: 0;
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

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
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

            <li class="nav-item active">
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
                            <h2>Manage Products</h2>
                            
                        </div>
                        <div class="col-md-6 text-right">
                            
                            <button class="btn btn-primary" onclick="toggleNewProductForm()"><strong>Add a Product <i class="fa-solid fa-square-plus"></i></strong></button>
                            <button class="btn btn-secondary" onclick="toggleArchiveModal()">View Archived Products</button>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"  style="max-width: 100%; flex: 0 0 100%">
                            <!-- Search and Filter Form -->
                            <form method="GET" class="" id="search-form">
                                <div class="">
                                    <!-- <div class="" style="margin-bottom: 10px">
                                        <input type="text" name="search_name" class="form-control" placeholder="Search by product name" value="<?php echo isset($_GET['search_name']) ? htmlspecialchars($_GET['search_name']) : ''; ?>">
                                    </div> -->
                                    <div class=""  style="display: flex;gap: 5px; margin-bottom: 10px">
                                        <select name="filter_category" class="form-control">
                                            <option value="">Filter by category</option>
                                            <option value="Add-Ons" <?php echo isset($_GET['filter_category']) && $_GET['filter_category'] == 'Add-Ons' ? 'selected' : ''; ?>>Add-Ons</option>
                                            <option value="Fruit Tea" <?php echo isset($_GET['filter_category']) && $_GET['filter_category'] == 'Fruit Tea' ? 'selected' : ''; ?>>Fruit Tea</option>
                                            <option value="Milk tea With Pearl" <?php echo isset($_GET['filter_category']) && $_GET['filter_category'] == 'Milk tea With Pearl' ? 'selected' : ''; ?>>Milk tea With Pearl</option>
                                            <option value="Yakult Edition" <?php echo isset($_GET['filter_category']) && $_GET['filter_category'] == 'Yakult Edition' ? 'selected' : ''; ?>>Yakult Edition</option>
                                            <option value="Smoothies Edition" <?php echo isset($_GET['filter_category']) && $_GET['filter_category'] == 'Smoothies Edition' ? 'selected' : ''; ?>>Smoothies Edition</option>
                                        </select>
                                        <div class="" style="display: flex; gap: 5px">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                            <button type="button" class="btn btn-secondary" onclick="clearFilters()">Clear Filter</button>

                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
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
    <script>
        function clearFilters() {
            console.log('Clear filters button clicked'); // For debugging
            document.getElementsByName('filter_category')[0].value = '';
            document.getElementById('search-form').submit();
        }
    </script>

                    <section class="">
                        <div class="box-container">

                            <div id="newProductForm" style="<?php echo isset($_GET['edit_name']) ? 'display: block;' : 'display: none;'; ?>">

                                <?php
                                $editId = isset($_GET['edit_id']) ? $_GET['edit_id'] : '';
                                $editName = isset($_GET['edit_name']) ? $_GET['edit_name'] : '';
                                $editCategory = isset($_GET['edit_category']) ? $_GET['edit_category'] : '';
                                $editPrice = isset($_GET['edit_price']) ? $_GET['edit_price'] : '';
                                ?>

                                <form action="manager-products-add-update.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="process_type" value="Add">
                                    <input type="hidden" name="productId" value="<?php echo $editId; ?>">
                                    <input type="text" class="form-control mb-2" name="addProdName" placeholder="Product Name" value="<?php echo $editName; ?>">
                                    <select class="form-control mb-2" name="addProdCategory" onchange="checkCategory(this)">
                                        <option value="">Select Category</option>
                                        <option value="Add-Ons" <?php echo $editCategory == 'Add-Ons' ? 'selected' : ''; ?>>Add-Ons</option>
                                        <option value="Fruit Tea" <?php echo $editCategory == 'Fruit Tea' ? 'selected' : ''; ?>>Fruit Tea</option>
                                        <option value="Milk tea With Pearl" <?php echo $editCategory == 'Milk tea With Pearl' ? 'selected' : ''; ?>>Milk tea With Pearl</option>
                                        <option value="Yakult Edition" <?php echo $editCategory == 'Yakult Edition' ? 'selected' : ''; ?>>Yakult Edition</option>
                                        <option value="Smoothies Edition" <?php echo $editCategory == 'Smoothies Edition' ? 'selected' : ''; ?>>Smoothies Edition</option>
                                    </select>
                                    <input type="number" class="form-control mb-2" name="addProdPrice" placeholder="Product Price" value="<?php echo $editPrice; ?>" id="prodPrice">
                                    <input type="file" class="form-control mb-2" name="addProdImage" <?php echo $editId ? 'disabled' : ''; ?>>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>

                            <div id="editProductForm" style="display: none;">
                                <form action="manager-products-add-update.php" method="POST" enctype="multipart/form-data" onsubmit="enableSelectAndSubmit(this); return false;">
                                    <input type="hidden" name="process_type" value="Update">
                                    <input type="hidden" name="productId" id="editProdId">
                                    <input type="text" class="form-control mb-2" name="editProdName" id="editProdName" placeholder="Product Name">
                                    <select class="form-control mb-2 no-select" name="editProdCategory" id="editProdCategory" disabled>
                                        <option value="">Select Category</option>
                                        <option value="Add-Ons">Add-Ons</option>
                                        <option value="Fruit Tea">Fruit Tea</option>
                                        <option value="Milk tea With Pearl">Milk tea With Pearl</option>
                                        <option value="Yakult Edition">Yakult Edition</option>
                                        <option value="Smoothies Edition">Smoothies Edition</option>
                                    </select>
                                    <input type="number" class="form-control mb-2" name="editProdPrice" id="editProdPrice" placeholder="Product Price">
                                    <input type="file" class="form-control mb-2" name="editProdImage">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </form>
                            </div>
                                                <!-- Additional Information -->
                    <?php
                    // Number of products per page
                    $productsPerPage = 10;

                    // Get the current page number from the URL, if not present default to 1
                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                    // Calculate the offset for the SQL query
                    $offset = ($currentPage - 1) * $productsPerPage;

                    // Get search and filter inputs
                    $searchName = isset($_GET['search_name']) ? $_GET['search_name'] : '';
                    $filterCategory = isset($_GET['filter_category']) ? $_GET['filter_category'] : '';

                    try {
                        // Base SQL query
                        $sqlBase = "SELECT * FROM products WHERE prod_status = 'Available'";
                        $sqlTotalBase = "SELECT COUNT(*) FROM products WHERE prod_status = 'Available'";

                        // Append search and filter criteria to the SQL query
                        if ($searchName) {
                            $sqlBase .= " AND prod_name LIKE :searchName";
                            $sqlTotalBase .= " AND prod_name LIKE :searchName";
                        }
                        if ($filterCategory) {
                            $sqlBase .= " AND prod_category = :filterCategory";
                            $sqlTotalBase .= " AND prod_category = :filterCategory";
                        }

                        // Prepare and execute the total products query
                        $stmtTotal = $pdo->prepare($sqlTotalBase);
                        if ($searchName) {
                            $stmtTotal->bindValue(':searchName', "%$searchName%");
                        }
                        if ($filterCategory) {
                            $stmtTotal->bindValue(':filterCategory', $filterCategory);
                        }
                        $stmtTotal->execute();
                        $totalProducts = $stmtTotal->fetchColumn();

                        // Calculate the total number of pages
                        $totalPages = ceil($totalProducts / $productsPerPage);

                        // Prepare and execute the products query with LIMIT and OFFSET
                        $sqlDisplayProducts = $sqlBase . " LIMIT :limit OFFSET :offset";
                        $stmtProducts = $pdo->prepare($sqlDisplayProducts);
                        if ($searchName) {
                            $stmtProducts->bindValue(':searchName', "%$searchName%");
                        }
                        if ($filterCategory) {
                            $stmtProducts->bindValue(':filterCategory', $filterCategory);
                        }
                        $stmtProducts->bindValue(':limit', $productsPerPage, PDO::PARAM_INT);
                        $stmtProducts->bindValue(':offset', $offset, PDO::PARAM_INT);
                        $stmtProducts->execute();
                        $products = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        die("Error fetching products data: " . $e->getMessage());
                    }
                    ?>

                            <script>
                                function enableSelectAndSubmit(form) {
                                    var selectElement = document.getElementById("editProdCategory");
                                    selectElement.disabled = false; // Enable the select element
                                    form.submit(); // Submit the form
                                    selectElement.disabled = true; // Disable it again
                                }
                            </script>


                            <div class="box">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Product Category</th>
                                                <th>Product Price</th>
                                                <th>Product Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                // For Available Products
                                                foreach ($products as $product) {
                                                    echo "<tr id='product-" . $product['prod_id'] . "'>";
                                                    echo "<td>" . htmlspecialchars($product['prod_id']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($product['prod_name']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($product['prod_category']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($product['prod_base_price']) . "</td>";
                                                    echo "<td><img src='../" . htmlspecialchars($product['prod_img']) . "' style='height: 22px;'></td>";
                                                    echo '<td>
                                                            <a href="#" class="edit-product" data-prod-id="' . htmlspecialchars($product['prod_id']) . '" data-prod-name="' . htmlspecialchars($product['prod_name']) . '" data-prod-category="' . htmlspecialchars($product['prod_category']) . '" data-prod-price="' . htmlspecialchars($product['prod_base_price']) . '"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="#" onclick="showArchiveModal(' . htmlspecialchars($product['prod_id']) . ')"><i class="fa-solid fa-box-archive"></i></a>
                                                        </td>';
                                                    echo "</tr>";
                                                }

                                            ?>
                                        </tbody>
                                    </table>
                                            <!-- Pagination Links -->
                                    <nav>
                                        <ul class="pagination justify-content-center">
                                            <?php if ($currentPage > 1): ?>
                                                <li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage - 1; ?>&search_name=<?php echo urlencode($searchName); ?>&filter_category=<?php echo urlencode($filterCategory); ?>">Previous</a></li>
                                            <?php endif; ?>

                                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                                <li class="page-item <?php echo $i == $currentPage ? 'active' : ''; ?>">
                                                    <a class="page-link" href="?page=<?php echo $i; ?>&search_name=<?php echo urlencode($searchName); ?>&filter_category=<?php echo urlencode($filterCategory); ?>"><?php echo $i; ?></a>
                                                </li>
                                            <?php endfor; ?>

                                            <?php if ($currentPage < $totalPages): ?>
                                                <li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage + 1; ?>&search_name=<?php echo urlencode($searchName); ?>&filter_category=<?php echo urlencode($filterCategory); ?>">Next</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <?php if (isset($_SESSION['error_message'])): ?>
                                <div class="snack-bar-container">
                                    <div id="snackbar" class="snack-bar show"><?php echo $_SESSION['error_message']; ?></div>
                                </div>
                                <?php unset($_SESSION['error_message']); ?>
                            <?php endif; ?>

                            <script>
                                // Automatically hide the snackbar after it fades out
                                setTimeout(function() {
                                    var x = document.getElementById("snackbar");
                                    x.className = x.className.replace("show", "");
                                }, 3000);
                            </script>
                            <div id="editProductModal" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <h2>Edit Product</h2>
                                    <form id="editProductForm">
                                        <input type="hidden" id="prod_id" name="prod_id">
                                        <label for="prod_name">Product Name:</label>
                                        <input type="text" id="prod_name" name="prod_name">
                                        <label for="prod_category">Product Category:</label>
                                        <select id="prod_category" name="prod_category" onchange="checkCategory(this)">
                                            <option value="">Select Category</option>
                                            <option value="Add-Ons">Add-Ons</option>
                                            <option value="Fruit Tea">Fruit Tea</option>
                                            <option value="Milk tea With Pearl">Milk tea With Pearl</option>
                                            <option value="Yakult Edition">Yakult Edition</option>
                                            <option value="Smoothies Edition">Smoothies Edition</option>
                                        </select>
                                        <label for="prod_base_price">Base Price:</label>
                                        <input type="text" id="prod_base_price" name="prod_base_price">
                                        <!-- Add more input fields for other product details -->
                                        <button type="submit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                            <div id="archiveModal" class="modal" style="display:none;">
                                <div class="modal-content">
                                    <span class="close" onclick="closeArchiveModal()">&times;</span>
                                    <h2>Archive Product</h2>
                                    <p>Are you sure you want to archive this product?</p>
                                    <button class="btn btn-danger" onclick="archiveConfirmed()">Yes, Archive</button>
                                    <button class="btn btn-secondary" onclick="closeArchiveModal()">Cancel</button>
                                </div>
                            </div>
                            <div id="unarchiveModal" class="modal" style="display:none;">
                                <div class="modal-content">
                                    <span class="close" onclick="closeUnarchiveModal()">&times;</span>
                                    <h2>Unarchive Product</h2>
                                    <p>Are you sure you want to unarchive this product?</p>
                                    <button class="btn btn-primary" onclick="unarchiveConfirmed()">Yes, Unarchive</button>
                                    <button class="btn btn-secondary" onclick="closeUnarchiveModal()">Cancel</button>
                                </div>
                            </div>

                            <div id="archiveConfirmationModal" class="modal" style="display:none;">
                                <div class="modal-content">
                                    <span class="close" onclick="closeArchiveConfirmationModal()">&times;</span>
                                    <h2>Archive Product</h2>
                                    <p>Are you sure you want to archive this product?</p>
                                    <button class="btn btn-danger" onclick="archiveConfirmed()">Yes, Archive</button>
                                    <button class="btn btn-secondary" onclick="closeArchiveConfirmationModal()">Cancel</button>
                                </div>
                            </div>

                            <!-- Archive Success Modal -->
                            <div id="archiveSuccessModal" class="modal" style="display:none;">
                                <div class="modal-content">
                                    <span class="close" onclick="closeArchiveSuccessModal()">&times;</span>
                                    <h2>Archive Successful</h2>
                                    <p>The product has been successfully archived.</p>
                                    <button class="btn btn-primary" onclick="closeArchiveSuccessModal()">Close</button>
                                </div>
                            </div>


                            <!-- Modal -->
                            <div id="archiveProductsModal" class="modal" style="display:none;">
                                <div class="modal-content">
                                    <span class="close" onclick="toggleArchiveModal()">&times;</span>
                                    <h2>Archived Products</h2>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Product Category</th>
                                                <th>Product Price</th>
                                                <th>Product Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="archivedProductsTable">
                                            <!-- Archived products will be dynamically inserted here -->
                                        </tbody>
                                    </table>
    
                                </div>
                            </div>


                            <!-- Styles for modal -->

                        </div>
                    </section>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="js/script.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('.edit-product').click(function() {
                                var prodId = $(this).data('prod-id');
                                var prodName = $(this).data('prod-name');
                                var prodCategory = $(this).data('prod-category');
                                var prodPrice = $(this).data('prod-price');

                                $('#editProdId').val(prodId);
                                $('#editProdName').val(prodName);
                                $('#editProdCategory').val(prodCategory);
                                $('#editProdPrice').val(prodPrice);

                                $('#newProductForm').hide(); // Hide the new product form
                                $('#editProductForm').show(); // Show the edit product form
                            });
                        });

                        function toggleNewProductForm() {
                            var newProductForm = document.getElementById('newProductForm');
                            var editProductForm = document.getElementById('editProductForm');
                            if (newProductForm.style.display === 'none' || newProductForm.style.display === '') {
                                newProductForm.style.display = 'block';
                                editProductForm.style.display = 'none'; // Hide the edit product form
                            } else {
                                newProductForm.style.display = 'none';
                            }
                        }


                        function checkCategory(input) {
                            var priceField = document.getElementById('prodPrice');
                            if (input.value === '') {

                            }
                            if (input.value === 'Add-Ons') {
                                priceField.readOnly = true;
                                priceField.value = '20';
                            } else {
                                priceField.readOnly = false;
                            }
                        }

                        function showArchiveModal(productId) {
                            var modal = document.getElementById('archiveModal');
                            modal.style.display = 'block';
                            modal.setAttribute('data-product-id', productId);
                        }

                        function closeArchiveModal() {
                            var modal = document.getElementById('archiveModal');
                            modal.style.display = 'none';
                        }

                        function archiveConfirmed() {
                            var modal = document.getElementById('archiveModal');
                            var productId = modal.getAttribute('data-product-id');
                            console.log("Archiving product ID: " + productId); 
                            archiveProduct(productId);
                            closeArchiveModal();
                        }

                        function showUnarchiveModal(productId) {
                            var modal = document.getElementById('unarchiveModal');
                            modal.style.display = 'block';
                            modal.setAttribute('data-product-id', productId);
                        }

                        function closeUnarchiveModal() {
                            var modal = document.getElementById('unarchiveModal');
                            modal.style.display = 'none';
                        }

                        function unarchiveConfirmed() {
                            var modal = document.getElementById('unarchiveModal');
                            var productId = modal.getAttribute('data-product-id');
                            unarchiveProduct(productId);
                            closeUnarchiveModal();
                        }

                        function archiveProduct(productId) {
                            $.ajax({
                                url: 'manager-products-archive-process.php',
                                type: 'POST',
                                data: {
                                    pid: productId
                                },
                                success: function(response) {
                                    var result = JSON.parse(response);
                                    if (result.success) {
                                        $('#product-' + productId).remove(); 
                                        loadArchivedProducts();
                                        showArchiveSuccessModal();
                                    } else {
                                        alert("There was an error archiving the product.");
                                    }
                                },
                                error: function() {
                                    alert("There was an error archiving the product.");
                                }
                            });
                        }

                        function showArchiveSuccessModal() {
                            var modal = document.getElementById('archiveSuccessModal');
                            modal.style.display = 'block';
                        }

                        function closeArchiveSuccessModal() {
                            var modal = document.getElementById('archiveSuccessModal');
                            modal.style.display = 'none';
                        }

                        function unarchiveProduct(productId) {
                            $.ajax({
                                url: 'manager-products-unarchive-process.php',
                                type: 'POST',
                                data: {
                                    pid: productId
                                },
                                success: function(response) {
                                    alert("The product has been successfully unarchived.");
                                    loadArchivedProducts();
                                    location.reload();
                                },
                                error: function() {
                                    alert("There was an error unarchiving the product.");
                                }
                            });
                        }

                        function toggleArchiveModal() {
                            var modal = document.getElementById("archiveProductsModal");
                            if (modal.style.display === "none") {
                                loadArchivedProducts();
                                modal.style.display = "block";
                            } else {
                                modal.style.display = "none";
                            }
                        }

                        function loadArchivedProducts() {
                            $.ajax({
                                url: 'manager-products-fetch-archived.php',
                                type: 'GET',
                                success: function(response) {
                                    $('#archivedProductsTable').html(response);
                                },
                                error: function() {
                                    alert("There was an error fetching archived products.");
                                }
                            });
                        }

                    </script>
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
