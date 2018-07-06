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
            if(isset($_GET['status']) && $_GET['status']=="signout"){
                unset($_SESSION['adminid']);
                session_destroy();
                header("Location:../index.php");
            }else if(isset($_SESSION['adminid'])){
                echo "<div class='middlediv'></div>";
                include_once "sidebar.php";
            
            }else{
                header("Location:../signin.php");
            }
            include_once "footer.php";
        ?>
    </body>
</html>