<?php
session_start();
include("../conn.php");

$id = $_GET['id'];
$querysel=$mysqli->query("SELECT * FROM users WHERE id = '$id'");

$list=$querysel->fetch_array();

$query1="DELETE FROM users WHERE users.id='$id'";
$query2="DELETE FROM employer_profile WHERE employer_profile.uid='$id'";
$query3="DELETE FROM employer_company_profile WHERE employer_company_profile.eid='$id'";
$query4="DELETE FROM employer_vacancy_profile WHERE employer_vacancy_profile.eid='$id'";

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
/*
$uname="".$_SESSION["user"]."";
$name="".$_SESSION["ln"]." ".$_SESSION["fn"]."";
$action="Delete Student ".$list['username']." ".$list['ln']." ".$list['fn']." in Student Records";
date_default_timezone_set('Asia/Manila');
$date=" ".date('Y/m/d')." at ".date('H:i:a')."";
$mysqli->query("insert into systemlogs(username,name,action,date) values('$uname','$name','$action','$date')") or die($mysqli->error);
*/


echo '<script type="text/javascript">
document.location.href = "../../pages/admin/manage-employer.php?delete";
</script>';
?>