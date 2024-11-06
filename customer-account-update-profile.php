<?php 
    require('database/connections/conx-customer.php');

    $user = $_SESSION['user'];

    $user_id = $user['user_id'];
    $user_type = $user['user_type'];


    $user_fname = $_POST['fname'];
    $user_lname = $_POST['lname'];
    $user_num = $_POST['num'];
    $name = "_" .$user_fname . " " . $user_lname;

    $target_dir = "assets/profile-pictures/";
    $uploadOk = 1;

    // Retrieve old user information from the database
    $sql_old = "SELECT * FROM users WHERE user_id = ?";
    $stmt_old = $pdo->prepare($sql_old);
    $stmt_old->execute([$user_id]);
    $old_user_info = $stmt_old->fetch(PDO::FETCH_ASSOC);

    // Check if profile picture is being updated
    $profile_pic_updated = isset($_FILES["profile_pic"]["name"]) && !empty($_FILES["profile_pic"]["name"]);

    // Check if any user information is being updated

    $fname_updated = $old_user_info['user_fname'] != $user_fname;
    $lname_updated = $old_user_info['user_lname'] != $user_lname;
    $num_updated = $old_user_info['user_num'] != $user_num;


    if (isset($_FILES["profile_pic"]["name"]) && !empty($_FILES["profile_pic"]["name"])) {
        $imageFileType = strtolower(pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION));
        $timestamp = str_replace(':', '-', date('Y-m-d H:i:s'));
        $target_file = $target_dir . "_" . $user_id . $name ."_profile_pic_" . $timestamp . ".". $imageFileType; //pwede ibahin file name if ganito
    
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["profile_user_pic"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo '<script type="text/javascript">
                alert("File is not an image.");
                window.location.href = "customer-account.php";
            </script>';
                $uploadOk = 0;
            }
        }
    
        // Check file size
        if ($_FILES["profile_pic"]["size"] > 10000000) { // 10 MB in bytes
            echo '<script type="text/javascript">
                alert("Sorry, your file is too large.");
                window.location.href = "customer-account.php";
            </script>';
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp" ) {
            // echo "Sorry, only JPG, JPEG, PNG, WEBP, & GIF files are allowed.";
            echo '<script type="text/javascript">
                    alert("Sorry, only JPG, JPEG, PNG, WEBP, & GIF files are allowed. Please try again.");
                    window.location.href = "customer-account.php";
                </script>';
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            echo '<script type="text/javascript">
            alert("Sorry, your file was not uploaded.");
            window.location.href = "customer-account.php";
        </script>';
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Updated Profile Picture")';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$user_id]);

                $sqlUpdateQuery = "UPDATE `users` SET `user_pic`= ? WHERE user_id = ?";
                $stmt = $pdo->prepare($sqlUpdateQuery);
                $stmt->execute([$target_file,  $user_id]);

                $_SESSION['user']['user_pic'] = $target_file;
            }
        }
    }
    
    if ($fname_updated || $lname_updated || $num_updated) {
        if ($fname_updated) {
            $sqlUpdateQuery = "UPDATE `users` SET `user_fname`= ? WHERE user_id = ?";
            $stmt = $pdo->prepare($sqlUpdateQuery);
            $stmt->execute([$user_fname, $user_id]);

            $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Updated First Name")';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id]);
        }
        if ($lname_updated) {
            $sqlUpdateQuery = "UPDATE `users` SET `user_lname`= ? WHERE user_id = ?";
            $stmt = $pdo->prepare($sqlUpdateQuery);
            $stmt->execute([$user_lname, $user_id]);

            $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Updated Last Name")';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id]);
        }
        if ($num_updated) {
            $sqlUpdateQuery = "UPDATE `users` SET `user_num`= ? WHERE user_id = ?";
            $stmt = $pdo->prepare($sqlUpdateQuery);
            $stmt->execute([$user_num,  $user_id]);

            $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Updated Contact Number")';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id]);
        }

        if ($user_type == 1) {
            echo '<script type="text/javascript">
            alert("Account profile has been successfully updated.");
            window.location.href = "customer-account.php";
        </script>';
        }else {
            echo '<script type="text/javascript">
            alert("Account profile has been successfully updated.");
            window.location.href = "staff_user_account.php";
        </script>';
        }

    }
    else {
        if ($user_type == 1) {
            echo '<script type="text/javascript">
            alert("Account profile has been successfully updated.");
            window.location.href = "customer-account.php";
        </script>';
        }else {
            echo '<script type="text/javascript">
            alert("Account profile has been successfully updated.");
            window.location.href = "staff_user_account.php";
        </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfully Updated Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Notification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalMessage">
                Account profile has been successfully updated.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modalRedirectBtn">OK</button>
            </div>
        </div>
    </div>
</div>

    
</body>
</html>