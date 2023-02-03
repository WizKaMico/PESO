<?php
	require_once 'conn.php';
	if(ISSET($_POST['edit'])){
		$id = $_POST['id'];
		$image_name = $_FILES['photo']['name'];
		$image_temp = $_FILES['photo']['tmp_name'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$previous = $_POST['previous'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		$path = "upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");
		if(in_array($end, $allowed_ext)){
			if(unlink($previous)){
				if(move_uploaded_file($image_temp, $path)){
					mysqli_query($conn, "UPDATE `announcement` set `firstname` = '$firstname', `lastname` = '$lastname', `photo` = '$path' WHERE `id` = '$id'") or die(mysqli_error());
					echo "<script>alert('User account updated!')</script>";
					header("location: index.php");
				}
			}		
		}else{
			echo "<script>alert('Image only')</script>";
		}
	}
?>