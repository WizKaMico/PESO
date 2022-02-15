<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST)){
    session_start();
    require('../conn.php');

    $E_Id = $mysqli->real_escape_string($_POST['e_id']);
    $E_JobName = $mysqli->real_escape_string($_POST['e_jname']);
    $E_JobSummary = $_POST['e_jsummary'];
    $E_JobQualifications = $_POST['e_jqualifications'];
    $E_JobRequirements = $_POST['e_jrequirements'];
    $E_JobLocation = $mysqli->real_escape_string($_POST['e_jlocation']);
    $E_Salary = $_POST['e_jsalary'];
    $E_Category = $_POST['e_jcategory'];
    $E_JobType = $_POST['e_jtype'];
    $E_JobStatus = 'Hiring';

    date_default_timezone_set('Asia/Manila');
    $RegisterTimestamp = " ".date('Y/m/d')." ";

    $checkid1 = $mysqli->query("SELECT * FROM employer_vacancy_profile WHERE job_title LIKE '%$E_JobName' AND job_location LIKE '%$E_JobLocation'");
            
    $list1 = $checkid1->fetch_array();

    if(empty($E_JobName)||empty($E_JobSummary)||empty($E_JobQualifications)||empty($E_JobRequirements)||empty($E_JobLocation)||empty($E_Salary)||empty($E_Category)||empty($E_JobType)){
        header("Location:../../pages/employer/manage-joblist.php?emptyfields");
        exit();
    }

        $query = "INSERT INTO employer_vacancy_profile (eid, job_title, job_qualifications, job_summary, job_requirements, job_posted, job_categories, job_type, job_salary, job_status, job_location) 
                    VALUES ('$E_Id', '$E_JobName', '$E_JobQualifications', '$E_JobSummary', '$E_JobRequirements', '$RegisterTimestamp', '$E_Category', '$E_JobType', '$E_Salary', '$E_JobStatus', '$E_JobLocation')";

        if (!$result = $mysqli->query($query)) {
            exit($mysqli->error);
            }
        
        header("Location: ../../pages/employer/manage-joblist.php?add");
}    
?>