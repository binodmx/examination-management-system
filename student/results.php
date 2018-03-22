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
            <!select semester>
            <?php $semester=$_GET['sem'];?>
            <form action="results.php" method="GET">
                Semester :
                <select name="sem">
                    <option value="1" <?php if($semester=="1"){echo "selected";};?>>1</option>
                    <option value="2" <?php if($semester=="2"){echo "selected";};?>>2</option>
                    <option value="3" <?php if($semester=="3"){echo "selected";};?>>3</option>
                    <option value="4" <?php if($semester=="4"){echo "selected";};?>>4</option>
                    <option value="5" <?php if($semester=="5"){echo "selected";};?>>5</option>
                    <option value="6" <?php if($semester=="6"){echo "selected";};?>>6</option>
                    <option value="7" <?php if($semester=="7"){echo "selected";};?>>7</option>
                    <option value="8" <?php if($semester=="8"){echo "selected";};?>>8</option>
                </select> 
                <input type="text" name="studentid" value=<?php echo $_GET['studentid'];?> hidden>
                <input type="submit" value="submit">
            </form>
            
            <?php 
                // Database details
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ems";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                // Identify student
                $studentid = $_GET['studentid'];
                $studentsql = "SELECT semester, department FROM students WHERE id='".$studentid."'";
                $studentquery = $conn->query($studentsql);
                $studentqueryrow = $studentquery->fetch_assoc();
                $department = $studentqueryrow["department"];
                
                $resultsql = "SELECT * FROM stu_".$_GET['studentid']."_results WHERE semester='".$semester."'";
                $resultquery = $conn->query($resultsql);

                //Display results in table
                if($resultquery->num_rows>0){
                    echo "<table align='center'>
                            <caption id='cpt1'>Results of semester ".$semester." - Department of ".$department."</caption>
                            <div>
                            <tr>
                                <th>Module ID</th>
                                <th>Module Name</th>
                                <th>Grade</th>
                            </tr></div>";
                    
                        while($resultrow=$resultquery->fetch_assoc()){
                            $moduleid=$resultrow["id"];
                            $modulesql = "SELECT name FROM modules WHERE id='".$moduleid."'";
                            $modulequery = $conn->query($modulesql);
                            $modulerow = $modulequery->fetch_assoc();
                            $modulename = $modulerow["name"];
                            $modulegrade = $resultrow["grade"];
                            echo "<tr>";
                            echo "<td>".$moduleid."</td>";
                            echo "<td>".$modulename."</td>";
                            echo "<td>".$modulegrade."</td>";
                            echo "</tr>";
                        }
                }else{
                    if($semester!=""){echo "Not available";};
                }
                $conn->close();
            ?>
        </div>

        <?php include_once "footer.php";?>
    </body>
</html>