<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Results
        </title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php 
            include_once "header.php";
            include_once "sidebar.php";
        ?>
        <div class="middlediv">
            <?php 
                // Session availability
                if(!isset($_SESSION['studentid'])){header("Location:../index.php");}
                $id=$_SESSION['studentid'];
                include_once "../dbconnect.php";
                // Identify student
                $studentsql = "SELECT semester, department FROM students WHERE id='$id'";
                $studentquery = $conn->query($studentsql);
                $studentqueryrow = $studentquery->fetch_assoc();
                $semester = $studentqueryrow["semester"];
                $department = $studentqueryrow["department"];
                // Select semester
                echo 
                    "<form action='informabsensedetails.php' method='POST'>
                        Semester : 
                        <select name='sem'>";
                            for($i=1;$i<=$semester;$i++){
                                if(isset($_POST['sem']) && $_POST['sem']==$i ){$optsel='selected';}else{$optsel='';};
                                echo "<option value=$i $optsel>$i</option>";
                            }
                echo 
                        "</select>
                        <input type='submit' value='Submit'>
                    </form>";
                // View absent modules
                if(isset($_POST['sem'])){
                    $resultsql = "SELECT * FROM stu_".$id."_results WHERE semester='".$_POST['sem']."' AND grade='AB'";
                    $resultquery = $conn->query($resultsql);
                    if($resultquery->num_rows>0){
                        echo 
                            "<table>
                                <caption id='cpt1'>Absent Modules for Semester ".$_POST['sem']."</caption>
                                <div>
                                    <tr>
                                        <th>Module ID</th>
                                        <th>Module Name</th>
                                        <th>Grade</th>
                                        <th id='inform'>Inform</th>
                                    </tr>
                                </div>";
                    
                        while($resultrow=$resultquery->fetch_assoc()){
                            echo 
                                "<tr>
                                    <td>".$resultrow['id']."</td>
                                    <td>".$resultrow['name']."</td>
                                    <td>".$resultrow['grade']."</td>
                                    <td>
                                        <form action='informabsensedetails.php' method='POST'>
                                            <input type='text' name='id' value='".$resultrow['id']."' hidden>
                                            <input type='submit' value='Inform'>
                                        </form>
                                    </td>
                                </tr>";
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