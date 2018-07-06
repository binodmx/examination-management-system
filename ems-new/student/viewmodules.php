<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <title>
            EMS - UoM
        </title>
    </head>
    <body>
        <?php 
            include_once "header.php";
            include_once "sidebar.php";        
        ?>
        <div class="middlediv">
            <?php include_once "../dbconnect.php"?>
            <?php

                // Identify student
                $studentid = $_SESSION['studentid'];
                $studentsql = "SELECT name FROM students WHERE id='$studentid'";
                $studentquery = $conn->query($studentsql);
                $studentqueryrow = $studentquery->fetch_assoc();
                $studentname = $studentqueryrow["name"];

                // Get registered modules
                $resultsql = "SELECT id FROM stu_".$studentid."_results";
                $resultquery = $conn->query($resultsql);

                echo 

                    "Index No : $studentid <br>
                    Name : $studentname
                    <table>
                        <caption>Registered Modules</caption>
                        <div>
                            <tr>
                                <th>Semester</th>
                                <th>Module ID</th>
                                <th>Module Name</th>
                                <th>Credits</th>
                            </tr>
                        </div>";

                if($resultquery->num_rows>0){
                    while($resultrow = $resultquery->fetch_assoc()){
                        $moduleid=$resultrow["id"];
                        $modulesql = "SELECT name, credits, semester FROM modules WHERE id='$moduleid'";
                        $modulequery = $conn->query($modulesql);
                        $modulerow = $modulequery->fetch_assoc();
                        $modulename = $modulerow["name"];
                        $modulecredits = $modulerow["credits"];
                        $modulesemester = $modulerow["semester"];

                        echo

                            "<tr>
                                <td>$modulesemester</td>
                                <td>$moduleid</td>
                                <td>$modulename</td>
                                <td>$modulecredits</td>
                            </tr>";
                    }
                }else{
                    echo "Not available";
                }
                $conn->close(); 
                echo "</table>";
            ?>
        </div>

        <?php include_once "footer.php"; ?>
    </body>
</html>