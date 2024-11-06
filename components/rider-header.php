<?php

   require 'Conx.php';
   session_start();
   
      if ($_SESSION['user_type'] == '2') {
      header("Location: AdminDashboard.php");
   }else if ($_SESSION['user_type'] == '1') {
      header("Location: Home.php");
   }

   $id = $_SESSION['user_id'];

   if ($id == null) {
      header("Location: Login.php");
   }else {
      $sql = "SELECT * FROM users WHERE user_id = '$id'";
      $result = $conn->query($sql);
   
      $row = $result->fetch_assoc();
   }
?>



<header class="header">

   <section class="flex">

   <a href="RiderDashboard.php" class="logo">
         <img src="Images/CCLogo.png" alt="Coffee Corner Express Logo">
         Coffee Corner Express ☕︎
         
      </a>

      <nav class="navbar">
         <a href="RiderDashboard.php">home</a>
         <a href="RiderPendings.php">pendings</a>
         <a href="RiderCompletes.php">completes</a>
      </nav>
      
      <div class="icons">
         <span>Hello, <?php echo $row["user_fname"]; ?>!</span>
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">

         <p>
         <?php 
                echo "<strong>".$row["user_fname"] . " " . $row["user_lname"] . "</strong>";
            ?>
         </p>
         <a href="Profile.php" class="btn">Profile</a>
         <a href="SessionDestroy.php" onclick="return confirm('Are you sure you want to logout?');" class="delete-btn">logout</a>
      </div>

   </section>

</header>