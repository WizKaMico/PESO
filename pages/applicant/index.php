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


<?php
                            if(isset($_SESSION['uid'])){
                            $query ="SELECT *
                                     FROM users 
                                     JOIN applicant_profile 
                                     ON users.id=applicant_profile.uid
                                     JOIN applicant_preference_profile 
                                     ON users.id=applicant_preference_profile.aid
                                     JOIN applicant_education_profile 
                                     ON users.id=applicant_education_profile.aid
                                     JOIN applicant_employment_profile 
                                     ON users.id=applicant_employment_profile.aid
                                     WHERE users.id = '".$_SESSION['uid']."'";

                                if (!$result = $mysqli->query($query)) {
                                    exit($mysqli->error);
                                }
                                
                                $result = $mysqli->query($query);
                                $row = $result->fetch_array();
                                $A_LName = $row['lname'];
                                $A_FName = $row['fname'];
                                $A_MName = $row['mname'];
                                $A_Suffix = $row['suffix'];
                                $A_Gender = $row['gender'];
                                $A_BMonth = $row['birthmonth'];
                                $A_BDate = $row['birthdate'];
                                $A_BYear = $row['birthyear'];
                                $A_Religion = $row['religion'];
                                $A_CivilStatus = $row['civil_status'];
                                $A_BuildNo = $row['build_no'];
                                $A_StreetName= $row['street_name'];
                                $A_City = $row['city'];
                                $A_Province = $row['province'];
                                $A_ZipCode = $row['zip_code'];
                                $A_Cont1 = $row['primary_contact_number'];
                                $A_Cont2 = $row['secondary_contact_number'];
                                $A_EmployementStatus1= $row['employment_status'];
                                $A_EmployementStatus2= $row['employment_type'];
                                $A_LaidOffCountry= $row['employment_location'];
                                $A_WorkStatus = $row['find_work_status'];
                                $A_WorkReason = $row['find_work_comment'];
                                $A_4pStatus = $row['beneficiary_status'];
                                $A_4pNo = $row['beneficiary_id'];
                                $A_JobPreference1 = $row['occupation_type'];
                                $A_JobPreference2 = $row['industry_type'];
                                $A_ApplyWorkStatus= $row['prompt_work_status'];
                                $A_ApplyWork = $row['prompt_work_comment'];
                                $A_WorkLocationStatus = $row['work_location_status'];
                                $A_WorkLocationOverseas = $row['work_location_overseas'];
                                $A_WorkLocationLocal = $row['work_location_local'];
                                $A_EducationStatus = $row['current_school_status'];
                                $A_HighestEducationStatus = $row['current_education_status']; 
                                $A_SchoolName = $row['school_name'];
                                $A_SchoolYear = $row['school_year'];
                                $A_CourseName = $row['course'];
                                $A_CourseYear = $row['course_year'];
                                $A_AwardName = $row['awards'];
                                $A_AwardYear = $row['awards_year'];
                                    

                            }   
                    ?>

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
                <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="announcement.php">Announcement</a>
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

                    <div class="col-xl-10 col-sm-10 mb-1">
                        <div class="card col-xl-12 col-sm-12 mb-4 shadow">
                            <div class="card-body">
                                <h5>Hi! <?php echo $A_FName; ?></h5>
                                <?php date_default_timezone_set('Asia/Manila') ?>
                                <p><?php echo date('F d Y h:i:sa'); ?></p>
                                <form action="result.php" method="post">
                                    <div class="col-xl-12 col-sm-12 mb-12">
                                            <div class="row justify-content-md-center">
                                                <div class="col-xl-5 col-sm-6 mb-6 p-2">
                                                    <label>Search Job </label>
                                                    <input type="text" class="col-xl-12 col-sm-12 mb-12 w-100" placeholder="Search Job Here">      
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

