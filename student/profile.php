<!DOCTYPE html>
<html>
    <head>
        <title>
            EMS - UoM
        </title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php include_once "header.php"; ?>
        <?php $studentid="160278M" ?>
        <div class="middle_bar">
            <?php $link1="registermodules.php?studentid=".$studentid ?>
            <?php $link2="results.php?sem=&studentid=".$studentid ?>
            <p><a href="#">Edit Profile</a></p>
        	<p><a href=<?php echo $link1?>>Register for modules</a></p>
        	<p><a href="#">View registered modules</a></p>
        	<p><a href=<?php echo $link2?>>View results</a></p>
            <p><a href="#">Inform absense details</a></p>
            <p><a href="#">Apply for recorrection</a></p>
            <p><a href="#">Apply for repeat exams</a></p>
        	<p><a href="#">Apply for convocation</a></p>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>