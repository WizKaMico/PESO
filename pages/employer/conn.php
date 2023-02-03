<?php
	$conn = mysqli_connect('localhost', 'u729926683_pesodb', '@Light101213', 'u729926683_pesodb') or die(mysqli_error());
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
?>