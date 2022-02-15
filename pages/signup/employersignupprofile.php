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
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Custom styles for this template-->
<link href="../../css/sb-admin.min.css" rel="stylesheet">

<style>
    .fs-1{
        font-size: 14px;
    }
    .fs-2{
        font-size: 15px;
    }
</style>

<?php
    if(isset($_GET['accountupdate'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Your Profile Has Successfully Updated!", "You clicked the button!", "success");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['emptyfields'])){
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("You Must Filled All the Fields!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['invalidusername'])) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal(This Username has already existed try another one!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    }
    if(isset($_GET['checkpassword'])) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Your Password Does Not Match Please Try Again!", "You clicked the button!", "error");';
    echo '}, 500);</script>';
    }
    ?>

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card mx-auto mt-5 ">
          <div class="card-header"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <img src="../../images/pesologo.png" alt="PESO.png" class="responsive ml-2 d-flex justify-content-center">
                    </div>
                    <div class="col-6">
                        <?php
                            if(isset($_GET['error'])){
                                if($_GET['error'] == 'emptyfields'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-danger btn-block">Please Fill up all Fields!</div>
                                    </div>
                                    ';
                                }elseif($_GET['error'] == 'invalidEmail'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-danger btn-block">Invalid Email</div>
                                    </div>
                                    ';
                                }elseif($_GET['error'] == 'invalidUsername'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-danger btn-block">Invalid Username</div>
                                    </div>
                                    ';  
                                }elseif($_GET['error'] == 'checkInfoContact'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-danger btn-block">Invalid Contact Number!</div>
                                    </div>
                                    ';  
                                }elseif($_GET['error'] == 'checkpassword'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-danger btn-block">Password Does Not Match!</div>
                                    </div>
                                    ';  
                                }
                            }
                            if(isset($_GET['message'])){
                                if($_GET['message'] == 'success'){
                                    echo '
                                    <div class="form-group">
                                        <div class="btn btn-success btn-block">Your Inquiry has been Sent!</div>
                                    </div>
                                    ';
                                }

                            }
                        ?>
                        <form method="post" action="../../php-func/applicant/FormApplicant1.php" novalidate>
                        <div class="card">
                            <div class="card-header"><i class="fas fa-id-card-alt"></i> I. Profile Information</div>
                            <div class=card-body>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label><strong>Personal Information</strong></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="fs-1 mb-1" for="UpdateFirstName">Firstname</label>
                                            <input type="text" name="a_fname" id="UpdateFirstName" class="form-control" placeholder="Firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <label  class="fs-1 mb-1" for="UpdateFirstName">Lastname</label>
                                            <input type="text" name="a_lname" id="UpdateFirstName" class="form-control" placeholder="Lastname">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <label class="fs-1 mb-1" for="UpdateFirstName">M.I.</label>
                                            <input type="text" name="a_mname" id="UpdateFirstName" class="form-control" placeholder="M.I.">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <label class="fs-1 mb-1" for="UpdateFirstName">Suffix</label>
                                            <input type="text" name="a_suffix" id="UpdateFirstName" class="form-control" placeholder="Suffix">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="col-md-6">
                                            <label class="fs-1 mb-1" for="floatingSelect">Gender</label>
                                            <select class="custom-select" id="floatingSelect" name="a_gender">
                                                <option selected disabled>Choose..</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fs-1 mb-1" for="UpdateFirstName">Birthday</label>
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <!-- <label for="">Month</label> -->
                                                <select name="a_bmonth" id="month" class="form-control">
                                                    <option selected disabled>Month</option>
                                                        <?php
                                                            for($month = 1; $month <= 12; $month++)
                                                            echo"<option value = '".$month."'>".$month."</option>";
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- <label for="">Day</label> -->
                                                <select name="a_bday" id="day" class="form-control">
                                                <option selected disabled>Day</option>
                                                    <?php
                                                            for($day = 1; $day <= 31; $day++){
                                                            echo "<option value = '".$day."'>".$day."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- <label for="">Year</label> -->
                                                <select name="a_byear" id="year" class="form-control">
                                                    <option selected disabled>Year</option>
                                                    <?php
                                                        $y = date("Y", strtotime("+8 HOURS"));
                                                        for($year = 1900; $y >= $year; $y--){
                                                            echo "<option value = '".$y."'>".$y."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                            <label class="fs-1 mb-1" for="UpdateFirstName">Religion</label>
                                            <input type="text" name="a_religion" id="UpdateFirstName" class="form-control" placeholder="Religion">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label class="fs-1 mb-1" for="floatingSelect">Civil Status</label>
                                        <select class="custom-select" id="floatingSelect" name="a_civilstatus">
                                            <option selected disabled>Choose..</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Separated">Separated</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row mt-2">
                                    <div class="col-md-12">
                                        <label><strong>Address</strong></label>
                                    </div>
                                    <!-- <label class="mt-2"><strong>Current Address</strong></label> -->
                                    <div class="col-md-6">  
                                        <label  class="fs-1 mb-1" for="CurrentBuildNo">Building No., House No., Street No.</label>
                                        <input type="text" name="a_cbulidno" id="CurrentBuildNo" class="form-control"  >
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fs-1 mb-1" for="CurrentStreetName">Street Name</label>
                                        <input type="text" name="a_cstreetname" id="CurrentStreetName" class="form-control"  >
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-md-3">
                                        <label  class="fs-1 mb-1" for="CurrentCity">City/Municipality</label>
                                        <input type="txt" name="a_ccity" id="CurrentCity" class="form-control"  >
                                    </div>
                                    <div class="col-md-6">
                                        <label  class="fs-1 mb-1" for="CurrentProvince">Province</label>
                                        <input type="text" name="a_cprovince" id="CurrentProvince" class="form-control"  >
                                    </div>
                                    <div class="col-md-3">
                                        <label  class="fs-1 mb-1" for="CurrentZipCode">Zip Code</label>
                                        <input type="text" name="a_czipcode" id="CurrentZipCode" class="form-control"  >
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label><strong>Contact Number</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label  class="fs-1 mb-1" for="UpdateFirstName">Primary Number</label>
                                        <input type="text" name="a_contno1" id="UpdateFirstName" class="form-control"  >
                                    </div>
                                    <div class="col-md-6">
                                        <label  class="fs-1 mb-1" for="UpdateFirstName">Secondary Number</label>
                                        <input type="text" name="a_contno2" id="UpdateFirstName" class="form-control"  >
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label class="mt-2"><strong>Employment Status</strong></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentcheck" id="EmployedCheck" class="form-check-input" value="Employed">
                                            <label for="EmployedCheck">Employed</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentcheck" id="UnemployedCheck" class="form-check-input" value="Unemployed">
                                            <label for="UnemployedCheck">Unemployed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 ps-5">
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentstatuscheck" id="FullTimeCheck" class="form-check-input" value="Full Time Employed">
                                            <label for="FullTimeCheck">Full-Time Employed</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentstatuscheck" id="PartTimeCheck" class="form-check-input" value="Part Time Employed">
                                            <label for="PartTimeCheck">Part-Time Employed</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentstatuscheck" id="SelfEmployedCheck" class="form-check-input" value="Self-Employed">
                                            <label for="SelfEmployedCheck">Self-Employed</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-5">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="FreshGraduateCheck" class="form-check-input" value="Fresh Graduate">
                                                    <label for="FreshGraduateCheck">Fresh Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="FinishedContractCheck" class="form-check-input" value="Finished Contract">
                                                    <label for="FinishedContractCheck">Finished Contract</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="ResignedCheck" class="form-check-input" value="Resigned">
                                                    <label for="UnemployedCheck">Resigned</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="RetiredCheck" class="form-check-input" value="Retired">
                                                    <label for="RetiredCheck">Retired</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="LocalLaidoffCheck" class="form-check-input" value="Laidoff-Local">
                                                    <label for="LocalLaidoffCheck">Terminated/Laidoff(Local)</label>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-check">
                                                            <input type="radio" name="a_unemploymentstatuscheck" id="OverseasLaidoffCheck" class="form-check-input" value="Laidoff-Overseas">
                                                            <label for="OverseasLaidoffCheck">Terminated/Laidoff(Abroad)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="fs-1 mb-1" for="SpecifyLaidoffCountry">Specify Country</label>
                                                        <input type="text" name="a_laidoffcountry" id="SpecifyLaidoffCountry" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-md-4">
                                        <label style="font-size: 16px;">Are you actively looking for work?</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="radio" name="a_findworkcheck" id="ApplicantFindWork" class="form-check-input" value="Yes">
                                                    <label for="ApplicantFindWork">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="radio" name="a_findworkcheck" id="ApplicantNoFindWork" class="form-check-input" value="No">
                                                    <label for="ApplicantNoFindWork">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="a_findworkreason" id="ApplicantFindWorkReason" class="form-control">
                                            <label class="fs-1 mb-1" for="ApplicantFindWorkReason" style="font-size: 14px;">If Yes, How long have you been looking for work?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-4">
                                        <label style="font-size: 16px;">Willing to work immediately?</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_applyworkcheck" id="ApplicantApplyWork" class="form-check-input" value="Yes">
                                                    <label for="ApplicantApplyWork">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_applyworkcheck" id="ApplicantNoApplyWork" class="form-check-input" value="No">
                                                    <label for="ApplicantNoApplyWork">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="a_applyworkreason" id="ApplicantApplyWorkReason" class="form-control">
                                            <label class="fs-1 mb-1" for="ApplicantApplyWorkReason" style="font-size: 14px;">If No, when?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-4">
                                        <label style="font-size: 16px;">Are you a 4P's Beneficiary?</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_4pcheck" id="Applicant4PCheck" class="form-check-input" value="Yes">
                                                    <label for="Applicant4PCheck">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_4pcheck" id="Applicant4PNoCheck" class="form-check-input" value="No">
                                                    <label for="Applicant4PNoCheck">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="a_4pidno" id="Applicant4Pidno" class="form-control">
                                            <label for="Applicant4Pidno" style="font-size: 14px;">If Yes, Enter Your Household ID No.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header"><i class="fas fa-id-card-alt"></i> II. Job Preference</div>
                            <div class=card-body>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label><strong>Preferred Occupation and Industry</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fs-1 mb-1" for="ApplicantOccupation">Occupation(e.g., Call Center Agent, Saleslady etc.)</label>
                                        <input type="text" name="a_occuupation" id="ApplicantOccupation" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fs-1 mb-1" for="ApplicantIndustry">Industry(e.g., IT, Manufacturing, Accounting etc.)</label>
                                        <input type="text" name="a_industry" id="ApplicantIndustry" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                <label><strong>Preferred Work Location</strong></label>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_work" id="ApplicantLocalCheck" class="form-check-input" value="Local">
                                                    <label class="form-check-label" for="ApplicantLocalCheck">Local</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_work" id="ApplicantOverseasCheck" class="form-check-input" value="Overseas">
                                                    <label class="form-check-label" for="ApplicantOverseasCheck">Overseas</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label class="fs-1 mb-1" for="SpecifyLocal">Specify Cities/Muncipalities</label>
                                                <input type="text" name="a_local" id="SpecifyLocal" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="fs-1 mb-1" for="SpecifyOversea">Specify Country/Countries</label>
                                                <input type="text" name="a_overseas" id="SpecifyOverseas" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header"><i class="fas fa-id-card-alt"></i> III. Education Background</div>
                            <div class=card-body>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label><strong>Student Status</strong></label>
                                    </div>
                                <div class="form-row">
                                    <div class="col-md-8 pl-2">
                                        <label style="font-size: 16px;">Currently in School?</label>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educschoolcheck" id="ApplicantSchoolCheck" class="form-check-input" value="Yes">
                                                    <label for="ApplicantSchoolCheck">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educschoolcheck" id="ApplicantSchoolNoCheck" class="form-check-input" value="No">
                                                    <label for="ApplicantSchoolNoCheck">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                        <label><strong>Highest Education Background</strong></label>
                                        <div class="form-row">
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantNoEducCheck" class="form-check-input" value="No Formal Education">
                                                    <label for="ApplicantNoEducCheck">No Formal Education </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantElementaryLevelCheck" class="form-check-input" value="Elementary Level">
                                                    <label for="ApplicantElementaryLevelCheck">Elementary Level</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantElementaryGraduateCheck" class="form-check-input" value="Elementary Graduate">
                                                    <label for="ApplicantElementaryGraduateCheck">Elementary Graduate</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantHighSchoolLevelCheck" class="form-check-input" value="High School Level">
                                                    <label for="ApplicantHighSchoolLevelCheck">High School Level</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantHighSchoolGraduateCheck" class="form-check-input" value="High School Graduate">
                                                    <label for="ApplicantHighSchoolGraduateCheck">High School Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantCollegeLevelCheck" class="form-check-input" value="College Level">
                                                    <label for="ApplicantCollegeLevelCheck">College Level</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantCollegeGradauteCheck" class="form-check-input" value="College Graduate">
                                                    <label for="ApplicantCollegeGradauteCheck">College Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantVocationalGraduateCheck" class="form-check-input" value="Techinal/Vocational Graduate">
                                                    <label for="ApplicantVocationalGraduateCheck">Technical/Vocational Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantPostGraduateCheck" class="form-check-input" value="Post Graduate">
                                                    <label for="ApplicantPostGraduateCheck">Post Graduate</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label><strong>Year Last Attended</strong></label>
                                        <div class="form-row mt-2">
                                            <div class="col-md-9">
                                                <label class="fs-2   mb-1" for="EducSchool">School/University</label>
                                                <input type="text" name="a_educschool" id="EducSchool" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="fs-2 mb-1" for="EducSchoolYear">Year</label>
                                                <input type="text" name="a_educschoolyear" id="EducSchoolYear" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-md-9">
                                                <label class="fs-2 mb-1" for="EducCourse">Course/Program</label>
                                                <input type="text" name="a_educcourse" id="EducCourse" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="fs-2 mb-1" for="EducCourseYear">Year</label>
                                                <input type="text" name="a_educcourseyear" id="EducCourseYear" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-md-9">
                                                <label class="fs-2 mb-1" for="EducHonor">Awards/Honors Received</label>
                                                <input type="text" name="a_educhonor" id="EducHonor" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="fs-2 mb-1" for="EducHonorYear">Year</label>
                                                <input type="text" name="a_educhonoryear" id="EducHonorYear" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="d-flex justify-content-end mt-4">
                                <?php
                                    $query = "SELECT * FROM users WHERE id = '".$_SESSION["uid"]."'";
                                    if (!$result = $mysqli->query($query)) {
                                        exit($mysqli->error);
                                    }
                                
                                    while($row = $result->fetch_assoc()){;
                                
                                    $uid = $row['id'];
                                ?>
                                <input type="text" name="uid" value="<?php echo $uid?>">
                                <?php } ?>
                                <button type="submit" name="nextpage" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom DatePicker -->
<!-- <script src="../../js/customdatepicker.js"></script> -->

<script type="text/javascript">
    $(function () {
        $("input[name='a_work']").click(function () {

            if ($("#LocalCheck").is(":checked")) {
                $("#SpecifyLocal").removeAttr("disabled");
                $("#SpecifyLocal").focus();
            } else {
                $("#SpecifyLocal").attr("disabled", "disabled");
                $('#SpecifyLocal').val('');
            }

            if ($("#OverseasCheck").is(":checked")) {
                $("#SpecifyOverseas").removeAttr("disabled");
                $("#SpecifyOverseas").focus();
            } else {
                $("#SpecifyOverseas").attr("disabled", "disabled");
                $('#SpecifyOverseas').val('');
            }
        });

        $("input[name='a_4pcheck']").click(function () {

            if ($("#Applicant4PCheck").is(":checked")) {
                $("#Applicant4Pidno").removeAttr("disabled");
                $("#Applicant4Pidno").focus();
            } else {
                $("#Applicant4Pidno").attr("disabled", "disabled");
                $('#Applicant4Pidno').val('');
            }
        });

        $("input[name='a_applyworkcheck']").click(function () {

            if ($("#ApplicantNoApplyWork").is(":checked")) {
                $("#ApplicantApplyWorkReason").removeAttr("disabled");
                $("#ApplicantApplyWorkReason").focus();
            } else {
                $("#ApplicantApplyWorkReason").attr("disabled", "disabled");
                $('#ApplicantApplyWorkReason').val('');
            }
        });
        $("input[name='a_findworkcheck']").click(function () {

            if ($("#ApplicantFindWork").is(":checked")) {
                $("#ApplicantFindWorkReason").removeAttr("disabled");
                $("#ApplicantFindWorkReason").focus();
            } else {
                $("#ApplicantFindWorkReason").attr("disabled", "disabled");
                $('#ApplicantFindWorkReason').val('');
            }
        });

        $("input[name='a_unemploymentstatuscheck']").click(function () {

            if ($("#OverseasLaidoffCheck").is(":checked")) {
                $("#SpecifyLaidoffCountry").removeAttr("disabled");
                $("#SpecifyLaidoffCountry").focus();
            } else {
                $("#SpecifyLaidoffCountry").attr("disabled", "disabled");
                $('#SpecifyLaidoffCountry').val('');
            }
        });

        $("input[name='a_employmentcheck']").click(function () {

            if ($("#UnemployedCheck").is(":checked")) {
                $("#FreshGraduateCheck").removeAttr("disabled");
                $("#FinishedContractCheck").removeAttr("disabled");
                $("#ResignedCheck").removeAttr("disabled");
                $("#RetiredCheck").removeAttr("disabled");
                $("#LocalLaidoffCheck").removeAttr("disabled");
                $("#OverseasLaidoffCheck").removeAttr("disabled");
                $("#SpecifyLaidoffCountry").attr("disabled", "disabled");
            } else {
                $("#FreshGraduateCheck").attr("disabled", "disabled");
                $('#FreshGraduateCheck').prop('checked', false);
                $("#FinishedContractCheck").attr("disabled", "disabled");
                $('#FinishedContractCheck').prop('checked', false);
                $("#ResignedCheck").attr("disabled", "disabled");
                $('#ResignedCheck').prop('checked', false);
                $("#RetiredCheck").attr("disabled", "disabled");
                $('#RetiredCheck').prop('checked', false);
                $("#LocalLaidoffCheck").attr("disabled", "disabled");
                $('#LocalLaidoffCheck').prop('checked', false);
                $("#OverseasLaidoffCheck").attr("disabled", "disabled");
                $('#OverseasLaidoffCheck').prop('checked', false);
                $("#SpecifyLaidoffCountry").attr("disabled", "disabled");
                $('#SpecifyLaidoffCountry').val('');
            }

            if ($("#EmployedCheck").is(":checked")) {
                $("#FullTimeCheck").removeAttr("disabled");
                $("#PartTimeCheck").removeAttr("disabled");
                $("#PartTimeCheck").removeAttr("checked");
                $("#SelfEmployedCheck").removeAttr("disabled");
            } else {
                $("#FullTimeCheck").attr("disabled", "disabled");
                $('#FullTimeCheck').prop('checked', false);
                $("#PartTimeCheck").attr("disabled", "disabled");
                $('#PartTimeCheck').prop('checked', false);
                $("#SelfEmployedCheck").attr("disabled", "disabled");
                $('#SelfEmployedCheck').prop('checked', false);
            }
        });

        // $("input[name='a_unemploymentstatuscheck']").click(function () {

        //     if ($("#OverseasLaidoffCheck").is(":checked")) {
        //         $("#SpecifyLaidoffCountry").removeAttr("disabled");
        //         $("#SpecifyLaidoffCountry").focus();
        //     } else {
        //         $("#SpecifyLaidoffCountry").attr("disabled", "disabled");
        //         $('#SpecifyLaidoffCountry').val('');
        //     }
        // });
    });
</script>

</body>

</html>
<?php 
}
?>