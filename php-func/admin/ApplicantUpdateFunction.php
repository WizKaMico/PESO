<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST)){
    session_start();
    require('../conn.php');
    
    $E_Id = $mysqli->real_escape_string($_POST['id']);
    $E_Email = $mysqli->real_escape_string(trim($_POST['a_email']));
    $E_Username = $mysqli->real_escape_string(trim($_POST['a_username']));
    $E_ResetPass = $mysqli->real_escape_string(trim($_POST['a_newpassword']));
    
    
    $checkid1 = $mysqli->query("SELECT * FROM users WHERE username='$E_Username'");
    //$list = $checkid1->fetch_array();
     
    if(empty($E_Username)||empty($E_ResetPass)||empty($E_Email)){
        header("Location:../../pages/admin/manage-employer.php?emptyfield");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $E_Username)){
         header("Location:../../pages/admin/manage-employer.php?invalidusername");
        exit();
    }
                
    $query ="
            UPDATE users
            LEFT JOIN applicant_profile 
            ON users.id = applicant_profile.uid
            SET
                users.username = '$E_Username',
                users.password = '$E_ResetPass',
                applicant_profile.email = '$E_Email'
            WHERE users.id = '$E_Id'
            ";

    if(!$result = $mysqli->query($query)) {
        exit($mysqli->error);
    }
        header("Location:../../pages/admin/manage-employer.php?update");
        exit();       
}
?>