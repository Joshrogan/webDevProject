<?php session_start(); 

    if (empty($_SESSION['username'])) {
         header('location: login.php');
    }

?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'assignment_schema');

if(isset($_POST['update'])) {
    $student_id = $_POST['student_id'];
    $Porter_ID = $_POST['Porter_ID'];
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Room_Number = $_POST['Room_Number'];

    if(empty($Porter_ID) || empty($First_Name) || empty($Last_Name) || empty($Room_Number)) {
        echo "fill in fields";
    } else {
        $result = mysqli_query($db, "UPDATE Students SET Porter_ID='$Porter_ID', First_Name ='$First_Name', Last_Name='$Last_Name', Room_Number='$Room_Number' WHERE student_id=$student_id");
        header("location: view.php");
    }
} 
?>
<!DOCTYPE html>
<html>
<?php if (isset($_SESSION['username'])): ?>
    <div class="topnav">
        <a href="index.php">Index</a>
        <a href="view.php">View</a>
        <a href="index.php?logout='1'">Logout</a>
    </div>
<?php endif ?>
<head>
    <title>Edit Student</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
$student_id = $_GET['student_id'];

$result = mysqli_query($db, "SELECT * FROM Students WHERE student_id =$student_id");

while($row = mysqli_fetch_assoc($result)) {
    $Porter_ID = $row['Porter_ID'];
    $First_Name = $row['First_Name'];
    $Last_Name = $row['Last_Name'];
    $Room_Number = $row['Room_Number'];
}
?>

<form method="post" action="edit.php">
    <table>
        <tr>
            <td>Student ID</td>
            <td><input type="text" name="student_id" value="<?php echo $student_id;?>"></td>
        </tr>
        <tr>
            <td>Porter ID</td>
            <td><input type="text" name="Porter_ID" value="<?php echo $Porter_ID;?>"></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="First_Name" value="<?php echo $First_Name;?>"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="Last_Name" value="<?php echo $Last_Name;?>"></td>
        </tr>
        <tr>
            <td>Room Number</td>
            <td><input type="text" name="Room_Number" value="<?php echo $Room_Number;?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="student_id" value=<?php echo $_GET['student_id'];?>></td>
            <td><input type ="submit" name="update" value="update"></td>
        </tr>
    </table>
</form>
</body>
</html>
