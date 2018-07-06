<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>

<?php include "header.php";?>
<!signup procedure>
<?php
if(isset($_POST['usn']) && isset($_POST['pwd'])){   // check whether username and password is set
    if(strlen($_POST['usn'])!=7 || strlen($_POST['pwd'])==0){   // chech whether username is valid and password is not null
        $errors=true;
    }else{
        include_once "dbconnect.php";
        switch($_POST['profile']){
            case 'student':
                $sql = "SELECT pwd FROM students WHERE id='".$_POST['usn']."'";                                
                break;
            case 'lecturer':
                $sql = "SELECT pwd FROM lecturers WHERE id='".$_POST['usn']."'";
                break;
            case 'admin':
                $sql = "SELECT pwd FROM admins WHERE id='".$_POST['usn']."'";
                break;
        }
        $qry = $conn->query($sql);
        if($row = $qry->fetch_assoc()){
            $password = $row["pwd"];
            if(md5($_POST['pwd']) == $password){  // check whether password is matching
                switch($_POST['profile']){
                    case 'student':
                        $_SESSION['user'] = unserialize($row["val"]);
                        $_SESSION['profile'] = 'student';
                        header("Location:student/profile.php");                              
                        break;
                    case 'lecturer':
                        $_SESSION['user'] = unserialize($row["val"]);
                        $_SESSION['profile']='lecturer';
                        header("Location:lecturer/profile.php"); 
                        break;
                    case 'admin':
                        $_SESSION['user'] = unserialize($row["val"]);
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

<!sign in form>   
<div class="middle_bar">
    <div class="login">
        <form action="signin.php" method="POST" >
            <fieldset>
                <legend align="center"><h1>Sign in</h1></legend><br>
                <?php if (isset($errors) && !empty($errors)) {echo '<p class="error"> Invalid Username / Password</p>';}?>
                <p>
                    <label for="">Username :</label>
                    <input id="u" type="text"  name="usn" maxlength="7" placeholder="Enter Username" autofocus 
                    value="<?php if(isset($_POST['usn'])){echo $_POST['usn'];}else{echo '';} ?>">
                </p>
                <p>
                    <label for="">Password :</label>
                    <input id="p" type="password"  name="pwd" maxlength="1023" placeholder="Enter Password">
                </p>
                <p>
                    <label>I am a/an :</label>
                    <select name="profile">
                        <option value="student" selected>Student</option>
                        <option value="lecturer">Lecturer</option>
                        <option value="admin">Admin</option>
                    </select>
                </p>
                <p>
                    <button type="submit" name="submit">Sign In</button><br>
                </p>
            </fieldset>
        </form>
    </div> 
</div>

<?php include "footer.php";?>

</body>
</html>
