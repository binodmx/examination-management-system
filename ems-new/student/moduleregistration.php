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
            <form action="registermodules.php" method="POST">
                <?php                
                    include_once "../dbconnect.php";
                    // Identify student
                    $studentid = $_SESSION['studentid'];
                    $studentsql = "SELECT semester, department, registered FROM students WHERE id='".$studentid."'";
                    $studentquery = $conn->query($studentsql);
                    $studentqueryrow = $studentquery->fetch_assoc();
                    $semester = $studentqueryrow["semester"];
                    $department = $studentqueryrow["department"];
                    $registered = $studentqueryrow["registered"];
                    // If not registered display available modules
                    if(!$registered){
                        $modulesql = "SELECT id, name, credits, gpa, compulsory FROM modules WHERE semester=".$semester;
                        $modulequery = $conn->query($modulesql);
                        echo "<table>
                                <caption id='cpt1'>Available Modules for Semester ".$semester." - Department of ".$department."</caption>
                                <tr>
                                    <th id='thselect'>Select</th>
                                    <th>Module ID</th>
                                    <th>Module Name</th>
                                    <th>Credits</th>
                                    <th>GPA</th>
                                    <th>Compulsory</th>
                                </tr>";
                        if($modulequery->num_rows>0){
                            while($row=$modulequery->fetch_assoc()){
                                $id=$row["id"];
                                $resultsql="SELECT id FROM stu_".$studentid."_results WHERE id='$id'";
                                $resultquery=$conn->query($resultsql);
                                if(!$resultquery->num_rows>0){
                                    echo "<tr id='$id'>
                                            <td name='tdchkbox'><input type='checkbox' name='id[]' value='$id'></td>
                                            <td>".$row["id"]."</td>
                                            <td>".$row["name"]."</td>
                                            <td>".$row["credits"]."</td>";
                                            if($row["gpa"]){echo "<td>Yes</td>";}else{echo "<td>No</td>";}
                                            if($row["compulsory"]){echo "<td>Compulsory</td>";}else{echo "<td>Elective</td>";}
                                    echo "</tr>";
                                }
                            }
                            echo "</table>";
                            echo "<input type='reset' id='btnReset'>";
                            echo "<input type='submit' value='Register'>";
                        }else{
                            echo "Not available";
                        }
                        $conn->close(); 
                        
                    } else {
                        echo "There is no module registration avaiable for you currently!";
                    }
                ?>
            </form>
        </div>
        <?php include_once "footer.php"; ?>
    </body>
</html>