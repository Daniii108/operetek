<!DOCTYPE html>
<html>
<head>
    <title>Comments Page</title>
    <!-- Add any additional head elements here -->
</head>
<body>

<h1>Comments</h1>

<?php
// Database configuration
$servername = "127.0.0.1";
$db_username = "root"; // Replace with your database username
$db_password = ""; // Replace with your database password
$db_name = "operett";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select data from comments table
$sql = "SELECT text FROM comments";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Start the unordered list
    echo "<ul>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row["text"]) . "</li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

</body>
</html>
