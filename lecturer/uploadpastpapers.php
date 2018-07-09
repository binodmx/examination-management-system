<?php 
    include_once "../classes/lecturer.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Past Papers</title>
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
        input[type=submit] {
                background-color: #123456;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size:16px;
                float: right;
                box-sizing: border-box;
            }
            input[type=submit]:hover {
                opacity: 0.8;
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
            <?php
                $lecturer = $_SESSION['user'];
                switch ($lecturer->getDepartment()){
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
            <p><label>Department :</label><input name="department" value="<?php echo $department; ?>" disabled><br> </p>
        
            <label>Module ID:</label>
            <select name="moduleCode" required>
                <?php
                    $modules = $lecturer->getModules();
                    if(count($modules)>0){
                        foreach($modules as $moduleid){
                            echo "<option value='".$moduleid."'>".$moduleid."</option>";
                        }
                    } else {
                        echo "<option value='opt'>Not available</option>";
                    }
                ?>
            </select><br>

    

       
      
            <label>Year:</label><input type='number' name='year' maxlength=4 max="<?php echo date("Y") ?>" required><br>



            <label>File Path:</label><input type="file" name="file" required><br><br>
            <input type="submit" name="submit" value="Upload Past Papers" > 
        </form>
        </div>
    </body>
</html>