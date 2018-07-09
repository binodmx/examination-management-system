<?php 
    include_once "../classes/paper.php";
    include_once "../dbconnect.php";
    if (isset($_POST['submit'])) {
        $id= $_POST['moduleCode'];
        $year = $_POST['year'];
        $semester =$_POST['semester'];
        $department = $_POST['department'];
        $file =$_FILES['file'];
        $name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];  
        $fileError =$_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        if ($fileError===0) {
           $location = "../papers/{$id}/";
            if(!is_dir($location)){
                mkdir($location,"0777",true);
            }

            $temp = explode(".", $_FILES["file"]["name"]);
            $newfilename = $year . '.' . end($temp);
            $target =($location).($newfilename);
            $link = ("papers/{$id}/").($newfilename);
                    
            if (move_uploaded_file($tmp_name,$target)){
                $paper = new Paper($id, $year, $semester, $department, $link);
                $val = serialize($paper);
                $sql ="INSERT INTO papers (id, year, val) VALUES ('$id', '$year', '$val')";

                if($conn->query($sql)===TRUE){header("Location:uploadpastpapers.php?msg=uploadsuccessful");}
            }
        } else {
            header("Location:uploadpastpapers.php?msg=uploadunsuccessful");
        }
    }
?>