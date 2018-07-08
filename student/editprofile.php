<?php 
    include_once "../classes/student.php";
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Settings</title>
        <style>
            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
                box-sizing: border-box;
            }
            input, select, textarea {
                width: 85%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                float: right;
                box-sizing: border-box;
            }
            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size:16px;
                float: right;
                box-sizing: border-box;
            }
            input[type=submit]:hover {
                opacity: 0.8;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php
            if(isset($_GET['msg']) && $_GET['msg'] == 'updatenotsuccessful'){echo "<script type='text/javascript'>alert('Update not successful!');</script>";}
            if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability
            $student = $_SESSION['user'];
            $id = $student->getID();

            include_once "header.php";
            include_once "sidebar.php";   
            include_once "../footer.php";
            include_once "../dbconnect.php";

            if(isset($_POST['status'])){    // update data
                $student->setName($_POST['name']);
                $student->setMobile($_POST['mobile']);
                $student->setEmail($_POST['email']);
                $val = serialize($student);
                $updatesql = "UPDATE students SET val='$val' WHERE id='$id'";
                $_SESSION['user'] = $student;

                $sql = "SELECT pwd FROM students WHERE id='".$id."'"; 
                $qry = $conn->query($sql);
                $row = $qry->fetch_assoc();
                $oldpwd = $row['pwd'];
                $newpwd = md5($_POST['pwd2']);

                if ($_POST['pwd2'] != "" && $oldpwd == md5($_POST['pwd1']) && $_POST['pwd2'] == $_POST['pwd3']){
                    $updatesql = "UPDATE students SET val='$val', pwd='$newpwd' WHERE id='$id'";
                    if($conn->query($updatesql)===TRUE){header("Location:profile.php?msg=updatesuccessful");}
                } else if ($_POST['pwd1'] == "" && $_POST['pwd2'] == "" && $_POST['pwd3'] == ""){
                    if($conn->query($updatesql)===TRUE){header("Location:profile.php?msg=updatesuccessful");}
                } else {
                    header("Location:editprofile.php?msg=updatenotsuccessful");
                }
                
                
            }else{  // get data
                echo 
                    "<div class='middlediv'>
                        <form action='editprofile.php' method='POST'>
                            <br><br><br>   
                            <label>Index no: </label><input type='text' name='id' value='".$student->getID()."' disabled><br>
                            <label>Full Name: </label><input type='text' name='name' value='".$student->getName()."'><br>
                            <label>Email: </label><input type='email' name='email' value='".$student->getEmail()."'><br>
                            <label>Mobile: </label><input type='number' name='mobile' value='".$student->getMobile()."' maxlength='10'><br>
                            <label>Current Password: </label><input type='password' name='pwd1'><br>
                            <label>New password: </label><input type='password' name='pwd2'><br>
                            <label>Confirm password: </label><input type='password' name='pwd3'><br><br>
                            <input type='text' name='status' value='update' hidden>
                            <input type='submit' style='background-color:#123456;' value='Update Profile'>
                        </form>
                    </div>";
            }
        ?>
    </body>
</html>
