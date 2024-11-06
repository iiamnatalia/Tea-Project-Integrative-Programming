<?php
require('database/connections/conx-customer.php');

$fname = $_SESSION['user_fname'];
$lname = $_SESSION['user_lname'];
$email = $_SESSION['user_email'];

$sqlFetch = "SELECT * FROM users WHERE user_email = ?";
$stmt = $pdo->prepare($sqlFetch);
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$showSuccessModal = false;
$showErrorModal = false;

if (isset($_POST["verify"])) {
    $security_answer_1 = $_POST["security_answer_1"];
    $security_answer_2 = $_POST["security_answer_2"];

    if (!isset($_SESSION['user_email'])) {
        die("Email is not set in the session.");
    }

    if (password_verify($security_answer_1, $user['user_sec_ans_1']) && password_verify($security_answer_2, $user['user_sec_ans_2'])) {
        $sql = "UPDATE users SET user_verification_code = NULL WHERE user_email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        $user_id = $user['user_id'];
        $_SESSION['user_id'] = $user_id;

        $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Login Verified Using Security Questions")';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
        $showSuccessModal = true;
    } else {
        $showErrorModal = true;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <style>
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: -5px;
            width: 100%;
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
            width: 60%;
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
        input[type="email"], input[type="text"] {
            text-align: center;
        }
        .modal-header {
            font-size: 2rem;
        }
        .modal-body {
            position: relative;
            flex: 1 1 auto;
            padding: 1rem;
            font-size: 1.5rem;
        }

#successRedirect, #modalDismiss {
    padding: 10px;
    width: 200px;
}

        .modal-footer {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: flex-end;
    padding: 0rem;
    border-top: 1px solid #e3e6f0;
    border-bottom-right-radius: calc(0.3rem - 1px);
    border-bottom-left-radius: calc(0.3rem - 1px);
}

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
    outline: 0;
    padding: 20px;
}

.modal-header .close {
    padding: 1rem 1rem;
    margin: -1rem -1rem -1rem auto;
    background: white;
    font-weight: bold;
}
    </style>
</head>
<body>
   <?php include ('components/index-header.php'); ?>

<section class="form-container">
    <form method="post" action="" id="verification-form">
        <h3>Are you trying to sign in?</h3>
        <p>Answer these security questions to confirm your login.</p>

        <p class="question">1. <?php echo $user['user_sec_que_1']; ?></p>
        <input type="text" id="security_answer_1" name="security_answer_1" class="box" placeholder="Enter answer" maxlength="20">
        <p class="question">2. <?php echo $user['user_sec_que_2']; ?></p>
        <input type="text" id="security_answer_2" name="security_answer_2" class="box" placeholder="Enter answer" maxlength="20">
      
        <div class="button-container">
            <input type="submit" value="Submit Answers" id="verify" name="verify" class="btn">
        </div>
        <p><a href="sign-in-mfa.php">Try Another Way</a></p>
    </form>
</section>

<?php include "components/footer.php"; ?>

<!-- Modals -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Verification Successful</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Welcome back to TeaProj. E-Sip, <?php echo $fname; ?>! Your login has been verified. You may now use our system.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="successRedirect">OK</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Verification Failed</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        The answers to the security questions were incorrect. Please try again.
      </div>
      <div class="modal-footer">
        <button type="button" id="modalDismiss" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    <?php if ($showSuccessModal) { ?>
        $('#successModal').modal('show');
        $('#successRedirect').click(function() {
            window.location.replace("<?php echo ($_SESSION['user_type'] == 1) ? 'customer-home.php' : 'staff/staff-dashboard.php'; ?>");
        });
    <?php } elseif ($showErrorModal) { ?>
        $('#errorModal').modal('show');
    <?php } ?>
});
</script>
</body>
</html>
