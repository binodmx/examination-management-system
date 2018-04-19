<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign Up
        </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>
        <div class="signupform">
            <form action="index.php" method='POST'>
                Index no: <input type="text" name="id" required><br>
                Full Name: <input type="text" name="firstname" required><br>
                Email: <input type="email" name="email" required><br>
                Mobile: <input type="number" name="tel" required maxlength="10"><br>
                Password: <input type="password" name="pwd1" required><br>
                Confirm password: <input type="password" name="pwd2" required><br>

                <input type="submit" value="Sign Up">
            </form>
        </div>

    </body>
</html>
