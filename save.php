<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];

$conn->query("INSERT INTO students (name, email, course) 
              VALUES ('$name', '$email', '$course')");

header("Location: index.php");
?>
