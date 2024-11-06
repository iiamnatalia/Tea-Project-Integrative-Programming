<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeaProj. E-Sip - Menu</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">

</head>

<body>

    <?php 
      include "components/header.php"; 
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

      $sqlProducts = "SELECT * FROM products WHERE prod_category != 'Add-Ons'";
      if (!empty($searchQuery)) {
          $sqlProducts .= " AND (prod_name LIKE :searchQuery OR prod_category LIKE :searchQuery)";
          $stmtProducts = $pdo->prepare($sqlProducts);
          $stmtProducts->bindValue(':searchQuery', "%$searchQuery%", PDO::PARAM_STR);
      } else {
          $stmtProducts = $pdo->prepare($sqlProducts);
      }
      $stmtProducts->execute();
      $resultProducts = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);

      $categories = array_unique(array_column($resultProducts, 'prod_category'));
    ?>



    <section class="search-form">
        <form id="searchForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
            <input type="text" name="query" id="searchInput" placeholder="Search"
                   value="<?php echo htmlspecialchars($searchQuery); ?>">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </section>

    <section class="products">
        <h1 class="title">Menu</h1>
        <?php foreach ($categories as $category): ?>
            <div id="<?php echo $category; ?>" class="tabcontent">
                <?php foreach ($resultProducts as $productRow): ?>
                    <?php if ($productRow['prod_category'] == $category): ?>
                        <form method='POST' action='customer-add-to-cart-form.php'>
                            <div class="box card">
                                <img src="<?php echo $productRow['prod_img']; ?>" alt="">
                                <a href="customer-menu.php?query=<?php echo urlencode($productRow['prod_category']); ?>"
                                   class="cat"><?php echo $productRow['prod_category']; ?></a>
                                <div class="name"><?php echo $productRow['prod_name']; ?></div>
                                <div class="flex">
                                    <div class="price"><span>PHP </span><?php echo $productRow['prod_base_price']; ?><span>
                                    </div>
                                    <input type="hidden" name="prod_id" value="<?php echo $productRow['prod_id']; ?>">
                                    <button type="submit" name="add_to_cart" class="add-to-cart-btn" style="font-size: 13px;">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </section>

    <?php include "Components/footer.php"; ?>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        var swiper = new Swiper(".home-slider", {
            loop: true,
            grabCursor: true,
            effect: "flip",
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        function openCategory(evt, categoryName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(categoryName).classList.add("active");
            evt.currentTarget.className += " active";
        }

        // Set the default active tab
        document.getElementsByClassName("tablinks")[0].click();
    </script>
</body>

</html>
