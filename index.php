<?php include('dbConnection.php'); 

    if (empty($_SESSION['username'])) {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <?php if (isset($_SESSION['username'])): ?>
        Welcome <?php echo $_SESSION['username']; ?>
        Porter_ID: <?php echo $_SESSION['Porter_ID']; ?>
        <a href="index.php?logout='1'">Logout</a>
    <?php endif ?>
    <br><br>
    <?php include ('studentConnection.php'); ?>
    <br><br>
    <a href="add.html">Add Student</a>    
</body>
</html>
