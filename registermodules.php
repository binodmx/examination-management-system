<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <title>
            EMS - UoM
        </title>
    </head>
    <body>
        <?php include_once "header.php"; ?>
        <div class="middle_bar">
            <form action="#" method="POST">
                <?php
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

                    $sql = "SELECT id, name, credits, gpa, compulsory FROM modules";
                    $result = $conn->query($sql);
                    echo "<table align='center'>
                            <caption>Available Modules for Semester x - Department</caption>
                            <div>
                            <tr>
                                <th>Select</th>
                                <th>Module ID</th>
                                <th>Module Name</th>
                                <th>Credits</th>
                                <th>GPA</th>
                                <th>Compulsory</th>
                            </tr></div>";
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo "<tr id='".$row["id"]."'>";
                            echo '<td><input type="checkbox" name="id[]" value="'.$row["id"].'"></td>';
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>".$row["credits"]."</td>";
                            if($row["gpa"]){
                                echo "<td>Yes</td>";
                            }else{
                                echo "<td>No</td>";
                            }
                            if($row["compulsory"]){
                                echo "<td>Compulsory</td>";
                            }else{
                                echo "<td>Elective</td>";
                            }
                            echo "</tr>";
                        }
                    }else{
                        echo "Not available";
                    }
                    $conn->close(); 
                    echo "</table>";
                ?>
                <input type="reset">
                <input type="submit" value="Submit" hidden>
                <?php $Modules=$_POST['id'];?>
            </form>
            <button onclick="register()" id='btnRegister'>Register</button>
            <button onclick="back()" id='btnBack'>Back</button>
            <button onclick="confirm()" id='btnConfirm'>Confirm</button>
        </div>
            
            <script>
                function register() {
                    onConfirmMode();
                }
                function back(){
                    offConfirmMode();
                }
                function onConfirmMode(){
                    var x=document.getElementById("btnRegister");
                    x.style.display = "none";
                }
                function offConfirmMode(){
                    var x=document.getElementById("btnRegister");
                    x.style.display = "";
                }
            </script>
        <?php include_once "footer.php"; ?>
    </body>
</html>