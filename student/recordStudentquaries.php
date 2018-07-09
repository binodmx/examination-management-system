<?php 
    include "../classes/student.php";
    session_start();
    include_once "../dbconnect.php";

    if (isset($_POST['submit'])) { 

        $id=$_POST['id'];
        $subject=$_POST['subject'];

        $student = $_SESSION['user'];
        $val = serialize($student);
        $year = date("Y");
        $month = date("m");
        $sql ="INSERT INTO adminquaries(year,month,id, val,subject) VALUES ($year,$month,'$id', '$val' ,$subject)";
        if($conn->query($sql)===TRUE){
            header("Location:profile.php?msg=applyconvocationsuccessful");
        } 
    }
?>
               