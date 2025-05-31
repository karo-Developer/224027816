<?php
$host = 'localhost';
$db   = 'portfolio';
$user = 'root';
$pass = 'Caro@2240'; // your MySQL password

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
