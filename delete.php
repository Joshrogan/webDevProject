/* File: delete.php
 * Description:
 *
 * delete.php is called form the view.php page, once the user is authenticated it connects to the database
 * and deletes the specific student
 *
 * */
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
