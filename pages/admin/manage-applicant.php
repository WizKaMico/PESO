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
    if(isset($_GET['delete'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Successfully Deleted!", "You clicked the button!", "success");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['add'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Successfully Added!", "You clicked the button!", "success");';
    echo '}, 500);</script>';
    echo "<script>
    $(window).load(function(){
    $('#AddUserModal').modal('show');
    });
    </script>";
    }
    if(isset($_GET['update'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Successfully updated!", "You clicked the button!", "success");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['emptyfield'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("You Must Filled All the Fields!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['invalidusername'])) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("This Username has already existed try another one!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['invalidpassword'])) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("The Password Does Not Match try another one!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    } 
    if (isset($_GET['tryanother'])) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("This Employee Numbers has already existed try another one!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    echo "<script>
    $(window).load(function(){
    $('#AddUserModal').modal('show');
    });
    </script>";
    }
    if(isset($_GET['unlock'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("An Account Has Been Deactivated!", "You clicked the button!", "success");';
    echo '}, 5000);</script>';
    }
    if(isset($_GET['lock'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("An Account Has Activated!", "You clicked the button!", "success");';
    echo '}, 50);</script>';
    }
    if(isset($_GET['dearchived'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("An Account Has Been DeArchived!", "You clicked the button!", "success");';
    echo '}, 50);</script>';
    }
    if(isset($_GET['archived'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("An Account Has Archived!", "You clicked the button!", "success");';
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
                <a class="nav-link" href="post-announcement.php">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Post Announcement</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-announcement.php" style="font-size: 14px;">
                    <i class="fas fa-fw fa-pager"></i>
                    <span>Manage Announcement</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-employer.php">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Manage Employer</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manage-applicant.php">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Manage Applicant</span>
                </a>
            </li>
            <hr>
            <!-- <li class="nav-item">
                <a class="nav-link" href="manage-joblist.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Manage Job list</span>
                </a>
            </li> -->

            <!-- ARCHIVED PAGES -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="archived-announcement.php" style="font-size: 14px;">
                    <i class="fas fa-fw fa-pager"></i>
                    <span>Archive Announcement</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="archived-employer.php">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Archive Employer</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="archived-applicant.php">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Archive Applicant</span>
                </a>
            </li> -->
            
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
                    <li class="breadcrumb-item active">Applicant</li>
                </ol>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-users"></i>
                        Manage Applicants</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                   $query = "
                                    SELECT 
                                    users.id,
                                    users.username,
                                    users.user_activation,
                                    users.user_archived,
                                    applicant_profile.lname,
                                    applicant_profile.fname,
                                    applicant_profile.mname,
                                    applicant_profile.suffix,
                                    applicant_profile.email,
                                    applicant_profile.gender
                                    FROM users
                                    RIGHT JOIN applicant_profile
                                    ON users.id = applicant_profile.uid
                                    WHERE user_status = 'Applicant'";
                                    if (!$result = $mysqli->query($query)){
                                        exit($mysqli->error);
                                    }
                                    if($result->num_rows > 0){
                                        $number = 1;
                                        
                                        while($row = $result->fetch_assoc()){
                                            $A_Id = $row['id'];
                                            $A_LName = $row['lname'];
                                            $A_FName = $row['fname'];
                                            $A_MName = $row['mname'];
                                            $A_SName = $row['suffix'];
                                            $A_Name = "$A_LName, $A_FName $A_MName $A_SName";
                                            $A_Email = $row['email'];
                                            $A_Activation = $row['user_activation'];
                                            $A_Archived = $row['user_archived'];
                                            $A_Gender =$row['gender'];
                                            
                                                if($A_Archived == 'DeArchived'){
                                ?>

                                    <tr>
                                        <td><?php echo $number;?></td>
                                        <td><?php echo $A_Name;?></td>
                                        <td><?php echo $A_Email;?></td>
                                        <td>
                                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#ViewModal<?php echo $A_Id; ?>"><i class="fas fa-eye"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-block" data-toggle="modal" onclick="GetEmployerUpdateDetails(<?php echo $row['id'];?>)"><i class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>

                                    <!-- View Modal-->
                                    <div class="modal fade" id="ViewModal<?php echo $A_Id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Employer Information</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">??</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row mt-3">
                                                                    <div class="col-md-2 pl-5">
                                                                        <div>Applicant Name</div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div><strong><?php echo $A_Name;?></strong></div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-2 pl-5">
                                                                        <div>Email</div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div><strong><?php echo $A_Email?></strong></div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-2 pl-5">
                                                                        <div>Gender</div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div><strong><?php echo $A_Gender;?></strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="eid" id="hidden_aid" value="<?php echo $row['id'];?>">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal-->
                                    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Applicant Update Information</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">??</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST" action="../../php-func/admin/ApplicantUpdateFunction.php">
                                                    <div class="card">
                                                        <div class="card-header"><span>Employer Information</span></div>
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <label for="">Email</label>
                                                                    <input type="text" class="form-control" name="a_email" id="UpdateEmail" readonly>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Username</label>
                                                                    <input type="text" class="form-control" name="a_username" id="UpdateUsername" readonly>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Current Password</label>
                                                                    <input type="text" class="form-control" name="a_currentpassword" id="UpdateCurrentPassword" readonly>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">New Password</label>
                                                                    <input type="text" class="form-control" name="a_newpassword" id="UpdateNewPassword" value="<?php echo substr(str_shuffle(str_repeat('1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',8)),0,8);?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <input type="hidden" name="id" id="hidden_aid" value="<?php echo $A_Id;?>">
                                                            <button type="submit" class="btn btn-primary update-confirm">Update Account</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <hr>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="col-6">
                                                                <label class="text-center">Delete Applicant</label>
                                                                <button onclick="GetApplicantDeleteDetails(<?php echo $row['id']; ?>)" class="btn btn-danger btn-block"><i class="fas fa-trash-alt"></i></button>
                                                            </div>

                                                            <!-- ARCHIVED FUNCTION -->
                                                            <!-- <div class="row">
                                                                <div class="col-6">
                                                                    <label class="text-center">Lock Profile</label>
                                                                    <?php
                                                                    //if($A_Activation == 'Activated'){
                                                                    //    echo'<button onclick="GetUserStatusLockDetails('.$row['id'].')" class="btn btn-success btn-block"><i class="fas fa-unlock"></i></button>';
                                                                    //}elseif($A_Activation == 'DeActivated'){
                                                                    //    echo'<button onclick="GetUserStatusUnlockDetails('.$row['id'].')" class="btn btn-danger btn-block"><i class="fas fa-lock"></i></button>';
                                                                    //}
                                                                    ?>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="text-center">Archive Profile</label>
                                                                    <?php
                                                                    //if($A_Archived == 'DeArchived'){
                                                                    //    echo'<button onclick="GetUserStatusArchivedDetails('.$row['id'].')" class="btn btn-success btn-block"><i class="fas fa-box-open"></i></button>';
                                                                    //}elseif($A_Archived == 'Archived'){
                                                                    //    echo'<button onclick="GetUserStatusDeArchivedDetails('.$row['id'].')" class="btn btn-danger btn-block"><i class="fas fa-box"></i></button>';
                                                                    //}
                                                                    ?>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                                $number++;
                                            }
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer"></div>
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
    
    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <script type="text/javascript" src="../../js/admin/applicantcontol.js"></script>

    <!--Custom Assets for Confirmation-->
    <script src="../../custom-assets/sweetalert/sweetalert-dev.js"></script>
    <script src="../../custom-assets/sweetalert/sweetalert.min.js"></script>

</body>

</html>
<?php
} else {
    header('Location: ../login/login.php');
}
?>