<?php 
    include_once "classes/module.php";
    include_once "classes/paper.php";
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Downloads</title>
        <style>
            * {
                box-sizing: border-box;
            }
            label {
                padding: 12px ;
                display: inline-block;
                float:left;
                margin-left:300px;
            }
            input, select, textarea {
                width: 50%;
                padding: 12px 5px ;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                float:right;
                margin-right:300px;
                
            }
            .mid_bar{
                font-family: "Open Sans";
                height: 490px;
                top: 190px;
                background-color:#d4d4d4 ;
                position: fixed;
                left:0; 
                width:100%;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script>
            function submitDepartment(){
                if(document.getElementById('mod')){
                    document.getElementById('mod').value = null;
                }
                document.getElementById('frm').submit();
            }  
            function submitSemester(){
                if(document.getElementById('mod')){
                    document.getElementById('mod').value = null;
                }
                document.getElementById('frm').submit();
            }  
        </script>
    </head>
<body>
<?php 
    include_once "header.php";
    include_once "footer.php";
?>
    <div class="mid_bar"><br>
    <form action="downloads.php" method="POST" id="frm">
        <label>Department :</label>
        <select name="department" onchange="submitDepartment()">
            <option value="bmd" <?php if(isset($_POST['department']) && $_POST['department']=='bmd'){echo "selected";}?>>Bio Medical Engineering</option>
            <option value="cse" <?php if(isset($_POST['department']) && $_POST['department']=='cse'){echo "selected";}?>>Computer Science and Engineering</option>
            <option value="civ" <?php if(isset($_POST['department']) && $_POST['department']=='civ'){echo "selected";}?>>Civil Engineering</option>
            <option value="che" <?php if(isset($_POST['department']) && $_POST['department']=='che'){echo "selected";}?>>Chemical and Process Engineering</option>
            <option value="ele" <?php if(isset($_POST['department']) && $_POST['department']=='ele'){echo "selected";}?>>Electrical Engineering</option>
            <option value="ent" <?php if(isset($_POST['department']) && $_POST['department']=='ent'){echo "selected";}?>>Electronic and Telecommunication Engineering</option>
            <option value="mec" <?php if(isset($_POST['department']) && $_POST['department']=='mec'){echo "selected";}?>>Mechanical Engineering</option>
            <option value="mat" <?php if(isset($_POST['department']) && $_POST['department']=='mat'){echo "selected";}?>>Material Sciences Engineering</option>
        </select><br><br><br>
        <label>Semester :   </label>
        <select name="semester" onchange="submitSemester()">
            <option value="1" <?php if(isset($_POST['semester']) && $_POST['semester']==1){echo "selected";}?>>1</option>
            <option value="2" <?php if(isset($_POST['semester']) && $_POST['semester']==2){echo "selected";}?>>2</option>
            <option value="3" <?php if(isset($_POST['semester']) && $_POST['semester']==3){echo "selected";}?>>3</option>
            <option value="4" <?php if(isset($_POST['semester']) && $_POST['semester']==4){echo "selected";}?>>4</option>
            <option value="5" <?php if(isset($_POST['semester']) && $_POST['semester']==5){echo "selected";}?>>5</option>
            <option value="6" <?php if(isset($_POST['semester']) && $_POST['semester']==6){echo "selected";}?>>6</option>
            <option value="7" <?php if(isset($_POST['semester']) && $_POST['semester']==7){echo "selected";}?>>7</option>
            <option value="8" <?php if(isset($_POST['semester']) && $_POST['semester']==8){echo "selected";}?>>8</option>
        </select><br><br><br>

        <?php
            if(isset($_POST['semester']) && isset($_POST['department'])){
                include_once "dbconnect.php";
                $sql = "SELECT * FROM modules";
                $qry = $conn->query($sql);
                echo "<label>Module :</label>";
                echo "<select name='module' onchange='this.form.submit()' id='mod'>";
                if(!isset($_POST['module'])){echo "<option value='empty'>--Select module--</option>";}
                if($qry->num_rows>0){
                    while($row = $qry->fetch_assoc()){
                        $module = unserialize($row['val']);                   
                        if ($_POST['department'] == $module->getDepartment() && $module->getSemester() == $_POST['semester']){
                            if (isset($_POST['module']) && $_POST['module'] == $module->getID()){
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option value='".$module->getID()."' $selected>".$module->getID()." ".$module->getName()."</option>";
                        }
                    }
                }else{
                    echo "<option value='0' selected hidden></option>";
                }
                echo "</select><br>";
            }
        ?>
    </form>
                <?php 
        // show papers
        include_once "dbconnect.php";
        if(isset($_POST['semester']) && isset($_POST['department']) && isset($_POST['module'])){
            $psql = "SELECT * FROM papers WHERE id='".$_POST['module']."'";
            $pqry = $conn->query($psql);
            if($pqry->num_rows>0){
                echo "<br><br><p style='color:green;text-align:center;'>Available papers</p><br>";
                $x=1;
                while($prow=$pqry->fetch_assoc()){
                    $paper = unserialize($prow['val']);
                    $msql = "SELECT * FROM modules WHERE id='".$paper->getID()."'";
                    $mqry = $conn->query($msql);
                    $mrow = $mqry->fetch_assoc();
                    $module = unserialize($mrow['val']);
                    echo "<p style='text-align:center;'>"."{$x}. ".$module->getID()." ".$module->getName()." - ".$paper->getYear()." paper ";
                    echo "<a href='".$paper->getLink()."' download>Download</a></p>";
                    $x=$x+1;
                }
            }else{
                echo "<br><br><p style='color:red;text-align:center;'>Not available!</p>";
            }
        }

    ?>
    </div>
</body>
</html>