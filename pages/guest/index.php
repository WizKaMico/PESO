<!-- Linked to Main Index(PESO_System/index.php) -->
<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    include("../PESO_System/php-func/conn.php");
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

</head>

<body id="page-top">

    <nav class="navbar navbar-expand bg-dark navbar-dark  static-top">

		<a class="navbar-brand mr-1" href="index.php" style="font-size: 16px;">
            <div class="row">
                <div class="col-2"><img src="images/pesologo.png" alt="Logo.png" width="60px;"></div>
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
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">Contact Us</a>
            </li>
            <li class="nav-link">
                <a>||</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary" href="pages/login/login.php">Login</a>
            </li>
        </ul>

    </nav>

    <div id="wrapper">

        <div id="content-wrapper">

            <div class="container-fluid">
			
				<div class="row justify-content-md-center">

					<div class="col-xl-10 col-sm-10 mb-1">

						<div class="card col-xl-12 col-sm-12 mb-4 shadow">

							<div class="card-body">
								<form method="POST" action="pages/guest/result.php">
									<div class="col-xl-12 col-sm-12 mb-12">
										<div class="row justify-content-md-center">
											<div class="col-xl-5 col-sm-6 mb-6 p-2">
												<label>Search Job</label>
												<input type="text" name="search" class="col-xl-12 col-sm-12 mb-12 w-100" placeholder="Search Job Here">      
											</div>
											<div class="col-xl-5 col-sm-6 mb-6 p-2">
												<label>Location</label>
												<input type="text" class="col-xl-12 col-sm-12 mb-12 w-100" placeholder="Location">
											</div>
										</div>
									</div>
									<div class="col-xl-12 col-sm-12 mb-12">
										<div class="row justify-content-md-center">
											<div class="col-xl-2 col-sm-4 mb-4 p-2">
												<div class="form-group">
													<label for="SalaryGrade">Salary Min</label>
													<select class="form-control" id="SalaryGradeMin" placeholder="Salary Grade">
														<option selected>Salary Min</option>
														<?php
															$SalarySelect = $mysqli->query("SELECT * FROM salary_grade");
															while($salary = $SalarySelect->fetch_assoc()){
																$salarygraderow = $salary['salary_grade'];
																$salaryrow = $salary['salary_range'];
											
																echo"<option value='$salarygraderow'>$salaryrow</option><\n>";
															}
														?>
													</select>
												</div>
											</div>
											<div class="col-xl-2 col-sm-4 mb-4 p-2">
												<div class="form-group">
													<label for="SalaryGrade">Salary Max</label>
													<select class="form-control" id="SalaryGradeMax" placeholder="Salary Grade">
														<option selected>Salary Max</option>
														<?php
															$SalarySelect = $mysqli->query("SELECT * FROM salary_grade");
															while($salary = $SalarySelect->fetch_assoc()){
																$salarygraderow = $salary['salary_grade'];
																$salaryrow = $salary['salary_range'];
											
																echo"<option value='$salarygraderow'>$salaryrow</option><\n>";
															}
														?>
													</select>
												</div>
											</div>
											<div class="col-xl-3 col-sm-4 mb-4 p-2">
												<div class="form-group">
													<label for="SalaryGrade">Job Type</label>
													<select class="form-control" id="EmploymentType" placeholder="Employment Type">
														<option selected>Job Type</option>
														<?php
															$CareerSelect = $mysqli->query("SELECT * FROM career_categories");
															while($career = $CareerSelect->fetch_assoc()){
																$careernamerow = $career['career_categories'];
																$careerrow = $career['career_categories'];
											
																echo"<option value='$careernamerow'>$careerrow</option><\n>";
															}
														?>
													</select>
												</div>
											</div>
											<div class="col-xl-3 col-sm-4 mb-4 p-2">
												<div class="form-group">
													<label for="SalaryGrade">Employment Type</label>
													<select class="form-control" id="JobType" placeholder="Job Type">
														<option selected>Employment Type</option>
														<?php
															$JobTypeSelect = $mysqli->query("SELECT * FROM job_type");
															while($job = $JobTypeSelect->fetch_assoc()){
																$jobtyperow = $job['job_type'];
																$jobrow = $job['job_type'];
											
																echo"<option value='$jobtyperow'>$jobrow</option><\n>";
															}
														?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-12 col-sm-12 mb-12" style="padding-right : 110px; padding-left : 110px;">
										<button type="submit" class="btn btn-primary btn-block">Search</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xl-10 col-sm-10 mb-8">

						
							<div class="card col-xl-12 col-sm-12 mb-4 shadow">

								<div class="card-body">

									<?php include("joblist.php") ?>
							
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

</body>

</html>