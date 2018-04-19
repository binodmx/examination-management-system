<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Edit Profile
        </title>
        <style>
            * {
                box-sizing: border-box;
            }
            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }
            input, select, textarea {
                width: 85%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                float: right;
            }
            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: right;
            }

        </style>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
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
                            <br><br><br><br>    
                            <label>Index no: </label><input type='text' name='id' value='".$studentqueryrow['id']."' disabled><br>
                            <label>Full Name: </label><input type='text' name='name' value='".$studentqueryrow['name']."'><br>
                            <label>Email: </label><input type='email' name='email' value='".$studentqueryrow['email']."'><br>
                            <label>Mobile: </label><input type='number' name='mobile' value='".$studentqueryrow['mobile']."' maxlength='10'><br>
                            <label>Current Password: </label><input type='password' name='pwd1'><br>
                            <label>New password: </label><input type='password' name='pwd2'><br>
                            <label>Confirm password: </label><input type='password' name='pwd2'><br><br>
                            <input type='text' name='status' value='update' hidden>
                            <input type='submit' value='Update Profile'>
                        </form>
                    </div>";
            }
        ?>

    </body>
</html>
