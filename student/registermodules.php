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
            <form>
                <?php include_once "dbconnect.php"?>
                <?php
                    
                    session_start();

                    // Identify student
                    $studentid = $_SESSION['studentid'];
                    $studentsql = "SELECT semester, department FROM students WHERE id='".$studentid."'";
                    $studentquery = $conn->query($studentsql);
                    $studentqueryrow = $studentquery->fetch_assoc();
                    $semester = $studentqueryrow["semester"];
                    $department = $studentqueryrow["department"];

                    $registrationsql = "SELECT semester".$semester." FROM module_registration WHERE id='".$studentid."'";
                    $registrationquery = $conn->query($registrationsql);
                    $registrationqueryrow = $registrationquery->fetch_assoc();
                    $fieldname="semester".$semester;
                    $availability = $registrationqueryrow[$fieldname];

                    // Display available modules
                    if(!$availability){
                        $sql = "SELECT id, name, credits, gpa, compulsory FROM modules WHERE semester=".$semester;
                        $result = $conn->query($sql);
                        echo "<table align='center'>
                                <caption id='cpt1'>Available Modules for Semester ".$semester." - Department of ".$department."</caption>
                                <caption id='cpt2'>Selected Modules for Semester ".$semester." - Department of ".$department."</caption>
                                <div>
                                <tr>
                                    <th id='thselect'>Select</th>
                                    <th>Module ID</th>
                                    <th>Module Name</th>
                                    <th>Credits</th>
                                    <th>GPA</th>
                                    <th>Compulsory</th>
                                </tr></div>";
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                echo "<tr id='".$row["id"]."'>";
                                echo "<td name='tdchkbox'><input type='checkbox' name='chkbox' value='".$row["id"]."''></td>";
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
                    } else {
                        echo "There is no module registration avaiable for you currently!";
                    }
                ?>
                <input type="reset" id='btnReset'>
            </form>

            <!Check modules for registration>
            <button onclick="register()" id='btnRegister'>Register</button>

            <!Confirm registration & update the database>
            <button onclick="back()" id='btnBack' hidden>Back</button>
            <button onclick="confirm()" id='btnConfirm' hidden>Confirm</button>
        </div>
            
        <script>
            document.getElementById("cpt2").style.visibility="hidden";
            function register() {
                onConfirmMode();
            }
            function back(){
                offConfirmMode();
            }
            function confirm(){
                //module_registration
                //
            }
            function onConfirmMode(){
                document.getElementById("cpt1").style.visibility="hidden";
                document.getElementById("cpt2").style.visibility="visible";
                document.getElementById("btnRegister").style.display="none";
                document.getElementById("btnReset").style.display="none";
                document.getElementById("btnBack").style.display="block";
                document.getElementById("btnConfirm").style.display="block";
                var chkboxes=document.getElementsByName("chkbox");
                for(var i=0;i<chkboxes.length;i++){
                    if (!chkboxes[i].checked) {
                        document.getElementById(chkboxes[i].value).style.display="none";
                    }
                }
                var tds=document.getElementsByName("tdchkbox");
                document.getElementById("thselect").style.display="none";
                for(var j=0;j<tds.length;j++){
                    tds[j].style.display="none";
                }
            }
            function offConfirmMode(){
                document.getElementById("cpt1").style.visibility="visible";
                document.getElementById("cpt2").style.visibility="hidden";
                document.getElementById("btnRegister").style.display="block";
                document.getElementById("btnReset").style.display="block";
                document.getElementById("btnBack").style.display="none";
                document.getElementById("btnConfirm").style.display="none";
                var chkboxes=document.getElementsByName("chkbox");
                for(var i=0;i<chkboxes.length;i++){
                    if (!chkboxes[i].checked) {
                        document.getElementById(chkboxes[i].value).style.display="";
                    }                        
                }
                var tds=document.getElementsByName("tdchkbox");
                document.getElementById("thselect").style.display="";
                for(var j=0;j<tds.length;j++){
                    tds[j].style.display="";
                }
            }
        </script>

        <?php include_once "footer.php"; ?>
    </body>
</html>