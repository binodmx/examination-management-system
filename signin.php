<?php session_start();?>
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
            input[type=text], input[type=password], select{
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
                <label>I am a/an :</label>
                <select name="pro">
                    <option value="student" selected>Student</option>
                    <option value="lecturer">Lecturer</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="submit"> Sign In</button><br>
            </form>
        </div>
            <?php
                if(isset($_POST['usn']) && isset($_POST['pwd'])){

                    // Validate step 1
                    if(strlen($_POST['usn'])!=7 || strlen($_POST['pwd'])==0){
                        echo "Invalid username or password.";
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
                                        $_SESSION['lecuturerid']=$_POST['usn'];
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
