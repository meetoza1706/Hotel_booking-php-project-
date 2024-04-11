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
    <input type="text" id="password" name="password" placeholder="password" class="password" required>            
    <button type="submit" class="login-btn">Login</button>
    <p class="text">Don't have a account?</p><a class="sign-up-text" href="sign-up.php">sign-up here!</a>

</div>
</form>

</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve form data (using mysqli_real_escape_string for basic protection)
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if user exists and password matches
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    // Execute the query
    $result = $conn->query($sql);

    // Check for errors
    if (!$result) {
        die("Error executing the query: " . $conn->error);
    }

    // Check if exactly one row is returned
    if ($result->num_rows == 1) {
        // User exists and password matches
        echo "Login successful";
        // You can redirect the user to another page after successful login if needed
        header("Location: index.php");
    } else {
        // User does not exist or password is incorrect
        echo "Invalid username or password";
    }

    // Close connection
    $conn->close();
}
?>


