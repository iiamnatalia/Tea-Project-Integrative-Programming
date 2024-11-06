
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TeaProj. E-Sip</title>
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/index.css">
  
  <style>
    .swiper-container {
      width: 1000px;
      height: 100%;
    }

    .swiper-slide {
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform 0.3s ease;
    }


    .box {
        position: relative;
        width: 480px;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .sold-circle {
      position: absolute;
      top: 10px;
      left: 10px;
      width: 50px;
      height: 50px;
      background-color: #f0c14b;
      color: #111;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .rank-circle {
      position: absolute;
      top: 10px;
      right: 10px;
      width: 30px;
      height: 30px;
      background-color: #ff4b4b;
      color: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .class-details {
      margin-top: 15px;
    }

    .class-details .cat {
      font-size: 14px;
      color: #888;
      text-decoration: none;
    }

    .class-details .name {
      font-size: 18px;
      font-weight: bold;
      margin: 10px 0;
    }

    .flex {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .price {
      font-size: 16px;
      color: #333;
    }

    .add-to-cart-btn {
      background: none;
      border: none;
      color: #333;
      font-size: 18px;
      cursor: pointer;
    }

    .products img {
      width: 100%;
    }

    .class-details .name {
        font-size: 25px;
        font-weight: bold;
        margin: 5px 0;
    }
</style>
</head>
<body>

<?php 
  include('components/header.php'); 

  // Query to get best-selling products with date filter
  $sqlBestSellers = "
      SELECT 
          p.prod_id, 
          p.prod_name, 
          p.prod_category, 
          p.prod_base_price, 
          p.prod_img, 
          SUM(oi.oitem_qty) AS total_sold
      FROM 
          order_items oi
      INNER JOIN 
          orders o ON oi.order_id = o.order_id
      INNER JOIN 
          products p ON oi.prod_id = p.prod_id
      WHERE 
          o.order_status != 'Placed' AND o.order_status != 'Canceled' 
      GROUP BY 
          p.prod_id, p.prod_name, p.prod_category, p.prod_base_price, p.prod_img
      ORDER BY 
          total_sold DESC
        LIMIT 5
  ";

  $stmtBestSellers = $pdo->prepare($sqlBestSellers);
  $stmtBestSellers->execute();
  $bestSellers = $stmtBestSellers->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="home">
  <div class="landing-message">
    <h2>Sip, Savor, and Delight in the Art of Tea</h2>
    <!-- <p>TeaProj. E-Sip offers a perfect blend for every cup, transforming each sip into a delightful journey and lets you discover the rich and diverse world of tea.</p> -->
    <div class="btn-div">
      <a href="customer-menu.php" class="btn_small">Order Now</a>
    </div>
  </div>
</section>

<section class="products">
  <h1 class="title">Best Sellers</h1>
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <?php
        $rank = 1;
        foreach ($bestSellers as $productRow) {
      ?>
        <div class="swiper-slide">
          <div class="box">
            <div class="sold-circle"><?php echo $productRow['total_sold']; ?> Sold</div>
            <div class="rank-circle"><?php echo $rank; ?></div>
            <div class="product-image">
            <img src="<?php echo $productRow['prod_img']; ?>" alt="">
            </div>

            <div class="class-details">
            <form method='POST' action='customer-add-to-cart-form.php'>
              <a href="customer-menu.php?query=<?php echo urlencode($productRow['prod_category']); ?>" class="cat"><?php echo $productRow['prod_category']; ?></a>
              <div class="name"><?php echo $productRow['prod_name']; ?></div>
              <div class="flex">
                <div class="price"><span>PHP </span><span><?php echo $productRow['prod_base_price']; ?></span></div>
                <input type="hidden" name="prod_id" value="<?php echo $productRow['prod_id']; ?>">
                <button type="submit" name="add_to_cart" class="add-to-cart-btn"><i class="fa-solid fa-cart-plus"></i></button>
              </div>
              </form>
            </div>
          </div>
        </div>
      <?php 
          $rank++;
        }
      ?>
    </div>
    
  </div>
</section>

<!-- <section class="about">
   <div class="row">

      <div class="image">
         <img src="assets/images/shop 1.jpg" alt="Coffee Corner">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>
For top-notch coffee delivered straight to your door, Coffee Corner is your go-to choice. We're all about using the best beans and ensuring every cup is perfect. Enjoy the convenience and quality of our brews—it's coffee made easy and delicious!</p>
         <a href="Menu.php" class="btn">our menu</a>
      </div>

   </div>

</section> -->

<?php
  include('components/footer.php');
?>

<script>
  var swiper = new Swiper('.swiper-container', {
    loop: true,
    grabCursor: true,
    effect: 'slide',
    slidesPerView: 2, // Display 3 slides at a time
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
      slideChangeTransitionEnd: function () {
        var slides = document.querySelectorAll('.swiper-slide');
        slides.forEach((slide, index) => {
          if (index >= 3) {
            slide.classList.add('swiper-slide-blur');
          } else {
            slide.classList.remove('swiper-slide-blur');
          }
        });
      }
    }
  });

  // Initial blur for the slides not in the first 3 positions
  document.addEventListener('DOMContentLoaded', function () {
    var slides = document.querySelectorAll('.swiper-slide');
    slides.forEach((slide, index) => {
      if (index >= 3) {
        slide.classList.add('swiper-slide-blur');
      }
    });
  });
</script>

</body>
</html>
