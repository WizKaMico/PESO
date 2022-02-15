<?php 
    error_reporting(E_ALL ^ E_DEPRECATED);
		session_start();
		include("conn.php");

		if (isset($_SESSION["access"])){	
				session_destroy();

			if(isset($_SESSION["access"])){
				header("Location:../index.php");
			} else {
				$url = '../index.php';
				echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
			} 
		} 
?>