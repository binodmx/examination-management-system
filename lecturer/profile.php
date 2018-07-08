<?php 
    include_once "../classes/lecturer.php";
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin-left:390px;
            text-align: center;
        }

        .title {
            color: black;
            font-size: 18px;
        }
</style>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php
            if(isset($_GET['msg']) && $_GET['msg'] == 'updatesuccessful'){echo "<script type='text/javascript'>alert('Update successful!');</script>";}
            if(isset($_GET['msg']) && $_GET['msg'] == 'signinsuccessful'){echo "<script type='text/javascript'>alert('Sign in successful!');</script>";}
            if(isset($_GET['msg']) && $_GET['msg'] == 'registersuccessful'){echo "<script type='text/javascript'>alert('Register modules successful!');</script>";}
            include_once "header.php";
            if(isset($_GET['status']) && $_GET['status']=="signout"){
                unset($_SESSION['user']);
                session_destroy();
                header("Location:../index.php");
            }else if(isset($_SESSION['user'])){
                $lecturer = $_SESSION['user'];
                $id = $lecturer->getID();
                $name = $lecturer->getName();
                switch ($lecturer->getDepartment()){
                    case 'bmd':
                        $department = 'Bio Medical Engineering';
                        break;
                    case 'cse':
                        $department = 'Computer Science and Engineering';
                        break;
                    case 'civ':
                        $department = 'Civil Engineering';
                        break;
                    case 'che':
                        $department = 'Chemical and Process Engineering';
                        break;
                    case 'ele':
                        $department = 'Electrical Engineering';
                        break;
                    case 'ent':
                        $department = 'Electronic and Telecommunication Engineering';
                        break;
                    case 'mec':
                        $department = 'Mechanical Engineering';
                        break;
                    case 'mat':
                        $department = 'Material Sciences Engineering';
                        break;
                }
                echo 
                    "<div class='middlediv'>
                    <br><br><br><br><br>
                        <div class='card'><br>
                            <img src='../imgs/user.png' style='width:60%;align:center;'>
                            <h2>".$name."</h2>
                            <p class='title'>(".$id.")</p><br>
                            <p>Lecturer</p>
                            <p>".$department."</p><br>
                        </div>
                    </div>";
                include_once "sidebar.php";
            
            }else{
                header("Location:../signin.php");
            }
            include_once "../footer.php";
        ?>
    </body>
</html>