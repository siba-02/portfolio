<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];

$sql = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Registration successful!'); window.location.href='index.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
