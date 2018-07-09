<?php
include "../classes/user.php";
include "../classes/student.php";
include "../classes/lecturer.php";
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
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../plugin/tinymce/init-tinymce.js"></script>
<body>
<?php
include_once 'header.php';
include_once 'sidebar.php';
?>
    <div class="s_quries middlediv">
        <?php
        include_once '../dbconnect.php';
        $lecturer=$_SESSION['user'];
        $modules=$lecturer->getModules();
        $sqlArray = join(',', $modules) ;
        $sql="SELECT * FROM  absensemessages WHERE module IN('$sqlArray')  ";
        $result=mysqli_query($conn,$sql);
        $resultcheck=mysqli_num_rows($result);
        $messagList=array();
        if($resultcheck>0){
            while($row=mysqli_fetch_assoc($result)){
                array_push($messagList,$row);
            }

        }
        foreach ($messagList as $row){
            echo "<div><textarea class='tinymce'>";
            echo unserialize($row['student'])->getID();
            echo $row['message'];
            echo "</textarea>";
            echo "</div>";
        }

        ?>
    </div>
</body>
</html>
