<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrodec";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// echo "connected";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    ?>
    

       