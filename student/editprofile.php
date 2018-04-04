<!DOCTYPE html>
<html>
    <head>
        <title>
            Edit Profile
        </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>
        <?php
            session_start();
            if(!isset($_SESSION['studentid'])){
                echo 'You have not signed in!';
            }else{
                include_once "../dbconnect.php";
                if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['mobile']) || isset($_POST['pwd2'])){
                    // Update data
                    $studentsql = "UPDATE students SET name='".$_POST['name']."', email='".$_POST['email']."', mobile='".$_POST['mobile']."', password='".$_POST['pwd2']."' WHERE id='".$_SESSION['studentid']."'";
                    if($conn->query($studentsql)===TRUE){
                        header("Location:profile.php");
                    }
                    
                }else{
                    // Get data
                    $studentsql = "SELECT id, name, mobile, email, password FROM students WHERE id='".$_SESSION['studentid']."'";
                    $studentquery = $conn->query($studentsql);
                    $studentqueryrow = $studentquery->fetch_assoc();
                    // View data
                    echo 
                        "<div class='signupform'>
                            <form action='editprofile.php' method='POST'>
                                Index no: <input type='text' name='id' value='".$studentqueryrow['id']."' disabled><br>
                                Full Name: <input type='text' name='name' value='".$studentqueryrow['name']."'><br>
                                Email: <input type='email' name='email' value='".$studentqueryrow['email']."'><br>
                                Mobile: <input type='number' name='mobile' value='".$studentqueryrow['mobile']."' maxlength='10'><br>
                                Current Password: <input type='password' name='pwd1'><br>
                                New password: <input type='password' name='pwd2'><br>
                                Confirm password: <input type='password' name='pwd2'><br>
                                <input type='submit' value='Update Profile'>
                            </form>
                        </div>";
                }
            }
        ?>

    </body>
</html>
