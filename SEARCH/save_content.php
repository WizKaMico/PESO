<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$title = addslashes($_POST['title']);
		$content = addslashes($_POST['content']);
		
		mysqli_query($conn, "INSERT INTO `blog` VALUES('', '$title', '$content')") or die(mysqli_error());
		
		header('location: index.php');
		
	}
?>