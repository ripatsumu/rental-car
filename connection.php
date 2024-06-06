<?php
$host = 'localhost';
$db = 'car_rental';
$user = 'root';
$password = '';

// Create a connection
$conn = new mysqli($host, $user, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>