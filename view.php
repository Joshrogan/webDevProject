<!-- 
File: view.php

Description:
This page checks authentication then displays a list of all the students belonging to that users Porter ID
via a table
-->

<?php session_start(); 
    
    if (empty($_SESSION['username'])) {
        header('location: login.php');
    }

$db = mysqli_connect('localhost', 'root', '', 'assignment_schema');

$result = mysqli_query($db, "SELECT * FROM Students WHERE Porter_ID=".$_SESSION['Porter_ID']." ORDER BY student_id DESC");

?>
<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php if (isset($_SESSION['username'])): ?>
    <div class="topnav">
        <a href="index.php">Index</a>
        <a href="view.php">View</a>
        <a href="index.php?logout='1'">Logout</a>
    </div>
<?php endif ?>

<h2>VIEW STUDENTS</h2>
<a href="add.php" class="button">Add Student</a> 
<table>
<tr>
    <th>Student ID</th>
    <th>Porter ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Room Number</th>
    <th>Update/Delete</th>
</tr>
<?php while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['student_id']."</td>";
    echo "<td>".$row['Porter_ID']."</td>";
    echo "<td>".$row['First_Name']."</td>";
    echo "<td>".$row['Last_Name']."</td>";
    echo "<td>".$row['Room_Number']."</td>";
    echo "<td><a href=\"edit.php?student_id=$row[student_id]\">Edit</a> |
              <a href=\"delete.php?student_id=$row[student_id]\">Delete</a>
        </td>";
}
?>
</table>
</body>
</html>
