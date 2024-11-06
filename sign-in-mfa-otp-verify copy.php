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
   <title>TeaProj. E-Sip - Verify Login</title>
   <link rel="icon" href="assets/images/favicon.png" type="image/png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="css/index.css">
    <style>
        .verify-section {
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            
            max-width: 500px;
            width: 100%;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container img {
            height: 100px;
            margin-bottom: 10px;
        }
        h1 {
            font-size: 3em;
            margin-bottom: 10px;
            font-weight: 600;
        }
        p {
            font-size: 1.8em;
            color: #6c757d;
            margin-bottom: 20px;
        }
        .btn-custom {
            font-size: 1.8em;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
        }
        .btn-primary-custom {
            background-color: #0e3d30;
            color: #fff;
        }
        .btn-primary-custom:hover {
            background-color: #212529;
            color: #fff;
        }
        .btn-secondary-custom {
            background-color: #6c757d;
            color: #fff;
        }
        .btn-secondary-custom:hover {
            background-color: #5a6268;
            color: #fff;
        }
        img {
            height: 200px;
        }
        #skip {
            cursor:pointer;
        }
        .verify-section a {
            /* padding: 0; */
            color: #155724;
            text-decoration: none;
            cursor: pointer;
            font-weight: 600;
            text-decoration: underline;
        }

        a:hover {
            text-decoration: underline;
        }

        .mr-2, .mx-2 {
            margin: 0 !important;
        }
        .form-group {
            margin-bottom: .5rem;
        }
        label {
            display: inline-block;
            margin-bottom: .5rem;
            font-size: 20px;
            font-weight: 600;
        }
        .form-control:disabled, .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
            font-size: 20px;
            padding: 18px 20px;
            text-align: center;
            width: 100%;
            border: 1px solid #0e3d3078;
        }

        .mfa-other {
            padding: 20px 0 0;
            font-size: 16px;
        }
        
    </style>
</head>
<body>
   <?php 
   include ('components/index-header.php'); 
   ?>
   <section class="verify-section">
    <div class="container">
        <img id="logodivimg" src="assets/images/IMG_2296.png">
        <?php 
            echo "<h1>Confirm Login</h1>
            <p>We sent a code to " . $email . ". Please check your inbox and enter the code below to successfully login to your account.</p>";
        
        ?>

        <form method="POST" id="verification-form">
            <div class="form-group">
                <label for="verification-code">6-digits code</label>
                <input type="text" id="verification_code" name="verification_code" class="form-control" placeholder="Enter 6-digits code" maxlength="6" pattern="\d{6}" required>
            </div>
            <button type="submit" name="verify" class="btn btn-primary-custom">Verify Code</button>
        </form>
        <div class="resend">
            Didn't receive an email? <a href="sign-in-mfa-sec-questions.php" id="resend-link"><b>Try Another Way</b></a><br>
        </div>


    </div>
   </section>
    <script>
        $(document).ready(function(){
            $('#verification-code').mask('000000');
        });
    </script>
</body>
</html>
