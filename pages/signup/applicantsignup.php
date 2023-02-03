<!DOCTYPE html>
<html lang="en">

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
                    <div class="col-6">
                        <div class="text-center p-5">
                            <span>Sign Up as Applicant</span>
                        </div>
                        <?php
                            if(isset($_GET['error'])){
                                if($_GET['error'] == 'emptyfields'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-danger btn-block">Please Fill up all Fields!</div>
                                    </div>
                                    ';
                                }elseif($_GET['error'] == 'invalidEmail'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-danger btn-block">Invalid Email</div>
                                    </div>
                                    ';
                                }elseif($_GET['error'] == 'invalidUsername'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-danger btn-block">Invalid Username</div>
                                    </div>
                                    ';  
                                }elseif($_GET['error'] == 'checkInfoContact'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-danger btn-block">Invalid Contact Number!</div>
                                    </div>
                                    ';  
                                }elseif($_GET['error'] == 'checkpassword'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-danger btn-block">Password Does Not Match!</div>
                                    </div>
                                    ';  
                                }
                            }
                            if(isset($_GET['message'])){
                                if($_GET['message'] == 'success'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-success btn-block">Your Inquiry has been Sent!</div>
                                    </div>
                                    ';
                                }

                            }
                        ?>
                        <form method="post" action="../../php-func/applicant/SignUpApplicant.php" novalidate>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text"  name="email" id="inputEmail" class="form-control" placeholder="Email" required="required">
                                    <label for="inputEmail">Email</label>
                                </div>  
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text"  name="username" id="inputUsername" class="form-control" placeholder="Username" required="required">
                                    <label for="inputUsername">Username</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="password" name="password1" id="inputPassword1" class="form-control" placeholder="Password" required="required">
                                    <label for="inputPassword1">Password</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="password" name="password2" id="inputPassword2" class="form-control" placeholder="Confirm Password" required="required">
                                    <label for="inputPassword2">Confirm Password</label>
                                </div>
                            </div>
                            <button type="submit" name="signup-submit" value="Submit" class="btn btn-primary btn-block"><span>Create Account</span></button>
                        </form>
                        <div class="text-center">
                            <a class="d-block small mt-3" href="signup.php">Not a Applicant?</a>
                            <a class="d-block small mt-3" href="../login/login.php">Already Registered?</a>
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
