<?php
session_start();
require_once 'db_conection.php';


if (isset($_SESSION['isLoggedIn'])) {
    header("Location: dashboard.php");
    exit();
}


if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    
    $code = generateRandomCode(6);

    
    $conn = openConection();
    $hashedCode = password_hash($code, PASSWORD_DEFAULT);
    $updateQuery = "UPDATE users SET reset_token = '$hashedCode' WHERE email = '$email'";
    $conn->query($updateQuery);
    closeConection($conn);

    
    $to = $email;
    $subject = "Password Reset Code";
    $message = "Your password reset code is: $code";
    $headers = "From: CVeasy team";

    if (mail($to, $subject, $message, $headers)) {
        $_SESSION['reset_email'] = $email;
        header("Location: reset_password.php");
        exit();
    } else {
        $error = "Failed to send email. Please try again.";
    }
}


function generateRandomCode($length) {
    $characters = '0123456789';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $code .= $characters[$index];
    }

    return $code;
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Style4.css">
    <title>Forgot Password</title>
</head>
<body>
    <h2 class="title_cv_form">Forgot Password</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit" class="seemore_main_button" name="submit">Submit</button>
    </form>
</body>
</html>
