<?php include('dbConnection.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Porter Registration</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="topnav">
        <a href="register.php">Sign up</a>
        <a href="login.php">Sign in</a>
        <a href="index.php?logout='1'">Logout</a>
    </div>
    <div class="formCenter">
    	<h2>Register</h2>
	    <form method="post" action="register.php">
	        Username: <input type="text" name="username"><br><br>
	        Password: <input type="password" name="password"><br><br>
	        <button type="submit" name="register">Register</button>
	    </form>
	</div>
</body>
</html>
