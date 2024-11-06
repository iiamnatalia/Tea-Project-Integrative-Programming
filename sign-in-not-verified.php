<?php
    require('database/connections/conx-customer.php');
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer/PHPMailer/vendor/autoload.php';

    $fname = $_SESSION['user_fname'];
    $lname = $_SESSION['user_lname'];
    $email = $_SESSION['user_email'];

    if (isset($_POST["verifynow"])) {
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
    }else {

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Successfully Created</title>
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
            margin-top: 1rem;
            margin-bottom: 0rem;
            font-size: 1.7rem;
            color: var(--light-color);
        }

        input[type="email"] {
            text-align: center;
        }

         #skip {
            cursor:pointer;
            font-size: 1.7rem;
                color: #3d6655;
                text-decoration: underline;
        }
        .resend a {
            color: #007bff;
            text-decoration: none;
            cursor:pointer;
        }

        .resend a:hover {
            text-decoration: underline;
        }

        .form-container form {
    width: 700px;
    margin: 0 auto;
    padding: 3.3rem;
    text-align: center;
    color: var(--coffee-text);
    backdrop-filter: blur(10px) saturate(200%);
    -webkit-backdrop-filter: blur(10px) saturate(200%);
    background-color: #ffffff;
    border-radius: 12px;
    border: 1px solid rgba(0, 0, 0, 0.2);
}
   </style>
</head>
<body>
   <?php 
   include ('components/index-header.php'); 
   ?>

   <section class="form-container">
    
   <form method="post">
        <h3>Welcome to TeaProj. E-SIP, <?php echo htmlspecialchars($_SESSION['user_fname']); ?>!</h3>
        <!-- <h1>Welcome to TeaProj. E-Sip, Natalia!</h1> -->
        <p>Your account has been successfully created but you need to verify your account to use our system.</p>
      
      <div class="button-container">
         <input type="submit" id="verifynow" value="Verify Now" id="verifynow" name="verifynow" class="btn">
      </div>
      <p><a href="index.php" class="resend" id="skip" name="skip" onclick="return confirmSkip();">Skip for Now</a></p>
    </form>
    <script>
        function confirmSkip() {
            return confirm("Please note that skipping for now will not make you able to login to our system. You will need to verify first before you log in.");
        }
        </script>
   </form>
</section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
