<?php 
    include "../classes/student.php";
    session_start();
    include_once "../dbconnect.php";

    if (isset($_POST['submit'])) { 

        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['tel'];

        $student = $_SESSION['user'];
        $id = $student->getID();
        $student->setName($name);
        $student->setEmail($email);
        $student->setMobile($mobile);

        $val = serialize($student);

        $sql ="INSERT INTO convocationrequests(id, val) VALUES ('$id', '$val' )";
        if($conn->query($sql)===TRUE){
            header("Location:profile.php?msg=applyconvocationsuccessful");
        } else {
            header("Location:profile.php?msg=applyconvocationnotsuccessful");
        }
    }
?>
               