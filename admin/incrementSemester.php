<?php
    include_once "../classes/student.php";
    include_once "../classes/module.php";
    session_start();
    $admin = $_SESSION['user'];
    include_once "../dbconnect.php";
    $query ="SELECT * FROM students";
    $result_set = mysqli_query($conn,$query);
    $err="0";
    if ($result_set) {
        while ($record=mysqli_fetch_assoc($result_set)) {
            $student =  unserialize($record['val']);
            $semester = (int) $student->getSemester(); 
            if ($_POST['batch']==$student->getBatch()){
                if ($semester < 8 ) {$newSemester = (int) $semester+1;}else{$newSemester=8;}
                $student->setSemester($newSemester);
                $id = $student->getID();
                $val = serialize($student);
                $sql ="UPDATE students SET val='$val' WHERE id='$id'";
                if($conn->query($sql)===TRUE){
                    $err="0";
                } else {
                    $err="1";
                }
            }
        }
    }
    if ($err=="0"){
        header("Location:selectSemestersToIncrement.php?msg=incrementSemestersuccessful");
    }
?>
