<?php
// Database connection parameters
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "wisestay_db1"; // Replace with your database name
$table_name = "hotels"; // Replace with your table name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve all rows from the hotels table
$sql = "SELECT * FROM $table_name";

// Execute the query
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display hotel name
        echo "Hotel Name: " . $row["name"] . "<br>";
        // Display location
        echo "Location: " . $row["location"] . "<br>";
        // Display the image (assuming column name is 'image')
        // Output image data directly
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '" alt="Hotel Image" width="200"><br>';
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
