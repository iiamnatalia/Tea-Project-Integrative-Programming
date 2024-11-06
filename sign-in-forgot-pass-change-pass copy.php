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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validatePassword() {
            var newPassword = document.getElementById("new_pass").value;
            var confirmNewPassword = document.getElementById("cnew_pass").value;

            if (newPassword !== confirmNewPassword) {
                alert("New password and confirmed new password do not match!");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
    <style>
        body {
            height: 100vh;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            max-width: 400px;
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
        .form-group {
            margin-bottom: 1rem;
        }
        .btn-custom {
            font-size: 1em;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
        }
        .btn-primary-custom {
            background-color: #007bff;
            color: #fff;
        }
        .btn-primary-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="" onsubmit="return validatePassword()">
            <h1>Update Password</h1>
            <div class="form-group">
                <label for="old_pass">Old Password:</label>
                <input type="password" class="form-control" id="old_pass" name="old_pass" placeholder="Enter Old Password" required pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{6,}$" title="Password must be at least 6 characters long and contain at least one letter, one number, and one special character.">
            </div>
            <div class="form-group">
                <label for="new_pass">New Password:</label>
                <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Enter New Password" required pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{6,}$" title="Password must be at least 6 characters long and contain at least one letter, one number, and one special character.">
            </div>
            <div class="form-group">
                <label for="cnew_pass">Confirm New Password:</label>
                <input type="password" class="form-control" id="cnew_pass" name="cnew_pass" placeholder="Confirm New Password" required pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{6,}$" title="Password must be at least 6 characters long and contain at least one letter, one number, and one special character.">
            </div>
            <button type="submit" class="btn btn-primary btn-custom">Update Password</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
