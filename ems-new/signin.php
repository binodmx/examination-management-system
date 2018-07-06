<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign In
        </title>
        <style>
            .login {
                width: 300px;
                margin: 80px auto;
                font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
                font-size: 16px;
                
            }
            .login h1{
                color: #00004d;
            }

            .login p{
                margin-bottom: 15px;
                padding-left: 10px;
                padding-right: 10px;

            }
            .error{
                color: red;
                font-size:14px;
            }
            .login input,select{
                display: block;
                width: 100%;
                padding: 5px ;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;

            }
            .login button{
                width: 100%;
                padding: 8px;
                background:  #123456;
                font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
                color: white;
                font-size: 16px;
                border:none;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                
            }
            .login button:hover {
                opacity: 0.8;
            }
        </style>
    </head>
    <body>
        <?php
            if(isset($_POST['usn']) && isset($_POST['pwd'])){
                // Validate step 1
                if(strlen($_POST['usn'])!=7 || strlen($_POST['pwd'])==0){
                    $errors=true;
                }else{
                    include_once "dbconnect.php";
                    // Get data
                    switch($_POST['pro']){
                        case 'student':
                            $sql = "SELECT password FROM students WHERE id='".$_POST['usn']."'";                                
                            break;
                        case 'lecturer':
                            $sql = "SELECT password FROM lecturers WHERE id='".$_POST['usn']."'";
                            break;
                        case 'admin':
                            $sql = "SELECT password FROM admins WHERE id='".$_POST['usn']."'";
                            break;
                    }
                    $qry = $conn->query($sql);
                    // Validate step 2
                    if($row = $qry->fetch_assoc()){
                        $password = $row["password"];
                        if(md5($_POST['pwd'])==$password){
                            switch($_POST['pro']){
                                case 'student':
                                    $_SESSION['studentid']=$_POST['usn'];
                                    $_SESSION['profile']='student';
                                    header("Location:student/profile.php");                              
                                    break;
                                case 'lecturer':
                                    $_SESSION['lecturerid']=$_POST['usn'];
                                    $_SESSION['profile']='lecturer';
                                    header("Location:lecturer/profile.php"); 
                                    break;
                                case 'admin':
                                    $_SESSION['adminid']=$_POST['usn'];
                                    $_SESSION['profile']='admin';
                                    header("Location:admin/profile.php");
                                    break;
                            }
                        }else{
                            $errors=true;
                        }
                    }else{
                        $errors=true;
                    }
                }
            }
        ?>


        <?php include_once "header.php";?>
        <div class="middle_bar">
        <div class="login">
            <!signin form>
            <form action="signin.php" method="POST" >
                <fieldset>
                    <legend align="center"><h1>Sign in</h1></legend>
                    <br>
                    <?php if (isset($errors) && !empty($errors)) {echo '<p class="error"> Invalid Username / Password</p>';}?>
                    <p>
                    <label for="">Username :</label>
                    <input id="u" type="text"  name="usn" maxlength="7" placeholder="Enter Username" autofocus value="<?php if(isset($_POST['usn'])){echo $_POST['usn'];}else{echo '';} ?>">
                    </p>
                    <p>
                    <label for="">Password :</label>
                    <input id="p" type="password"  name="pwd" maxlength="1023" placeholder="Enter Password">
                    </p>
                    <p><label>I am a/an :</label>
                    <select name="pro">
                        <option value="student" selected>Student</option>
                        <option value="lecturer">Lecturer</option>
                        <option value="admin">Admin</option>
                    </select>
                    </p>
                    <p>
                    <button type="submit" name="submit"> Sign In</button><br>
                    </p>
                </fieldset>
            </form>
        </div> 
        </div>       
        <?php include_once "footer.php";?>
    </body>
</html>
