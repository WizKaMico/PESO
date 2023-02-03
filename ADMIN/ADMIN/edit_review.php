<?php
	session_start();
	include_once('../dbcon.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$status = $_POST['status'];
		$sql = "UPDATE employer_announcement SET status = '$status' WHERE id = '$id'";

		//use for MySQLi OOP
		if($con->query($sql)){
			$_SESSION['success'] = 'Member updated successfully';
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

	header('location: review-announcement.php');

?>