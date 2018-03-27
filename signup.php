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
        <div class="signupform">
            <form action="index.php" method='POST'>
                Index no: <input type="text" name="id"><br>
                Full Name: <input type="text" name="firstname"><br>
                Email: <input type="email" name="email"><br>
                Mobile: <input type="number" name="tel"><br><br>

                Username: <input type="text" name="usn"><br>
                Password: <input type="password" name="pwd1"><br>
                Confirm password: <input type="password" name="pwd2"><br>
                <input type="submit" value="Sign Up">
            </form>
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
    </body>
</html>
