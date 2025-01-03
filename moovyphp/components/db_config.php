<?php
	/* Database credentials. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
    $servername = "localhost"; // MySQL server address
    $dbusername = "root";        // MySQL username
    $dbpassword = "12QWaszx";  // MySQL password
    $dbname = "demo";          // Database name
	
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>