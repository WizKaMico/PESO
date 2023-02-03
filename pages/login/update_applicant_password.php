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
                            <span>Hi! <b><?php echo strtoupper($row['username']); ?></b>, it seems that you are already in the last step of regaining your account.</span>
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
                          <form method="post" action="applicant_up.php" novalidate>   
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text"  name="password" id="inputUsername" class="form-control" placeholder="ENTER NEW PASSWORD" required="required">
                                    <input type="hidden"  name="uid" id="inputUsername" value="<?php echo $uid; ?>" class="form-control" required="required">
                                    <label for="inputUsername">New Password</label>
                                </div>
                            </div>

                            <button type="submit" name="new" value="Submit" class="btn btn-primary btn-block"><span>RESET PASSWORD</span></button>
                        </form>
                        
                    
                 
                        
                        
                       
                        
                       
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
