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

    <?php
                
        // Identify student
        $student = $_SESSION['user'];
        $id=$student->getId(); 
        $name = $student->getName();
        $results=$student->getResults();

        echo "<br>";
        echo
            "<p style='margin-left:50px;'>Index No : $id </p>
            <p style='margin-left:50px;'>Name : $name </p><br>
            <table style='margin-left:50px;'>
                <caption id='cpt1'>Results Sheet</caption>
                <tr>
                    <th>Semester</th>
                    <th>Module ID</th>
                    <th>Module Name</th>
                    <th>Credits</th>
                    <th>Marks</th>
                </tr>";
            
            foreach ($results as $moduleid=>$marks) {
                $sql = "SELECT * FROM modules WHERE id='$moduleid'";
                $qry = $conn->query($sql);
                $row = $qry->fetch_assoc();
                $module = unserialize($row['val']);
                $semester = $module->getSemester();
                $modulename = $module->getName();
                $modulecredits = $module->getCredits();
                $modulemarks = $results[$moduleid];
                echo
                    "<tr>
                        <td>$semester</td>
                        <td>$moduleid</td>
                        <td>$modulename</td>
                        <td>$modulecredits</td>
                        <td>$modulemarks</td>
                    </tr>";
            }

            echo "</table>";
        $conn->close(); 
    ?>
</div>
</body>
</html>