
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
   <link rel="icon" href="assets/images/favicon.png" type="image/png">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/index.css">
   <link rel="stylesheet" href="css/login-page.css">
   <style>
      .button-container {
         display: flex;
         justify-content: space-between;
         margin-top: -5px; /* Adjust margin as needed */
         width: 100%; /* Ensure the container spans the entire width */
         gap: 10px;
      }

      .btn {
         display: inline-block;
         margin-top: 1rem;
         padding: 1.5rem 3rem;
         cursor: pointer;
         border-radius: 6px;
         font-size: 1.5rem;
         text-transform: capitalize;
         width: 60%; /* Allow buttons to take only the necessary width */
         color: white;
      }
    
      .btn.clear {
        background-color: white;
      }

      .form-container form p {
            margin-top: .5rem;
            margin-bottom: 1rem;
            font-size: 1.7rem;
            color: var(--light-color);
        }

        input[type="text"] {
            text-align: center;
        }
        input#register {
    background-color: #0e3d30;
}
input#register:hover {
    color: white;
}
   </style>
</head>
<body>
<?php 
include ('components/header.php');

$old_pass = $_SESSION['old_pass'];
$new_pass = $_SESSION['new_pass'];
// var_dump($_SESSION);
  $email = $_SESSION['user_email'];

if (isset($_POST["verify"])) {
  $verification_code = $_POST["verification_code"];
  // Check if email session variable is set
  if (!isset($_SESSION['user_email'])) {
    die("Email is not set in the session.");
  }

  $sqlFetch = "SELECT * FROM users WHERE user_email = ? AND user_verification_code = ?";
  $stmt = $pdo->prepare($sqlFetch);
  $stmt->execute([$email, $verification_code]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  $user_id = $user['user_id'];

     if ($stmt->rowCount() > 0) {
        $sql = "UPDATE users SET user_verification_code = NULL WHERE user_email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

       if ($user && password_verify($old_pass, $user['user_pass'])) {

         $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

         $sqlUpdatePass = "UPDATE `users` SET `user_pass`= ? WHERE user_id = ?";
         $stmt = $pdo->prepare($sqlUpdatePass);
         $stmt->execute([$new_pass, $user_id]);

         $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Successfully Updated Password")';
         $stmt = $pdo->prepare($sql);
         $stmt->execute([$user_id]);

         echo '<script type="text/javascript">
            alert("You password has been successfully changed.");
            window.location.href = "customer-account.php";
        </script>';
       }

     } else {

           echo '<script type="text/javascript">
            alert("Verification failed. Please check your verification code.");
            window.location.href = "customer-account-update-password-verify-otp.php"; 
        </script>';

        }
      exit();
    }
   ?>

<section class="form-container">
    
   <form action="" method="post" id="verification-form">

        <?php 
            
          echo "<h3>Change Password Verification</h3>
          <p>Enter the code we sent to <b>" . $email . "</b> below to successfully change your password.</p>";
        ?>
                <input type="text" id="verification_code" name="verification_code" class="box" placeholder="Enter 6-digits code" maxlength="6" pattern="\d{6}" required>


      <div class="button-container">
         <input type="submit" id="register" name="verify" value="Submit" name="submit" class="btn ">
      </div>
   </form>
</section>

<?php include "components/footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
