<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>EMS - UoM</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php
            if(isset($_GET['msg']) && $_GET['msg'] == 'updatesuccessful'){echo "<script type='text/javascript'>alert('Update successful!');</script>";}
            if(isset($_GET['msg']) && $_GET['msg'] == 'signinsuccessful'){echo "<script type='text/javascript'>alert('Sign in successful!');</script>";}
            include_once "header.php";
            if(isset($_GET['status']) && $_GET['status']=="signout"){
                unset($_SESSION['user']);
                session_destroy();
                header("Location:../index.php");
            }else if(isset($_SESSION['user'])){
                echo "<div class='middlediv'></div>";
                include_once "sidebar.php";
            }else{
                header("Location:../signin.php");
            }
            include_once "../footer.php";
        ?>
    </body>
</html>