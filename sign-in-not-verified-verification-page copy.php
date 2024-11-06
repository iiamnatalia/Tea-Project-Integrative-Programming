<?php
require('database/connections/conx-customer.php');
// $fname = $_SESSION['user_fname'];
// $lname = $_SESSION['user_lname'];
// $email = $_SESSION['user_email'];

$fname = "Natalia";
$lname = "Molito";
$email = "nataliamolito120101@gmail.com";

$_SESSION['forgot_pass'] = "No";

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
        if ($_SESSION['forgot_pass'] == "Yes") {
            echo ('hatdog 4');
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
                    window.location.href = "forgot_pass_change_pass.php"; 
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
            window.location.href = "verification_page.php"; 
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
    <?php 
        if ($_SESSION['forgot_pass'] != "Yes") { 
            echo "<title>Verify Your Account</title>";
        }else {
            echo "<title>Retrieve Your Account</title>";
        }
    ?>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            height: 100vh;
            background-color: #f8f9fa;
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
            margin-bottom: 20px;
        }
        h1 {
            font-size: 1.5em;
            margin-bottom: 10px;
            font-weight: 600;
        }
        p {
            font-size: 0.95em;
            color: #6c757d;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            font-size: 1em;
            text-align: center;
        }
        .btn-primary-custom {
            background-color: #007bff;
            color: #fff;
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
        }
        .btn-primary-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .resend {
            font-size: 0.9em;
            margin-top: 10px;
        }
        .resend a {
            color: #007bff;
            text-decoration: none;
        }
        .resend a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <img id="logodivimg" src="assets/images/logogold.png">
        <?php 
            
        if ($_SESSION['forgot_pass'] != "Yes") {
            echo "<h1>Verify Your Account</h1>
            <p>We sent a verification code to " . $email . ". Please check your inbox and enter the code below to successfully use our system.</p>";
        }else {
            echo "<h1>Retrieve Your Account</h1>
            <p>We sent a code to " . $email . ". Please check your inbox and enter the code below to successfully retrieve your account.</p>";
        }
        ?>

        <form method="POST" id="verification-form">
            <div class="form-group">
                <label for="verification-code">6-digits code</label>
                <input type="text" id="verification_code" name="verification_code" class="form-control" placeholder="Enter 6-digits code" maxlength="6" pattern="\d{6}" required>
            </div>
            <button type="submit" name="verify" class="btn btn-primary-custom">Verify Code</button>
        </form>
        <div class="resend">
            Didn't receive an email? <a href="forgot_pass_send_otp.php" id="resend-link"><b>Change your email</b></a><br>
        </div>


    </div>
    <script>
        $(document).ready(function(){
            $('#verification-code').mask('000000');
        });
    </script>
</body>
</html>
