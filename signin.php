<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign In
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            /*form {border: 3px solid #f1f1f1;}*/
            .signin_form{
                width: 50%;
                margin-top: 100px;
                margin-left: auto;
                margin-right: auto;
            }
            table{
                margin: 0 auto;
            }
            button {
                background-color: #4CAF50;
                display: block;
                color: white;
                padding: 5px 5px;
                border: none;
                margin-left: auto;
                margin-right: auto;
                margin-top: 20px;
                margin-bottom: 20px;
                cursor: pointer;
                width: 15%;
                height: 30px;
            }
            button:hover {
                opacity: 0.8;
            }
            tr>td{
                padding: 10px;
            }
            label{
                margin-right: 20px;
            }
            .container {
                padding: 16px;
                height: 400px;
            }
            input{
                height: 25px;
                width: 300px;
            }
        </style>
    </head>
    <body>
        <?php include_once "header.php";?>
        <br><br><br>
        <div class="container">
            <!signin form>
                <div class="signin_form">
                    <form action="signin.php" method="POST">
                        <table >
                            <tr >
                                <td>
                                    <label>Username</label>
                                </td>
                                <td>
                                    <input id="u" type="text"  name="usn" maxlength="7" placeholder="Enter Username" autofocus value="<?php if(isset($_POST['usn'])){echo $_POST['usn'];}else{echo '';} ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Password</label>
                                </td>
                                <td>
                                    <input id="p" type="password"  name="pwd" maxlength="1023" placeholder="Enter Password">
                                </td>
                            </tr>
                        </table>
                        <button type="submit" name="submit"> Sign In</button>
                    </form>
                </div>
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
