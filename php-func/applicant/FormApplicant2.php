<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    if(isset($_POST)){
    session_start();
    include("../conn.php");
    
    $A_Id = $mysqli->real_escape_string($_POST['uid']);
    $A_FName = $mysqli->real_escape_string($_POST['a_fname']);
    $A_LName = $mysqli->real_escape_string($_POST['a_lname']);
    $A_MName = $mysqli->real_escape_string($_POST['a_mname']);
    $A_Suffix = $mysqli->real_escape_string($_POST['a_suffix']);

    $A_Gender = $_POST['a_gender'];

    $A_BMonth = $_POST['a_bmonth'];
    $A_BDay = $_POST['a_bdate'];
    $A_BYear = $_POST['a_byear'];
    $A_Birthday = "$A_BMonth/$A_BDay/$A_BYear";

    $A_Religion = $mysqli->real_escape_string($_POST['a_religion']);
    $A_CivilStatus = $_POST['a_civilstatus'];

    $A_BuildNo = $mysqli->real_escape_string($_POST['a_cbulidno']);
    $A_StreetName = $mysqli->real_escape_string($_POST['a_cstreetname']);
    $A_City = $mysqli->real_escape_string($_POST['a_ccity']);
    $A_Province = $mysqli->real_escape_string($_POST['a_cprovince']);
    $A_ZipCode = $mysqli->real_escape_string($_POST['a_czipcode']);

    $A_PrimaryNumber = $mysqli->real_escape_string($_POST['a_contno1']);
    $A_SecondaryNumber = $mysqli->real_escape_string($_POST['a_contno2']);

    $A_EmployementStatus1 = $_POST['a_employmentcheck'];
    $A_EmployementStatus2 = $_POST['a_employmentstatuscheck'];
    $A_EmployementStatus2 = $_POST['a_unemploymentstatuscheck'];
    $A_LaidOffCountry = $mysqli->real_escape_string($_POST['a_laidoffcountry']);

    $A_WorkStatus = $_POST['a_findworkcheck'];
    $A_WorkReason= $mysqli->real_escape_string($_POST['a_findworkreason']);

    $A_ApplyWorkStatus = $_POST['a_applyworkcheck'];
    $A_ApplyWork = $mysqli->real_escape_string($_POST['a_applyworkreason']);

    $A_4pStatus = $_POST['a_4pcheck'];
    $A_4pNo = $_POST['a_4pidno'];

    $A_JobPreference1 = $_POST['a_occupation'];
    $A_JobPreference2 = $_POST['a_industry'];
    $A_WorkLocationStatus = $_POST['a_work'];
    $A_WorkLocation1 =  $mysqli->real_escape_string($_POST['a_local']);
    $A_WorkLocation2 =  $mysqli->real_escape_string($_POST['a_overseas']);

    $A_EducationStatus = $_POST['a_educschoolcheck'];
    $A_HighestEducationStatus = $_POST['a_educcheck'];
    $A_SchoolName =  $mysqli->real_escape_string($_POST['a_educschool']);
    $A_SchoolYear =  $mysqli->real_escape_string($_POST['a_educschoolyear']);
    $A_CourseName =  $mysqli->real_escape_string($_POST['a_educcourse']);
    $A_CourseYear =  $mysqli->real_escape_string($_POST['a_educcourseyear']);
    $A_AwardName =  $mysqli->real_escape_string($_POST['a_educhonor']);
    $A_AwardYear =  $mysqli->real_escape_string($_POST['a_educhonoryear']);

    // if(empty($A_FName)||empty($A_LName)||empty($A_MName)||
    //     empty($A_BuildNo)||empty($A_StreetName)||empty($A_City)||empty($A_Province)||empty($A_ZipCode)||
    //     empty($A_PrimaryNumber)||empty($A_SecondaryNumber)||empty($A_SchoolName)||
    //     empty($A_SchoolYear)||empty($A_CourseName)||empty($A_CourseYear)){
    //     header("Location: ../../pages/applicant/profile.php?emptyfields");
    //     exit();
    // }
    // else{
        $query = "
        UPDATE users
        LEFT JOIN applicant_profile
        ON users.id = applicant_profile.uid
        LEFT JOIN applicant_employment_profile
        ON users.id = applicant_employment_profile.aid
        LEFT JOIN applicant_preference_profile
        ON users.id = applicant_preference_profile.aid
        LEFT JOIN applicant_education_profile
        ON users.id = applicant_education_profile.aid
        SET
            applicant_profile.lname = '$A_LName',
            applicant_profile.fname = '$A_FName',
            applicant_profile.mname = '$A_MName',
            applicant_profile.suffix = '$A_Suffix',
            applicant_profile.gender = '$A_Gender',
            applicant_profile.birthmonth = '$A_BMonth',
            applicant_profile.birthdate = '$A_BDate',
            applicant_profile.birthyear = '$A_BYear',
            applicant_profile.religion = '$A_Religion',
            applicant_profile.civil_status = '$A_CivilStatus',
            applicant_profile.primary_contact_number = '$A_PrimaryNumber',
            applicant_profile.secondary_contact_number = '$A_SecondaryNumber',
            applicant_profile.build_no = '$A_BuildNo',
            applicant_profile.street_name = '$A_StreetName',
            applicant_profile.city = '$A_City',
            applicant_profile.province = '$A_Province',
            applicant_profile.zip_code = '$A_ZipCode',
            applicant_preference_profile.occupation_type = '$A_JobPreference1',
            applicant_preference_profile.industry_type = '$A_JobPreference2',
            applicant_employment_profile.employment_status = '$A_EmployementStatus1',
            applicant_employment_profile.employment_type = '$A_EmployementStatus2',
            applicant_employment_profile.find_work_status = '$A_WorkStatus',
            applicant_employment_profile.find_work_comment = '$A_WorkReason',
            applicant_employment_profile.prompt_work_status = '$A_ApplyWorkStatus',
            applicant_employment_profile.prompt_work_comment = '$A_ApplyWork',
            applicant_employment_profile.beneficiary_status = '$A_4pStatus',
            applicant_employment_profile.beneficiary_id = '$A_4pNo',
            applicant_employment_profile.work_location_status = '$A_WorkLocationStatus',
            applicant_employment_profile.work_location_local = '$A_WorkLocationLocal',
            applicant_employment_profile.work_location_overseas = '$A_WorkLocationOverseas',
            applicant_education_profile.current_school_status = '$A_EducationStatus',
            applicant_education_profile.current_education_status = '$A_HighestEducationStatus',
            applicant_education_profile.school_name = '$A_SchoolName',
            applicant_education_profile.school_year = '$A_SchoolYear',
            applicant_education_profile.course = '$A_CourseName',
            applicant_education_profile.course_year = '$A_CourseYear',
            applicant_education_profile.awards = '$A_AwardName',
            applicant_education_profile.awards_year = '$A_AwardYear'
        WHERE users.id = '$A_Id'
        ";
        
        if(!$result = $mysqli->query($query)) {
            exit($mysqli->error);
        }
         header("Location: ../../pages/applicant/profile.php?profileupdate");
    //}
}
?>