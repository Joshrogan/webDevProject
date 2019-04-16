<?php include('dbConnection.php'); ?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
</head>
<body>
    <form method="post" action="login.php">
        username: <input type="text" name="username"><br><br>
        password: <input type="password" name="password"><br><br>
         <button type="submit" name="login">Login</button>
    </form>
    Haven't Registered? <a href="register.php">Sign up</a>
</body>
</html>

