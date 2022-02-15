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
    echo "<script>
            $(window).load(function(){
            $('#AddModal').modal('show');
            });
        </script>";
    }
    if(isset($_GET['emptyfields'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("You Must Filled All the Fields!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    echo "<script>
            $(window).load(function(){
            $('#AddModal').modal('show');
            });
        </script>";
    }
    if(isset($_GET['invalidjoblist'])) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal(This JobList has already existed try another one!", "You clicked the button!", "error");';
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
                <a class="nav-link" href="account.php">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Account</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="post-announcement.php">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Post Announcement</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-applicant.php">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Manage Applicant</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manage-joblist.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Manage Job Vacanies</span>
                </a>
            </li>
            <hr>

            <!-- ARCHIVE PAGE -->
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

                <div class="d-flex flex-row-reverse mb-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus"></i> Add Job List</button>
                </div> 

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-users"></i>
                        Job List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Job Name</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Job Name</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $query="SELECT *
                                        FROM employer_vacancy_profile
                                        WHERE eid = '".$_SESSION['uid']."'";
                                    if (!$result = $mysqli->query($query)){
                                        exit($mysqli->error);
                                    }
                                    if($result->num_rows > 0){
                                        $number = 1;
                                        
                                        while($row = $result->fetch_assoc()){
                                            $E_Id = $row['eid'];
                                            $J_Id = $row['id'];
                                            $E_JobName = $row['job_title'];
                                            $E_JobSummary = $row['job_summary'];
                                            $E_JobQualifications = $row['job_qualifications'];
                                            $E_JobRequirements = $row['job_requirements'];
                                            $E_JobStatus = $row['job_status'];
                                            $E_JobSalary = $row['job_salary'];
                                            $E_Category = $row['job_categories'];
                                            $E_JobType = $row['job_type'];
                                            $E_JobStatus = $row['job_status'];
                                ?>
                                    <tr>
                                        <td><?php echo $number;?></td>
                                        <td><?php echo $E_JobName;?></td>
                                        <td>
                                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#ViewModal<?php echo $row['id']; ?>"><i class="fas fa-eye"></i> View</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#EditModal<?php echo $row['id']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                        </td>
                                    </tr>

                                    <!-- View Modal-->
                                    <div class="modal fade" id="ViewModal<?php echo $J_Id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Announcement Information</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row mt-3">
                                                                    <div class="col-md-2 pl-5">
                                                                        <div>Job Title</div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div><strong><?php echo $E_JobName;?></strong></div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-2 pl-5">
                                                                        <div>Summary</div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div><strong><?php echo $E_JobSummary;?></strong></div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-2 pl-5">
                                                                        <div>Job Qualifcations</div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div><strong><?php echo $E_JobQualifications;?></strong></div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-2 pl-5">
                                                                        <div>Job Requirements</div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div><strong><?php echo $E_JobRequirements;?></strong></div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-2 pl-5">
                                                                        <div>Job Salary</div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div><strong><?php echo $E_JobSalary;?></strong></div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-2 pl-5">
                                                                        <div>Job Type</div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div><strong><?php echo $E_JobType;?></strong></div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-2 pl-5">
                                                                        <div>Job Category</div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div><strong><?php echo $E_Category;?></strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="eid" id="hidden_e_id" value="<?php echo $row['id'];?>">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal-->
                                    <div class="modal fade" id="EditModal<?php echo $J_Id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Announcement Information</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-header"><span>Announcement Information</span></div>
                                                        <div class="card-body">
                                                        <form action="../../php-func/admin/UpdateJobListEmployer.php" method="POST">
                                                        <div class="form-group mt-3">
                                                            <div class="form-group">
                                                                <label>Job Name</label>
                                                                <input type="text" name="e_jname" id="UpdateJobName" class="form-control" placeholder="Job Title" value="<?php echo $E_JobName; ?>" varequired="required">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="card mb-3">
                                                            <div class="card-header"><b>Job Summary</b></div>
                                                            <div class="card-body">
                                                                <textarea class="form-control" id="addjobdescription_textarea1" name="e_jsummary" placeholder="Job Summary" cols="30" rows="10"><?php echo $E_JobSummary; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="card mb-3">
                                                            <div class="card-header"><b>Job Qualifcations</b></div>
                                                            <div class="card-body">
                                                                <textarea class="form-control" id="addjobdescription_textarea2" name="e_jqualifications" placeholder="Job Qualifications" cols="30" rows="30"><?php echo $E_JobQualifications; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="card mb-3">
                                                            <div class="card-header"><b>Job Requirements</b></div>
                                                            <div class="card-body">
                                                                <textarea class="form-control" id="addjobdescription_textarea3" name="e_jrequirements" placeholder="Job Requirements" cols="30" rows="30"><?php echo $E_JobRequirements; ?></textarea>    
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="card mb-3">
                                                            <div class="card-header">
                                                                <b>Job Salary, Job Category, Job Type</b>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <label>Job Salary</label>
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">PHP</div>
                                                                                </div>
                                                                                <input type="text" name="e_jsalary"  class="form-control" placeholder="0" onkeypress="CheckNumeric(event);" value="<?php echo $E_JobSalary ?>">
                                                                                <div class="input-group-prepend">
                                                                                <div class="input-group-text">.00</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label>Job Category</label>
                                                                        <select name="e_jcategory" id="" class="form-control">
                                                                            <option value="<?php echo $E_Category;?>" readonly><?php echo $E_Category;?></option>
                                                                            <?php 
                                                                                $query = $mysqli->query("SELECT * FROM career_categories");
                                                                                    while($row = $query->fetch_assoc()){
                                                                                        $E_CareerCategories = $row['career_categories'];
                                                                            ?>
                                                                                <option value="<?php echo $E_CareerCategories; ?>"><?php echo $E_CareerCategories; ?></option>
                                                                            <?php
                                                                                    }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label>Job ype</label>
                                                                        <select name="e_jcategory" id="" class="form-control">
                                                                            <option value="<?php echo $E_JobType;?>" readonly><?php echo $E_JobType;?></option>
                                                                            <?php 
                                                                                $query = $mysqli->query("SELECT * FROM job_type");
                                                                                    while($row = $query->fetch_assoc()){
                                                                                        $E_JobType = $row['job_type'];
                                                                            ?>
                                                                                <option value="<?php echo $E_JobType; ?>"><?php echo $E_JobType; ?></option>
                                                                            <?php
                                                                                    }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        </form>
                                                        </div>
                                                        <div class="card-footer"></div>
                                                    </div>
                                                    <hr>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="text-center">Hiring Status</label>
                                                                    <?php
                                                                    if($E_JobStatus == 'Hiring'){
                                                                        echo'<button onclick="GetJobHiringStatusDetails('.$J_Id.')" class="btn btn-success btn-block"><i class="fas fa-user-plus"></i> Hiring
                                                                        </button>';
                                                                    }elseif($E_JobStatus == 'Hired'){
                                                                        echo'<button onclick="GetJobHiredStatusDetails('.$J_Id.')" class="btn btn-danger btn-block"><i class="fas fa-user-slash"></i> Hired</button>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="text-center">Job Delete</label>
                                                                    <button onclick="GetJobDeleteDetails(<?php echo $J_Id; ?>)" class="btn btn-danger btn-block">
                                                                        <i class="fas fa-box"></i> Delete
                                                                    </button>
                                                                    <!-- <label class="text-center">Job Archive</label>
                                                                    <button onclick="GetUserStatusArchivedDetails(<?php echo $row['eid'] ?>)" class="btn btn-danger btn-block">
                                                                        <i class="fas fa-box"></i> Archived
                                                                    </button> -->
                                                                </div>
                                                            </div>
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

    <!-- Add Modal -->
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="../../php-func/employer/AddJobListEmployer.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Job List </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <div class="form-group">
                                <label>Job Name</label>
                                <input type="text" name="e_jname" id="UpdateJobName" class="form-control" placeholder="Job Name" varequired="required">
                            </div>
                        </div>
                            <hr>
                        <div class="card mb-3">
                            <div class="card-header"><b>Job Summary</b></div>
                            <div class="card-body">
                                <textarea class="form-control" id="jobdescription_textarea1" name="e_jsummary" placeholder="Job Summary" cols="30" rows="30"></textarea>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header"><b>Job Qualifcations</b></div>
                            <div class="card-body">
                                <textarea class="form-control" id="jobdescription_textarea2" name="e_jqualifications" placeholder="Job Qualifications" cols="30" rows="30"></textarea>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header"><b>Job Requirements</b></div>
                            <div class="card-body">
                                <textarea class="form-control" id="jobdescription_textarea3" name="e_jrequirements" placeholder="Job Requirements" cols="30" rows="30"></textarea>    
                            </div>
                        </div>
                        <hr>
                        <div class="form-group mt-3">
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="e_jlocation" id="JobLocation" class="form-control" placeholder="Job Location" varequired="required">
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <b>Job Salary, Job Category, Job Type</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Job Salary</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">PHP</div>
                                                </div>
                                                <input type="text" name="e_jsalary"  class="form-control" placeholder="0" onkeypress="CheckNumeric(event);">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label>Job Category</label>
                                        <select name="e_jcategory" id="" class="form-control">
                                            <option disabled>Job Category</option>
                                            <?php 
                                                $query = "SELECT * FROM career_categories";
                                                if (!$result = $mysqli->query($query)){
                                                    exit($mysqli->error);
                                                }
                                                if($result->num_rows > 0){
                                                    while($row = $result->fetch_array()){
                                                        $E_CarrerCategories = $row['career_categories'];
                                            ?>
                                                <option value="<?php echo $E_CarrerCategories; ?>"><?php echo $E_CarrerCategories; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                    <label>Job Type</label>
                                    <select name="e_jtype" id="" class="form-control">
                                    <option disabled>Job Type</option>
                                    <?php
                                        $query = "SELECT * FROM job_type";
                                        if (!$result = $mysqli->query($query)){
                                            exit($mysqli->error);
                                        }
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_array()){
                                                $E_JobType = $row['job_type'];
                                    ?>
                                    <option value="<?php echo $E_JobType; ?>"><?php echo $E_JobType; ?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                                </div>
                            </div>         
                        </div>
                    <div class="modal-footer">
                        <input type="hidden" name="e_id" id="hidden_eid" value="<?php echo $_SESSION['uid']; ?>">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary add-confirm" value="Add Job List">
                    </div>
                </form>
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
    header('Location: ../login/login.php');
}
?>