<?php
	require_once 'conn.php';
	if(ISSET($_POST['save'])){
		$image_name = $_FILES['photo']['name'];
		$image_temp = $_FILES['photo']['tmp_name'];
		
		
        $e_announcementtitle = $_POST['e_announcementtitle'];
        $e_announcementdesc = $_POST['e_announcementdesc'];
        $e_id = $_POST['e_id'];
        $id = $_POST['id'];
        $status = $_POST['status'];
        $announcement_date_posted = $_POST['announcement_date_posted'];
		
		
		
		
		
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		$path = "upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");
		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){
				mysqli_query($conn, "INSERT INTO `employer_announcement` VALUES('', '$e_id', '$e_announcementtitle', '$e_announcementdesc', '$path', '$status', '$announcement_date_posted')") or die(mysqli_error());
				echo "<script>alert('User account saved!')</script>";
				header("location: ../post-announcement.php");
			}	
		}else{
			echo "<script>alert('Image only')</script>";
		}
	}
?>