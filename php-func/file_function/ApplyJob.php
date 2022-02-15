<?php
if(isset($_POST)){
    session_start();	
    include("../conn.php");
    //$File_ID = $mysqli->real_escape_string(trim($_POST['fid']));
    $AID = $_POST['aid'];
    $EID = $_POST['eid'];
    $JID = $_POST['jid'];
    $ApplyStatus = 'Applied';

    date_default_timezone_set('Asia/Manila');
    $File_DateStamp = date('Y/m/d');
    $File_TimeStamp = date('H:i:a');

    $File_Name = $_FILES['file']['name'];
    $File_Size = $_FILES['file']['size'];
    $File_Type = $_FILES['file']['type'];
    $temp = $_FILES['file']['tmp_name'];
    //$link = $_POST['link'];;

    $Location = "upload/".$File_Name;

    move_uploaded_file($temp, "../../upload/".$File_Name);


    $checkid1 = $mysqli->query("select * from applicant_vacancy_file where jid='$JID'");
    $checkid2 = $mysqli->query("select * from applicant_file where file_name ='$File_Name'");
    $checkid3 = $mysqli->query("select * from applicant_file where id ='$FID'");
    $checkid1 = $mysqli->query("select * from applicant_vacancy_file where jid='$JID'");
    $list=$checkid1->fetch_array();

    if(!$checkid2 == $checkid2){
        
        $FID = $_POST['fid'];

        $query1 = " INSERT INTO applicant_vacancy_file (aid, eid, jid, fid)
                    VALUES('$AID','$EID', '$JID', '$FID')";

        $query2 = " INSERT INTO employer_vacancy_applicant(aid,eid,jid,apply_status)
                    VALUES('$AID','$EID','$JID','$ApplyStatus')";
        
        if (!$result1 = $mysqli->query($query1)) {
            exit($mysqli->error);
        }
        if (!$result2 = $mysqli->query($query2)) {
            exit($mysqli->error);
        }

        header("location:../../pages/applicant/joblist-apply.php?jid=".$JID."?success=apply1");
    }else{

    $query1 = " INSERT INTO applicant_file (aid, file_name, file_location, file_date, file_time)
                VALUES('$AID', '$File_Name', '$Location', '$File_DateStamp', '$File_TimeStamp')";

    $query2 = " INSERT INTO employer_vacancy_applicant(aid,eid,jid,apply_status)
                VALUES('$AID','$EID','$JID','$ApplyStatus')";

    if (!$result1 = $mysqli->query($query1)) {
        exit($mysqli->error);
    }

    if (!$result2 = $mysqli->query($query2)) {
        exit($mysqli->error);
    }

    if(mysqli_query($mysqli,$query1)){
        $FID = mysqli_insert_id($mysqli);

        $query3 = " INSERT INTO applicant_vacancy_file (aid, eid, jid, fid)
                    VALUES('$AID','$EID', '$JID', '$FID')";

        if (!$result3 = $mysqli->query($query3)) {
            exit($mysqli->error);
        }

        header("location:../../pages/applicant/joblist-apply.php?jid=".$JID."?success=apply2");
    }
    }
}
?>

