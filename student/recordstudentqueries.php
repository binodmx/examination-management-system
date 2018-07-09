<?php 
    include "../classes/student.php";
    session_start();
    include_once "../dbconnect.php";

    if (isset($_POST['submit'])) { 
        $message=$_POST['message'];
        $student = $_SESSION['user'];
        $id = $student->getID();
        $time = date("Y m d h:i:s");
        $year = date("Y");
        $month = date("m");
        $sql ="INSERT INTO studentqueries(id, time, year, month, message) VALUES ('$id', '$time', '$year', '$month', '$message')";
        if($conn->query($sql)===TRUE){
            header("Location:profile.php?msg=informadministrationsuccessful");
        } else {
            header("Location:contactAdmin.php?msg=informadministrationnotsuccessful");
        }
    } else {
        header("Location:contactAdmin.php?msg=informadministrationnotsuccessful");
    }
?>
               