<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign Up
        </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>
        <div class="signupform clearfix">
            <div  class="form">
                <form id="f" action="index.php" method='POST'>
                    <label>Index no</label> <input type="text" name="id"><br>
                    <label>Full Name</label> <input type="text" name="firstname"><br>
                    <label>Email</label> <input type="email" name="email"><br>
                    <label>Mobile</label> <input type="number" name="tel"><br>
                    <label>Username</label> <input type="text" name="usn"><br>
                    <label>Password</label> <input type="password" name="pwd1"><br>
                    <label>Confirm password </label><input type="password" name="pwd2"><br>
                    <button type="submit" name="submit"> Sign In</button><br>
                </form>
            </div>
        </div>

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

        // Get data
        $studentsql = "SELECT password FROM students WHERE id='".$_POST['usn']."'";
        $studentquery = $conn->query($studentsql);
        <?php include_once "footer.php";?>
