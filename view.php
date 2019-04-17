<?php session_start(); 
    
    if (empty($_SESSION['username'])) {
        header('location: login.php');
    }

$db = mysqli_connect('localhost', 'root', '', 'assignment_schema');

$result = mysqli_query($db, "SELECT * FROM Students WHERE Porter_ID=".$_SESSION['Porter_ID']." ORDER BY student_id DESC");

?>
<html>
<head>
    <title>View Students</title>
</head>
<body>
<?php if (isset($_SESSION['username'])): ?>
        <a href="index.php">Index</a>
        <a href="view.php">View</a>
        <a href="index.php?logout='1'">Logout</a>
<?php endif ?>

<h2>VIEW STUDENTS</h2>
<a href="add.php">Add Student</a> 
<table>
<tr>
    <td>Student ID</td>
    <td>Porter ID</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Room Number</td>
</tr>
<?php while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['student_id']."</td>";
    echo "<td>".$row['Porter_ID']."</td>";
    echo "<td>".$row['First_Name']."</td>";
    echo "<td>".$row['Last_Name']."</td>";
    echo "<td>".$row['Room_Number']."</td>";
    echo "<td><a href=\"edit.php?student_id=$row[student_id]\">Edit</a>
              <a href=\"delete.php?student_id=$row[student_id]\">Delete</a>
        </td>";
}
?>
</table>
</body>
</html>
