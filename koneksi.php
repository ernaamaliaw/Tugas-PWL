<?php
$servername = "localhost";
$username = "root";
$password = "";
$myDB="db_erna";
$conn = new mysqli($servername, $username, $password,$myDB);
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
//echo "Connected to DataBase successfully";
?>
