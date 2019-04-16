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
        <?php echo $_SESSION['username']; ?>
        <?php echo $_SESSION['Porter_ID']; ?>
        <a href="index.php?logout='1'">Logout</a>
    <?php endif ?>
    <br><br>
    <?php include ('studentConnection.php'); ?>
    
</body>
</html>
