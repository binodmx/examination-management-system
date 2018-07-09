<?php 
    include_once "../classes/student.php";
    include_once "../classes/module.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <style>
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
            box-sizing: border-box;
        }
        input, select, textarea {
            width: 20%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            box-sizing: border-box;
        }
        input[type=submit] {
            background-color: #4CAF50;
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
    include_once "../dbconnect.php";
    include_once "header.php";
    include_once "sidebar.php";
    include_once "../footer.php";

?>
        <div class='middlediv'>
            <br><br><br>
            <!select semester>
            <?php $semester=isset($_POST['semester'])?$_POST['semester']:''?>
            <form action='viewresults.php' method='POST'>
                <label>Semester :</label>
                <select name='semester' onchange="this.form.submit()">
                    <?php if(!isset($_POST['semester'])){echo "<option value='null' >--Select semester--</option>";}?>
                    <option value="1" <?php if($semester=="1"){echo "selected";}?>>1</option>
                    <option value="2" <?php if($semester=="2"){echo "selected";}?>>2</option>
                    <option value="3" <?php if($semester=="3"){echo "selected";}?>>3</option>
                    <option value="4" <?php if($semester=="4"){echo "selected";}?>>4</option>
                    <option value="5" <?php if($semester=="5"){echo "selected";}?>>5</option>
                    <option value="6" <?php if($semester=="6"){echo "selected";}?>>6</option>
                    <option value="7" <?php if($semester=="7"){echo "selected";}?>>7</option>
                    <option value="8" <?php if($semester=="8"){echo "selected";}?>>8</option>
                </select> 
            </form>

    <?php
        if (isset($_POST['semester'])){
                
        // Identify student
        $student = $_SESSION['user'];
        $semester = $_POST['semester'];

        if ($student->getResults($semester)) {
            $id=$student->getId(); 
            $name = $student->getName();
            $modules=$student->getModules($semester); 
            $results=$student->getResults($semester);

            echo "<br><br><br>";
            echo
                "Index No : $id <br>
                Name : $name <br>
                SGPA : $results->getSGPA <br>
                <table style='margin-left:50px;'>
                    <caption id='cpt1'>Results for Semester ".$semester."  </caption>
                    <tr>
                        <th>Module ID</th>
                        <th>Module Name</th>
                        <th>Credits</th>
                        <th>Marks</th>
                    </tr>";
                
                foreach ($modules as $m) {
                    $module = unserialize($m);
                    $moduleid = $module->getID();
                    $modulename = $module->getName();
                    $modulecredits = $module->getCredits();
                    $modulemarks = $results->getMarks($moduleid);
                    echo
                        "<tr>
                            <td>$moduleid</td>
                            <td>$modulename</td>
                            <td>$modulecredits</td>
                            <td>$modulemarks</td>
                        </tr>";
                }
            echo "</table>";
        } else {
            echo "Results not available for this semester!";
        }
    }
    $conn->close(); 
    ?>
</div>
</body>
</html>