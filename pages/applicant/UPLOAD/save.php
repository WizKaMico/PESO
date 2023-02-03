<?php
	require_once 'conn.php';
	if(ISSET($_POST['save'])){
		$image_name = $_FILES['photo']['name'];
		$image_temp = $_FILES['photo']['tmp_name'];
		$id = $_POST['id'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		$path = "upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");
		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){
				mysqli_query($conn, "INSERT INTO `photo_upload` VALUES('', '$id', '$path')") or die(mysqli_error());
				echo "<script>alert('User account saved!')</script>";
				header("location: ../profile.php");
			}	
		}else{
			echo "<script>alert('Image only')</script>";
		}
	}
?>