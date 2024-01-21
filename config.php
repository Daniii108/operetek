<?php

$db_username = "root";
$db_password = "";
$db_name = "operett";

$db= new PDO('mysql:host=localhost; dbname=' . $db_name . $db_username, $db_password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>