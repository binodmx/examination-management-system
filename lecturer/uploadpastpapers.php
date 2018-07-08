<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>EMS - UoM</title>
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
            box-sizing: border-box;
        }
        input[type=file] {
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            float: right;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <!link rel="stylesheet" type="text/css" href="lecturer.css">
</head>
    <body>
        <?php
            if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability
            if(isset($_GET['msg']) && $_GET['msg'] == 'uploadsuccessful'){echo "<script type='text/javascript'>alert('Upload successful!');</script>";}
            if(isset($_GET['msg']) && $_GET['msg'] == 'uploadunsuccessful'){echo "<script type='text/javascript'>alert('Upload unsuccessful!');</script>";}
            include_once "header.php";
            include_once "sidebar.php";
            include_once "../footer.php";
        ?>

        <div class="middlediv">
          <form action="recorduploadpastpapers.php" method="POST" enctype="multipart/form-data"><br><br><br>
            <p><label>Department :</label>
              <select name="department">
                <option value = "bmd">Bio Medical Engineering</option>
                <option value = "cse">Computer Science and Engineering</option>
                <option value = "civ">Civil Engineering</option>
                <option value = "che">Chemical and Process Engineering</option>
                <option value = "ele">Electrical Engineering</option>
                <option value = "entt">Electronic and Telecommunication Engineering</option>
                <option value = "mec">Mechanical Engineering</option>
                <option value = "mat">Chemical and Process Engineering</option>
              </select><br><br> </p>
        
          <p><label>Semester :</label>
              <select  name="semester">
                <option value = "1">1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>
                <option value = "4">4</option>
                <option value = "5">5</option>
                <option value = "6">6</option>
                <option value = "7">7</option>
                <option value = "8">8</option>
              </select><br><br></p>

       
      
            <label>Year:</label><input type='number' name='year' maxlength=4 max="<?php echo date("Y") ?>" required><br><br>
            <label>Module Code:</label><input type='text' name='moduleCode'  required><br><br>
            <label>File Path:</label><input type="file" name="file"><br><br>
            <input type="submit" name="submit" value="Upload"> 

        </form>
        </div>
    </body>
</html>