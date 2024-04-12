<!DOCTYPE html>
<html>
    <head>
        <title>WiseStay</title>
        <link rel="stylesheet" href="main.css"> 
        <link rel="icon" href="favcon.png">
    </head>
    <body>
        <?php
            include "navbar.php";
        ?>

<h1 class="heading_text_login">Login</h1></div>

<div class="login-container">

<form action="login.php" method="post">
    <input type="text" id="username" name="username" placeholder="username" class="username" required>
    <input type="password" id="password" name="password" placeholder="password" class="password" required>            
    <button type="submit" class="login-btn">Login</button>
    <p class="text">Don't have a account?</p><a class="sign-up-text" href="sign-up.php">sign-up here!</a>

</div>
</form>

</body>
</html>

<?php

session_start();

// Database credentials
$hostname = 'localhost';
$dbname = 'wisestay_db1';
$dbuser = 'root';
$dbpass = '';

// Connection string
$dsn = "mysql:host=$hostname;dbname=$dbname;charset=utf8";

// Initialize authentication variables
$authUsername = '';
$authPassword = '';
$authenticated = false;

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve entered username and password from the form
    $authUsername = $_POST["username"];
    $authPassword = $_POST["password"];

    try {
        // Create a new PDO instance
        $pdo = new PDO($dsn, $dbuser, $dbpass);

        // Prepare and execute SELECT query to find user with provided credentials
        $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM user WHERE username = ? AND password = ?");
        $stmt->execute([$authUsername, $authPassword]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists with provided credentials
        if ($result['count'] > 0) {
            $authenticated = true;
        }
    } catch (PDOException $e) {
        // Handle connection errors
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
}

// Display authentication result message
if ($authenticated) {
    $_SESSION['username'] = $authUsername; // Store entered username in session
    $_SESSION['authenticated'] = true; // Set authenticated flag in session
    echo "Login Successful <br>";
} else {
    echo "Login Failed <br>";
}

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    echo "You are logged in as " . $_SESSION['username'];
    header ("location: http://localhost/hotel_booking_web/view_bookings.php");
} 

else {
    echo "You are not logged in";
}
?>
