<?php
    include_once "../classes/student.php";
    include_once "../classes/module.php";
    session_start();
    $admin = $_SESSION['user'];
    include_once "../dbconnect.php";
    $query ="SELECT * FROM students";
    $result_set = mysqli_query($conn,$query);
    if ($result_set) {
        while ($record=mysqli_fetch_assoc($result_set)) {
            $student =  unserialize($record['val']);
            $semester =$student->getSemester(); 
            if ($semester <8 ) {$newSemester =$semester+1;}
            $student->setSemester($newSemester);
            $id = $student->getID();
            $val = serialize($student);
            $sql ="UPDATE students SET val='$val' WHERE id='$id'";
            if($conn->query($sql)===TRUE){
                header("Location:selectSemestersToIncrement.php?msg=incrementSemestersuccessful");
            } 

        }

    }
?>
