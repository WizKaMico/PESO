<?php
session_start();
include("../conn.php");

$A_Id = $_GET['id'];
$PostStatus = 'Post';
$querysel=$mysqli->query("SELECT * FROM announcement WHERE id = '$A_Id'");

$row=$querysel->fetch_array();
    $PostArchivedStatus = $row['post_archived'];
    if($PostArchivedStatus == 'DeArchived'){
       $query = "UPDATE announcement
        SET 
            post_status = '$PostStatus'
        WHERE id = '$A_Id'
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
document.location.href = "../../pages/admin/manage-announcement.php?unpost";
</script>';
}
?>