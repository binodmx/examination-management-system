<?php 
    include_once "../classes/lecturer.php";
    include_once "../classes/student.php";
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
                font-size:16px;
                float: right;
                box-sizing: border-box;
            }
            input[type=submit]:hover {
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

            if(isset($_POST['submit'])){
                $sid = $_POST['id'];
                $mid = $_POST['moduleid'];
                $mrk = $_POST['marks'];
                $sql = "SELECT * FROM students WHERE id='$sid'";
                $qry = $conn->query($sql);
                $row = $qry->fetch_assoc();
                $stu = unserialize($row['val']);
                $stu->addResults($mid, $mrk);
                $val = serialize($stu);
                $sql = "UPDATE students SET val='$val' WHERE id='$sid'";
                if($conn->query($sql)===TRUE){
                    echo "<script type='text/javascript'>alert('Upload results successful!');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Upload results not successful!');</script>";
                }
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
            <select name="moduleid" required onchange ="this.form.submit();">
                <?php
                    $modules = $lecturer->getModules();
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
            <label>Batch:</label>
            <select name="batch" onchange ="this.form.submit()">
                <?php
                    if(isset($_POST['moduleid']) && $_POST['moduleid'] != "opt"){
                        if(!isset($_POST['batch'])){echo "<option value='null'>--Select batch--</option>";}
                        for ($y = date("Y"); $y > (date("Y")-5) ; $y--){
                            if(isset($_POST['batch']) && $_POST['batch']==$y){$selected = "selected";}else{$selected="";}
                            echo "<option value='".$y."'".$selected.">".$y."</option>";
                        }
                    }
                ?>
            </select><br><br>
        </form>
<?php
    if (isset($_POST['moduleid']) && isset($_POST['batch']) && $_POST['moduleid'] != "opt"){
        $moduleid = $_POST['moduleid'];
        $batch = $_POST['batch'];
        $sql = "SELECT * FROM modules WHERE id='$moduleid'";
        $qry = $conn->query($sql);
        $row = $qry->fetch_assoc();
        $module = unserialize($row['val']);
        $semester = $module->getSemester();
?>

<div style="width: 500px;margin-left: 280px;">
    <form action="uploadresults.php" method="POST" >
        <fieldset>
            <legend align="center"><h2>Enter Results</h2></legend><br>
            <input name="batch" type="text" value="<?php echo $batch; ?>" hidden>
            <input name="moduleid" type="text" value="<?php echo $moduleid; ?>" hidden>

            <label style="padding: 10px;">Student ID:</label>
            <select name="id" style="width: 75%;margin-right: 20px">
 <?php            
        $sql = "SELECT * FROM students";
        $value = "";
        $qry = $conn->query($sql);
        if($qry->num_rows>0){
            while($row = $qry->fetch_assoc()){
                $student = unserialize($row['val']);
                if($semester <= $student->getSemester()){
                    $modules = $student->getModules($semester);
                    if ($batch == $student->getBatch() && in_array($moduleid, $modules)){
                        $studentid = $student->getID();
                        if(array_key_exists($moduleid,$student->getResults())){
                            $value = $student->getResult($moduleid);
                        }
                        echo "<option value='".$studentid."'>".$studentid."</option>";
                    }
                } 
            }
        } else {
            echo "<option value='Not available'></option>";
        }
?>
            </select><br><br>

            <label style="padding: 10px;">Marks:</label>
            <select name="marks" style="width: 75%;margin-right: 20px">
                <?php if ($value =="A+") {echo "selected";}?>
                <option value="A+" <?php if ($value =="A+") {echo "selected";}?>>A+</option>
                <option value="A" <?php if ($value =="A") {echo "selected";}?>>A</option>
                <option value="A-" <?php if ($value =="A-") {echo "selected";}?>>A-</option>
                <option value="B+" <?php if ($value =="B+") {echo "selected";}?>>B+</option>
                <option value="B" <?php if ($value =="B") {echo "selected";}?>>B</option>
                <option value="B-" <?php if ($value =="B-") {echo "selected";}?>>B-</option>
                <option value="C+" <?php if ($value =="C+") {echo "selected";}?>>C+</option>
                <option value="C" <?php if ($value =="C") {echo "selected";}?>>C</option>
                <option value="C-" <?php if ($value =="C-") {echo "selected";}?>>C-</option>
                <option value="iwe" <?php if ($value =="iwe") {echo "selected";}?>>I-we</option>
            </select><br><br>
            <input type="submit" name="submit" value="Submit" style="width: 75%;margin-right: 20px"><br><br><br>
        </fieldset>
    </form>
</div>

<?php
    }
?>
        </div>
    </body>
</html>