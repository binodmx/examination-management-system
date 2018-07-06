<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Downloads
        </title>
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
        </style>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>

        <div class="middle_bar">
        <br>
        <form action="downloads.php" method="POST">
            <label>Department :</label>
            <select name="department" onchange="this.form.submit()">
                <option value="bmd" <?php if(isset($_POST['department']) && $_POST['department']=='bmd'){echo "selected";}?>>Bio Medical Engineering</option>
                <option value="cse" <?php if(isset($_POST['department']) && $_POST['department']=='cse'){echo "selected";}?>>Computer Science and Engineering</option>
                <option value="civ" <?php if(isset($_POST['department']) && $_POST['department']=='civ'){echo "selected";}?>>Civil Engineering</option>
                <option value="che" <?php if(isset($_POST['department']) && $_POST['department']=='che'){echo "selected";}?>>Chemical and Process Engineering</option>
                <option value="ele" <?php if(isset($_POST['department']) && $_POST['department']=='ele'){echo "selected";}?>>Electrical Engineering</option>
                <option value="ent" <?php if(isset($_POST['department']) && $_POST['department']=='ent'){echo "selected";}?>>Electronic and Telecommunication Engineering</option>
                <option value="mec" <?php if(isset($_POST['department']) && $_POST['department']=='mec'){echo "selected";}?>>Mechanical Engineering</option>
                <option value="mat" <?php if(isset($_POST['department']) && $_POST['department']=='mat'){echo "selected";}?>>Material Sciences Engineering</option>
            </select><br><br>
            <label>Semester :   </label>
            <select name="semester" onchange="this.form.submit()">
                <option value="1" <?php if(isset($_POST['semester']) && $_POST['semester']==1){echo "selected";}?>>1</option>
                <option value="2" <?php if(isset($_POST['semester']) && $_POST['semester']==2){echo "selected";}?>>2</option>
                <option value="3" <?php if(isset($_POST['semester']) && $_POST['semester']==3){echo "selected";}?>>3</option>
                <option value="4" <?php if(isset($_POST['semester']) && $_POST['semester']==4){echo "selected";}?>>4</option>
                <option value="5" <?php if(isset($_POST['semester']) && $_POST['semester']==5){echo "selected";}?>>5</option>
                <option value="6" <?php if(isset($_POST['semester']) && $_POST['semester']==6){echo "selected";}?>>6</option>
                <option value="7" <?php if(isset($_POST['semester']) && $_POST['semester']==7){echo "selected";}?>>7</option>
                <option value="8" <?php if(isset($_POST['semester']) && $_POST['semester']==8){echo "selected";}?>>8</option>
            </select><br><br>
            <?php
                if(isset($_POST['semester']) && isset($_POST['department'])){
                    include_once "dbconnect.php";
                    $modulesql = "SELECT id, name FROM modules WHERE semester='".$_POST['semester']."' AND department='".$_POST['department']."'";
                    $modulequery = $conn->query($modulesql);
                    echo "<label>Module :</label>";
                    echo "<select name='module' onchange='this.form.submit()'>";
                    if($modulequery->num_rows>0){
                        
                        while($modulerow=$modulequery->fetch_assoc()){
                            $selected=isset($_POST['module']) && $_POST['module']==$modulerow['id'] ? 'selected':' ';
                            echo "<option value='".$modulerow['id']."' $selected>".$modulerow['id']." ".$modulerow['name']."</option>";
                        }
                        
                    }else{
                        echo "<option value='0' selected hidden></option>";
                    }
                    echo "</select><br><br>";
                }
            ?>
        </form>
        <?php
            include_once "dbconnect.php";
            
            if(isset($_POST['semester']) && isset($_POST['department']) && isset($_POST['module'])){
                $papersql = "SELECT id, year, link FROM papers WHERE id='".$_POST['module']."' AND semester='".$_POST['semester']."' AND department='".$_POST['department']."'";
                $paperquery = $conn->query($papersql);
                if($paperquery->num_rows>0){
                    echo "<br><br><p style='color:green;text-align:center;'>Available papers</p><br>";
                    $x=1;
                    while($paperrow=$paperquery->fetch_assoc()){
                        $modulesql = "SELECT name FROM modules WHERE id='".$paperrow['id']."'";
                        $modulequery = $conn->query($modulesql);
                        $modulerow = $modulequery->fetch_assoc();
                        echo "<p style='text-align:center;'>"."{$x}. ".$paperrow['id']." ".$modulerow['name']." - ".$paperrow['year']." paper ";
                        echo "<a href='".$paperrow['link']."' download>Download</a></p>";
                        $x=$x+1;
                    }
                }else{
                    echo "<br><br><p style='color:red;text-align:center;'>Not available!</p>";
                }
            }
        ?>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>