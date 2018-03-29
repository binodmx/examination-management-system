<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign In
        </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>
        <div class="signin_div">

            <!signin form>
            <form action="signin.php" method="POST" class="signin_form">
                Username :<input id="u" type="text"  name="usn" maxlength="7" autofocus value=
                "<?php if(isset($_POST['usn'])){echo $_POST['usn'];}else{echo '';} ?>"><br>
                Password :<input id="p" type="password"  name="pwd" maxlength="1023"><br>
                <button type="submit" name="submit"> Sign In</button><br>
            </form>
        
            <?php
                session_start();
                if(isset($_POST['usn']) && isset($_POST['pwd'])){

                    // Validate step 1
                    if(strlen($_POST['usn'])<7 || strlen($_POST['pwd'])==0){
                        echo "Invalid username or password.";
                    }else{

                        // Database details
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "ems";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } 

                        // Get data
                        $studentsql = "SELECT password FROM students WHERE id='".$_POST['usn']."'";
                        $studentquery = $conn->query($studentsql);

                        // Validate step 2
                        if($studentqueryrow = $studentquery->fetch_assoc()){
                            $studentpassword = $studentqueryrow["password"];
                            if($_POST['pwd']==$studentpassword){
                                $_SESSION['studentid']=$_POST['usn'];
                                header("Location:index.php");
                            }else{
                                echo "Invalid password";
                            }
                        }else{
                            echo "Invalid username.";
                        }
                    }
                }
            ?>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>
