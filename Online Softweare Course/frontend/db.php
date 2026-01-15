<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "studentapp";  // <--- make sure this EXACTLY matches your DB name

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
