<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>
<body>
<?php 
    if(isset($_GET['msg']) && $_GET['msg'] == 'signupsuccessful'){echo "<script type='text/javascript'>alert('Sign up successful!');</script>";}
    include_once "header.php";
    include_once "sidebar.php";
    include_once "../footer.php";
?>
<!signup procedure>
<?php
    if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability
    include "../classes/admin.php";
    include "../classes/lecturer.php";
    include "../classes/student.php";
    if(isset($_POST['id']) && isset($_POST['fn'])){
        if( $_POST['p1']!=$_POST['p2']){    // check whether entered passwords are matching
            $_POST = array();
            header("Location:signupmembers.php?err=passwordsdonotmatch");
        }else{
            if(strlen($_POST['id'])!=7){    // check whether index number is valid
                $_POST = array();
                header("Location:signupmembers.php?err=invalidindexnumber");
            }else{
                include_once "../dbconnect.php";
                $id=$_POST['id'];
                $pd=md5($_POST['p1']);
                if ($_POST['pr']=="student"){
                    $sql = "SELECT id FROM students WHERE id='".$_POST['id']."'";
                    $qry = $conn->query($sql);
                    if($qry->num_rows>0){   // check whether already a user or not
                        $_POST = array();
                        header("Location:signupmembers.php?err=useralreadyexists");
                    }else{
                        $student = new Student($_POST['id'], $_POST['fn']);
                        if (isset($_POST['ni'])){$student->setNIC($_POST['ni']);};
                        if (isset($_POST['mo'])){$student->setMobile($_POST['mo']);};
                        if (isset($_POST['em'])){$student->setEmail($_POST['em']);};
                        if (isset($_POST['fa'])){$student->setFaculty($_POST['fa']);};
                        if (isset($_POST['dp'])){$student->setDepartment($_POST['dp']);};
                        $student->setSemester("1");
                        $val = serialize($student);
                        $sql = "INSERT INTO students(id, val, pwd) VALUES ('$id', '$val', '$pd')";
                        if($conn->query($sql)===TRUE){header("Location:signupmembers.php?msg=signupsuccessful");}
                    }
                }
                if ($_POST['pr']=="lecturer"){
                    $sql = "SELECT id FROM lecturers WHERE id='".$_POST['id']."'";
                    $qry = $conn->query($sql);
                    if($qry->num_rows>0){   // check whether already a user or not
                        $_POST = array();
                        header("Location:signupmembers.php?err=useralreadyexists");
                    }else{
                        $lecturer = new Lecturer($_POST['id'], $_POST['fn']);
                        if (isset($_POST['ni'])){$lecturer->setNIC($_POST['ni']);};
                        if (isset($_POST['mo'])){$lecturer->setMobile($_POST['mo']);};
                        if (isset($_POST['em'])){$lecturer->setEmail($_POST['em']);};
                        if (isset($_POST['fa'])){$lecturer->setFaculty($_POST['fa']);};
                        if (isset($_POST['dp'])){$lecturer->setDepartment($_POST['dp']);};
                        $val = serialize($lecturer);
                        $sql = "INSERT INTO lecturers(id, val, pwd) VALUES ('$id', '$val', '$pd')";
                        if($conn->query($sql)===TRUE){header("Location:signupmembers.php?msg=signupsuccessful");}
                    }
                }                                      
            }
        }
    }
?>

<!signup form>
<div class="middlediv">
<div class="login"><br><br><br>
    <form action="signupmembers.php" method="POST">
    <fieldset>
        <legend align="center"><h1>Sign Up Members</h1></legend><br>
        <?php if (isset($error) && !empty($error)) {echo '<p class="error">'.$error.'</p>';}?>
        <div class="row">
            <div class="column">
            <p><label>Index no: </label><input type="text" name="id"  required placeholder="Enter index number" autofocus maxlength="7" value=<?php if(isset($_POST['id'])){echo $_POST['id'];}?>></p>
            <p><label>Full Name: </label><input type="text" name="fn"  required placeholder="Enter full name" value=<?php if(isset($_POST['fn'])){echo $_POST['fn'];}?>></p>
            <p><label>NIC no: </label><input type="text" name="ni"  maxlength="12" placeholder="Enter National Identity Card number" value=<?php if(isset($_POST['ni'])){echo $_POST['ni'];}?>></p>
            <p><label>Faculty : </label>
                <select name='fa' onchange="this.form.submit()">
                    <option value='en' <?php if(isset($_POST['fa']) && $_POST['fa']=='en'){echo "selected";}?>>Engineering</option>
                    <!option value='ar' <?php if(isset($_POST['fa']) && $_POST['fa']=='ar'){echo "selected";}?>>Architecture</option>
                    <!option value='it' <?php if(isset($_POST['fa']) && $_POST['fa']=='it'){echo "selected";}?>>Information Technology</option>
                </select></p>
            <p><label>Department : </label>
                <select name='dp' <?php if(isset($_POST['fa']) && $_POST['fa']!='en'){echo "disabled";}?>>
                    <option value="bmd" <?php if(isset($_POST['dp']) && $_POST['dp']=='bmd'){echo "selected";}?>>Bio Medical Engineering</option>
                    <option value="cse" <?php if(isset($_POST['dp']) && $_POST['dp']=='cse'){echo "selected";}?>>Computer Science and Engineering</option>
                    <option value="civ" <?php if(isset($_POST['dp']) && $_POST['dp']=='civ'){echo "selected";}?>>Civil Engineering</option>
                    <option value="che" <?php if(isset($_POST['dp']) && $_POST['dp']=='che'){echo "selected";}?>>Chemical and Process Engineering</option>
                    <option value="ele" <?php if(isset($_POST['dp']) && $_POST['dp']=='ele'){echo "selected";}?>>Electrical Engineering</option>
                    <option value="ent" <?php if(isset($_POST['dp']) && $_POST['dp']=='ent'){echo "selected";}?>>Electronic and Telecommunication Engineering</option>
                    <option value="mec" <?php if(isset($_POST['dp']) && $_POST['dp']=='mec'){echo "selected";}?>>Mechanical Engineering</option>
                    <option value="mat" <?php if(isset($_POST['dp']) && $_POST['dp']=='mat'){echo "selected";}?>>Material Sciences Engineering</option>
                    <option value="" hidden <?php if(isset($_POST['fa']) && $_POST['fa']!='en'){echo "selected";}?>></option>
                </select></p>
            </div>
            <div class="column">
            <p><label>Role :</label>
            <select name="pr">
                <option value="student" <?php if(isset($_POST['pr']) && $_POST['pr']=="student"){echo "selected";}?>>Student</option>
                <option value="lecturer" <?php if(isset($_POST['pr']) && $_POST['pr']=="lecturer"){echo "selected";}?>>Lecturer</option>
            </select></p>
            <p><label>Email: </label><input type="email" name="em"  placeholder="Enter email address" value=<?php if(isset($_POST['em'])){echo $_POST['em'];}?>></p>
            <p><label>Mobile: </label><input type="tel" name="mo"  maxlength="10" placeholder="Enter mobile number" value=<?php if(isset($_POST['mo'])){echo $_POST['mo'];}?>></p>
            <p><label>Password: </label><input type="password" name="p1"  required placeholder="Enter password" value=<?php if(isset($_POST['p1']) && $_POST['p1']!=""){echo $_POST['p1'];}?>></p>
            <p><label>Confirm password: </label><input type="password" name="p2"  required placeholder="Renter password" value=<?php if(isset($_POST['p2']) && $_POST['p2']!=""){echo $_POST['p2'];}?>></p>
            </div>
            <p><button type="submit" >Sign Up</button></p>
        </div>
    </fieldset>
    </form>
</div>
</div>
</body>
</html>
