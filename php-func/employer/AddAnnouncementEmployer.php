<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST)){
    session_start();
    require('../conn.php');
    
    $E_AId = $mysqli->real_escape_string($_POST['id']); 
    $E_Id = $mysqli->real_escape_string($_POST['e_id']);
    $E_JobName = $mysqli->real_escape_string($_POST['e_announcementtitle']);
    $E_JobSummary = $_POST['e_announcementdesc'];

    date_default_timezone_set('Asia/Manila');
    $RegisterTimestamp = " ".date('Y/m/d')." ";

    $checkid1 = $mysqli->query("SELECT * FROM employer_announcement WHERE e_announcementtitle = '$E_JobName'");
            
    //$list1 = $checkid1->fetch_array();

    if(empty($E_JobName)||empty($E_JobSummary)){
        header("Location:../../pages/employer/post-announcement.php?emptyfields");
        exit();
    }

    if($checkid1->num_rows!=0){
        header("Location:../../pages/employer/post-announcement.php?error=invalidjoblist");
        exit();
    }
    else{
        $query = "INSERT INTO employer_announcement (eid, announcement_title, announcement_description, announcement_date_posted) 
                    VALUES ('$E_Id', '$E_JobName', '$E_JobSummary', '$RegisterTimestamp')";

        if (!$result = $mysqli->query($query)) {
            exit($mysqli->error);
            }
        
        header("Location: ../../pages/employer/post-announcement.php?add");
    }
}    
?>