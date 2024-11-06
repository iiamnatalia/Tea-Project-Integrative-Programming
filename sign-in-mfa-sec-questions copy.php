<?php
require('database/connections/conx-customer.php');
$fname = $_SESSION['user_fname'];
$lname = $_SESSION['user_lname'];
$email = $_SESSION['user_email'];

$sqlFetch = "SELECT * FROM users WHERE user_email = ?";
$stmt = $pdo->prepare($sqlFetch);
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// if (isset($_SESSION['user_id'])) {
//     header("Location: customer-home.php");
//     exit();
// }

$showSuccessModal = false;
$showErrorModal = false;

if (isset($_POST["verify"])) {
    $security_answer_1 = $_POST["security_answer_1"];
    $security_answer_2 = $_POST["security_answer_2"];

    // Check if email session variable is set
    if (!isset($_SESSION['user_email'])) {
        die("Email is not set in the session.");
    }

    $sqlFetch = "SELECT * FROM users WHERE user_email = ?";
    $stmt = $pdo->prepare($sqlFetch);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($security_answer_1, $user['user_sec_ans_1']) && password_verify($security_answer_2, $user['user_sec_ans_2'])) {
        $sql = "UPDATE users SET user_verification_code = NULL WHERE user_email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        $user_id = $user['user_id'];
        $_SESSION['user_id'] = $user_id;

        if ($_SESSION['user_type'] == 1) { 
            echo '<script type="text/javascript">
                    alert("Welcome back to TeaProj. E-Sip, ' . $fname . '! \n\nYour login has been verified. You may now use our system.");
                    window.location.replace("customer-home.php"); 
                </script>';
            exit();
        } else {
            echo '<script type="text/javascript">
                alert("Welcome back to TeaProj. E-Sip, ' . $fname . '! \n\nYour login has been verified. You may now use the system.");
                window.location.replace("staff/staff-dashboard.php"); 
            </script>';
        }

        if ($_SESSION['mfa_login'] == "Yes") {
            $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Login Verified Using Security Questions")';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id]);

            $_SESSION['user_id'] = $user_id;
            $showSuccessModal = true;
        }
    } else {
        $showErrorModal = true;
    }
}
session_abort();
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
    <link href="css/index.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <style>
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
            font-size: 3em;
            margin-bottom: 10px;
            font-weight: 800;
        }
        p {
            font-size: 20px;
            font-weight: 700;
            color: #0e3d30;
            margin-bottom: 5px;
        }
        .form-group {
            margin-bottom: 5px;
        }
        .form-control {
            font-size: 16px;
            text-align: center;
            border: 1px solid black;
            width: 100%;
            padding: 10px;
            background-color: white;
            opacity: 1;
            font-size: 20px;
            padding: 18px 20px;
            text-align: center;
            width: 100%;
            border: 1px solid #0e3d3078;
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
        .btn-primary-custom:hover {
            background-color: #0e3d30;
            color: #fff;
        }
        .delete-btn:hover, .btn:hover, .btn_small:hover {
            letter-spacing: .2rem;
        }
        .btn-primary-custom {
            background-color: #0e3d30;
            color: #fff;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }
        .mfa-other {
            padding: 20px 0 0;
            font-size: 16px;
        }

        .mfa-other a {
            text-decoration: underline;
        }

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
            /* margin-bottom: 20px; */
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
        <h1>Verify Login</h1>
        <form method="POST" id="verification-form">
            <div class="form-group">
                <p>Q1: <?php echo $user['user_sec_que_1']; ?></p>
                <input type="text" id="security_answer_1" name="security_answer_1" class="form-control" placeholder="Enter answer" required>
            </div>
            <div class="form-group">
                <p>Q2: <?php echo $user['user_sec_que_2']; ?></p>
                <input type="text" id="security_answer_2" name="security_answer_2" class="form-control" placeholder="Enter answer" required>
            </div>
            <button type="submit" name="verify" class="btn btn-primary-custom">Verify Answers</button>
            <div class="mfa-other">
                <a href="sign-in-mfa.php">Verify Using Email</a>
            </div>
        </form>
    </div>
    

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Verification Successful</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Welcome back to TeaProj. E-Sip, <?php echo $fname; ?>! <br><br>Your login has been verified. You may now use our system.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Verification Failed</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Verification failed. Please check your answers to security questions.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </section>

    <?php if ($showSuccessModal) { ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#successModal').modal('show');
                setTimeout(function() {
                    window.location.replace("<?php echo $_SESSION['user_type'] == 1 ? 'customer-home.php' : 'staff-dashboard.php'; ?>");
                }, 3000);
            });
        </script>
    <?php } ?>

    <?php if ($showErrorModal) { ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#errorModal').modal('show');
            });
        </script>
    <?php } ?>
</body>
</html>
