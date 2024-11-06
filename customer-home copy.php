
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TeaProj. E-Sip - Home</title>
   

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/index.css">
   <style>
.home {
    background-image: url(assets/images/bg_1.jpg);
    background-position: center;
    background-size: cover;
    max-width: 100%;
    margin: 2.5%;
    padding: 10% 8%;
    height: 83%;
    display: flex;
    border-radius: 20px;
}
    .swiper-flip {
      overflow: auto;
    }
    .icons a {
      color: white;
      text-decoration: none;
      font-size: 20px;
    } 
    
    .swiper-pagination-bullet {
        width: var(--swiper-pagination-bullet-width, var(--swiper-pagination-bullet-size, 10px));
        height: var(--swiper-pagination-bullet-height, var(--swiper-pagination-bullet-size, 10px));
        display: inline-block;
        border-radius: 50%;
        background: #fff;
        opacity: var(--swiper-pagination-bullet-inactive-opacity, .3);
    }
    .swiper-pagination-bullet-active {
        background-color: #3d6655;
    }
    .swiper-pagination-bullet-active {
        opacity: var(--swiper-pagination-bullet-opacity, 1);
    }
    
    @media (max-width: 905.94px) {
    .home .slide {
          display: flex;
          flex-wrap: wrap-reverse;
          /* flex-direction: column-reverse; */
          gap: 1.5rem;
          align-items: center;
          margin-bottom: 4rem;
      }
      .home {
        margin: 6%;
        padding: 2rem;
        height: 85%;
        display: flex;
        border-radius: 20px;
    }
    .home .slide .content h3 {
        font-size: 5.5rem;
        text-transform: capitalize;
        color: #fff;
        padding: 1rem 0;
    }
}
   </style>
</head>
<body>
   
<?php 
   include "components/header.php"; 

   // Assume $id is retrieved from session or request
   $id = 1; // Example user ID

   $sql = "SELECT * FROM users WHERE user_id = :user_id";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(['user_id' => $id]);
   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   $sqlProducts = "SELECT * FROM products WHERE prod_category != 'Add-Ons' LIMIT 12";
   $stmtProducts = $pdo->prepare($sqlProducts);
   $stmtProducts->execute();
   $resultProducts = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="home">
  <div class="landing-message">
    <h2>Sip, Savor, and Delight in the Art of Tea</h2>
    <p>TeaProj. E-Sip offers a perfect blend for every cup, transforming each sip into a delightful journey and lets you discover the rich and diverse world of tea.</p>
    <div class="btn-div">
      <a href="Menu.php" class="btn_small">Order Now</a>
    </div>
  </div>
</section>
<!-- <section class="category">
   <h1 class="title">Category</h1>
   <div class="box-container">
      <a href="Menu.php?query=Cold%20Brew" class="box">
         <img src="Images/Products/Caramel Macchiato.png" alt="">
         <h3>Cold Brew</h3>
      </a>
   
      <a href="Menu.php?query=Non%20Coffee" class="box">
         <img src="Images/Products/Choco Hazelnut.png" alt="">
         <h3>Non Coffee</h3>
      </a>
   
      <a href="Menu.php?query=Special%20Brew" class="box">
         <img src="Images/Products/Brown Sugar Shaken Espresso.png" alt="">
         <h3>Special Brew</h3>
      </a>
   
      <a href="Menu.php?query=Matcha%20Series" class="box">
         <img src="Images/Products/Matcha Latte.png" alt="">
         <h3>Matcha Series</h3>
      </a>
   </div>
</section> -->

<section class="products">
   <h1 class="title">Menu</h1>
   <div class="box-container">
<?php foreach ($resultProducts as $productRow): ?>
    <form method='POST' action='customer-add-to-cart-form.php'>
        <div class="box">
            <img src="<?= $productRow['prod_img'] ?>" alt="">
            <a href="Menu.php?query=<?= urlencode($productRow['prod_category']) ?>" class="cat"><?= $productRow['prod_category'] ?></a>
            <div class="name"><?= $productRow['prod_name'] ?></div>
            <div class="flex">
                <div class="price"><span>PHP </span><?= $productRow['prod_base_price'] ?><span></span></div>
                <input type="hidden" name="prod_id" value="<?= $productRow['prod_id'] ?>">
                <button type="submit" name="add_to_cart" class="add-to-cart-btn" style="font-size: 13px;">Add to Cart</button>
            </div>
        </div>
    </form>
<?php endforeach; ?>

   </div>
   <div class="more-btn">
      <a href="Menu.php" class="btn_view">View All</a>
   </div>
</section>

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
</script>
</body>
<?php
  include('components/footer.php');
?>
</html>
