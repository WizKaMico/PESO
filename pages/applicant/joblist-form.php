<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    session_start();
    include("../../php-func/conn.php");
    if(isset($_SESSION["access"])){
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
  <link href="css/customcssstyle.css" rel="stylesheet">

  <script>
        if (typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
        }
    </script>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="index.php" style="font-size: 16px;">
            <div class="row">
                <div class="col-2"><img src="../../images/pesologo.png" alt="Logo.png" width="60px;"></div>
                <div class="col-10 align-self-center" style="font-size: 18px;">Public Employment Service Office - Malolos</div>
            </div>
        </a>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">Contact Us</a>
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

        <div id="content-wrapper">

            <div class="container-fluid">
			
				<div class="row justify-content-md-center">

					<div class="col-xl-10 col-sm-10 mb-8">
                        <div class="card col-xl-12 col-sm-12 mb-4 shadow">
                            <div class="card-body">
                            <form action="../../php-func/employer/UpdateEmployerProfile.php" method="post">
                                <div class="card">
                                <div class="card-header"><i class="fas fa-id-card-alt"></i> Profile Information</div>
                                    <div class=card-body>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-5 mt-3">
                                                    <div class="form-label-group">
                                                        <input type="text" name="e_fname" id="UpdateFirstName" class="form-control" placeholder="Last name" value="<?php echo $E_FName; ?>">
                                                        <label for="UpdateFirstName">Firstname</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 mt-3">
                                                    <div class="form-label-group">
                                                        <input type="text" name="e_lname" id="UpdateLastName" class="form-control" placeholder="Last name" value="<?php echo $E_LName; ?>">
                                                        <label for="UpdateLastName">Last name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-3">
                                                    <div class="form-label-group">
                                                        <input type="text" name="e_mname" id="UpdateMiddleName" class="form-control" placeholder="M.I" value="<?php echo $E_MName; ?>">
                                                        <label for="UpdateMiddleName">M.I</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-3">
                                                    <div class="form-label-group">
                                                        <input type="text" name="e_suffix" id="UpdateSuffixName" class="form-control" placeholder="Suffix" value="<?php echo $E_Suffix; ?>">
                                                        <label for="UpdateSuffixName">Suffix</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <div class="form-label-group">
                                                <input type="text" name="e_email" id="UpdateEmail" class="form-control" placeholder="Username"  value="<?php echo $E_CompanyEmail; ?>">
                                                <label for="UpdateEmail">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-2">
                                <div class="card-header"><i class="fas fa-building"></i> Company Profile</div>
                                    <div class=card-body>
                                        <div class="form-group mt-3">
                                            <div class="form-label-group">
                                                <input type="text" name="e_cname" id="UpdateCompanyName" class="form-control" placeholder="Company Name"  value="<?php echo $E_CompanyName; ?>">
                                                <label for="UpdateCompanyName">Company Name</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-label-group">
                                                        <input type="text" name="bno" id="BuildingNumber" class="form-control" placeholder="Building No./House No./Street No." value="<?php echo $E_BuildingNo; ?>">
                                                        <label for="BuildingNumber">Building No./House No./Street No.</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-label-group">
                                                        <input type="text" name="sname" id="StreetName" class="form-control" placeholder="Street Name" value="<?php echo $E_StreetName; ?>">
                                                        <label for="StreetName">Street Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-3 mb-3">
                                                    <div class="form-label-group">
                                                        <input type="text" name="bname" id="BarangayName" class="form-control" placeholder="Barangay Name" value="<?php echo $E_BarangayName; ?>">
                                                        <label for="BarangayName">Barangay/District</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <div class="form-label-group">
                                                        <input type="text" name="cname" id="CityName" class="form-control" placeholder="City Name" value="<?php echo $E_CityName; ?>">
                                                        <label for="CityName">City/Municipality</label>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-3 mb-3">
                                                    <div class="form-label-group">
                                                        <input type="text" name="pname" id="ProvinceName" class="form-control" placeholder="Province Name" value="<?php echo $E_ProvinceName; ?>">
                                                        <label for="ProvinceName">Province</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <div class="form-label-group">
                                                        <input type="text" name="zcode" id="ZipCode" class="form-control" placeholder="Zip Code" value="<?php echo $E_ZipCode; ?>">
                                                        <label for="ZipCode">Zip Code</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="form-label-group">
                                                    <input type="text" name="industytype" id="IndustryType" class="form-control" placeholder="Industry Type">
                                                    <label for="IndustryType">Industry Type</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"    class="btn btn-primary mt-3 account-secure-submit">Submit</button>
                                <input type="hidden" name="e_id" id="hidden_e_id" value="<?php echo $E_Id ?>">
                            </form>
                            </div>
                        </div>
                    </div>

                </div>
				
            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="footer">
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

</body>

</html>
<?php 
    }else{
        header('Location: ../../pages/login/applicantlogin.php');
        $url = "../../pages/login/applicantlogin.php";
        echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'; 
    }
?>