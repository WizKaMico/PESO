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
									<form action="">
										<div class="col-xl-12 col-sm-12 mb-12">
												<div class="row justify-content-md-center">
													<div class="col-xl-5 col-sm-6 mb-6 p-2">
														<input type="text" class="col-xl-12 col-sm-12 mb-12 w-100" placeholder="Search Job Here">      
													</div>
													<div class="col-xl-5 col-sm-6 mb-6 p-2">
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
															<select class="form-control" id="JobType" placeholder="Job Type">
																<option selected>Job Type</option>
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
													<div class="col-xl-3 col-sm-4 mb-4 p-2">
														<div class="form-group">
															<label for="SalaryGrade">Employment Type</label>
															<select class="form-control" id="EmploymentType" placeholder="Employment Type">
																<option selected>Employment Type</option>
																<?php
																	$CareerSelect = $mysqli->query("SELECT * FROM career_type");
																	while($career = $CareerSelect->fetch_assoc()){
																		$careernamerow = $career['career_name'];
																		$careerrow = $career['career_name'];
													
																		echo"<option value='$careernamerow'>$careerrow</option><\n>";
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
					    

 <!-- Modal -->
  <div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
          <p>TERMS AND CONDITION</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">I AGREE</button>
          <a href="index.php" class="btn btn-default">I DONT AGREE</a>
        </div>
      </div>
      
    </div>
  </div>
						
							<div class="card col-xl-12 col-sm-12 mb-4 shadow">

								<div class="card-body">

                                <?php
                                            if(isset($_GET['jid'])){
                                                $id = $mysqli->real_escape_string($_GET['jid']);
                                                $query = "SELECT *
                                                            FROM employer_company_profile
                                                            RIGHT JOIN employer_vacancy_profile
                                                            ON employer_company_profile.eid = employer_vacancy_profile.eid
                                                            WHERE employer_vacancy_profile.id = '$id'";

                                            if (!$result = $mysqli->query($query)) {
                                                exit($mysqli->error);
                                            }

                                            $result = $mysqli->query($query);
                                                $row = $result->fetch_array();

                                            $eid = $row['eid'];
                                            $jid = $row['id'];
                                            $jstatus = $row['job_status'];
                                            $cname = $row['company_name'];
                                            $jname = $row['job_title'];
                                            $jlocation = $row['job_location'];
                                            $jsalary = $row['job_salary'];
                                            $jtype = $row['job_type'];
                                            $jemployement = $row['job_categories'];
                                            $jqualifications = $row['job_qualifications'];
                                            $jsummary = $row['job_summary'];
                                            $jrequirements = $row['job_requirements'];
                                        ?>

                                            <div class="card m-4 shadow ">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="ml-3 mr-3">   
                                                        <div class="col-xl-12 col-sm-12" style="font-size: 20px;">
                                                            <strong><?php echo $jname;?></strong>
                                                        </div>
                                                        <div class="col-xl-12 col-sm-12" style="font-size: 18px;">
                                                            <?php echo $cname;?>
                                                        </div>
                                                        <div class="col-xl-12 col-sm-12" style="font-size: 16px;">
                                                            <?php echo $jlocation;?>
                                                        </div>
                                                        <div class="col-xl-12 col-sm-12">
                                                            Php <?php echo $jsalary;?>/Per Month
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="ml-3 mr-3">   
                                                    <div class="col-xl-12 col-sm-12" style="font-size: 20px;">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <?php 
                                                                if(isset($_GET['success']) == 'apply') { 
                                                                    echo '<div class="form-group">
                                                                            <div class="btn btn-success btn-block">Your CV/Resume Has Sent</div>
                                                                        </div>'; 
                                                                    }
                                                                if(isset($_GET['error']) == 'empty') { 
                                                                    echo '<div class="form-group">
                                                                            <div class="btn btn-danger btn-block">Please Upload your CV/Resume</div>
                                                                        </div>'; 
                                                                    } 
                                                                ?>
                                                                <form action="../../php-func/file_function/ApplyJob.php" method="POST" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            Upload CV/Resume
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <?php
                                                                                $aid = $_SESSION['uid'];
                                                                                $checkid1 = $mysqli->query("SELECT * FROM applicant_file WHERE aid = '$aid' ORDER BY id DESC");

                                                                                            $row = $checkid1->fetch_array();
                                                                                if($checkid1->num_rows != 0){
                                                                            ?>
                                                                                <a href="../../upload/<?php echo $row['file_name']; ?>" target="_blank" class="btn btn-primary btn-block">
                                                                                    <i class="fas fa-file-upload"></i> View File
                                                                                </a>
                                                                                <input type="hidden" name="fid" value="<?php echo $row['id'];?>">   
                                                                            <?php
                                                                                }else{
                                                                            ?>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile04" required>
                                                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                                                </div>
                                                                                <p style="font-size: 12px; color:red;">*Upload PDF File Only</p>
                                                                            <?php        
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3">
                                                                        <input type="hidden" name="jid" value="<?php echo $jid; ?>">
                                                                        <input type="hidden" name="eid" value="<?php echo $eid; ?>">
                                                                        <input type="hidden" name="aid" value="<?php echo $_SESSION['uid']; ?>">
                                                                        <button type="submit" class="btn btn-primary btn-block">Apply</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <?php
                                            }
                                            
                                        ?>

								</div>
							</div>

					</div>

				</div>
				
            </div>
            <!-- /.container-fluid -->
            
            
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

  

    
    <script src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
           $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
    </script>

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
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- partial -->

  
  
  					         <script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>

</body>

</html>

<?php 
    }else{
        header('Location: ../../index.php');
        $url = "../../index.php";
        echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
    }
?>