<?php include('dbConnection.php'); 

    if (empty($_SESSION['username'])) {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Home Page</title>
</head>
<body>
<?php if (isset($_SESSION['username'])): ?>
    <div class="topnav">
        <a href="index.php">Index</a>
        <a href="view.php">View</a>
        <a href="index.php?logout='1'">Logout</a>
    </div>
    
    <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
    <h2>Porter_ID: <?php echo $_SESSION['Porter_ID']; ?></h2>
    <p>Click View in the Navbar to look at view your students, also create, delete and update your students from that view</p>
<?php endif ?>      
</body>
</html>
