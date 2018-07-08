<?php 
    include_once "../classes/lecturer.php";
    include_once "../classes/student.php";
    include_once "../classes/result.php";
    include_once "../classes/module.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Results</title>
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
            background-color: #123456;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            box-sizing: border-box;
        }
        input[type=submit] {
                background-color: #123456;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size:16px;
                float: right;
                box-sizing: border-box;
            }
            input[type=submit]:hover {
                opacity: 0.8;
            }
             button{
                background-color: #123456;
                color: white;
                padding: 12px 20px;
                width: 230px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size:16px;
                box-sizing: border-box;
             }
             button:hover{
                opacity: 0.8;
             }
    </style>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
    <body>
        <?php
            if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability
            include_once "header.php";
            include_once "sidebar.php";
            include_once "../footer.php";
            include_once "../dbconnect.php";
            
            function goNext($qry){

            }
        ?>

        <div class="middlediv">
          <form action="uploadresults.php" method="POST" enctype="multipart/form-data"><br><br><br>
            <?php
                $lecturer = $_SESSION['user'];
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
            ?>
            <label>Department :</label><input name="department" value="<?php echo $department; ?>" disabled><br>
            <label>Module ID:</label>
            <select name="moduleid" required>
                <?php
                    $modules = $lecturer->getModules();
                    if(count($modules)>0){
                        foreach($modules as $moduleid){
                            echo "<option value='".$moduleid."'>".$moduleid."</option>";
                        }
                    } else {
                        echo "<option value='opt'>Not available</option>";
                    }
                ?>
            </select><br>
            <label>Batch:</label>
            <select name="batch" onchange="this.form.submit()">
                <?php
                    if(!isset($_POST['batch'])){echo "<option value='null'>--Select batch--</option>";}
                    for ($y = date("Y"); $y > (date("Y")-4) ; $y--){
                        if(isset($_POST['batch']) && $_POST['batch']==$y){$selected = "selected";}else{$selected="";}
                        echo "<option value='".$y."'".$selected.">".$y."</option>";
                    }
                ?>
            </select><br><br>
        </form>
<?php
    if (isset($_POST['moduleid']) && isset($_POST['batch'])){
        $moduleid = $_POST['moduleid'];
        $batch = $_POST['batch'];
        $sql = "SELECT * FROM modules WHERE id='$moduleid'";
        $qry = $conn->query($sql);
        $row = $qry->fetch_assoc();
        $module = unserialize($row['val']);
        $semester = $module->getSemester();
?>

<div style="width: 500px;margin-left: 280px;">
    <form action="signin.php" method="POST" >
        <fieldset>
            <legend align="center"><h2>Enter Results</h2></legend><br>

 <?php            
        $sql = "SELECT * FROM students";
        $qry = $conn->query($sql);
        if($qry->num_rows>0){
            if($row = $qry->fetch_assoc()){
                $student = unserialize($row['val']);
                if($semester<=$student->getSemester()){
                    $modules = $student->getModules($semester);
                    if ($batch == $student->getBatch() && in_array($moduleid, $modules)){
                        $studentid = $student->getID();
?>

            <label style="padding: 10px;">Student ID:</label><input type="text"  name="id" value="<?php echo $studentid; ?>" style="width: 75%;margin-right: 20px" disabled><br><br>
            <label style="padding: 10px;">Marks:</label><select name="mark"  style="width: 75%;margin-right: 20px">
                <option value="A+">A+</option>

            </select><br><br>

<?php
                    }
                }
            }
        }
?>
            <button type="button" id="prevBtn" onclick="nextPrev(-1)" style="margin-left:10px;"><< Previous</button>
            <button type="button" id="nextBtn" onclick="goNext($qry)">Next >></button><br><br>
        </fieldset>
    </form>
</div>

<?php
    }
?>














        </div>
    </body>
</html>