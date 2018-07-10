<?php
include "../classes/student.php";
session_start();
include_once "../dbconnect.php";
    if(isset($_POST['submit'])){
        $mid = $_POST['moduleid'];
        $student = $_SESSION['user'];
        $sid= $student->getID();
        $val = serialize($student);
        $sql = "SELECT * FROM  recorrectionrequests WHERE mid='$mid' AND sid='$sid'";
        $qry = $conn->query($sql);
        if($qry->num_rows>0){   // check whether already a user or not
            $_POST = array();
                header("Location:applyrecorrection.php?msg=alreadyappliedrecorrection");
        }else {
                $sql ="INSERT INTO recorrectionrequests(mid,sid, val) VALUES ('$mid','$sid','$val')";
                if($conn->query($sql)===TRUE){
                header("Location:applyrecorrection.php?msg=applyconvocationsuccessful");
                } else {
                    header("Location:applyrecorrection.php?msg=applyconvocationnotsuccessful");
                    }
        }
    }
       
       
        
            
        ?>
