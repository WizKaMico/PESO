<?php
	$conn = mysqli_connect("localhost", "root", "", "db_img_update");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>