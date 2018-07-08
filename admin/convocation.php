<!DOCTYPE html>
<html>
<head>
	<title>Convoaction Requests</title>
	<link rel="stylesheet" type="text/css" href="lecturer/lecturer.css">
</head>
<body>
	<?php include_once ("../dbconnect.php");?>
	<?php 
	if(!isset($_SESSION['user'])){header("Location:../index.php");} // Session availability
	$query ="SELECT * FROM convocation";
	$result_set = mysqli_query($conn,$query);
	/*$record=mysqli_fetch_assoc($result_set);*/
	
	
	if ($result_set) {

		$table = '<table>';
		$table .= '<tr><th>Index Number</th><th>Full Name</th><th>Email</th><th>Mobile</th><th>Faculty</th><th>Department</th></th>';

		while ($record=mysqli_fetch_assoc($result_set)) {
			$table .= '<tr>';
			$table .= '<td>' . $record['id']. '</td>';
			$table .= '<td>' . $record['name']. '</td>';
			$table .= '<td>' . $record['email']. '</td>';
			$table .= '<td>' . $record['mobile']. '</td>';
			$table .= '<td>' . $record['faculty']. '</td>';
			$table .= '<td>' . $record['department']. '</td>';
			$table .= '</tr>';
		}
		$table .= '</table>';
	}

	 ?>
	<?php 
            include_once "header.php";
            include_once "sidebar.php";        
        ?>
   	
     <div class="middlediv">
   	  	<p class="table"><?php 
   	  	echo $table;
   	  	 ?> </p>



   	  	
   	  </div>
        <?php include_once "footer.php"; ?>

</body>
</html>