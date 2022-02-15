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

    <!-- <script>
        if (typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
        }
    </script> -->

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
            <li class="nav-item">
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
                    <span>Application Status</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="post-announcement.php">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Post Announcement</span>
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

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Post Announcement</li>
                </ol>

                
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-clipboard-list"></i> Post Announcement</div>
                    <div class="card-body">
                        <form action="../../php-func/employer/AddAnnouncementEmployer.php" method="post">
                            <div class="card">
                            <div class="card-header"><i class="fas fa-clipboard"></i> Post Announcement </div>
                                <div class=card-body>
                                    <div class="form-group mt-3">
                                        <div class="form-label-group">
                                            <input type="text" name="e_announcementtitle" id="UpdateJobName" class="form-control" placeholder="Username" varequired="required">
                                            <label for="UpdateJobName"> Title </label>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header"><b>Announcement</b></div>
                                        <div class="card-body">
                                            <textarea name="e_announcementdesc" class="form-control" id="jobdescription_textarea2" placeholder="Announcement" cols="30" rows="30"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">    
                                   <input type="submit" class="btn btn-primary add-confirm" value="Post Announcement">
                                   <input type="hidden" name="e_id" id="hidden_eid" value="<?php echo $_SESSION['uid']; ?>">
                                   <input type="hidden" name="id" id="hidden_eid" value="<?php echo $E_AId; ?>">
                                </div>
                            </div>
                        </form>
                        </div>
                    <div class="card-footer"></div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-bullhorn"></i>
                        Announcement</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Announcement</th>
                                        <th>Edit</th>
                                        <th>Danger</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Announcement</th>
                                        <th>Edit</th>
                                        <th>Danger</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                    $query = "SELECT *
                                    FROM employer_announcement
                                    WHERE eid = '".$_SESSION['uid']."'";

                                    if (!$result = $mysqli->query($query)){
                                        exit($mysqli->error);
                                    }
                                    if($result->num_rows > 0){
                                        $number = 1;
                                        
                                        while($row = $result->fetch_assoc()){
                                            $E_Id = $row['id'];
                                            $E_JobName = $row['announcement_title'];
                                ?>

                                    <tr>
                                        <td><?php echo $number;?></td>
                                        <td><?php echo $E_JobName;?></td>
                                        <td>
                                            <button onclick="GetUpdateAnnouncementDetails(<?php echo $row['id'] ?>)" class="btn btn-primary">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </td>
                                        <td>
                                            <button onclick="GetPostDeleteDetails(<?php echo $row['id'] ?>)" class="btn btn-danger">
                                                <i class="fas fa-box"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
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
        <!-- LOGOUT MODAL -->
    <div class="modal fade" id="UpdateAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Announcement</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                        if(isset($_SESSION['uid'])){
                            $query1 ="SELECT *
                                     FROM employer_announcement
                                     WHERE eid = '".$_SESSION['uid']."'";
                        
                                $result = $mysqli->query($query1);

                                if (!$result = $mysqli->query($query1)) {
                                    exit($mysqli->error);
                                }
                            
                        
                            $row = $result->fetch_assoc();
                                $E_AnnouncemntTitle = $row['announcement_title'];
                                $E_AnnouncemntDesc = $row['announcement_description'];
                    ?>
                        <form action="../../php-func/employer/AnnouncementUpdateEmployer.php" method="post">
                            <div class="card">
                            <div class="card-header"><i class="fas fa-clipboard"></i> Post Announcement </div>
                                <div class=card-body>
                                    <div class="form-group mt-3">
                                        <div class="form-label-group">
                                            <input type="text" name="e_announcementtitle" id="UpdateJobName" class="form-control" placeholder="Username" varequired="required" value="<?php echo $E_AnnouncemntTitle; ?>">
                                            <label for="UpdateJobName"> Title </label>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header"><b>Announcement</b></div>
                                        <div class="card-body">
                                            <textarea name="e_announcementdesc" class="form-control" id="jobdescription_textarea3" placeholder="Announcement" cols="30" rows="30"><?php echo $E_AnnouncemntDesc;?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">    
                                   <input type="submit" class="btn btn-primary add-confirm" value="Post Announcement">
                                   <input type="hidden" name="eid" id="hidden_eid" value="<?php echo $_SESSION['uid']; ?>">
                                   <input type="hidden==" name="id" id="hidden_eid" value="<?php echo $row['id']; ?>">
                                </div>
                            </div>
                        </form>
                        <?php
                            }
                        ?>
                </div>
                <div class="modal-footer">
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