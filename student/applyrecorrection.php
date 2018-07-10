<?php 
include_once "../classes/student.php";
include_once "../classes/module.php";
session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Results
        </title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <style>
        form{
            padding-top: 50px;
        }
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
            box-sizing: border-box;
        }
        input, select, textarea {
            width: 75%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            box-sizing: border-box;
        }
        input[type=submit] {
                background-color: #123456;
                width: 100%;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size:16px;
                box-sizing: border-box;
            }
            input[type=submit]:hover {
                opacity: 0.8;
            }
    </style>
    </head>
    <body>
        <?php 
            include_once "header.php";
            include_once "sidebar.php";
            include_once "../footer.php";
            include_once ("../dbconnect.php");
        ?>
        <div class="middlediv">
            <?php 
            if(isset($_GET['msg']) && $_GET['msg'] == 'alreadyappliedrecorrection'){echo "<script type='text/javascript'>alert('Already applied recorrection!');</script>";}
            if(isset($_GET['msg']) && $_GET['msg'] == 'applyconvocationsuccessful'){echo "<script type='text/javascript'>alert('Apply recorrection successful!');</script>";}
            if(isset($_GET['msg']) && $_GET['msg'] == 'applyconvocationnotsuccessful'){echo "<script type='text/javascript'>alert('Apply recorrection not successful!');</script>";}
             ?>
            <?php  
            if(!isset($_SESSION['user'])){header("Location:../index.php");}
             // Identify student

            $student = $_SESSION['user'];
            $id = $student->getid();
            $semester = ($student->getSemester())-1;
            
             ?>
            <form action="applyrecorrection.php" method="POST" >
            <label>Module ID:</label>
            <select name="moduleid" required onchange ="this.form.submit();">
                <?php
                    $modules = $student->getModules($semester);
                    if(count($modules)>0){
                        if(!isset($_POST['moduleid'])){echo "<option value='null'>--Select module--</option>";}
                        foreach($modules as $moduleid){
                            if(isset($_POST['moduleid']) && $_POST['moduleid'] == $moduleid){$sel = "selected";}else{$sel="";}
                            echo "<option value='".$moduleid."' ".$sel.">".$moduleid."</option>";
                        }

                    } else {
                        echo "<option value='opt'>Not available</option>";
                    }
                ?>
            </select><br>
             </form>
            <?php
            if (isset($_POST['moduleid']) && $_POST['moduleid'] != "opt"){
                $moduleid = $_POST['moduleid'];
                $sql = "SELECT * FROM modules WHERE id='$moduleid'";
                $qry = $conn->query($sql);
                $row = $qry->fetch_assoc();
                $module = unserialize($row['val']);
                $modulename = $module->getName();
                $result=$student->getResult($moduleid);
                if ($result=="0") {
                    $result="Not available";
                    echo "Results are not available for this module. So You cannot apply recorrection!";
                }
                else{

                    ?>

         
        <form action='recordrecorrection.php' method='POST' >
        <fieldset>
            <legend align='center'><h2>Apply Recorrection</h2></legend><br><br><br>
            <label style="margin-left: 10px"><?php echo $modulename ?></label>
             <input name='result' type='text' value="<?php echo $result?>" disabled><br><br><br>
             <input name='moduleid' type='text' value="<?php echo $moduleid; ?>" hidden>
            <input type='submit' name='submit' value='Apply' style='width: 93%;margin-left: 10px'><br><br><br>
              </fieldset>
    </form>;<?php 
}
}

?>

        </div>
    </body>
</html>