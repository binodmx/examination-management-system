<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign In
        </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>
        
        <div class="signin_div">
            <form action="index.php" method="POST" class="signin_form">
                <input type="text" placeholder="Index No" name="index" maxlength="7"><br>
                <input type="password" placeholder="Password" name="pwd"><br>
                <button type="submit" name="submit"> Sign In</button><br>
            </form>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>
