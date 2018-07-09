<?php 
    include_once "../classes/student.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Quaries</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<style>
	table{
		margin-left:250px;
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
  <div class="middlediv"><br><br><br>
<?php if (isset($_POST['submit'])) { 
	$year = $_POST['year'];
	$month = $_POST['month'];
	$sql ="SELECT * FROM studentqueries WHERE year='$year' AND month='$month'";
	$qry = $conn->query($sql);
	if($qry->num_rows>0){

		$table = '<table>';
		$table .= '<tr>
					<th>Index Number</th>
					<th>Name</th>
					<th>Department</th>
					<th>Batch</th>
					<th>Message</th>
				   </tr>';

		while($row = $qry->fetch_assoc()){
			$id = $row['id']; 
			$ssql ="SELECT * FROM students WHERE id='$id'";
			$sqry = $conn->query($ssql);
			$srow = $sqry->fetch_assoc();
			$student = unserialize($srow['val']);
			$name = $student->getName();
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
			$batch = $student->getBatch();
			$message = $row['message'];
			$table .= '<tr>';
			$table .= '<td>' . $id. '</td>';
			$table .= '<td>' . $name. '</td>';
			$table .= '<td>' . $department. '</td>';
			$table .= '<td>' . $batch. '</td>';
			$table .= '<td>' . $message. '</td>';
			$table .= '</tr>';
		}
		$table .= '</table>';
		echo $table;
	} else {
		echo "Not available!";
	}

}
 ?>   	  	
   	  </div>

</body>
</html>