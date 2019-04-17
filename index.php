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
        <a href="index.php">Index</a>
        <a href="view.php">View</a>
        <a href="index.php?logout='1'">Logout</a>
        <br>
        Welcome <?php echo $_SESSION['username']; ?>
        Porter_ID: <?php echo $_SESSION['Porter_ID']; ?>
    <?php endif ?>
    <br><br>
    <?php include ('studentConnection.php'); ?>
    <br><br>
       
</body>
</html>
