<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.html');
    exit();
}

// get and trim input
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// debug: uncomment if you want to see POST data (temporary)
// var_dump($_POST); exit();

// prepared statement to prevent injection
$stmt = $conn->prepare("SELECT id FROM admin WHERE username = ? AND password = ? LIMIT 1");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $_SESSION['admin'] = $username;
    $stmt->close();
    header("Location: view_students.php");
    exit();
} else {
    $stmt->close();
    echo "<script>alert('Invalid credentials!'); window.location='login.html';</script>";
    exit();
}
?>
