<?php 
    include_once "../classes/lecturer.php";
    include_once "../classes/student.php";
    include_once "../classes/module.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Convoaction Requests</title>
	<link rel="stylesheet" type="text/css" href="lecturer/lecturer.css">
</head>
<body>

	<?php 

	include_once "header.php";
    include_once "sidebar.php";
    include_once "../footer.php";
	include_once ("../dbconnect.php");?>
	<div class="middlediv">
	<?php

	if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability

	$sql ="SELECT val FROM convocationrequests";
	$qry = $conn->query($sql);
	
	if($qry->num_rows>0){
		$year=date("Y");
		$table = "<br><br><br><table><caption>Conovacation Requests for ".$year."</caption>";
		$table .= '<tr>
						<th>Index Number</th>
						<th>Full Name</th>
						<th>Faculty</th>
						<th>Department</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Batch</th>
					</tr>';

		while($row = $qry->fetch_assoc()){
			$student =  unserialize($row['val']);
			$id = $student->getId(); 
			$name = $student->getName();
			$batch = $student->getBatch();
			$faculty = $student->getFaculty();
			$department =$student->getDepartment();
			$email = $student->getEmail();
			$mobile =$student->getMobile();

			$table .= '<tr>';
			$table .= '<td>' . $id. '</td>';
			$table .= '<td>' . $name. '</td>';

			$table .= '<td>' . $faculty. '</td>';
			$table .= '<td>' . $department. '</td>';
			$table .= '<td>' . $email. '</td>';
			$table .= '<td>' . $mobile. '</td>';
			$table .= '<td>' . $batch. '</td>';
			$table .= '</tr>';
		}
		$table .= '</table>';
	} else {
		$table="";
		echo "Not available!";
	}

	 ?>
   	
     
   	  		<?php echo $table; ?> 
   	 </div>
</body>
</html>