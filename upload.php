<?php
session_start();

// Database credentials
$hostname = 'localhost';
$dbname = 'wisestay_db1';
$dbuser = 'root';
$dbpass = '';

// Connection string
$dsn = "mysql:host=$hostname;dbname=$dbname;charset=utf8";

// Check if the user is logged in
if (!(isset($_SESSION['authenticated']) && $_SESSION['authenticated'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: http://localhost/login.php");
    exit();
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $location = $_POST["location"];

    // Check if file is uploaded without errors
    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        // Get file name
        $fileName = basename($_FILES["image"]["name"]);

        // Move uploaded file to desired location
        $uploadDir = "uploads/";
        $targetFilePath = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // File uploaded successfully, now insert data into database
            try {
                // Create a new PDO instance
                $pdo = new PDO($dsn, $dbuser, $dbpass);
                
                // Prepare and execute INSERT query to insert data into database
                $stmt = $pdo->prepare("INSERT INTO your_table_name (name, location, image) VALUES (?, ?, ?)");
                $stmt->execute([$name, $location, $fileName]);
                
                // Redirect to a page after successful upload
                header("Location: http://localhost/upload_success.php");
                exit();
            } catch (PDOException $e) {
                // Handle database errors
                echo "Database error: " . $e->getMessage();
                exit();
            }
        } else {
            // Error uploading file
            echo "Error uploading file.";
        }
    } else {
        // File upload error
        echo "File upload error.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Form</title>
</head>
<body>
    <h2>Upload Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
        <label>Location:</label>
        <input type="text" name="location" required><br><br>
        <label>Image:</label>
        <input type="file" name="image" accept="image/*" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
