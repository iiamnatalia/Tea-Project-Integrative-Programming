<?php 
    session_start(); // Start the session

    // Check if 'user_id' session variable is set
    if (isset($_SESSION['user_id'])) {
        header('Location: Home.php'); // Redirect to Home.php
        exit(); // Stop further execution of the script
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TeaProj. E-Sip - Sign In</title>
   <link rel="icon" href="assets/images/favicon.png" type="image/png">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/index.css">
   <link rel="stylesheet" href="css/login-page.css">
   <link rel="stylesheet" href="css/snackbar.css">
</head>
<body>
   <?php 
   include ('components/index-header.php'); 
   ?>

<section class="form-container">
   <form action="sign-in-handler.php" method="post">
      <h3>Sign In</h3>
      <input type="email" name="email" required placeholder="E-mail Address" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')" required>
      <input type="password" name="pass" required placeholder="Password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')" required>
      <div class="show-pass">
         <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password
      </div>
      <input type="submit" value="login now" name="submit" class="btn">
      <p>don't have an account? <a href="sign-up-page.php">register now</a></p>
      <p><a href="sign-in-forgot-password.php">forgot password</a></p>
   </form>
</section>
<br>
<?php if (isset($_SESSION['error_message'])): ?>
         <div class="snack-bar-container">
            <div id="snackbar-red" class="snack-bar show red"><?php echo $_SESSION['error_message']; ?></div>
         </div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>

<?php if (isset($_SESSION['success_message'])): ?>
         <div class="snack-bar-container">
            <div id="snackbar-green" class="snack-bar show green"><?php echo $_SESSION['success_message']; ?></div>
         </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <script>
        // Automatically hide the snackbar after it fades out
        setTimeout(function() {
            var redSnackbar = document.getElementById("snackbar-red");
            var greenSnackbar = document.getElementById("snackbar-green");
            if (redSnackbar) {
                redSnackbar.className = redSnackbar.className.replace("show", "");
            }
            if (greenSnackbar) {
                greenSnackbar.className = greenSnackbar.className.replace("show", "");
            }
        }, 3000);
    </script>
<?php include "components/footer.php"; ?>

<script>
   function togglePasswordVisibility() {
      var passwordInput = document.querySelector('input[name="pass"]');
      if (passwordInput.type === 'password') {
         passwordInput.type = 'text';
      } else {
         passwordInput.type = 'password';
      }
   }
</script>

</body>
</html>
