<?php
include 'db.php';
$result = $conn->query("SELECT * FROM admin");
while($row = $result->fetch_assoc()) {
    echo "Username: " . $row['username'] . " | Password: " . $row['password'] . "<br>";
}
?>
