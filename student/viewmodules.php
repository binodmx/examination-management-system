<?php 
    include_once "../classes/student.php";
    include_once "../classes/module.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registered Modules</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <?php 
        include_once "header.php";
        include_once "sidebar.php"; 
        include_once "../footer.php";       
    ?>
    <div class="middlediv">
        <?php 
            if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability 
            include_once ("../dbconnect.php");

            // Identify student
            $student = $_SESSION['user'];
            $semester = $student->getSemester();
            $registered = $student->isRegistered($semester);

            if ($registered) {
                $id=$student->getId(); 
                $name = $student->getName();
                $modules=$student->getModules($semester); 
                
                echo "<br><br><br>";
                echo
                    "<br>
                    <table style='margin-left:350px;'>
                        <caption id='cpt1'>Registered Modules for Semester ".$semester."  </caption>
                        <tr>
                            <th>Module ID</th>
                            <th>Module Name</th>
                            <th>Credits</th>
                        </tr>";
                    
                    foreach ($modules as $moduleid) {
                        $sql = "SELECT * FROM modules WHERE id='$moduleid'";
                        $qry = $conn->query($sql);
                        $row = $qry->fetch_assoc();
                        $module = unserialize($row['val']);
                        $modulename = $module->getName();
                        $modulecredits = $module->getCredits();
                        $modulesemester = $module->getSemester();
                        echo
                            "<tr>
                                <td>$moduleid</td>
                                <td>$modulename</td>
                                <td>$modulecredits</td>
                            </tr>";
                    }
                echo "</table>";
            } else {
                echo "You have not registered for this semester!";
            }
        $conn->close(); 
        ?>
    </div>
</body>
</html>