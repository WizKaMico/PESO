<?php
session_start();
include("../conn.php");

$E_Id = $_GET['id'];
$UserActivation = 'DeActivated';
$querysel=$mysqli->query("SELECT * FROM users WHERE id = '$E_Id'");

$row=$querysel->fetch_array();
    $UserActivationStatus = $row['user_activation'];
    if($UserActivationStatus == 'Activated'){
       $query = "UPDATE users
        SET user_activation = '$UserActivation' 
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
document.location.href = "../../pages/admin/manage-employer.php?lock";
</script>';
}
 
?>