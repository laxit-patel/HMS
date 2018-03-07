<?php
//only use this configuration while using 000webhost forhosting

$servername = "localhost";
$username = "id4664301_admin";
$password = "admin@123";
$db = "id4664301_hms";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>