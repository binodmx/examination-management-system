<?php 
    include_once "../classes/module.php";
    include_once "../classes/lecturer.php";
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Assign Lecturer</title>
        <style>
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
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php
            if(isset($_GET['msg']) && $_GET['msg'] == 'assignlecturersuccessful'){echo "<script type='text/javascript'>alert('Assign lecturer successful!');</script>";}
            if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability

            include_once "header.php";
            include_once "sidebar.php";  
            include_once "../footer.php"; 
            include_once "../dbconnect.php";

            if(isset($_POST['status'])){ // Update data
                $lid = $_POST['lid'];
                $mid = $_POST['mid'];

                $sql = "SELECT * FROM lecturers WHERE id='$lid'";
                $qry = $conn->query($sql);
                $row = $qry->fetch_assoc();
                $lecturer = unserialize($row['val']);
                $lecturer->addModule($mid);
                $_POST = array();
                $val = serialize($lecturer);
                $sql = "UPDATE lecturers SET val='$val' WHERE id='$lid'";                
                if($conn->query($sql)===TRUE){header("Location:assignlecturer.php?msg=assignlecturersuccessful");}

            } else {  // get data

                echo 
                    "<div class='middlediv'>
                        <form action='assignlecturer.php' method='POST'>
                            <br><br><br>   
                            <label>Lecturer ID: </label>
                                <select name='lid'>";
                $sql = "SELECT * FROM lecturers";
                $qry = $conn->query($sql);
                if($qry->num_rows>0){
                    while($row = $qry->fetch_assoc()){
                        echo "<option value='".$row['id']."' >".$row['id']."</option>";
                    }
                }

                echo
                                "</select><br>
                            <label>Module ID: </label>
                                <select name='mid'>";

                $msql = "SELECT * FROM modules";
                $mqry = $conn->query($msql);
                if($mqry->num_rows>0){
                    while($mrow = $mqry->fetch_assoc()){
                        echo "<option value='".$mrow['id']."' >".$mrow['id']."</option>";
                    }
                }

                echo         "</select>
                            </select>
                            <input type='text' name='status' value='update' hidden><br><br>
                            <input type='submit' style='background-color:#123456;' value='Assign Lecturer'>
                        </form>
                    </div>";
            }
        ?>
    </body>
</html>
