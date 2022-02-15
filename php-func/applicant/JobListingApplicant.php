<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST)){
    session_start();
    require('../conn.php');
    
    $J_Id = $mysqli->real_escape_string($_POST['jid']);
    $A_Id = $mysqli->real_escape_string($_POST['aid']);
    $E_Id = $mysqli->real_escape_string($_POST['eid']);
    $ApplyStatus = 'Applied';
    //$list = $checkid1->fetch_array();
                     
    $query =" INSERT INTO employer_vacancy_applicant(aid,eid,jid,apply_status)VALUES('$A_Id','$E_Id','$J_Id','$ApplyStatus')";

    if(!$result = $mysqli->query($query)) {
    exit($mysqli->error);
    }
    header("Location:../../pages/applicant/index.php");
    exit(); 
}
?>