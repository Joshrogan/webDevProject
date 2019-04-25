<!--
File: dbConnection.php

Description:

dbConnection handles all the Porter sql db connections that are made through index.php, register.php and login.php
it also handles destroying the session and logging out for the user.
-->

<?php
    session_start();

    $username = "";
    $password = "";

    $db = mysqli_connect('localhost', 'root', '', 'assignment_schema');

    if (isset($_POST['register'])) {
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        if(empty($username) || empty($password)) {
            echo "registration field(s) empty";
        } else {
            $sql = "INSERT INTO Porter (Username, Password) 
                VALUES ('$username', '$password')";
            mysqli_query($db, $sql);
            $result = mysqli_query($db, "SELECT * FROM Porter WHERE Username='$username'") or die("could not do it");
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['Porter_ID'] = $row['Porter_ID'];
            header('location: index.php');
        }
    }

    if (isset($_POST['login'])) {
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        if(empty($username) || empty($password)) {
            echo "login field(s) empty";
        } else {
            $query = "SELECT * FROM Porter WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $username;
                $_SESSION['Porter_ID'] = $row['Porter_ID'];
                header('location: index.php');
            } else {
                echo "username/password is incorrect";
            }
        }
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>
