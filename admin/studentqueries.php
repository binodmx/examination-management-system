<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Quaries</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<style>
		form{
			padding-top: 50px;
		}
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
	<form action="showStudentqueries.php" method='POST'>
        <br><br>
	<label>Enter Year: </label><input type="number" name="year" value="<?php echo(date("Y"))  ?>" min="2000" max="<?php echo date("Y") ?>" required maxlength="4"><br>
	<label>Enter Month: </label><input type="number" name="month" value="<?php echo(date("m"))  ?>" min="1" max="12" required maxlength="2"><br><br>
	<input type="submit" name='submit' value='Submit'>
</form>
</div>


</body>
</html>