<?php
session_start();
include("../conn.php");

$id = $_GET['id'];
$querysel=$mysqli->query("SELECT * FROM announcement WHERE id = '$id'");

$list=$querysel->fetch_array();

$query1="DELETE FROM announcement WHERE id='$id'";

    if(!$result = $mysqli->query($query1)) {
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
document.location.href = "../../pages/admin/archived-announcement.php?delete";
</script>';
?>