<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Results
        </title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <style>
              label {
                padding: 8px 8px 8px 0;
                display: inline-block;
            }
            input, select, textarea {
                width: 85%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                float: right;
            }
             button {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                margin: 6px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }
            button:hover {
                opacity: 0.8;
            }
        </style>
    </head>
    <body>

      <?php
            // Session availability
            if(!isset($_SESSION['studentid'])){header("Location:../index.php");}
            $id=$_SESSION['studentid'];

            include_once "header.php";
            include_once "sidebar.php";   
            include_once "../dbconnect.php";


                if (isset($_POST['submit'])) {
                    
                    //$id=$_POST['id'];
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $mobile=$_POST['tel'];
                    $faculty=$_POST['faculty'];
                    $department=$_POST['department'];
                    $sql = mysqli_query("SELECT id FROM convocation WHERE id = '$id'");

                    if (mysqli_num_rows($sql) > 0) {
                                  echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
                    }else {
                    
                    $insertsql ="INSERT INTO `convocation` (`id`, `name`, `email`, `mobile`, `faculty`, `department`) VALUES ('$id', '$name', '$email', '$mobile', '$faculty', '$department')";
                    $conn->query($insertsql);
                    header("Location:profile.php");
                }
            }

                else{
                $studentsql = "SELECT id, name, mobile, email,faculty,department FROM students WHERE id='$id'";
                $studentquery = $conn->query($studentsql);
                $studentqueryrow = $studentquery->fetch_assoc();
               
         echo 
           
        "<div class='middlediv'>
            <form action='applyconvocation.php' method='POST'>
                <label>Index no: </label><input type='text' name='id' value='".$studentqueryrow['id']."' required disabled><br><br><br>
                <label>Full Name: </label><input type='text' name='name' value='".$studentqueryrow['name']."' required><br><br>
                <label>Email: </label><input type='email' name='email' value='".$studentqueryrow['email']."' required><br><br>
                <label>Mobile: </label><input type='number' name='tel' value='".$studentqueryrow['mobile']."' required maxlength='10'><br><br>
                <label>Faculty: </label><input type='text' name='faculty' value='".$studentqueryrow['faculty']."'  required ><br><br>
                <label>Department: </label><input type='text' name='department' value='".$studentqueryrow['department']."' required ><br><br>
                <button type='submit' name='submit' >Submit</button>
            </form>
        </div>
        </div>";
         }
   ?>
        <?php include_once "footer.php";?>
    </body>
</html>