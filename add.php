<?php session_start(); 

    if (empty($_SESSION['username'])) {
        header('location: login.php');
    }
?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'assignment_schema');

if(isset($_POST['Submit'])) {    
    $Student_ID = $_POST['Student_ID'];
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Room_Number = $_POST['Room_Number'];
    $Porter_ID = $_SESSION['Porter_ID'];

    if(empty($Student_ID)) {
            echo "Fill in Student_ID please"; 
    }

    $result = mysqli_query($db, "INSERT INTO Students(student_id, Porter_ID, First_Name, Last_Name, Room_Number) VALUES('$Student_ID', $Porter_ID, '$First_Name', '$Last_Name', '$Room_Number')");

    header('location: view.php');
}
?>
<html>
<head>
    <title>Add Student</title>
</head> 
<body>
<?php if (isset($_SESSION['username'])): ?>
        <a href="index.php">Index</a>
        <a href="view.php">View</a>
        <a href="index.php?logout='1'">Logout</a>
<?php endif ?>
    <a href="index.php">Home</a> 
    <br/><br/>
    
    <form action="add.php" method="post">
        <table>
            <td>Student ID</td>
                <td><input type="text" name="Student_ID"></td>
            <td>First Name</td>
                <td><input type="text" name="First_Name"></td>
            <td>Last Name</td>
                <td><input type="text" name="Last_Name"></td>
            <td>Room Number</td>
                <td><input type="text" name="Room_Number"></td>
            </tr>
            <tr> 
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>

