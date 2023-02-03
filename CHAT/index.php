<!DOCTYPE html>
<html>
<head>
    <?php 
    
    $username = $_GET['username']; 
    $password = $_GET['password'];
    ?>
	<title>PESO CHAT SYSTEM</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#login_form{
		width:350px;
		height:350px;
		position:relative;
		top:50px;
		margin: auto;
		padding: auto;
	}
</style>
</head>
<body>
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> Please Login</center></h2>
		<hr>
		<form method="POST" action="login.php">
		 <input type="hidden" name="username" class="form-control" required="" value="<?php echo $username; ?>">
		<div style="height: 10px;"></div>		
		 <input type="hidden" name="password" class="form-control" required="" value="<?php echo $password; ?>"> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-log-in"></span> CHAT NOW </button> 
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				session_start();
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
</body>
</html>