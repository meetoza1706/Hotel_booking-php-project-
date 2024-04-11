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

<h1 class="heading_text_login">Sign-Up</h1></div>


<form action="sign-up.php" method="post">
<div class="login-container">

    <input type="text" id="username" name="username" placeholder="username" class="username" required>
    <input type="email" id="email" name="email" placeholder="email" class="email" required>
    <input type="text" id="password" name="password" placeholder="password" class="password" required>            
    <input type="text" id="c-password" name="c-password" placeholder="c-password" class="c-password" required>            
    <button type="submit" class="login-btn">Sign-Up</button>

</div>
</form>



</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your database
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "wisestay_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['c-password'];

    // You may want to perform additional validation here

    // Insert user into database
    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
