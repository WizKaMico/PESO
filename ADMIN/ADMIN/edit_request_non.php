<?php
	session_start();
	include_once('../dbcon.php');

	if(isset($_POST['edit'])){
		$user_id = $_POST['id'];
		$status = $_POST['status'];
		$sql = "UPDATE non_pay SET status = '$status'  WHERE id = '$user_id'";

		//use for MySQLi OOP
		if($con->query($sql)){
			$_SESSION['success'] = 'updated successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member updated successfully';
		// }
		///////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: nopay.php');

?>