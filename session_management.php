<?php
// Function to create a new session entry in the sessions table
function createNewSession($user_id) {
    // Connect to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wisestay_db1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generate a new session ID
    $user_session_id = session_id();

    // Escape values to prevent SQL injection
$user_session_id = isset($user_session_id) ? mysqli_real_escape_string($conn, $user_session_id) : "";
$user_id = isset($user_id) ? mysqli_real_escape_string($conn, $user_id) : "";
$expiry_time = isset($expiry_time) ? mysqli_real_escape_string($conn, $expiry_time) : "";


    // Insert the new session entry into the sessions table
    $sql = "INSERT INTO sessions (session_id, user_id, expiry_time) VALUES ('$user_session_id', '$user_id', '$expiry_time')";

    if ($conn->query($sql) === TRUE) {
        echo "New session created successfully";
    } else {
        echo "Error creating session: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
