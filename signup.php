<?php
// Database connection parameters
include 'db_conection.php';
$conn = openConection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the user clicked the sign-up button
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signup'])) {
        // Retrieve the sign-up form inputs
        $email = sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if the email already exists
        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $checkEmailResult = $conn->query($checkEmailQuery);

        if ($checkEmailResult->num_rows > 0) {
            echo "Email already exists";
         
        } else {
            // Insert a new user record with default values for all fields
            $insertQuery = "INSERT INTO users (email, password, firstname, lastname, adress, phone, employment, summary, languages, skillsbuttons, skillsuser, reset_token, user_photo, education)
                VALUES ('$email', '$hashedPassword', '', '', '', '', '', '', '', '', '', '', '','')";

            if ($conn->query($insertQuery) === TRUE) {
                // Redirect to the login page or any other desired page
                header("Location: inceracre.php");
                exit();
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="Style4.css">
    <style>
        .password-toggle {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h2 class="title_cv_form">Sign Up</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <input type="checkbox" class="password-toggle" onclick="togglePasswordVisibility()">Show Password
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" name="confirm-password" id="confirm-password" required>
        </div>
        <button type="submit" class="seemore_main_button" name="signup">Sign Up</button>
    </form>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>
