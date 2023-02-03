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
            <li class="nav-item active">
                <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="announcement.php">Announcement</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-link">
                <a>||</a>
            </li>
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
              <li class="nav-item active">
                <a class="nav-link" href="chat.php">
                    <i class="fas fa-fw fa-id-card-alt"></i>
                    <span>Chat</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="account.php">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Account</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="post-announcement.php">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Post Jobs</span>
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
                    <span>Manage Job Vacanies</span>
                </a>
            </li>
            <hr>
            <!-- ARCHIVE PAGES -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="manage-joblist.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Archive Job Vacanies</span>
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
                    $asql = $mysqli->query("SELECT COUNT(employer_vacancy_profile.id) as TOTAL FROM `employer_vacancy_profile` LEFT JOIN applicant_vacancy_file ON employer_vacancy_profile.eid = applicant_vacancy_file.eid WHERE employer_vacancy_profile.eid = 52");
                    $adata=mysqli_fetch_assoc($asql);

                    $jsql = $mysqli->query("SELECT COUNT(id) AS totaljob FROM employer_vacancy_profile WHERE eid = '".$_SESSION['uid']."'");
                    $jdata=mysqli_fetch_assoc($jsql);

                    $hsql = $mysqli->query("SELECT COUNT(id) AS totalhired FROM employer_vacancy_profile WHERE job_status='Hired'");
                    $hdata=mysqli_fetch_assoc($hsql);

                ?>
                    <div class="col-xl-4 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-user-tie"></i>
                                </div>
                                <div class="mr-5 font-weight-bold"><?php echo $adata['TOTAL']; ?></div>
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
                    <div class="col-xl-4 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-clipboard-list"></i>
                                </div>
                                <div class="mr-5 font-weight-bold"><?php echo $jdata['totaljob']; ?></div>
                                <div class="mr-5">Total Vacant Jobs</div>
                            </div>
                                <a class="card-footer text-white clearfix small z-1" href="manage-joblist.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-briefcase"></i>
                                </div>
                                <div class="mr-5 font-weight-bold"><?php echo $hdata['totalhired'] ?></div>
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
                        Job List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            
                              <?php
                        if(isset($_SESSION['uid'])){
                            $query ="SELECT
                                     users.id,
                                     users.username,
                                     users.password,
                                     employer_profile.uid,
                                     employer_profile.lname,
                                     employer_profile.fname,
                                     employer_profile.mname,
                                     employer_profile.suffix,
                                     employer_profile.email,
                                     employer_company_profile.eid,
                                     employer_company_profile.company_name,
                                     employer_company_profile.industry_type,
                                     employer_company_profile.building_no,
                                     employer_company_profile.street_name,
                                     employer_company_profile.barangay_name,
                                     employer_company_profile.city_name,
                                     employer_company_profile.province_name,
                                     employer_company_profile.zip_code
                                     FROM users 
                                     JOIN employer_profile 
                                     ON users.id=employer_profile.uid
                                     JOIN employer_company_profile
                                     ON employer_profile.uid=employer_company_profile.eid
                                     WHERE users.id = '".$_SESSION['uid']."'";

                                if (!$result = $mysqli->query($query)) {
                                    exit($mysqli->error);
                                }
                            
                                $result = $mysqli->query($query);
                                $row = $result->fetch_array();
                                    $E_Id = $row['id'];
                                    $E_UserName = $row['username'];
                                    $E_Password = $row['password'];
                                    $E_LName = $row['lname'];
                                    $E_FName = $row['fname'];
                                    $E_MName = $row['mname'];
                                    $E_Suffix = $row['suffix'];
                                    $E_CompanyEmail = $row['email'];
                                    $E_CompanyName = $row['company_name'];
                                    $E_IndustryType = $row['industry_type'];
                                    $E_BuildingNo = $row['building_no'];
                                    $E_StreetName = $row['street_name'];
                                    $E_BarangayName = $row['barangay_name'];
                                    $E_CityName = $row['city_name'];
                                    $E_ProvinceName = $row['province_name'];
                                    $E_ZipCode = $row['zip_code'];
                    ?>
                            
                            <iframe src="../../CHAT/index.php?username=<?php echo $E_UserName; ?>&password=<?php echo $E_Password; ?>" style="width:100%; height:450px;"></iframe>
                            
                            <?php } ?>
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
    header('Location: ../../login.php');
}
?>