<?php
session_start();
include("../conn.php");

$E_Id = $_GET['id'];
$JobStatus = 'Hiring';
$querysel=$mysqli->query("SELECT * FROM employer_vacancy_profile WHERE id = '$E_Id'");

$row=$querysel->fetch_array();
    $JobActivationStatus = $row['job_status'];
    if($JobActivationStatus == 'Hired'){
       $query = "UPDATE employer_vacancy_profile
        SET job_status = '$JobStatus' 
        WHERE id = '$E_Id'
        ";

    if(!$result = $mysqli->query($query)) {
            exit($mysqli->error);
        }	

/*
$uname="".$_SESSION["user"]."";
$name="".$_SESSION["ln"]." ".$_SESSION["fn"]."";
$action="Delete Student ".$list['username']." ".$list['ln']." ".$list['fn']." in Student Records";
date_default_timezone_set('Asia/Manila');
$date=" ".date('Y/m/d')." at ".date('H:i:a')."";
$mysqli->query("insert into systemlogs(username,name,action,date) values('$uname','$name','$action','$date')") or die($mysqli->error);
*/


echo '<script type="text/javascript">
document.location.href = "../../pages/employer/manage-applicant.php?hiring";
</script>';
}
?>