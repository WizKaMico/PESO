<!DOCTYPE html>
<html lang="en">
<?php 
include('dbcon.php');
$uid = $_GET['uid'];

$result=mysqli_query($con, "SELECT *, users.id as UID FROM `applicant_profile` LEFT JOIN users ON applicant_profile.uid = users.id WHERE users.id='$uid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

<title>Public Employment Service Office - Malolos</title>

<!-- Custom fonts for this template-->
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Custom styles for this template-->
<link href="../../css/sb-admin.min.css" rel="stylesheet">

<style>
    .responsive{
        width: 100%;
        max-width: 450px;
        height: auto;
        
    }

</style>

</head>

<body class="bg-image">

    <div class="container">
        <div class="card mx-auto mt-5 ">
          <div class="card-header"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <img src="../../images/pesologo.png" alt="PESO.png" class="responsive ml-2 d-flex justify-content-center">
                    </div>
                    <div class="col-6 mt-10">
                        <div class="text-center p-5">
                            <span>Hi! <b><?php echo strtoupper($row['username']); ?></b>, it seems that you are having trouble loging in your account, generate the code and check this email <b><?php echo strtoupper($row['email']); ?></b> that you had provided.</span>
                        </div>
                        <div class="text-center m-2 p-2">
                        <?php 
                        if(isset($_GET['error']) == 'invalidaccess') { 
                            echo '<div class="form-group">
                                    <div class="btn btn-danger btn-block">Invalid Username or Password</div>
                                </div>'; 
                            } 
                        ?>
                        </div>
                          <form method="post" action="#" novalidate>   
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text"  name="code" id="inputUsername" class="form-control" placeholder="ENTER 4-DIGIT CODE" required="required">
                                    <label for="inputUsername">ENTER CODE</label>
                                </div>
                            </div>

                            <button type="submit" name="login" value="Submit" class="btn btn-primary btn-block"><span>RESET PASSWORD</span></button>
                        </form>
                        
                         <?php
                    	if (isset($_POST['login']))
                    		{
                    			$code = mysqli_real_escape_string($con, $_POST['code']);
                    			$date = date('Y-m-d');
                    			$query 		= mysqli_query($con, "SELECT * FROM remote_code WHERE code='$code' and date_created='$date'");
                    			$row		= mysqli_fetch_array($query);
                    			$num_row 	= mysqli_num_rows($query);
                    			
                    			if ($num_row > 0) 
                    				{			
                    				    
                    					header('location: update_applicant_password.php?uid='.$uid);
                    					
                    				}
                    			else
                    				{
                    				echo '<div class="form-group">
                                            <div class="btn btn-danger btn-block">Invalid CODE provided</div>
                                        </div>'; 
                    				}
                    		}
                      ?>
                        
                        <form method="post" action="MAIL/security.php" novalidate>   
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="hidden"  name="email" id="inputUsername" class="form-control" value="<?php echo $row['email']; ?>" required="required" readonly="">
                              
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <div class="form-label-group">
                                    <input type="hidden"  name="name" id="inputUsername" class="form-control" value="<?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?> " required="required" readonly="">
                                 
                                </div>
                            </div>
                            
                               <div class="form-group">
                                <div class="form-label-group">
                                    <input type="hidden"  name="uid" id="inputUsername" class="form-control" value="<?php echo $row['UID']; ?>" required="required" readonly="">
                                 
                                </div>
                            </div>
                            
                              <div class="form-group">
                                <div class="form-label-group">
                                    <?php date_default_timezone_set('Asia/Manila') ?>
                                    <input type="hidden"  name="date_created" id="inputUsername" class="form-control" value="<?php echo date('Y-m-d'); ?>" required="required" readonly="">
                                 
                                </div>
                            </div>
                            
                              <div class="form-group">
                                <div class="form-label-group">
                                    <input type="hidden"  name="code" id="inputUsername" class="form-control" value="<?php echo(rand(6666,9999)); ?>" required="required" readonly="">
                                 
                                </div>
                            </div>
                            
                            
                            
                           

                            <button type="submit" name="send" value="Submit" class="btn btn-primary btn-block"><span>GENERATE CODE</span></button>
                        </form>
                        
                       
                        
                        <div class="text-center">
                            <a class="d-block small mt-3" href="login.php">Not an Applicant?</a>
                            <a class="d-block small mt-3" href="../signup/signup.php">Create an Account?</a>
                            <a class="d-block small mt-3" href="applicantlogin.php">Already have an account</a>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
