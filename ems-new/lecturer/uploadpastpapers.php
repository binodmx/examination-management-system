<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            EMS - UoM
        </title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <link rel="stylesheet" type="text/css" href="lecturer.css">
    </head>
    <body>
        <?php
            include_once "header.php";
			include_once "sidebar.php";
			
            
            if (isset($_POST['submit'])) {
                $file =$_FILES['file'];
               $name = $_FILES['file']['name'];
                $tmp_name = $_FILES['file']['tmp_name'];  
                $fileError =$_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
                if ($fileError ===0) {
                   /* $fileNameNew = uniqid('',true);*/
                    $location = 'uploadsPastPapers/';
                    if (move_uploaded_file($tmp_name,$location.$name)) {
                        $success ="Uploaded!";
                        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
                       /* echo 'Uploaded!';*/
                    }
                   /* header("location: profile.php?uploasuccessfull");*/

                }else{
                    $success="There was an error uploading your file!";
                    echo "<script type='text/javascript'>alert('There was an error uploading your file!')</script>";
                    /*echo "There was an error uploading your file!";*/
                }
            }
           /*if (isset($success)) {
               echo "<div class='success;>".$success."</div>";
           }
*/
        

        ?>


        <div class="middlediv">
        <form action="uploadpastpapers.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file"><br><br>
            <input type="submit" name="submit" value="Upload"> 

        </form>
        </div>
        <?php 
        include_once "footer.php";
         ?>
    </body>
</html>