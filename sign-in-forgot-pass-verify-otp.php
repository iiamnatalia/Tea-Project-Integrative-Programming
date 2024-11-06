<?php
require('database/connections/conx-customer.php');
$fname = $_SESSION['user_fname'];
$lname = $_SESSION['user_lname'];
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

    $_SESSION['user_email'] = $user['user_email'];

    $user_id = $user['user_id'];

    // Check if any rows were affected
    if ($stmt->rowCount() > 0) {
        $sql = "UPDATE users SET user_verification_code = NULL WHERE user_email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        if ($_SESSION['forgot_pass'] == "Yes") {
            
            if ($user['user_verified_at'] != NULL) {
                $sql = "UPDATE users SET user_status = 'Verified', user_locked_until = NULL WHERE user_email = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$email]);
            }else {
                $sql = "UPDATE users SET user_status = 'Registered', user_locked_until = NULL WHERE user_email = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$email]);
            }

            $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Account Retrieved")';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id]);

            echo '<script type="text/javascript">
                    alert("Welcome back to TeaProj. E-Sip, ' . $fname . '! \n\nYour account has been successfully retrieved. You may now change your password.");
                    window.location.href = "sign-in-forgot-pass-change-pass.php"; 
                </script>';
                
                
        }else {

                // Update user_verified_at column and set user_verification_code to NULL
            $sql = "UPDATE users SET user_verified_at = NOW(), user_verification_code = NULL, user_status = 'Verified' WHERE user_email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);

            $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Account Verified")';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id]);

            

            echo '<script type="text/javascript">
                    alert("Welcome to TeaProj. E-Sip, ' . $fname . '! \n\nYour account has been successfully verified. You may now login to your account.");
                    window.location.href = "sign-in-page.php"; 
                </script>';
        }



        // Redirect to index page after successful verification

        exit();
    } else {
        echo '<script type="text/javascript">
            alert("Verification failed. Please check your verification code.");
            window.location.href = "sign-in-forgot-pass-verify-otp.php"; 
        </script>';
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Recovery</title>
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
            margin-top: 1.5rem;
            margin-bottom: 0rem;
            font-size: 1.7rem;
            color: var(--light-color);
        }

        input[type="text"] {
            text-align: center;
        }
   </style>
</head>
<body>
   <?php 
   include ('components/index-header.php'); 
   ?>

<section class="form-container">
    
   <form action="" method="post" id="verification-form">

        <?php 
            
        if ($_SESSION['forgot_pass'] != "Yes") {
            echo "<h3>Verify Your Account</h3>
            <p>Enter the code we sent to <b>" . $email . "</b> below to successfully use our system.</p>";
        }else {
            echo "<h3>Account Recovery</h3>
            <p>Enter the code we sent to <b>" . $email . "</b> below to successfully retrieve your account.</p>";
        }
        ?>
                <input type="text" id="verification_code" name="verification_code" class="box" placeholder="Enter 6-digits code" maxlength="6" pattern="\d{6}" required>


      <div class="button-container">
         <input type="submit" id="register" name="verify" value="Submit" name="submit" class="btn ">
      </div>
            <p>didn't receive the otp? <a href="sign-in-forgot-password.php">change your email</a></p>
   </form>
</section>

<?php include "components/footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
