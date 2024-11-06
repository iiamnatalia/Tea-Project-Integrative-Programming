<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Login Alert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="alertMessage"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Bootstrap Modal -->

    <!-- Your PHP script should be included here -->
    <?php
    require('database/connections/conx-customer.php');
    date_default_timezone_set('Asia/Singapore');

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Fetch user information
    $sqlFetch = "SELECT * FROM users WHERE user_email = ?";
    $stmt = $pdo->prepare($sqlFetch);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $user_id = $user['user_id'];

        $_SESSION['user_type'] = $user['user_type'];

        // Check failed login attempts
        $sqlFailed = "SELECT COUNT(*) AS failed_login_dated_attempts FROM failed_logins WHERE user_id = ? AND failed_login_dated_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)";
        $stmt = $pdo->prepare($sqlFailed);
        $stmt->execute([$user_id]);
        $userFailed = $stmt->fetch(PDO::FETCH_ASSOC);
        $failedAttempts = $userFailed['failed_login_dated_attempts'];

        
        if (password_verify($pass, $user['user_pass'])) {

            $current_time = new DateTime();
            $user_locked_until = new DateTime($user['user_locked_until']);

            if ($user['user_state'] === "Enabled") {
                if ($user['user_locked_until'] === NULL || $user_locked_until <= $current_time) {
                    if ($failedAttempts < 5) {
                        if ($user['user_state'] == "Enabled") {
                            // Clear lock time and reset failed attempts
                            clearFailedAttempts($user_id, $pdo);
                            $sql = "UPDATE users SET user_locked_until = NULL WHERE user_id = ?";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([$user_id]);
                            // $_SESSION['user_id'] = $user['user_id'];
    
                            // Set session variables
                            $_SESSION['user_fname'] = $user['user_fname'];
                            $_SESSION['user_lname'] = $user['user_lname'];
                            $_SESSION['user_status'] = $user['user_status'];
                            $_SESSION['user_email'] = $user['user_email'];
                            $_SESSION['user_type'] = $user['user_type'];
                            $_SESSION['user'] = $user;

                            if ($user['user_status'] == "Registered") {
                                $_SESSION['forgot_pass'] = "No";
                                header("Location: sign-in-not-verified.php");
                            } else if ($user['user_status'] == "Verified") {
                                // $_SESSION['user_id'] = $user['user_id'];
                                $_SESSION['user_type'] = $user['user_type'];
                                if ($user['user_mfa'] == "Enabled") {
                                    header("Location:sign-in-mfa.php");
                                } else if ($user['user_mfa'] == "Disabled") {
                                    $_SESSION['user_id'] = $user['user_id'];
                                    if ($user['user_type'] == 1) {
                                        header("Location:customer-home.php");
                                    } else if ($user['user_type'] == 2) {
                                        header("Location:staff/staff-dashboard.php");
                                    } else if ($user['user_type'] == 3) {
                                        header("Location:staff/manager-dashboard.php");
                                    }

                                }

                                // Log successful login
                                $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Successful Login")';
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([$user['user_id']]);
                            }
                        } else {
                            // showModal("You cannot login right now. Your account is currently disabled. Please contact TeaProj. E-Sip to retrieve your account.");
                            $_SESSION['error_message'] = "You cannot login right now. Your account is currently disabled. Please contact TeaProj. E-Sip to retrieve your account.";
                            header("Location: sign-in-page.php");
                            
                        }

                    } else if ($failedAttempts >= 5) {
                        handleFailedLogin($user, $user_id, $failedAttempts, $pdo);
                    }

                } else {
                    $formattedDateTime = $user_locked_until->format('M d, Y - h:i:s A');
                    $_SESSION['error_message'] = "You cannot login right now. Your account is locked until $formattedDateTime.";
                    header("Location: sign-in-page.php");
                    // showModal("You cannot login right now. Your account is locked until $formattedDateTime.");
                }
            }else {
                $_SESSION['error_message'] = "Your account is currently disabled for security purposes. Please contact your local administrator to retrieve your account.";
                header("Location: sign-in-page.php");
                // showModal("Your account is currently disabled for security purposes. Please contact your local administrator to retrieve your account.");
            }
        } else {
            if ($user['user_state'] == "Enabled") {
                handleFailedLogin($user, $user_id, $failedAttempts, $pdo);
            } else if ($user['user_state'] == "Disabled") {
                $_SESSION['error_message'] = "Your account is currently disabled for security purposes. Please contact your local administrator to retrieve your account.";
                header("Location: sign-in-page.php");
                // showModal("Your account is currently disabled for security purposes. Please contact your local administrator to retrieve your account.");
            }

        }
    } else {
        $_SESSION['error_message'] = "Incorrect email or password. Please try again.";
        header("Location: sign-in-page.php");
        // showModal("Incorrect email or password. Please try again.");
    }

    

    function handleFailedLogin($user, $user_id, $failedAttempts, $pdo) {
        $current_time = new DateTime();
        $user_locked_until = new DateTime($user['user_locked_until']);

        if ($user['user_locked_until'] === NULL || $user_locked_until <= $current_time) {
            if ($failedAttempts < 5) {
                logFailedAttempt($user_id, $pdo);
                $remainingAttempts = 5 - ($failedAttempts + 1);

                if ($remainingAttempts > 0) {
                    $_SESSION['error_message'] = "Incorrect email or password. You have $remainingAttempts attempts left.";
                    header("Location: sign-in-page.php");
                    // showModal();
                }else {
                    lockAccount($user_id, 5, $pdo);
                }
            } else if ($failedAttempts < 6) {
                logFailedAttempt($user_id, $pdo);
                lockAccount($user_id, 10, $pdo);
            } else if ($failedAttempts < 7) {
                logFailedAttempt($user_id, $pdo);
                lockAccount($user_id, 15, $pdo);
            } else if ($failedAttempts < 8) {
                logFailedAttempt($user_id, $pdo);
                lockAccount($user_id, 30, $pdo);
            } else {
                logFailedAttempt($user_id, $pdo);
                disableAccount($user_id, $pdo);
            }
        }else  {
            $formattedDateTime = $user_locked_until->format('M d, Y - h:i:s A');
            // showModal();
            $_SESSION['error_message'] = "You cannot login right now. Your account is locked until $formattedDateTime.";
            header("Location: sign-in-page.php");
        }
    }

    function logFailedAttempt($user_id, $pdo) {
        $sql = "INSERT INTO failed_logins (user_id, failed_login_dated_at) VALUES (?, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
    }

    function clearFailedAttempts($user_id, $pdo) {
        $sql = "DELETE FROM failed_logins WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
    }

    function lockAccount($user_id, $minutes, $pdo) {
        $current_time = new DateTime();
        $user_locked_until = $current_time->add(new DateInterval('PT' . $minutes . 'M'));
        $user_locked_until_str = $user_locked_until->format('Y-m-d H:i:s');

        $sql = "UPDATE users SET user_locked_until = ? WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_locked_until_str, $user_id]);

        $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Account Locked")';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);

        
        $_SESSION['error_message'] = "Your account is locked for $minutes minutes. Please wait until $user_locked_until_str to login.";
        header("Location: sign-in-page.php");
        // showModal("Your account is locked for $minutes minutes. Please wait until $user_locked_until_str to login.");
    }

    function disableAccount($user_id, $pdo) {
        $sql = "UPDATE users SET user_state = 'Disabled' WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);

        $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Account Disabled")';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
        $_SESSION['error_message'] = "Your account has been disabled due to multiple failed login attempts. Please contact support.";
        header("Location: sign-in-page.php");
        // showModal("Your account has been disabled due to multiple failed login attempts. Please contact support.");
    }

    function showModal($message) {
        echo '<script type="text/javascript">
                $(document).ready(function() {
                    $("#alertMessage").text("' . $message . '");
                    $("#alertModal").modal("show");

                    $("#alertModal").on("hidden.bs.modal", function () {

                        window.location.href = "sign-in-page.php";
                        
                    });
                });
              </script>';
    }
    ?>
</body>
</html>
