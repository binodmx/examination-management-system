<?php
include "../classes/user.php";
include "../classes/student.php";
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    include_once 'header.php';
    include_once 'sidebar.php';
    include_once '../footer.php';
    ?>
    <div class="middlediv"><br><br><br>

        <h2 style="margin-left:10px;">Repeat exam requests</h2>
        <?php

        include_once '../dbconnect.php';
        $sql="SELECT * FROM repeatexamrequests";
        $result=mysqli_query($conn,$sql);
        $resultcheck=mysqli_num_rows($result);
        if($resultcheck){
            while($row=mysqli_fetch_assoc($result)){
                $student=unserialize($row['val']);
                $module=$row['module'];
                echo "<div style='border-style: solid'>";
                echo 'Module -'.$module.'<br>';
                echo 'Student ID -'.$student->getID();
                echo "</div><br>";
            }
        }
        ?>
    </div>
</body>
</html>
