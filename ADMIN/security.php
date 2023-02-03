<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from admin where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>PESO | MALOLOS </title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- Responsive Desktop/Mobile Login form considered to be used as mobile first approach--> 
<!-- Wave animation credit: https://codepen.io/goodkatz -->

<div class="header">

<!--Content before waves-->
<div class="inner-header flex">
<!--Just the logo.. Don't mind this-->

  <img src="../assets/images/black-peso-logo.png" style="width:20%;">
</div>

<!--Waves Container-->
<div>
<svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
<defs>
<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
</defs>
<g class="parallax">
<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
</g>
</svg>
</div>
<!--Waves end-->

</div>
<!--Header ends-->

<!--Content starts-->
<div class="content flex">
   <h5>Hi! <?php echo $row['username']; ?> for us to protect your data privacy we need to verify your identity first</h5>
  <form action="" method="POST">
    <input type="number" name="code"  onfocus="this.placeholder = 'ENTER VERIFICATION CODE'" onblur="this.placeholder = 'GET CODE FIRST'"/>
    
    <button class="login-btn" name="login">VERIFY</button>
  </form>
  
    <?php date_default_timezone_set('Asia/Manila') ?>
   <?php
	if (isset($_POST['login']))
		{
			$code = mysqli_real_escape_string($con, $_POST['code']);
			$date = date('Y-m-d');
			$query 		= mysqli_query($con, "SELECT * FROM remote_admin WHERE code='$code' and date_created='$date'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['user_id']=$row['user_id'];
					header('location: ADMIN/index.php');
					
				}
			else
				{
					echo 'Invalid Code';
				}
		}
  ?>
  
 
  <form action="../MAIL/security.php" method="post">
      <?php date_default_timezone_set('Asia/Manila') ?>
   	<input type="hidden" name="user_id" required="required" value="<?php echo $row['user_id']; ?>" readonly="">
   	 <input type="hidden" name="username" required="required" value="<?php echo $row['username']; ?>" readonly="">
   	  	 <input type="hidden" name="email" required="required" value="<?php echo $row['email']; ?>" readonly="">
   	 	 <input type="hidden" name="date_created" required="required" value="<?php echo date('Y-m-d'); ?>" readonly="">
   	 	 <input type="hidden" name="code" required="required" value="<?php  echo rand(6666,9999); ?>" readonly="">
   	 
   
        <button class="login-btn" name="send" style="margin-top:-40px;">SEND CODE</button>
		<!--<input type="submit" name="send" class="button" title="Log In" value="GET CODE"></input>-->
   
  </form>
  
  <div class="bottom-container">
 
    <div>
    
<!--Content ends-->
<!-- partial -->
  
</body>
</html>

