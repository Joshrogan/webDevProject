<?php session_start(); 

    if (empty($_SESSION['username'])) {
        header('location: login.php');
    }
?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'assignment_schema');
$student_id = $_GET['student_id'];
$result = mysqli_query($db, "DELETE FROM Students WHERE student_id='$student_id'");

header("Location:view.php");
?>
