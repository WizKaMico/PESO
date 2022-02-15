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

    $checkid1 = $mysqli->query("SELECT * FROM employer_vacancy_profile WHERE job_title = '$E_JobName' AND job_location = '$E_JobLocation'");
            
    $list1 = $checkid1->fetch_array();

    if(empty($E_JobName)||empty($E_JobSummary)||empty($E_JobQualifications)||empty($E_JobRequirements)||empty($E_JobLocation)||empty($E_Salary)||empty($E_Category)||empty($E_JobType)){
        header("Location:../../pages/employer/manage-joblist.php?emptyfields");
        exit();
    }

    if($checkid1->num_rows!=0){
        header("Location:../../pages/employer/manage-joblist.php.php?error=invalidjoblist");
        exit();
    }
    else{
        $query = " UPDATE employer_vacancy_profile
                        SET 
                            job_title = '$E_JobName',
                            job_qualifications = '$E_JobQualifications', 
                            job_summary = '$E_JobSummary',
                            job_requirements = '$E_JobRequirements',
                            job_posted = '$RegisterTimestamp',
                            job_categories = '$E_Category',
                            job_type = $E_JobType,
                            job_salary = '$E_Salary',
                            job_status = '$E_JobStatus',
                            job_location = '$E_JobLocation'
                        WHERE eid = '$E_Id'
                ";

        if (!$result = $mysqli->query($query)) {
            exit($mysqli->error);
            }
        
        header("Location: ../../pages/employer/manage-joblist.php?update");
    }
}    
?>