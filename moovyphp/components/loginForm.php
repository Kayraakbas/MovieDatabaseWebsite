<?php
// Initialize error variables
$usernameErr = $passwordErr = "";
$username = $password = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $username = trim($_POST["uname"]);
    $password = trim($_POST["upassword"]);

    // Check if username is empty
    if (empty($username)) {
        $usernameErr = "Username is required";
    }

    // Check if password is empty
    if (empty($password)) {
        $passwordErr = "Password is required";
    }

    // Proceed if no errors
    if (empty($usernameErr) && empty($passwordErr)) {
        // Include database connection
        include("db_config.php");

        // Prepare SQL query to fetch the user from the database
        $sql = "SELECT id, username, email, password FROM users WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);  // Bind the username parameter
            $stmt->execute();
            $stmt->store_result();

            // Check if user exists
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $db_username, $db_email, $db_password);
                $stmt->fetch();

                // Verify the password
                if (password_verify($password, $db_password)) {
                    // Password is correct, start a session
                    session_start();
                    $_SESSION['user_id'] = $id;
                    $_SESSION['username'] = $db_username;
                    $_SESSION['email'] = $db_email;

                    // Redirect to the dashboard or home page after successful login
                    header("Location: /index.php");  // Modify the path as necessary
                    exit();
                } else {
                    $passwordErr = "Invalid password";
                }
            } else {
                $usernameErr = "No user found with that username";
            }
            $stmt->close();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .login-container {
            width: 25%;
            height: 70%;
            border-radius: 20px;
            background-color: #000;
            padding: 20px;
            margin: 0 auto;
            margin-top: 200px;
        }
        .title-label1 { color: #fff; }
        .title-label3 { color: #fff; margin: 0; padding: 0; }
        body { font-family: Arial; margin: 0 auto; background-color: #2c2c2c; }
        .register-login-button {
            background-color: #2c2c2c;
            border: none;
            border-radius: 20px;
            text-align: center;
            transition-duration: 0.5s;
            padding: 10px 30px;
            cursor: pointer;
            color: #fff;
            margin-top: 5%;
            font-weight: bold;
        }
        .register-login-button:hover { background-color: rgb(102, 255, 255); color: #000; }
        .register-login-input[type="text"], .register-login-input[type="password"] {
            width: 92%; height: 20%; padding: 12px; border-radius: 3px; transition: 0.5s; outline: none;
        }
        .register-login-button[type="text"]:focus, .register-login-button[type="password"]:focus {
            border: 2px solid #2c2c2c
        }
    </style>
</head>
<body>
    <blockquote>
        <div class="login-container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1 class="title-label1"> Login</h1>
                
                <p class="title-label3"> Username </p><br>
                <input class="register-login-input" type="text" name="uname" placeholder="User Name" value="<?php echo $username; ?>"><br><br>
                <span class="error" style="color: white; font-size: 0.8em;"><?php echo $usernameErr; ?></span><br><br>

                <p class="title-label3"> Password </p><br>
                <input class="register-login-input" type="password" name="upassword" placeholder="Password"><br><br>
                <span class="error" style="color: white; font-size: 0.8em;"><?php echo $passwordErr; ?></span><br><br>

                <input class="register-login-button" type="submit" name="submitButton" value="Login">
            </form>
        </div>
    </blockquote>
</body>
</html>
