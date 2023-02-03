<?php
	session_start();
	include_once('../dbcon.php');

	if(isset($_POST['edit'])){
		$id = $_POST['user_id'];
		$name = $_POST['name']; 
		$username = $_POST['username'];
		$password = $_POST['password'];
		$position = $_POST['position'];
		$email = $_POST['email'];
		$sql = "UPDATE admin SET name = '$name', username = '$username', password = '$password', position = '$position', email = '$email' WHERE user_id = '$id'";

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

	header('location: employee.php');

?>