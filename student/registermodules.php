<?php
    $studentid = $_SESSION['studentid'];
    include_once "../dbconnect.php";
    // Update registered
    $updatesql = "UPDATE students SET registered='1'";
    $conn->query($updatesql);
    // Insert modules
    $moduleids=$_POST["id"];
    foreach ($moduleids as $moduleid){
        $modulesql = "SELECT name, semester FROM modules WHERE id='$moduleid'";
        $modulequery = $conn->query($modulesql);
        $modulerow = $modulequery->fetch_assoc();
        $name = $modulerow["name"];
        $semester= $modulerow["semester"];
        $insertsql ="INSERT INTO stu_".$studentid."_results VALUES ('$moduleid', '$name', '$semester', 'NA')";
        $conn->query($insertsql);
    }
    header("Location:profile.php");
?>