<!DOCTYPE html>
<html>
    <head>
        <title>
            Results
        </title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>

        <div class="middle_bar">
            <?php include_once "../dbconnect.php"?>
            <?php
                session_start();

                // Identify student
                $studentid = $_SESSION['studentid'];
                $studentsql = "SELECT semester, department FROM students WHERE id='".$studentid."'";
                $studentquery = $conn->query($studentsql);
                $studentqueryrow = $studentquery->fetch_assoc();
                $semester = $studentqueryrow["semester"];
                $department = $studentqueryrow["department"];

                echo "<form action='informabsensedetails.php' method='POST'>";
                echo "Semester :";
                echo "<select name='sem'>";
                for($i=1;$i<=$semester;$i++){
                    if(isset($_POST['sem']) && $_POST['sem']==$i ){$optsel='selected';}else{$optsel='';};
                    echo "<option value=$i $optsel>$i</option>";
                }
                echo "</select>";
                echo "<input type='submit' value='Submit'>";
                echo "</form>";

                if(isset($_POST['sem'])){
                    $resultsql = "SELECT * FROM stu_".$studentid."_results WHERE semester='".$_POST['sem']."' AND grade='AB'";
                    $resultquery = $conn->query($resultsql);

                    if($resultquery->num_rows>0){
                        echo "<table>
                                <caption id='cpt1'>Absent Modules for Semester ".$semester." - Department of ".$department."</caption>
                                <div>
                                <tr>
                                    <th>Module ID</th>
                                    <th>Module Name</th>
                                    <th>Grade</th>
                                    <th id='inform'>Inform</th>
                                </tr></div>";
                    
                        while($resultrow=$resultquery->fetch_assoc()){
                            $modulesql = "SELECT name FROM modules WHERE id='".$resultrow["id"]."'";
                            $modulequery = $conn->query($modulesql);
                            $modulerow=$modulequery->fetch_assoc();
                            echo "<tr id='".$resultrow["id"]."'>";
                                echo "<td>".$resultrow["id"]."</td>";
                                echo "<td>".$modulerow["name"]."</td>";
                                echo "<td>".$resultrow["grade"]."</td>";
                                echo "<td>
                                        <form action='informabsensedetails.php' method='POST'>
                                            <input type='text' name='id' value='".$resultrow['id']."' hidden>
                                            <input type='submit' value='Inform'>
                                        </form>
                                    </td>";
                                echo "</tr>";
                        }
                        echo "</table>";
                    }else{
                        echo "Not available";
                    }   
                }
                $conn->close();
            ?>
        </div>

        <?php include_once "footer.php";?>
    </body>
</html>