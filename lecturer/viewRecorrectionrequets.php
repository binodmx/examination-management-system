<?php 
    include_once "../classes/lecturer.php";
    include_once "../classes/student.php";
    include_once "../classes/module.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Recorrection Requests</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
     <style>
    form{
            padding-top: 50px;
        }
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
            box-sizing: border-box;
        }
        input, select, textarea {
            width: 85%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            float: right;
            box-sizing: border-box;
        }
          </style>
</head>
<body>
    <?php 
    include_once "header.php";
    include_once "sidebar.php";
    include_once "../footer.php";
    include_once ("../dbconnect.php");
    $lecturer = $_SESSION['user'];
    if(!isset($_SESSION['user'])){header("Location:../index.php");} 
     ?>
     <div class="middlediv">
        <form action="viewRecorrectionrequets.php" method="POST">
              <label>Module ID:</label>
            <select name="moduleid" required onchange ="this.form.submit();">
                <?php
                    $modules = $lecturer->getModules();
                    if(count($modules)>0){
                        if(!isset($_POST['moduleid'])){echo "<option value='null'>--Select module--</option>";}
                        foreach($modules as $moduleid){
                            if(isset($_POST['moduleid']) && $_POST['moduleid'] == $moduleid){$sel = "selected";}else{$sel="";}
                            echo "<option value='".$moduleid."' ".$sel.">".$moduleid."</option>";
                        }

                    } else {
                        echo "<option value='opt'>Not available</option>";
                    }
                ?>
            </select><br>
        </form>
         <?php
            if (isset($_POST['moduleid']) && $_POST['moduleid'] != "opt"){
                $moduleid = $_POST['moduleid'];
                $sql1 = "SELECT * FROM modules WHERE id='$moduleid'";
                $qry1 = $conn->query($sql1);
                $row1 = $qry1->fetch_assoc();
                $module = unserialize($row1['val']);
                $modulename = $module->getName();
                $sql = "SELECT * FROM  recorrectionrequests WHERE mid='$moduleid'";
                $qry = $conn->query($sql);
    
    if($qry->num_rows>0){
        $year=date("Y");
        $table = "<br><br><br><table><table style='margin-left:380px;'><caption>Recorrection Requests for ".$moduleid." - ".$modulename."</caption>";
                
        $table .= '<tr>
                        <th>Index Number</th>
                        <th>Full Name</th>
                        <th>Result</th>
                    </tr>';

        while($row = $qry->fetch_assoc()){
            $student =  unserialize($row['val']);
            $result = $student->getResult($moduleid);
            $id = $student->getId(); 
            $name = $student->getName();

            $table .= '<tr>';
            $table .= '<td>' . $id. '</td>';
            $table .= '<td>' . $name. '</td>';

            $table .= '<td>' . $result. '</td>';
            $table .= '</tr>';
        }
        $table .= '</table>';

        echo $table;

    } else {
        $table="";
        echo "Not available!";
    }
}
?>
  
     </div>
</body>
</html>