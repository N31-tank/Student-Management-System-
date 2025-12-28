<?php
include 'db.php';

// Fetch students
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>

   <link rel="stylesheet" href="style.css">
 
</head>

<body>

<h1>Student Management System</h1>

<!-- Student Form -->

<form id="studentForm" action="save.php" method="POST">
    <input type="text" name="name" placeholder="Enter Name" required><br>
    <input type="email" name="email" placeholder="Enter Email" required><br>
    <input type="text" name="course" placeholder="Enter Course" required><br>
    <button type="submit">Save</button>
</form>

<h2>Student List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>COURSE</th>
            <th>ACTIONS</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td class="actions">
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" 
                   class="delete-btn"
                   onclick="return confirm('Are you sure you want to delete this student?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
