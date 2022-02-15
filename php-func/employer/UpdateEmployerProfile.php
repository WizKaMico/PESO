<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST)){
    session_start();
    require('../conn.php');
    
    $E_Id = $mysqli->real_escape_string($_POST['e_id']);
    $E_FName = $mysqli->real_escape_string(trim($_POST['e_fname']));
    $E_LName = $mysqli->real_escape_string(trim($_POST['e_lname']));
    $E_MName = $mysqli->real_escape_string(trim($_POST['e_mname']));
    $E_Email = $mysqli->real_escape_string(trim($_POST['e_email']));
    $E_CompanyName = $mysqli->real_escape_string(trim($_POST['e_cname']));
    

    $checkid1 = $mysqli->query("SELECT * FROM users WHERE username='$E_Username'");
    //$list = $checkid1->fetch_array();
     
    if(empty($E_FName)||empty($E_LName)||empty($E_MName)||empty($E_Email)||empty($E_CompanyName)){
        header("Location:../../pages/employer/profile.php?emptyfields");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $E_Username)){
         header("Location:../../pages/admin/manage-client.php?invalidusername");
        exit();
    }
    elseif($E_ResetPass1 !== $E_ResetPass2){
        header("Location:../../pages/admin/manage-client.php?invalidpassword");
        exit();
    }
                
                $query ="
                        UPDATE employer_profile
                        LEFT JOIN employer_company_profile 
                        ON employer_profile.uid = employer_company_profile.eid
                        SET 
                        employer_profile.lname = '$E_LName',
                        employer_profile.fname = '$E_FName',
                        employer_profile.mname = '$E_MName',
                        employer_profile.email = '$E_Email',
                        employer_company_profile.company_name = '$E_CompanyName'
                        WHERE employer_profile.uid = '$E_Id'
                        ";

            if(!$result = $mysqli->query($query)) {
                exit($mysqli->error);
            }
                header("Location:../../pages/employer/profile.php?accountupdate");
                exit(); 
}
?>