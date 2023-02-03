<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['UND']) || (trim($_SESSION['UND']) == '')) {
    header("location: applicant_forgot.php");
    exit();
}
$session_id=$_SESSION['UND'];

?>