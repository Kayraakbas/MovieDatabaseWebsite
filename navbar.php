<?php
// Start the session or handle any PHP logic you might need (e.g., authentication)
session_start();

// Handle search query (if form is submitted)
$searchQuery = isset($_GET['searchQuery']) ? $_GET['searchQuery'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moovy</title>
    <style>
        .navbar {
            display: flex;
            align-items: first baseline;
            font-family:system-ui;
            font-weight: bold;
            padding: 10px;
            background-color: #111;
            color: white;
            width: 100%;
            height: 55px;
            position: absolute;
            top: 0px;
        }

        .logo {
            display: flex;
            align-items: center;
            flex-grow: 3.5;
        }

        .menu-button {
            background: none;
            border: none;
            color: white;
            font-size: 40px;
            font-weight: bolder;
            cursor: pointer;
            margin-left: 15px;
        }

        .logo h1 {
            font-size: 30px;
            margin: 0;
            
            margin-left: 15px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style-type: none;
            justify-content:center;
            flex-grow: 0.5;
            padding: 0;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            margin-left: 20px;
        
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .search-container {
            display: flex;
            flex-grow: 1;
            align-items: flex-end;
            background-color: #333;
            border-radius: 20px;
            padding: 5px 10px;
            width: 300px;
            margin-right: 20px;
        }

        .search-input {
            background: none;
            border: none;
            color: white;
            padding: 5px;
            font-size: 14px;
            outline: none;
            width: 80%;
            flex-grow: 1;
        }

        .search-button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            width: 20px;
            font-size: 25px;
            margin-left: 50%;
            margin-right: 0%;
            flex-grow: 1;
            
        }

        .login {
            display: flex;
            align-items: center;
        }

        .login a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            margin-left: 10px;
            margin-right: 25px;
        }

        .login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="logo">
        <button class="menu-button">☰</button>
        <h1>Moovy</h1>
    </div>
    
    <ul class="nav-links">
        <li><a href="#">Films</a></li>
        <li><a href="#">Friends</a></li>
    </ul>
    
    <div class="search-container">
        <form action="" method="get">
            <input 
                type="text" 
                name="searchQuery" 
                placeholder="Search movies, tv shows, artist, etc." 
                value="<?php echo htmlspecialchars($searchQuery); ?>"
                class="search-input"
            />
        </form>
        <button type="submit" class="search-button">
            ⍜
        </button>
    </div>
    
    <div class="login">
        <a href="#">Login</a>
    </div>
</nav>

</body>
</html>
