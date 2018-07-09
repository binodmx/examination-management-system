<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">

        <title>
            EMS - UoM
        </title>
    </head>
    <body>
        <?php 
            include_once "header.php";
            include_once "sidebar.php";
        ?>
    <div class="middlediv">
       <?php
       $lecturer=$_SESSION['user'];
       $modules=$lecturer->getModules();
       foreach($modules as $module){
           echo '<a href="displayres.php?module='.$module.'">'.$module.'</a><br>';
       }
       ?>

    </div>

        
        
        <?php include_once "footer.php"; ?>
    </body>
    </html>