<?php
include"../classes/user.php";
include "../classes/student.php";
session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Results
        </title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../plugin/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="../plugin/tinymce/init-tinymce.js"></script>
    <script>
        function showModules(s1,s2) {
            <?php
            $student=$_SESSION['user'];
            ?>
            var s1=document.getElementById(s1);
            var s2=document.getElementById(s2);
            s2.innerHTML="";
            switch (s1.value){
                case '1':
                    var optionArray=<?php
                                        if (array_key_exists('1',$student->getModuleArray())){
                                            echo json_encode($student->getModules('1'));
                                        }else{
                                            echo '[]';
                                        }

                                        ?>;
                    break;
                case '2':
                    var optionArray=<?php
                                        if (array_key_exists('2',$student->getModuleArray())){
                                            echo json_encode($student->getModules('2'));
                                        }else{
                                            echo '[]';
                                        }

                        ?>;
                    break;
                case '3':
                    var optionArray=<?php
                        if (array_key_exists('3',$student->getModuleArray())){
                            echo json_encode($student->getModules('3'));
                        }else{
                            echo '[]';
                        }

                        ?>;
                    break;
                case '4':
                    var optionArray=<?php
                        if (array_key_exists('4',$student->getModuleArray())){
                            echo json_encode($student->getModules('4'));
                        }else{
                            echo '[]';
                        }

                        ?>;
                    break;
                case '5':
                    var optionArray=<?php
                        if (array_key_exists('5',$student->getModuleArray())){
                            echo json_encode($student->getModules('5'));
                        }else{
                            echo '[]';
                        }

                        ?>;
                    break;
                case '6':
                    var optionArray=<?php
                        if (array_key_exists('6',$student->getModuleArray())){
                            echo json_encode($student->getModules('6'));
                        }else{
                            echo '[]';
                        }

                        ?>;
                    break;
                case '7':
                    var optionArray=<?php
                        if (array_key_exists('7',$student->getModuleArray())){
                            echo json_encode($student->getModules('7'));
                        }else{
                            echo '[]';
                        }

                        ?>;
                    break;
                case '8':
                    var optionArray=<?php
                        if (array_key_exists('8',$student->getModuleArray())){
                            echo json_encode($student->getModules('8'));
                        }else{
                            echo '[]';
                        }

                        ?>;
                    break;
            }
            for (var option in optionArray){
                var newOption=document.createElement("option");
                newOption.innerHTML=optionArray[option];
                s2.options.add(newOption);

            }
        }
    </script>
    <body>
        <?php
            include_once "header.php";
            include_once "sidebar.php";

        ?>
        <div class="middlediv">
            <form action="informabsensedetails.php" method="post">
                <label for="">Semester</label>
                <select name="semester" id="semester" onchange="return showModules(this.id,'module');">
                    <option value="0" >Choose a Semester </option>
                    <option value="1" >Semester 1</option>
                    <option value="2" >Semester 2</option>
                    <option value="3" >Semester 3</option>
                    <option value="4" >Semester 4</option>
                    <option value="5" >Semester 5</option>
                    <option value="6" >Semester 6</option>
                    <option value="7" >Semester 7</option>
                    <option value="8" >Semester 8</option>
                </select>
                <br>
                <label for="">Module</label>
                <select name="module" id="module">
                    <option value="">Choose a Module</option>
                </select>
                <textarea class="tinymce" name="message" id="message"></textarea>
                <button type="submit">Submit</button>

            </form>
            <?php

                if(isset($_POST['module']) && isset($_POST['message'])){
                    $student=serialize($_SESSION['user']);
                    $module=$_POST['module'];
                    $message=$_POST['message'];
                    include_once '../dbconnect.php';
                    $sql="INSERT INTO absensemessages (student,module,message) VALUES ('$student','$module','$message');";
                    mysqli_query($conn,$sql);
                }

            ?>
        </div>

        <?php include_once "footer.php";?>
    </body>
</html>