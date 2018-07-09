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
        padding: 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size:16px;
        width:100%;
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
    <br><br><br>
    <label for="indexno">Index number:</label>
    <input type="text" name="id" value="<?php echo($id) ?>" required disabled>

    
    <label for="message">Message:</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" value="Submit">
  </form>

</div>
</body>
</html>
