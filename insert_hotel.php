<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wisestay_db1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];

    // Process image upload
    $image = $_FILES['image']['tmp_name'];
    $imgContent = '';

    if (!empty($image)) {
        $imgContent = addslashes(file_get_contents($image));
    } else {
        echo "Error: No image uploaded!";
        exit;
    }

    // Insert data into database
    $sql = "INSERT INTO hotels (name, location, image) VALUES ('$name', '$location', '$imgContent')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
