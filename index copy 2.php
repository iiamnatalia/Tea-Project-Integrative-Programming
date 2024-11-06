<?php
  require('database/connections/conx-customer.php');
  if (isset($_SESSION['user_id'])) {
    header('Location: customer-home.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TeaProj. E-Sip</title>
   <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/index.css">

</head>
<body>

<?php 
  include('components/index-header.php'); 
$sqlProducts = "SELECT * FROM products WHERE prod_category != 'Add-Ons' AND prod_status != 'Archived' LIMIT 4";
$stmtProducts = $pdo->query($sqlProducts);
$products = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);

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

<section class="products">
  <h1 class="title">Menu</h1>
  <div class="box-container">
    <?php
      // Process the products data as needed
      foreach ($products as $productRow) {
    ?>
      <form method="POST" action="sign-in-page.php">
        <div class="box">
          <img src="<?php echo $productRow['prod_img']; ?>" alt="">
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
    <?php 
      }
    ?>
  </div>

   <div class="more-btn">
      <a href="sign-in-page.php" class="btn_view">View All</a>
   </div>
</section>
<?php
  include('components/footer.php');
?>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="script.js"></script>
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
</html>
