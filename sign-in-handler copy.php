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
                            header("Location:customer-home.php");
                        }

                        // Log successful login
                        $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Successful Login")';
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$user['user_id']]);
                    }
                }else {
                echo '<script type="text/javascript">
                    alert("You cannot login right now. Your account is currently disabled. Please contact TeaProj. E-Sip to retrieve your account.");
                    window.location.href = "sign-in-page.php";
                  </script>';
                }

            } else if ($failedAttempts >= 5) {
                handleFailedLogin($user, $user_id, $failedAttempts, $pdo);
            }

        } else {
            $formattedDateTime = $user_locked_until->format('M d, Y - h:i:s A');
            echo '<script type="text/javascript">
                    alert("You cannot login right now. Your account is locked until ' . $formattedDateTime . '.");
                    window.location.href = "sign-in-page.php";
                  </script>';
        }
    } else {
        handleFailedLogin($user, $user_id, $failedAttempts, $pdo);
    }
} else {
    echo '<script type="text/javascript">
            alert("Incorrect email or password. Please try again.");
            window.location.href = "sign-in-page.php";
          </script>';
}

function handleFailedLogin($user, $user_id, $failedAttempts, $pdo) {
    $current_time = new DateTime();
    $user_locked_until = new DateTime($user['user_locked_until']);

    if ($user['user_locked_until'] === NULL || $user_locked_until <= $current_time) {
        if ($failedAttempts < 5) {
            logFailedAttempt($user_id, $pdo);
            $remainingAttempts = 5 - ($failedAttempts + 1);
            echo '<script type="text/javascript">
                    alert("Incorrect email or password. Attempts Left: ' . $remainingAttempts . '");
                    window.location.href = "sign-in-page.php";
                  </script>';
        } else if ($failedAttempts < 6) {
            lockAccount($user_id, 5, $pdo);
        } else if ($failedAttempts < 9) {
            lockAccount($user_id, 10, $pdo);
        } else if ($failedAttempts < 12) {
            lockAccount($user_id, 30, $pdo);
        } else {
            disableAccount($user_id, $pdo);
        }
    } else {
        $formattedDateTime = $user_locked_until->format('M d, Y - h:i:s A');
        echo '<script type="text/javascript">
                alert("You cannot login right now. Your account is locked until ' . $formattedDateTime . '.");
                window.location.href = "sign-in-page.php";
              </script>';
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

    echo '<script type="text/javascript">
            alert("Your account is locked for ' . $minutes . ' minutes until ' . $user_locked_until_str . '.");
            window.location.href = "sign-in-page.php";
          </script>';
}

function disableAccount($user_id, $pdo) {
    $sql = "UPDATE users SET user_status = 'Disabled' WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);

    $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Account Disabled")';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);

    echo '<script type="text/javascript">
            alert("Your account has been disabled due to multiple failed login attempts. Please contact support.");
            window.location.href = "sign-in-page.php";
          </script>';
}
?>
