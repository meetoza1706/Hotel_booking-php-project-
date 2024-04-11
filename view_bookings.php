<?php
session_start();

// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // User is logged in
    $userId = $_SESSION['user_id'];
    echo "User ID: $userId";
} 
else {
    // User is not logged in
    echo "User is not logged in";
    header("Location: http://localhost/hotel_booking_web/login.php");
    exit;
}
?>