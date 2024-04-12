<!DOCTYPE html>
<html>
    <head>
        <title>WiseStay</title>
        <link rel="stylesheet" href="main.css">
    </head>

    <body>
        <?php
         include "navbar.php";
        ?>
    </body>
</html>








<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    // Display the username
    echo "Welcome, " . $_SESSION['username'] . "!";

    // Other content of the view_bookings.php page goes here
} else {
    // If the user is not logged in, redirect them to the login page
    header("Location: http://localhost/hotel_booking_web/login.php");
    exit();
}
?>
