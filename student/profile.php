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
        <?php
            session_start(); 
            if(isset($_POST['status']) && $_POST['status']=="signout"){
                unset($_SESSION['studentid']);
                session_destroy();
                header("Location:../index.php");
            }else{
                if(!isset($_SESSION['studentid'])){
                    echo 'You have not signed in!';
                }else{
                    echo
                        '<div class="middle_bar">
                            <p><a href="editprofile.php">Edit Profile</a></p>
                            <p><a href="registermodules.php">Register for modules</a></p>
                            <p><a href="viewmodules.php">View registered modules</a></p>
                            <p><a href="viewresults.php">View results</a></p>
                            <p><a href="informabsensedetails.php">Inform absense details</a></p>
                            <p><a href="#">Apply for recorrection</a></p>
                            <p><a href="#">Apply for repeat exams</a></p>
                            <p><a href="#">Apply for convocation</a></p>
                            <form action="profile.php" method="POST">
                                <input type="text" name="status" value="signout" hidden>
                                <input type="submit" id="btnSignout" value="Sign out">
                            </form>
                        </div>';
                }
            }

        ?>
        <?php include_once "footer.php";?>
    </body>
</html>