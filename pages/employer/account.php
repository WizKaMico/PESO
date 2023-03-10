<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include("../../php-func/conn.php");
if (isset($_SESSION["access"])){ 
?>
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!--Custom Assets for Confirmation-->
    <link href="../../custom-assets/sweetalert/sweetalert.css" rel="stylesheet">

    <script>
        if (typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
        }
    </script>

    <?php
    if(isset($_GET['accountupdate'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Your Profile Has Successfully Updated!", "You clicked the button!", "success");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['emptyfields'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("You Must Filled All the Fields!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['invalidusername'])) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal(This Username has already existed try another one!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['checkpassword'])) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Your Password Does Not Match Please Try Again!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    }
    ?>
    
</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="index.php" style="font-size: 16px;">
            <div class="row">
                <div class="col-2"><img src="../../images/pesologo.png" alt="" width="60px;"></div>
                <div class="col-10 align-self-center" style="font-size: 18px;">Public Employment Service Office - Malolos</div>
            </div>
        </a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </li>
        </ul>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
         <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-fw fa-id-card-alt"></i>
                    <span>Profile</span>
                </a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="chat.php">
                    <i class="fas fa-fw fa-id-card-alt"></i>
                    <span>Chat</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="account.php">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Account</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-applicant.php">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Manage Applicant</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-joblist.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Post Jobs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="post-announcement.php">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Post Announcement</span>
                </a>
            </li>
          
        </ul>
            <!--<li class="nav-item">
                <a class="nav-link" href="system-logs.php">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>System Logs</span>
                </a>
            </li>-->
        </ul>

        <div id="content-wrapper">

            <div class="container-fluid">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Profile</li>
                    <li class="breadcrumb-item active">Account</li>
                    
                    
                    
                    
                    
                </ol>
                
                <span class="switch">
                       <label>EDIT</label>
                        <input type="checkbox" class="switch" id="switch-id" checked>
                        <label for="switch-id"></label>
                      </span>
                
                <div class="contentA">
                      <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-id-card-alt"></i>Profile</div>
                    <div class="card-body">
                    <?php
                        if(isset($_SESSION['uid'])){
                            $query ="SELECT
                                        id,
                                        username,
                                        password
                                     FROM users
                                     WHERE id = '".$_SESSION['uid']."'";
                        
                                $result = $mysqli->query($query);

                                if (!$result = $mysqli->query($query)) {
                                    exit($mysqli->error);
                                }
                            
                                $row = $result->fetch_array();
                                    $E_Id = $row['id'];
                                    $E_UserName = $row['username'];
                                    $E_Password = $row['password'];
                    ?>
                        <form action="../../php-func/employer/UpdateEmployerAccount.php" method="post">
                            <div class="card">
                            <div class="card-header"><i class="fas fa-user-cog"></i> Reset Account </div>
                                <div class=card-body>
                                    <div class="form-group mt-3">
                                        <div class="form-label-group">
                                            <input type="text" name="e_username" id="UpdateUsername" class="form-control" placeholder="Username"  value="<?php echo $E_UserName; ?>" varequired="required">
                                            <label for="UpdateUsername">Username</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group mt-3">
                                        <div class="form-label-group">
                                            <input type="password" name="e_pass1" id="UpdatePassword1" class="form-control" placeholder="Password" value="<?php echo $E_Password; ?>">
                                            <label for="UpdatePassword1">Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <div class="form-label-group">
                                            <input type="password" name="e_pass2" id="UpdatePassword2" class="form-control" placeholder="Confirm Password">
                                            <label for="UpdatePassword2">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"   class="btn btn-primary mt-3 account-secure-submit">Update</button>
                            <input type="hidden" name="e_id" id="hidden_e_id" value="<?php echo $E_Id ?>">
                        </form>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="card-footer"></div>
                </div>
                     
                </div>
                
                <div class="contentB">
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-id-card-alt"></i>Profile</div>
                    <div class="card-body">
                    <?php
                        if(isset($_SESSION['uid'])){
                            $query ="SELECT
                                        id,
                                        username,
                                        password
                                     FROM users
                                     WHERE id = '".$_SESSION['uid']."'";
                        
                                $result = $mysqli->query($query);

                                if (!$result = $mysqli->query($query)) {
                                    exit($mysqli->error);
                                }
                            
                                $row = $result->fetch_array();
                                    $E_Id = $row['id'];
                                    $E_UserName = $row['username'];
                                    $E_Password = $row['password'];
                    ?>
                        <form action="../../php-func/employer/UpdateEmployerAccount.php" method="post">
                            <div class="card">
                            <div class="card-header"><i class="fas fa-user-cog"></i> Reset Account </div>
                                <div class=card-body>
                                    <div class="form-group mt-3">
                                        <div class="form-label-group">
                                            <input type="text" name="e_username" id="UpdateUsername" class="form-control" placeholder="Username"  value="<?php echo $E_UserName; ?>" varequired="required" readonly="">
                                            <label for="UpdateUsername">Username</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group mt-3">
                                        <div class="form-label-group">
                                            <input type="password" name="e_pass1" id="UpdatePassword1" class="form-control" placeholder="Password" value="<?php echo $E_Password; ?>" readonly="">
                                            <label for="UpdatePassword1">Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <div class="form-label-group">
                                            <input type="password" name="e_pass2" id="UpdatePassword2" class="form-control" placeholder="Confirm Password" readonly="">
                                            <label for="UpdatePassword2">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"   class="btn btn-primary mt-3 account-secure-submit">Update</button>
                            <input type="hidden" name="e_id" id="hidden_e_id" value="<?php echo $E_Id ?>">
                        </form>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="card-footer"></div>
                </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright ?? Thesis 2021</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

    <!--Coordinator Script-->
    <script type="text/javascript" src="../../js/coordinator/coordinator.js"></script>

    <!--Custom Assets for Confirmation-->
    <script src="../../custom-assets/sweetalert/sweetalert-dev.js"></script>
    <script src="../../custom-assets/sweetalert/sweetalert.min.js"></script>
    
    <!-- Custom Javascript for DataTables-->
    <script>
        $(document).ready(function() {
            $('table.display').DataTable();
        });
    </script>
    
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="./script.js"></script>

</body>

</html>
<?php
} else {
    header('Location: ../../login.php');
}
?>



<style>
    
.switch {
  font-size: 1rem;
  position: relative;
}
.switch input {
  position: absolute;
  height: 1px;
  width: 1px;
  background: none;
  border: 0;
  clip: rect(0 0 0 0);
  clip-path: inset(50%);
  overflow: hidden;
  padding: 0;
}
.switch input + label {
  position: relative;
  min-width: calc(calc(2.375rem * .8) * 2);
  border-radius: calc(2.375rem * .8);
  height: calc(2.375rem * .8);
  line-height: calc(2.375rem * .8);
  display: inline-block;
  cursor: pointer;
  outline: none;
  user-select: none;
  vertical-align: middle;
  text-indent: calc(calc(calc(2.375rem * .8) * 2) + .5rem);
}
.switch input + label::before,
.switch input + label::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: calc(calc(2.375rem * .8) * 2);
  bottom: 0;
  display: block;
}
.switch input + label::before {
  right: 0;
  background-color: #dee2e6;
  border-radius: calc(2.375rem * .8);
  transition: 0.2s all;
}
.switch input + label::after {
  top: 2px;
  left: 2px;
  width: calc(calc(2.375rem * .8) - calc(2px * 2));
  height: calc(calc(2.375rem * .8) - calc(2px * 2));
  border-radius: 50%;
  background-color: white;
  transition: 0.2s all;
}
.switch input:checked + label::before {
  background-color: #08d;
}
.switch input:checked + label::after {
  margin-left: calc(2.375rem * .8);
}
.switch input:focus + label::before {
  outline: none;
  box-shadow: 0 0 0 0.2rem rgba(0, 136, 221, 0.25);
}
.switch input:disabled + label {
  color: #868e96;
  cursor: not-allowed;
}
.switch input:disabled + label::before {
  background-color: #e9ecef;
}
.switch.switch-sm {
  font-size: 0.875rem;
}
.switch.switch-sm input + label {
  min-width: calc(calc(1.9375rem * .8) * 2);
  height: calc(1.9375rem * .8);
  line-height: calc(1.9375rem * .8);
  text-indent: calc(calc(calc(1.9375rem * .8) * 2) + .5rem);
}
.switch.switch-sm input + label::before {
  width: calc(calc(1.9375rem * .8) * 2);
}
.switch.switch-sm input + label::after {
  width: calc(calc(1.9375rem * .8) - calc(2px * 2));
  height: calc(calc(1.9375rem * .8) - calc(2px * 2));
}
.switch.switch-sm input:checked + label::after {
  margin-left: calc(1.9375rem * .8);
}
.switch.switch-lg {
  font-size: 1.25rem;
}
.switch.switch-lg input + label {
  min-width: calc(calc(3rem * .8) * 2);
  height: calc(3rem * .8);
  line-height: calc(3rem * .8);
  text-indent: calc(calc(calc(3rem * .8) * 2) + .5rem);
}
.switch.switch-lg input + label::before {
  width: calc(calc(3rem * .8) * 2);
}
.switch.switch-lg input + label::after {
  width: calc(calc(3rem * .8) - calc(2px * 2));
  height: calc(calc(3rem * .8) - calc(2px * 2));
}
.switch.switch-lg input:checked + label::after {
  margin-left: calc(3rem * .8);
}
.switch + .switch {
  margin-left: 1rem;
}



.contentA {
  display: none;
}    
    
    
    
</style>