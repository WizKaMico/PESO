<?php
session_start();
include("../conn.php");

$id = $_GET['id'];
$querysel=$mysqli->query("SELECT * FROM users WHERE id = '$id'");

$list=$querysel->fetch_array();

$query1="DELETE FROM users WHERE users.id='$id'";
$query2="DELETE FROM applicant_profile WHERE applicant_profile.uid='$id'";
$query3="DELETE FROM applicant_preference_profile WHERE applicant_preference_profile.aid='$id'";
$query4="DELETE FROM applicant_employment_profile WHERE applicant_employment_profile.aid='$id'";
$query5="DELETE FROM applicant_education_profile WHERE applicant_education_profile.aid='$id'";
$query6="DELETE FROM applicant_file WHERE applicant_file.aid='$id'";

    if(!$result = $mysqli->query($query1)) {
            exit($mysqli->error);
        }
    if(!$result = $mysqli->query($query2)) {
            exit($mysqli->error);
        }
    if(!$result = $mysqli->query($query3)) {
            exit($mysqli->error);
        }
    if(!$result = $mysqli->query($query4)) {
                exit($mysqli->error);
        }
    if(!$result = $mysqli->query($query5)) {
            exit($mysqli->error);
    }
    if(!$result = $mysqli->query($query6)) {
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
document.location.href = "../../pages/admin/archived-applicant.php?delete";
</script>';
?>