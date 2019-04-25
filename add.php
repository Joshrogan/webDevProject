<!-- 
File: add.php

Description:

add.php starts the session, makes sure the user is authenticated and logged in before displaying the page.

Once they are authhenticated it displays the html page and form, when the user submits this form it's sends itself a post request
with the information required. It verifies this then inserts it into the user's own Student database 
-->

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
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
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
    
    <form action="add.php" method="post">
        <table>
            <tr>
                <th></th>
                <th>Add Student</th>
            </tr>
            <tr>
                <td>Student ID</td>
                <td><input type="text" name="Student_ID"></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="First_Name"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="Last_Name"></td>
            </tr>
            <tr>
                <td>Room Number</td>
                <td><input type="text" name="Room_Number"></td>
            </tr>
            <tr>
                <td></td> 
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>

