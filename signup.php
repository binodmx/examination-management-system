<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign Up
        </title>
        <style>
            .login {
                width: 500px;
                margin: 20px auto;
                font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
                font-size: 16px;
                
            }
            .login h1{
                color: #00004d;
            }

            .login p{
                margin-bottom: 15px;
                padding-left: 10px;
                padding-right: 10px;

            }
            .error{
                background-color: red;
                padding: 10px;
                color: white;
            }
            .login input,select{
                
                width: 100%;
                padding: 5px ;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;

            }
            .login button{
                width: 100%;
                padding: 8px;
                background:  #123456;
                font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
                color: white;
                font-size: 16px;
                border:none;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                
            }
            .login button:hover {
                opacity: 0.8;
            }
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
            .column {
                float: left;
                width: 50%;
            }
        </style>
    </head>
    <body>
        <?php include_once "header.php";?>
        <!signup form>
        <div class="middle_bar">
        <div class="login">
            <form action="signup.php" method='POST'>
            <fieldset>
                <legend align="center"><h1>Sign up</h1></legend><br>
                <div class="row">
                    <div class="column">
                    <p><label>Index no: </label><input type="text" name="id"  required placeholder="Enter index number" value=<?php if(isset($_POST['id'])){echo $_POST['id'];}?>></p>
                    <p><label>Full Name: </label><input type="text" name="fn"  required placeholder="Enter full name" value=<?php if(isset($_POST['fn'])){echo $_POST['fn'];}?>></p>
                    <p><label>NIC no: </label><input type="text" name="ni"  required maxlength="12" placeholder="Enter National Identity Card number" value=<?php if(isset($_POST['ni'])){echo $_POST['ni'];}?>></p>
                    <p><label>Faculty : </label>
                        <select name='fa' required onchange="this.form.submit()">
                            <option value='en' <?php if(isset($_POST['fa']) && $_POST['fa']=='en'){echo "selected";}?>>Engineering</option>
                            <option value='ar' <?php if(isset($_POST['fa']) && $_POST['fa']=='ar'){echo "selected";}?>>Architecture</option>
                            <option value='it' <?php if(isset($_POST['fa']) && $_POST['fa']=='it'){echo "selected";}?>>Information Technology</option>
                        </select></p>
                    <p><label>Department : </label>
                        <select name='dp' <?php if(isset($_POST['fa']) && $_POST['fa']!='en'){echo "hidden";}?>>
                            <option value="bmd" <?php if(isset($_POST['dp']) && $_POST['dp']=='bmd'){echo "selected";}?>>Bio Medical Engineering</option>
                            <option value="cse" <?php if(isset($_POST['dp']) && $_POST['dp']=='cse'){echo "selected";}?>>Computer Science and Engineering</option>
                            <option value="civ" <?php if(isset($_POST['dp']) && $_POST['dp']=='civ'){echo "selected";}?>>Civil Engineering</option>
                            <option value="che" <?php if(isset($_POST['dp']) && $_POST['dp']=='che'){echo "selected";}?>>Chemical and Process Engineering</option>
                            <option value="ele" <?php if(isset($_POST['dp']) && $_POST['dp']=='ele'){echo "selected";}?>>Electrical Engineering</option>
                            <option value="ent" <?php if(isset($_POST['dp']) && $_POST['dp']=='ent'){echo "selected";}?>>Electronic and Telecommunication Engineering</option>
                            <option value="mec" <?php if(isset($_POST['dp']) && $_POST['dp']=='mec'){echo "selected";}?>>Mechanical Engineering</option>
                            <option value="mat" <?php if(isset($_POST['dp']) && $_POST['dp']=='mat'){echo "selected";}?>>Material Sciences Engineering</option>
                            <option value="" hidden <?php if(isset($_POST['fa']) && $_POST['fa']!='en'){echo "selected";}?>></option>
                        </select></p>
                    </div>
                    <div class="column">
                    <p><label>Semester : </label>
                        <select name="sm">
                            <option value="1" <?php if(isset($_POST['sm']) && $_POST['sm']==1){echo "selected";}?>>1</option>
                            <option value="2" <?php if(isset($_POST['sm']) && $_POST['sm']==2){echo "selected";}?>>2</option>
                            <option value="3" <?php if(isset($_POST['sm']) && $_POST['sm']==3){echo "selected";}?>>3</option>
                            <option value="4" <?php if(isset($_POST['sm']) && $_POST['sm']==4){echo "selected";}?>>4</option>
                            <option value="5" <?php if(isset($_POST['sm']) && $_POST['sm']==5){echo "selected";}?>>5</option>
                            <option value="6" <?php if(isset($_POST['sm']) && $_POST['sm']==6){echo "selected";}?>>6</option>
                            <option value="7" <?php if(isset($_POST['sm']) && $_POST['sm']==7){echo "selected";}?>>7</option>
                            <option value="8" <?php if(isset($_POST['sm']) && $_POST['sm']==8){echo "selected";}?>>8</option>
                        </select></p>
                    <p><label>Email: </label><input type="email" name="em"  required placeholder="Enter email address" value=<?php if(isset($_POST['em'])){echo $_POST['em'];}?>></p>
                    <p><label>Mobile: </label><input type="number" name="mo"  required maxlength="10" placeholder="Enter mobile number" value=<?php if(isset($_POST['mo'])){echo $_POST['mo'];}?>></p>
                    <p><label>Password: </label><input type="password" name="p1"  required placeholder="Enter password" value=<?php if(isset($_POST['p1']) && $_POST['p1']!=""){echo $_POST['p1'];}?>></p>
                    <p><label>Confirm password: </label><input type="password" name="p2"  required placeholder="Renter password" value=<?php if(isset($_POST['p2']) && $_POST['p2']!=""){echo $_POST['p2'];}?>></p>
                    </div>
                    <p><button type="submit" >Sign Up</button></p>
                </div>
            </fieldset>
            </form>
        </div>
        </div>
        <!signup procedure>
        <?php
            if(isset($_POST['id']) && isset($_POST['fn'])  && isset($_POST['em']) && isset($_POST['mo']) && isset($_POST['p1']) && isset($_POST['p2']) && $_POST['id']!="" && $_POST['p1']!=""){
                // checking password
                if( $_POST['p1']!=$_POST['p2']){
                    echo "Passwords do not match";
                }else{
                    // checking index number
                    if(strlen($_POST['id'])!=7){
                        echo "Invalid index number";
                    }else{
                        include_once "dbconnect.php";
                        $sql = "SELECT id FROM students WHERE id='".$_POST['id']."'";
                        $qry = $conn->query($sql);
                        if($qry->num_rows>0){
                            echo "You have already registered!";
                        }else{
                            // register student
                            $id=$_POST['id'];$fn=$_POST['fn'];$ni=$_POST['ni'];$fa=$_POST['fa'];
                            $dp=$_POST['dp'];$sm=$_POST['sm'];$p1=md5($_POST['p1']);$mo=$_POST['mo'];$em=$_POST['em'];
                            $sql="INSERT INTO students VALUES ('$id', '$fn', '$ni', '$fa', '$dp','$sm','$p1','$mo','$em','0')";
                            if($conn->query($sql)===TRUE){header("Location:signin.php");}
                        }
                    }
                }
            }
            include_once "footer.php";
        ?>

    </body>
</html>
