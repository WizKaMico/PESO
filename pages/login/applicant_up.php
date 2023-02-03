            <?php
            
            	session_start();
	include_once('dbcon.php');


	if(isset($_POST['new'])){
		$uid = $_POST['uid'];
		$password = $_POST['password'];

		$sql = "UPDATE users SET password = '$password' WHERE id = '$uid'";

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

	header('location: applicantlogin.php');

?>
                        
              