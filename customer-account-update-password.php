
<?php
    require('database/connections/conx-customer.php');
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer/PHPMailer/vendor/autoload.php';
    
    $user = $_SESSION['user'];
    $email = $_SESSION['user_email'];

    $user_id = $user['user_id'];

    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $_SESSION['old_pass'] = $_POST['old_pass'];
    $_SESSION['new_pass'] = $_POST['new_pass'];

var_dump($_SESSION);

    $sqlFetch = "SELECT * FROM users WHERE user_email = ?";
    $stmt = $pdo->prepare($sqlFetch);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($old_pass, $user['user_pass'])) {
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

            $encrypted_password = password_hash($pass, PASSWORD_DEFAULT);

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

            header("Location: customer-account-update-password-verify-otp.php");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        

        
    }else {
        $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Failed to Update Password")';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
        
        echo '<script type="text/javascript">
                alert("The old password you entered is incorrect. Please try again.");
                window.location.href = "customer-account.php";
            </script>';
    }

?>

