<?php
	session_start();
	include_once('../dbcon.php');

	if(isset($_POST['edit'])){
		$user_id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$birthdate = $_POST['birthdate'];
		$sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', birthdate = '$birthdate'  WHERE user_id = '$user_id'";

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

	header('location: index.php');

?>