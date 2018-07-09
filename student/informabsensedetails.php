<?php
    include "../classes/student.php";
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inform Absense</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="../plugin/tinymce/init-tinymce.js"></script>
        <style>
            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
                box-sizing: border-box;
            }
            input, select, textarea {
                width: 85%;
                float:right;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                box-sizing: border-box;
            }
            input[type=submit] {
                background-color: #123456;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size:16px;
                float: right;
                box-sizing: border-box;
            }
            input[type=submit]:hover {
                opacity: 0.8;
            }
        </style>
        
</head>
<body>
    <?php
        include_once "header.php";
        include_once "sidebar.php";
        include_once "../footer.php";
    ?>
        <div class="middlediv">
            <br><br><br>
            <form action="informabsensedetails.php" method="POST">
                <label for="">Semester:</label>
                <select name="semester" onchange="this.form.submit()">
                    <?php if(!isset($_POST['semester'])){echo "<option value='0'>--Select semester--</option>";}?>
                    <option value="1" <?php if(isset($_POST['semester']) && $_POST['semester']=="1"){echo "selected";}?>>1</option>
                    <option value="2" <?php if(isset($_POST['semester']) && $_POST['semester']=="2"){echo "selected";}?>>2</option>
                    <option value="3" <?php if(isset($_POST['semester']) && $_POST['semester']=="3"){echo "selected";}?>>3</option>
                    <option value="4" <?php if(isset($_POST['semester']) && $_POST['semester']=="4"){echo "selected";}?>>4</option>
                    <option value="5" <?php if(isset($_POST['semester']) && $_POST['semester']=="5"){echo "selected";}?>>5</option>
                    <option value="6" <?php if(isset($_POST['semester']) && $_POST['semester']=="6"){echo "selected";}?>>6</option>
                    <option value="7" <?php if(isset($_POST['semester']) && $_POST['semester']=="7"){echo "selected";}?>>7</option>
                    <option value="8" <?php if(isset($_POST['semester']) && $_POST['semester']=="8"){echo "selected";}?>>8</option>
                </select>
                <br>
            </form>
            <form action="informabsensedetails.php" method="POST">
                <label>Module:</label>
                <select name="module">
                    <?php 
                        if(isset($_POST['semester'])){
                            if(!isset($_POST['module']) || $_POST['module']=="0"){echo "<option value='0'>--Select module--</option>";}
                            $student=$_SESSION['user'];
                            $semester=$_POST['semester'];
                            foreach($student->getModules($semester) as $moduleid){
                                echo "<option value='".$moduleid."'>".$moduleid."</option>";
                            }
                        }
                    ?>
                </select><br>
                <label>Reason for Absense:</label>
                <div style="margin-left: 195px;width:85%;">
                    <textarea class="tinymce" name="message" id="message" style="width:100%;"></textarea><br>
                </div>
                <input type="submit" name="submit" value="Submit">

            </form>
            <?php
                if(isset($_POST['module']) && isset($_POST['message'])){
                    $student = $_SESSION['user'];
                    $id = $student->getID();
                    $module=$_POST['module'];
                    $message=$_POST['message'];
                    include_once '../dbconnect.php';
                    $sql="INSERT INTO absensedetails (id, module, message) VALUES ('$id', '$module', '$message');";
                    if($conn->query($sql)===TRUE){
                        echo "<script type='text/javascript'>alert('Inform absense details successful!');</script>";
                    }
                }
            ?>
        </div>
    </body>
</html>