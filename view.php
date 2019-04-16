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
<a href="index.php">index</a> | <a href="index.php">index</a> 
<h2>VIEW STUDENTS</h2>
<table>
<tr>
    <td>Student ID</td>
    <td>Porter ID</td>
</tr>
<?php while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['student_id']."</td>";
    echo "<td>".$row['Porter_ID']."</td>";
    echo "<td><a href=\"edit.php?student_id=$row[student_id]\">Edit</a></td>";
}
?>
</table>
</body>
</html>
