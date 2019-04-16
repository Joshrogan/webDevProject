<?php session_start(); 

    if (empty($_SESSION['username'])) {
        header('location: login.php');
    }
?>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
<?php
$db = mysqli_connect('localhost', 'root', '', 'assignment_schema');

if(isset($_POST['Submit'])) {    
    $Student_ID = $_POST['Student_ID'];
    $Porter_ID = $_SESSION['Porter_ID'];

    if(empty($Student_ID)) {
            echo "Fill in Student_ID please"; 
    }

    $result = mysqli_query($db, "INSERT INTO Students(student_id, Porter_ID) VALUES('$Student_ID', $Porter_ID)");

    header('location: index.php');
}
?>
</body>
</html>
