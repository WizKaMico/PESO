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
    if(isset($_GET['add'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Your Job List Has Successfully Added!", "You clicked the button!", "success");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['emptyfields'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("You Must Filled All the Fields!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['invalidjoblist'])) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal(This JobList has already existed try another one!", "You clicked the button!", "error");';
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
            <li class="nav-item">
                <a class="nav-link" href="account.php">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Account</span>
                </a>
            </li>
            <li class="nav-item active">
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

        <div id="content-wrapper">

            <div class="container-fluid">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Applicant</li>
                </ol>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-users"></i>
                        Applicant List 
                        <a href="export.php?uid=<?php echo $_SESSION['uid']; ?>" class="btn btn-primary btn-sm">DOWNLOAD APPLICANT</a>
                        </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Applicant Name</th>
                                        <th>Job Name</th>
                                        <th>View</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                <?php
                                    $query="
                                    SELECT *
                                    FROM employer_vacancy_applicant
                                    RIGHT JOIN applicant_profile
                                    ON employer_vacancy_applicant.aid = applicant_profile.uid
                                    RIGHT JOIN employer_vacancy_profile
                                    ON employer_vacancy_applicant.jid = employer_vacancy_profile.id
                                    RIGHT JOIN employer_company_profile
                                    ON employer_vacancy_profile.eid = employer_company_profile.eid
                                    RIGHT JOIN applicant_vacancy_file
                                    ON employer_vacancy_applicant.eid = applicant_vacancy_file.eid
                                    RIGHT JOIN applicant_file
                                    ON employer_vacancy_applicant.aid = applicant_file.aid
                                    WHERE employer_vacancy_applicant.aid = '".$_SESSION['uid']."'
                                    OR employer_vacancy_applicant.eid = '".$_SESSION['uid']."'
                                    GROUP BY employer_vacancy_applicant.jid";
                                    if (!$result = $mysqli->query($query)){
                                        exit($mysqli->error);
                                    }
                                    if($result->num_rows > 0){
                                        $number = 1;
                                        
                                        while($row = $result->fetch_assoc()){
                                            $E_Id = $row['eid'];
                                            $A_Id = $row['aid'];
                                            $J_Id = $row['jid'];
                                            $E_JobName = $row['job_title'];
                                            $E_JobSummary = $row['job_summary'];
                                            $E_JobQualifications = $row['job_qualifications'];
                                            $E_JobRequirements = $row['job_requirements'];
                                            $E_JobArchived = $row['job_status'];
                                            $A_LName = $row['lname'];
                                            $A_FName = $row['fname'];
                                            $A_MName = $row['mname'];
                                            $A_Suffix = $row['suffix'];
                                            $A_Name = "$A_FName $A_MName $A_LName $A_Suffix"; 
                                            
                                            $E_JobStatus = $row['job_status'];
                                            
                                                if($E_JobArchived == 'Hiring'){
                                ?>
                                    <tr>
                                        <td><?php echo $number;?></td>
                                        <td><?php echo $A_Name;?></td>
                                        <td><?php echo $E_JobName;?></td>
                                        <td>
                                            <a href="../../upload/<?php echo $row['file_name']; ?>" target="_blank" class="btn btn-primary btn-block">
                                                <i class="fas fa-file-upload"></i> View File
                                            </a>
                                        </td>
                                        <td>
                                            <?php
                                                if($E_JobStatus == 'Hiring'){
                                                    echo'<button onclick="GetJobHiringStatusDetails('.$J_Id.')" class="btn btn-primary btn-block"><i class="fas fa-user-plus"></i> Applied </button>';
                                                }elseif($E_JobStatus == 'Hired'){
                                                    echo'<button onclick="GetJobHiredStatusDetails('.$J_Id.')" class="btn btn-success btn-block"><i class="fas fa-user-slash"></i> Hired </button>';
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

    <!-- LOGOUT MODAL -->
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

<!-- UPDATE MODAL -->
<div class="modal fade" id="UpdateJobListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5>View Applicant Profile</h5>
                    </div>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">Profile</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="form-label-group">
                                                    <input type="text" name="a_fname" id="UpdateFirstName" class="form-control" placeholder="Last name" required="required" readonly>
                                                    <label for="UpdateFirstName">Firstname</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-label-group">
                                                    <input type="text" name="a_lname" id="UpdateLastName" class="form-control" placeholder="Last name" required="required" readonly>
                                                    <label for="UpdateLastName">Last name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-label-group">
                                                    <input type="text" name="a_mname" id="UpdateMiddleName" class="form-control" placeholder="M.I" readonly>
                                                    <label for="UpdateMiddleName">M.I</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-label-group">
                                                    <input type="text" name="a_mname" id="UpdateSuffix" class="form-control" placeholder="M.I" readonly>
                                                    <label for="UpdateSuffix">Suffix<label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="text" name="c_email" id="UpdateEmail" class="form-control" placeholder="Username" varequired="required" readonly>
                                            <label for="UpdateEmail">Email</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="text" name="c_email" id="UpdatePrimary" class="form-control" placeholder="Username" varequired="required" readonly>
                                            <label for="UpdatePrimary">Primary Number</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="text" name="c_email" id="UpdateSecodary" class="form-control" placeholder="Username" varequired="required" readonly>
                                            <label for="UpdateSecondary">Secondary Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="eid" id="hidden_eid">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>

<!-- VIEW APPLICANT MODAL -->
<div class="modal fade" id="UpdateJobListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h5>View Applicants</h5>
                </div>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Applicant</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Applicant</th>
                            <th>View</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        $query="SELECT
                            employer_vacancy_applicant.eid,
                            employer_vacancy_applicant.aid,
                            applicant_file.aid,
                            applicant_file.file_name
                            FROM employer_vacancy_applicant
                            INNER JOIN applicant_file
                            ON employer_vacancy_applicant.aid = applicant_file.aid
                            WHERE eid = '".$_SESSION['uid']."'";
                        if (!$result = $mysqli->query($query)){
                            exit($mysqli->error);
                        }
                        if($result->num_rows > 0){
                            $number = 1;
                            
                            while($row = $result->fetch_assoc()){
                                $E_Id = $row['eid'];
                                $E_JobName = $row['job_title'];
                                $E_JobSummary = $row['job_summary'];
                                $E_JobQualifications = $row['job_qualifications'];
                                $E_JobRequirements = $row['job_requirements'];
                                $E_JobArchived = $row['job_status'];
                                
                                    if($E_JobArchived == 'Hiring'){
                    ?>

                        <tr>
                            <td><?php echo $number;?></td>
                            <td><?php echo $E_JobName;?></td>
                            <td>
                                <button onclick="GetUpdateDetails(<?php echo $row['eid'] ?>)" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
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
            <div class="modal-footer"></div>
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
    <script type="text/javascript" src="js/employercontrol.js"></script>

    <!--Custom Assets for Confirmation-->
    <script src="../../custom-assets/sweetalert/sweetalert-dev.js"></script>
    <script src="../../custom-assets/sweetalert/sweetalert.min.js"></script>

    <!-- Custom TextArea for JobQualifcations-->
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <script><?php include('js/jobqualifications.js'); ?></script>
    
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
    header('Location: ../../index.php');
}
?>

lorem