<?php
require('database/connections/conx-customer.php');
$fname = $_SESSION['user_fname'];
$lname = $_SESSION['user_lname'];
$email = $_SESSION['user_email'];

// $fname = "Natalia";
// $lname = "Molito";
// $email = "nataliamolito120101@gmail.com";

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

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer/PHPMailer/vendor/autoload.php';

    if (isset($_POST["resend"])) {
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

            //Send using SMTP
            $mail->isSMTP();

            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';

            //Enable SMTP authentication
            $mail->SMTPAuth = true;

            //SMTP username
            $mail->Username = 'teaprojesip@gmail.com';

            //SMTP password
            $mail->Password = 'redf zmxr nlvx shit';

            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('teaprojesip@gmail.com', 'TeaProj. E-Sip');

            //Add a recipient
            $mail->addAddress($email, $fname . " " . $lname);

            //Set email format to HTML
            $mail->isHTML(true);

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

            $mail->Subject = 'Email Verification Code';
            $mail->Body    = '<p style="font-size: 20px">Your verification code is: <br><b style="font-size: 50px;">' . $verification_code . '</b></p>';

            $mail->send();
            // echo 'Message has been sent';

            // $encrypted_password = password_hash($pass, PASSWORD_DEFAULT);

            // Connect to the database using PDO
            $dsn = "mysql:host=localhost;port=3306;dbname=tea_proj;charset=utf8mb4";
            $db_username = "root";
            $db_password = "";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($dsn, $db_username, $db_password, $options);

            // Prepare SQL statement
            $stmt = $pdo->prepare("UPDATE users SET user_verification_code = ? WHERE user_email = ?");
            $stmt->execute([$verification_code, $email]);

            header("Location: sign-in-not-verified-verification-page.php");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
            <?php 
                echo "<h3>Verify Your Account</h3>
                <p>Enter the code we sent to <b>" . $email . "</b> below to verify your account and successfully use our system.</p>";
            ?>
            <input type="text" id="verification_code" name="verification_code" class="box" placeholder="Enter 6-digits code" maxlength="6" pattern="\d{6}" required>
            <div class="button-container">
                <input type="submit" id="register" name="verify" value="Submit" name="submit" class="btn ">
            </div>
            <p>can't access your e-mail right now? <a href="index.php" class="resend" id="skip" name="skip" onclick="return confirmSkip();">skip</a></p>
            </form>
            <script>
                function confirmSkip() {
                    return confirm("Please note that skipping for now will not make you able to login to our system. You will need to verify first before you log in.");
                }
            </script>
        </form>
    </section>

    <script>
        $(document).ready(function(){
            $('#verification_code').mask('000000');
        });
    </script>
</body>
</html>
