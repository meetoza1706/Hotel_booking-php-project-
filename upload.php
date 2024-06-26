<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotel</title>
</head>
<body>
    <h2>Add a New Hotel</h2>
    <form action="insert_hotel.php" method="post" enctype="multipart/form-data">
        <label for="name">Hotel Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location"><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

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
