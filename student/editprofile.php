<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Edit Profile
        </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php
            // Session availability
            if(!isset($_SESSION['studentid'])){header("Location:../index.php");}
            $id=$_SESSION['studentid'];

            include_once "header.php";
            include_once "sidebar.php";   
            include_once "../dbconnect.php";

            if(isset($_POST['status'])){
                // Update data
                $name=$_POST['name'];
                $mobile=$_POST['mobile'];
                $email=$_POST['email'];
                $password=$_POST['pwd2'];
                $updatesql = "UPDATE students SET name='$name', email='$email', mobile='$mobile' WHERE id='$id'";
                if($conn->query($updatesql)===TRUE){header("Location:profile.php");}
            }else{
                // Get data
                $studentsql = "SELECT id, name, mobile, email, password FROM students WHERE id='$id'";
                $studentquery = $conn->query($studentsql);
                $studentqueryrow = $studentquery->fetch_assoc();
                // View data
                echo 
                    "<div class='middlediv'>
                        <form action='editprofile.php' method='POST'>
                            Index no: <input type='text' name='id' value='".$studentqueryrow['id']."' disabled><br>
                            Full Name: <input type='text' name='name' value='".$studentqueryrow['name']."'><br>
                            Email: <input type='email' name='email' value='".$studentqueryrow['email']."'><br>
                            Mobile: <input type='number' name='mobile' value='".$studentqueryrow['mobile']."' maxlength='10'><br>
                            Current Password: <input type='password' name='pwd1'><br>
                            New password: <input type='password' name='pwd2'><br>
                            Confirm password: <input type='password' name='pwd2'><br>
                            <input type='text' name='status' value='update' hidden>
                            <input type='submit' value='Update Profile'>
                        </form>
                    </div>";
            }
        ?>

    </body>
</html>
