<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include("../../php-func/conn.php");
if(isset($_SESSION["access"])){
    //print_r ($_SESSION['access']);

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
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">

    <!--Custom CSS for Gallery for this page-->
    <link href="../../css/customstyle.css" rel="stylesheet">


</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="../../index.php" style="font-size: 16px;">
            <div class="row">
                <div class="col-2"><img src="../../images/pesologo.png" alt="Logo.png" width="60px;"></div>
                <div class="col-10 align-self-center" style="font-size: 18px;">Public Employment Service Office - Malolos</div>
            </div>
        </a>


        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!--<div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>-->
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="announcement.php">Announcement</a>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">Contact Us</a>
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
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="chat.php">Chat Employer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-fw fa-id-card-alt"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="account.php">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Account</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manage-joblist.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Manage Job List</span>
                </a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="system-logs.php">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>System Logs</span>
                </a>
            </li>-->
        </ul>

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <div class="row justify-content-md-center">
                    <div class="col-xl-10 col-sm-10 mb-8">
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
                                        <th>Company</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                <?php
                                    $UserStatus = 'Employer';
                                    $query = "
                                    SELECT *
                                    FROM employer_vacancy_applicant
                                    RIGHT JOIN applicant_profile
                                    ON employer_vacancy_applicant.aid = applicant_profile.uid
                                    RIGHT JOIN employer_vacancy_profile
                                    ON employer_vacancy_applicant.jid = employer_vacancy_profile.id
                                    RIGHT JOIN employer_company_profile
                                    ON employer_vacancy_profile.eid = employer_company_profile.eid
                                    WHERE employer_vacancy_applicant.aid = '".$_SESSION['uid']."'
                                    OR employer_vacancy_applicant.eid = '".$_SESSION['uid']."'
                                    GROUP BY employer_vacancy_applicant.jid
                                        
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
                                            $J_Apply = $row['apply_status'];

                                                if($J_Hiring == 'Hiring'){
                                ?>

                                    <tr>
                                        <td><?php echo $number;?></td>
                                        <td><?php echo $J_Name;?></td>
                                        <td><?php echo $J_CompanyName;?></td>
                                        <td>
                                            <?php
                                            if($J_Apply == 'Applied'){
                                                echo'<div class="btn btn-success btn-block active">Applied</div>';
                                            }elseif($J_Hiring == 'Hired'){
                                                echo'<div class="btn btn-danger btn-block active"><i class="fas fa-user-times"></i></div>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
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
                </div>
                

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Thesis 2020</span>
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
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../../vendor/chart.js/Chart.min.js"></script>
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="../../js/demo/chart-area-demo.js"></script>

    <!-- Custom JavaScript for this template-->
    <script>
        $(document).ready(function() {
            $(document.body).on('click', 'tr[data-href]', function() {
                window.location.href = this.dataset.href;
            });
        });
    </script>

</body>

</html>
<?php
}else{
    header('Location: ../login/applicantlogin.php');
    $url = "../login/applicantlogin.php";
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
?>