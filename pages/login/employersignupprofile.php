
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

<style>
    .responsive{
        width: 100%;
        max-width: 450px;
        height: auto;
        
    }

    .bg-image{
        background-image: url('../../images/pesobg.png');
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
</style>

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
                        <form method="post" action="#" novalidate>
                        <div class="card mt-4">
                            <div class=card-body>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label><strong>Employer Information</strong></label>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-row mt-2">
                                            <div class="col-md-12">
                                                <label class="fs-2   mb-1" for="EducSchool">Company Name</label>
                                                <input type="text" name="a_educschool" id="EducSchool" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="fs-2 mb-1" for="EducSchoolYear">Company Description</label>
                                                <textarea name="" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div> 
                                        <div class="form-row mt-2">
                                            <div class="col-md-12">
                                                <label><strong>Address</strong></label>
                                            </div>
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
                                        <div class="form-row mt-2">
                                            <div class="col-md-9">
                                                <label class="fs-2 mb-1" for="EducCourse">Industry Type</label>
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