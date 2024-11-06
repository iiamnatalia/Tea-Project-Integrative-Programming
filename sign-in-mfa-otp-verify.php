<?php
require('database/connections/conx-customer.php');
$fname = $_SESSION['user_fname'];
$lname = $_SESSION['user_lname'];
$email = $_SESSION['user_email'];

if (isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}


if (isset($_POST["verify"])) {
    $verification_code = $_POST["verification_code"];
    // Check if email session variable is set
    if (!isset($_SESSION['user_email'])) {
        die("Email is not set in the session.");
    }

    $sql = "UPDATE users SET user_verification_code = NULL WHERE user_email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $sqlFetch = "SELECT * FROM users WHERE user_email = ?";
    $stmt = $pdo->prepare($sqlFetch);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user_email'] = $user['user_email'];

    $user_id = $user['user_id'];

    // Check if any rows were affected
    if ($stmt->rowCount() > 0) {
        if ($_SESSION['mfa_login'] == "Yes") {

            $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Login Verified Using OTP")';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id]);

            $_SESSION['user_id'] = $user_id;

            if ($_SESSION['user_type'] == 1) {
                echo '<script type="text/javascript">
                    alert("Welcome back to TeaProj. E-Sip, ' . $fname . '! \n\nYour login has been verified. You may now use our system.");
                    window.location.href = "customer-home.php"; 
                </script>';
            }else {
                echo '<script type="text/javascript">
                alert("Welcome back to TeaProj. E-Sip, ' . $fname . '! \n\nYour login has been verified. You may now use the system.");
                window.location.href = "staff/staff-dashboard.php"; 
            </script>';
            }
        }
        exit();
    } else {
        echo '<script type="text/javascript">
            alert("Verification failed. Please check your login verification code.");
            window.location.href = "sign-in-mfa-sec-questions.php"; 
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
    <title>Verify Login</title>
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
   </style>
</head>
<body>
   <?php 
   include ('components/index-header.php'); 
   ?>

<section class="form-container">
    
   <form action="" method="post" id="verification-form">

        <h3>Login Verification</h3>
            <p>Enter the code we sent to <b><?php echo $email;?></b> to verify your login.</p>


                <input type="text" id="verification_code" name="verification_code" class="box" placeholder="Enter 6-digits code" maxlength="6" pattern="\d{6}" required>


      <div class="button-container">
         <input type="submit" id="register" name="verify" value="Submit" name="submit" class="btn ">
      </div>
            <p>Didn't receive the OTP? <a href="sign-in-mfa-sec-questions.php">Try another way</a></p>
            
   </form>
</section>

<?php include "components/footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
