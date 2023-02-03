<?php
	session_start();
	include_once('../dbcon.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM users WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($con->query($sql)){
			$_SESSION['success'] = 'Member deleted successfully';
		}
		////////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member deleted successfully';
		// }
		/////////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to delete first';
	}

	header('location: index.php');
?>