<?php
include"../classes/user.php";
include "../classes/student.php";
session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>Apply Repeat Exams
        </title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <style>
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
            box-sizing: border-box;
        }
        input, select, textarea {
            width: 85%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            float: right;
            box-sizing: border-box;
        }
        input[type=submit] {
            background-color: #123456;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            font-size:16px;
            box-sizing: border-box;
        }
        input[type=submit]:hover {
            opacity: 0.8;
        }
    </style>
    <body>

        <?php 
            include_once "header.php";
            include_once "sidebar.php";
            include_once "../footer.php";
            include_once "../dbconnect.php";
        ?>

        <div class="middlediv">
            <h2>Application for repeat exams </h2><br>
            <?php
            if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability
            $student = $_SESSION['user'];
            $modules=array();
            $repeatmodules=array();
            $semester =$student->getSemester();
            $modulelist=$student->getResults();
            
            foreach ($modulelist as $key=>$value){
                if($value=='iwe'){
                    array_push($repeatmodules,$key);
                }
            }


            $id = $student->getId();
            $name = $student->getName();
            $email = $student->getEmail();
            $mobile = $student->getMobile();

            if ($student->getFaculty()=='en'){
                $faculty = 'Engineering';
            }
            switch ($student->getDepartment()){
                case 'bmd':
                    $department = 'Bio Medical Engineering';
                    break;
                case 'cse':
                    $department = 'Computer Science and Engineering';
                    break;
                case 'civ':
                    $department = 'Civil Engineering';
                    break;
                case 'che':
                    $department = 'Chemical and Process Engineering';
                    break;
                case 'ele':
                    $department = 'Electrical Engineering';
                    break;
                case 'ent':
                    $department = 'Electronic and Telecommunication Engineering';
                    break;
                case 'mec':
                    $department = 'Mechanical Engineering';
                    break;
                case 'mat':
                    $department = 'Material Sciences Engineering';
                    break;
            }


            ?>
            <form action="applyrepeatexams.php" method='POST'>
                <label>Index no: </label><input type="text" name="id" value="<?php echo($id) ?>" required disabled><br>
                <label>Name: </label><input type="text" name="name" value="<?php echo($name)  ?>" disabled><br>
                <label>Faculty: </label><input type="text" name="faculty" value="<?php echo($faculty) ?>" required disabled><br>
                <label>Module Code:</label><select name="module" id="module">
                    <?php
                        if(sizeof($repeatmodules)>0){
                            foreach ($repeatmodules as $m){
                                echo "<option value='";
                                echo $m;
                                echo "'>";
                                echo $m;
                                echo '</option>';
                            }
                        }else{
                            echo '<option value="Norepeatedmodules">No repeated modules</option>';
                        }
                    ?>
                </select><br>
                <label>Department: </label><input type="text" name="department" value="<?php echo($department) ?>"  required disabled><br><br>
                <input type="submit" name='submit' value='Apply'>

            </form>
            <?php
                include_once "../dbconnect.php";
                if(isset($_POST['module'])){
                    $m=$_POST['module'];
                    if($m!='Norepeatedmodules'){
                        $student = $_SESSION['user'];
                        $s=serialize($student);
                        $id = $_POST['id'];
                        $sql="INSERT INTO repeatexamrequests (id, module, val) VALUES ('$id', '$m','$s')";
                        $result=mysqli_query($conn,$sql);
                        header("Location:profile.php?msg=applyrepeatexamssuccessfull");
                    }

                }
            ?>



        </div>
    </body>
</html>