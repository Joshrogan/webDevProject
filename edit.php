<?php session_start(); 

    if (empty($_SESSION['username'])) {
         header('location: login.php');
    }

?>
<html>
<?php
$db = mysqli_connect('localhost', 'root', '', 'assignment_schema');

if(isset($_POST['update'])) {
    $student_id = $_POST['student_id'];
    $Porter_ID = $_POST['Porter_ID'];

    if(empty($Porter_ID)) {
        echo "fill in fields";
    } else {
        $result = mysqli_query($db, "UPDATE Students SET Porter_ID='$Porter_ID' WHERE student_id=$student_id");
        header("location: view.php");
    }
} 
?>
<head>
    <title>Edit Student</title>
</head>
<body>
<?php
$student_id = $_GET['student_id'];

$result = mysqli_query($db, "SELECT * FROM Students WHERE student_id =$student_id");

while($row = mysqli_fetch_assoc($result)) {
    $Porter_ID = $row['Porter_ID'];
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
            <td><input type="hidden" name="student_id" value=<?php echo $_GET['student_id'];?>></td>
            <td><input type ="submit" name="update" value="update"></td>
        </tr>
    </table>
</form>
</body>
</html>
