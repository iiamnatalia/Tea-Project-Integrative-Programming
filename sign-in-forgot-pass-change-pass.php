<?php
    require('database/connections/conx-customer.php');

    $email = $_SESSION['user_email'];

    $sqlFetch = "SELECT * FROM users WHERE user_email = ?";
    $stmt = $pdo->prepare($sqlFetch);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user_fname'] = $user['user_fname'];
    $_SESSION['user_lname'] = $user['user_lname'];

    $_SESSION['forgot_pass'] = "Yes";

    $user_id = $user['user_id'];

    if (isset($_POST['old_pass']) && isset($_POST['new_pass'])) {
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];

        if ($user && password_verify($old_pass, $user['user_pass'])) {

            if (password_verify($new_pass, $user['user_pass'])) {
                $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Failed to Update Password")';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$user_id]);

                echo '<script type="text/javascript">
                    alert("The new password you entered is same with your old password. Please try again!");
                    window.location.href = "forgot_pass_change_pass.php";
                </script>';
            } else {
                $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

                $sqlUpdatePass = "UPDATE `users` SET `user_pass`= ? WHERE user_id = ?";
                $stmt = $pdo->prepare($sqlUpdatePass);
                $stmt->execute([$new_pass, $user_id]);

                $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Successfully Updated Password")';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$user_id]);

                echo '<script type="text/javascript">
                    alert("You password has been successfully changed.");
                    window.location.href = "index.php";
                </script>';
            }
        } else {
            $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Failed to Update Password")';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id]);

            echo '<script type="text/javascript">
                    alert("The old password you entered is incorrect. Please try again.");
                    window.location.href = "forgot_pass_change_pass.php";
                </script>';
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
            margin-top: .5rem;
            margin-bottom: .5rem;
            font-size: 1.7rem;
            color: var(--light-color);
        }

        input[type="text"] {
            text-align: left;
        }
    </style>
</head>
<body>
    <?php include('components/index-header.php'); ?>

    <section class="form-container">
        <form method="post" action="" onsubmit="return validatePassword()">
            <h3>Update Password</h3>

            <p>Please enter your new password.</p>
            <input type="password" class="box" id="new_pass" name="new_pass" placeholder="Enter New Password" required pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{6,}$" title="Password must be at least 6 characters long and contain at least one letter, one number, and one special character.">

            <!-- <p><label for="cnew_pass">Confirm New Password:</label></p> -->
            <input type="password" class="box" id="cnew_pass" name="cnew_pass" placeholder="Confirm New Password" required pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{6,}$" title="Password must be at least 6 characters long and contain at least one letter, one number, and one special character.">

            <p>
                <input type="checkbox" id="show_passwords" onclick="togglePasswords()">
                <label for="show_passwords">Show Passwords</label>
            </p>

            <div class="button-container">
                <input type="submit" id="register" name="verifynow" value="Submit" class="btn">
            </div>
        </form>
    </section>

    <?php include "components/footer.php"; ?>

    <script>
        function togglePasswords() {
            const newPass = document.getElementById('new_pass');
            const confirmNewPass = document.getElementById('cnew_pass');
            const type = newPass.type === 'password' ? 'text' : 'password';
            newPass.type = type;
            confirmNewPass.type = type;
        }

    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
