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
     <?php if (isset($_SESSION['valid'])): ?>
        <?php
            echo $_SESSION['valid'];
            unset($_SESSION['valid']);
        ?>
    <?php endif ?>

    <?php if (isset($_SESSION['username'])): ?>
        <?php echo $_SESSION['username']; ?>
        <a href="index.php?logout='1'">Logout</a>
    <?php endif ?>
    
</body>
</html>
