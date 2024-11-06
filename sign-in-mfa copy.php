<?php
    require('database/connections/conx-customer.php');
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer/PHPMailer/vendor/autoload.php';

    if (!isset($_SESSION['user_email'])) {
        header('index.php');
    }else {
        $signedInEmail = $_SESSION['user_email'];
        $_SESSION['mfa_login'] = "Yes";
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        $sqlFetch = "SELECT * FROM users WHERE user_email = ?";
        $stmt = $pdo->prepare($sqlFetch);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $fname = $user['user_fname'];
            $lname = $user['user_lname'];
            $email = $user['user_email'];
            $_SESSION['user_email'] = $email;
            $_SESSION['forgot_pass'] = "No";


            $_SESSION['user_fname'] = $fname;
            $_SESSION['user_lname'] = $lname;
            $_SESSION['user_email'] = $email;


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
        
                    $mail->Subject = 'Are you trying to sign in?';
                    // $mail->Body    = '<p style="font-size: 20px">Your verification code is: <br><b style="font-size: 50px;">' . $verification_code . '</b></p>';
                    $current_time = date("F j, Y, H:i:s"); // Get the current date and time and format it
                    $mail->Subject = 'Login Verification Code';
                    $mail->Body    = '<p style="font-size: 20px">Your verification code is: <br><b style="font-size: 50px;">' . $verification_code . '</b></p>';
                    $mail->Body   .= '<p style="font-size: 20px">Are you trying to sign in at this time (' . $current_time . ')? This verification is happening in real-time. Please ignore the message if this is not you.</p>';
                    $mail->isHTML(true);
                    
                    
                    $mail->send();
                    // echo 'Message has been sent';
        
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
        
                    header("Location: sign-in-mfa-otp-verify.php");
                    exit();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }else {
        
            }
        }else {
            echo '<script type="text/javascript">
                alert("Your email does not exist. Please try another email.");
                window.location.href = "#";
            </script>';
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
        <form class="container" method="post">
            <img id="logodivimg" src="assets/images/IMG_2296.png">
            <h1>Are you trying to sign in?</h1>
            <p>Confirm that you really own this account</p>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" value="<?php echo  $signedInEmail; ?>"id="email" name="email" readonly>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary-custom btn-custom mx-2" id="verifynow" name="verifynow">Send OTP</button>
            </div>
            <div class="mfa-other">
                <a href="sign-in-mfa-sec-questions.php">Try Answering Security Questions</a>
            </div>

        </form>
   </section>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
