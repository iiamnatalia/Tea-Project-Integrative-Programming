<?php
require('database/connections/conx-customer.php');
session_start();  // Ensure session is started

$fname  = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$num = $_POST['num'];
$user_sec_que_1 = $_POST['questions1'];
$user_sec_ans_1 = $_POST['answer1'];
$user_sec_que_2 = $_POST['questions2'];
$user_sec_ans_2 = $_POST['answer2'];

$_SESSION['user_fname'] = $fname;
$_SESSION['user_lname'] = $lname;
$_SESSION['user_email'] = $email;
$_SESSION['user_pass'] = $pass;
$_SESSION['user_num'] = $num;

$checkEmailQuery = "SELECT * FROM `users` WHERE `user_email` = ?";
$stmt = $pdo->prepare($checkEmailQuery);
$stmt->execute([$email]);
$emailExists = $stmt->fetch(PDO::FETCH_ASSOC);

if ($emailExists) {
    $_SESSION['error_message'] = "The email address you entered already exists. Please try another e-mail.";
    header("Location: sign-up-page.php");
    exit();
} else {

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    $user_sec_ans_1_hashed = password_hash($user_sec_ans_1, PASSWORD_DEFAULT);
    $user_sec_ans_2_hashed = password_hash($user_sec_ans_2, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO `users` (
            `user_fname`,
            `user_lname`,
            `user_email`,
            `user_pass`,
            `user_num`, 
            `user_sec_que_1`, 
            `user_sec_ans_1`, 
            `user_sec_que_2`, 
            `user_sec_ans_2`
        ) VALUES (
            :user_fname,
            :user_lname,
            :user_email,
            :user_pass,
            :user_num,
            :user_sec_que_1,
            :user_sec_ans_1,
            :user_sec_que_2,
            :user_sec_ans_2
        )");
    
    // Bind parameters
    $stmt->bindParam(':user_fname', $fname);
    $stmt->bindParam(':user_lname', $lname);
    $stmt->bindParam(':user_email', $email);
    $stmt->bindParam(':user_pass', $hashed_pass);
    $stmt->bindParam(':user_num', $num);
    $stmt->bindParam(':user_sec_que_1', $user_sec_que_1);
    $stmt->bindParam(':user_sec_ans_1', $user_sec_ans_1_hashed);
    $stmt->bindParam(':user_sec_que_2', $user_sec_que_2);
    $stmt->bindParam(':user_sec_ans_2', $user_sec_ans_2_hashed);
    
    $result = $stmt->execute();
    

    if (!$result) {
        $_SESSION['error_message'] = "Error: " . $stmt->errorInfo()[2];
        header("Location: sign-up-page.php");
        exit();
    } else {
        $sqlFetch = "SELECT * FROM users WHERE user_email = ?";
        $stmt = $pdo->prepare($sqlFetch);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $user_id = $user['user_id'];

        $_SESSION['user_email'] = $user['user_email'];

        $sql = 'INSERT INTO audit_trail (user_id, audit_action) VALUES (?, "Account Created")';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);

        // Redirect to the new success page with options
        header("Location: sign-up-verify-email.php");
        exit();
    }
}
