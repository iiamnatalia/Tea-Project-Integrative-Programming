<?php
require('database/connections/conx-customer.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$userType = $_SESSION['user_type'];
$userId = $_SESSION['user_id'];


if ($userType == '2') {
    header("Location: staff/staff-dashboard.php");
    exit();
} elseif ($userType == '3') {
    header("Location: staff/manager-dashboard.php");
    exit();
}

try {
    // Establishing connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get user details
    $sql = "SELECT * FROM users WHERE user_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Query to get open orders for the user
    $sqlOrders = "SELECT * FROM orders WHERE user_id = :id AND order_status = 'Open'";
    $stmtOrders = $pdo->prepare($sqlOrders);
    $stmtOrders->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmtOrders->execute();
    $openOrder = $stmtOrders->fetch(PDO::FETCH_ASSOC);

    if ($openOrder) {
        $_SESSION['order_id'] = $openOrder['order_id'];
    }
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    echo "Connection failed. Please try again later.";
}

function getCartCount($pdo, $userId) {
    // Query to get the total quantity of items in the cart for the logged-in user
    $cartCountQuery = "SELECT COUNT(*) AS orderQty 
                       FROM order_items 
                       WHERE order_id IN (SELECT order_id FROM orders WHERE user_id = :userId AND order_status = 'Open')";
    $stmt = $pdo->prepare($cartCountQuery);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['orderQty'] ?? 0;
}
?>

<!-- Include Bootstrap CSS and JS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    /* Your existing styles */
    .searchBox {
        width: 200px; /* Adjust the width as needed */
        height: 25px; /* Adjust the height as needed */
    }

    .header .flex .icons>* {
        font-size: 16px;
        color: white;
        margin-left: 1.5rem;
        cursor: pointer;
        vertical-align: center;
    }

    .header .flex .icons .searchBox {
        width: 220px;
        padding: 1rem;
        margin-top: 0.4rem;
        margin-bottom: 1rem;
        font-size: 1.3rem;
        border: var(--border);
        background-color: white;
        color: var(--coffee-text);
        border-radius: 5px;
    }

    .icons a {
        color: white; /* Change color to your desired color */
        text-decoration: none; /* Remove underline */
        font-size: 15px;
    }

    .icons a:hover {
        color: #856b63; /* Change color to your desired color */
    }

    nav.flex {
        padding: 1.5rem 10%;
    }

.header .flex .navbar a.active {
    color: #ab7b18;
}

    .icons {
        margin-left: 85px;
    }

    .hamburger {
        display: none;
        cursor: pointer;
        font-size: 24px;
        color: white;
    }
    .home .slide .image img {
        width: 300px;
    }

    @media (max-width: 905.94px) {
        .home .slide .content h3 {
            font-size: 5rem;
            text-transform: capitalize;
            color: #201b18;
            padding: 1rem 0;
        }

        .home .slide {
            display: flex;
            flex-wrap: wrap-reverse;
            gap: 1.5rem;
            align-items: center;
            margin-bottom: 4rem;
        }

        .home .slide .content {
            flex: 1 1 100rem;
            text-align: center;
        }

        .navbar {
            display: none;
            flex-direction: column;
            width: 100%;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #333;
            height: 100vh;
        }

        .navbar.show {
            display: flex;
    backdrop-filter: blur(18px) saturate(200%);
    -webkit-backdrop-filter: blur(18px) saturate(200%);
    background-color: rgba(255, 255, 255, 0.75);
    border: 1px solid rgba(209, 213, 219, 0.3);
        }

    .navbar a {
        padding: 1rem;
        text-align: center;
        border-bottom: 1px solid rgb(14 61 48 / 12%);
    }

        .navbar a:last-child {
            border-bottom: none;
        }

        #menu-btn {
            display: block;
        }

        nav.flex {
            padding: 1.5rem 10%;
        }
            #menu-btn {
        color: rgba(14, 61, 48, 1);
    }
    }
    .modal-header {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 1.5rem 2rem;
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: calc(.3rem - 1px);
    border-top-right-radius: calc(.3rem - 1px);
    font-size: 20px;
}
.modal-body {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 2rem;
    font-size: 16px;
}
.modal-footer {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    -ms-flex-align: center;
    /* align-items: center; */
    -ms-flex-pack: end;
    justify-content: center;
    padding: 2rem;
}
.btn {
    padding: .5rem .5rem;
    font-size: 15px;
}

.h5, h5 {
    font-size: 2.5rem;
}

.modal-header .close {
    padding: 1rem 1rem;
    margin: 0;
}

button.close {
    width: 10px;
}

.btn-primary {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn {
    width: 100%;
}

.btn-primary:hover {
  color: #fff;
  background-color: #242424;
  border-color: #242424;
}

</style>

<?php
$currentScript = basename($_SERVER['SCRIPT_NAME']);
?>

<header class="header">
    <nav class="flex">
        <a href="Home.php" class="logo">
            <img src="assets/images/favicon.png" alt="TeaProj. E-Sip">
            TeaProj. E-Sip
        </a>
        <div class="hamburger" id="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
        <nav class="navbar">
            <a class="nav-link <?php echo ($currentScript == 'customer-home.php') ? 'active' : ''; ?>" href="customer-home.php">Home</a>
            <!-- <a class="nav-link <?php echo ($currentScript == 'customer-about.php') ? 'active' : ''; ?>" href="customer-about.php">About</a> -->
            <a class="nav-link <?php echo ($currentScript == 'customer-menu.php') ? 'active' : ''; ?>" href="customer-menu.php">Menu</a>
            <a class="nav-link <?php echo ($currentScript == 'customer-orders.php') ? 'active' : ''; ?>" href="customer-orders.php">Orders</a>
            <a class="nav-link <?php echo ($currentScript == 'customer-cart.php') ? 'active' : ''; ?>" href="customer-cart.php">
                <span>Cart</span>
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count"><?php echo getCartCount($pdo, $userId); ?></span>
            </a>
            <a class="nav-link <?php echo ($currentScript == 'customer-account.php') ? 'active' : ''; ?>" href="customer-account.php">
                Account
            </a>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </nav>
    </nav>
</header>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="sign-out-handler.php" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>

<script>
    function performSearch() {
        var searchQuery = document.getElementById('searchInput').value.trim();
        if (searchQuery) {
            window.location.href = 'customer-menu.php?query=' + encodeURIComponent(searchQuery);
        }
    }
    document.getElementById('menu-btn').addEventListener('click', function() {
        document.querySelector('.navbar').classList.toggle('show');
    });
</script>
