<!DOCTYPE html>
<html>
    <head>
        <title>
            EMS - UoM
        </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>
        <?php
            session_start();
            if(isset($_POST['usn']) && isset($_POST['pwd'])){
                // Database details
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ems";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                // Identify student
                $studentsql = "SELECT password FROM students WHERE id='".$_POST['usn']."'";
                $studentquery = $conn->query($studentsql);
                if($studentqueryrow = $studentquery->fetch_assoc()){
                    $studentpassword = $studentqueryrow["password"];
                    if($_POST['pwd']==$studentpassword){
                        $_SESSION['studentid']=$_POST['usn'];
                    }
                }else{
                    echo "not valid";
                }
            }
        ?>
        <div class="middle_bar">
            <h2 align='center'>Welcome to Examination Management System of University of Moratuwa</h2>
            <p align='center'>
                Examinations  Division provides various important student related services such as Student Registration, Undergraduate and Postgraduate Examinations Related Activities, Conducting Aptitude Tests, Issuing Examination Results, Issuing Academic Transcripts and Degree Certificates etc.
            </p>
        </div>
    
        <?php include_once "footer.php";?>
