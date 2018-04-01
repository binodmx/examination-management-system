<!DOCTYPE html>
<html>
    <head>
        <title>
            Downloads
        </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>

        <div class="middle_bar">
        <form>
            Department :
            <select name="dept">
                <option value="bmd">Bio Medical Engineering</option>
                <option value="cse" selected>Computer Science and Engineering</option>
                <option value="civ">Civil Engineering</option>
                <option value="che">Chemical and Process Engineering</option>
                <option value="ele">Electrical Engineering</option>
                <option value="ent">Electronic and Telecommunication Engineering</option>
                <option value="mec">Mechanical Engineering</option>
                <option value="mat">Material Sciences Engineering</option>
            </select><br>
            Semester :
            <select name="sem">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select><br>
            <?php 
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

                // Get module ids
                $modulessql = "SELECT id, name FROM modules WHERE semester='".$sem."'";
                $studentquery = $conn->query($studentsql);
                $studentqueryrow = $studentquery->fetch_assoc();
                $department = $studentqueryrow["department"];
            ?>
            Module :
            <select name="id">

            </select>
        </form>
        </div>
    
        <?php include_once "footer.php";?>
    </body>
</html>