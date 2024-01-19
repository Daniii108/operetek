<?php
session_start();

// Database configuration
$servername = "127.0.0.1";
$username = "root"; // Replace with your database username
$password = "root"; // Replace with your database password
$dbname = "operett";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // SQL to check the user
    $sql = "SELECT id FROM users WHERE username = '$user' AND password = '$pass'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful - set session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user;
        header("Location: index.php"); // Redirect to a welcome page
        exit;
    } else {
        echo "Invalid username or password, please register if you don`t have a profile";
    }

    $conn->close();
}
?>

<form action="login.php" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
