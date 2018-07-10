<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Increment Semester</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	 <style>
	 form p{
	 	padding-top: 100px;

	 }
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
            box-sizing: border-box;
        }
        input, select {
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
    if(isset($_GET['msg']) && $_GET['msg'] == 'incrementSemestersuccessful'){echo "<script type='text/javascript'>alert('Increment successful!');</script>";}
    if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability          
	include_once "header.php";
    include_once "sidebar.php";  
    include_once "../footer.php"; 
     
	 ?>
	<div class="middlediv">
		<form action="incrementSemester.php" method="POST">
		<p>
            <label>Batch:</label>
   	        <select name="batch">
            <option value=<?php echo (date('Y'))     ?> selected><?php echo (date("Y"))  ?></option>
            <option value=<?php echo (date('Y')-1)  ?>><?php echo (date("Y")-1)  ?></option>
            <option value=<?php echo (date('Y')-2)  ?>><?php echo (date("Y")-2)  ?></option>
            <option value=<?php echo (date('Y')-3)  ?>><?php echo (date("Y")-3)  ?></option>
            <option value=<?php echo (date('Y')-4)  ?>><?php echo (date("Y")-4)  ?></option>
            </select><br><br>
        </p>
		<input type="submit" name='submit' value='Increment Semester'>
			
		</form>
	</div>
</body>
</html>