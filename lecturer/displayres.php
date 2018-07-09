<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">

        <title>
            EMS - UoM
        </title>
    </head>
    <body>
        <?php 
            include_once "header.php";
            include_once "sidebar.php";
        ?>
    <div class="middlediv">
 
       <?php
       if(isset($_GET['module'])){
           $module=$_GET['module'];
           include 'dbconnect.php';
            $sql="SELECT * FROM modules WHERE id='$module'";
            $qry=$conn->query($sql);
            echo '<br><br><br><table><tr>
            <th class="text-center">Module</th>
            <th class="text-center">A</th>
            <th class="text-center">B</th>
            <th class="text-center">C</th>
            <th class="text-center">F</th>
           
        </tr>';

            while($row=$qry->fetch_row()){
                echo '<tr>
                <td class="text-center">'.$row[0].'</td>
                <td class="text-center">'.$row[2].'</td>
                <td class="text-center">'.$row[3].'</td>
                <td class="text-center">'.$row[4].'</td>
                <td class="text-center">'.$row[5].'</td>
               
            </tr>';

            }
            echo '</table>';
       }
       ?>

    </div>

        
        
        <?php include_once "footer.php"; ?>
    </body>
    </html>