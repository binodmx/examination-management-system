<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign In
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            form {border: 3px solid #f1f1f1;}
            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }
            button:hover {
                opacity: 0.8;
            }
            .container {
                padding: 16px;
            }
        </style>
    </head>
    <body>
        <?php include_once "header.php";?>
        <br><br><br>
        <div class="container">
            <!signin form>
            <form action="signin.php" method="POST" >
                <label>Username :</label>
                <input id="u" type="text"  name="usn" maxlength="7" placeholder="Enter Username" autofocus value="<?php if(isset($_POST['usn'])){echo $_POST['usn'];}else{echo '';} ?>"><br>
                <label>Password :</label>
                <input id="p" type="password"  name="pwd" maxlength="1023" placeholder="Enter Password"><br>
                <button type="submit" name="submit"> Sign In</button><br>
            </form>
        </div>
            <?php
                session_start();
                if(isset($_POST['usn']) && isset($_POST['pwd'])){

                    // Validate step 1
                    if(strlen($_POST['usn'])<7 || strlen($_POST['pwd'])==0){
                        echo "Invalid username or password.";
                    }else{
                        include_once "dbconnect.php";

                        // Get data
                        $studentsql = "SELECT password FROM students WHERE id='".$_POST['usn']."'";
                        $studentquery = $conn->query($studentsql);

                        // Validate step 2
                        if($studentqueryrow = $studentquery->fetch_assoc()){
                            $studentpassword = $studentqueryrow["password"];
                            if($_POST['pwd']==$studentpassword){
                                $_SESSION['studentid']=$_POST['usn'];
                                header("Location:student/profile.php");
                            }else{
                                echo "Invalid password";
                            }
                        }else{
                            echo "Invalid username.";
                        }
                    }
                }
            ?>
        
        <?php include_once "footer.php";?>
    </body>
</html>
