<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Edit Profile
        </title>
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
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: right;
                box-sizing: border-box;
            }

        </style>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php
            // Session availability
            if(!isset($_SESSION['adminid'])){header("Location:../index.php");}
            $id=$_SESSION['adminid'];

            include_once "header.php";
            include_once "sidebar.php";   
            include_once "../dbconnect.php";

            if(isset($_POST['status'])){
                // Update data
                $name=$_POST['name'];
                $mobile=$_POST['mobile'];
                $email=$_POST['email'];
                $password=$_POST['pwd2'];
                $updatesql = "UPDATE admins SET name='$name', email='$email', mobile='$mobile' WHERE id='$id'";
                if($conn->query($updatesql)===TRUE){header("Location:profile.php");}
            }else{
                // Get data
                $adminssql = "SELECT id, name, password, email,mobile FROM admins WHERE id='$id'";
                $adminsquery = $conn->query($adminssql);
                $adminsqueryrow = $adminsquery->fetch_assoc();

               // View data
                echo 
                    "<div class='middlediv'>
                        <form action='lecEditprofile.php' method='POST'>
                            <br><br><br><br>    
                            <label>Index no: </label><input type='text' name='id' value='".$adminsqueryrow ['id']."' disabled><br>
                            <label>Full Name: </label><input type='text' name='name' value='".$adminsqueryrow ['name']."'><br>
                            <label>Email: </label><input type='email' name='email' value='".$adminsqueryrow ['email']."' required><br>
                           <label>Mobile: </label><input type='tel' name='mobile' value='".$adminsqueryrow ['mobile']."' maxlength='10' required><br>
                            <label>Current Password: </label><input type='password' name='pwd1'required><br>
                            <label>New password: </label><input type='password' name='pwd2'required><br>
                            <label>Confirm password: </label><input type='password' name='pwd2' required><br><br>
                            <input type='text' name='status' value='update' hidden>
                            <input type='submit' value='Update Profile'>
                        </form>
                    </div>";
            }
        ?>
<?php include_once "footer.php";?>
    </body>
</html>
