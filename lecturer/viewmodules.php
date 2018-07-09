<?php 
    include_once "../classes/lecturer.php";
    include_once "../classes/module.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Modules</title>
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
            $lecturer = $_SESSION['user'];
            $modules = $lecturer->getModules();

            if (count($modules)>0) {
                $id=$lecturer->getId(); 
                $name = $lecturer->getName();
                
                echo "<br><br><br>";
                echo
                    "<br>
                    <table style='margin-left:380px;'>
                        <caption id='cpt1'>My Modules </caption>
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