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
                First Name: <input type="text" name="firstname"><br>
                Last Name: <input type="text" name="lastname"><br>
                Address: <input type="text" name="address"><br>
                Email: <input type="email" name="email"><br>
                Telephone: <input type="number" name="tel"><br>
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </body>
</html>
