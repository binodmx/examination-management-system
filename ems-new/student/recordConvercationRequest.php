 <div class="middlediv">
            <?php 
                include_once "../dbconnect.php";

                if (isset($_POST['submit'])) {
                    
                    $id=$_POST['id'];
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $mobile=$_POST['tel'];
                    $faculty=$_POST['faculty'];
                    $department=$_POST['department'];
                    $insertsql ="INSERT INTO `convocation` (`id`, `name`, `email`, `mobile`, `faculty`, `department`) VALUES ('$id', '$name', '$email', '$mobile', '$faculty', '$department')";
                    $conn->query($insertsql);
                    header("Location:profile.php");
                }
                else{
                $studentsql = "SELECT id, name, mobile, email,faculty,department FROM students WHERE id='$id'";
                $studentquery = $conn->query($studentsql);
                $studentqueryrow = $studentquery->fetch_assoc();
               