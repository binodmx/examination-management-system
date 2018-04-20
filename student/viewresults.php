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
        <div class='middlediv'>
            <!select semester>
            <?php $semester=isset($_POST['sem'])?$_POST['sem']:''?>
            <form action='viewresults.php' method='POST'>
                Semester :
                <select name='sem'>
                    <option value="1" <?php if($semester=="1"){echo "selected";}?>>1</option>
                    <option value="2" <?php if($semester=="2"){echo "selected";}?>>2</option>
                    <option value="3" <?php if($semester=="3"){echo "selected";}?>>3</option>
                    <option value="4" <?php if($semester=="4"){echo "selected";}?>>4</option>
                    <option value="5" <?php if($semester=="5"){echo "selected";}?>>5</option>
                    <option value="6" <?php if($semester=="6"){echo "selected";}?>>6</option>
                    <option value="7" <?php if($semester=="7"){echo "selected";}?>>7</option>
                    <option value="8" <?php if($semester=="8"){echo "selected";}?>>8</option>
                </select> 
                <input type="text" name="studentid" value=<?php echo $_SESSION['studentid'];?> hidden>
                <input type="submit" value="Submit">
            </form>

            <?php
                // Session availability
                if(!isset($_SESSION['studentid'])){header("Location:../index.php");}
                include_once "../dbconnect.php";
                // Identify student
                $studentid = $_SESSION['studentid'];
                $studentsql = "SELECT semester, department FROM students WHERE id='$studentid'";
                $studentquery = $conn->query($studentsql);
                $studentqueryrow = $studentquery->fetch_assoc();
                $department = $studentqueryrow["department"];
                // Get results
                $resultsql = "SELECT * FROM stu_".$studentid."_results WHERE semester='$semester'";
                $resultquery = $conn->query($resultsql);
                // Display results
                if($resultquery->num_rows>0){
                    echo 
                        "<table>
                            <caption id='cpt1'>Results of semester $semester </caption>
                            <div>
                                <tr>
                                    <th>Module ID</th>
                                    <th>Module Name</th>
                                    <th>Grade</th>
                                </tr>
                            </div>";
                    
                    while($resultrow=$resultquery->fetch_assoc()){
                        $moduleid=$resultrow["id"];
                        $modulename = $resultrow["name"];
                        $modulegrade = $resultrow["grade"];
                        echo 
                            "<tr>
                                <td>$moduleid</td>
                                <td>$modulename</td>
                                <td>$modulegrade</td>
                            </tr>";
                    }
                    echo "</table>";
                }else{
                    if($semester!=""){echo "Not available";};
                }
                $conn->close();
            ?>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>