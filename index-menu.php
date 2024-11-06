<?php
require ('database/connections/conx-customer.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeaProj. E-Sip - Menu</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/index.css">
    <style>

    
        .delete-btn,
        .btn,
        .btn_view {
            display: inline-block;
            margin-top: 1rem;
            padding: 1.3rem 3rem;
            cursor: pointer;
            border-radius: 10px;
            width: 40%;
            font-size: 1.5rem;
            text-transform: capitalize;
        }

        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            overflow: hidden;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
            width: 250px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            border-radius: 10px;
            max-width: 100%;
            height: auto;
        }

        .card .cat {
            display: block;
            margin: 10px 0;
            font-size: 14px;
            color: #0e3d30;
            text-decoration: none;
        }

        .card .name {
            font-size: 18px;
            color: #0e3d30;
            margin: 10px 0;
        }

        .card .price {
            font-size: 20px;
            color: #0e3d30;
            font-weight: bold;
            margin: 10px 0;
        }


        .card .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .category .box {
            cursor: pointer;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
        }

        .category .box.active {
            background-color: #d1a855;
            color: #add4c4;
        }

        .category .box.active h3 {
            color: white;
        }

        .home {
            background-image: url(assets/images/top-view-tea-with-lemon-copy-space.jpg);
            background-position: center;
            background-size: cover;
            max-width: 100%;
            margin: 2.5%;
            padding: 5rem;
            height: 83%;
            display: flex;
            border-radius: 20px;
        }
        .swiper-flip {
            overflow: auto;
        }
        .home .slide .content h3 {
            font-size: 8rem;
            text-transform: capitalize;
            color: #201b18;
            padding: 1rem 0;
        }
        .home a:hover {
    color: #fff !important;
    text-decoration: underline;
}
    </style>
</head>

<body>

    <?php 
        include "components/index-header.php"; 
        if (isset($_GET['query'])) {
            $searchQuery = $_GET['query'];
        } else {
            $searchQuery = '';
        }

        $sql = "SELECT * FROM users WHERE user_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $sqlProducts = "SELECT * FROM products WHERE prod_category != 'Add-Ons' AND prod_status != 'Archived'";
        if (!empty($searchQuery)) {
            $sqlProducts .= " AND (prod_name LIKE :searchQuery OR prod_category LIKE :searchQuery)";
            $stmtProducts = $pdo->prepare($sqlProducts);
            $stmtProducts->bindValue(':searchQuery', "%$searchQuery%", PDO::PARAM_STR);
        } else {
            $stmtProducts = $pdo->prepare($sqlProducts);
        }
        $stmtProducts->execute();
        $resultProducts = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <section class="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <div class="content">
                        <h3>Fruit Tea</h3>
                        <a href="index-menu.php" class="btn_small">see menu</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <h3>Milk Tea with Pearl</h3>
                        <a href="index-menu.php" class="btn_small">see menu</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <h3>Smoothies Edition</h3>
                        <a href="index-menu.php" class="btn_small">see menu</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <h3>Yakult Edition</h3>
                        <a href="index-menu.php" class="btn_small">see menu</a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="products">
        <h1 class="title" id="menu">Menu</h1>
        <section class="search-form">
            <form id="searchForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <input type="text" name="query" id="searchInput" placeholder="Search" value="<?php echo htmlspecialchars($searchQuery); ?>">
            </form>
        </section>

        <section class="category">
            <div class="box-container five">
                <div class="box" onclick="filterCategory('Fruit Tea')">
                    <h3>Fruit Tea</h3>
                </div>
                <div class="box" onclick="filterCategory('Milk Tea with Pearl')">
                    <h3>Milk Tea with Pearl</h3>
                </div>
                <div class="box" onclick="filterCategory('Smoothies Edition')">
                    <h3>Smoothies Edition</h3>
                </div>
                <div class="box" onclick="filterCategory('Yakult Edition')">
                    <h3>Yakult Edition</h3>
                </div>
                <div class="box" onclick="filterCategory('')" id="viewAll">
                    <h3>View All</h3>
                </div>
            </div>
        </section>

        <div class="box-container four">
            <?php foreach ($resultProducts as $productRow): ?>
                <form method='POST' action='sign-in-page.php'>
                    <div class="box">
                        <div class="box-img">
                            <img src="<?php echo $productRow['prod_img']; ?>" alt="<?php echo $productRow['prod_name']; ?>">
                        </div>
                        <div class="class-details">
                            <a href="sign-in-page.php?query=<?php echo urlencode($productRow['prod_category']); ?>" class="cat"><?php echo $productRow['prod_category']; ?></a>
                            <div class="name"><?php echo $productRow['prod_name']; ?></div>
                            <div class="flex">
                                <div class="price"><span>PHP </span><span><?php echo $productRow['prod_base_price']; ?></span></div>
                                <input type="hidden" name="prod_id" value="<?php echo $productRow['prod_id']; ?>">
                                <button type="submit" name="add_to_cart" class="add-to-cart-btn"><i class="fa-solid fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include "components/footer.php"; ?>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        var swiper = new Swiper(".home-slider", {
            loop: true,
            grabCursor: true,
            effect: "slide",
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        function filterCategory(category) {
            const urlParams = new URLSearchParams(window.location.search);
            if (category) {
                urlParams.set('query', category);
            } else {
                urlParams.delete('query');
            }
            window.location.search = urlParams.toString();

            document.querySelectorAll('.category .box').forEach(box => {
                box.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const query = urlParams.get('query');
            if (query) {
                document.querySelectorAll('.category .box').forEach(box => {
                    if (box.textContent.trim() === query) {
                        box.classList.add('active');
                    }
                });
            } else {
                document.getElementById('viewAll').classList.add('active');
            }
        });
    </script>
</body>

</html>
