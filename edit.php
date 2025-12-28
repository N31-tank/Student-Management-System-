<?php
include 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Student</h2>

<form id="studentForm" action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    <input type="text" name="name" value="<?= $row['name'] ?>" required><br><br>

    <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>

    <input type="text" name="course" value="<?= $row['course'] ?>" required><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
