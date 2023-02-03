<?php
	session_start();
	include_once('../dbcon.php');

	if(isset($_POST['add'])){
		
		$name = $_POST['name']; 
		$username = $_POST['username'];
		$password = $_POST['password'];
		$position = $_POST['position'];
		$email = $_POST['email'];
		$sql = "INSERT INTO admin (name, username, password, position, email) VALUES ('$name', '$username', '$password', '$position', '$email')";

		//use for MySQLi OOP
		if($con->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: employee.php');
?>