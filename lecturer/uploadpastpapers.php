<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            EMS - UoM
        </title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php
            include_once "header.php";
			include_once "sidebar.php";
			echo 
			"<form>
				<input type='file'>
			</form>";
            include_once "footer.php";
        ?>
    </body>
</html>