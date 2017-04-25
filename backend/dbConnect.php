<?php

$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "police_app";

// Create connection
$conn = new mysqli($server_name, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>