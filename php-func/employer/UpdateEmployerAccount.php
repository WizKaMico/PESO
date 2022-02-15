<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST)){
    session_start();
    require('../conn.php');
    
    $E_Id = $mysqli->real_escape_string($_POST['e_id']);
    $E_Username = $mysqli->real_escape_string(trim($_POST['e_username']));
    $E_ResetPass1 = $mysqli->real_escape_string(trim($_POST['e_pass1']));
    $E_ResetPass2 = $mysqli->real_escape_string(trim($_POST['e_pass2']));
    
    
    $checkid1 = $mysqli->query("SELECT * FROM users WHERE username='$E_Username'");
    //$list = $checkid1->fetch_array();
     
    if(empty($E_Username)||empty($E_ResetPass1)||empty($E_ResetPass2)){
        header("Location:../../pages/employer/account.php?emptyfields");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $E_Username)){
         header("Location:../../pages/employer/account.php?invalidusername");
        exit();
    }
    elseif($E_ResetPass1 !== $E_ResetPass2){
        header("Location:../../pages/employer/account.php?checkpassword");
        exit();
    }
                
                $query ="
                        UPDATE users
                        SET 
                            username = '$E_Username',
                            password = '$E_ResetPass1'
                        WHERE id = '$E_Id'
                        ";

            if(!$result = $mysqli->query($query)) {
                exit($mysqli->error);
            }
                header("Location:../../pages/employer/account.php?update");
                exit(); 
}
?>