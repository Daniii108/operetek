<?php
// Start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Operett</title>    
</head>
<body>
    <h1 id="h1">Hopsasszé Operettszínház</h1>
    <div class="container">
      <div>
        <h3>Társulatunk</h3>
        <p>1990. óta működik intézményünk mai nevén, melynek elődje a Takarmányágazati Szakszervezet Művelődési Központja. Büszkék vagyunk rá, hogy az utóbbi 250 évben zajlottak előadások, próbák ebben a Kiskocsi utcai épületben - habár kisebb-nagyobb kihagyások megakasztották szüntelenségét. Az épület már számtalan felújításon és helyreállításon esett át az alapkőletétel óta.</p>
        <br>
        <!-- <img src="pic.jpg" alt="Girl in a jacket" width="500" height="600"> -->
        <h3>Operett</h3>
        <p>Az operett könnyed dallamvilágú, humorral átszőtt, zenés színpadi műfaj. Az 1840-es évek
        Franciaországában született, ahonnan rövid időn belül – Bécsen keresztül – hazánkba is eljutott.</p>   
      </div>
    </div>
    
        <div id="bg-img">
        </div>


        <?php
        // Check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // User is logged in, display welcome message
            echo "<h1 style='color: white;'>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
            // You can add more protected content here
        } //else {
            // User is not logged in, display a different message or redirect
            //echo "<h1>Please log in to view this page.</h1>";
            // Optionally, redirect to login page
            // header('Location: login.php');
            // exit;
        //}
        ?>

        
        <!-- <div id="loginBtn" class="button" onclick="login()">Bejelentkezés</div> -->
        <form action="login.php" method="get">
            <?php
            // Check if the user is logged in
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                // User is logged in, display welcome message
                // You can add more protected content here
            } else {
                // User is not logged in, display a different message or redirect
                echo '<button class="button" type="submit">Bejelentkezés</button>';
            }
            ?>
        </form>
        <form action="logout.php" method="post">
            <?php
            // Check if the user is logged in
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                // User is logged in, display welcome message
                echo '<button class="button" type="submit" name="logout">Kijelentkezés</button>';
                // You can add more protected content here
            }
            ?>
        </form>
        
        <script src="script.js"></script>
</body>
</html>