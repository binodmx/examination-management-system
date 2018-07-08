<?php
    include "../classes/student.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Convocation</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
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
</head>
<body>

<?php
    include_once "header.php";
    include_once "sidebar.php";  
    include_once "../footer.php";  
    include_once "../dbconnect.php";
?>
    <div class="middlediv">

<?php

    $student = $_SESSION['user'];
    $id = $student->getId(); 
    $name = $student->getName();
    $email = $student->getEmail(); 
    $mobile = $student->getMobile(); 

    $sql = "SELECT id FROM convocationrequests WHERE id='".$id."'"; 
    $qry = $conn->query($sql);
    if($qry->num_rows>0){
        echo "You have already applied for convocatoin!";
    } else {

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
    <br><br><br>
    <form action="recordconvocation.php" method='POST'>
        <label>Index no: </label><input type="text" name="id" value="<?php echo($id) ?>" required disabled><br>
        <label>Name on Certificate: </label><input type="text" name="name" value="<?php echo($name)  ?>" required><br>
        <label>Email: </label><input type="email" name="email" value="<?php echo($email) ?>" required><br>
        <label>Mobile: </label><input type="tel" name="tel" value="<?php echo($mobile) ?>" required maxlength="10"><br>
        <label>Faculty: </label><input type="text" name="faculty" value="<?php echo($faculty) ?>" required disabled><br>
        <label>Department: </label><input type="text" name="department" value="<?php echo($department) ?>"  required disabled><br><br>
        <input type="submit" name='submit' value='Apply'>
    </form>
<?php } ?>
</div>
</body>
</html>