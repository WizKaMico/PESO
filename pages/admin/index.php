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
            <li class="nav-item active">
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
            <li class="nav-item">
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
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <div class="row">
                <?php 
                    $asql = $mysqli->query("SELECT COUNT(id) AS totalapplicant FROM applicant_profile");
                    $adata=mysqli_fetch_assoc($asql);

                    $esql = $mysqli->query("SELECT COUNT(id) AS totalemployer FROM employer_profile");
                    $edata=mysqli_fetch_assoc($esql);

                    $jsql = $mysqli->query("SELECT COUNT(id) AS totaljob FROM employer_vacancy_profile");
                    $jdata=mysqli_fetch_assoc($jsql);

                    $hsql = $mysqli->query("SELECT COUNT(id) AS totalhired FROM employer_vacancy_profile WHERE job_status='Hired'");
                    $hdata=mysqli_fetch_assoc($hsql);

                ?>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-user-tie"></i>
                                </div>
                                <div class="mr-5 font-weight-bold"><?php echo $adata['totalapplicant']; ?></div>
                                <div class="mr-5">Total Applicant</div>
                            </div>
                                <a class="card-footer text-white clearfix small z-1" href="manage-applicant.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-building"></i>
                                </div>
                                <div class="mr-5 font-weight-bold"><?php echo $edata['totalemployer']; ?></div>
                                <div class="mr-5">Total Employer</div>
                            </div>
                                <a class="card-footer text-white clearfix small z-1" href="manage-employer.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-clipboard-list"></i>
                                </div>
                                <div class="mr-5 font-weight-bold"><?php echo $jdata['totaljob']; ?></div>
                                <div class="mr-5">Total Jobs</div>
                            </div>
                                <a class="card-footer text-white clearfix small z-1" href="manage-joblist.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-briefcase"></i>
                                </div>
                                <div class="mr-5 font-weight-bold"><?php echo $hdata['totalhired']; ?></div>
                                <div class="mr-5">Total Hired</div>
                            </div>
                                <a class="card-footer text-white clearfix small z-1" href="manage-joblist.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                        </div>
                    </div>
                </div>

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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
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
                                    applicant_profile.email
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
                                            $A_Name = "$A_LName, $A_FName $A_MName";
                                            $A_Email = $row['email'];
                                            $A_Activation = $row['user_activation'];
                                            $A_Archived = $row['user_archived'];
                                            
                                                //if($A_Archived == 'DeArchived'){
                                ?>

                                    <tr>
                                        <td><?php echo $number;?></td>
                                        <td><?php echo $A_Name;?></td>
                                        <td><?php echo $A_Email;?></td>
                                        <td>
                                            <?php
                                            if($A_Activation == 'Activated'){
                                                echo'<div class="btn btn-success btn-block active"><i class="fas fa-unlock"></i></div>';
                                            }elseif($A_Activation == 'DeActivated'){
                                                echo'<div class="btn btn-danger btn-block active"><i class="fas fa-lock"></i></div>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                                $number++;
                                            //}
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-users"></i>
                        Manage Employers</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                    <?php
                     $query = "
                    SELECT 
                    users.id,
                    users.user_activation,
                    users.user_archived,
                    employer_profile.uid,
                    employer_profile.email,
                    employer_company_profile.eid,
                    employer_company_profile.company_name
                    FROM users
                    RIGHT JOIN employer_profile
                    ON users.id = employer_profile.uid
                    RIGHT JOIN employer_company_profile
                    ON users.id = employer_company_profile.eid
                    WHERE user_status = 'Employer'";
                    if (!$result = $mysqli->query($query)){
                        exit($mysqli->error);
                    }
                    if($result->num_rows > 0){
                        $number = 1;
                        
                    while($row = $result->fetch_assoc()){
                        $E_Id = $row['id'];
                        $E_CName = $row['company_name'];
                        $E_Email = $row['email'];
                        $E_Activation = $row['user_activation'];
                        $E_Archived = $row['user_archived'];
                        
                        //if($E_Archived == 'DeArchived'){
                    ?>

                                    <tr>
                                        <td><?php echo $number;?></td>
                                        <td><?php echo $E_CName;?></td>
                                        <td><?php echo $E_Email;?></td>
                                        <td>
                                            <?php
                                            if($E_Activation == 'Activated'){
                                                echo'<div class="btn btn-success btn-block active"><i class="fas fa-unlock"></i></div>';
                                            }elseif($E_Activation == 'DeActivated'){
                                                echo'<div class="btn btn-danger btn-block active"><i class="fas fa-lock"></i></div>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                        $number++;
                       // }
                    }
                }
                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div> 
                
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-users"></i>
                        Job List</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Job Title</th>
                                        <th>Employer</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Job Title</th>
                                        <th>Employer</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                    $UserStatus = 'Employer';
                                    $query = "
                                    SELECT 
                                        users.id, 
                                        users.user_activation,
                                        employer_company_profile.company_name,
                                        employer_company_profile.company_description,
                                        employer_vacancy_profile.id,
                                        employer_vacancy_profile.job_title,
                                        employer_vacancy_profile.job_qualifications,
                                        employer_vacancy_profile.job_summary,
                                        employer_vacancy_profile.job_requirements,
                                        employer_vacancy_profile.job_status,
                                        employer_vacancy_profile.job_salary,
                                        employer_vacancy_profile.job_categories,
                                        employer_vacancy_profile.job_type,
                                        employer_vacancy_profile.job_location
                                    FROM users 
                                    RIGHT JOIN employer_profile 
                                    ON users.id = employer_profile.uid
                                    RIGHT JOIN employer_vacancy_profile
                                    ON employer_profile.id = employer_vacancy_profile.eid
                                    RIGHT JOIN employer_company_profile
                                    ON employer_profile.id = employer_company_profile.eid
                                    WHERE users.user_status = '$UserStatus'
                                    ";
                                    if (!$result = $mysqli->query($query)){
                                        exit($mysqli->error);
                                    }
                                    if($result->num_rows > 0){
                                        $number = 1;
                                        
                                        while($row = $result->fetch_assoc()){
                                            $J_Id = $row['id'];
                                            $J_Name= $row['job_title'];
                                            $J_CompanyName = $row['company_name'];
                                            $J_Hiring = $row['job_status'];

                                                //if($C_Archived == 'DeArchived'){
                                ?>

                                    <tr>
                                        <td><?php echo $number;?></td>
                                        <td><?php echo $J_Name;?></td>
                                        <td><?php echo $J_CompanyName;?></td>
                                        <td>
                                            <?php
                                            if($J_Hiring == 'Hiring'){
                                                echo'<div class="btn btn-success btn-block active"><i class="fas fa-user-plus"></i></div>';
                                            }elseif($J_Hiring == 'Hired'){
                                                echo'<div class="btn btn-danger btn-block active"><i class="fas fa-user-times"></i></div>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                                $number++;
                                            //}
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
                        <span>Copyright © Thesis 2021</span>
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
                        <span aria-hidden="true">×</span>
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
    
    <!-- Custom Javascript for DataTables-->
    <script>
        $(document).ready(function() {
            $('table.display').DataTable();
        });
    </script>

</body>

</html>
<?php
} else {
    header('Location: ../login/login.php');
}
?>