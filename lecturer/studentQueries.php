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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absense Details</title>
</head>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../plugin/tinymce/init-tinymce.js"></script>
<body>
<?php
include_once 'header.php';
include_once 'sidebar.php';
include_once '../footer.php';
?>
    <div class="middlediv">
        <?php
        include_once '../dbconnect.php';
        $lecturer=$_SESSION['user'];
        $modules=$lecturer->getModules();
        $sqlArray = join(',', $modules) ;
        $sql="SELECT * FROM  absensedetails WHERE module IN('$sqlArray')  ";
        $result=mysqli_query($conn,$sql);
        $resultcheck=mysqli_num_rows($result);
        $messagList=array();
        if($resultcheck>0){
            while($row=mysqli_fetch_assoc($result)){
                array_push($messagList,$row);
            }

        }
        echo "<br><br><br><textarea class='tinymce' style='height:200px'>";
        foreach ($messagList as $row){
            echo $row['id'];
            echo $row['message'];
        }
        echo "</textarea>";

        ?>
    </div>
</body>
</html>
