<?php
    include "../classes/student.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<style>
body {font-family: Arial, Helvetica, sans-serif;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #123456;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
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
?>
<?php 
	if(!isset($_SESSION['user'])){header("Location:../index.php");}
	$student = $_SESSION['user'];
    $id =$student->getID();


 ?>
<div class="middlediv">


  <form action="recordStudentquaries.php" method='POST'>

    <label for="indexno">Index number</label>
    <input type="text" name="id" value="<?php echo($id) ?>" required disabled>

    
    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" value="Submit">
  </form>

</div>
</body>
</html>
