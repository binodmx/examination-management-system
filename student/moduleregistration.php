<?php 
    include_once "../classes/student.php";
    include_once "../classes/module.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Modules</title>
    <style>
        input[type=submit]:hover {
            opacity: 0.8;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
    <body>
        <?php 
            include_once "header.php";
            include_once "sidebar.php";
            include_once "../footer.php"; 
            
        ?>
        <div class="middlediv">
            <form action="registermodules.php" method="POST">
                <?php   
                    if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability             
                    include_once "../dbconnect.php";
                    // Identify student
                    $student = $_SESSION['user'];
                    $semester = $student->getSemester();
                    $department = $student->getDepartment();
                    $registered = $student->isRegistered($semester);

                    // If not registered display available modules
                    if(!$registered){
                        $modulesql = "SELECT id, val FROM modules";
                        $modulequery = $conn->query($modulesql);
                        echo "<br><br><br>";
                        echo "<table style='margin-left:50px;'>
                                <caption id='cpt1'>Available Modules for Semester ".$semester." - Department of ".$department."</caption>
                                <tr>
                                    <th id='thselect'>Select</th>
                                    <th>Module ID</th>
                                    <th>Module Name</th>
                                    <th>Credits</th>
                                    <th>Compulsory</th>
                                </tr>";
                        if($modulequery->num_rows>0){
                            while($row=$modulequery->fetch_assoc()){
                                $module = unserialize($row["val"]);
                                $id = $module->getID();
                                if ($module->getSemester()==$semester){
                                    echo "<tr id='$id'>
                                        <td name='tdchkbox'><input type='checkbox' name='id[]' value='$id'></td>
                                        <td>".$module->getID()."</td>
                                        <td>".$module->getName()."</td>
                                        <td>".$module->getCredits()."</td>";
                                        if($module->isCompulsory()){echo "<td>Yes</td>";}else{echo "<td>Elective</td>";}
                                    echo "</tr>";
                                } 
                            }
                        echo "</table><br>";
                        echo "<input type='reset' id='btnReset' style='margin-left:150px;font-size: 16px;background-color: #123456;color:white;border: none;padding: 10px 32px'>&nbsp";
                        echo "<input type='submit' value='Register' style='font-size: 16px;background-color: #123456;color: white;border: none;padding: 10px 32px'>";
                        } else {
                            echo "Not available";
                        }
                        $conn->close();  
                    } else {
                        echo "Currently there is no module registration avaiable for you!";
                    }
                ?>
            </form>
        </div>
        
    </body>
</html>