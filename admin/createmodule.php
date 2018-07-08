<?php 
    include_once "../classes/module.php";
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Module</title>
        <style>
            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
                box-sizing: border-box;
            }
            input, select, textarea {
                width: 85%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                float: right;
                box-sizing: border-box;
            }
            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: right;
                box-sizing: border-box;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php
            if(isset($_GET['msg']) && $_GET['msg'] == 'updatesuccessful'){echo "<script type='text/javascript'>alert('Create module successful!');</script>";}
            if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability

            include_once "header.php";
            include_once "sidebar.php";  
            include_once "../footer.php"; 
            include_once "../dbconnect.php";

            if(isset($_POST['status'])){ // Update data
                $id = $_POST['id'];
                $module = new Module($id);
                $module->setName($_POST['name']);
                $module->setSemester($_POST['semester']);
                $module->setCredits($_POST['credits']);
                $module->setDepartment($_POST['department']);
                $module->setCompulsory($_POST['compulsory']);
                $_POST = array();
                $val = serialize($module);
                $updatesql = "INSERT INTO modules (id, val) VALUES ('$id', '$val')";
                
                if($conn->query($updatesql)===TRUE){header("Location:createmodule.php?msg=updatesuccessful");}

            } else {  // get data
                echo 
                    "<div class='middlediv'>
                        <form action='createmodule.php' method='POST'>
                            <br><br><br>   
                            <label>Module ID: </label><input type='text' name='id'><br>
                            <label>Module Name: </label><input type='text' name='name'><br>
                            <label>Semester: </label><input type='text' name='semester'><br>
                            <label>Credits: </label><input type='text' name='credits'><br>
                            <label>Departments: </label><select name='department'>
                                <option value='bmd' selected>Bio Medical Engineering</option>
                                <option value='cse' >Computer Science and Engineering</option>
                                <option value='civ' >Civil Engineering</option>
                                <option value='che' >Chemical and Process Engineering</option>
                                <option value='ele' >Electrical Engineering</option>
                                <option value='ent' >Electronic and Telecommunication Engineering</option>
                                <option value='mec' >Mechanical Engineering</option>
                                <option value='mat' >Material Sciences Engineering</option>
                            </select>
                            <label>Compulsory: </label><select name='compulsory'>
                                <option value=TRUE selected>Yes</option>
                                <option value=FALSE>No</option>
                            </select>
                            <input type='text' name='status' value='update' hidden><br><br>
                            <input type='submit' style='background-color:#123456;' value='Create Module'>
                        </form>
                    </div>";
            }
        ?>
    </body>
</html>
