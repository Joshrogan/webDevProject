<?php include('dbConnection.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Porter Registration</title>
</head>
<body>
    <form method="post" action="register.php">
        username: <input type="text" name="username"><br><br>
        password: <input type="password" name="password"><br><br>
        <button type="submit" name="register">Register</button>
    </form>
    already registered?<a href="login.php">Sign in</a>
</body>
</html>
