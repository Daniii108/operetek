<?php
require_once('config.php');
?>

<?php
session_start();

// Database configuration
$servername = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_name = "operett";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL to check the user
    $sql = "SELECT id FROM 'userdata' WHERE nev = '$username' AND jelszo = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful - set session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Redirect to a welcome page
        exit;
    } else {
        echo "Invalid username or password, please register if you don`t have a profile";
    }

    $conn->close();
}
?>

<form action="login.php" method="post">
Felhasználónév: <input type="text" name="username"><br>
Jelszó: <input type="password" name="password"><br>
    <input class="btn btn-primary" type="submit" value="Bejelentkezés">
</form>

<?php
if(isset($_POST['registrate'])){
    // Felhasználó regisztrációja
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];
    $email = $_POST['email'];

$sql = "INSERT INTO userdata (nev, jelszo, email) VALUES (?,?,?)";
$stmtinsert = $db->prepare($sql);
$result = $stmtinsert->execute([$newUsername, $newPassword, $email]);
    if($result){
    echo "Sikeres regisztráció. Jelentkezz be!";
    }
    else {
        echo "Hiba történt az adatok mentésekor";
    }
}

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

if ($conn->query($sql) === FALSE) {
    echo "Hiba: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<form action="login.php" method="post">
    Felhasználónév: <input type="text" name="newUsername"><br>
    Jelszó: <input type="password" name="newPassword"><br>
    Email-cím: <input type="email" name="email"><br>
    <input class="btn btn-primary" type="submit" name="registrate" value="Regisztráció">
</form>
