<?php
if(isset($_POST)){
    session_start();	
    include("../conn.php");
    //$File_ID = $mysqli->real_escape_string(trim($_POST['fid']));
    $AID = $_POST['aid'];
    $EID = $_POST['eid'];
    $JID = $_POST['jid'];
    $FID = $_POST['fid'];

    date_default_timezone_set('Asia/Manila');
    $File_DateStamp="".date('Y/m/d')."";
    $File_TimeStamp="".date('H:i:a')."";

    $File_Name = $_FILES['file']['name'];
    $File_Size = $_FILES['file']['size'];
    $File_Type = $_FILES['file']['type'];
    $temp = $_FILES['file']['tmp_name'];
    $link = $_POST['link'];

    $Location = "upload/".$File_Name;

    move_uploaded_file($temp, "../../upload/".$File_Name);

    $checkid1=$mysqli->query("select * from applicant_vacancy_file where jid='$JID'");
    $checkid2=$mysqli->query("select * from applicant_file where file_name ='$File_Name'");
    $list=$checkid1->fetch_array();

    if(empty($_FILES)){
        header("location:../../pages/applicant/profile.php?error=empty");
        exit();
    }

    if($checkid1->num_rows!=0){
        $query = "INSERT INTO applicant_file (aid, file_name, file_location, file_date, file_time)
        VALUES('$AID', '$File_Name', '$Location', '$File_DateStamp', '$File_TimeStamp')";
        
        if (!$result = $mysqli->query($query)) {
            exit($mysqli->error);
        }
        header("location:../../pages/applicant/profile.php?success=apply1");
    }else{

    $query = "INSERT INTO applicant_file (aid, file_name, file_location, file_date, file_time)
    VALUES('$AID', '$File_Name', '$Location', '$File_DateStamp', '$File_TimeStamp')";

    if (!$result = $mysqli->query($query)) {
        exit($mysqli->error);
    }

    header("location:../../pages/applicant/profile.php?success=apply2");
}
}
?>

