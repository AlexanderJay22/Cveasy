<?php
session_start();
require_once 'db_conection.php';


if (isset($_SESSION['isLoggedIn'])) {
    header("Location: dashboard.php");
    exit();
}


if (!isset($_SESSION['reset_email'])) {
    header("Location: forgot_password.php");
    exit();
}


if (isset($_POST['submit'])) {
    $email = $_SESSION['reset_email'];
    $code = $_POST['code'];
    $newPassword = $_POST['new_password'];

   
    $conn = openConection();
    $selectQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedCode = $row['reset_token'];

     
        if (password_verify($code, $hashedCode)) {
        
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
            $conn->query($updateQuery);

         
            $updateQuery = "UPDATE users SET reset_token = NULL WHERE email = '$email'";
            $conn->query($updateQuery);

            $_SESSION['reset_success'] = true;
            header("Location: inceracre.php");
            exit();
        } else {
            $error = "Invalid reset code.";
        }
    } else {
        $error = "Email not found.";
    }

    closeConection($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Style4.css">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="POST" action="">
        <input type="text" name="code" placeholder="Enter reset code" required>
        <input type="password" name="new_password" placeholder="Enter new password" required>
        <button type="submit" class="seemore_main_button" name="submit">Reset Password</button>
    </form>
</body>
</html>
