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
    if(isset($_GET['profileupdate'])){
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

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="chat.php">Chat Employer</a>
            </li>
            <li class="nav-item active">
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
                <a class="nav-link" href="manage-joblist.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Application Status</span>
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
            
                     <?php
					require 'UPLOAD/conn.php';
					$query = mysqli_query($conn, "SELECT *,COUNT(id) as TOTAL FROM `photo_upload` WHERE uid = '".$_SESSION['uid']."' LIMIT 1") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
				
			    <?php if($fetch['TOTAL'] == '1') { ?>
			    
			   
			    
			    
			    <div class="modal fade" id="edit<?php echo $fetch['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data" action="UPLOAD/edit.php">
				<div class="modal-header">
					<h3 class="modal-title">EDIT PHOTO</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-12">
						<div class="form-group">
							<h3>Current Photo</h3>
							<img src="UPLOAD/<?php echo $fetch['photo']?>" height="120" width="150" />
							<input type="hidden" name="previous" value="<?php echo $fetch['photo']?>"/>
							<h3>New Photo</h3>
							<input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>
							<input type="file" class="form-control" name="photo" value="<?php echo $fetch['photo']?>" required="required"/>
						</div>
					
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button class="btn btn-warning" name="edit"><span class="glyphicon glyphicon-save"></span> Update</button>
				</div>
			</form>
		</div>
	</div>
</div>		
                     
                     
			    
			    <?php } else { ?>
                     
                     
                     	 <button class="btn btn-success" type="button" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> ADD PROFILE</button>
                     

                     
                     
                     
                     
                <?php } ?>	
                <?php } ?>	
               
    <div class="modal fade" id="form_modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="UPLOAD/save.php" enctype="multipart/form-data">
				<div class="modal-header">
					<h3 class="modal-title">UPLOAD PHOTO</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Photo</label>
							<input type="file" class="form-control" name="photo" required="required" style="width:100%;">
						</div>
						
						
						<div class="form-group">
							<input type="hidden" class="form-control" name="id" value="<?php echo $_SESSION['uid']; ?>" required="required"/>
						</div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

           
  

            <div class="container-fluid">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
                
                
                          
                            
                    <?php
					require 'UPLOAD/conn.php';
					$query = mysqli_query($conn, "SELECT *,COUNT(id) as TOTAL FROM `photo_upload` WHERE uid = '".$_SESSION['uid']."'") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
				
			    <?php if($fetch['TOTAL'] == '1') { ?>
			    
			    <a href="#" data-toggle="modal" data-target="#edit<?php echo $fetch['id']?>"><img src="UPLOAD/<?php echo $fetch['photo']; ?>" style="width:10%;"></a>
			    
			    
			    <div class="modal fade" id="edit<?php echo $fetch['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data" action="UPLOAD/edit.php">
				<div class="modal-header">
					<h3 class="modal-title">EDIT PHOTO</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-12">
						<div class="form-group">
							<h3>Current Photo</h3>
							<img src="UPLOAD/<?php echo $fetch['photo']?>" height="120" width="150" />
							<input type="hidden" name="previous" value="<?php echo $fetch['photo']?>"/>
							<h3>New Photo</h3>
							<input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>
							<input type="file" class="form-control" name="photo" value="<?php echo $fetch['photo']?>" required="required"/>
						</div>
					
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button class="btn btn-warning" name="edit"><span class="glyphicon glyphicon-save"></span> Update</button>
				</div>
			</form>
		</div>
	</div>
</div>		
                     
                     
			    
			    <?php } else { ?>
                     
                     
                     
                     

                     
                     
                     
                     
                <?php } ?>	
                <?php } ?>	
               
    <div class="modal fade" id="form_modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="UPLOAD/save.php" enctype="multipart/form-data">
				<div class="modal-header">
					<h3 class="modal-title">UPLOAD PHOTO</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Photo</label>
							<input type="file" class="form-control" name="photo" required="required" style="width:100%;">
						</div>
						
						
						<div class="form-group">
							<input type="hidden" class="form-control" name="id" value="<?php echo $_SESSION['uid']; ?>" required="required"/>
						</div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>


                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-id-card-alt"></i> Profile</div>
                    <div class="card-body">
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
                                    
                    ?>
                    
                     <span class="switch">
                       <label>EDIT</label>
                        <input type="checkbox" class="switch" id="switch-id" checked>
                        <label for="switch-id"></label>
                      </span>
                 
                 
                  <div class="contentA">
                        <form method="post" action="../../php-func/applicant/FormApplicant2.php" novalidate>
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
                                            <input type="text" name="a_fname" id="UpdateFirstName" class="form-control" placeholder="Firstname" value="<?php echo $A_FName;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <label  class="fs-1 mb-1" for="UpdateFirstName">Lastname</label>
                                            <input type="text" name="a_lname" id="UpdateFirstName" class="form-control" placeholder="Lastname" value="<?php echo $A_LName;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <label class="fs-1 mb-1" for="UpdateFirstName">M.I.</label>
                                            <input type="text" name="a_mname" id="UpdateFirstName" class="form-control" placeholder="M.I." value="<?php echo $A_MName;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <label class="fs-1 mb-1" for="UpdateFirstName">Suffix</label>
                                            <input type="text" name="a_suffix" id="UpdateFirstName" class="form-control" placeholder="Suffix" value="<?php echo $A_Suffix;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="col-md-6">
                                            <label class="fs-1 mb-1" for="floatingSelect">Gender</label>
                                            <select class="custom-select" id="floatingSelect" name="a_gender">
                                                <option selected disabled value="<?php  echo $A_Gender;?>">
                                                    <?php if($A_Gender == ''){ echo' Choose';}else{ echo $A_Gender; }?>
                                                </option>
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
                                                    <option selected disabled value="<?php  echo $A_BMonth;?>">
                                                            <?php if($A_BMonth == ''){ echo' Month';}else{ echo $A_BMonth; }?>
                                                        </option>
                                                        <?php
                                                            for($month = 1; $month <= 12; $month++)
                                                            echo"<option value = '".$month."'>".$month."</option>";
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- <label for="">Day</label> -->
                                                <select name="a_bdate" id="day" class="form-control">
                                                <option selected disabled value="<?php  echo $A_BDate;?>"?>
                                                    <?php if($A_BDate == ''){ echo' Day';}else{ echo $A_BDate; }?>
                                                </option>
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
                                                    <option selected disabled value="<?php  echo $A_Year;?>">
                                                        <?php if($A_BYear == ''){ echo' Year';}else{ echo $A_BYear; }?>
                                                    </option>
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
                                            <input type="text" name="a_religion" id="UpdateFirstName" class="form-control" placeholder="Religion" value="<?php echo $A_Religion;?>">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label class="fs-1 mb-1" for="floatingSelect">Civil Status</label>
                                        <select class="custom-select" id="floatingSelect" name="a_civilstatus">
                                            <option selected disabled <?php if($A_CivilStatus == ''){ echo'';}else{ echo 'value="'.$A_FName.'"'; }?>>
                                                <?php if($A_CivilStatus == ''){ echo' Choose..';}else{ echo $A_CivilStatus; }?>
                                            </option>
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
                                        <input type="text" name="a_cbulidno" id="CurrentBuildNo" class="form-control" value="<?php echo $A_BuildNo;?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fs-1 mb-1" for="CurrentStreetName">Street Name</label>
                                        <input type="text" name="a_cstreetname" id="CurrentStreetName" class="form-control" value="<?php echo $A_StreetName;?>">
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-md-3">
                                        <label  class="fs-1 mb-1" for="CurrentCity">City/Municipality</label>
                                        <input type="txt" name="a_ccity" id="CurrentCity" class="form-control" value="<?php echo $A_City;?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <label  class="fs-1 mb-1" for="CurrentProvince">Province</label>
                                        <input type="text" name="a_cprovince" id="CurrentProvince" class="form-control" value="<?php echo $A_Province;?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label  class="fs-1 mb-1" for="CurrentZipCode">Zip Code</label>
                                        <input type="text" name="a_czipcode" id="CurrentZipCode" class="form-control" value="<?php echo $A_ZipCode;?>" >
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label><strong>Contact Number</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label  class="fs-1 mb-1" for="UpdateFirstName">Primary Number</label>
                                        <input type="text" name="a_contno1" id="UpdateFirstName" class="form-control" value="<?php echo $A_Cont1;?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label  class="fs-1 mb-1" for="UpdateFirstName">Secondary Number</label>
                                        <input type="text" name="a_contno2" id="UpdateFirstName" class="form-control" value="<?php echo $A_Cont2;?>" >
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label class="mt-2"><strong>Employment Status</strong></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentcheck" id="EmployedCheck" class="form-check-input" value="Employed" <?php if($A_EmployementStatus1 == 'Employed'){echo 'checked';}?>>
                                            <label for="EmployedCheck">Employed</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentcheck" id="UnemployedCheck" class="form-check-input" value="Unemployed"<?php if($A_EmployementStatus1 == 'Unemployed'){echo 'checked';}?>>
                                            <label for="UnemployedCheck">Unemployed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 ps-5">
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentstatuscheck" id="FullTimeCheck" class="form-check-input" value="Full Time Employed"<?php if($A_EmployementStatus2 == 'Full Time Employed'){echo 'checked';}?>>
                                            <label for="FullTimeCheck">Full-Time Employed</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentstatuscheck" id="PartTimeCheck" class="form-check-input" value="Part Time Employed"<?php if($A_EmployementStatus2 == 'Part Time Employed'){echo 'checked';}?>>
                                            <label for="PartTimeCheck">Part-Time Employed</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentstatuscheck" id="SelfEmployedCheck" class="form-check-input" value="Self-Employed"<?php if($A_EmployementStatus2 == 'Self-Employed'){echo 'checked';}?>>
                                            <label for="SelfEmployedCheck">Self-Employed</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-5">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="FreshGraduateCheck" class="form-check-input" value="Fresh Graduate"<?php if($A_EmployementStatus2 == 'Fresh Graduate'){echo 'checked';}?>>
                                                    <label for="FreshGraduateCheck">Fresh Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="FinishedContractCheck" class="form-check-input" value="Finished Contract"<?php if($A_EmployementStatus2 == 'Finished Contract'){echo 'checked';}?>>
                                                    <label for="FinishedContractCheck">Finished Contract</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="ResignedCheck" class="form-check-input" value="Resigned"<?php if($A_EmployementStatus2 == 'Resigned'){echo 'checked';}?>>
                                                    <label for="UnemployedCheck">Resigned</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="RetiredCheck" class="form-check-input" value="Retired"<?php if($A_EmployementStatus2 == 'Retired'){echo 'checked';}?>>
                                                    <label for="RetiredCheck">Retired</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="LocalLaidoffCheck" class="form-check-input" value="Laidoff-Local"<?php if($A_EmployementStatus2 == 'Laidoff-Local'){echo 'checked';}?>>
                                                    <label for="LocalLaidoffCheck">Terminated/Laidoff(Local)</label>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-check">
                                                            <input type="radio" name="a_unemploymentstatuscheck" id="OverseasLaidoffCheck" class="form-check-input" value="Laidoff-Overseas"<?php if($A_EmployementStatus2 == 'Self-Employed'){echo 'checked';}?>>
                                                            <label for="OverseasLaidoffCheck">Terminated/Laidoff(Abroad)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="fs-1 mb-1" for="SpecifyLaidoffCountry">Specify Country</label>
                                                        <input type="text" name="a_laidoffcountry" id="SpecifyLaidoffCountry" class="form-control" value="<?php echo $A_LaidOffCountry;?>">
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
                                                    <input type="radio" name="a_findworkcheck" id="ApplicantFindWork" class="form-check-input" value="Yes"<?php if($A_WorkStatus == 'Yes'){echo 'checked';}?>>
                                                    <label for="ApplicantFindWork">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="radio" name="a_findworkcheck" id="ApplicantNoFindWork" class="form-check-input" value="No"<?php if($A_WorkStatus == 'No'){echo 'checked';}?>>
                                                    <label for="ApplicantNoFindWork">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="a_findworkreason" id="ApplicantFindWorkReason" class="form-control" value="<?php echo $A_WorkReason; ?>">
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
                                                    <input type="radio" name="a_applyworkcheck" id="ApplicantApplyWork" class="form-check-input" value="Yes" <?php if($A_ApplyWorkStatus == 'Yes'){echo 'checked';}?>>
                                                    <label for="ApplicantApplyWork">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_applyworkcheck" id="ApplicantNoApplyWork" class="form-check-input" value="No" <?php if($A_ApplyWorkStatus == 'No'){echo 'checked';}?>>
                                                    <label for="ApplicantNoApplyWork">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="a_applyworkreason" id="ApplicantApplyWorkReason" class="form-control" value="<?php echo $A_ApplyWork; ?>">
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
                                                    <input type="radio" name="a_4pcheck" id="Applicant4PCheck" class="form-check-input" value="Yes" <?php if($A_4pStatus == 'Yes'){echo 'checked';}?>>
                                                    <label for="Applicant4PCheck">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_4pcheck" id="Applicant4PNoCheck" class="form-check-input" value="No" <?php if($A_4pStatus == 'No'){echo 'checked';}?>>
                                                    <label for="Applicant4PNoCheck">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="a_4pidno" id="Applicant4Pidno" class="form-control" value="<?php echo $A_4pNo; ?>">
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
                                        <input type="text" name="a_occupation" id="ApplicantOccupation" class="form-control" value="<?php echo $A_JobPreference1; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fs-1 mb-1" for="ApplicantIndustry">Industry(e.g., IT, Manufacturing, Accounting etc.)</label>
                                        <input type="text" name="a_industry" id="ApplicantIndustry" class="form-control" value="<?php echo $A_JobPreference2; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                <label><strong>Preferred Work Location</strong></label>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_work" id="ApplicantLocalCheck" class="form-check-input" value="Local" <?php if($A_WorkLocationStatus == 'Local'){echo 'checked';}?>>
                                                    <label class="form-check-label" for="ApplicantLocalCheck">Local</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_work" id="ApplicantOverseasCheck" class="form-check-input" value="Overseas" <?php if($A_WorkLocationStatus == 'Overseas'){echo 'checked';}?>>
                                                    <label class="form-check-label" for="ApplicantOverseasCheck">Overseas</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label class="fs-1 mb-1" for="SpecifyLocal">Specify Cities/Muncipalities</label>
                                                <input type="text" name="a_local" id="SpecifyLocal" class="form-control" value="<?php echo $A_WorkLocationLocal; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="fs-1 mb-1" for="SpecifyOversea">Specify Country/Countries</label>
                                                <input type="text" name="a_overseas" id="SpecifyOverseas" class="form-control" value="<?php echo $A_WorkLocationOverseas; ?>">
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
                                                    <input type="radio" name="a_educschoolcheck" id="ApplicantSchoolCheck" class="form-check-input" value="Yes" <?php if($A_EducationStatus == 'Yes'){echo 'checked';}?>>
                                                    <label for="ApplicantSchoolCheck">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educschoolcheck" id="ApplicantSchoolNoCheck" class="form-check-input" value="No" <?php if($A_EducationStatus == 'No'){echo 'checked';}?>>
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
                                                    <input type="radio" name="a_educcheck" id="ApplicantNoEducCheck" class="form-check-input" value="No Formal Education" <?php if($A_HighestEducationStatus == 'No Formal Education'){echo 'checked';}?>>
                                                    <label for="ApplicantNoEducCheck">No Formal Education </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantElementaryLevelCheck" class="form-check-input" value="Elementary Level" <?php if($A_HighestEducationStatus == 'Elementary Level'){echo 'checked';}?>>
                                                    <label for="ApplicantElementaryLevelCheck">Elementary Level</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantElementaryGraduateCheck" class="form-check-input" value="Elementary Graduate" <?php if($A_HighestEducationStatus == 'Elementary Graduate'){echo 'checked';}?>>
                                                    <label for="ApplicantElementaryGraduateCheck">Elementary Graduate</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantHighSchoolLevelCheck" class="form-check-input" value="High School Level" <?php if($A_HighestEducationStatus == 'High School Level'){echo 'checked';}?>>
                                                    <label for="ApplicantHighSchoolLevelCheck">High School Level</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantHighSchoolGraduateCheck" class="form-check-input" value="High School Graduate" <?php if($A_HighestEducationStatus == 'High School Graduate'){echo 'checked';}?>>
                                                    <label for="ApplicantHighSchoolGraduateCheck">High School Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantCollegeLevelCheck" class="form-check-input" value="College Level" <?php if($A_HighestEducationStatus == 'College Level'){echo 'checked';}?>>
                                                    <label for="ApplicantCollegeLevelCheck">College Level</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantCollegeGradauteCheck" class="form-check-input" value="College Graduate" <?php if($A_HighestEducationStatus == 'College Graduate'){echo 'checked';}?>>
                                                    <label for="ApplicantCollegeGradauteCheck">College Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantVocationalGraduateCheck" class="form-check-input" value="Techinal/Vocational Graduate" <?php if($A_HighestEducationStatus == 'Techinal/Vocational Graduate'){echo 'checked';}?>>
                                                    <label for="ApplicantVocationalGraduateCheck">Technical/Vocational Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantPostGraduateCheck" class="form-check-input" value="Post Graduate" <?php if($A_HighestEducationStatus == 'Post Graduate'){echo 'checked';}?>>
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
                                                <input type="text" name="a_educschool" id="EducSchool" class="form-control" value="<?php echo $A_SchoolName; ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="fs-2 mb-1" for="EducSchoolYear">Year</label>
                                                <input type="text" name="a_educschoolyear" id="EducSchoolYear" class="form-control" value="<?php echo $A_SchoolYear; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-md-9">
                                                <label class="fs-2 mb-1" for="EducCourse">Course/Program</label>
                                                <input type="text" name="a_educcourse" id="EducCourse" class="form-control" value="<?php echo $A_CourseName ; ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="fs-2 mb-1" for="EducCourseYear">Year</label>
                                                <input type="text" name="a_educcourseyear" id="EducCourseYear" class="form-control" value="<?php echo $A_CourseYear; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-md-9">
                                                <label class="fs-2 mb-1" for="EducHonor">Awards/Honors Received</label>
                                                <input type="text" name="a_educhonor" id="EducHonor" class="form-control" value="<?php echo $A_AwardName; ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="fs-2 mb-1" for="EducHonorYear">Year</label>
                                                <input type="text" name="a_educhonoryear" id="EducHonorYear" class="form-control" value="<?php echo $A_AwardYear; ?>">
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
                                <input type="hidden" name="uid" value="<?php echo $uid;?>">
                                <?php } ?>
                                
                              
                                <div style='display:none;' id='business'>
                                
                                    <button type="submit" name="nextpage" class="btn btn-primary">Save</button>
                                </div>
                                
                               
                            </div>
                        </form>
                         </div>
                         
                           <div class="contentB">
 <form method="post" action="../../php-func/applicant/FormApplicant2.php" novalidate>
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
                                            <input type="text" name="a_fname" id="UpdateFirstName" class="form-control" placeholder="Firstname" value="<?php echo $A_FName;?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <label  class="fs-1 mb-1" for="UpdateFirstName">Lastname</label>
                                            <input type="text" name="a_lname" id="UpdateFirstName" class="form-control" placeholder="Lastname" value="<?php echo $A_LName;?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <label class="fs-1 mb-1" for="UpdateFirstName">M.I.</label>
                                            <input type="text" name="a_mname" id="UpdateFirstName" class="form-control" placeholder="M.I." value="<?php echo $A_MName;?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <label class="fs-1 mb-1" for="UpdateFirstName">Suffix</label>
                                            <input type="text" name="a_suffix" id="UpdateFirstName" class="form-control" placeholder="Suffix" value="<?php echo $A_Suffix;?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="col-md-6">
                                            <label class="fs-1 mb-1" for="floatingSelect">Gender</label>
                                            <select class="custom-select" id="floatingSelect" name="a_gender">
                                                <option selected disabled value="<?php  echo $A_Gender;?>">
                                                    <?php if($A_Gender == ''){ echo' Choose';}else{ echo $A_Gender; }?>
                                                </option>
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
                                                    <option selected disabled value="<?php  echo $A_BMonth;?>">
                                                            <?php if($A_BMonth == ''){ echo' Month';}else{ echo $A_BMonth; }?>
                                                        </option>
                                                        <?php
                                                            for($month = 1; $month <= 12; $month++)
                                                            echo"<option value = '".$month."'>".$month."</option>";
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- <label for="">Day</label> -->
                                                <select name="a_bdate" id="day" class="form-control">
                                                <option selected disabled value="<?php  echo $A_BDate;?>"?>
                                                    <?php if($A_BDate == ''){ echo' Day';}else{ echo $A_BDate; }?>
                                                </option>
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
                                                    <option selected disabled value="<?php  echo $A_Year;?>">
                                                        <?php if($A_BYear == ''){ echo' Year';}else{ echo $A_BYear; }?>
                                                    </option>
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
                                            <input type="text" name="a_religion" id="UpdateFirstName" class="form-control" placeholder="Religion" value="<?php echo $A_Religion;?>" readonly="">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label class="fs-1 mb-1" for="floatingSelect">Civil Status</label>
                                        <select class="custom-select" id="floatingSelect" name="a_civilstatus">
                                            <option selected disabled <?php if($A_CivilStatus == ''){ echo'';}else{ echo 'value="'.$A_FName.'"'; }?>>
                                                <?php if($A_CivilStatus == ''){ echo' Choose..';}else{ echo $A_CivilStatus; }?>
                                            </option>
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
                                        <input type="text" name="a_cbulidno" id="CurrentBuildNo" class="form-control" value="<?php echo $A_BuildNo;?>" readonly="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fs-1 mb-1" for="CurrentStreetName">Street Name</label>
                                        <input type="text" name="a_cstreetname" id="CurrentStreetName" class="form-control" value="<?php echo $A_StreetName;?>" readonly="">
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-md-3">
                                        <label  class="fs-1 mb-1" for="CurrentCity">City/Municipality</label>
                                        <input type="txt" name="a_ccity" id="CurrentCity" class="form-control" value="<?php echo $A_City;?>" readonly="">
                                    </div>
                                    <div class="col-md-6">
                                        <label  class="fs-1 mb-1" for="CurrentProvince">Province</label>
                                        <input type="text" name="a_cprovince" id="CurrentProvince" class="form-control" value="<?php echo $A_Province;?>" readonly="">
                                    </div>
                                    <div class="col-md-3">
                                        <label  class="fs-1 mb-1" for="CurrentZipCode">Zip Code</label>
                                        <input type="text" name="a_czipcode" id="CurrentZipCode" class="form-control" value="<?php echo $A_ZipCode;?>" readonly="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label><strong>Contact Number</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label  class="fs-1 mb-1" for="UpdateFirstName">Primary Number</label>
                                        <input type="text" name="a_contno1" id="UpdateFirstName" class="form-control" value="<?php echo $A_Cont1;?>" readonly="">
                                    </div>
                                    <div class="col-md-6">
                                        <label  class="fs-1 mb-1" for="UpdateFirstName">Secondary Number</label>
                                        <input type="text" name="a_contno2" id="UpdateFirstName" class="form-control" value="<?php echo $A_Cont2;?>" readonly="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label class="mt-2"><strong>Employment Status</strong></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentcheck" id="EmployedCheck" class="form-check-input" value="Employed" <?php if($A_EmployementStatus1 == 'Employed'){echo 'checked';}?> readonly="">
                                            <label for="EmployedCheck">Employed</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentcheck" id="UnemployedCheck" class="form-check-input" value="Unemployed"<?php if($A_EmployementStatus1 == 'Unemployed'){echo 'checked';}?> readonly="">
                                            <label for="UnemployedCheck">Unemployed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 ps-5">
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentstatuscheck" id="FullTimeCheck" class="form-check-input" value="Full Time Employed"<?php if($A_EmployementStatus2 == 'Full Time Employed'){echo 'checked';}?>>
                                            <label for="FullTimeCheck">Full-Time Employed</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentstatuscheck" id="PartTimeCheck" class="form-check-input" value="Part Time Employed"<?php if($A_EmployementStatus2 == 'Part Time Employed'){echo 'checked';}?>>
                                            <label for="PartTimeCheck">Part-Time Employed</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="a_employmentstatuscheck" id="SelfEmployedCheck" class="form-check-input" value="Self-Employed"<?php if($A_EmployementStatus2 == 'Self-Employed'){echo 'checked';}?>>
                                            <label for="SelfEmployedCheck">Self-Employed</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-5">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="FreshGraduateCheck" class="form-check-input" value="Fresh Graduate"<?php if($A_EmployementStatus2 == 'Fresh Graduate'){echo 'checked';}?>>
                                                    <label for="FreshGraduateCheck">Fresh Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="FinishedContractCheck" class="form-check-input" value="Finished Contract"<?php if($A_EmployementStatus2 == 'Finished Contract'){echo 'checked';}?>>
                                                    <label for="FinishedContractCheck">Finished Contract</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="ResignedCheck" class="form-check-input" value="Resigned"<?php if($A_EmployementStatus2 == 'Resigned'){echo 'checked';}?>>
                                                    <label for="UnemployedCheck">Resigned</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="RetiredCheck" class="form-check-input" value="Retired"<?php if($A_EmployementStatus2 == 'Retired'){echo 'checked';}?>>
                                                    <label for="RetiredCheck">Retired</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_unemploymentstatuscheck" id="LocalLaidoffCheck" class="form-check-input" value="Laidoff-Local"<?php if($A_EmployementStatus2 == 'Laidoff-Local'){echo 'checked';}?>>
                                                    <label for="LocalLaidoffCheck">Terminated/Laidoff(Local)</label>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-check">
                                                            <input type="radio" name="a_unemploymentstatuscheck" id="OverseasLaidoffCheck" class="form-check-input" value="Laidoff-Overseas"<?php if($A_EmployementStatus2 == 'Self-Employed'){echo 'checked';}?>>
                                                            <label for="OverseasLaidoffCheck">Terminated/Laidoff(Abroad)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="fs-1 mb-1" for="SpecifyLaidoffCountry">Specify Country</label>
                                                        <input type="text" name="a_laidoffcountry" id="SpecifyLaidoffCountry" class="form-control" value="<?php echo $A_LaidOffCountry;?>">
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
                                                    <input type="radio" name="a_findworkcheck" id="ApplicantFindWork" class="form-check-input" value="Yes"<?php if($A_WorkStatus == 'Yes'){echo 'checked';}?> readonly="">
                                                    <label for="ApplicantFindWork">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="radio" name="a_findworkcheck" id="ApplicantNoFindWork" class="form-check-input" value="No"<?php if($A_WorkStatus == 'No'){echo 'checked';}?> readonly="">
                                                    <label for="ApplicantNoFindWork">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="a_findworkreason" id="ApplicantFindWorkReason" class="form-control" value="<?php echo $A_WorkReason; ?>">
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
                                                    <input type="radio" name="a_applyworkcheck" id="ApplicantApplyWork" class="form-check-input" value="Yes" <?php if($A_ApplyWorkStatus == 'Yes'){echo 'checked';}?>>
                                                    <label for="ApplicantApplyWork">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_applyworkcheck" id="ApplicantNoApplyWork" class="form-check-input" value="No" <?php if($A_ApplyWorkStatus == 'No'){echo 'checked';}?>>
                                                    <label for="ApplicantNoApplyWork">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="a_applyworkreason" id="ApplicantApplyWorkReason" class="form-control" value="<?php echo $A_ApplyWork; ?>">
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
                                                    <input type="radio" name="a_4pcheck" id="Applicant4PCheck" class="form-check-input" value="Yes" <?php if($A_4pStatus == 'Yes'){echo 'checked';}?>>
                                                    <label for="Applicant4PCheck">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_4pcheck" id="Applicant4PNoCheck" class="form-check-input" value="No" <?php if($A_4pStatus == 'No'){echo 'checked';}?>>
                                                    <label for="Applicant4PNoCheck">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="a_4pidno" id="Applicant4Pidno" class="form-control" value="<?php echo $A_4pNo; ?>">
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
                                        <input type="text" name="a_occupation" id="ApplicantOccupation" class="form-control" value="<?php echo $A_JobPreference1; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fs-1 mb-1" for="ApplicantIndustry">Industry(e.g., IT, Manufacturing, Accounting etc.)</label>
                                        <input type="text" name="a_industry" id="ApplicantIndustry" class="form-control" value="<?php echo $A_JobPreference2; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                <label><strong>Preferred Work Location</strong></label>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_work" id="ApplicantLocalCheck" class="form-check-input" value="Local" <?php if($A_WorkLocationStatus == 'Local'){echo 'checked';}?>>
                                                    <label class="form-check-label" for="ApplicantLocalCheck">Local</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_work" id="ApplicantOverseasCheck" class="form-check-input" value="Overseas" <?php if($A_WorkLocationStatus == 'Overseas'){echo 'checked';}?>>
                                                    <label class="form-check-label" for="ApplicantOverseasCheck">Overseas</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label class="fs-1 mb-1" for="SpecifyLocal">Specify Cities/Muncipalities</label>
                                                <input type="text" name="a_local" id="SpecifyLocal" class="form-control" value="<?php echo $A_WorkLocationLocal; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="fs-1 mb-1" for="SpecifyOversea">Specify Country/Countries</label>
                                                <input type="text" name="a_overseas" id="SpecifyOverseas" class="form-control" value="<?php echo $A_WorkLocationOverseas; ?>">
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
                                                    <input type="radio" name="a_educschoolcheck" id="ApplicantSchoolCheck" class="form-check-input" value="Yes" <?php if($A_EducationStatus == 'Yes'){echo 'checked';}?>>
                                                    <label for="ApplicantSchoolCheck">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educschoolcheck" id="ApplicantSchoolNoCheck" class="form-check-input" value="No" <?php if($A_EducationStatus == 'No'){echo 'checked';}?>>
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
                                                    <input type="radio" name="a_educcheck" id="ApplicantNoEducCheck" class="form-check-input" value="No Formal Education" <?php if($A_HighestEducationStatus == 'No Formal Education'){echo 'checked';}?>>
                                                    <label for="ApplicantNoEducCheck">No Formal Education </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantElementaryLevelCheck" class="form-check-input" value="Elementary Level" <?php if($A_HighestEducationStatus == 'Elementary Level'){echo 'checked';}?>>
                                                    <label for="ApplicantElementaryLevelCheck">Elementary Level</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantElementaryGraduateCheck" class="form-check-input" value="Elementary Graduate" <?php if($A_HighestEducationStatus == 'Elementary Graduate'){echo 'checked';}?>>
                                                    <label for="ApplicantElementaryGraduateCheck">Elementary Graduate</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantHighSchoolLevelCheck" class="form-check-input" value="High School Level" <?php if($A_HighestEducationStatus == 'High School Level'){echo 'checked';}?>>
                                                    <label for="ApplicantHighSchoolLevelCheck">High School Level</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantHighSchoolGraduateCheck" class="form-check-input" value="High School Graduate" <?php if($A_HighestEducationStatus == 'High School Graduate'){echo 'checked';}?>>
                                                    <label for="ApplicantHighSchoolGraduateCheck">High School Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantCollegeLevelCheck" class="form-check-input" value="College Level" <?php if($A_HighestEducationStatus == 'College Level'){echo 'checked';}?>>
                                                    <label for="ApplicantCollegeLevelCheck">College Level</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantCollegeGradauteCheck" class="form-check-input" value="College Graduate" <?php if($A_HighestEducationStatus == 'College Graduate'){echo 'checked';}?>>
                                                    <label for="ApplicantCollegeGradauteCheck">College Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantVocationalGraduateCheck" class="form-check-input" value="Techinal/Vocational Graduate" <?php if($A_HighestEducationStatus == 'Techinal/Vocational Graduate'){echo 'checked';}?>>
                                                    <label for="ApplicantVocationalGraduateCheck">Technical/Vocational Graduate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="a_educcheck" id="ApplicantPostGraduateCheck" class="form-check-input" value="Post Graduate" <?php if($A_HighestEducationStatus == 'Post Graduate'){echo 'checked';}?>>
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
                                                <input type="text" name="a_educschool" id="EducSchool" class="form-control" value="<?php echo $A_SchoolName; ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="fs-2 mb-1" for="EducSchoolYear">Year</label>
                                                <input type="text" name="a_educschoolyear" id="EducSchoolYear" class="form-control" value="<?php echo $A_SchoolYear; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-md-9">
                                                <label class="fs-2 mb-1" for="EducCourse">Course/Program</label>
                                                <input type="text" name="a_educcourse" id="EducCourse" class="form-control" value="<?php echo $A_CourseName ; ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="fs-2 mb-1" for="EducCourseYear">Year</label>
                                                <input type="text" name="a_educcourseyear" id="EducCourseYear" class="form-control" value="<?php echo $A_CourseYear; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-md-9">
                                                <label class="fs-2 mb-1" for="EducHonor">Awards/Honors Received</label>
                                                <input type="text" name="a_educhonor" id="EducHonor" class="form-control" value="<?php echo $A_AwardName; ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="fs-2 mb-1" for="EducHonorYear">Year</label>
                                                <input type="text" name="a_educhonoryear" id="EducHonorYear" class="form-control" value="<?php echo $A_AwardYear; ?>">
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
                                <input type="hidden" name="uid" value="<?php echo $uid;?>">
                                <?php } ?>
                                
                              
                                <div style='display:none;' id='business'>
                                
                                   
                                </div>
                                
                               
                            </div>
                        </form>


                         </div>
                         
                         
                         
                        <?php
                            }
                        ?>
                    </div>
                    <div class="card-footer"></div>
                </div>

                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-file-upload"></i> Upload CV/Resume</div>
                    <div class="card-body">
                        <form action="../../php-func/file_function/UpdateCV.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    Upload CV/Resume
                                </div>
                                <div class="col-12">
                                    <?php
                                        $aid = $_SESSION['uid'];
                                        $checkid1 = $mysqli->query("SELECT * FROM applicant_file WHERE aid = '$aid' ORDER BY id DESC");

                                        $row = $checkid1->fetch_array();
                                        if($checkid1->num_rows != 0){
                                    ?>
                                        <div class="col-12">
                                            Current CV/Resume
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="text" class="form-control" value="<?php echo $row['file_name']?>" readonly >
                                            </div>
                                            <div class="col-4"><a href="../../upload/<?php echo $row['file_name']; ?>" target="_blank" class="btn btn-primary btn-block">
                                            <i class="fas fa-file-upload"></i> View File
                                        </a></div>
                                        </div>
                                        <hr>
                                        <div class="col-12">
                                            Update CV/Resume
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input" id="inputGroupFile04">
                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                        </div>
                                        <p style="font-size: 12px; color:red;">*Upload PDF File Only</p>
                                        
                                        <input type="hidden" name="fid" value="<?php echo $row['id'];?>">   
                                    <?php
                                        }else{
                                    ?>
                                    
                                    
                                    
                                     
                                     
                                        
                                     
                                    
                                    
                                        <div class="custom-file">
                                            
                                             <input type="text" class="form-control" name="cv_name" readonly >
                                            <label class="custom-file-label" for="inputGroupFile04">CV NAME</label>
                                            <input type="file" name="file" class="custom-file-input" id="inputGroupFile04"  accept="application/pdf">
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
                                <button type="submit" class="btn btn-primary btn-block">UPLOAD</button>
                            </div>
                        </form>
                    </div>
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
    <script type="text/javascript" src="../../js/coordinator/coordinator.js"></script>

    <!--Custom Assets for Confirmation-->
    <script src="../../custom-assets/sweetalert/sweetalert-dev.js"></script>
    <script src="../../custom-assets/sweetalert/sweetalert.min.js"></script>

    <!-- Custom File Input -->
    <script src="js/jquery-3.5.1.min.js"></script>
    
    <!-- Custom Javascript for DataTables-->
    <script>
        $(document).ready(function() {
            $('table.display').DataTable();
        });
    </script>

    <script type="text/javascript">
           $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
    </script>

    <script type="text/javascript">
    $(function () {
        // $("input[name='a_work']").click(function () {

        //     if ($("#LocalCheck").is(":checked")) {
        //         $("#SpecifyLocal").removeAttr("disabled");
        //         $("#SpecifyLocal").focus();
        //     } else {
        //         $("#SpecifyLocal").attr("disabled", "disabled");
        //         $('#SpecifyLocal').val('');
        //     }

        //     if ($("#OverseasCheck").is(":checked")) {
        //         $("#SpecifyOverseas").removeAttr("disabled");
        //         $("#SpecifyOverseas").focus();
        //     } else {
        //         $("#SpecifyOverseas").attr("disabled", "disabled");
        //         $('#SpecifyOverseas').val('');
        //     }
        // });

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
    
    
    $(document).ready(function(){
    $('#purpose').on('change', function() {
      if ( this.value == '1')
      {
        $("#business").show();
      }
      else
      {
        $("#business").hide();
      }
    });
});
    
</script>


 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="./script.js"></script>



<style>
    
.switch {
  font-size: 1rem;
  position: relative;
}
.switch input {
  position: absolute;
  height: 1px;
  width: 1px;
  background: none;
  border: 0;
  clip: rect(0 0 0 0);
  clip-path: inset(50%);
  overflow: hidden;
  padding: 0;
}
.switch input + label {
  position: relative;
  min-width: calc(calc(2.375rem * .8) * 2);
  border-radius: calc(2.375rem * .8);
  height: calc(2.375rem * .8);
  line-height: calc(2.375rem * .8);
  display: inline-block;
  cursor: pointer;
  outline: none;
  user-select: none;
  vertical-align: middle;
  text-indent: calc(calc(calc(2.375rem * .8) * 2) + .5rem);
}
.switch input + label::before,
.switch input + label::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: calc(calc(2.375rem * .8) * 2);
  bottom: 0;
  display: block;
}
.switch input + label::before {
  right: 0;
  background-color: #dee2e6;
  border-radius: calc(2.375rem * .8);
  transition: 0.2s all;
}
.switch input + label::after {
  top: 2px;
  left: 2px;
  width: calc(calc(2.375rem * .8) - calc(2px * 2));
  height: calc(calc(2.375rem * .8) - calc(2px * 2));
  border-radius: 50%;
  background-color: white;
  transition: 0.2s all;
}
.switch input:checked + label::before {
  background-color: #08d;
}
.switch input:checked + label::after {
  margin-left: calc(2.375rem * .8);
}
.switch input:focus + label::before {
  outline: none;
  box-shadow: 0 0 0 0.2rem rgba(0, 136, 221, 0.25);
}
.switch input:disabled + label {
  color: #868e96;
  cursor: not-allowed;
}
.switch input:disabled + label::before {
  background-color: #e9ecef;
}
.switch.switch-sm {
  font-size: 0.875rem;
}
.switch.switch-sm input + label {
  min-width: calc(calc(1.9375rem * .8) * 2);
  height: calc(1.9375rem * .8);
  line-height: calc(1.9375rem * .8);
  text-indent: calc(calc(calc(1.9375rem * .8) * 2) + .5rem);
}
.switch.switch-sm input + label::before {
  width: calc(calc(1.9375rem * .8) * 2);
}
.switch.switch-sm input + label::after {
  width: calc(calc(1.9375rem * .8) - calc(2px * 2));
  height: calc(calc(1.9375rem * .8) - calc(2px * 2));
}
.switch.switch-sm input:checked + label::after {
  margin-left: calc(1.9375rem * .8);
}
.switch.switch-lg {
  font-size: 1.25rem;
}
.switch.switch-lg input + label {
  min-width: calc(calc(3rem * .8) * 2);
  height: calc(3rem * .8);
  line-height: calc(3rem * .8);
  text-indent: calc(calc(calc(3rem * .8) * 2) + .5rem);
}
.switch.switch-lg input + label::before {
  width: calc(calc(3rem * .8) * 2);
}
.switch.switch-lg input + label::after {
  width: calc(calc(3rem * .8) - calc(2px * 2));
  height: calc(calc(3rem * .8) - calc(2px * 2));
}
.switch.switch-lg input:checked + label::after {
  margin-left: calc(3rem * .8);
}
.switch + .switch {
  margin-left: 1rem;
}



.contentA {
  display: none;
}    
    
    
    
</style>




</body>

</html>
<?php
} else {
    header('Location: ../login/applicantlogin.php');
    $url = "../login/applicantlogin.php";
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
?>