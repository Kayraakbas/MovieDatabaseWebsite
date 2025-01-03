<?php
// Initialize variables for error messages and form values
$username = $email = $password = $confirm_password = "";
$usernameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";

// Database connection
$servername = "localhost";
$dbusername = "root";
$dbpassword = "12QWaszx";
$dbname = "demo";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty($_POST["uname"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["uname"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate password
    if (empty($_POST["upassword"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["upassword"]);
        if (strlen($password) < 6) {
            $passwordErr = "Password must be at least 6 characters";
        }
    }

    // Validate confirm password
    if (empty($_POST["confirm_password"])) {
        $confirmPasswordErr = "Please confirm your password";
    } else {
        $confirm_password = test_input($_POST["confirm_password"]);
        if ($password !== $confirm_password) {
            $confirmPasswordErr = "Passwords do not match";
        }
    }

    // If no errors, hash the password and insert into the database
    if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query to insert user
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        // Execute and check for errors
        if ($stmt->execute()) {
			// Redirect to index.php or login.php based on button clicked
			if (isset($_POST['registerButton'])) {
				header("Location: /moovyphp/index.php");  // Redirect to index.php
				exit();
			}
		} else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}

// Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .register-container {
            width: 25%;
            height: 70%;
            border-radius: 20px;
            background-color: #000;
            padding: 20px;
            margin: 0 auto;
            margin-top: 200px;
        }
        .title-label1{
            color: #fff;
        }
        .title-label3{
            color: #fff;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial;
            margin: 0 auto;
            background-color: #2c2c2c;
        }
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
        .register-login-button:hover {
            background-color: rgb(102, 255, 255);
            color: #000;
        }
        .register-login-input[type="text"],
        .register-login-input[type="password"] {
            width: 92%;
            height: 20%;
            padding: 12px;
            border-radius: 3px;
            transition: 0.5s;
            outline: none;
        }
        .register-login-button[type="text"]:focus,
        .register-login-button[type="password"]:focus {
            border: 2px solid #2c2c2c
        }
    </style>
</head>
<body>
    <blockquote>
        <div class="register-container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1 class="title-label1"> Register:</h1>
                
                <p class="title-label3"> User Name </p><br>
                <input class="register-login-input" type="text" name="uname" placeholder="User Name" value="<?php echo $username; ?>">
                <span class="error" style="color: white; font-size: 0.8em;"><?php echo $usernameErr;?></span><br><br>

                <p class="title-label3"> E-mail </p><br>
                <input class="register-login-input" type="text" name="email" placeholder="example@email.com" value="<?php echo $email; ?>">
                <span class="error" style="color: white; font-size: 0.8em;"><?php echo $emailErr;?></span><br><br>

                <p class="title-label3"> New Password </p><br>
                <input class="register-login-input" type="password" name="upassword" placeholder="Password">
                <span class="error" style="color: white; font-size: 0.8em;"><?php echo $passwordErr;?></span><br><br>

                <p class="title-label3"> Confirm Password</p><br>
                <input class="register-login-input" type="password" name="confirm_password" placeholder="Confirm Password">
                <span class="error" style="color: white; font-size: 0.8em;"><?php echo $confirmPasswordErr;?></span><br><br>

                <input class="register-login-button" type="submit" name="registerButton" value="Register">
                <input class="register-login-button" type="button" name="login" value="Login" onClick="window.location='/login.php';" />
            </form>
        </div>
    </blockquote>
</body>
</html>
