<?php
$db = "mydb";
$dsn = "mysql:host=localhost";
$user = "root";
$pass = "";
$dbh = new PDO($dsn, $user, $pass);
print("Connected to database <br>");
?>